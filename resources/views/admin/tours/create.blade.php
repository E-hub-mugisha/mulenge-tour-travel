@extends('layouts.app')
@section('title', 'Create Tour | Admin Mulenge')
@section('content')

<div class="container">
    <h1>Create Tour</h1>
    <form action="{{ route('admin.tours.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Tour Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" required></textarea>
        </div>

        <div class="form-group">
            <label for="trip_highlights">trip_highlights</label>
            <textarea name="trip_highlights" id="trip_highlights" class="form-control" required></textarea>
        </div>

        <div class="form-group">
            <label for="included">included</label>
            <textarea name="included" id="included" class="form-control" required></textarea>
        </div>

        <div class="form-group">
            <label for="exclude">exclude</label>
            <textarea name="exclude" id="exclude" class="form-control" required></textarea>
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" name="price" id="price" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="location">Location</label>
            <input type="text" name="location" id="location" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="duration">Duration (in days)</label>
            <input type="number" name="duration" id="duration" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control" required>
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
            </select>
        </div>

        <!-- Activities Selection -->
        <div class="form-group">
            <label for="activities">Activities</label>
            <select name="activities[]" id="activities" class="form-control" multiple required>
                @foreach ($activities as $activity)
                    <option value="{{ $activity->id }}">{{ $activity->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Accommodations Selection -->
        <div class="form-group">
            <label for="accommodations">Accommodations</label>
            <select name="accommodations[]" id="accommodations" class="form-control" multiple required>
                @foreach ($accommodations as $accommodation)
                    <option value="{{ $accommodation->id }}">{{ $accommodation->type_name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Transportation Selection -->
        <div class="form-group">
            <label for="transportation">Transportation</label>
            <select name="transportation[]" id="transportation" class="form-control" multiple required>
                @foreach ($transportations as $transportation)
                    <option value="{{ $transportation->id }}">{{ $transportation->type_name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Create Tour</button>
    </form>
</div>
@endsection
