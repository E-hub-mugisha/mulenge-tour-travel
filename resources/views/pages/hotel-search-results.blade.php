@extends('layouts.guest')
@section('title', 'Search Results | Mulenge')
@section('content')

<!-- tg-breadcrumb-area-start -->
<div class="tg-breadcrumb-spacing-3 include-bg p-relative fix" data-background="{{ asset('assets/pages/img/breadcrumb/breadcrumb-2.jpg')}}">
    <div class="tg-hero-top-shadow"></div>
</div>

<div class="tg-booking-form-area p-relative z-index-1 tg-listing-booking-shadow">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="tg-booking-form-item pt-20 pb-10">
                    <form action="#">
                        <div class="tg-booking-form-input-group d-flex align-items-end justify-content-between">
                            <div class="tg-booking-form-parent-inner tg-hero-quantity p-relative mr-15 mb-15">
                                <span class="tg-booking-form-title mb-5">Destinations:</span>
                                <div class="tg-booking-add-input-field tg-booking-quantity-toggle">
                                    <span class="tg-booking-title-value">Where are you going . . .</span>
                                    <span class="location">
                                        <svg width="13" height="16" viewBox="0 0 13 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M12.3329 6.7071C12.3329 11.2324 6.55512 15.1111 6.55512 15.1111C6.55512 15.1111 0.777344 11.2324 0.777344 6.7071C0.777344 5.16402 1.38607 3.68414 2.46962 2.59302C3.55316 1.5019 5.02276 0.888916 6.55512 0.888916C8.08748 0.888916 9.55708 1.5019 10.6406 2.59302C11.7242 3.68414 12.3329 5.16402 12.3329 6.7071Z" stroke="currentColor" stroke-width="1.15556" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M6.55512 8.64649C7.61878 8.64649 8.48105 7.7782 8.48105 6.7071C8.48105 5.636 7.61878 4.7677 6.55512 4.7677C5.49146 4.7677 4.6292 5.636 4.6292 6.7071C4.6292 7.7782 5.49146 8.64649 6.55512 8.64649Z" stroke="currentColor" stroke-width="1.15556" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </span>
                                </div>
                                <div class="tg-booking-form-location-list tg-booking-quantity-active">
                                    <ul class="scrool-bar scrool-height pr-5">
                                        <li>
                                            <i class="fa-regular fa-location-dot"></i>
                                            <span>Chicago</span>
                                        </li>
                                        <li>
                                            <i class="fa-regular fa-location-dot"></i>
                                            <span>Los Angeles</span>
                                        </li>
                                        <li>
                                            <i class="fa-regular fa-location-dot"></i>
                                            <span>London</span>
                                        </li>
                                        <li>
                                            <i class="fa-regular fa-location-dot"></i>
                                            <span>Paris</span>
                                        </li>
                                        <li>
                                            <i class="fa-regular fa-location-dot"></i>
                                            <span>Dubai</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="tg-booking-form-parent-inner mr-15 mb-15">
                                <span class="tg-booking-form-title mb-5">Check in:</span>
                                <div class="tg-booking-add-input-date p-relative">
                                    <input class="input flatpickr-input" name="datetime-local" type="text" placeholder="dd/mm/yyyy" readonly="readonly">
                                    <span>
                                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M9.76501 0.777771V3.26668M4.23413 0.777771V3.26668M0.777344 5.75548H13.2218M2.16006 2.02211H11.8391C12.6027 2.02211 13.2218 2.57927 13.2218 3.26656V11.9778C13.2218 12.6651 12.6027 13.2222 11.8391 13.2222H2.16006C1.39641 13.2222 0.777344 12.6651 0.777344 11.9778V3.26656C0.777344 2.57927 1.39641 2.02211 2.16006 2.02211Z" stroke="#737374" stroke-width="0.977778" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </span>
                                </div>
                            </div>
                            <div class="tg-booking-form-parent-inner mr-15 mb-15">
                                <span class="tg-booking-form-title mb-5">Check Out:</span>
                                <div class="tg-booking-add-input-date p-relative">
                                    <input class="input flatpickr-input" name="datetime-local" type="text" placeholder="dd/mm/yyyy" readonly="readonly">
                                    <span>
                                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M9.76501 0.777771V3.26668M4.23413 0.777771V3.26668M0.777344 5.75548H13.2218M2.16006 2.02211H11.8391C12.6027 2.02211 13.2218 2.57927 13.2218 3.26656V11.9778C13.2218 12.6651 12.6027 13.2222 11.8391 13.2222H2.16006C1.39641 13.2222 0.777344 12.6651 0.777344 11.9778V3.26656C0.777344 2.57927 1.39641 2.02211 2.16006 2.02211Z" stroke="#737374" stroke-width="0.977778" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </span>
                                </div>
                            </div>
                            <div class="tg-booking-form-parent-inner tg-hero-quantity p-relative mr-15 mb-15">
                                <span class="tg-booking-form-title mb-5">Guest:</span>
                                <div class="tg-booking-add-input-field tg-booking-quantity-toggle">
                                    <span class="tg-booking-title-value">+ Add Guests</span>
                                    <span class="location">
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_53_98)">
                                                <path d="M1.51285 15.2889C1.33507 15.2889 1.15729 15.2 1.0684 15.1111C0.979514 14.9334 0.890625 14.8445 0.890625 14.6667C0.890625 13.4222 1.24618 12.1778 1.8684 11.0222C2.49063 9.95558 3.4684 8.9778 4.53507 8.35558C4.09062 7.82225 3.73507 7.11114 3.55729 6.40003C3.4684 5.68892 3.4684 4.88892 3.64618 4.26669C3.82396 3.55558 4.2684 2.84447 4.71285 2.31114C5.24618 1.7778 5.8684 1.33336 6.49063 1.15558C7.02396 0.977805 7.55729 0.888916 8.09063 0.888916C8.2684 0.888916 8.53507 0.888916 8.71285 0.888916C9.42396 0.977805 10.1351 1.24447 10.7573 1.68892C11.3795 2.13336 11.824 2.66669 12.1795 3.28892C12.5351 3.91114 12.7128 4.62225 12.7128 5.42225C12.7128 6.48892 12.3573 7.55558 11.6462 8.35558C12.1795 8.71114 12.7128 9.06669 13.2462 9.51114C13.9573 10.2222 14.4017 10.9334 14.8462 11.8222C15.2017 12.7111 15.3795 13.6 15.3795 14.5778C15.3795 14.7556 15.2906 14.9334 15.2017 15.0222C15.1128 15.1111 14.9351 15.2 14.7573 15.2C14.6684 15.2 14.5795 15.2 14.4906 15.1111C14.4017 15.1111 14.3128 15.0222 14.3128 14.9334C14.224 14.8445 14.224 14.8445 14.1351 14.7556C14.1351 14.6667 14.0462 14.5778 14.0462 14.4889C14.0462 13.6889 13.8684 12.9778 13.6017 12.2667C13.3351 11.5556 12.8906 10.9334 12.2684 10.4C11.7351 9.95558 11.2017 9.51114 10.5795 9.24447C9.8684 9.68892 9.0684 9.95558 8.09063 9.95558C7.20174 9.95558 6.31285 9.68892 5.60174 9.24447C4.62396 9.68892 3.73507 10.4 3.11285 11.3778C2.49063 12.3556 2.13507 13.4222 2.13507 14.5778C2.13507 14.7556 2.04618 14.9334 1.95729 15.0222C1.8684 15.2 1.69062 15.2889 1.51285 15.2889ZM8.09063 2.22225C7.4684 2.22225 6.84618 2.40003 6.31285 2.75558C5.69062 3.11114 5.33507 3.64447 5.0684 4.1778C4.80174 4.80003 4.71285 5.42225 4.89063 6.13336C4.97951 6.75558 5.33507 7.37781 5.77951 7.82225C6.22396 8.26669 6.84618 8.62225 7.4684 8.71114C7.64618 8.71114 7.91285 8.80003 8.09063 8.80003C8.53507 8.80003 8.97951 8.71114 9.33507 8.53336C9.95729 8.26669 10.4017 7.91114 10.8462 7.28892C11.2017 6.75558 11.3795 6.13336 11.3795 5.51114C11.3795 4.62225 11.024 3.82225 10.4017 3.20003C9.77951 2.48892 8.97951 2.22225 8.09063 2.22225Z" fill="currentColor"></path>
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_53_98">
                                                    <rect width="16" height="16" fill="currentColor"></rect>
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </span>
                                </div>
                                <div class="tg-booking-form-location-list tg-quantity tg-booking-quantity-active">
                                    <ul>
                                        <li>
                                            <span class="mr-20">Rooms</span>
                                            <div class="tg-booking-quantity-item">
                                                <span class="increment">
                                                    <svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M1.21924 7H13.3836" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M7.30176 13V1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </svg>
                                                </span>
                                                <input class="tg-quantity-input" type="text" value="1">
                                                <span class="decrement">
                                                    <svg width="14" height="2" viewBox="0 0 14 2" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M1 1H13" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </svg>
                                                </span>
                                            </div>
                                        </li>
                                        <li>
                                            <span class="mr-20">Adults</span>
                                            <div class="tg-booking-quantity-item">
                                                <span class="increment">
                                                    <svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M1.21924 7H13.3836" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M7.30176 13V1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </svg>
                                                </span>
                                                <input class="tg-quantity-input" type="text" value="1">
                                                <span class="decrement">
                                                    <svg width="14" height="2" viewBox="0 0 14 2" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M1 1H13" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </svg>
                                                </span>
                                            </div>
                                        </li>
                                        <li>
                                            <span class="mr-20">Children</span>
                                            <div class="tg-booking-quantity-item">
                                                <span class="increment">
                                                    <svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M1.21924 7H13.3836" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M7.30176 13V1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </svg>
                                                </span>
                                                <input class="tg-quantity-input" type="text" value="0">
                                                <span class="decrement">
                                                    <svg width="14" height="2" viewBox="0 0 14 2" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M1 1H13" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </svg>
                                                </span>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="tg-booking-form-search-btn mt-15 ">
                                        <button class="bk-search-button w-100" type="submit">Ok</button>
                                    </div>
                                </div>
                            </div>
                            <div class="tg-booking-form-search-btn mb-15">
                                <button class="bk-search-button" type="submit">Search
                                    <span class="ml-5">
                                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_53_103)">
                                                <path d="M13.2218 13.2222L10.5188 10.5192M12.1959 6.48705C12.1959 9.6402 9.63977 12.1963 6.48662 12.1963C3.33348 12.1963 0.777344 9.6402 0.777344 6.48705C0.777344 3.3339 3.33348 0.777771 6.48662 0.777771C9.63977 0.777771 12.1959 3.3339 12.1959 6.48705Z" stroke="currentColor" stroke-width="1.575" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_53_103">
                                                    <rect width="14" height="14" fill="currentColor"></rect>
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

