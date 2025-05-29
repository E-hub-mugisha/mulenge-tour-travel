<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\DestinationsController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\TourController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\HotelController; // Ensure this controller exists in the specified namespace
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\Pages\HomeController;
use App\Http\Controllers\Pages\SearchController;
use App\Http\Controllers\Pages\ToursController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Staff\StaffController;
use App\Http\Controllers\TourTipsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'home'])->name('pages.home');
Route::get('/tours', [ToursController::class, 'tours'])->name('pages.tours');
Route::get('/tour-detail/{id}', [ToursController::class, 'tourDetails'])->name('pages.tour.details');
Route::post('/bookings', [ToursController::class, 'store'])->name('tour.bookings.store');
Route::get('/payment', [ToursController::class, 'payment'])->name('payment');
Route::post('/tour/{tourId}/review', [ToursController::class, 'storeReview'])->name('tour.review.store');

Route::get('/destinations', [HomeController::class, 'destinations'])->name('pages.destinations');
Route::get('/destinations/{id}', [HomeController::class, 'showDestination'])->name('pages.destination.show');
Route::get('/hotels', [HomeController::class, 'getHotels'])->name('pages.hotels');
Route::get('/hotels/{id}', [HomeController::class, 'showHotelDetails'])->name('pages.hotel-details.show');
Route::post('/hotel/booking/store', [HomeController::class, 'hotelBooking'])->name('hotel.booking.store');

Route::get('/hotel/payment/{booking}', [HomeController::class, 'payment'])->name('hotel.payment.page');
Route::get('/hotel/payment/callback', [HomeController::class, 'paymentCallback'])->name('hotel.payment.callback');
Route::get('/hotel/after/payment', [HomeController::class, 'afterPayment'])->name('hotel.after.payment');

Route::get('/hotel/search', [SearchController::class, 'index'])->name('search.results');

Route::get('/contact', [HomeController::class, 'contact'])->name('pages.contact');

Route::get('/tour-tips', [HomeController::class, 'tipsPage'])->name('pages.tips');
Route::get('/tour-tips/{id}', [HomeController::class, 'tipsDetail'])->name('pages.tips.show');

