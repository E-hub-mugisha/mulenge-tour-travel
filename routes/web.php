<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\TourController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Pages\HomeController;
use App\Http\Controllers\Pages\ToursController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'home'])->name('pages.home');
Route::get('/tours', [ToursController::class, 'tours'])->name('pages.tours');
Route::get('/tour-detail/{id}', [ToursController::class, 'tourDetails'])->name('pages.tour.details');
Route::post('/bookings', [ToursController::class, 'store'])->name('tour.bookings.store');
Route::post('/tour/{tourId}/review', [ToursController::class, 'storeReview'])->name('tour.review.store');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('admin/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::post('admin/user/store', [UserController::class, 'store'])->name('admin.users.store');
    Route::put('admin/user/upate/{id}', [UserController::class, 'update'])->name('admin.users.update');
    Route::delete('admin/user/delete/{id}', [UserController::class, 'destroy'])->name('admin.users.delete');

    // tour routes
    Route::get('admin/tours', [TourController::class, 'index'])->name('admin.tours.index');
    Route::get('/admin/tour/create', [TourController::class, 'create'])->name('admin.tours.create');
    Route::get('/admin/tour/edit/{id}', [TourController::class, 'edit'])->name('admin.tours.edit');
    Route::post('admin/tour/store', [TourController::class, 'store'])->name('admin.tours.store');
    Route::put('admin/tour/upate/{id}', [TourController::class, 'update'])->name('admin.tours.update');
    Route::delete('admin/tour/delete/{id}', [TourController::class, 'destroy'])->name('admin.tours.destroy');

    // booking routes
    Route::get('admin/bookings', [BookingController::class, 'index'])->name('admin.bookings.index');
    Route::get('/admin/booking/create', [BookingController::class, 'create'])->name('admin.bookings.create');
    Route::get('/admin/booking/{id}', [BookingController::class, 'show'])->name('admin.booking.show');
    Route::get('/admin/booking/edit/{id}', [BookingController::class, 'edit'])->name('admin.bookings.edit');
    Route::post('admin/booking/store', [BookingController::class, 'store'])->name('admin.bookings.store');
    Route::put('admin/booking/upate/{id}', [BookingController::class, 'update'])->name('admin.bookings.update');
    Route::delete('admin/booking/delete/{id}', [BookingController::class, 'destroy'])->name('admin.bookings.destroy');
    Route::put('bookings/{id}/update-status', [BookingController::class, 'updateStatus'])->name('admin.bookings.updateStatus');

    // locations routes
    Route::get('admin/locations', [LocationController::class, 'index'])->name('admin.locations.index');
    Route::get('/admin/location/create', [LocationController::class, 'create'])->name('admin.locations.create');
    Route::get('/admin/location/{id}', [LocationController::class, 'show'])->name('admin.location.show');
    Route::get('/admin/location/edit/{id}', [LocationController::class, 'edit'])->name('admin.locations.edit');
    Route::post('admin/location/store', [LocationController::class, 'store'])->name('admin.locations.store');
    Route::put('admin/location/upate/{id}', [LocationController::class, 'update'])->name('admin.locations.update');
    Route::delete('admin/location/delete/{id}', [LocationController::class, 'destroy'])->name('admin.locations.destroy');

    // accommodations
    Route::get('/admin/accommodations', [AdminController::class, 'indexAccommodation'])->name('admin.accommodations.index');
    Route::post('/admin/accommodations', [AdminController::class, 'storeAccommodation'])->name('admin.accommodations.store');
    Route::put('/admin/accommodations/{id}', [AdminController::class, 'updateAccommodation'])->name('admin.accommodations.update');
    Route::delete('/admin/accommodations/{id}', [AdminController::class, 'destroyAccommodation'])->name('admin.accommodations.destroy');

    // activities
    Route::get('/admin/activities', [AdminController::class, 'indexActivity'])->name('admin.activities.index');
    Route::post('/admin/activities', [AdminController::class, 'storeActivity'])->name('admin.activities.store');
    Route::put('/admin/activities/{id}', [AdminController::class, 'updateActivity'])->name('admin.activities.update');
    Route::delete('/admin/activities/{id}', [AdminController::class, 'destroyActivity'])->name('admin.activities.destroy');

    // transportations
    Route::get('/admin/transportations', [AdminController::class, 'indextransportation'])->name('admin.transportations.index');
    Route::post('/admin/transportations', [AdminController::class, 'storetransportation'])->name('admin.transportations.store');
    Route::put('/admin/transportations/{id}', [AdminController::class, 'updatetransportation'])->name('admin.transportations.update');
    Route::delete('/admin/transportations/{id}', [AdminController::class, 'destroytransportation'])->name('admin.transportations.destroy');
});

Route::middleware(['auth', 'role:staff'])->group(function () {
    Route::get('/staff/dashboard', function () {
        return view('staff.dashboard');
    });
});

Route::middleware(['auth', 'role:customer'])->group(function () {
    Route::get('/customer/dashboard', function () {
        return view('customer.dashboard');
    });
});


require __DIR__ . '/auth.php';
