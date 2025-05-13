@extends('layouts.guest')

@section('title', $hotel->name . ' | Mulenge')

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
                        <li><a href="{{ route('pages.hotels')}}">Hotel</a></li>
                        <li><i class="fa-sharp fa-solid fa-angle-right"></i></li>
                        <li><span>{{ $hotel->name }}</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- tg-breadcrumb-area-end -->

<!-- tg-tour-details-area-start -->
<div class="tg-tour-details-area pt-20">
    <div class="container">
        <div class="row align-items-end mb-25">
            <div class="col-xl-9 col-lg-8">
                <div class="tg-tour-details-video-title-wrap">
                    <h2 class="tg-tour-details-video-title mb-15">{{ $hotel->name }}</h2>
                    <div class="tg-tour-details-video-location d-flex flex-wrap">
                        <div class="tg-tour-details-video-feature-price mb-10 mr-25">
                            <p class="mb-0">From <span>${{ $hotel->price }}</span> / Night</p>
                        </div>
                        <span class="mr-25 mb-10"><i class="fa-regular fa-location-dot"></i>{{ $hotel->address }} - {{ $hotel->location }}</span>
                        <div class="tg-tour-details-video-ratings mb-10">
                            <span><i class="fa-sharp fa-solid fa-star"></i></span>
                            <span><i class="fa-sharp fa-solid fa-star"></i></span>
                            <span><i class="fa-sharp fa-solid fa-star"></i></span>
                            <span><i class="fa-sharp fa-solid fa-star"></i></span>
                            <span><i class="fa-sharp fa-solid fa-star"></i></span>
                            <span class="review">(5 Reviews)</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4">
                <div class="tg-tour-details-video-share text-end mb-10">
                    <a href="#">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5.87746 9.03227L10.7343 11.8625M10.7272 4.05449L5.87746 6.88471M14.7023 2.98071C14.7023 4.15892 13.7472 5.11405 12.569 5.11405C11.3908 5.11405 10.4357 4.15892 10.4357 2.98071C10.4357 1.80251 11.3908 0.847382 12.569 0.847382C13.7472 0.847382 14.7023 1.80251 14.7023 2.98071ZM6.16901 7.95849C6.16901 9.1367 5.21388 10.0918 4.03568 10.0918C2.85747 10.0918 1.90234 9.1367 1.90234 7.95849C1.90234 6.78029 2.85747 5.82516 4.03568 5.82516C5.21388 5.82516 6.16901 6.78029 6.16901 7.95849ZM14.7023 12.9363C14.7023 14.1145 13.7472 15.0696 12.569 15.0696C11.3908 15.0696 10.4357 14.1145 10.4357 12.9363C10.4357 11.7581 11.3908 10.8029 12.569 10.8029C13.7472 10.8029 14.7023 11.7581 14.7023 12.9363Z" stroke="currentColor" stroke-width="0.977778" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        Share
                    </a>
                    <a href="#" class="ml-25">
                        <svg width="16" height="14" viewBox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10.2606 10.7831L10.2878 10.8183L10.2606 10.7831L10.2482 10.7928C10.0554 10.9422 9.86349 11.0909 9.67488 11.2404C9.32643 11.5165 9.01846 11.7565 8.72239 11.9304C8.42614 12.1044 8.19324 12.1804 7.99978 12.1804C7.80633 12.1804 7.57342 12.1044 7.27718 11.9304C6.9811 11.7565 6.67312 11.5165 6.32472 11.2404C6.13618 11.091 5.94436 10.9423 5.75159 10.7929L5.73897 10.7831C4.90868 10.1397 4.06133 9.48294 3.36178 8.6911C2.51401 7.73157 1.92536 6.61544 1.92536 5.16811C1.92536 3.75448 2.71997 2.57143 3.80086 2.07481C4.84765 1.59384 6.26028 1.71692 7.61021 3.12673L7.64151 3.09675L7.61021 3.12673C7.7121 3.23312 7.85274 3.2933 7.99978 3.2933C8.14682 3.2933 8.28746 3.23312 8.38936 3.12673L8.35868 3.09736L8.38936 3.12673C9.73926 1.71692 11.1519 1.59384 12.1987 2.07481C13.2796 2.57143 14.0742 3.75448 14.0742 5.16811C14.0742 6.61544 13.4856 7.73157 12.6378 8.69109L12.668 8.71776L12.6378 8.6911C11.9382 9.48294 11.0909 10.1397 10.2606 10.7831ZM5.10884 11.6673L5.13604 11.6321L5.10884 11.6673L5.10901 11.6674C5.29802 11.8137 5.48112 11.9554 5.65523 12.0933C5.99368 12.3616 6.35981 12.6498 6.73154 12.8682L6.75405 12.8298L6.73154 12.8682C7.10315 13.0864 7.53174 13.2667 7.99978 13.2667C8.46782 13.2667 8.89641 13.0864 9.26802 12.8682L9.24552 12.8298L9.26803 12.8682C9.63979 12.6498 10.0059 12.3615 10.3443 12.0933C10.5185 11.9553 10.7016 11.8136 10.8907 11.6673L10.8907 11.6673L10.8926 11.6659C11.7255 11.0212 12.6722 10.2884 13.4463 9.41228L13.413 9.38285L13.4463 9.41227C14.4145 8.31636 15.1553 6.95427 15.1553 5.16811C15.1553 3.34832 14.1308 1.76808 12.6483 1.08693C11.2517 0.445248 9.53362 0.635775 7.99979 1.99784C6.46598 0.635775 4.74782 0.445248 3.35124 1.08693C1.86877 1.76808 0.844227 3.34832 0.844227 5.16811C0.844227 6.95427 1.58502 8.31636 2.55325 9.41227C3.32727 10.2883 4.27395 11.0211 5.10682 11.6657L5.10884 11.6673Z" fill="currentColor" stroke="currentColor" stroke-width="0.0888889" />
                        </svg>
                        Add to Wishlist
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- tg-tour-details-area-end -->

