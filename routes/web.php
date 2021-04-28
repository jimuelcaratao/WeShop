<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\NormalUser\HomeController;
use App\Http\Controllers\SocialAuthController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Facebook Auth
Route::get('/signin-facebook', function () {
    return Socialite::driver('facebook')->redirect();
});

Route::get('/callback', [SocialAuthController::class, 'callback']);

// Google Auth

Route::get('/signin-google', function () {
    return Socialite::driver('google')->redirect();
});

Route::get('/callbackGoogle', [SocialAuthController::class, 'callbackGoogle']);


// Routings for pages

// Normal Users
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/catalog', function () {
    return view('Pages.NormalUser.catalog');
});

Route::get('/cart', function () {
    return view('Pages.NormalUser.cart');
})->name('cart');

Route::get('/wishlist', function () {
    return view('Pages.NormalUser.wishlist');
})->name('wishlist');

// Route::get('/error', function () {
//     return abort(500);;
// });


// Admin Users
Route::middleware(['auth:sanctum', 'verified', 'is_admin'])->group(function () {

    // dashboard pages
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // product pages
    Route::get('/products', [ProductController::class, 'index'])->name('products');

    Route::put('/products/update', [ProductController::class, 'update'])->name('products.update');

    Route::resource('products', ProductController::class)->except(['index', 'show', 'update']);

    // category pages
    Route::get('/categories', [CategoryController::class, 'index'])->name('category');

    Route::resource('categories', CategoryController::class)->except(['index', 'update']);
});

Route::get('/fetchcat', [ProductController::class, 'fetchSubCategories']);

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('Pages.Admin.dashboard');
// })->name('dashboard');