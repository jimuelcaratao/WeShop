<?php

namespace App\Http\Controllers\NormalUser;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\WishList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;


class CartController extends Controller
{

    public function index()
    {
        $carts = Cart::Where('user_id', 'like', '%' . Auth::user()->id . '%')->get();

        // $get_total = Cart::Where('user_id', 'like', '%' . Auth::user()->id . '%')
        // ->sum(function($carts) {
        //     11 * 11;
        // });

        return view('Pages.NormalUser.cart',[
             'carts' => $carts,
            //  'get_total' => $get_total,
        ]);

    }

    
    public function add_to_cart(Request $request, $product_code)
    {
        $validator = Validator::make($request->all(), [
            'quantity' => 'required|between:1,5',
        ]);

        if ($validator->fails()) {
            return redirect('categories')
                ->with('toast_error', $validator->messages()->all())
                ->withInput();
        }

        // getting all cart info from user
        $get_cart_info = Cart::where('user_id', 'like', '%' . Auth::user()->id . '%')
            ->where('product_code' , $product_code)
            ->first();

        if(!empty($get_cart_info)){
             // qty validation
            $check_qty = $get_cart_info->quantity + $request->input('quantity');

            if($check_qty > 5) {
                return Redirect::route('product',[$product_code])->with('toast_error', 'Cant add from cart');
            }

            Cart::where('user_id', 'like', '%' . Auth::user()->id . '%')
            ->where('product_code' , $product_code)
            ->update([
                'quantity' => $get_cart_info->quantity + $request->input('quantity'),
            ]);
        }
        else{
            Cart::create([
                'user_id' => Auth::user()->id,
                'product_code' => $product_code,
                'quantity' => $request->input('quantity'),
            ]);
        }

        return Redirect::route('product',[$product_code])->with('toast_success', 'Added from cart');
    }

    public function remove_to_cart($product_code)
    {
        $remove_cart =  Cart::Where('product_code', $product_code)
        ->Where('user_id', 'like', '%' . Auth::user()->id . '%')
        ->delete();

        return Redirect::route('cart')->with('toast_success', 'Removed from cart');
    }

    public function move_to_wishlist($product_code)
    {
        
        $cart = Cart::Where('product_code', $product_code)
        ->Where('user_id', 'like', '%' . Auth::user()->id . '%')->first();


        $wishlist = WishList::Where('product_code', $product_code)
        ->Where('user_id', 'like', '%' . Auth::user()->id . '%')->first();

        if(!empty($wishlist)){
            return Redirect::route('cart')->with('toast_info', 'Already on your wishlist');
        }

        if(empty($wishlist)){
            WishList::Create([
                'user_id' => Auth::user()->id,
                'product_code' =>$product_code,
            ]);
    
            $cart->delete();

            return Redirect::route('cart')->with('toast_success', 'Moved to Wishlist');
        }

    }

    
    public function change_quantity($cart_id ,Request $request)
    {

        if($request->input('quantity') > 5){
            return Redirect::route('cart')
            ->with('toast_error', 'Sorry, maximum per item is (5)');
        }

        if($request->input('quantity') < 1){
            return Redirect::route('cart')
            ->with('toast_error', 'Sorry, minimum per item is (1)');
        }
        $cart = Cart::Where('cart_id', $cart_id)
        ->Where('user_id', 'like', '%' . Auth::user()->id . '%')
        ->update([
            'quantity' => $request->input('quantity'),
        ]);

        return Redirect::route('cart');
    }
}
