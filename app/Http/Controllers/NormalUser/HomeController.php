<?php

namespace App\Http\Controllers\NormalUser;

use Carbon\Carbon;
use App\Models\Visit;
use App\Models\Product;
use App\Http\Controllers\Controller;
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
        
        $products = Product::inRandomOrder()->take(10)->get();

        $latest_products = Product::latest()->take(10)->get();

        return view('Pages.NormalUser.home', [
            'products' => $products,
            'latest_products' => $latest_products,

        ]);
    }
}
