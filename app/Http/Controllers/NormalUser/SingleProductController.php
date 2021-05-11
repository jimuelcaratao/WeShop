<?php

namespace App\Http\Controllers\NormalUser;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class SingleProductController extends Controller
{
    public function index($product_code)
    {

        $product = Product::where('product_code',$product_code)->first();

        if(empty($product)) {
            return abort(404);
        }

        return view('Pages.NormalUser.product',[
            'product' => $product,
        ]);
    }
}
