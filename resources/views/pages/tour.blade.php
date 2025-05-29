@extends('layouts.guest')
@section('title', 'Tour Package | Mulenge')
@section('content')

<!-- tg-breadcrumb-area-start -->
<div class="tg-breadcrumb-area tg-breadcrumb-spacing fix p-relative z-index-1 include-bg" data-background="{{ asset('assets/pages/img/breadcrumb/breadcrumb.jpg') }}">
    <div class="tg-hero-top-shadow"></div>
    <div class="tg-breadcrumb-shadow"></div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="tg-breadcrumb-content text-center">
                    <h2 class="tg-breadcrumb-title mb-15">Let’s explore The World</h2>
                    <div class="tg-breadcrumb-list">
                        <span><a href="{{ route('pages.home')}}">Home</a></span>
                        <span class="dvdr"><i class="fa-sharp fa-solid fa-angle-right"></i></span>
                        <span>@yield('title')</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- tg-breadcrumb-area-end -->

<!-- tg-listing-grid-area-start -->
<div class="tg-listing-grid-area mb-85">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="tg-listing-item-box-wrap ml-10">
                    <div class="tg-listing-box-filter mb-15 mt-10">
                        <div class="row align-items-center">
                            <div class="col-lg-5 col-md-5 mb-15 mt-5">
                                <div class="tg-listing-box-number-found">
                                    <span>Tour Packages Available</span>
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-7 mb-15 mt-5">
                                <div class="tg-listing-box-view-type d-flex justify-content-end align-items-center">

                                    <div class="d-none d-sm-block">
                                        <div class="tg-listing-box-view ml-10 d-flex">
                                            <div class="list-switch-item">
                                                <button class="grid-view active">
                                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M8 1H1V8H8V1Z" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round" />
                                                        <path d="M19 1H12V8H19V1Z" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round" />
                                                        <path d="M19 12H12V19H19V12Z" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round" />
                                                        <path d="M8 12H1V19H8V12Z" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                </button>
                                            </div>
                                            <div class="list-switch-item ml-5">
                                                <button class="list-view">
                                                    <svg width="20" height="14" viewBox="0 0 20 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M6 1H19M6 7H19M6 13H19M1 1H1.01M1 7H1.01M1 13H1.01" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tg-listing-grid-item">
                        <div class="row list-card">
                            @foreach( $tours as $tour )
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
                        <div class="tg-pagenation-wrap text-center mt-50 mb-30">
                            {{ $tours->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- tg-listing-grid-area-end -->
@endsection