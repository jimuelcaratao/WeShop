<?php

namespace App\Http\Controllers\NormalUser;

use App\Http\Controllers\Controller;
use App\Mail\ConfirmOrder;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Review;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class MyOrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id' , 'like', '%' . Auth::user()->id . '%')->latest()->get();

        
        return view('Pages.NormalUser.my_orders',[
            'orders' => $orders,
        ]);
    }

    public function my_order_status($order_no)
    {

        $order = Order::where('order_no', $order_no)->first();

        $order_items = OrderItem::where('order_no', $order_no)
            ->get();

        return view('Pages.NormalUser.order_status',[
            'order' => $order,
            'order_items' => $order_items,
        ]);
    }

    public function send_confirm_order( $order_no)
    {
        $order = Order::Where('order_no',$order_no)->first();

         Mail::to($order->user->email)->send(new ConfirmOrder($order));

        return Redirect::back()->with('toast_success', 'Confirmation sent.');
    }

    public function confirm_order($order_no)
    {
        $order = Order::Where('order_no',$order_no)->first();

        if($order->user_id != Auth::user()->id){
            return abort(403);
        }

        if(!empty($order->canceled_at)){
            return Redirect::route('my_orders');
        }
        
        if(empty($order->confirm)){
            Order::Where('order_no',$order_no)->update([
                'status' => 'Pending',
                'confirmed' => Carbon::now(),
            ]);
        }

        return Redirect::route('my_orders');
    }

    public function cancel_order($order_no)
    {
        $order = Order::Where('order_no',$order_no)->first();

        if($order->user_id != Auth::user()->id){
            return abort(403);
        }

        if(empty($order->canceled_at)){
            Order::Where('order_no',$order_no)->update([
                'status' => 'Canceled',
                'canceled_at' => Carbon::now(),
            ]);
        }

        return Redirect::route('my_orders');
    }
}
