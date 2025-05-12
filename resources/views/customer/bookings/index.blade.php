@extends('layouts.app')
@section('title','Bookings | Mulenge')
@section('content')
<div class="container">
    <h1>Booking Management</h1>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <!-- Button to trigger the modal -->
    <button class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#addBookingModal">Add Booking</button>

    <!-- Bookings Table -->
    <table id="datatablesSimple" class="table">
        <thead>
            <tr>
                <th>Tour Name</th>
                <th>User</th>
                <th>Booking Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bookings as $booking)
            <tr>
                <td>{{ $booking->tour->name }}</td>
                <td>{{ $booking->user->name }}</td>
                <td>{{ $booking->booking_date }}</td>
                <td>{{ $booking->status }}</td>
                <td>
                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#showBookingModal{{ $booking->id }}">view detail</button>
                    <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#rescheduleBookingModal{{ $booking->id }}">Reschedule</button>
                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteBookingModal{{ $booking->id }}">Cancel</button>
                </td>
            </tr>

            <!-- Booking Information Modal -->
            <div class="modal fade" id="showBookingModal{{ $booking->id }}" tabindex="-1" aria-labelledby="showBookingModalLabel{{ $booking->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="showBookingModalLabel{{ $booking->id }}">Booking Information</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p><strong>Tour Name:</strong> {{ $booking->tour->name }}</p>
                            <p><strong>User:</strong> {{ $booking->user->name }}</p>
                            <p><strong>Email:</strong> {{ $booking->user->email }}</p>
                            <p><strong>Booking Date:</strong> {{ $booking->booking_date }}</p>
                            <p><strong>Status:</strong> {{ ucfirst($booking->status) }}</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <form action="{{ route('customers.bookings.destroy', $booking->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-warning">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- reschedule Confirmation Modal -->
            <div class="modal fade" id="rescheduleBookingModal{{ $booking->id }}" tabindex="-1" aria-labelledby="rescheduleBookingModalLabel{{ $booking->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="rescheduleBookingModalLabel{{ $booking->id }}">Confirm Deletion</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('customers.bookings.reschedule', $booking->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="modal-body">
                                Are you sure you want to reschedule this booking?
                                <div class="form-group mt-3">
                                    <label for="booking_date">Booking Date</label>
                                    <input type="date" name="booking_date" id="booking_date" class="form-control" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-success">Reschedule</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Delete Confirmation Modal -->
            <div class="modal fade" id="deleteBookingModal{{ $booking->id }}" tabindex="-1" aria-labelledby="deleteBookingModalLabel{{ $booking->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteBookingModalLabel{{ $booking->id }}">Confirm Deletion</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete this booking?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <form action="{{ route('customers.bookings.destroy', $booking->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Add Booking Modal -->
<div class="modal fade" id="addBookingModal" tabindex="-1" aria-labelledby="addBookingModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addBookingModalLabel">Add Booking</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('customer.bookings.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input hidden type="text" name="user_id" id="user_id" value="{{ Auth::user()->id }}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="tour_id">Tour</label>
                        <select name="tour_id" id="tour_id" class="form-control" required>
                            @foreach($tours as $tour)
                            <option value="{{ $tour->id }}">{{ $tour->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="booking_date">Booking Date</label>
                        <input type="date" name="booking_date" id="booking_date" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control" required>
                            <option value="pending">Pending</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="number_of_guests">Number of Guests</label>
                        <input type="number" name="number_of_guests" id="number_of_guests" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="total_price">Total Price</label>
                        <input type="number" name="total_price" id="total_price" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Add Booking</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection