<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Admin\SaleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\SocialAuthController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PrintController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\NormalUser\CartController;
use App\Http\Controllers\NormalUser\HomeController;
use App\Http\Controllers\NormalUser\CheckoutController;
use App\Http\Controllers\NormalUser\WishListController;
use App\Http\Controllers\NormalUser\SingleProductController;

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


Route::get('/product/{product_code}', [SingleProductController::class, 'index'])->name('product');


Route::get('/product/{product_code}/review/{review}', [SingleProductController::class, 'review'])->name('product.review');


// Route::get('/error', function () {
//     return abort(500);;
// });

// Normal Users with Auth 'verified',
Route::middleware(['auth:sanctum'])->group(function () {

    // Wishlist
    Route::get('/wishlist', [WishListController::class, 'index'])->name('wishlist');

    Route::post('/wishlist/{product_code}', [WishListController::class, 'add_to_wishlist'])->name('wishlist.add');

    Route::delete('/wishlist/{product_code}/delete', [WishListController::class, 'remove_to_wishlist'])->name('wishlist.remove');

    Route::post('/wishlist/{product_code}/cart', [WishListController::class, 'move_to_cart'])->name('wishlist.move');

    // Cart
    Route::get('/cart', [CartController::class, 'index'])->name('cart');

    Route::post('/cart/{product_code}', [CartController::class, 'add_to_cart'])->name('cart.add');

    Route::put('/cart/{cart_id}', [CartController::class, 'change_quantity'])->name('cart.quantity');

    Route::delete('/cart/{product_code}/delete', [CartController::class, 'remove_to_cart'])->name('cart.remove');

    Route::post('/cart/{product_code}/wishlist', [CartController::class, 'move_to_wishlist'])->name('cart.move');

    // Order
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
});

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

    Route::post('/categories/sub_cat', [CategoryController::class, 'sub_store'])->name('sub_cat.store');

    Route::put('/categories/update', [CategoryController::class, 'update'])->name('categories.update');

    Route::put('/categories/update_sub_category', [CategoryController::class, 'update_sub'])->name('categories_sub.update');

    Route::delete('/categories/{sub_category_id}/delete', [CategoryController::class, 'destroy_sub_category'])->name('sub_categories.destroy');

    Route::resource('categories', CategoryController::class)->only(['destroy', 'store']);

    // brands pages
    Route::get('/brands', [BrandController::class, 'index'])->name('brand');

    Route::put('/brands/update', [BrandController::class, 'update'])->name('brands.update');

    Route::resource('brands', BrandController::class)->only(['destroy', 'store']);

    // users pages
    Route::get('/users', [UserController::class, 'index'])->name('user');

    Route::post('/users', [UserController::class, 'ban'])->name('user.ban');

    // orders pages
    Route::get('/orders', [OrderController::class, 'index'])->name('orders');

    Route::post('/orders/order-status', [OrderController::class, 'order_status'])->name('order_status');

    // sales pages
    Route::get('/sales', [SaleController::class, 'index'])->name('sales');

    // print invoice
    Route::get('/order/invoice-print', [PrintController::class, 'print_invoice'])->name('print_invoice');
});

Route::get('/fetchcat', [ProductController::class, 'fetchSubCategories']);

Route::get('/fetchProductPhotos', [ProductController::class, 'fetchProductPhoto']);

Route::get('/OrderItems', [OrderController::class, 'order_items']);


// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('Pages.Admin.dashboard');
// })->name('dashboard');