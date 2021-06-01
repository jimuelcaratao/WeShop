<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $revenue_per_month = OrderItem::whereMonth('created_at', '=', Carbon::now()->subMonth()->month + 1)->get();


        // revenue

        $order_items = OrderItem::whereBetween('created_at', [request()->sales_from, request()->sales_to])
        ->orderBy('created_at')
        ->get();

        if (!empty(request()->sales_from)  ||  !empty(request()->sales_to)) {
            $order_items = OrderItem::whereBetween('created_at', [request()->sales_from, request()->sales_to])
                ->orderBy('created_at')
                ->get();
        } else {
            $order_items =OrderItem::orderBy('created_at')
                ->get();
        }

        // orders per week

        $order_counts = Order::select([
                DB::raw('count(order_no) as `order`'), 
                DB::raw('DATE(created_at) as day')
            ])->groupBy('day')
            ->whereBetween('created_at', [Carbon::now()->subDays(7),  Carbon::now()])
            ->get();

        // users per week
        $user_per_week = User::select([
                DB::raw('count(id) as `users`'), 
                DB::raw('DATE(created_at) as day')
            ])->groupBy('day')
            ->whereBetween('created_at', [Carbon::now()->subDays(7),  Carbon::now()])
            ->get();
            

        return view('Pages.Admin.sales',[
            'order_items' => $order_items,
            'order_counts' => $order_counts,
            'user_per_week' => $user_per_week,

        ]);
    }

}
