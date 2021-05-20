<?php

namespace App\Http\Controllers\NormalUser;

use App\Http\Controllers\Controller;
use App\Models\Visit;
use Carbon\Carbon;
use Illuminate\Support\Facades\Request as FacadesRequest;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // create visit
        Visit::Create([
            'ip_address' => FacadesRequest::ip(),
            'visit_date' => Carbon::now(),
        ]);

        return view('Pages.NormalUser.home');
    }
}
