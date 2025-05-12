<?php

namespace App\Http\Controllers\Staff;

use App\Models\Booking;
use App\Models\User;
use App\Models\Tour;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookingController extends Controller
{
    // Show all bookings
    public function index()
    {
        $bookings = Booking::with('tour', 'user')->get(); // Include tour and user details
        $tours = Tour::all();
        $users = User::all();
        return view('staff.bookings.index', compact('bookings', 'tours', 'users'));
    }

    // Show form to create a new booking
    public function create()
    {
        $users = User::all();
        $tours = Tour::all();
        return view('staff.bookings.create', compact('users', 'tours'));
    }

    // Store a new booking
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

        return redirect()->route('staff.bookings.index')->with('success', 'Booking created successfully!');
    }

    // Show form to edit an existing booking
    public function edit($id)
    {
        $booking = Booking::findOrFail($id);
        $users = User::all();
        $tours = Tour::all();
        return view('staff.bookings.edit', compact('booking', 'users', 'tours'));
    }

    // Update an existing booking
    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'tour_id' => 'required|exists:tours,id',
            'booking_date' => 'required|date',
            'status' => 'required|string|in:pending,confirmed,canceled',
            'number_of_guests' => 'required|integer|min:1',
            'total_price' => 'required|numeric|min:0',
        ]);

        $booking = Booking::findOrFail($id);
        $booking->update($request->all());

        return redirect()->route('staff.bookings.index')->with('success', 'Booking updated successfully!');
    }

    // Delete a booking
    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();

        return redirect()->route('staff.bookings.index')->with('success', 'Booking deleted successfully!');
    }
    public function show($id)
    {
        $booking = Booking::with('tour', 'user')->findOrFail($id); // Load the booking with tour and user data
        return view('staff.bookings.show', compact('booking'));
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

        return redirect()->route('staff.bookings.index', $id)->with('success', 'Booking status updated successfully!');
    }
}
