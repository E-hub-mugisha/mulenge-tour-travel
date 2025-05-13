@extends('layouts.guest')
@section('title', 'Home | Mulenge')
@section('content')

<!-- tg-hero-area-start -->
<div class="tg-hero-area tg-hero-tu-wrapper include-bg" data-background="{{ asset('image/tours/default.jpg') }}">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10">
                <div class="tg-hero-content text-center">
                    <div class="tg-hero-title-box mb-30">
                        <h2 class="tg-hero-title wow fadeInUp" data-wow-delay=".4s" data-wow-duration=".5s">Where Every Journey</h2>
                        <h3 class="tg-hero-tu-title wow fadeInUp" data-wow-delay=".4s" data-wow-duration=".7s">Become an Adventure</h3>
                    </div>
                    <div class="tg-booking-form-item tg-booking-tu-wrapper mt-15">
                        <form action="{{ route('search.results') }}" method="GET">
                            <div class="tg-booking-form-input-group d-flex align-items-end justify-content-between">
                                <div class="tg-booking-form-parent-inner tg-hero-quantity mb-10 form-group">
                                    <select name="destination_id" id="destination_id" class="form-control">
                                        <option class="tg-booking-form-title"><i class="fa-regular fa-location-dot"></i> Select Destination</option>
                                        @foreach( $locations as $destination)
                                        <option value="{{ $destination->id }}"><i class="fa-regular fa-location-dot"></i> {{ $destination->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="tg-booking-form-parent-inner tg-hero-quantity mb-10 form-group">
                                    <input type="text" class="form-control" name="amenities" id="amenities" placeholder="Enter Amenities">
                                </div>
                                <!-- hotel types -->
                                <div class="tg-booking-form-parent-inner tg-hero-quantity mb-10 form-group">
                                    <select class="form-control" name="hotel_type" id="hotel_type">
                                        <option class="tg-booking-form-title"><i class="fa-regular fa-location-dot"></i> Select hotel types</option>
                                        @foreach( $hotels as $hotel)
                                        <option value="{{ $hotel->hotel_type }}"><i class="fa-regular fa-location-dot"></i> {{ $hotel->hotel_type }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- Submit Button -->
                                <div class="tg-booking-form-search-btn mb-10">
                                    <button class="bk-search-button" type="submit">Search
                                        <span class="ml-5">
                                            <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_53_103)">
                                                    <path d="M13.2218 13.2222L10.5188 10.5192M12.1959 6.48705C12.1959 9.6402 9.63977 12.1963 6.48662 12.1963C3.33348 12.1963 0.777344 9.6402 0.777344 6.48705C0.777344 3.3339 3.33348 0.777771 6.48662 0.777771C9.63977 0.777771 12.1959 3.3339 12.1959 6.48705Z" stroke="currentColor" stroke-width="1.575" stroke-linecap="round" stroke-linejoin="round" />
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_53_103">
                                                        <rect width="14" height="14" fill="currentColor" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- tg-hero-area-end -->

<!-- tg-location-area-start -->
<div class="tg-location-area p-relative z-index-1 pb-65 pt-120">
    <div class="tg-location-su-bg">
        <img src="{{ asset('assets/pages/img/destination/tu/bg.png')}}" alt="">
    </div>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-9">
                <div class="tg-location-section-title mb-30">
                    <h5 class="tg-section-su-subtitle mb-15 wow fadeInUp" data-wow-delay=".4s" data-wow-duration=".9s">Best Places near at you</h5>
                    <h2 class="tg-section-su-title text-capitalize wow fadeInUp" data-wow-delay=".5s" data-wow-duration=".9s" style="color: #06b34f;">Explore Top Destinations</h2>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="tg-listing-5-slider-navigation tg-location-su-slider-navigation text-end mb-30 wow fadeInUp" data-wow-delay=".4s" data-wow-duration="1s">
                    <button class="tg-listing-5-slide-prev"><i class="fa-solid fa-arrow-left-long" style="color: #06b34f;"></i></button>
                    <button class="tg-listing-5-slide-next"><i class="fa-solid fa-arrow-right-long" style="color: #06b34f;"></i></button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="swiper-container tg-location-su-slider">
                    <div class="swiper-wrapper">
                        @foreach( $locations as $location)
                        <div class="swiper-slide">
                            <div class="tg-location-3-wrap  tg-location-su-wrap  p-relative mb-30 tg-round-25">
                                <div class="tg-location-thumb tg-round-25">
                                    @if ($location->image)
                                    <img class="tg-card-border w-100" src="{{ asset('image/destinations/' . $location->image) }}" alt="listing">
                                    @else
                                    <img class="tg-card-border w-100" src="{{ asset('image/tours/default.jpg') }}" alt="No image available">
                                    @endif
                                </div>
                                <div class="tg-location-content tg-location-su-content">
                                    <div class="content">
                                        <h3 class="tg-location-title mb-5"><a href="{{ route('pages.destination.show', $location->id )}}">{{ $location->name }}</a></h3>
                                        <span class="tg-location-su-duration">05 Tours</span>
                                    </div>
                                    <a class="icons" href="{{ route('pages.destination.show', $location->id )}}">
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M2 13.0969L13.0969 2M13.0969 2H2M13.0969 2V13.0969" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- tg-location-area-end -->


<!-- tg-listing-area-start -->
<div class="tg-listing-area tg-listing-su-spacing tg-grey-bg-2 pt-120 p-relative">
    <img class="tg-listing-su-shape d-none d-xl-block" src="{{ asset('assets/pages/img/listing/su/shape-2.png')}}" alt="">
    <img class="tg-listing-su-shape-2 d-none d-xxl-block" src="{{ asset('assets/pages/img/listing/su/shape-1.png')}}" alt="">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="tg-listing-section-title-wrap text-center mb-40">
                    <h5 class="tg-section-su-subtitle su-subtitle-2 mb-15 wow fadeInUp" data-wow-delay=".4s" data-wow-duration=".9s">Explore the world</h5>
                    <h2 class="tg-section-su-title text-capitalize wow fadeInUp mb-15" data-wow-delay=".5s" data-wow-duration=".9s" style="color: #06b34f;">Our Amazing Featured Tour  Package The World</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach( $tours as $tour )
            <div class="col-xl-4 col-lg-4 col-md-6">
                <div class="tg-listing-card-item tg-listing-su-card-item mb-25">
                    <div class="tg-listing-card-thumb fix mb-25 p-relative">
                        <a href="{{ route('pages.tour.details', $tour->id ) }}">
                            @php
                            $image = \App\Models\TourImage::where('tour_id', $tour->id)->first();
                            @endphp

                            @if ($image)
                            <img class="tg-card-border w-100" src="{{ asset('image/tours/' . $image->images) }}" alt="listing">
                            @else
                            <img class="tg-card-border w-100" src="{{ asset('image/tours/default.jpg') }}" alt="No image available">
                            @endif
                            <span class="tg-listing-item-price-discount">Featured</span>
                        </a>
                        <div class="tg-listing-item-wishlist">
                            <a href="#">
                                <svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.5167 16.3416C10.2334 16.4416 9.76675 16.4416 9.48341 16.3416C7.06675 15.5166 1.66675 12.075 1.66675 6.24165C1.66675 3.66665 3.74175 1.58331 6.30008 1.58331C7.81675 1.58331 9.15841 2.31665 10.0001 3.44998C10.8417 2.31665 12.1917 1.58331 13.7001 1.58331C16.2584 1.58331 18.3334 3.66665 18.3334 6.24165C18.3334 12.075 12.9334 15.5166 10.5167 16.3416Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="tg-listing-card-content">
                        <div class="tg-listing-card-duration-tour d-flex align-items-center gap-3">
                            <span class="tg-listing-card-duration-map mb-5">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_16_2737)">
                                        <path d="M7.99979 3.73329V7.99996L10.8442 9.42218M15.1109 8.00003C15.1109 11.9274 11.9271 15.1111 7.99978 15.1111C4.07242 15.1111 0.888672 11.9274 0.888672 8.00003C0.888672 4.07267 4.07242 0.888916 7.99978 0.888916C11.9271 0.888916 15.1109 4.07267 15.1109 8.00003Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_165_2737">
                                            <rect width="16" height="16" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>
                                {{ $tour->duration }} Days
                            </span>
                            <span class="tg-listing-card-duration-time mb-5">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1.61756 14.0445C1.40423 14.0445 1.19978 13.9378 1.09312 13.8311L1.00423 13.68C0.950894 13.5822 0.888672 13.4756 0.888672 13.3156C0.888672 12.2222 1.19978 11.0756 1.77756 9.99114C2.31978 9.06669 3.13756 8.22225 4.04423 7.65336C3.68867 7.18225 3.41312 6.59558 3.27089 6.00892C3.20867 5.55558 3.14645 4.72003 3.34201 4.0178C3.53756 3.24447 4.04423 2.55114 4.31978 2.21336C4.71089 1.82225 5.31534 1.32447 5.99089 1.12892C6.47978 0.968916 6.97756 0.888916 7.46645 0.888916H8.01756C8.71978 0.977805 9.37756 1.23558 9.93756 1.63558C10.4798 2.02669 10.8976 2.48892 11.2531 3.11114C11.582 3.68892 11.7509 4.35558 11.7509 5.09336C11.7509 6.05336 11.4487 6.96003 10.8887 7.66225C11.3064 7.9378 11.7331 8.24003 12.1598 8.58669C12.8798 9.30669 13.2887 10.0267 13.6264 10.6934C13.9642 11.5289 14.1153 12.3467 14.1153 13.2267C14.1153 13.44 14.0087 13.6445 13.902 13.7511C13.7953 13.8578 13.5998 13.9645 13.3776 13.9645C13.2976 13.9645 13.182 13.9645 13.0664 13.8756C12.9509 13.84 12.8531 13.7511 12.8265 13.6356L12.6576 13.4667V13.3956C12.6131 13.3067 12.5776 13.2445 12.5776 13.1556C12.5776 12.5422 12.462 11.9467 12.1953 11.2445C11.9731 10.64 11.5909 10.1067 11.0576 9.65336C10.6042 9.28003 10.1776 8.92447 9.68867 8.69336C9.00423 9.10225 8.27534 9.30669 7.46645 9.30669C6.69312 9.30669 5.90201 9.09336 5.24423 8.70225C4.39089 9.10225 3.67978 9.71558 3.19089 10.4889C2.63089 11.3689 2.34645 12.2934 2.34645 13.2356C2.34645 13.4489 2.23978 13.6534 2.13312 13.76C2.07089 13.92 1.85756 14.0445 1.61756 14.0445ZM6.94201 7.84003C7.00423 7.84003 7.11089 7.8578 7.21756 7.88447C7.30645 7.90225 7.38645 7.92003 7.45756 7.92003C7.83978 7.92003 8.20423 7.84003 8.48867 7.6978C9.03089 7.46669 9.39534 7.16447 9.76867 6.64892C10.0531 6.21336 10.2131 5.70669 10.2131 5.17336C10.2131 4.44447 9.92867 3.77781 9.39534 3.24447C8.90645 2.69336 8.28423 2.42669 7.46645 2.42669C6.93312 2.42669 6.41756 2.5778 5.98201 2.87114C5.43089 3.19114 5.13756 3.68003 4.94201 4.07114C4.70201 4.62225 4.65756 5.1378 4.79089 5.68892C4.86201 6.18669 5.13756 6.71114 5.53756 7.11114C5.92867 7.50225 6.45312 7.77781 6.94201 7.84003Z" fill="currentColor" />
                                </svg>
                                12 Guests
                            </span>
                        </div>
                        <h4 class="tg-listing-card-title mb-10"><a href="{{ route('pages.tour.details', $tour->id ) }}">{{ $tour->name }}</a></h4>
                        <div class="tg-listing-card-duration-tour mb-20">
                            <span class="tg-listing-card-duration-map">
                                <svg width="13" height="16" viewBox="0 0 13 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12.3329 6.7071C12.3329 11.2324 6.55512 15.1111 6.55512 15.1111C6.55512 15.1111 0.777344 11.2324 0.777344 6.7071C0.777344 5.16402 1.38607 3.68414 2.46962 2.59302C3.55316 1.5019 5.02276 0.888916 6.55512 0.888916C8.08748 0.888916 9.55708 1.5019 10.6406 2.59302C11.7242 3.68414 12.3329 5.16402 12.3329 6.7071Z" stroke="currentColor" stroke-width="1.15556" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M6.55512 8.64649C7.61878 8.64649 8.48105 7.7782 8.48105 6.7071C8.48105 5.636 7.61878 4.7677 6.55512 4.7677C5.49146 4.7677 4.6292 5.636 4.6292 6.7071C4.6292 7.7782 5.49146 8.64649 6.55512 8.64649Z" stroke="currentColor" stroke-width="1.15556" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                {{ $tour->location }}
                            </span>
                        </div>
                        <div class="tg-listing-card-price d-flex align-items-end justify-content-between">
                            <div>
                                <span class="tg-listing-card-currency-amount d-flex align-items-center">
                                    <span class="currency-symbol mr-5">From</span>${{ $tour->price }}
                                </span>
                            </div>
                            <div>
                                <span class="tg-listing-rating-icon"><i class="fa-sharp fa-solid fa-star"></i> 4.5</span>
                                <span class="tg-listing-rating-percent">(02 Reviews)</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="col-12">
                <div class="text-center mt-15">
                    <a href="{{ route('pages.tours' ) }}" class="tg-btn tg-btn-transparent tg-btn-su-transparent">See More Tours</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- tg-listing-area-end -->


<div class="tg-listing-area tg-grey-bg pt-140 pb-130 p-relative z-index-9">
    <img class="tg-listing-2-shape d-none d-sm-block" src="assets/img/listing/listing-2/shape-1.png" alt="">
    <img class="tg-listing-2-shape-2 d-none d-xl-block" src="assets/img/listing/listing-2/shape-2.png" alt="">
    <img class="tg-listing-2-shape-3 d-none d-sm-block" src="assets/img/listing/listing-2/shape-3.png" alt="">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="tg-listing-section-title text-center mb-35">
                    <h5 class="tg-section-subtitle wow fadeInUp" data-wow-delay=".4s" data-wow-duration=".6s" style="visibility: visible; animation-duration: 0.6s; animation-delay: 0.4s; animation-name: fadeInUp;">Most Popular Tour Packages </h5>
                    <h2 class="mb-15 wow fadeInUp" data-wow-delay=".5s" data-wow-duration=".7s" style="visibility: visible; animation-duration: 0.7s; animation-delay: 0.5s; animation-name: fadeInUp;" style="color: #06b34f;">Something Amazing Waiting For you</h2>
                    <p class="text-capitalize wow fadeInUp" data-wow-delay=".6s" data-wow-duration=".8s" style="visibility: visible; animation-duration: 0.8s; animation-delay: 0.6s; animation-name: fadeInUp;" style="color: #06b34f;">Are you tired of the typical tourist destinations and looking<br>
                        to step out of your comfort zonetravel</p>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($hotels as $hotel)
            <div class="col-xxl-4 col-xl-6 col-lg-6 col-md-6 tg-grid-full">
                <div class="tg-listing-card-item tg-listing-4-card-item mb-25">
                    <div class="tg-listing-card-thumb tg-listing-2-card-thumb mb-15 fix p-relative">
                        <a href="{{ route('pages.hotel-details.show', $hotel->id ) }}">
                            <img class="tg-card-border w-100" src="{{ asset('assets/pages/img/listing/listing-4/thumb-2.jpg') }}" alt="listing">
                            <span class="tg-listing-item-price-discount shape">{{ $hotel->status }}</span>
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
                            <a class="tg-listing-avai-btn" href="{{ route('pages.hotel-details.show', $hotel->id ) }}">Check Details</a>
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
            <div class="col-12 wow fadeInUp" data-wow-delay=".7s" data-wow-duration=".6s" style="visibility: visible; animation-duration: 0.6s; animation-delay: 0.7s; animation-name: fadeInUp;">
                <div class="tg-listing-2-btn text-center pt-25">
                    <a href="{{ route('pages.hotels') }}" class="tg-btn tg-btn-switch-animation">
                        <span class="d-flex align-items-center justify-content-center">
                            <span class="btn-text">See All hotels</span>
                            <span class="btn-icon ml-5">
                                <svg width="21" height="16" viewBox="0 0 21 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1.0017 8.00001H19.9514M19.9514 8.00001L12.9766 1.02515M19.9514 8.00001L12.9766 14.9749" stroke="white" stroke-width="1.77778" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </span>
                            <span class="btn-icon ml-5">
                                <svg width="21" height="16" viewBox="0 0 21 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1.0017 8.00001H19.9514M19.9514 8.00001L12.9766 1.02515M19.9514 8.00001L12.9766 14.9749" stroke="white" stroke-width="1.77778" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </span>
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- blog-area-start -->
<div class="tg-blog-area tg-blog-space-2 tg-blog-su-wrapper pt-130 p-relative z-index-1">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="tg-location-section-title text-center mb-30">
                    <h5 class="tg-section-su-subtitle su-subtitle-2 mb-20 wow fadeInUp" data-wow-delay=".4s" data-wow-duration=".9s">Tips and Inspiration</h5>
                    <h2 class="tg-section-su-title text-capitalize wow fadeInUp mb-15" data-wow-delay=".5s" data-wow-duration=".9s">Latest News & Articles</h2>
                    <p class="tg-section-su-para tg-section-su-para-2 mb-10">Are you tired of the typical tourist destinations and looking <br>
                        to step out of your comfort zonetravel</p>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach( $tips as $tip)
            <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInLeft" data-wow-delay=".4s" data-wow-duration=".9s">
                <div class="tg-blog-item tg-blog-2-item mb-25">
                    <div class="tg-blog-thumb p-relative fix mb-25">
                        <a href="{{ route('pages.tips.show', $tip->id ) }}"><img class="w-100" src="{{ asset('image/tips/' . $tip->images) }}" alt="blog"></a>
                        <span class="tg-blog-tag p-absolute">{{ $tip->category->name }}</span>
                    </div>
                    <div class="tg-blog-content  p-relative">
                        <h3 class="tg-blog-title mb-15"><a href="{{ route('pages.tips.show', $tip->id ) }}">{{ $tip->title }}</a></h3>
                        <div class="tg-blog-date">
                            <span class="mr-20"><i class="fa-light fa-calendar"></i> {{ $tip->created_at }}</span>
                            <span><i class="fa-regular fa-clock"></i> {{ $tip->read_time }}</span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- blog-area-end -->

<script>
    $(document).ready(function() {
        $('#amenities').tagsinput({
            trimValue: true,
            allowDuplicates: false
        });
    });
</script>

<style>
    .bootstrap-tagsinput {
        width: 100%;
        display: block;
    }
</style>

@endsection