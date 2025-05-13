<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Destination;
use App\Models\Hotel;
use App\Models\HotelBooking;
use App\Models\HotelImage;
use App\Models\Location;
use App\Models\Tour;
use App\Models\TourTips;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    //
    public function home()
    {
        $locations = Destination::all();
        $tours = Tour::all();
        $hotels = Hotel::all();
        $tips = TourTips::all()->take(3);
        return view('pages.home', compact('locations', 'tours','hotels','tips'));
    }
    public function contact()
    {
        return view('pages.contact');
    }
    public function tourPage()
    {
        $tours = Tour::simplePaginate(6);
        return view('pages.tour', compact('tours'));
    }
    public function tipsPage()
    {
        $tips = TourTips::simplePaginate(6);
        return view('pages.tips', compact('tips'));
    }
    public function tipsDetail($id)
    {
        $tip = TourTips::findOrFail($id);
        $relatedTips = TourTips::where('id', '!=', $tip->id)
            ->limit(3) // Show 3 related tips
            ->get();

        $categories = Category::all();
        return view('pages.tips-detail', compact('tip', 'relatedTips', 'categories'));
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
        $hotelImages = HotelImage::where('hotel_id', $hotel->id)->get();
        return view('pages.hotel-details', compact('hotel','relatedHotels','hotelImages'));
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
        return redirect()->route('hotel.payment.page', $booking->id);
    }
    public function payment(HotelBooking $booking)
    {
        return view('pages.payment', [
            'email' => Auth::user()->email,
            'amount' => $booking->total_price,
            'tx_ref' => 'TRX_' . Str::random(10),
            'booking_id' => $booking->id,
            'public_key' => env('FLW_PUBLIC_KEY'),
            'redirect_url' => route('payment.callback', ['booking_id' => $booking->id]),
        ]);
    }
    public function paymentCallback(Request $request)
    {
        $booking_status = $request->booking_status;
        $bookingId = $request->booking_id;
    
        if ($booking_status === 'successful') {
            $tx_ref = $request->tx_ref;
    
            // (Optional) Verify transaction via API
            // You can add: Http::withToken(env('FLW_SECRET_KEY'))->get('https://api.flutterwave.com/v3/transactions/....');
    
            HotelBooking::where('id', $bookingId)->update([
                'booking_status' => 'confirmed'
            ]);
    
            return redirect()->route('hotel.after.payment')->with('success', 'Payment successful and booking confirmed!');
        } elseif ($booking_status === 'cancelled') {
            return redirect()->route('hotel.after.payment')->with('error', 'Payment was cancelled.');
        } else {
            return redirect()->route('hotel.after.payment')->with('error', 'Payment failed. Please try again.');
        }
    }
}
