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
        $orders = Order::where('user_id' , 'like', '%' . Auth::user()->id . '%')->get();

        
        return view('Pages.NormalUser.my_orders',[
            'orders' => $orders,
        ]);
    }
}
