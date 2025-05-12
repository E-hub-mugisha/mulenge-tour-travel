@extends('layouts.app')
@section('title', 'Tours | Mulenge')
@section('content')
<div class="container">
    <h1>Tour Management</h1>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <table id="datatablesSimple" class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Location</th>
                <th>Duration</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tours as $tour)
            <tr>
                <td>{{ $tour->name }}</td>
                <td>{{ $tour->description }}</td>
                <td>{{ $tour->price }}</td>
                <td>{{ $tour->location }}</td>
                <td>{{ $tour->duration }} days</td>
                <td>{{ ucfirst($tour->status) }}</td>
                <td>
                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#showTourModal{{ $tour->id }}">view detail</button>
                    <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#bookTourModal{{ $tour->id }}">Book Now</button>
                </td>
            </tr>

            <!-- tour Information Modal -->
            <div class="modal fade" id="showTourModal{{ $tour->id }}" tabindex="-1" aria-labelledby="showTourModalLabel{{ $tour->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="showTourModalLabel{{ $tour->id }}">Tour Information</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p><strong>Tour Name:</strong> {{ $tour->name }}</p>
                            <p><strong>Destination:</strong> {{ $tour->destination->name }}</p>
                            <p><strong>Location:</strong> {{ $tour->location }}</p>
                            <p><strong>Duration:</strong> {{ $tour->duration }}</p>
                            <p><strong>Status:</strong> {{ ucfirst($tour->status) }}</p>
                            <p><strong>Description:</strong> {{ $tour->description }}</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- tour Confirmation Modal -->
            <div class="modal fade" id="bookTourModal{{ $tour->id }}" tabindex="-1" aria-labelledby="bookTourModalLabel{{ $tour->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="bookTourModalLabel{{ $tour->id }}">{{ $tour->name }} Tour Booking</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('customers.bookings.tour', $tour->id) }}" method="POST">
                            @csrf
                            <div class="modal-body">
                            <div class="form-group mt-3">
                                    <label for="number_of_guests">Number of Guests</label>
                                    <input type="integer" name="number_of_guests" id="number_of_guests" class="form-control" required>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="booking_date">Booking Date</label>
                                    <input type="date" name="booking_date" id="booking_date" class="form-control" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </tbody>
    </table>
</div>
@endsection