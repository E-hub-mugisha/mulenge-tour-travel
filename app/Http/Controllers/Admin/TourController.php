<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tour;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AccommodationType;
use App\Models\Activity;
use App\Models\TransportationType;

class TourController extends Controller
{
    // Show all tours
    public function index()
    {
        $tours = Tour::all();
        return view('admin.tours.index', compact('tours'));
    }

    // Show the form to create a new tour
    public function create()
    {
        // Get all activities, accommodations, and transportation types
        $activities = Activity::all();
        $accommodations = AccommodationType::all();
        $transportations = TransportationType::all();

        return view('admin.tours.create', compact('activities', 'accommodations', 'transportations'));
    }

    // Store a new tour
    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'location' => 'required|string|max:255',
            'duration' => 'required|integer',
            'included' => 'required',
            'exclude' => 'required',
            'trip_highlights' => 'required',
            'status' => 'required|string|in:active,inactive',
            'activities' => 'required|array',
            'accommodations' => 'required|array',
            'transportation' => 'required|array',
        ]);

        // Create the tour
        $tour = Tour::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'location' => $request->location,
            'duration' => $request->duration,
            'trip_highlights' => str_replace("\n", '|', trim($request->input('trip_highlights'))),
            'included' => str_replace("\n", '|', trim($request->input('included'))),
            'exclude' => str_replace("\n", '|', trim($request->input('exclude'))),
            'status' => $request->status,
        ]);

        // Associate selected activities, accommodations, and transportation with the tour
        $tour->activities()->attach($request->activities);
        $tour->accommodations()->attach($request->accommodations);
        $tour->transportation()->attach($request->transportation);

        return redirect()->route('admin.tours.index')->with('success', 'Tour created successfully!');
    }

    // Show the form to edit an existing tour
    public function edit($id)
    {
        $tour = Tour::findOrFail($id);
        return view('admin.tours.edit', compact('tour'));
    }

    // Update an existing tour
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'location' => 'required|string',
            'duration' => 'required|integer|min:1',
            'status' => 'required|string|in:active,inactive',
        ]);

        $tour = Tour::findOrFail($id);
        $tour->update($request->all());

        return redirect()->route('admin.tours.index')->with('success', 'Tour updated successfully!');
    }

    // Delete a tour
    public function destroy($id)
    {
        $tour = Tour::findOrFail($id);
        $tour->delete();

        return redirect()->route('admin.tours.index')->with('success', 'Tour deleted successfully!');
    }
}
