<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\AccommodationType;
use App\Models\Activity;
use App\Models\Booking;
use App\Models\Review;
use App\Models\Tour;
use App\Models\TourBooking;
use App\Models\TransportationType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ToursController extends Controller
{
    //
    public function tours()
    {
        $tours = Tour::all();
        $locations = Tour::all();
        $activities = Activity::all();
        $accommodations = AccommodationType::all();
        $transportations = TransportationType::all();
        return view('pages.tour', compact('tours', 'locations', 'activities', 'accommodations', 'transportations'));
    }
    public function tourDetails($id)
    {
        $tour = Tour::findOrFail($id);
        $reviews = Review::where('tour_id', $id)->get();
        // Fetch related tours (e.g., by category or location)
        $relatedTours = Tour::where('id', '!=', $tour->id)
            ->limit(6) // Show 6 related tours
            ->get();
        return view('pages.tour-details', compact('tour', 'reviews', 'relatedTours'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'booking_date' => 'required|date',
            'number_of_guests' => 'required'
        ]);

        $totalPrice = $request->number_of_guests * $request->price;

        Booking::create([
            'user_id' => Auth::user()->id,
            'tour_id' => $request->tour_id,
            'booking_date' => $request->booking_date,
            'number_of_guests' => $request->number_of_guests,
            'total_price' => $totalPrice,
            'status' => 'pending',
        ]);

        return redirect()->back()->with('success', 'Booking request submitted!');
    }

    public function storeReview(Request $request, $tourId)
    {
        $request->validate([
            'message' => 'required|string',
            'location_rating' => 'required|integer|min:0|max:5',
            'price_rating' => 'required|integer|min:0|max:5',
            'amenities_rating' => 'required|integer|min:0|max:5',
            'rooms_rating' => 'required|integer|min:0|max:5',
            'services_rating' => 'required|integer|min:0|max:5',
        ]);

        $review = new Review();
        $review->tour_id = $tourId;
        $review->user_id = Auth::user()->id;
        $review->message = $request->message;
        $review->location_rating = $request->location_rating;
        $review->price_rating = $request->price_rating;
        $review->amenities_rating = $request->amenities_rating;
        $review->rooms_rating = $request->rooms_rating;
        $review->services_rating = $request->services_rating;

        $review->save();

        return back()->with('success', 'Review submitted successfully!');
    }
}
