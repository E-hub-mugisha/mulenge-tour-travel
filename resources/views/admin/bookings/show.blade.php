@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Booking Details</h1>

    <!-- Display success message if any -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Display booking details -->
    <div class="card">
        <div class="card-header">
            <h4>Booking Information</h4>
        </div>
        <div class="card-body">
            <p><strong>Tour Name:</strong> {{ $booking->tour->name }}</p>
            <p><strong>User:</strong> {{ $booking->user->name }}</p>
            <p><strong>Email:</strong> {{ $booking->user->email }}</p>
            <p><strong>Booking Date:</strong> {{ $booking->booking_date }}</p>
            <p><strong>Status:</strong> {{ ucfirst($booking->status) }}</p>

            <form action="{{ route('admin.bookings.updateStatus', $booking->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="status">Update Status</label>
                    <select name="status" id="status" class="form-control">
                        <option value="confirmed" {{ $booking->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                        <option value="declined" {{ $booking->status == 'declined' ? 'selected' : '' }}>Declined</option>
                        <option value="cancelled" {{ $booking->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary mt-3">Update Status</button>
            </form>

            <div class="mt-3">
                <a href="{{ route('admin.bookings.edit', $booking->id) }}" class="btn btn-warning">Edit Booking</a>
                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteBookingModal">Delete Booking</button>
            </div>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteBookingModal" tabindex="-1" aria-labelledby="deleteBookingModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteBookingModalLabel">Confirm Deletion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this booking?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <form action="{{ route('admin.bookings.destroy', $booking->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
