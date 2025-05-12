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
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'tour_id' => 'required|exists:tours,id',
            'booking_date' => 'required|date',
            'status' => 'required|string|in:pending,confirmed,canceled',
            'number_of_guests' => 'required|integer|min:1',
            'total_price' => 'required|numeric|min:0',
        ]);

        Booking::create($request->all());

        return redirect()->back()->with('success', 'Booking created successfully!');
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
