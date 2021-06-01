<?php

namespace App\Http\Controllers\NormalUser;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index()
    {
            
        // filtered
        $products = Product::productfilter()
            ->brandfilter()
            ->categoryfilter()
            ->subcategoryfilter()
            ->latest()
            ->get();

        return view('Pages.NormalUser.catalog',[
            'products' => $products,
        ]);

    } 
}
