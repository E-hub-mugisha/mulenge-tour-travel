<header class="tg-header-height">
    <div class="tg-header__area tg-header-tu-menu tg-header-lg-space z-index-999 tg-transparent" id="header-sticky">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xxl-9 col-xl-8 col-lg-8 col-5">
                    <div class="tgmenu__wrap d-flex align-items-center">
                        <div class="logo mr-25">
                            <a class="logo-1" href="index.html"><img src="{{ asset('assets/pages/img/logo/logo-white.png')}}" alt="Logo"></a>
                            <a class="logo-2 d-none" href="index.html"><img src="{{ asset('assets/pages/img/logo/logo-green.png')}}" alt="Logo"></a>
                        </div>
                        <button class="tgmenu-offcanvas-open-btn menu-tigger d-none d-xl-block">
                            <span></span>
                            <span></span>
                            <span></span>
                        </button>
                        <nav class="tgmenu__nav tgmenu-1-space ml-190">
                            <div class="tgmenu__navbar-wrap tgmenu__main-menu d-none d-xl-flex">
                                <ul class="navigation">
                                    <li class="active">
                                        <a href="{{ route('pages.home') }}">Home</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('pages.tours') }}">Tour Packages</a>

                                    </li>
                                    <li>
                                        <a href="{{ route('pages.destinations') }}">Destinations</a>
                                    </li>
                                    <li><a href="{{ route('pages.hotels') }}">Hotels</a>

                                    </li>
                                    <li><a href="contact.html">Contact</a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-4 col-lg-4 col-7">
                    <div class="tg-menu-right-action d-flex align-items-center justify-content-end">
                        <div class="tg-header-contact-info d-flex align-items-center">
                            <span class="tg-header-contact-icon mr-10 d-none d-xl-block">
                                <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M17.5747 15.8619L15.8138 17.6228C15.7656 17.6732 15.7236 17.7026 15.6627 17.7362C13.1757 19.0753 8.40326 16.5734 6.21009 14.2626C6.18698 14.2374 6.16809 14.2185 6.14502 14.1954C3.83427 12.0021 1.33257 7.22927 2.67157 4.7421C2.70515 4.68124 2.73453 4.64134 2.78491 4.5931L4.54573 2.83006C4.67586 2.69992 4.82067 2.64116 5.00114 2.64116H5.01583C5.20471 2.64327 5.35163 2.71044 5.47965 2.84895L7.75047 5.30044C7.98973 5.55651 7.98131 5.95109 7.73368 6.19877L6.26666 7.66589C5.85321 8.08148 5.67271 8.62926 5.75877 9.20856C5.94134 10.428 6.55419 11.574 7.63293 12.7095C7.65603 12.7326 7.67489 12.7536 7.69799 12.7746C8.83342 13.8534 9.97723 14.4663 11.1966 14.6488C11.7779 14.7349 12.3257 14.5544 12.7412 14.1388L14.2062 12.6738C14.4538 12.4261 14.8484 12.4177 15.1065 12.6549L17.5578 14.9259C17.6963 15.0539 17.7614 15.2008 17.7656 15.3897C17.7698 15.5785 17.709 15.7276 17.5747 15.8619Z"
                                        fill="currentColor" />
                                </svg>
                            </span>
                            <div class="tg-header-contact-number d-none d-xl-block">
                                <span>Call Us:</span>
                                <a href="tel:+123595966">+123 5959 66</a>
                            </div>
                        </div>

                        <div class="tg-header-btn ml-20 d-none d-sm-block">
                            @if(Auth::check())
                            <!-- If user is logged in, show dashboard link -->
                            <a class="tg-btn-header" href="{{ route('dashboard') }}">
                                <span>
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1.7 17.2C1.5 17.2 1.3 17.1 1.2 17C1.1 16.8 1 16.7 1 16.5C1 15.1 1.4 13.7 2.1 12.4C2.8 11.2 3.9 10.1 5.1 9.4C4.6 8.8 4.2 8 4 7.2C3.9 6.4 3.9 5.5 4.1 4.8C4.3 4 4.8 3.2 5.3 2.6C5.9 2 6.6 1.5 7.3 1.3C7.9 1.1 8.5 1 9.1 1C9.3 1 9.6 1 9.8 1C10.6 1.1 11.4 1.4 12.1 1.9C12.8 2.4 13.3 3 13.7 3.7C14.1 4.4 14.3 5.2 14.3 6.1C14.3 7.3 13.9 8.5 13.1 9.4C13.7 9.8 14.3 10.2 14.9 10.7C15.7 11.5 16.2 12.3 16.7 13.3C17.1 14.3 17.3 15.3 17.3 16.4C17.3 16.6 17.2 16.8 17.1 16.9C17 17 16.8 17.1 16.6 17.1C16.5 17.1 16.4 17.1 16.3 17C16.2 17 16.1 16.9 16.1 16.8C16 16.7 16 16.7 15.9 16.6C15.9 16.5 15.8 16.4 15.8 16.3C15.8 15.4 15.6 14.6 15.3 13.8C15 13 14.5 12.3 13.8 11.7C13.2 11.2 12.6 10.7 11.9 10.4C11.1 10.9 10.2 11.2 9.1 11.2C8.1 11.2 7.1 10.9 6.3 10.4C5.2 10.9 4.2 11.7 3.5 12.8C2.8 13.9 2.4 15.1 2.4 16.4C2.4 16.6 2.3 16.8 2.2 16.9C2.1 17.1 1.9 17.2 1.7 17.2Z"
                                            fill="currentColor" />
                                    </svg>
                                </span>
                                Dashboard
                            </a>
                            @else
                            <!-- If user is NOT logged in, show booking button -->
                            <a class="tg-btn-header" href="{{ route('login') }}">
                                <span>
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9 1C4.6 1 1 4.6 1 9C1 13.4 4.6 17 9 17C13.4 17 17 13.4 17 9C17 4.6 13.4 1 9 1ZM12.3 11.1L11.1 12.3L9 10.2L6.9 12.3L5.7 11.1L7.8 9L5.7 6.9L6.9 5.7L9 7.8L11.1 5.7L12.3 6.9L10.2 9L12.3 11.1Z"
                                            fill="currentColor" />
                                    </svg>
                                </span>
                                Login
                            </a>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Mobile Menu  -->
    <div class="tgmobile__menu">
        <nav class="tgmobile__menu-box">
            <div class="close-btn"><i class="fa-solid fa-xmark"></i></div>
            <div class="nav-logo">
                <a href="index.html"><img src="{{ asset('assets/pages/img/logo/logo-green.png')}}" alt="logo"></a>
            </div>
            <div class="tgmobile__search">
                <form action="#">
                    <input type="text" placeholder="Search here...">
                    <button><i class="fas fa-search"></i></button>
                </form>
            </div>
            <div class="tgmobile__menu-outer">
                <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
            </div>
            <div class="social-links">
                <ul class="list-wrap">
                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                    <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                </ul>
            </div>
        </nav>
    </div>
    <div class="tgmobile__menu-backdrop"></div>
    <!-- End Mobile Menu -->

    <!-- offCanvas-menu -->
    <div class="offCanvas__info">
        <div class="offCanvas__close-icon menu-close">
            <button><i class="fa-sharp fa-regular fa-xmark"></i></button>
        </div>
        <div class="offCanvas__logo mb-30">
            <a href="index.html"><img src="{{ asset('assets/pages/img/logo/logo-green.png')}}" alt="Logo"></a>
        </div>
        <div class="offCanvas__side-info mb-30">
            <div class="contact-list mb-30">
                <h4>Office Address</h4>
                <p>123/A, Miranda City Likaoli <br> Prikano, Dope</p>
            </div>
            <div class="contact-list mb-30">
                <h4>Phone Number</h4>
                <p>+0989 7876 9865 9</p>
                <p>+(090) 8765 86543 85</p>
            </div>
            <div class="contact-list mb-30">
                <h4>Email Address</h4>
                <p>info@example.com</p>
                <p>example.mail@hum.com</p>
            </div>
        </div>
        <div class="offCanvas__social-icon mt-30">
            <a href="javascript:void(0)"><i class="fab fa-facebook-f"></i></a>
            <a href="javascript:void(0)"><i class="fab fa-twitter"></i></a>
            <a href="javascript:void(0)"><i class="fab fa-google-plus-g"></i></a>
            <a href="javascript:void(0)"><i class="fab fa-instagram"></i></a>
        </div>
    </div>
    <div class="offCanvas__overly"></div>
    <!-- offCanvas-menu-end -->

</header>