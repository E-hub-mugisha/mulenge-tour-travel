<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = Hotel::query();

        // Filter by Destination
        if ($request->filled('destination_id')) {
            $query->where('destination_id', $request->destination_id);
        }

        // Filter by Hotel Type
        if ($request->filled('hotel_type')) {
            $query->where('hotel_type', $request->hotel_type);
        }

        // Filter by Amenities (Supports JSON or CSV storage)
        if ($request->filled('amenities')) {
            $query->where('amenities', $request->amenities);
        }

        $hotels = $query->get();


        return view('pages.hotels', compact('hotels'));
    }
}
