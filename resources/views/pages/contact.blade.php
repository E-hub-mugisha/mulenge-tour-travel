@extends('layouts.guest')
@section('title', 'Contact us | Mulenge')
@section('content')

<!-- tg-breadcrumb-area-start -->
<div class="tg-breadcrumb-spacing-3 include-bg p-relative fix" data-background="{{ asset('assets/pages/img/breadcrumb/breadcrumb-2.jpg')}}">
    <div class="tg-hero-top-shadow"></div>
</div>

<div class="tg-contact-area pt-130 p-relative z-index-1 pb-100">
    <img class="tg-team-shape-2 d-none d-md-block" src="{{ asset('assets/pages/img/banner/banner-2/shape.png') }}" alt="">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5">
                <div class="tg-team-details-contant tg-contact-info-wrap mb-30">
                    <h6 class="mb-15">Information:</h6>
                    <div class="tg-team-details-contact-info mb-35">
                        <div class="tg-team-details-contact">
                            <div class="item">
                                <span>Phone :</span>&nbsp;
                                <a href="tel:+1239998000">+123 9998 000</a>
                            </div>
                            <div class="item">
                                <span>Website :&nbsp;</span>
                                <a href="#">www.mulenge.com</a>
                            </div>
                            <div class="item">
                                <span>E-mail :&nbsp;</span>
                                <a href="mailto:mulenge@gmail.com">mulenge@gmail.com</a>
                            </div>
                            <div class="item">
                                <span>Address :</span>
                                <a href="#"> KK 400 ST, Rwanda&nbsp;</a>
                            </div>
                        </div>
                    </div>
                    <div class="tg-contact-map h-100">
                        <div style="max-width:100%;overflow:hidden;color:red;width:600px;height:450px;">
                            <div id="google-maps-display" style="height:100%; width:100%;max-width:100%;"><iframe style="height:100%;width:100%;border:0;" frameborder="0" src="https://www.google.com/maps/embed/v1/place?q=KK+400+ST+kigali+rwanda&key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8"></iframe></div><a class="from-embedmap-code" href="https://www.bootstrapskins.com/themes" id="get-data-for-map">premium bootstrap themes</a>
                            <style>
                                #google-maps-display img {
                                    max-height: none;
                                    max-width: none !important;
                                    background: none !important;
                                }
                            </style>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="tg-contact-content-wrap ml-40 mb-30">
                    <h3 class="tg-contact-title mb-15">Let's connect and get to know <br>
                        each other</h3>
                    <p class="mb-30">Brendan Fraser, renowned actor of the silver screen, has taken on a new
                        role as a tour guide, leveraging his passion.</p>
                    <div class="tg-contact-form tg-tour-about-review-form">
                        <form id="contact-form" action="#" method="post">
                            <div class="row">
                                <div class="col-lg-6 mb-25">
                                    <input class="input" type="text" name="name" placeholder="Name">
                                </div>
                                <div class="col-lg-6 mb-25">
                                    <input class="input" type="email" name="email" placeholder="E-mail">
                                </div>
                                <div class="col-lg-12 mb-25">
                                    <input class="input" type="text" name="website" placeholder="Website">
                                </div>
                                <div class="col-lg-12">
                                    <textarea class="textarea  mb-5" placeholder="Comments"></textarea>
                                    <div class="review-checkbox d-flex align-items-center mb-25">
                                        <input name="checkbox" class="tg-checkbox" type="checkbox" id="australia">
                                        <label for="australia" class="tg-label">Save my name, email, and website in this browser for the next time I comment.</label>
                                    </div>
                                    <button type="submit" class="tg-btn" name="message">Send Message</button>
                                    <p class="ajax-response mb-0 pt-10"></p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection