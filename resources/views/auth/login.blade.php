@extends('layouts.auth')
@section('title', 'Login | Mulenge')
@section('content')


<!-- login-area-start -->
<div class="tg-login-area pt-130 pb-130">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8 col-md-10">
                <div class="tg-login-wrapper">
                    <div class="tg-login-top text-center mb-30">
                        <h2>Sign in to your account</h2>
                        <p>Enter your credentials to acces your account.</p>
                    </div>
                    <div class="tg-login-form">
                        <div class="tg-tour-about-review-form">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="row">

                                    <div class="col-lg-12 mb-25">
                                        <input class="input" type="email" name="email" id="email" placeholder="Enter your E-mail"  required autofocus autocomplete="username">
                                    </div>
                                    <div class="col-lg-12 mb-25">
                                        <input class="input" type="password" name="password" id="password" placeholder="Enter your Password" required autocomplete="current-password">
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="review-checkbox d-flex align-items-center mb-25">
                                                <input class="tg-checkbox" type="checkbox" id="remember_me" name="remember">
                                                <label for="remember_me" class="tg-label">Remember me</label>
                                            </div>
                                            <div class="tg-login-navigate mb-25">
                                                <a href="{{ route('register')}}">Register Now</a>
                                            </div>
                                            @if (Route::has('password.request'))
                                            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                                                {{ __('Forgot your password?') }}
                                            </a>
                                            @endif
                                        </div>
                                        <button type="submit" class="tg-btn w-100">Sign In</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- login-area-end -->
@endsection