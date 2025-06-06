@extends('layouts.app')
@section('title','Travel Package | Mulenge Tours')
@section('content')
<div class="container">
    <h1>Tour Management</h1>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('admin.tours.create') }}" class="btn btn-primary mb-4">Create Tour</a>

    <table id="dataTables-example" width="100%" class="table">
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
                        <a href="{{ route('admin.tours.edit', $tour->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <a href="{{ route('tourImages.create', $tour->id) }}" class="btn btn-success btn-sm">Images</a>
                        <form action="{{ route('admin.tours.destroy', $tour->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
