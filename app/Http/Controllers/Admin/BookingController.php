<?php

namespace App\Http\Controllers\Admin;

use App\Models\Booking;
use App\Models\User;
use App\Models\Tour;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TourPayment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class BookingController extends Controller
{
    // Show all bookings
    public function index()
    {
        $bookings = Booking::with('tour', 'user')->get(); // Include tour and user details
        $tours = Tour::all();
        $users = User::all();
        return view('admin.bookings.index', compact('bookings', 'tours', 'users'));
    }

    // Show form to create a new booking
    public function create()
    {
        $users = User::all();
        $tours = Tour::all();
        return view('admin.bookings.create', compact('users', 'tours'));
    }

    // Store a new booking
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'booking_date' => 'required|date',
            'number_of_guests' => 'required|integer|min:1',
            'tour_id' => 'required|exists:tours,id',
            'status' => 'required|string',
        ]);

        $tour = Tour::findOrFail($request->tour_id);
        $totalPrice = $request->number_of_guests * $tour->price;

        $booking = Booking::create([
            'user_id' => $request->user_id,
            'tour_id' => $request->tour_id,
            'booking_date' => $request->booking_date,
            'number_of_guests' => $request->number_of_guests,
            'total_price' => $totalPrice,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.payment.page', $booking->id);
    }

    public function payment(Booking $booking)
    {
        return view('admin.payments.payment', [
            'email' => Auth::user()->email,
            'amount' => $booking->total_price,
            'tx_ref' => 'TRX_' . Str::random(10),
            'booking_id' => $booking->id,
            'public_key' => env('FLW_PUBLIC_KEY')
        ]);
    }

    public function paymentTourCallback(Request $request)
    {
        $transactionId = $request->query('transaction_id');
        $txRef = $request->query('tx_ref');

        if (!$transactionId || !$txRef) {
            return redirect()->route('admin.bookings.index')->with('error', 'Invalid payment callback data.');
        }

        // Extract booking ID (prefix of tx_ref)
        $bookingId = explode('-', $txRef)[0];

        $booking = Booking::find($bookingId);
        if (!$booking) {
            return redirect()->route('admin.bookings.index')->with('error', 'Booking not found.');
        }

        // Prevent duplicate payment processing
        if ($booking->status === 'paid') {
            return redirect()->route('admin.bookings.index')->with('success', 'Payment already processed.');
        }

        // Verify transaction with Flutterwave
        $response = Http::withToken(env('FLW_SECRET_KEY'))
            ->get("https://api.flutterwave.com/v3/transactions/{$transactionId}/verify");

        if ($response->failed()) {
            Log::error('Flutterwave verification failed.', [
                'transaction_id' => $transactionId,
                'response' => $response->body(),
            ]);
            return redirect()->route('admin.bookings.index')->with('error', 'Could not verify payment. Please contact support.');
        }

        $data = $response->json()['data'] ?? [];

        if (isset($data['status']) && $data['status'] === 'successful') {
            // Save payment and update booking
            $booking->update([
                'status' => 'paid',
                'updated_at' => now(),
            ]);

            TourPayment::create([
                'user_id' => $booking->user_id,
                'booking_id' => $booking->id,
                'amount' => $data['amount'] ?? $booking->total_price,
                'status' => 'success',
                'transaction_id' => $transactionId,
            ]);

            return redirect()->route('admin.bookings.index')->with('success', 'Payment successful and booking confirmed!');
        }

        // If payment was cancelled or failed
        return redirect()->route('admin.bookings.index')->with('error', 'Payment was not successful.');
    }

    // Show form to edit an existing booking
    public function edit($id)
    {
        $booking = Booking::findOrFail($id);
        $users = User::all();
        $tours = Tour::all();
        return view('admin.bookings.edit', compact('booking', 'users', 'tours'));
    }

    // Update an existing booking
    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'tour_id' => 'required|exists:tours,id',
            'booking_date' => 'required|date',
            'status' => 'required|string|in:pending,confirmed,canceled',
            'number_of_guests' => 'required|integer|min:1',
            'total_price' => 'required|numeric|min:0',
        ]);

        $booking = Booking::findOrFail($id);
        $booking->update($request->all());

        return redirect()->route('admin.bookings.index')->with('success', 'Booking updated successfully!');
    }

    // Delete a booking
    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();

        return redirect()->route('admin.bookings.index')->with('success', 'Booking deleted successfully!');
    }
    public function show($id)
    {
        $booking = Booking::with('tour', 'user')->findOrFail($id); // Load the booking with tour and user data
        return view('admin.bookings.show', compact('booking'));
    }

    // Update booking status
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string|in:confirmed,declined,cancelled',
        ]);

        $booking = Booking::findOrFail($id);
        $booking->status = $request->status;
        $booking->save();

        return redirect()->route('admin.bookings.index', $id)->with('success', 'Booking status updated successfully!');
    }
}
