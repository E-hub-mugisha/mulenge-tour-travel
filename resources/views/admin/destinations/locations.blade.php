@extends('layouts.app')
@section('title','Destination Location | Mulenge Tours')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card mt-5">
                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
                <div class="card-header">
                    <h2>Destination Locations</h2>
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createModal">Add Location</button>
                    </div>
                </div>
                <div class="card-body">
                    <p class="card-title"></p>
                    <table class="table table-hover" id="dataTables-example" width="100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Destination</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Images</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($locations as $index => $location)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $location->destination->name }}</td>
                                <td>{{ $location->name }}</td>
                                <td>{{ $location->description }}</td>
                                <td>
                                    @if ($location->images)
                                    <img class="tg-card-border w-100" src="{{ asset('image/destinations/' . $location->images) }}" alt="listing" height="50" width="50">
                                    @else
                                    <img class="tg-card-border w-100" src="{{ asset('image/tours/default.jpg') }}" alt="No image available">
                                    @endif
                                </td>
                                <td>
                                    <!-- Edit Button -->
                                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $location->id }}">
                                        Edit
                                    </button>

                                    <!-- Delete Form -->
                                    <form action="{{ route('admin.destination-locations.destroy', $location->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>

                            <!-- Edit Modal -->
                            <div class="modal fade" id="editModal{{ $location->id }}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit Destination Location</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <form action="{{ route('admin.destination-locations.update', $location->id) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label class="form-label">Destination</label>
                                                    <select name="destination_id" class="form-control" required>
                                                        @foreach($destinations as $destination)
                                                        <option value="{{ $destination->id }}" {{ $location->destination_id == $destination->id ? 'selected' : '' }}>
                                                            {{ $destination->name }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Location Name</label>
                                                    <input type="text" name="name" class="form-control" value="{{ $location->name }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Description</label>
                                                    <textarea name="description" class="form-control">{{ $location->description }}</textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Image</label>
                                                    <input type="file" name="images" class="form-control" value="{{ $location->images }}">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </div>
                                        </form>
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
<!-- Create Modal -->
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Destination Location</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('admin.destination-locations.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Destination</label>
                        <select name="destination_id" class="form-control" required>
                            @foreach($destinations as $destination)
                            <option value="{{ $destination->id }}">{{ $destination->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Location Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Image</label>
                        <input type="file" name="images" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection