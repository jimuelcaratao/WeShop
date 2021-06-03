<?php

namespace App\Http\Controllers\NormalUser;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index()
    {
            
        // filtered
        $products = Product::brandTypefilter()
            ->latest()
            ->get();

        // converting category value to text
        if (!empty(request()->brand_type)) {
            $searchBrandConvert = Brand::where('brand_id', request()->brand_type)->first();
            $brands_search = $searchBrandConvert->brand_name;
        }

        return view('Pages.NormalUser.catalog',[
            'products' => $products,
            'brands_search' => $brands_search ?? null,
        ]);

    } 
}
