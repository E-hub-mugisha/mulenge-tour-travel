<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Destination;
use App\Models\DestinationLocation;
use Illuminate\Http\Request;

class DestinationsController extends Controller
{
    public function index()
    {
        $destinations = Destination::all();
        return view('admin.destinations.index', compact('destinations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $data = $request->all();

        if ($images = $request->file('image')) {
            $destinationPath = 'image/destinations/';
            $profileImage = date('YmdHis') . "." . $images->getClientOriginalExtension();
            $images->move($destinationPath, $profileImage);
            $data['image'] = "$profileImage";
        }

        Destination::create($data);

        return redirect()->back()->with('success', 'Destination created successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $data = $request->all();

        if ($images = $request->file('image')) {
            $destinationPath = 'image/destinations/';
            $profileImage = date('YmdHis') . "." . $images->getClientOriginalExtension();
            $images->move($destinationPath, $profileImage);
            $data['image'] = "$profileImage";
        }

        $destination = Destination::findOrFail($id);

        $destination->update($data);

        return redirect()->back()->with('success', 'Destination updated successfully.');
    }

    public function destroy($id)
    {
        $destination = Destination::findOrFail($id);
        $destination->delete();

        return redirect()->back()->with('success', 'Destination deleted successfully.');
    }
    public function indexLocation()
    {
        $locations = DestinationLocation::with('destination')->get();
        $destinations = Destination::all();
        return view('admin.destinations.locations', compact('locations', 'destinations'));
    }

    public function storeLocation(Request $request)
    {
        $request->validate([
            'destination_id' => 'required|exists:destinations,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'images' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $data = $request->all();

        if ($images = $request->file('images')) {
            $destinationPath = 'image/destinations/';
            $profileImage = date('YmdHis') . "." . $images->getClientOriginalExtension();
            $images->move($destinationPath, $profileImage);
            $data['images'] = "$profileImage";
        }

        DestinationLocation::create($data);

        return redirect()->back()->with('success', 'Location added successfully.');
    }

    public function updateLocation(Request $request, $id)
    {
        $request->validate([
            'destination_id' => 'required|exists:destinations,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'images' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $data = $request->all();

        if ($images = $request->file('images')) {
            $destinationPath = 'image/destinations/';
            $profileImage = date('YmdHis') . "." . $images->getClientOriginalExtension();
            $images->move($destinationPath, $profileImage);
            $data['images'] = "$profileImage";
        }

        $location = DestinationLocation::findOrFail($id);

        $location->update($data);

        return redirect()->back()->with('success', 'Location updated successfully.');
    }

    public function destroyLocation($id)
    {
        $location = DestinationLocation::findOrFail($id);
        $location->delete();

        return redirect()->back()->with('success', 'Location deleted successfully.');
    }
}
