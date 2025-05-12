<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tour;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AccommodationType;
use App\Models\Activity;
use App\Models\Destination;
use App\Models\TourImage;
use App\Models\TransportationType;
use Illuminate\Support\Facades\Storage;

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
        $destinations = Destination::all();
        return view('admin.tours.create', compact('activities', 'accommodations', 'transportations', 'destinations'));
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
            'destination_id' => 'required',
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
            'destination_id' => $request->destination_id
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
        $activities = Activity::all();
        $accommodations = AccommodationType::all();
        $transportations = TransportationType::all();
        $destinations = Destination::all();
        return view('admin.tours.edit', compact('tour', 'activities', 'accommodations', 'transportations', 'destinations'));
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
            'destination_id' => 'required',
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

    // Store multiple images
    public function storeImageTour(Request $request, $tourId)
    {
        $request->validate([
            'images' => 'required|mimes:jpeg,png,jpg,gif,svg', // Validate each image
        ]);

        $tour = Tour::findOrFail($tourId);

        if ($images = $request->file('images')) {
            $destinationPath = 'image/tours/';
            $profileImage = date('YmdHis') . "." . $images->getClientOriginalExtension();
            $images->move($destinationPath, $profileImage);
            $tours['images'] = "$profileImage";
        }
        $tours = new TourImage();
        $tours->tour_id = $tour->id;
        $tours->images = $profileImage;
        $tours->save();

        return redirect()->back()->with('success', 'Images uploaded successfully.');
    }

    // Delete a specific image
    public function destroyImageTour($id)
    {
        $image = TourImage::findOrFail($id);

        // Delete image from storage
        Storage::delete('public/' . $image->image_path);

        // Delete record from database
        $image->delete();

        return redirect()->back()->with('success', 'Image deleted successfully.');
    }

    public function createImages($id)
    {
        $tour = Tour::findOrFail($id);
        return view('admin.tours.upload_images', compact('tour'));
    }
}
