@extends('layouts.guest')

@section('title', $destination->name . ' | Mulenge')

@section('content')

<!-- tg-breadcrumb-area-start -->
<div class="tg-breadcrumb-spacing-3 include-bg p-relative fix" data-background="{{ asset('assets/pages/img/breadcrumb/breadcrumb-2.jpg')}}">
    <div class="tg-hero-top-shadow"></div>
</div>
<div class="tg-breadcrumb-list-2-wrap">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="tg-breadcrumb-list-2">
                    <ul>
                        <li><a href="{{ route('pages.home' )}}">Home</a></li>
                        <li><i class="fa-sharp fa-solid fa-angle-right"></i></li>
                        <li><a href="{{ route('pages.destinations')}}">Destination</a></li>
                        <li><i class="fa-sharp fa-solid fa-angle-right"></i></li>
                        <li><span>{{ $destination->name }}</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- tg-breadcrumb-area-end -->
<div class="tg-location-area p-relative pb-125 pt-135">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-lg-9">
                <div class="tg-location-section-title mb-40">
                    <h5 class="tg-section-subtitle mb-15 wow fadeInUp" data-wow-delay=".4s" data-wow-duration=".9s" style="visibility: visible; animation-duration: 0.9s; animation-delay: 0.4s; animation-name: fadeInUp;">Adventure Destination in {{ $destination->name }}</h5>
                    <h2 class="mb-15 text-capitalize wow fadeInUp" data-wow-delay=".5s" data-wow-duration=".9s" style="visibility: visible; animation-duration: 0.9s; animation-delay: 0.5s; animation-name: fadeInUp;">Popular Travel Destinations <br>Available in {{ $destination->name }}</h2>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="tg-location-3-btn text-end wow fadeInUp mb-40" data-wow-delay=".6s" data-wow-duration=".9s" style="visibility: visible; animation-duration: 0.9s; animation-delay: 0.6s; animation-name: fadeInUp;">
                    <a href="map-listing.html" class="tg-btn tg-btn-gray tg-btn-switch-animation">
                        <span class="d-flex align-items-center justify-content-center">
                            <span class="btn-text">All Locations</span>
                            <span class="btn-icon ml-5">
                                <svg width="21" height="16" viewBox="0 0 21 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1.0017 8.00001H19.9514M19.9514 8.00001L12.9766 1.02515M19.9514 8.00001L12.9766 14.9749" stroke="currentColor" stroke-width="1.77778" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </span>
                            <span class="btn-icon ml-5">
                                <svg width="21" height="16" viewBox="0 0 21 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1.0017 8.00001H19.9514M19.9514 8.00001L12.9766 1.02515M19.9514 8.00001L12.9766 14.9749" stroke="currentColor" stroke-width="1.77778" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </span>
                        </span>
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($destination->locations as $location)
            <div class="col-lg-3 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay=".3s" data-wow-duration=".9s" style="visibility: visible; animation-duration: 0.9s; animation-delay: 0.3s; animation-name: fadeInUp;">
                <div class="tg-location-3-wrap p-relative mb-30 tg-round-25">
                    <div class="tg-location-thumb tg-round-25">
                        @if ($location->images)
                        <img class="tg-card-border w-100" src="{{ asset('image/destinations/' . $location->images) }}" alt="listing">
                        @else
                        <img class="tg-card-border w-100" src="{{ asset('image/tours/default.jpg') }}" alt="No image available">
                        @endif
                    </div>
                    <div class="tg-location-content text-center">
                        <span class="tg-location-time">05 Tours</span>
                        <h3 class="tg-location-title mb-0"><a href="{{ route('pages.destination.show', $destination->id )}}">{{ $location->name }}</a></h3>
                    </div>
                    <div class="tg-location-border"></div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- tg-breadcrumb-area-end -->
