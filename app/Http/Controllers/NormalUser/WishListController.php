<?php

namespace App\Http\Controllers\NormalUser;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\WishList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class WishListController extends Controller
{
    //
    public function index()
    {
      $wishlists = WishList::Where('user_id', 'like', '%' . Auth::user()->id . '%')->get();

       return view('Pages.NormalUser.wishlist',[
            'wishlists' => $wishlists,
       ]);
    }

    public function add_to_wishlist($product_code)
    {

        WishList::Create([
            'user_id' => Auth::user()->id,
            'product_code' => $product_code,
        ]);

        return Redirect::route('product',[ $product_code])->with('toast_success', 'Added from wishlist');
    }

    
    public function remove_to_wishlist($product_code)
    {
        // dd($product_code);
         $remove_wishlist =  WishList::Where('product_code', $product_code)
        ->Where('user_id', 'like', '%' . Auth::user()->id . '%')
        ->delete();

        return Redirect::back()->with('toast_success', 'Removed from wishlist');
    }
    
    public function move_to_cart($product_code)
    {
        $cart = Cart::Where('product_code', $product_code)
        ->Where('user_id', 'like', '%' . Auth::user()->id . '%')->first();


        $wishlist = WishList::Where('product_code', $product_code)
        ->Where('user_id', 'like', '%' . Auth::user()->id . '%')->first();

        
        if(!empty($cart)){
            $cart_quantity = $cart->quantity + 1;
            if($cart_quantity > 5) {
                return Redirect::back()->with('toast_error', 'Cannot put on cart');
            }
            Cart::where('product_code', $product_code)
            ->Where('user_id', 'like', '%' . Auth::user()->id . '%')
            ->update([
                'user_id' => Auth::user()->id,
                'product_code' =>$product_code,
                'quantity' =>$cart_quantity,
            ]);
        }

        if(empty($cart)){
            Cart::Create([
                'user_id' => Auth::user()->id,
                'product_code' =>$product_code,
                'quantity' => 1,
            ]);
        }

        return Redirect::back()->with('toast_success', 'Moved to cart');

    }
}
