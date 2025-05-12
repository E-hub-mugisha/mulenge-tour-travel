@extends('layouts.app')
@section('title', 'Add Hotel | Mulenge Tours')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-sm border-radious-0 mb-5 mt-5 py-4 px-4">
                <h3 class="mb-4">Add New Hotel</h3>

                <form action="{{ route('admin.hotelStore') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Hotel Name</label>
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>

                        <div class="mb-3 col-md-6">
                            <label class="form-label">Hotel Type</label>
                            <input type="text" name="hotel_type" id="hotel_type" class="form-control">
                        </div>

                        <div class="mb-3 col-md-4">
                            <label class="form-label">Contact Number</label>
                            <input type="tel" name="contact_number" id="contact_number" class="form-control">
                        </div>

                        <div class="mb-3 col-md-4">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" id="email" class="form-control">
                        </div>
                        <div class="mb-3 col-md-4">
                            <label class="form-label">Website</label>
                            <input type="url" name="website" id="website" class="form-control">
                        </div>
                        <div class="mb-3 col-md-4">
                            <label class="form-label">Destination</label>
                            <select name="destination_id" id="destination_id" class="form-control" required>
                                @foreach($destinations as $destination)
                                <option value="{{ $destination->id }}">{{ $destination->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 col-md-4">
                            <label class="form-label">Location</label>
                            <input type="text" name="location" id="location" class="form-control" required>
                        </div>
                        <div class="mb-3 col-md-4">
                            <label class="form-label">Address</label>
                            <input type="text" name="address" id="address" class="form-control">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Description</label>
                            <textarea name="description" id="description" class="form-control"></textarea>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Amenities</label>
                            <textarea name="amenities" id="amenities" class="form-control"></textarea>
                        </div>
                        <div class="mb-3 col-md-3">
                            <label class="form-label">Price (USD)</label>
                            <input type="number" name="price" id="price" class="form-control" required>
                        </div>

                        <div class="mb-3 col-md-3">
                            <label class="form-label">Total Rooms</label>
                            <input type="number" name="total_rooms" id="total_rooms" class="form-control" required>
                        </div>

                        <div class="mb-3 col-md-3">
                            <label class="form-label">Available Rooms</label>
                            <input type="number" name="available_rooms" id="available_rooms" class="form-control" required>
                        </div>

                        <div class="mb-3 col-md-3">
                            <label class="form-label">Rating</label>
                            <input type="number" name="rating" id="rating" class="form-control" step="0.1" min="0" max="5" required>
                        </div>

                        <div class="mb-3 col-md-3">
                            <label class="form-label">Check-in Time</label>
                            <input type="time" name="check_in_time" id="check_in_time" class="form-control" required>
                        </div>

                        <div class="mb-3 col-md-3">
                            <label class="form-label">Check-out Time</label>
                            <input type="time" name="check_out_time" id="check_out_time" class="form-control" required>
                        </div>

                        <div class="mb-3 col-md-3">
                            <label class="form-label">Hotel Images</label>
                            <input type="file" name="images" id="images" class="form-control">
                        </div>

                        <div class="mb-3 col-md-3">
                            <label class="form-label">Status</label>
                            <select name="status" id="status" class="form-control" required>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                        <div class="col-md-3 float-center">
                            <button type="submit" class="btn btn-success">Save Hotel</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection