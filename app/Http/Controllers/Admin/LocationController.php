<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LocationController extends Controller
{
    public function index()
    {
        $locations = Location::all();
        return view('admin.locations.index', compact('locations'));
    }

    // Show the form to create a new location
    public function create()
    {
        return view('admin.locations.create');
    }

    // Store a new location
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'country' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $location = new Location();
        $location->name = $request->name;
        $location->description = $request->description;
        $location->country = $request->country;

        // Handle image upload
        if ($request->hasFile('image')) {
            $location->image = $request->file('image')->store('locations', 'public');
        }

        $location->save();

        return redirect()->route('admin.locations.index')->with('success', 'Location created successfully');
    }

    // Show the form to edit a location
    public function edit(Location $location)
    {
        return view('admin.locations.edit', compact('location'));
    }

    // Update the location
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'country' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $location = Location::findOrFail($id);

        $location->name = $request->name;
        $location->description = $request->description;
        $location->country = $request->country;

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($location->image) {
                Storage::disk('public')->delete($location->image);
            }

            $location->image = $request->file('image')->store('locations', 'public');
        }

        $location->save();

        return redirect()->route('admin.locations.index')->with('success', 'Location updated successfully');
    }

    // Delete a location
    public function destroy($id)
    {
        $location = Location::findOrFail($id);
        // Delete the location's image from storage if it exists
        if ($location->image) {
            Storage::disk('public')->delete($location->image);
        }

        $location->delete();

        return redirect()->route('admin.locations.index')->with('success', 'Location deleted successfully');
    }
}
