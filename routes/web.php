<?php

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

Route::get('/', function () {
    return view('welcome');
});


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


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
