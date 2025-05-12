@extends('layouts.app')
@section('title', 'Hotel Detail')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-9 col-lg-8">
            <div class="card shadow-sm p-4">
                <div class="col-md-3 mb-3">
                    <a href="{{ route('admin.hotels.index') }}" class="btn btn-secondary btn-sm">Back</a>
                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addModal">Add Image</button>
                </div>
                <div class="tg-tour-about-wrap mr-55">
                    <div class="row">
                        @foreach( $hotelImages as $image)
                        <div class="col-md-3">
                            <div class="tg-tour-details-gallery-thumb">
                                <img class="w-100" src="{{ asset('image/hotels/' . $image->images) }}" alt="">
                                <form action="{{ route('hotelImages.destroy', $image->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="card shadow-sm p-4">
                <div class="row align-items-center">
                    <div class="col-lg-7">
                        <div class="tg-tour-about-list tg-tour-about-list-2">
                            <div>
                                <span class="text">Contact: {{ $hotel->contact_number }}</span>
                            </div>
                            <div>
                                <span class="text">Email: {{ $hotel->email }}</span>
                            </div>
                            <div>
                                <span class="text">Website: {{ $hotel->website }}</span>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="tg-tour-details-video-feature-list tg-tour-details-video-feature-2-list">
                            <div>
                                <span class="title">Available Rooms:</span>
                                <span class="duration">{{ $hotel->available_rooms }} Rooms</span>
                            </div>
                            <div>
                                <span class="title">Total Rooms:</span>
                                <span class="duration">{{ $hotel->total_rooms }} Rooms</span>
                            </div>
                            <div>
                                <span class="title">Hotel Type:</span>
                                <span class="duration">{{ $hotel->hotel_type }}</span>
                            </div>
                            <div>
                                <span class="title">Price:</span>
                                <span class="duration">{{ $hotel->price }} USD</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card shadow-sm p-4">
                <div class="tg-tour-about-inner tg-tour-about-2-inner mb-30">
                    <h4 class="tg-tour-about-title mb-15">About This Hotel</h4>
                    <p class="text-capitalize lh-28 mb-35">{{ $hotel->description }}</p>
                    <h4 class="tg-tour-about-title mb-20">Amenities</h4>
                    <div class="tg-tour-about-list">
                        <ul>
                            <li>
                                <span class="text">{{ $hotel->amenities }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="tg-tour-about-map tg-tour-about-2-inner mb-40">
                    <h4 class="tg-tour-about-title mb-15">Location on map</h4>
                    <div class="tg-tour-about-map h-100">
                        <iframe class="gmap_iframe h-100 w-100" src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q={{$hotel->address}}&amp;t=&amp;z=12&amp;ie=UTF8&amp;iwloc=B&amp;output=embed" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>

            </div>
        </div>
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
@endsection