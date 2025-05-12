<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <link href="{{ asset('assets/dashboard/css/styles.css')}}" rel="stylesheet" />
    <link href="{{ asset('assets/dashboard/css/bootstrap.min.css') }}" rel="stylesheet"/>

    <link href="{{ asset('assets/dashboard/vendor/fontawesome/css/fontawesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/dashboard/vendor/fontawesome/css/solid.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/dashboard/vendor/fontawesome/css/brands.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/dashboard/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/dashboard/css/master.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/dashboard/vendor/flagiconcss/css/flag-icon.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/dashboard/vendor/datatables/datatables.min.css') }}" rel="stylesheet">
</head>

<body class="sb-nav-fixed">
    @include('layouts.header')
    <div id="layoutSidenav">
        @include('layouts.navigation')

        <div id="layoutSidenav_content">
            <main>
                @yield('content')
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Mulenge Tours 2025</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="{{ asset('assets/dashboard/js/scripts.js')}}"></script>
    <script src="{{ asset('assets/dashboard/assets/demo/chart-area-demo.js')}}"></script>
    <script src="{{ asset('assets/dashboard/assets/demo/chart-bar-demo.js')}}"></script>
    <script src="{{ asset('assets/dashboard/js/datatables-simple-demo.js')}}"></script>
    <script src="{{ asset('assets/dashboard/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('assets/dashboard/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/vendor/chartsjs/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/js/dashboard-charts.js') }}"></script>
    <script src="{{ asset('assets/dashboard/js/script.js') }}"></script>
    <script src="{{ asset('assets/dashboard/vendor/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/dashboard/js/initiate-datatables.js') }}"></script>
</body>

</html>