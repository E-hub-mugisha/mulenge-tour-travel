@extends('layouts.app')
@section('title', 'Hotels | Mulenge Tours')
@section('content')
<div class="container">
    <h1 class="mb-4">Hotels</h1>
  
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table id="datatablesSimple" class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Location</th>
                <th>Price</th>
                <th>Rating</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($hotels as $hotel)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $hotel->name }}</td>
                <td>{{ $hotel->location }}</td>
                <td>${{ $hotel->price }}</td>
                <td>{{ $hotel->rating }} ⭐</td>
                <td>
                    <a href="{{ route('customer.hotels.show', $hotel->id) }}" class="btn btn-info btn-sm">View</a>
                    
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
