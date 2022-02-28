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
use Illuminate\Support\Facades\Mail;
use App\Mail\ConfirmOrder;
use App\Models\UserCard;

class PaymentController extends Controller
{
    public function index()
    {
        $cart_check = Cart::Where('user_id', 'like', '%' . Auth::user()->id . '%')->first();

        if (empty($cart_check)) {
            return Redirect::route('cart')->with('toast_error', 'You cannot proceed to payment if you had no item on cart');
        }

        $carts = Cart::Where('user_id', 'like', '%' . Auth::user()->id . '%')->get();

        return view('Pages.NormalUser.payment', [
            'carts' => $carts,
        ]);
    }

    public function place_order(Request $request)
    {

        if (Auth::user()->user_address) {
            if (empty(Auth::user()->user_card)) {
                $request->validate([
                    'cardname' => 'required',
                    'cardnumber' => 'required|numeric|digits:16',
                    'expmonth' => 'required|numeric|digits:2|max:12',
                    'expyear' => 'required|numeric|digits:4',
                    'ccv' => 'required|numeric|digits:3',
                ]);

                UserCard::create([
                    'user_id' => Auth::user()->id,
                    'cardname' => $request->input('cardname'),
                    'cardnumber' =>  $request->input('cardnumber'),
                    'expmonth' =>  $request->input('expmonth'),
                    'expyear' =>  $request->input('expyear'),
                    'ccv' =>  $request->input('ccv'),
                ]);
            }

            $order = Order::create([
                'user_id' => Auth::user()->id,
                'status' => 'Confirm Pending',
                'payment_method' => $request->input('payment_method'),
            ]);

            $my_carts =  Cart::where('user_id', Auth::user()->id)->get();

            foreach ($my_carts as $my_cart) {

                if ($my_cart->product->stock > 0) {
                    OrderItem::Create([
                        'order_no' => $order->order_no,
                        'product_code' => $my_cart->product_code,
                        'quantity' => $my_cart->quantity,
                        'price' => $my_cart->product->product_price->discounted_price ?? $my_cart->product->product_price->price,
                    ]);
                }
            }
            $deletedRows = Cart::where('user_id', Auth::user()->id)->delete();

            //  Mail
            $order_email = Order::Where('order_no', $order->order_no)->first();
            Mail::to($order_email->user->email)->send(new ConfirmOrder($order_email));

            return Redirect::route('my_orders')->with('toast_success', 'Order placed.');
        }
    }
}
