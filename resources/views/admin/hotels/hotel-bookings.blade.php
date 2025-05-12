@extends('layouts.app')
@section('title','Hotel Bookings | Mulenge Tours')
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
                    <h3>@yield('title')</h3>
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
                                <th>Hotel Name</th>
                                <th>User</th>
                                <th>Rooms</th>
                                <th>Guests</th>
                                <th>Check In</th>
                                <th>Check Out</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($hotelBookings as $hotel)
                            <tr>
                                <td>{{ $hotel->hotel->name }}</td>
                                <td>{{ $hotel->user->name }}</td>
                                <td>{{ $hotel->number_of_rooms }}</td>
                                <td>{{ $hotel->number_of_guests }}</td>
                                <td>{{ $hotel->checkin_date }}</td>
                                <td>{{ $hotel->checkout_date }}</td>
                                <td>{{ $hotel->booking_status }}</td>
                                <td>
                                    <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#showHotelBookingModal{{ $hotel->id }}">view detail</button>
                                    <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteBookingModal{{ $hotel->id }}">Delete</button>
                                </td>
                            </tr>

                            <!-- Delete Confirmation Modal -->
                            <div class="modal fade" id="showHotelBookingModal{{ $hotel->id }}" tabindex="-1" aria-labelledby="showHotelBookingModalLabel{{ $hotel->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="showHotelBookingModalLabel{{ $hotel->id }}">Hotel Booking Details</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p><strong>Hotel Name: &nbsp;</strong>{{ $hotel->hotel->name }}</p>
                                            <p><strong>User: &nbsp;</strong>{{ $hotel->user->name }}</p>
                                            <p><strong>Rooms: &nbsp;</strong>{{ $hotel->number_of_rooms }}</p>
                                            <p><strong>Guests: &nbsp;</strong>{{ $hotel->number_of_guests }}</p>
                                            <p><strong>Check In: &nbsp;</strong>{{ $hotel->checkin_date }}</p>
                                            <p><strong>Check Out: &nbsp;</strong>{{ $hotel->checkout_date }}</p>
                                            <p><strong>Status: &nbsp;</strong><span class="badge bg-info">{{ $hotel->booking_status }}</span></p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            <form action="{{ route('admin.HotelBookings.destroy', $hotel->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Delete Confirmation Modal -->
                            <div class="modal fade" id="deleteBookingModal{{ $hotel->id }}" tabindex="-1" aria-labelledby="deleteBookingModalLabel{{ $hotel->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteBookingModalLabel{{ $hotel->id }}">Confirm Deletion</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to delete this booking?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            <form action="{{ route('admin.HotelBookings.destroy', $hotel->id) }}" method="POST">
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

@endsection