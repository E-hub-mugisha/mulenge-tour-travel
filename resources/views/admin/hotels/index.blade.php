@extends('layouts.app')
@section('title', 'Hotels | Mulenge Tours')
@section('content')
<div class="container">
    <h1 class="mb-4">Hotels</h1>
    
    <a href="{{ route('admin.hotels.create') }}" class="btn btn-primary mb-3">Add New Hotel</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered" id="dataTables-example" width="100%">
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
                    <a href="{{ route('admin.hotels.show', $hotel->id) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route('admin.hotels.edit', $hotel->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <a href="{{ route('hotelImages.create', $hotel->id) }}" class="btn btn-warning btn-sm">Add Images</a>
                    <form action="{{ route('admin.hotels.destroy', $hotel->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $hotels->links() }}
</div>
@endsection
