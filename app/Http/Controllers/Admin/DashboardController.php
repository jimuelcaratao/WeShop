<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use App\Models\WishList;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // identify time now
        $dt = new DateTime();
        $hour = $dt->format('H');
        // $dayTerm = ($hour > 17) ? "Evening" : (($hour > 12) ? "Afternoon" : "Morning");

        if ($hour > 6 && $hour <= 11) {
            $dayTerm = "Good Morning";
        } else if ($hour > 11 && $hour <= 17) {
            $dayTerm = "Good Afternoon";
        } else if ($hour > 17 && $hour <= 23) {
            $dayTerm = "Good Evening";
        } else {
            $dayTerm = "Why aren't you asleep?  Are you programming?";
        }

        $users = User::where('is_admin', '0')->get();

        $new_users = User::where('is_admin', '0')
            ->whereMonth('created_at', '=', Carbon::now()->month)
            ->count();

        $products_count = Product::count();

        $products_count_low = Product::where('stock', '<=', 10)
            ->count();

        $orders_count_today = Order::whereDate('created_at', Carbon::today())
            ->count();

        $popular_items = WishList::select('product_code')
            ->groupBy('product_code')
            ->orderByRaw('COUNT(*) DESC')
            ->limit(10)
            ->get();

        $revenue_per_month = OrderItem::whereMonth('created_at', '=', Carbon::now()->subMonth()->month + 1)->get();

        return view('Pages.Admin.dashboard',[
            'users' => $users,
            'new_users' => $new_users,
            'products_count' => $products_count,
            'dayTerm' => $dayTerm,
            'products_count_low' => $products_count_low,
            'orders_count_today' => $orders_count_today,
            'popular_items' => $popular_items,
            'revenue_per_month' => $revenue_per_month,

        ]);
    }
}
