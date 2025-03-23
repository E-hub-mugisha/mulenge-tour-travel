<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="description" content="@yield('title')">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('assets/pages/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/pages/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/pages/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/pages/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/pages/css/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/pages/css/flatpicker.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/pages/css/odometer.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/pages/css/default.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/pages/css/main.css') }}">
</head>

<body>

    @include('includes.header')

    <main>
        @yield('content')
    </main>
    <!-- footer-area-start -->
    @include('includes.footer')
    <!-- footer-area-end -->

    <!-- JS here -->
    <script src="{{ asset('assets/pages/js/vendor/jquery.js') }}"></script>
    <script src="{{ asset('assets/pages/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/pages/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/pages/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/pages/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/pages/js/jquery.odometer.min.js') }}"></script>
    <script src="{{ asset('assets/pages/js/jquery.appear.js') }}"></script>
    <script src="{{ asset('assets/pages/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/pages/js/flatpickr.js') }}"></script>
    <script src="{{ asset('assets/pages/js/nice-select.js') }}"></script>
    <script src="{{ asset('assets/pages/js/ajax-form.js') }}"></script>
    <script src="{{ asset('assets/pages/js/wow.min.js') }}"></script>
    <script src="{{ asset('assets/pages/js/main.js') }}"></script>
</body>

</html>