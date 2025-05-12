@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Tour</h1>

    <!-- Display errors -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.tours.update', $tour->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Tour Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $tour->name) }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" required>{{ old('description', $tour->description) }}</textarea>
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" name="price" id="price" class="form-control" value="{{ old('price', $tour->price) }}" required>
        </div>

        <div class="form-group">
            <label for="location">Location</label>
            <input type="text" name="location" id="location" class="form-control" value="{{ old('location', $tour->location) }}" required>
        </div>

        <div class="form-group">
            <label for="duration">Duration (in days)</label>
            <input type="number" name="duration" id="duration" class="form-control" value="{{ old('duration', $tour->duration) }}" required>
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control" required>
                <option value="active" {{ $tour->status == 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ $tour->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Update Tour</button>
    </form>
</div>
@endsection
