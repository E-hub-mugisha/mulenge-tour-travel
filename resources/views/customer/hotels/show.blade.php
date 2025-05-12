@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $hotel->name }}</h1>
    <p><strong>Location:</strong> {{ $hotel->location }}</p>
    <p><strong>Price:</strong> ${{ $hotel->price }}</p>
    <p><strong>Rating:</strong> {{ $hotel->rating }} ⭐</p>
    <p><strong>Total Rooms:</strong> {{ $hotel->total_rooms }}</p>
    <p><strong>Available Rooms:</strong> {{ $hotel->available_rooms }}</p>
    <p><strong>Check-in Time:</strong> {{ $hotel->check_in_time }}</p>
    <p><strong>Check-out Time:</strong> {{ $hotel->check_out_time }}</p>
    <p><strong>Address:</strong> {{ $hotel->address }}</p>
    <p><strong>Amenities:</strong> {{ $hotel->amenities }}</p>
    <p><strong>Hotel Type:</strong> {{ $hotel->hotel_type }}</p>
    <p><strong>Status:</strong> {{ ucfirst($hotel->status) }}</p>
    <p><strong>Contact Number:</strong> {{ $hotel->contact_number }}</p>
    <p><strong>Email:</strong> {{ $hotel->email }}</p>
    <p><strong>Website:</strong> <a href="{{ $hotel->website }}" target="_blank">{{ $hotel->website }}</a></p>

    <a href="{{ route('customer.hotels.index') }}" class="btn btn-secondary">Back</a>
</div>
@endsection
