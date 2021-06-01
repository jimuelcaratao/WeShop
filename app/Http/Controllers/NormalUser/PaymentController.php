<?php

namespace App\Http\Controllers\NormalUser;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class PaymentController extends Controller
{
    public function index()
    {
        $cart_check = Cart::Where('user_id', 'like', '%' . Auth::user()->id . '%')->first();

        if(empty($cart_check)){
            return Redirect::route('cart')->with('toast_error','You cannot proceed to payment if you had no item on cart');
        }
        
        $carts = Cart::Where('user_id', 'like', '%' . Auth::user()->id . '%')->get();

        return view('Pages.NormalUser.payment', [
            'carts' => $carts,
        ]);
    }

    public function place_order()
    {


        if(Auth::user()->user_address){
            $order = Order::create([
                'user_id' => Auth::user()->id,
                'status' => 'Confirm Pending',
            ]);

           $my_carts =  Cart::where('user_id',Auth::user()->id)->get();

           foreach ($my_carts as $my_cart) {
                OrderItem::Create([
                    'order_no' => $order->order_no,
                    'product_code' => $my_cart->product_code,
                    'quantity' => $my_cart->quantity,
                    'price' => $my_cart->product->product_price->discounted_price ?? $my_cart->product->product_price->price,
                ]);
           }

           $deletedRows = Cart::where('user_id', Auth::user()->id)->delete();

            //  Mail
           
           return Redirect::route('my_orders')->with('toast_success', 'Order placed.');
        }
    }
}