<!-- tg-tour-about-start -->
<div class="tg-tour-about-area">
    <div class="container">
        <div class="row">
            <div class="col-xl-9 col-lg-8">
                <div class="tg-tour-about-wrap mr-55">
                    <div class="tg-tour-details-gallery-slider-wrap mb-40">
                        <div class="swiper-container tg-tour-details-gallery-active pb-20">
                            <div class="swiper-wrapper">
                                @foreach( $hotelImages as $image)
                                <div class="swiper-slide">
                                    <div class="tg-tour-details-gallery-thumb">
                                        <img class="w-100" src="{{ asset('image/hotels/' . $image->images) }}" alt="">
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="tg-tour-details-gallery-navigation">
                                <button class="tg-tour-details-gallery-prev">
                                    <svg width="21" height="15" viewBox="0 0 21 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M20.0449 7.45455H1.8631M1.8631 7.45455L8.22674 1.09091M1.8631 7.45455L8.22674 13.8182" stroke="currentColor" stroke-width="1.81818" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </button>
                                <button class="tg-tour-details-gallery-next">
                                    <svg width="21" height="15" viewBox="0 0 21 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0.955078 7.45455H19.1369M19.1369 7.45455L12.7733 1.09091M19.1369 7.45455L12.7733 13.8182" stroke="currentColor" stroke-width="1.81818" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-lg-12">
                                <div class="swiper-container tg-tour-details-gallery-thumb-active p-relative">
                                    <div class="swiper-wrapper">
                                        @foreach( $hotelImages as $image)
                                        <div class="swiper-slide">
                                            <div class="tg-tour-details-gallery-thumb">
                                                <img class="w-100" src="{{ asset('image/hotels/' . $image->images) }}" alt="">
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tg-tour-details-feature-list-wrap mb-30">
                        <div class="row align-items-center">
                            <div class="col-lg-12">
                                <div class="tg-tour-details-video-feature-list tg-tour-details-video-feature-2-list">
                                    <ul>
                                        <li>
                                            <span class="icon">
                                                <!-- Room Availability Icon -->
                                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M9 2C5.68629 2 3 4.68629 3 8C3 11.3137 5.68629 14 9 14C12.3137 14 15 11.3137 15 8C15 4.68629 12.3137 2 9 2Z" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </span>
                                            <div>
                                                <span class="title">Available Rooms</span>
                                                <span class="duration">{{ $hotel->available_rooms }} Rooms</span>
                                            </div>
                                        </li>

                                        <li>
                                            <span class="icon">
                                                <!-- Total Rooms Icon -->
                                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M2 4H14M4 4V12H12V4" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </span>
                                            <div>
                                                <span class="title">Total Rooms</span>
                                                <span class="duration">{{ $hotel->total_rooms }} Rooms</span>
                                            </div>
                                        </li>

                                        <li>
                                            <span class="icon">
                                                <!-- Hotel Type Icon -->
                                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M2 12V5.5L8 1L14 5.5V12H2Z" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </span>
                                            <div>
                                                <span class="title">Hotel Type</span>
                                                <span class="duration">{{ $hotel->hotel_type }}</span>
                                            </div>
                                        </li>

                                        <li>
                                            <span class="icon">
                                                <!-- Price Icon -->
                                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M4 2H12V14H4V2Z" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </span>
                                            <div>
                                                <span class="title">Price</span>
                                                <span class="duration">{{ $hotel->price }} USD</span>
                                            </div>
                                        </li>
                                    </ul>


                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tg-tour-about-content tg-tour-about-2-content">
                        <div class="tg-tour-about-inner tg-tour-about-2-inner mb-30">
                            <h4 class="tg-tour-about-title mb-15">About This Hotel</h4>
                            <p class="text-capitalize lh-28 mb-35">{{ $hotel->description }}</p>
                            <h4 class="tg-tour-about-title mb-20">Amenities</h4>
                            <div class="tg-tour-about-list">
                                <ul>
                                    <li>
                                        <span class="icon mr-10">
                                            <!-- Amenities Icon -->
                                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M2 2H16V16H2V2Z" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </span>
                                        <span class="text">{{ $hotel->amenities }}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="tg-tour-about-inner tg-tour-about-2-inner mb-30">
                            <h4 class="tg-tour-about-title mb-10">Contact Info</h4>
                            <div class="row">
                                <div class="col-lg-7">
                                    <div class="tg-tour-about-list tg-tour-about-list-2">
                                        <ul>
                                            <li>
                                                <span class="icon mr-10">
                                                    <!-- Phone Icon -->
                                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M1 1C3.66667 3.66667 4.5 5.5 5.5 6.5C6.5 7.5 8.5 10.5 9.5 11.5C10.5 12.5 12.5 13.5 13.5 12.5C14.5 11.5 16.5 9.5 17 8C16.5 6.5 14.5 5.5 13 5.5C11.5 5.5 10.5 6.5 9.5 8.5C8.5 9.5 7 10.5 5 9.5C3.5 8.5 2.5 7 1 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                </span>
                                                <span class="text">{{ $hotel->contact_number }}</span>
                                            </li>
                                            <li>
                                                <span class="icon mr-10">
                                                    <!-- Email Icon -->
                                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M1 4L9 9L17 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                        <path d="M1 14L9 9L17 14" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                </span>
                                                <span class="text">{{ $hotel->email }}</span>
                                            </li>
                                            <li>
                                                <span class="icon mr-10">
                                                    <!-- Website Icon -->
                                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M2 4H16V14H2V4Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                        <path d="M2 8H16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                </span>
                                                <span class="text">{{ $hotel->website }}</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
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
            <div class="col-xl-3 col-lg-4">
                <div class="tg-tour-about-sidebar top-sticky mb-50">
                    <form action="{{ route('hotel.booking.store') }}" method="POST" id="bookingForm">
                        @csrf
                        <h4 class="tg-tour-about-title title-2 mb-15">Book This Hotel</h4>
                        <input class="input" hidden value="{{ $hotel->id }}" name="hotel_id" id="hotel_id" required>
                        <!-- Check-in and Check-out Dates -->
                        <div class="tg-booking-form-parent-inner mb-10">
                            <div class="tg-tour-about-date p-relative">
                                <input class="input" name="checkin_date" id="checkin_date" type="datetime-local" required>
                                <span class="calender">
                                    <!-- Calendar Icon -->
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M11.1111 1V3.80003M4.88888 1V3.80003M1 6.59992H15M2.55556 2.39988H13.4444C14.3036 2.39988 15 3.02668 15 3.79989V13.6C15 14.3732 14.3036 15 13.4444 15H2.55556C1.69645 15 1 14.3732 1 13.6V3.79989C1 3.02668 1.69645 2.39988 2.55556 2.39988Z" stroke="#560CE3" stroke-width="1.1" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </span>
                            </div>
                        </div>
                        <div class="tg-booking-form-parent-inner mb-10">
                            <div class="tg-tour-about-date p-relative">
                                <input class="input" name="checkout_date" id="checkout_date" type="datetime-local" required>
                                <span class="calender">
                                    <!-- Calendar Icon -->
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M11.1111 1V3.80003M4.88888 1V3.80003M1 6.59992H15M2.55556 2.39988H13.4444C14.3036 2.39988 15 3.02668 15 3.79989V13.6C15 14.3732 14.3036 15 13.4444 15H2.55556C1.69645 15 1 14.3732 1 13.6V3.79989C1 3.02668 1.69645 2.39988 2.55556 2.39988Z" stroke="#560CE3" stroke-width="1.1" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </span>
                            </div>
                        </div>

                        <!-- Number of Rooms -->
                        <div class="tg-tour-about-time d-flex align-items-center mb-10">
                            <span class="time">Number of Rooms:</span>
                            <select name="number_of_rooms" class="select">
                                <option value="1">1 Room</option>
                                <option value="2">2 Rooms</option>
                                <option value="3">3 Rooms</option>
                                <option value="4">4 Rooms</option>
                                <option value="5">5 Rooms</option>
                            </select>
                        </div>

                        <!-- Number of Guests -->
                        <div class="tg-tour-about-time d-flex align-items-center mb-10">
                            <span class="time">Number of Guests:</span>
                            <select name="number_of_guests" class="select">
                                <option value="1">1 Guest</option>
                                <option value="2">2 Guests</option>
                                <option value="3">3 Guests</option>
                                <option value="4">4 Guests</option>
                                <option value="5">5 Guests</option>
                            </select>
                        </div>

                        <!-- Special Requests -->
                        <div class="tg-tour-about-extra mb-10">
                            <span class="tg-tour-about-sidebar-title mb-10 d-inline-block">Special Requests:</span>
                            <textarea name="special_requests" class="form-control" placeholder="Any special requests?"></textarea>
                        </div>

                        <!-- Add Extra Services -->
                        <div class="tg-tour-about-extra mb-10">
                            <span class="tg-tour-about-sidebar-title mb-10 d-inline-block">Add Extra Services:</span>
                            <div class="tg-filter-list">
                                <ul>
                                    <li>
                                        <div class="checkbox d-flex">
                                            <input class="tg-checkbox" type="checkbox" id="amenities-1" name="extra_services[]" value="30.00">
                                            <label for="amenities-1" class="tg-label">Service per booking</label>
                                        </div>
                                        <span class="quantity">$30.00</span>
                                    </li>
                                    <li>
                                        <div class="checkbox d-flex">
                                            <input class="tg-checkbox" type="checkbox" id="amenities-2" name="extra_services[]" value="20.00">
                                            <label for="amenities-2" class="tg-label">Service per person</label>
                                        </div>
                                        <span class="quantity">$20.00</span>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Total Cost Calculation -->
                        <div class="tg-tour-about-coast d-flex align-items-center flex-wrap justify-content-between mb-20">
                            <span class="tg-tour-about-sidebar-title d-inline-block">Total Cost:</span>
                            <h5 class="total-price" id="total_cost">$0.00</h5>
                        </div>

                        <!-- Submit Button -->
                        <button type="button" class="tg-btn tg-btn-switch-animation w-100" onclick="checkAuthBeforeSubmit()">Request a Book Now</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- tg-tour-about-end -->

