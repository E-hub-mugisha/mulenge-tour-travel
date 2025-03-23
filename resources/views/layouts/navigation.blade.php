@if (Auth::check() && Auth::user()->role === 'admin')
<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
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
                    👤 Manage Users
                </a>
                <a class="nav-link" href="{{ route('admin.bookings.index')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                    📅 Manage Bookings
                </a>
                <div class="sb-sidenav-menu-heading">Addons</div>
                <a class="nav-link" href="{{ route('admin.tours.index')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                    🏝️ Manage Travel Packages
                </a>
                <a class="nav-link" href="#">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    💰 Payments
                </a>
                <a class="nav-link" href="{{ route('admin.locations.index')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-map"></i></div>
                    Manage Locations
                </a>
                <a class="nav-link" href="{{ route('admin.accommodations.index')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-bed"></i></div>
                    Manage Accommodations
                </a>
                <a class="nav-link" href="{{ route('admin.activities.index')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-cogs"></i></div>
                    Manage Activities
                </a>
                <a class="nav-link" href="{{ route('admin.transportations.index')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-car"></i></div>
                    Manage Transportations
                </a>
            </div>
        </div>
    </nav>
</div>
@elseif (Auth::check() && Auth::user()->role === 'staff')
<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="{{ route('staff.dashboard') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <div class="sb-sidenav-menu-heading">Interface</div>
                <a class="nav-link" href="{{ route('staff.bookings.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                    📅 Manage Bookings
                </a>
                <a class="nav-link" href="{{ route('staff.accommodations.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-bed"></i></div>
                    🏨 Manage Accommodations
                </a>
                <a class="nav-link" href="{{ route('staff.activities.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-cogs"></i></div>
                    🏃 Manage Activities
                </a>
                <a class="nav-link" href="{{ route('staff.transportations.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-car"></i></div>
                    🚗 Manage Transportations
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">📨 Notifications</div>
            Start Bootstrap
        </div>
    </nav>
</div>
@else
<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
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
                    👤 Manage Users
                </a>
                <a class="nav-link" href="{{ route('admin.bookings.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                    📅 Manage Bookings
                </a>
            </div>
        </div>
    </nav>
</div>
@endif
