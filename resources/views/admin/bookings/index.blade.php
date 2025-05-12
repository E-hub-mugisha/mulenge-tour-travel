@extends('layouts.app')
@section('title','Bookings | Mulenge Tours')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card mt-4">
                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
                <div class="card-header">
                    <h3>Booking Management Table</h3>
                    <div class="d-flex justify-content-end">
                        <!-- Button to trigger the modal -->
                        <button class="btn btn-sm btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#addBookingModal">Add Booking</button>
                    </div>
                </div>
                <!-- Bookings Table -->
                <div class="card-body">
                    <p class="card-title"></p>
                    <table class="table table-hover" id="dataTables-example" width="100%">
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
                                    <a href="{{ route('admin.booking.show', $booking->id )}}" class="btn btn-sm btn-info">view detail</a>
                                    <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteBookingModal{{ $booking->id }}">Delete</button>
                                </td>
                            </tr>

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
                                            <form action="{{ route('admin.bookings.destroy', $booking->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
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
                <form action="{{ route('admin.bookings.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="user_id">User</label>
                        <select name="user_id" id="user_id" class="form-control" required>
                            @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
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
                            <option value="confirmed">Confirmed</option>
                            <option value="canceled">Canceled</option>
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