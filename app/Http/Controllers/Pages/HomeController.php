<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Destination;
use App\Models\Hotel;
use App\Models\HotelBooking;
use App\Models\Location;
use App\Models\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //
    public function home()
    {
        $locations = Location::all();
        $tours = Tour::all();
        return view('pages.home', compact('locations', 'tours'));
    }
    public function tourPage()
    {
        $tours = Tour::all();
        return view('pages.tour', compact('tours'));
    }
    public function destinations()
    {
        $destinations = Destination::with('locations')->get();
        return view('pages.destinations', compact('destinations'));
    }
    public function showDestination($id)
    {
        $destination = Destination::with('locations','tours','hotels')->findOrFail($id);

        return view('pages.destinations-show', compact('destination'));
    }
    public function getHotels()
    {
        $hotels = Hotel::all();
        return view('pages.hotels', compact('hotels'));
    }
    public function showHotelDetails($id)
    {
        $hotel = Hotel::findOrFail($id);
        $relatedHotels = Hotel::where('id', '!=', $hotel->id)
            ->limit(6) // Show 6 related Hotels
            ->get();
        return view('pages.hotel-details', compact('hotel','relatedHotels'));
    }
    public function hotelBooking(Request $request)
    {
        // Validate the incoming data
        $validated = $request->validate([
            'checkin_date' => 'required|date|after_or_equal:today',
            'checkout_date' => 'required|date|after:checkin_date',
            'number_of_rooms' => 'required|integer|min:1',
            'number_of_guests' => 'required|integer|min:1',
            'special_requests' => 'nullable|string',
            'extra_services' => 'nullable|array',
            'extra_services.*' => 'string', // If extra_services is an array of strings
            'hotel_id' => 'required', // Assuming you have a Hotel model
        ]);

        // Get authenticated user
        $user = Auth::user();

        // Create the booking
        $booking = HotelBooking::create([
            'user_id' => $user->id,
            'hotel_id' => $validated['hotel_id'],
            'checkin_date' => $validated['checkin_date'],
            'checkout_date' => $validated['checkout_date'],
            'number_of_rooms' => $validated['number_of_rooms'],
            'number_of_guests' => $validated['number_of_guests'],
            'special_requests' => $validated['special_requests'] ?? null,
            'extra_services' => $validated['extra_services'] ?? [],
            'booking_status' => 'pending',
        ]);

        // Return a response (redirect or JSON response)
        return redirect()->back()
                         ->with('success', 'Your booking was successful!');
    }
}
