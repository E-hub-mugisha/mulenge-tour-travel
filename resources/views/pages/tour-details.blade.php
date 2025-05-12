@extends('layouts.guest')

@section('title', $tour->name . ' | Mulenge')

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
                        <li><a href="{{ route('pages.tours')}}">Tour</a></li>
                        <li><i class="fa-sharp fa-solid fa-angle-right"></i></li>
                        <li><span>{{ $tour->name }}</span></li>
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
                    <h2 class="tg-tour-details-video-title mb-15">{{ $tour->name }}</h2>
                    <div class="tg-tour-details-video-location d-flex flex-wrap">
                        <div class="tg-tour-details-video-feature-price mb-10 mr-25">
                            <p class="mb-0">From <span>${{ $tour->price }}</span> / Person</p>
                        </div>
                        <span class="mr-25 mb-10"><i class="fa-regular fa-location-dot"></i>{{ $tour->location }}</span>
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
                                @foreach( $tourImages as $image)
                                <div class="swiper-slide">
                                    <div class="tg-tour-details-gallery-thumb">
                                        <img class="w-100" src="{{ asset('image/tours/' . $image->images) }}" alt="">
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
                                        @foreach( $tourImages as $image)
                                        <div class="swiper-slide">
                                            <div class="tg-tour-details-gallery-thumb">
                                                <img class="w-100" src="{{ asset('image/tours/' . $image->images) }}" alt="">
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
                                                <!-- Duration Icon -->
                                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M9.00001 4.19992V8.99992L12.2 10.5999M17 9C17 13.4183 13.4183 17 9 17C4.58172 17 1 13.4183 1 9C1 4.58172 4.58172 1 9 1C13.4183 1 17 4.58172 17 9Z" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </span>
                                            <div>
                                                <span class="title">Duration</span>
                                                <span class="duration">{{ $tour->duration }} days</span>
                                            </div>
                                        </li>

                                        <li>
                                            <span class="icon">
                                                <!-- Activities Icon -->
                                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M8 1L1 15H15L8 1Z" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </span>
                                            <div>
                                                <span class="title">Activities</span>
                                                <span class="duration">
                                                    @foreach($tour->activities as $activity)
                                                    {{ $activity->name }}{{ !$loop->last ? ', ' : '' }}
                                                    @endforeach
                                                </span>
                                            </div>
                                        </li>

                                        <li>
                                            <span class="icon">
                                                <!-- Accommodations Icon -->
                                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 6H15M3 6V14H13V6M5 10H7M9 10H11" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </span>
                                            <div>
                                                <span class="title">Accommodations</span>
                                                <span class="duration">
                                                    @foreach($tour->accommodations as $accommodation)
                                                    {{ $accommodation->type_name }}{{ !$loop->last ? ', ' : '' }}
                                                    @endforeach
                                                </span>
                                            </div>
                                        </li>

                                        <li>
                                            <span class="icon">
                                                <!-- Transportation Icon -->
                                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 6H15M3 6V14H13V6M5 10H7M9 10H11" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </span>
                                            <div>
                                                <span class="title">Transportation</span>
                                                <span class="duration">
                                                    @foreach($tour->transportation as $transport)
                                                    {{ $transport->type_name }}{{ !$loop->last ? ', ' : '' }}
                                                    @endforeach
                                                </span>
                                            </div>
                                        </li>
                                    </ul>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tg-tour-about-content tg-tour-about-2-content">
                        <div class="tg-tour-about-inner tg-tour-about-2-inner mb-30">
                            <h4 class="tg-tour-about-title mb-15">About This Tour</h4>
                            <p class="text-capitalize lh-28 mb-35">{{ $tour->description }}</p>
                            <h4 class="tg-tour-about-title mb-20">Trip Highlights</h4>
                            <div class="tg-tour-about-list">
                                <ul>
                                    @foreach(explode("|",$tour->trip_highlights) as $trip_highlights)
                                    <li>
                                        <span class="icon mr-10"><i class="fa-sharp fa-solid fa-check fa-fw"></i></span>
                                        <span class="text">{!! $trip_highlights !!}</span>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="tg-tour-about-inner  tg-tour-about-2-inner mb-30">
                            <h4 class="tg-tour-about-title mb-10">Included/Excludes</h4>
                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="tg-tour-about-list  tg-tour-about-list-2">
                                        <ul>
                                            @foreach(explode("|",$tour->included) as $included)
                                            <li>
                                                <span class="icon mr-10"><i class="fa-sharp fa-solid fa-check fa-fw"></i></span>
                                                <span class="text">{!!$included!!}</span>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="tg-tour-about-list tg-tour-about-list-2 disable">
                                        <ul>
                                            @foreach(explode("|",$tour->exclude) as $exclude)
                                            <li>
                                                <span class="icon mr-10"><i class="fa-sharp fa-solid fa-xmark"></i></span>
                                                <span class="text">{!!$exclude!!}</span>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tg-tour-about-map tg-tour-about-2-inner mb-40">
                            <h4 class="tg-tour-about-title mb-15">Location on map</h4>
                            <div class="tg-tour-about-map h-100">
                                <iframe class="gmap_iframe h-100 w-100" src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q={{$tour->location}}&amp;t=&amp;z=12&amp;ie=UTF8&amp;iwloc=B&amp;output=embed" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                        <div class="tg-tour-about-border mb-35"></div>
                        <div class="tg-tour-about-cus-review-wrap mb-25">
                            <h4 class="tg-tour-about-title mb-40">2 Reviews</h4>
                            <ul>
                                @foreach($reviews as $review)
                                <li>
                                    <div class="tg-tour-about-cus-review d-flex mb-40">
                                        <div class="tg-tour-about-cus-review-thumb">
                                            <img src="{{ asset('assets/pages/img/tour-details/avatar.png') }}" alt="avatar">
                                        </div>
                                        <div>
                                            <div class="tg-tour-about-cus-name mb-5 d-flex align-items-center justify-content-between flex-wrap">
                                                <h6 class="mr-10 mb-10 d-inline-block">{{ $review->user->name }} <span>- {{ $review->created_at->format('d M, Y - H:i A') }}</span></h6>
                                                <span class="tg-tour-about-cus-review-star mb-10 d-inline-block">
                                                    @for ($i = 0; $i < 5; $i++)
                                                        <i class="fa-sharp fa-solid fa-star{{ $i < $review->average_rating ? '' : '-o' }}"></i>
                                                        @endfor
                                                </span>
                                            </div>
                                            <p class="text-capitalize lh-28 mb-10">{{ $review->message }}</p>
                                            <a class="tg-tour-about-cus-reply" href="#">Reply</a>
                                        </div>
                                    </div>
                                    <div class="tg-tour-about-border mb-40"></div>
                                </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="tg-tour-about-border mb-45"></div>
                        <div class="tg-tour-about-review-form-wrap mb-45">
                            <h4 class="tg-tour-about-title mb-5">Leave a Reply</h4>


                            <div class="tg-tour-about-review-form">
                                <form action="{{ route('tour.review.store', $tour->id) }}" method="POST">
                                    @csrf
                                    <div class="tg-tour-about-rating-category mb-20">
                                        <ul>
                                            @foreach (['location', 'price', 'amenities', 'rooms', 'services'] as $rating)
                                            <li>
                                                <label>{{ ucfirst($rating) }}:</label>
                                                <div class="rating-icon">
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        <input type="radio" name="{{ $rating }}_rating" value="{{ $i }}" id="{{ $rating }}_{{ $i }}">
                                                        <label for="{{ $rating }}_{{ $i }}"><i class="fa-sharp fa-solid fa-star"></i></label>
                                                        @endfor
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="row">

                                        <div class="col-lg-12">
                                            <textarea class="textarea mb-5" name="message" placeholder="Write Message" required></textarea>
                                            <div class="review-checkbox d-flex align-items-center mb-25">
                                                <input class="tg-checkbox" type="checkbox" id="australia" name="remember_me">
                                                <label for="australia" class="tg-label">Save my name, email, and website in this browser for the next time I comment.</label>
                                            </div>
                                            <button type="submit" class="tg-btn tg-btn-switch-animation">Submit Review</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4">
                <div class="tg-tour-about-sidebar top-sticky mb-50">
                    <form method="POST" action="{{ route('tour.bookings.store') }}" id="bookingForm">
                        @csrf
                        <h4 class="tg-tour-about-title title-2 mb-15">Book This Tour</h4>

                        <input type="hidden" name="tour_id" value="{{ $tour->id }}">
                        <input type="hidden" name="user_id" value="{{ auth()->id() }}">

                        <!-- Date Input -->
                        <div class="tg-booking-form-parent-inner mb-10">
                            <div class="tg-tour-about-date p-relative">
                                <input class="input" name="booking_date" id="booking_date" type="datetime-local" required>
                            </div>
                        </div>

                        <!-- Ticket Selection -->
                        <div class="tg-booking-form-parent-inner mb-10">
                            <label for="number_of_guests">Number of Guests</label>
                            <input type="number" name="number_of_guests" id="number_of_guests" class="form-control" required>
                        </div>

                        <div class="tg-tour-about-coast d-flex align-items-center flex-wrap justify-content-between mb-20">
                            <span class="tg-tour-about-sidebar-title d-inline-block">Total Cost:</span>
                            <input hidden type="number" name="price" id="price" class="form-control" value="{{ $tour->price }}" required>
                        </div>
                        <!-- Submit Button -->
                        <button type="button" class="tg-btn tg-btn-switch-animation w-100" onclick="checkAuthBeforeSubmit()">Book now</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- tg-tour-about-end -->

<!-- tg-listing-area-start -->
<div class="tg-listing-area pt-90 pb-115 p-relative z-index-9">
    <img class="tg-listing-3-shape tg-listing-4-shape d-none d-xl-block" src="assets/img/banner/banner-2/shape.png" alt="">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-lg-9">
                <div class="tg-location-section-title mb-40">
                    <h5 class="tg-section-subtitle mb-15 wow fadeInUp" data-wow-delay=".4s" data-wow-duration=".9s">Most Popular Tour Packages </h5>
                    <h2 class="mb-15 text-capitalize wow fadeInUp" data-wow-delay=".5s" data-wow-duration=".9s">Our Popular Tours</h2>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="tg-location-3-btn text-end wow fadeInUp mb-40" data-wow-delay=".6s" data-wow-duration=".9s">
                    <a href="{{ route('pages.tours') }}" class="tg-btn tg-btn-gray tg-btn-switch-animation">
                        <span class="d-flex align-items-center justify-content-center">
                            <span class="btn-text">See All Tour</span>
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
                        @foreach ($relatedTours as $tour)
                        <div class="swiper-slide">
                            <div class="tg-listing-card-item tg-listing-4-card-item mb-25">
                                <div class="tg-listing-card-thumb tg-listing-2-card-thumb mb-15 fix p-relative">
                                    <a href="{{ route('pages.tour.details', $tour->id) }}">
                                        <img class="tg-card-border w-100" src="{{ asset('assets/pages/img/listing/listing-4/thumb-2.jpg') }}" alt="{{ $tour->title }}">
                                        @if($tour->is_new)
                                        <span class="tg-listing-item-price-discount shape">New</span>
                                        @endif
                                    </a>
                                    <div class="tg-listing-2-price">
                                        <span class="new">${{ $tour->price }}</span>
                                        <span class="shift">/night</span>
                                    </div>
                                </div>
                                <div class="tg-listing-card-content p-relative">
                                    <h4 class="tg-listing-card-title mb-5">
                                        <a href="{{ route('pages.tour.details', $tour->id) }}">{{ $tour->name }}</a>
                                    </h4>
                                    <span class="tg-listing-card-duration-map d-inline-block">
                                        <svg width="13" height="16" viewBox="0 0 13 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M12.3329 6.7071C12.3329 11.2324 6.55512 15.1111 6.55512 15.1111C6.55512 15.1111 0.777344 11.2324 0.777344 6.7071C0.777344 5.16402 1.38607 3.68414 2.46962 2.59302C3.55316 1.5019 5.02276 0.888916 6.55512 0.888916C8.08748 0.888916 9.55708 1.5019 10.6406 2.59302C11.7242 3.68414 12.3329 5.16402 12.3329 6.7071Z" stroke="currentColor" stroke-width="1.15556" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M6.55512 8.64649C7.61878 8.64649 8.48105 7.7782 8.48105 6.7071C8.48105 5.636 7.61878 4.7677 6.55512 4.7677C5.49146 4.7677 4.6292 5.636 4.6292 6.7071C4.6292 7.7782 5.49146 8.64649 6.55512 8.64649Z" stroke="currentColor" stroke-width="1.15556" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        {{ $tour->location }}
                                    </span>
                                    <div class="tg-listing-card-review mb-10">
                                        @for ($i = 1; $i <= 5; $i++)
                                            <span class="tg-listing-rating-icon">
                                            <i class="fa-sharp fa-solid fa-star {{ $i <= $tour->rating ? 'text-warning' : '' }}"></i>
                                            </span>
                                            @endfor
                                            <span class="tg-listing-rating-percent">({{ $tour->reviews_count }} Reviews)</span>
                                    </div>
                                    <div class="tg-listing-avai d-flex align-items-center justify-content-between">
                                        <a class="tg-listing-avai-btn" href="{{ route('pages.tour.details', $tour->id) }}">Check Availability</a>
                                        <div class="tg-listing-item-wishlist">
                                            <a href="#">
                                                <svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M10.5167 16.3416C10.2334 16.4416 9.76675 16.4416 9.48341 16.3416C7.06675 15.5166 1.66675 12.075 1.66675 6.24165C1.66675 3.66665 3.74175 1.58331 6.30008 1.58331C7.81675 1.58331 9.15841 2.31665 10.0001 3.44998C10.8417 2.31665 12.1917 1.58331 13.7001 1.58331C16.2584 1.58331 18.3334 3.66665 18.3334 6.24165C18.3334 12.075 12.9334 15.5166 10.5167 16.3416Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
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