<!-- tg-listing-area-start -->
<div class="tg-listing-area pt-90 pb-115 p-relative z-index-9">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-lg-9">
                <div class="tg-location-section-title mb-40">
                    <h5 class="tg-section-subtitle mb-15 wow fadeInUp" data-wow-delay=".4s" data-wow-duration=".9s">Most Popular Hotel Packages </h5>
                    <h2 class="mb-15 text-capitalize wow fadeInUp" data-wow-delay=".5s" data-wow-duration=".9s">Our Popular Hotels</h2>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="tg-location-3-btn text-end wow fadeInUp mb-40" data-wow-delay=".6s" data-wow-duration=".9s">
                    <a href="{{ route('pages.hotels') }}" class="tg-btn tg-btn-gray tg-btn-switch-animation">
                        <span class="d-flex align-items-center justify-content-center">
                            <span class="btn-text">See All Deal</span>
                            <span class="btn-icon ml-5">
                                <svg width="21" height="16" viewBox="0 0 21 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1.0017 8.00001H19.9514M19.9514 8.00001L12.9766 1.02515M19.9514 8.00001L12.9766 14.9749" stroke="currentColor" stroke-width="1.77778" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </span>
                            <span class="btn-icon ml-5">
                                <svg width="21" height="16" viewBox="0 0 21 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1.0017 8.00001H19.9514M19.9514 8.00001L12.9766 1.02515M19.9514 8.00001L12.9766 14.9749" stroke="currentColor" stroke-width="1.77778" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </span>
                        </span>
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="swiper-container tg-listing-slider p-relative fix">
                    <div class="swiper-wrapper mb-35">
                        @foreach ($relatedHotels as $hotel)
                        <div class="swiper-slide">
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

                    <div class="tg-listing-4-pagination swiper-pagination"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- tg-listing-area-end -->

<script>
    function checkAuthBeforeSubmit() {
        @if(auth() -> check())
        document.getElementById('bookingForm').submit();
        @else
        window.location.href = "{{ route('login') }}";
        @endif
    }
</script>

@endsection