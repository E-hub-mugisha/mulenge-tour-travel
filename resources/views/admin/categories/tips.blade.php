@extends('layouts.app')
@section('title','Tour Tips | Mulenge Tour')
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
                    <h3>Tour Tips</h3>
                    <div class="d-flex justify-content-end">

                        <!-- Button to Open Create Modal -->
                        <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createTourTipsModal">
                            Add Tour tips
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <p class="card-title"></p>
                    <table class="table table-hover" id="dataTables-example" width="100%">
                        <thead>
                            <tr>
                                <th>title</th>
                                <th>content</th>
                                <th>Image</th>
                                <th>Read time</th>
                                <th>Author</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tips as $tip)
                            <tr>
                                <td>{{ $tip->title }}</td>
                                <td>{{ $tip->content }}</td>
                                <td><img src="{{ asset('image/tips/' . $tip->images) }}" class="img-fluid mb-2" alt="tip Image" height="50" width="50"></td>
                                <td>{{ $tip->read_time }}</td>
                                <td>{{ $tip->author->name }}</td>
                                <td>{{ $tip->category->name }}</td>
                                <td>{{ $tip->status }}</td>
                                <td>
                                    <!-- Edit Button -->
                                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#edittipModal{{ $tip->id }}">
                                        Edit
                                    </button>

                                    <!-- Delete Button -->
                                    <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#deleteTipModal{{ $tip->id }}">
                                        Delete
                                    </button>
                                </td>
                            </tr>

                            <!-- Edit Modal -->
                            <div class="modal fade" id="editTipModal{{ $tip->id }}" tabindex="-1">
                                <div class="modal-dialog">
                                    <form action="{{ route('admin.tour-tips.update', $tip->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit tip</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label class="form-label">Title</label>
                                                    <input type="text" name="title" value="{{ $tip->title }}" class="form-control" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">content</label>
                                                    <textarea name="content" class="form-control">{{ $tip->content }}</textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Category</label>
                                                    <select name="category_id" class="form-control" required>
                                                        @foreach($categories as $category)
                                                        <option value="{{ $category->id }}" {{ $tip->category_id == $category->id ? 'selected' : '' }}>
                                                            {{ $category->name }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Read Time</label>
                                                    <input type="text" name="read_time" value="{{ $tip->read_time }}" class="form-control" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Image</label>
                                                    <input type="file" name="images" value="{{ $tip->images }}" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <!-- Delete Modal -->
                            <div class="modal fade" id="deletetipModal{{ $tip->id }}" tabindex="-1">
                                <div class="modal-dialog">
                                    <form action="{{ route('admin.tour-tips.destroy', $tip->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Confirm Delete</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure you want to delete {{ $tip->name }}?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </div>
                                        </div>
                                    </form>
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
<!-- Create tip Modal -->
<div class="modal fade" id="createTourTipsModal" tabindex="-1">
    <div class="modal-dialog">
        <form action="{{ route('admin.tour-tips.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add tip</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">content</label>
                        <textarea name="content" class="form-control"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Category</label>
                        <select name="category_id" class="form-control" required>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}">
                                {{ $category->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Read Time</label>
                        <input type="text" name="read_time" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Image</label>
                        <input type="file" name="images" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection