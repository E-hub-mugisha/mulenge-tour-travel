@extends('layouts.app')
@section('title', 'Edit Tour | Admin Mulenge')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-sm border-radious-0 mb-5 mt-5 py-4 px-4">
                <h3 class="mb-4">Edit Tour</h3>
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
                    <div class="row">
                        <div class="col-md-4 mb-3 form-group">
                            <label for="name">Tour Name</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $tour->name) }}" required>
                        </div>
                        <div class="col-md-4 mb-3 form-group">
                            <label for="destinations">Destination</label>
                            <select name="destination_id" id="destination_id" class="form-control" required>
                                @foreach ($destinations as $destination)
                                <option value="{{ $destination->id }}">{{ $destination->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-4 mb-3 form-group">
                            <label for="location">Location</label>
                            <input type="text" name="location" id="location" class="form-control" value="{{ old('location', $tour->location) }}" required>
                        </div>
                        <div class="col-md-6 mb-3 form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" class="form-control" required>{{ $tour->description }}</textarea>
                        </div>

                        <div class="col-md-6 mb-3 form-group">
                            <label for="trip_highlights">trip_highlights</label>
                            <textarea name="trip_highlights" id="trip_highlights" class="form-control" required>{{ $tour->trip_highlights }}</textarea>
                        </div>

                        <div class="col-md-6 mb-3 form-group">
                            <label for="included">included</label>
                            <textarea name="included" id="included" class="form-control" required>{{ $tour->included }}</textarea>
                        </div>

                        <div class="col-md-6 mb-3 form-group">
                            <label for="exclude">exclude</label>
                            <textarea name="exclude" id="exclude" class="form-control" required>{{ $tour->exclude }}</textarea>
                        </div>

                        <div class="col-md-4 mb-3 form-group">
                            <label for="price">Price</label>
                            <input type="number" name="price" id="price" class="form-control" required value="{{ $tour->price }}">
                        </div>


                        <div class="col-md-4 mb-3 form-group">
                            <label for="duration">Duration (in days)</label>
                            <input type="number" name="duration" id="duration" class="form-control" required value="{{ old('duration', $tour->duration) }}">
                        </div>

                        <div class="col-md-4 mb-3 form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control" required>
                                <option value="active" {{ $tour->status == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ $tour->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>

                        <!-- Activities Selection -->
                        <div class="col-md-4 mb-3 form-group">
                            <label for="activities">Activities</label>
                            <select name="activities[]" id="activities" class="form-control" required>
                                @foreach ($activities as $activity)
                                <option value="{{ $activity->id }}">{{ $activity->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Accommodations Selection -->
                        <div class="col-md-4 mb-3 form-group">
                            <label for="accommodations">Accommodations</label>
                            <select name="accommodations[]" id="accommodations" class="form-control" required>
                                @foreach ($accommodations as $accommodation)
                                <option value="{{ $accommodation->id }}">{{ $accommodation->type_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Transportation Selection -->
                        <div class="col-md-4 mb-3 form-group">
                            <label for="transportation">Transportation</label>
                            <select name="transportation[]" id="transportation" class="form-control" required>
                                @foreach ($transportations as $transportation)
                                <option value="{{ $transportation->id }}">{{ $transportation->type_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-primary mt-3">Update Tour</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

