<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\AccommodationType;
use App\Models\Activity;
use App\Models\Booking;
use App\Models\Destination;
use App\Models\DestinationLocation;
use App\Models\Hotel;
use App\Models\Tour;
use App\Models\TourPayment;
use App\Models\TransportationType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class CustomerController extends Controller
{
    //
    public function dashboard()
    {
        $bookings = Booking::where('user_id', Auth::user()->id)->get();
        return view('customer.dashboard', compact('bookings'));
    }
    public function bookings()
    {
        $tours = Tour::all();
        $bookings = Booking::where('user_id', Auth::user()->id)->get();
        return view('customer.bookings.index', compact('bookings','tours'));
    }
    public function bookingDetails($id)
    {
        $booking = Booking::findOrFail($id);
        return view('customer.bookings.show', compact('booking'));
    }
    // Store a new booking
    public function store(Request $request)
    {
        $request->validate([
            
            'booking_date' => 'required|date',
            'number_of_guests' => 'required|integer|min:1',
            'tour_id' => 'required|exists:tours,id',
            'status' => 'required|string',
        ]);

        $tour = Tour::findOrFail($request->tour_id);
        $totalPrice = $request->number_of_guests * $tour->price;

        $booking = Booking::create([
            'user_id' => Auth::user()->id,
            'tour_id' => $request->tour_id,
            'booking_date' => $request->booking_date,
            'number_of_guests' => $request->number_of_guests,
            'total_price' => $totalPrice,
            'status' => $request->status,
        ]);

        return redirect()->route('customer.payments.page', $booking->id);
    }

    public function payment(Booking $booking)
    {
        return view('customer.payments.payment', [
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
            return redirect()->route('customers.bookings.index')->with('error', 'Invalid payment callback data.');
        }

        // Extract booking ID (prefix of tx_ref)
        $bookingId = explode('-', $txRef)[0];

        $booking = Booking::find($bookingId);
        if (!$booking) {
            return redirect()->route('customers.bookings.index')->with('error', 'Booking not found.');
        }

        // Prevent duplicate payment processing
        if ($booking->status === 'paid') {
            return redirect()->route('customers.bookings.index')->with('success', 'Payment already processed.');
        }

        // Verify transaction with Flutterwave
        $response = Http::withToken(env('FLW_SECRET_KEY'))
            ->get("https://api.flutterwave.com/v3/transactions/{$transactionId}/verify");

        if ($response->failed()) {
            Log::error('Flutterwave verification failed.', [
                'transaction_id' => $transactionId,
                'response' => $response->body(),
            ]);
            return redirect()->route('customers.bookings.index')->with('error', 'Could not verify payment. Please contact support.');
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

            return redirect()->route('customers.bookings.index')->with('success', 'Payment successful and booking confirmed!');
        }

        // If payment was cancelled or failed
        return redirect()->route('customers.bookings.index')->with('error', 'Payment was not successful.');
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

        return redirect()->back()->with('success', 'Booking status updated successfully!');
    }
    public function bookingReschedule(Request $request, $id)
    {
        $request->validate([
            'booking_date' => 'required|date',
        ]);

        $booking = Booking::findOrFail($id);
        $booking->booking_date = $request->booking_date;
        $booking->save();

        return redirect()->back()->with('success', 'Booking date rescheduled successfully!');
    }
    // Delete a booking
    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();

        return redirect()->back()->with('success', 'Booking deleted successfully!');
    }
    public function indexAccommodation()
    {
        $accommodations = AccommodationType::all();
        return view('customer.accommodations.index', compact('accommodations'));
    }
    public function indexActivity()
    {
        $activites = Activity::all();
        return view('customer.activities.index', compact('activites'));
    }
    public function indextransportation()
    {
        $transportations = TransportationType::all();
        return view('customer.transportations.index', compact('transportations'));
    }
    public function indexTours()
    {
        $tours = Tour::all();
        return view('customer.tours.index', compact('tours'));
    }
    public function indexLocations()
    {
        $tours = Destination::all();
        return view('customer.tours.index', compact('tours'));
    }
    public function indexHotels()
    {
        $hotels = Hotel::with('destination')->get();
        return view('customer.hotels.index', compact('hotels'));
    }
    public function showHotels($id)
    {
        $hotel = Hotel::findOrFail($id);
        return view('customer.hotels.show', compact('hotel'));
    }
    public function indexDestination()
    {
        $destinations = Destination::all();
        return view('customer.destinations.index', compact('destinations'));
    }
    public function indexLocation()
    {
        $locations = DestinationLocation::with('destination')->get();
        $destinations = Destination::all();
        return view('customer.destinations.locations', compact('locations', 'destinations'));
    }
    public function bookingPayment()
    {
        $tours = Tour::all();
        $payments = TourPayment::where('user_id', Auth::user()->id)->get();
        return view('customer.payments.index', compact('payments','tours'));
    }
    public function refundStatus($id)
    {
        $payment = TourPayment::findOrFail($id);
        $payment->status = 'refund';
        $payment->save();

        return redirect()->back()->with('success', 'payment refund initiated successfully!');
    }
    public function cancelStatus($id)
    {
        $payment = TourPayment::findOrFail($id);
        $payment->status = 'cancelled';
        $payment->save();

        return redirect()->back()->with('success', 'payment status cancelled successfully!');
    }

    public function storeTourBooking(Request $request, $id)
    {
        $request->validate([
            'booking_date' => 'required|date',
            'number_of_guests' => 'required|integer|min:1',
        ]);
        $tour = Tour::findOrFail($id);

        $totalPrice = $request->number_of_guests * $tour->price;

        $booking = Booking::create([
            'user_id' => Auth::id(),
            'tour_id' => $tour->id,
            'booking_date' => $request->booking_date,
            'number_of_guests' => $request->number_of_guests,
            'total_price' => $totalPrice,
            'status' => 'pending',
        ]);

        $payment = new TourPayment();
        $payment->user_id = $booking->user_id;
        $payment->booking_id = $booking->id;
        $payment->amount = $booking->total_price;
        $payment->status = 'pending';
        $payment->save();

        return redirect()->route('customers.payments.index')->with('success', 'Booking made successfully!');
    }
}
