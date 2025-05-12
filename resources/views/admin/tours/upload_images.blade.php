@extends('layouts.app')
@section('title', 'Add Tour Image')
@section('content')
<div class="container">
    <div class="row">
        <div class="card mt-3 p-3">
            <h3>Manage Images for {{ $tour->name }}</h3>
        </div>

        <!-- Button to Open Add Modal -->
        <div class="card p-3">
            <div class="col-md-3 float-end mt-3">
                <a href="{{ route('admin.tours.index') }}" class="btn btn-secondary btn-sm">Back to tours</a>
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
                    @foreach($tour->tourImages as $image)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $tour->name }}</td>
                        <td><img src="{{ asset('image/tours/' . $image->images) }}" class="img-fluid mb-2" alt="tour Image" height="50" width="50"></td>
                        <td>
                            <form action="{{ route('tourImages.destroy', $image->id) }}" method="POST" style="display:inline;">
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
                    <form action="{{ route('tourImages.store', $tour->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf

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