<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
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

        return view('Pages.Admin.dashboard',[
            'users' => $users,
            'new_users' => $new_users,
            'dayTerm' => $dayTerm,
        ]);
    }
}
