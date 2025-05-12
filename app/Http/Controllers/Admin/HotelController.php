<?php

namespace App\Http\Controllers\Admin;

use App\Models\Hotel;
use App\Models\Destination;
use App\Http\Controllers\Controller;
use App\Models\HotelBooking;
use App\Models\HotelImage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class HotelController extends Controller
{
    public function index()
    {
        $hotels = Hotel::with('destination')->paginate(10);
        return view('admin.hotels.index', compact('hotels'));
    }

    public function create()
    {
        $destinations = Destination::all();
        return view('admin.hotels.create', compact('destinations'));
    }


    public function storeHotel(Request $request)
    {
        $request->validate([
            'destination_id' => 'required',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'location' => 'required|string',
            'total_rooms' => 'required|integer',
            'available_rooms' => 'required|integer',
            'rating' => 'required|numeric|between:0,5',
            'address' => 'nullable|string',
            'amenities' => 'nullable|string',
            'check_in_time' => 'required|date_format:H:i',
            'check_out_time' => 'required|date_format:H:i',
            'images' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'hotel_type' => 'nullable|string',
            'status' => 'required|string|in:active,inactive',
            'contact_number' => 'nullable|string',
            'email' => 'nullable|email',
            'website' => 'nullable|url',
        ]);

        $data = $request->all();

        // Handle image upload
        if ($images = $request->file('images')) {
            $destinationPath = 'image/hotels/';
            $profileImage = date('YmdHis') . "." . $images->getClientOriginalExtension();
            $images->move($destinationPath, $profileImage);
            $data['images'] = "$profileImage";
        }

        // Store the hotel
        Hotel::create($data);

        return redirect()->route('admin.hotels.index')->with('success', 'Hotel created successfully!');
    }

    public function show($id)
    {
        $hotel = Hotel::findOrFail($id);
        $hotelImages = HotelImage::where('hotel_id', $hotel->id)->get();
        return view('admin.hotels.show', compact('hotel', 'hotelImages'));
    }

    public function edit($id)
    {
        $hotel = Hotel::findOrFail($id);
        $destinations = Destination::all();
        return view('admin.hotels.edit', compact('hotel', 'destinations'));
    }

    public function updateHotel(Request $request, $id)
    {
        $hotel = Hotel::findOrFail($id);

        $request->validate([
            'destination_id' => 'required',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'location' => 'required|string',
            'total_rooms' => 'required|integer',
            'available_rooms' => 'required|integer',
            'rating' => 'nullable|numeric|min:0|max:5',
            'address' => 'required|string',
            'amenities' => 'nullable|string',
            'check_in_time' => 'required',
            'check_out_time' => 'required',
            'images' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'hotel_type' => 'required|string',
            'status' => 'required|in:active,inactive',
            'contact_number' => 'required|string',
            'email' => 'required|email|unique:hotels,email,' . $hotel->id,
            'website' => 'nullable|url',
        ]);

        $data = $request->only([
            'destination_id',
            'name',
            'description',
            'price',
            'location',
            'total_rooms',
            'available_rooms',
            'rating',
            'address',
            'amenities',
            'check_in_time',
            'check_out_time',
            'hotel_type',
            'status',
            'contact_number',
            'email',
            'website',
            'images'
        ]);

        if ($images = $request->file('images')) {
            $destinationPath = 'image/hotels/';
            $profileImage = date('YmdHis') . "." . $images->getClientOriginalExtension();
            $images->move($destinationPath, $profileImage);
            $data['images'] = "$profileImage";
        }

        // Update the hotel with the new data
        $hotel->update($data);

        return redirect()->route('admin.hotels.index')->with('success', 'Hotel updated successfully.');
    }


    public function destroy($id)
    {
        $hotel = Hotel::findOrFail($id);
        $hotel->delete();
        return redirect()->route('admin.hotels.index')->with('success', 'Hotel deleted successfully.');
    }

    // Store multiple images
    public function storeImageHotel(Request $request, $hotelId)
    {
        $request->validate([
            'type' => 'required',
            'images' => 'required|mimes:jpeg,png,jpg,gif,svg', // Validate each image
        ]);

        $hotel = Hotel::findOrFail($hotelId);

        if ($images = $request->file('images')) {
            $destinationPath = 'image/hotels/';
            $profileImage = date('YmdHis') . "." . $images->getClientOriginalExtension();
            $images->move($destinationPath, $profileImage);
            $hotels['images'] = "$profileImage";
        }
        $hotels = new HotelImage();
        $hotels->hotel_id = $hotel->id;
        $hotels->type = $request->input('type');
        $hotels->images = $profileImage;
        $hotels->save();

        return redirect()->back()->with('success', 'Images uploaded successfully.');
    }

    // Delete a specific image
    public function destroyImageHotel($id)
    {
        $image = HotelImage::findOrFail($id);

        // Delete image from storage
        Storage::delete('public/' . $image->image_path);

        // Delete record from database
        $image->delete();

        return redirect()->back()->with('success', 'Image deleted successfully.');
    }

    public function createImages($id)
    {
        $hotel = Hotel::findOrFail($id);
        return view('admin.hotels.upload_images', compact('hotel'));
    }

    // Show all bookings
    public function indexHotelBooking()
    {
        $hotelBookings = HotelBooking::all(); // Include tour and user details
        return view('admin.hotels.hotel-bookings', compact('hotelBookings'));
    }
}