<div class="tg-location-area p-relative pb-125 pt-135">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-lg-9">
                <div class="tg-location-section-title mb-40">
                    <h5 class="tg-section-subtitle mb-15 wow fadeInUp" data-wow-delay=".4s" data-wow-duration=".9s" style="visibility: visible; animation-duration: 0.9s; animation-delay: 0.4s; animation-name: fadeInUp;">Adventure Tours in {{ $destination->name }}</h5>
                    <h2 class="mb-15 text-capitalize wow fadeInUp" data-wow-delay=".5s" data-wow-duration=".9s" style="visibility: visible; animation-duration: 0.9s; animation-delay: 0.5s; animation-name: fadeInUp;">Popular Travel Tours <br>Available in {{ $destination->name }}</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($destination->tours as $tour)
            <div class="col-xxl-4 col-xl-6 col-lg-6 col-md-6 tg-grid-full">
                <div class="tg-listing-card-item mb-30">
                    <div class="tg-listing-card-thumb fix mb-15 p-relative">
                        <a href="{{ route('pages.tour.details', $tour->id ) }}">
                            @php
                            $image = \App\Models\TourImage::where('tour_id', $tour->id)->first();
                            @endphp

                            @if ($image)
                            <img class="tg-card-border w-100" src="{{ asset('image/tours/' . $image->images) }}" alt="listing">
                            @else
                            <img class="tg-card-border w-100" src="{{ asset('image/tours/default.jpg') }}" alt="No image available">
                            @endif
                            <span class="tg-listing-item-price-discount shape">New</span>
                        </a>
                        <div class="tg-listing-item-wishlist">
                            <a href="#">
                                <svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.5167 16.3416C10.2334 16.4416 9.76675 16.4416 9.48341 16.3416C7.06675 15.5166 1.66675 12.075 1.66675 6.24165C1.66675 3.66665 3.74175 1.58331 6.30008 1.58331C7.81675 1.58331 9.15841 2.31665 10.0001 3.44998C10.8417 2.31665 12.1917 1.58331 13.7001 1.58331C16.2584 1.58331 18.3334 3.66665 18.3334 6.24165C18.3334 12.075 12.9334 15.5166 10.5167 16.3416Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="tg-listing-main-content">
                        <div class="tg-listing-card-content">
                            <h4 class="tg-listing-card-title"><a href="{{ route('pages.tour.details', $tour->id ) }}">{{ $tour->name }}</a></h4>
                            <div class="tg-listing-card-duration-tour">
                                <span class="tg-listing-card-duration-map mb-5">
                                    <svg width="13" height="16" viewBox="0 0 13 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12.3329 6.7071C12.3329 11.2324 6.55512 15.1111 6.55512 15.1111C6.55512 15.1111 0.777344 11.2324 0.777344 6.7071C0.777344 5.16402 1.38607 3.68414 2.46962 2.59302C3.55316 1.5019 5.02276 0.888916 6.55512 0.888916C8.08748 0.888916 9.55708 1.5019 10.6406 2.59302C11.7242 3.68414 12.3329 5.16402 12.3329 6.7071Z" stroke="currentColor" stroke-width="1.15556" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M6.55512 8.64649C7.61878 8.64649 8.48105 7.7782 8.48105 6.7071C8.48105 5.636 7.61878 4.7677 6.55512 4.7677C5.49146 4.7677 4.6292 5.636 4.6292 6.7071C4.6292 7.7782 5.49146 8.64649 6.55512 8.64649Z" stroke="currentColor" stroke-width="1.15556" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    {{ $tour->location }}
                                </span>
                                <span class="tg-listing-card-duration-time">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8.00175 3.73329V7.99996L10.8462 9.42218M15.1128 8.00003C15.1128 11.9274 11.9291 15.1111 8.00174 15.1111C4.07438 15.1111 0.890625 11.9274 0.890625 8.00003C0.890625 4.07267 4.07438 0.888916 8.00174 0.888916C11.9291 0.888916 15.1128 4.07267 15.1128 8.00003Z" stroke="currentColor" stroke-width="1.06667" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    {{ $tour->duration }} Days
                                </span>
                            </div>
                        </div>
                        <div class="tg-listing-card-price d-flex align-items-end justify-content-between">
                            <div class="tg-listing-card-price-wrap price-bg d-flex align-items-center">
                                <span class="tg-listing-card-currency-amount mr-5">
                                    <span class="currency-symbol">$</span>{{ $tour->price }}
                                </span>
                                <span class="tg-listing-card-activity-person">/Person</span>
                            </div>
                            <div class="tg-listing-card-review space">
                                <span class="tg-listing-rating-icon"><i class="fa-sharp fa-solid fa-star"></i></span>
                                <span class="tg-listing-rating-percent">(5 Reviews)</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- tg-breadcrumb-area-end -->
