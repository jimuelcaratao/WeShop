<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class PrintController extends Controller
{
    public function print_invoice(Request $request)
    {

        $order = Order::Where('order_no',$request->input('order_no'))->first();

        $order_items = OrderItem::Where('order_no',$request->input('order_no'))->get();

        return view('Pages.Admin.print_invoice',[
            'order_items' => $order_items,
            'order' => $order,
        ]);
    }
}