Route::get('/payment/{booking}', [ToursController::class, 'payment'])->name('payment.page');
// Route::get('/payment/callback', [ToursController::class, 'paymentCallback'])->name('payment.callback');
Route::get('/after/payment', [ToursController::class, 'afterPayment'])->name('after.payment');
Route::get('/tour/payment/callback', [ToursController::class, 'paymentTourCallback'])->name('handlePayment.callback');


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
    Route::put('admin/user/update/{id}', [UserController::class, 'update'])->name('admin.users.update');
    Route::delete('admin/user/delete/{id}', [UserController::class, 'destroy'])->name('admin.users.delete');

    // tour routes
    Route::get('admin/tours', [TourController::class, 'index'])->name('admin.tours.index');
    Route::get('/admin/tour/create', [TourController::class, 'create'])->name('admin.tours.create');
    Route::get('/admin/tour/edit/{id}', [TourController::class, 'edit'])->name('admin.tours.edit');
    Route::post('admin/tour/store', [TourController::class, 'store'])->name('admin.tours.store');
    Route::put('admin/tour/upate/{id}', [TourController::class, 'update'])->name('admin.tours.update');
    Route::delete('admin/tour/delete/{id}', [TourController::class, 'destroy'])->name('admin.tours.destroy');

    Route::get('/tours/{tour}/upload-images', [TourController::class, 'createImages'])->name('tourImages.create');
    Route::post('/tours/{tourId}/upload-images', [TourController::class, 'storeImagetour'])->name('tourImages.store');
    Route::delete('/tour-images/{image}', [TourController::class, 'destroyImageTour'])->name('tourImages.destroy');

    // booking routes
    Route::get('/admin/bookings', [BookingController::class, 'index'])->name('admin.bookings.index');
    Route::get('/admin/booking/create', [BookingController::class, 'create'])->name('admin.bookings.create');
    Route::get('/admin/booking/{id}', [BookingController::class, 'show'])->name('admin.booking.show');
    Route::get('/admin/booking/edit/{id}', [BookingController::class, 'edit'])->name('admin.bookings.edit');
    Route::post('admin/booking/store', [BookingController::class, 'store'])->name('admin.bookings.store');
    Route::put('admin/booking/upate/{id}', [BookingController::class, 'update'])->name('admin.bookings.update');
    Route::delete('admin/booking/delete/{id}', [BookingController::class, 'destroy'])->name('admin.bookings.destroy');
    Route::put('bookings/update-status{id}', [BookingController::class, 'updateStatus'])->name('admin.bookingsUpdateStatus');

    Route::get('/admin/payment/{booking}', [BookingController::class, 'payment'])->name('admin.payment.page');
    // Route::get('/payment/callback', [BookingController::class, 'paymentCallback'])->name('payment.callback');
    Route::get('/admin/after/payment', [BookingController::class, 'afterPayment'])->name('admin.after.payment');
    Route::get('/admin/tour/payment/callback', [BookingController::class, 'paymentTourCallback'])->name('admin.handlePayment.callback');

    // locations routes
    Route::get('admin/locations', [LocationController::class, 'index'])->name('admin.locations.index');
    Route::get('/admin/location/create', [LocationController::class, 'create'])->name('admin.locations.create');
    Route::get('/admin/location/{id}', [LocationController::class, 'show'])->name('admin.location.show');
    Route::get('/admin/location/edit/{id}', [LocationController::class, 'edit'])->name('admin.locations.edit');
    Route::post('admin/location/store', [LocationController::class, 'store'])->name('admin.locations.store');
    Route::put('admin/location/upate/{id}', [LocationController::class, 'update'])->name('admin.locations.update');
    Route::delete('admin/location/delete/{id}', [LocationController::class, 'destroy'])->name('admin.locations.destroy');

    // destinations routes
    Route::get('admin/destinations', [DestinationsController::class, 'index'])->name('admin.destinations.index');
    Route::get('/admin/destination/create', [DestinationsController::class, 'create'])->name('admin.destinations.create');
    Route::get('/admin/destination/{id}', [DestinationsController::class, 'show'])->name('admin.destination.show');
    Route::get('/admin/destination/edit/{id}', [DestinationsController::class, 'edit'])->name('admin.destinations.edit');
    Route::post('admin/destination/store', [DestinationsController::class, 'store'])->name('admin.destinations.store');
    Route::put('admin/destination/upate/{id}', [DestinationsController::class, 'update'])->name('admin.destinations.update');
    Route::delete('admin/destination/delete/{id}', [DestinationsController::class, 'destroy'])->name('admin.destinations.destroy');

    // destinations routes
    Route::get('admin/destination-locations', [DestinationsController::class, 'indexLocation'])->name('admin.destination-locations.index');
    Route::get('/admin/destination-location/create', [DestinationsController::class, 'createLocation'])->name('admin.destination-locations.create');
    Route::get('/admin/destination-location/{id}', [DestinationsController::class, 'showLocation'])->name('admin.destination.show');
    Route::get('/admin/destination-location/edit/{id}', [DestinationsController::class, 'editLocation'])->name('admin.destination-locations.edit');
    Route::post('admin/destination-location/store', [DestinationsController::class, 'storeLocation'])->name('admin.destination-locations.store');
    Route::put('admin/destination-location/upate/{id}', [DestinationsController::class, 'updateLocation'])->name('admin.destination-locations.update');
    Route::delete('admin/destination-location/delete/{id}', [DestinationsController::class, 'destroyLocation'])->name('admin.destination-locations.destroy');

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

    // Show all hotels
    Route::get('/admin/hotels', [HotelController::class, 'index'])->name('admin.hotels.index');
    Route::get('/admin/hotels/create', [HotelController::class, 'create'])->name('admin.hotels.create');
    Route::post('/hotels/store', [HotelController::class, 'storeHotel'])->name('admin.hotelStore');
    Route::get('/admin/hotels/{id}', [HotelController::class, 'show'])->name('admin.hotels.show');
    Route::get('/admin/hotels/{id}/edit', [HotelController::class, 'edit'])->name('admin.hotels.edit');
    Route::put('/hotels/{id}', [HotelController::class, 'updateHotel'])->name('admin.hotelUpdate');
    Route::delete('/admin/hotels/{id}', [HotelController::class, 'destroy'])->name('admin.hotels.destroy');

    Route::get('/hotels/{hotel}/upload-images', [HotelController::class, 'createImages'])->name('hotelImages.create');
    Route::post('/hotels/{hotelId}/upload-images', [HotelController::class, 'storeImageHotel'])->name('hotelImages.store');
    Route::delete('/hotel-images/{image}', [HotelController::class, 'destroyImageHotel'])->name('hotelImages.destroy');

    // booking routes
    Route::get('/admin/hotel/bookings', [HotelController::class, 'indexHotelBooking'])->name('admin.HotelBookings.index');
    Route::get('/admin/hotel/booking/create', [HotelController::class, 'create'])->name('admin.HotelBookings.create');
    Route::get('/admin/hotel/booking/{id}', [HotelController::class, 'show'])->name('admin.HotelBooking.show');
    Route::get('/admin/hotel/booking/edit/{id}', [HotelController::class, 'edit'])->name('admin.HotelBookings.edit');
    Route::post('admin/hotel/booking/store', [HotelController::class, 'store'])->name('admin.HotelBookings.store');
    Route::put('admin/hotel/booking/upate/{id}', [HotelController::class, 'update'])->name('admin.HotelBookings.update');
    Route::delete('admin/hotel/booking/delete/{id}', [HotelController::class, 'destroy'])->name('admin.HotelBookings.destroy');
    Route::put('hotel/bookings/update-status{id}', [HotelController::class, 'updateStatus'])->name('admin.HotelBookingsUpdateStatus');
    Route::put('hotel/bookings/confirmation/{id}', [HotelController::class, 'confirmBooking'])->name('admin.HotelBookings.Confirm');

    // category
    Route::get('/admin/categories', [TourTipsController::class, 'indexCategory'])->name('admin.category.index');
    Route::post('/admin/category', [TourTipsController::class, 'storeCategory'])->name('admin.category.store');
    Route::put('/admin/category/{id}', [TourTipsController::class, 'updateCategory'])->name('admin.category.update');
    Route::delete('/admin/category/{id}', [TourTipsController::class, 'destroyCategory'])->name('admin.category.destroy');

    // tour tips
    Route::get('/admin/tour-tips', [TourTipsController::class, 'indexTips'])->name('admin.tour-tips.index');
    Route::post('/admin/tour-tips', [TourTipsController::class, 'storeTips'])->name('admin.tour-tips.store');
    Route::put('/admin/tour-tips/{id}', [TourTipsController::class, 'updateTips'])->name('admin.tour-tips.update');
    Route::delete('/admin/tour-tips/{id}', [TourTipsController::class, 'destroyTips'])->name('admin.tour-tips.destroy');

    Route::get('/admin/payments', [PaymentController::class, 'index'])->name('admin.payments.index');
    Route::put('/admin/payments/refund/{id}', [PaymentController::class, 'refundAdminStatus'])->name('admin.payments.refund');
    Route::put('/admin/payment/cancel/{id}', [PaymentController::class, 'cancelAdminStatus'])->name('admin.payments.cancel');
});



Route::middleware(['auth', 'role:staff'])->group(function () {
    Route::get('/staff/dashboard', [App\Http\Controllers\Staff\StaffController::class, 'dashboard'])->name('staff.dashboard.index');

    // tour routes
    Route::get('/staff/tours', [App\Http\Controllers\Staff\TourController::class, 'index'])->name('staff.tours.index');
    Route::get('/staff/tour/create', [App\Http\Controllers\Staff\TourController::class, 'create'])->name('staff.tours.create');
    Route::get('/staff/tour/edit/{id}', [App\Http\Controllers\Staff\TourController::class, 'edit'])->name('staff.tours.edit');
    Route::post('staff/tour/store', [App\Http\Controllers\Staff\TourController::class, 'store'])->name('staff.tours.store');
    Route::put('staff/tour/upate/{id}', [App\Http\Controllers\Staff\TourController::class, 'update'])->name('staff.tours.update');
    Route::delete('staff/tour/delete/{id}', [App\Http\Controllers\Staff\TourController::class, 'destroy'])->name('staff.tours.destroy');

    // booking routes
    Route::get('/staff/bookings', [App\Http\Controllers\Staff\BookingController::class, 'index'])->name('staff.bookings.index');
    Route::get('/staff/booking/create', [App\Http\Controllers\Staff\BookingController::class, 'create'])->name('staff.bookings.create');
    Route::get('/staff/booking/{id}', [App\Http\Controllers\Staff\BookingController::class, 'show'])->name('staff.booking.show');
    Route::get('/staff/booking/edit/{id}', [App\Http\Controllers\Staff\BookingController::class, 'edit'])->name('staff.bookings.edit');
    Route::post('staff/booking/store', [App\Http\Controllers\Staff\BookingController::class, 'store'])->name('staff.bookings.store');
    Route::put('staff/booking/upate/{id}', [App\Http\Controllers\Staff\BookingController::class, 'update'])->name('staff.bookings.update');
    Route::delete('staff/booking/delete/{id}', [App\Http\Controllers\Staff\BookingController::class, 'destroy'])->name('staff.bookings.destroy');
    Route::put('bookings/update-status/{id}', [App\Http\Controllers\Staff\BookingController::class, 'updateStatus'])->name('staff.bookingsUpdateStatus');

    Route::get('/staff/payments', [PaymentController::class, 'index'])->name('staff.payments.index');
    Route::get('/staff/payment/{booking}', [App\Http\Controllers\Staff\BookingController::class, 'payment'])->name('staff.payments.page');
    // Route::get('/payment/callback', [BookingController::class, 'paymentCallback'])->name('payment.callback');
    Route::get('/staff/after/payment', [App\Http\Controllers\Staff\BookingController::class, 'afterPayment'])->name('staff.after.payment');
    Route::get('/staff/tour/payment/callback', [App\Http\Controllers\Staff\BookingController::class, 'paymentTourCallback'])->name('staff.handlePayment.callback');

    // locations routes
    Route::get('staff/locations', [App\Http\Controllers\Staff\LocationController::class, 'index'])->name('staff.locations.index');
    Route::get('/staff/location/create', [App\Http\Controllers\Staff\LocationController::class, 'create'])->name('staff.locations.create');
    Route::get('/staff/location/{id}', [App\Http\Controllers\Staff\LocationController::class, 'show'])->name('staff.location.show');
    Route::get('/staff/location/edit/{id}', [App\Http\Controllers\Staff\LocationController::class, 'edit'])->name('staff.locations.edit');
    Route::post('staff/location/store', [App\Http\Controllers\Staff\LocationController::class, 'store'])->name('staff.locations.store');
    Route::put('staff/location/upate/{id}', [App\Http\Controllers\Staff\LocationController::class, 'update'])->name('staff.locations.update');
    Route::delete('staff/location/delete/{id}', [App\Http\Controllers\Staff\LocationController::class, 'destroy'])->name('staff.locations.destroy');

    // accommodations
    Route::get('/staff/accommodations', [App\Http\Controllers\Staff\StaffController::class, 'indexAccommodation'])->name('staff.accommodations.index');
    Route::post('/staff/accommodations', [App\Http\Controllers\Staff\StaffController::class, 'storeAccommodation'])->name('staff.accommodations.store');
    Route::put('/staff/accommodations/{id}', [App\Http\Controllers\Staff\StaffController::class, 'updateAccommodation'])->name('staff.accommodations.update');
    Route::delete('/staff/accommodations/{id}', [App\Http\Controllers\Staff\StaffController::class, 'destroyAccommodation'])->name('staff.accommodations.destroy');

    // activities
    Route::get('/staff/activities', [App\Http\Controllers\Staff\StaffController::class, 'indexActivity'])->name('staff.activities.index');
    Route::post('/staff/activities', [App\Http\Controllers\Staff\StaffController::class, 'storeActivity'])->name('staff.activities.store');
    Route::put('/staff/activities/{id}', [App\Http\Controllers\Staff\StaffController::class, 'updateActivity'])->name('staff.activities.update');
    Route::delete('/staff/activities/{id}', [App\Http\Controllers\Staff\StaffController::class, 'destroyActivity'])->name('staff.activities.destroy');

    // transportations
    Route::get('/staff/transportations', [App\Http\Controllers\Staff\StaffController::class, 'indextransportation'])->name('staff.transportations.index');
    Route::post('/staff/transportations', [App\Http\Controllers\Staff\StaffController::class, 'storetransportation'])->name('staff.transportations.store');
    Route::put('/staff/transportations/{id}', [App\Http\Controllers\Staff\StaffController::class, 'updatetransportation'])->name('staff.transportations.update');
    Route::delete('/staff/transportations/{id}', [App\Http\Controllers\Staff\StaffController::class, 'destroytransportation'])->name('staff.transportations.destroy');
});

Route::middleware(['auth', 'role:customer'])->group(function () {
    Route::get('/customer/dashboard', [CustomerController::class, 'dashboard'])->name('customer.dashboard.index');
    Route::get('/customer/bookings', [CustomerController::class, 'bookings'])->name('customers.bookings.index');
    Route::get('/customer/booking/{id}', [CustomerController::class, 'bookingDetails'])->name('customers.booking.show');
    Route::post('/customer/booking/store', [CustomerController::class, 'store'])->name('customer.bookings.store');
    Route::put('bookings/{id}/update-status', [CustomerController::class, 'updateStatus'])->name('customer.bookings.updateStatus');
    Route::put('bookings/reschedule/{id}', [CustomerController::class, 'bookingReschedule'])->name('customers.bookings.reschedule');
    Route::delete('customer/booking/delete/{id}', [CustomerController::class, 'destroy'])->name('customers.bookings.destroy');

    Route::post('/customer/booking/store/{id}', [CustomerController::class, 'storeTourBooking'])->name('customers.bookings.tour');

    // tour routes
    Route::get('/customer/tours', [CustomerController::class, 'indexTours'])->name('customer.tours.index');

    // locations routes
    Route::get('customer/locations', [CustomerController::class, 'indexLocations'])->name('customer.locations.index');

    // accommodations
    Route::get('/customer/accommodations', [CustomerController::class, 'indexAccommodation'])->name('customer.accommodations.index');

    // activities
    Route::get('/customer/activities', [CustomerController::class, 'indexActivity'])->name('customer.activities.index');

    // transportations
    Route::get('/customer/transportations', [CustomerController::class, 'indextransportation'])->name('customer.transportations.index');

    Route::get('/customer/hotels', [CustomerController::class, 'indexHotels'])->name('customer.hotels.index');
    Route::get('/customer/hotel/{id}', [CustomerController::class, 'showHotels'])->name('customer.hotels.show');
    Route::get('customer/destinations', [CustomerController::class, 'indexDestination'])->name('customer.destinations.index');
    Route::get('customer/destination-locations', [CustomerController::class, 'indexLocation'])->name('customer.destination-locations.index');

    Route::get('/customer/payments', [CustomerController::class, 'bookingPayment'])->name('customers.payments.index');
    Route::put('/customer/payments/refund/{id}', [CustomerController::class, 'refundStatus'])->name('customers.payments.refund');
    Route::put('/customer/payment/cancel/{id}', [CustomerController::class, 'cancelStatus'])->name('customers.payments.cancel');
});


require __DIR__ . '/auth.php';