<div class="tg-location-area p-relative pb-125 pt-135">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-lg-9">
                <div class="tg-location-section-title mb-40">
                    <h5 class="tg-section-subtitle mb-15 wow fadeInUp" data-wow-delay=".4s" data-wow-duration=".9s" style="visibility: visible; animation-duration: 0.9s; animation-delay: 0.4s; animation-name: fadeInUp;">Available Hotels in {{ $destination->name }}</h5>
                    <h2 class="mb-15 text-capitalize wow fadeInUp" data-wow-delay=".5s" data-wow-duration=".9s" style="visibility: visible; animation-duration: 0.9s; animation-delay: 0.5s; animation-name: fadeInUp;">Popular Travel Hotels <br>Available in {{ $destination->name }}</h2>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="tg-location-3-btn text-end wow fadeInUp mb-40" data-wow-delay=".6s" data-wow-duration=".9s" style="visibility: visible; animation-duration: 0.9s; animation-delay: 0.6s; animation-name: fadeInUp;">
                    <a href="map-listing.html" class="tg-btn tg-btn-gray tg-btn-switch-animation">
                        <span class="d-flex align-items-center justify-content-center">
                            <span class="btn-text">All Locations</span>
                            <span class="btn-icon ml-5">
                                <svg width="21" height="16" viewBox="0 0 21 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1.0017 8.00001H19.9514M19.9514 8.00001L12.9766 1.02515M19.9514 8.00001L12.9766 14.9749" stroke="currentColor" stroke-width="1.77778" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </span>
                            <span class="btn-icon ml-5">
                                <svg width="21" height="16" viewBox="0 0 21 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1.0017 8.00001H19.9514M19.9514 8.00001L12.9766 1.02515M19.9514 8.00001L12.9766 14.9749" stroke="currentColor" stroke-width="1.77778" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </span>
                        </span>
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($destination->hotels as $hotel)
            <div class="col-xxl-4 col-xl-6 col-lg-6 col-md-6 tg-grid-full">
                <div class="tg-listing-card-item tg-listing-4-card-item mb-25">
                    <div class="tg-listing-card-thumb tg-listing-2-card-thumb mb-15 fix p-relative">
                        <a href="{{ route('pages.hotel-details.show', $hotel->id ) }}">
                            <img class="tg-card-border w-100" src="{{ asset('assets/pages/img/listing/listing-4/thumb-2.jpg') }}" alt="listing">
                            <span class="tg-listing-item-price-discount shape">New</span>
                        </a>
                        <div class="tg-listing-2-price">
                            <span class="new">${{ $hotel->price }}</span>
                            <span class="shift">/night</span>
                        </div>
                    </div>
                    <div class="tg-listing-card-content p-relative">
                        <h4 class="tg-listing-card-title mb-5"><a href="{{ route('pages.hotel-details.show', $hotel->id ) }}">{{ $hotel->name }}</a></h4>
                        <span class="tg-listing-card-duration-map d-inline-block">
                            <svg width="13" height="16" viewBox="0 0 13 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12.3329 6.7071C12.3329 11.2324 6.55512 15.1111 6.55512 15.1111C6.55512 15.1111 0.777344 11.2324 0.777344 6.7071C0.777344 5.16402 1.38607 3.68414 2.46962 2.59302C3.55316 1.5019 5.02276 0.888916 6.55512 0.888916C8.08748 0.888916 9.55708 1.5019 10.6406 2.59302C11.7242 3.68414 12.3329 5.16402 12.3329 6.7071Z" stroke="currentColor" stroke-width="1.15556" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M6.55512 8.64649C7.61878 8.64649 8.48105 7.7782 8.48105 6.7071C8.48105 5.636 7.61878 4.7677 6.55512 4.7677C5.49146 4.7677 4.6292 5.636 4.6292 6.7071C4.6292 7.7782 5.49146 8.64649 6.55512 8.64649Z" stroke="currentColor" stroke-width="1.15556" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                            {{ $hotel->location }}
                        </span>
                        <div class="tg-listing-card-review mb-10">
                            <span class="tg-listing-rating-icon"><i class="fa-sharp fa-solid fa-star"></i></span>
                            <span class="tg-listing-rating-icon"><i class="fa-sharp fa-solid fa-star"></i></span>
                            <span class="tg-listing-rating-icon"><i class="fa-sharp fa-solid fa-star"></i></span>
                            <span class="tg-listing-rating-icon"><i class="fa-sharp fa-solid fa-star"></i></span>
                            <span class="tg-listing-rating-icon"><i class="fa-sharp fa-solid fa-star"></i></span>
                            <span class="tg-listing-rating-percent">(5 Reviews)</span>
                        </div>
                        <div class="tg-listing-avai d-flex align-items-center justify-content-between">
                            <a class="tg-listing-avai-btn" href="{{ route('pages.hotel-details.show', $hotel->id ) }}">Check Availability</a>
                            <div class="tg-listing-item-wishlist">
                                <a href="#">
                                    <svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10.5167 16.3416C10.2334 16.4416 9.76675 16.4416 9.48341 16.3416C7.06675 15.5166 1.66675 12.075 1.66675 6.24165C1.66675 3.66665 3.74175 1.58331 6.30008 1.58331C7.81675 1.58331 9.15841 2.31665 10.0001 3.44998C10.8417 2.31665 12.1917 1.58331 13.7001 1.58331C16.2584 1.58331 18.3334 3.66665 18.3334 6.24165C18.3334 12.075 12.9334 15.5166 10.5167 16.3416Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection