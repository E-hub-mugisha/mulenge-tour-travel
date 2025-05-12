@extends('layouts.app')
@section('title', 'Add Hotel Image')
@section('content')
<div class="container">
    <div class="row">
        <div class="card mt-3 p-3">
            <h3>Manage Images for {{ $hotel->name }}</h3>
        </div>

        <!-- Button to Open Add Modal -->
        <div class="card p-3">
            <div class="col-md-3 float-end mt-3">
                <a href="{{ route('admin.hotels.index') }}" class="btn btn-secondary btn-sm">Back to Hotels</a>
                <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addModal">Add Image</button>
            </div>
            <table class="table table-bordered" id="dataTables-example" width="100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($hotel->hotelImages as $image)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $hotel->name }}</td>
                        <td><img src="{{ asset('image/hotels/' . $image->images) }}" class="img-fluid mb-2" alt="Hotel Image" height="50" width="50"></td>
                        <td>
                            <form action="{{ route('hotelImages.destroy', $image->id) }}" method="POST" style="display:inline;">
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
    </div>
    <!-- Add transportation Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Image</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('hotelImages.store', $hotel->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <input class="form-control" name="type" id="type" value="{{ $hotel->hotel_type }}" hidden required>
                        <div class="mb-3">
                            <label class="form-label">Select Images</label>
                            <input type="file" name="images" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-success">Upload Images</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection