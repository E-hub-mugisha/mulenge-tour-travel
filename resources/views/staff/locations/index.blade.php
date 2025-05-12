<!-- resources/views/staff/locations/index.blade.php -->

@extends('layouts.app')
@section('title', 'Locations | Mulenge')
@section('content')
<div class="container">
    <h1>Manage Locations</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Add Location Button Triggering Modal -->
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addLocationModal">Add Location</button>

    <!-- Location Table -->
    <table id="datatablesSimple" class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Country</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($locations as $location)
            <tr>
                <td>{{ $location->name }}</td>
                <td>{{ $location->description }}</td>
                <td>{{ $location->country }}</td>
                <td>
                    <!-- Edit Button Triggering Modal -->
                    <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editLocationModal{{ $location->id }}">
                        Edit
                    </button>

                    <!-- Delete Button Triggering Confirmation Modal -->
                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteConfirmationModal{{ $location->id }}">
                        Delete
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Add Location Modal -->
<div class="modal fade" id="addLocationModal" tabindex="-1" aria-labelledby="addLocationModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addLocationModalLabel">Add New Location</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('staff.locations.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Location Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="country" class="form-label">Country</label>
                        <input type="text" class="form-control" id="country" name="country" required>
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Location Image (Optional)</label>
                        <input type="file" class="form-control" id="image" name="image">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Location</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Location Modal -->
@foreach($locations as $location)
<div class="modal fade" id="editLocationModal{{ $location->id }}" tabindex="-1" aria-labelledby="editLocationModalLabel{{ $location->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editLocationModalLabel{{ $location->id }}">Edit Location</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('staff.locations.update', $location->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="edit-name{{ $location->id }}" class="form-label">Location Name</label>
                        <input type="text" class="form-control" id="edit-name{{ $location->id }}" name="name" value="{{ $location->name }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="edit-description{{ $location->id }}" class="form-label">Description</label>
                        <textarea class="form-control" id="edit-description{{ $location->id }}" name="description" rows="4" required>{{ $location->description }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="edit-country{{ $location->id }}" class="form-label">Country</label>
                        <input type="text" class="form-control" id="edit-country{{ $location->id }}" name="country" value="{{ $location->country }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="edit-image{{ $location->id }}" class="form-label">Location Image (Optional)</label>
                        <input type="file" class="form-control" id="edit-image{{ $location->id }}" name="image">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

<!-- Delete Confirmation Modal -->
@foreach($locations as $location)
<div class="modal fade" id="deleteConfirmationModal{{ $location->id }}" tabindex="-1" aria-labelledby="deleteConfirmationModalLabel{{ $location->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteConfirmationModalLabel{{ $location->id }}">Confirm Deletion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete the location <strong>{{ $location->name }}</strong>?</p>
            </div>
            <div class="modal-footer">
                <form action="{{ route('staff.locations.destroy', $location->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection
