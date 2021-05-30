<?php

namespace App\Http\Controllers\NormalUser;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyOrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id' , 'like', '%' . Auth::user()->id . '%')->latest()->get();

        
        return view('Pages.NormalUser.my_orders',[
            'orders' => $orders,
        ]);
    }

    public function my_order_status($product_code,$order_no)
    {

        $order = Order::where('order_no',$order_no)->first();

        return view('Pages.NormalUser.order_status',[
            'order' => $order,
        ]);
    }
}
