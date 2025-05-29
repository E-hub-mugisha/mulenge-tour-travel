@extends('layouts.app')
@section('title', 'Booking Detail | Mulenge Tours')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card col-md-8 mt-5" id="receiptContent">
            <!-- Display success message -->
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            <!-- Booking details -->
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4>Booking & Payment Information</h4>
                <button class="btn btn-sm btn-primary" onclick="printReceipt()">
                    <i class="fa fa-print"></i> Print / Download Receipt
                </button>
            </div>

            <div class="card-body">
                <h5>📌 Booking Info</h5>
                <p><strong>Tour Name:</strong> {{ $booking->tour->name }}</p>
                <p><strong>User:</strong> {{ $booking->user->name }}</p>
                <p><strong>Email:</strong> {{ $booking->user->email }}</p>
                <p><strong>Booking Date:</strong> {{ $booking->booking_date }}</p>
                <p><strong>Status:</strong> {{ ucfirst($booking->status) }}</p>

                @if($booking->tour)
                <hr>
                <h5>🧭 Tour Details</h5>
                <p><strong>Destination:</strong> {{ $booking->tour->destination->name }}</p>
                <p><strong>Location:</strong> {{ $booking->tour->location }}</p>
                <p><strong>Duration:</strong> {{ $booking->tour->duration }}</p>
                <p><strong>Description:</strong> {{ $booking->tour->description }}</p>
                @endif

                @if($booking->payment)
                <hr>
                <h5>💳 Payment Details</h5>
                <p><strong>Amount Paid:</strong> ${{ number_format($booking->payment->amount, 2) }}</p>
                <p><strong>Method:</strong> {{ ucfirst($booking->payment->method) }}</p>
                <p><strong>Date:</strong> {{ $booking->payment->created_at->format('F j, Y') }}</p>
                @endif

                <div class="mt-4">
                    <!-- <a href="{{ route('admin.bookings.edit', $booking->id) }}" class="btn btn-sm btn-warning">Edit Booking</a> -->
                    <button class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#updateBookingModal">Update Booking</button>
                    <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteBookingModal">Delete Booking</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JS to handle printing -->
<script>
    function printReceipt() {
        const content = document.getElementById('receiptContent').innerHTML;
        const original = document.body.innerHTML;
        document.body.innerHTML = content;
        window.print();
        document.body.innerHTML = original;
        location.reload();
    }
</script>

<!-- Update Modal -->
<div class="modal fade" id="updateBookingModal" tabindex="-1" aria-labelledby="updateBookingModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('admin.bookingsUpdateStatus', $booking->id) }}" method="POST" class="modal-content">
            @csrf
            @method('PUT')
            <div class="modal-header">
                <h5 class="modal-title" id="updateBookingModalLabel">Update Booking</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control">
                    <option value="confirmed" {{ $booking->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                    <option value="declined" {{ $booking->status == 'declined' ? 'selected' : '' }}>Declined</option>
                    <option value="cancelled" {{ $booking->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                </select>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button class="btn btn-danger" type="submit">Update</button>
            </div>
        </form>
    </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="deleteBookingModal" tabindex="-1" aria-labelledby="deleteBookingModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('admin.bookings.destroy', $booking->id) }}" method="POST" class="modal-content">
            @csrf
            @method('DELETE')
            <div class="modal-header">
                <h5 class="modal-title" id="deleteBookingModalLabel">Delete Booking</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this booking?
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button class="btn btn-danger" type="submit">Delete</button>
            </div>
        </form>
    </div>
</div>
@endsection
