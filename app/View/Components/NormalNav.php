<?php

namespace App\View\Components;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class NormalNav extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        if (Auth::check() == true) {
            // new orders notif
            $new_orders = Order::where('user_id', Auth::user()->id)
                ->where('viewed_by_user', '0')
                ->get();
        }
        return view('normal-nav', []);
    }
}
