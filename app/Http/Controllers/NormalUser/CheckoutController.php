<?php

namespace App\Http\Controllers\NormalUser;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $carts = Cart::Where('user_id', 'like', '%' . Auth::user()->id . '%')->get();

        return view('Pages.NormalUser.checkout', [
            'carts' => $carts,
        ]);
    }
}
