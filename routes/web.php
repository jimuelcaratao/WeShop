<?php

use App\Http\Controllers\Admin\BrandController;
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

Route::get('/product/item', function () {
    return view('Pages.NormalUser.product');
})->name('product');

// Route::get('/error', function () {
//     return abort(500);;
// });


// Admin Users 'verified',
Route::middleware(['auth:sanctum', 'is_admin'])->group(function () {

    // dashboard pages
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // product pages
    Route::get('/products', [ProductController::class, 'index'])->name('products');

    Route::put('/products/update', [ProductController::class, 'update'])->name('products.update');

    Route::resource('products', ProductController::class)->except(['index', 'show', 'update']);

    // category pages
    Route::get('/categories', [CategoryController::class, 'index'])->name('category');

    Route::post('/categories/sub_cat', [CategoryController::class, 'sub_store'])->name('sub_cat.store');

    Route::put('/categories/update', [CategoryController::class, 'update'])->name('categories.update');

    Route::put('/categories/update_sub_category', [CategoryController::class, 'update_sub'])->name('categories_sub.update');

    Route::delete('/categories/{sub_category_id}/delete', [CategoryController::class, 'destroy_sub_category'])->name('sub_categories.destroy');

    Route::resource('categories', CategoryController::class)->only(['destroy','store']);

    // category pages
    Route::get('/brands', [BrandController::class, 'index'])->name('brand');

    Route::resource('brands', BrandController::class)->only(['destroy','store']);
});

Route::get('/fetchcat', [ProductController::class, 'fetchSubCategories']);

Route::get('/fetchProductPhotos', [ProductController::class, 'fetchProductPhoto']);


// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('Pages.Admin.dashboard');
// })->name('dashboard');