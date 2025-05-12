@extends('layouts.app')
@section('title', 'Edit Hotels | Mulenge Tours')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-sm border-radious-0 mb-5 mt-5 py-4 px-4">
                <h3 class="mb-4">Edit Hotel</h3>

                <form action="{{ route('admin.hotelUpdate', $hotel->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Hotel Name</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{ $hotel->name }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Hotel Type</label>
                            <input type="text" id="hotel_type" name="hotel_type" class="form-control" value="{{ $hotel->hotel_type }}">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Contact Number</label>
                            <input type="tel" name="contact_number" id="contact_number" class="form-control" value="{{ $hotel->contact_number }}">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ $hotel->email }}">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">Website</label>
                            <input type="url" name="website" id="website" class="form-control" value="{{ $hotel->website }}">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Destination</label>
                            <select name="destination_id" id="destination_id" class="form-control" required>
                                @foreach($destinations as $destination)
                                <option value="{{ $destination->id }}" {{ $hotel->destination_id == $destination->id ? 'selected' : '' }}>
                                    {{ $destination->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Location</label>
                            <input type="text" id="location" name="location" class="form-control" value="{{ $hotel->location }}" required>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">Address</label>
                            <input type="text" id="address" name="address" class="form-control" value="{{ $hotel->address }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Description</label>
                            <textarea id="description" name="description" class="form-control">{{ $hotel->description }}</textarea>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Amenities</label>
                            <textarea id="amenities" name="amenities" class="form-control">{{ $hotel->amenities }}</textarea>
                        </div>

                        <div class="col-md-3 mb-3">
                            <label class="form-label">Price (USD)</label>
                            <input type="number" id="price" name="price" class="form-control" value="{{ $hotel->price }}" required>
                        </div>

                        <div class="col-md-3 mb-3">
                            <label class="form-label">Total Rooms</label>
                            <input type="number" id="total_rooms" name="total_rooms" class="form-control" value="{{ $hotel->total_rooms }}" required>
                        </div>

                        <div class="col-md-3 mb-3">
                            <label class="form-label">Available Rooms</label>
                            <input type="number" id="available_rooms" name="available_rooms" class="form-control" value="{{ $hotel->available_rooms }}" required>
                        </div>

                        <div class="col-md-3 mb-3">
                            <label class="form-label">Rating</label>
                            <input type="number" id="rating" name="rating" class="form-control" value="{{ $hotel->rating }}" step="0.1" min="0" max="5" required>
                        </div>

                        <div class="col-md-3 mb-3">
                            <label class="form-label">Check-in Time</label>
                            <input type="time" id="check_in_time" name="check_in_time" class="form-control" value="{{ $hotel->check_in_time }}" required>
                        </div>

                        <div class="col-md-3 mb-3">
                            <label class="form-label">Check-out Time</label>
                            <input type="time" id="check_out_time" name="check_out_time" class="form-control" value="{{ $hotel->check_out_time }}" required>
                        </div>

                        <div class="col-md-3 mb-3">
                            <label class="form-label">Hotel Images</label>
                            <input type="file" id="images" name="images" class="form-control" multiple>
                        </div>

                        <div class="col-md-3 mb-3">
                            <label class="form-label">Status</label>
                            <select name="status" id="status" class="form-control" required>
                                <option value="active" {{ $hotel->status == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ $hotel->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>
                        <div class="col-md-3 float-center">
                            <button type="submit" class="btn btn-primary">Update Hotel</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection