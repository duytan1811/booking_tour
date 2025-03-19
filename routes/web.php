<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BlogController as AdminBlogController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\TourController;
use App\Http\Controllers\AuthController as ControllersAuthController;
use App\Http\Controllers\Client\AccountController;
use App\Http\Controllers\Client\CheckoutController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\TourController as ClientTourController;
use App\Http\Controllers\Client\BlogController;
use App\Http\Controllers\Client\ContactController as ClientContactController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Client


//Auth
Route::get('login', [ControllersAuthController::class, 'login'])->name('auth.login');
Route::post('login', [ControllersAuthController::class, 'loginHandle'])->name('auth.loginHandle');
Route::get('register', [ControllersAuthController::class, 'register'])->name('auth.register');
Route::post('register', [ControllersAuthController::class, 'registerHandle'])->name('auth.registerHandle');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [ClientContactController::class, 'contact'])->name('contact');
Route::post('/contact', [ClientContactController::class, 'contactHandle'])->name('contactHandle');
Route::resource('/tours', ClientTourController::class);
Route::post('/tours/{id}/comment', [ClientTourController::class, 'comment'])->name('tours.comment');
Route::resource('/checkout', CheckoutController::class);

Route::get('/account', [AccountController::class, 'index'])->name('account.index');

Route::resource('/blogs', BlogController::class);
Route::post('/blogs/{id}/comment', [BlogController::class, 'comment'])->name('blogs.comment');

Route::get('/checkout/booking/{tourId}', [CheckoutController::class, 'booking'])->name('checkout.booking');
Route::get('/checkout/success', [CheckoutController::class, 'success'])->name('checkout.success');

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('/login', [AuthController::class, 'loginHandle'])->name('loginHandle');
    Route::group(['middleware' => 'auth'], function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        Route::resource('tours', TourController::class)->except(['show']);
        Route::get('tours/{id}/tab/{tab}', [TourController::class, 'detail'])->name('tours.detail');
        Route::post('tours/{id}/approval', [TourController::class, 'approval'])->name('tours.approval');

        Route::resource('blogs', AdminBlogController::class)->except(['show']);
        Route::post('blogs/{id}/approval', [AdminBlogController::class, 'approval'])->name('blogs.approval');
        Route::get('blogs/{id}/tab/{tab}', [AdminBlogController::class, 'detail'])->name('blogs.detail');
        Route::resource('bookings', BookingController::class);
        Route::resource('contacts', ContactController::class);
        Route::resource('categories', CategoryController::class);
    });
});
