@if (Auth::check() && Auth::user()->role === 'admin')
<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion bg-white" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="{{ route('admin.dashboard') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <div class="sb-sidenav-menu-heading">Interface</div>
                <a class="nav-link" href="{{ route('admin.users.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Users
                </a>
                <a class="nav-link" href="{{ route('admin.bookings.index')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                    Bookings
                </a>
                <a class="nav-link" href="{{ route('admin.destinations.index')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-map"></i></div>
                    Destinations
                </a>
                <a class="nav-link" href="{{ route('admin.destination-locations.index')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-map"></i></div>
                    Destination locations
                </a>
                <a class="nav-link" href="{{ route('admin.hotels.index')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-map"></i></div>
                    Hotels
                </a>
                <a class="nav-link" href="{{ route('admin.HotelBookings.index')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                    Hotel Bookings
                </a>
                <a class="nav-link" href="{{ route('admin.tours.index')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                    Travel Packages
                </a>
                <a class="nav-link" href="{{ route('admin.payments.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Tour Payments
                </a>
                <a class="nav-link" href="{{ route('admin.locations.index')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-map"></i></div>
                    Locations
                </a>
                <a class="nav-link" href="{{ route('admin.accommodations.index')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-bed"></i></div>
                    Accommodations
                </a>
                <a class="nav-link" href="{{ route('admin.activities.index')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-cogs"></i></div>
                    Activities
                </a>
                <a class="nav-link" href="{{ route('admin.transportations.index')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-car"></i></div>
                    Transportations
                </a>
                <a class="nav-link" href="{{ route('admin.category.index') }}"><div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>Tips Category</a>
                <a class="nav-link" href="{{ route('admin.tour-tips.index') }}"><div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>Tour Tips</a>
                <hr class="dropdown-divider" />
            </div>
        </div>
    </nav>
</div>
@elseif (Auth::check() && Auth::user()->role === 'staff')
<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion bg-white" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="{{ route('staff.dashboard.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <div class="sb-sidenav-menu-heading">Interface</div>
                <a class="nav-link" href="{{ route('staff.bookings.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                    Bookings
                </a>
                <a class="nav-link" href="{{ route('staff.accommodations.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-bed"></i></div>
                    Accommodations
                </a>
                <a class="nav-link" href="{{ route('staff.activities.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-cogs"></i></div>
                    Activities
                </a>
                <a class="nav-link" href="{{ route('staff.transportations.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-car"></i></div>
                    Transportations
                </a>
                <a class="nav-link" href="{{ route('staff.tours.index')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                    Travel Packages
                </a>
                <a class="nav-link" href="{{ route('staff.payments.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Tour Payments
                </a>
                <a class="nav-link" href="{{ route('admin.category.index') }}"><div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>Tips Category</a>
                <a class="nav-link" href="{{ route('admin.tour-tips.index') }}"><div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>Tour Tips</a>
                <hr class="dropdown-divider" />
            </div>
        </div>
    </nav>
</div>
@else
<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion bg-white" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="{{ route('customer.dashboard.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <div class="sb-sidenav-menu-heading">Interface</div>
                <a class="nav-link" href="{{ route('customers.bookings.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                    Bookings
                </a>
                <a class="nav-link" href="{{ route('customer.accommodations.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-bed"></i></div>
                    Accommodations
                </a>
                <a class="nav-link" href="{{ route('customer.activities.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-cogs"></i></div>
                    Activities
                </a>
                <a class="nav-link" href="{{ route('customer.transportations.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-car"></i></div>
                    Transportations
                </a>
                <a class="nav-link" href="{{ route('customer.tours.index')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                    Travel Packages
                </a>
                <a class="nav-link" href="{{ route('customer.destinations.index')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-map"></i></div>
                    destinations
                </a>
                <a class="nav-link" href="{{ route('customer.destination-locations.index')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-map"></i></div>
                    destination locations
                </a>
                <a class="nav-link" href="{{ route('customer.hotels.index')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-map"></i></div>
                    Hotels
                </a>
                <a class="nav-link" href="{{ route('customers.payments.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Booking Payments
                </a>
            </div>
        </div>
    </nav>
</div>
@endif