<div class="tg-listing-grid-area mb-85 pt-80">
    <div class="container">
        <div class="row mb-10">
            <div class="col-xl-12 col-lg-12">
                <div class="tg-listing-item-box-wrap ml-10">
                    <div class="tg-listing-box-filter mb-15">
                        <div class="row align-items-center">
                            <div class="col-lg-5 col-md-5 mb-15">
                                <div class="tg-listing-box-number-found">
                                    <span>Search Results</span>
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-7 mb-15">
                                <div class="tg-listing-box-view-type d-flex justify-content-end align-items-center">
                                    <div class="tg-listing-sort">
                                        <span>Sort by:</span>
                                        <a href="#">
                                            <svg width="14" height="16" viewBox="0 0 14 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M8.46918 3.27934C8.6098 3.41979 8.80043 3.49868 8.99918 3.49868C9.19793 3.49868 9.38855 3.41979 9.52918 3.27934L10.2492 2.55934V12.7493C10.2492 12.9483 10.3282 13.139 10.4688 13.2797C10.6095 13.4203 10.8003 13.4993 10.9992 13.4993C11.1981 13.4993 11.3889 13.4203 11.5295 13.2797C11.6702 13.139 11.7492 12.9483 11.7492 12.7493V2.55934L12.4692 3.27934C12.5378 3.35303 12.6206 3.41213 12.7126 3.45312C12.8046 3.49411 12.904 3.51615 13.0047 3.51793C13.1054 3.51971 13.2054 3.50118 13.2988 3.46346C13.3922 3.42574 13.477 3.3696 13.5482 3.29838C13.6194 3.22716 13.6756 3.14233 13.7133 3.04894C13.751 2.95555 13.7695 2.85552 13.7678 2.75482C13.766 2.65411 13.7439 2.5548 13.703 2.4628C13.662 2.3708 13.6029 2.288 13.5292 2.21934L11.5292 0.21934C11.3886 0.0788894 11.1979 0 10.9992 0C10.8004 0 10.6098 0.0788894 10.4692 0.21934L8.46918 2.21934C8.32873 2.35997 8.24984 2.55059 8.24984 2.74934C8.24984 2.94809 8.32873 3.13871 8.46918 3.27934ZM3.74918 12.9393L4.46918 12.2193C4.53784 12.1457 4.62064 12.0866 4.71264 12.0456C4.80464 12.0046 4.90395 11.9825 5.00465 11.9807C5.10536 11.979 5.20539 11.9975 5.29877 12.0352C5.39216 12.0729 5.477 12.1291 5.54821 12.2003C5.61943 12.2715 5.67558 12.3564 5.7133 12.4497C5.75102 12.5431 5.76955 12.6432 5.76777 12.7439C5.76599 12.8446 5.74395 12.9439 5.70296 13.0359C5.66197 13.1279 5.60286 13.2107 5.52918 13.2793L3.52918 15.2793C3.38855 15.4198 3.19793 15.4987 2.99918 15.4987C2.80043 15.4987 2.6098 15.4198 2.46918 15.2793L0.469177 13.2793C0.39549 13.2107 0.336388 13.1279 0.295396 13.0359C0.254404 12.9439 0.232362 12.8446 0.230585 12.7439C0.228809 12.6432 0.247333 12.5431 0.285054 12.4497C0.322775 12.3564 0.37892 12.2715 0.450138 12.2003C0.521357 12.1291 0.606191 12.0729 0.699579 12.0352C0.792967 11.9975 0.892997 11.979 0.993699 11.9807C1.0944 11.9825 1.19372 12.0046 1.28571 12.0456C1.37771 12.0866 1.46052 12.1457 1.52918 12.2193L2.24918 12.9393V2.74934C2.24918 2.55043 2.32819 2.35966 2.46885 2.21901C2.6095 2.07836 2.80026 1.99934 2.99918 1.99934C3.19809 1.99934 3.38885 2.07836 3.52951 2.21901C3.67016 2.35966 3.74918 2.55043 3.74918 2.74934V12.9393Z" fill="currentColor"></path>
                                            </svg>
                                        </a>
                                    </div>
                                    <div class="tg-listing-select-price ml-10">
                                        <select class="select" style="display: none;">
                                            <option>Price Low</option>
                                            <option>Price High</option>
                                            <option>Default</option>
                                            <option>Latest</option>
                                            <option>Trending</option>
                                        </select>
                                        <div class="nice-select select" tabindex="0"><span class="current">Price Low</span>
                                            <ul class="list">
                                                <li data-value="Price Low" class="option selected">Price Low</li>
                                                <li data-value="Price High" class="option">Price High</li>
                                                <li data-value="Default" class="option">Default</li>
                                                <li data-value="Latest" class="option">Latest</li>
                                                <li data-value="Trending" class="option">Trending</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="d-none d-sm-block">
                                        <div class="tg-listing-box-view ml-10 d-flex">
                                            <div class="list-switch-item">
                                                <button class="grid-view active">
                                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M8 1H1V8H8V1Z" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M19 1H12V8H19V1Z" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M19 12H12V19H19V12Z" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M8 12H1V19H8V12Z" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </svg>
                                                </button>
                                            </div>
                                            <div class="list-switch-item ml-5">
                                                <button class="list-view">
                                                    <svg width="20" height="14" viewBox="0 0 20 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M6 1H19M6 7H19M6 13H19M1 1H1.01M1 7H1.01M1 13H1.01" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
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
                        @if($hotels->isNotEmpty())
                        <div class="row list-card">
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
                        @else
                        <p>No results found.</p>

                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection