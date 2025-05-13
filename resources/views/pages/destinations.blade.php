@extends('layouts.guest')
@section('title','Destinations | Mulenge')
@section('content')

<!-- tg-breadcrumb-area-start -->
<div class="tg-breadcrumb-spacing-3 include-bg p-relative fix" data-background="{{ asset('assets/pages/img/breadcrumb/breadcrumb-2.jpg')}}">
    <div class="tg-hero-top-shadow"></div>
</div>

<!-- tg-breadcrumb-area-end -->
<div class="tg-location-area p-relative pb-125 pt-135">
    <div class="container">
        <div class="row align-items-end">
            <div class="col-lg-9">
                <div class="tg-location-section-title mb-40">
                    <h5 class="tg-section-subtitle mb-15 wow fadeInUp" data-wow-delay=".4s" data-wow-duration=".9s" style="visibility: visible; animation-duration: 0.9s; animation-delay: 0.4s; animation-name: fadeInUp;">Next Adventure Destination</h5>
                    <h2 class="mb-15 text-capitalize wow fadeInUp" data-wow-delay=".5s" data-wow-duration=".9s" style="visibility: visible; animation-duration: 0.9s; animation-delay: 0.5s; animation-name: fadeInUp;">Popular Travel Destinations <br>Available Worldwide</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach( $destinations as $destination)
            <div class="col-lg-3 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay=".3s" data-wow-duration=".9s" style="visibility: visible; animation-duration: 0.9s; animation-delay: 0.3s; animation-name: fadeInUp;">
                <div class="tg-location-3-wrap p-relative mb-30 tg-round-25">
                    <div class="tg-location-thumb tg-round-25">
                        @if ($destination->image)
                        <img class="tg-card-border w-100" src="{{ asset('image/destinations/' . $destination->image) }}" alt="listing">
                        @else
                        <img class="tg-card-border w-100" src="{{ asset('image/tours/default.jpg') }}" alt="No image available">
                        @endif
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