@extends('layouts.guest')
@section('title','Destinations | Mulenge')
@section('content')

<!-- tg-breadcrumb-area-start -->
<div class="tg-breadcrumb-spacing-3 include-bg p-relative fix" data-background="{{ asset('assets/pages/img/breadcrumb/breadcrumb-2.jpg')}}">
    <div class="tg-hero-top-shadow"></div>
</div>

<!-- tg-breadcrumb-area-end -->
<div class="tg-location-area p-relative pb-125 pt-135">
    <img class="tg-location-shape shape-3 d-none d-xl-block" src="{{ asset('assets/pages/img/location/shape-2.png') }}" alt="shape">
    <img class="tg-testimonial-2-shape-1 p-absolute d-none d-lg-block" src="{{ asset('assets/pages/img/testimonial/shape.png') }}" alt="">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-lg-9">
                <div class="tg-location-section-title mb-40">
                    <h5 class="tg-section-subtitle mb-15 wow fadeInUp" data-wow-delay=".4s" data-wow-duration=".9s" style="visibility: visible; animation-duration: 0.9s; animation-delay: 0.4s; animation-name: fadeInUp;">Next Adventure Destination</h5>
                    <h2 class="mb-15 text-capitalize wow fadeInUp" data-wow-delay=".5s" data-wow-duration=".9s" style="visibility: visible; animation-duration: 0.9s; animation-delay: 0.5s; animation-name: fadeInUp;">Popular Travel Destinations <br>Available Worldwide</h2>
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
            @foreach( $destinations as $destination)
            <div class="col-lg-3 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay=".3s" data-wow-duration=".9s" style="visibility: visible; animation-duration: 0.9s; animation-delay: 0.3s; animation-name: fadeInUp;">
                <div class="tg-location-3-wrap p-relative mb-30 tg-round-25">
                    <div class="tg-location-thumb tg-round-25">
                        <img class="w-100 tg-round-25" src="{{ asset('assets/pages/img/location/location-2/thumb.jpg') }}" alt="location">
                    </div>
                    <div class="tg-location-content text-center">
                        <span class="tg-location-time">05 Tours</span>
                        <h3 class="tg-location-title mb-0"><a href="{{ route('pages.destination.show', $destination->id )}}">{{ $destination->name }}</a></h3>
                    </div>
                    <div class="tg-location-border"></div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection