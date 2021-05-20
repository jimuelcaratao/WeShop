<?php

namespace App\Http\Controllers\NormalUser;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Product;
use App\Models\ProductReview;
use App\Models\Review;
use Illuminate\Http\Request;

class SingleProductController extends Controller
{
    public function index($product_code)
    {

        $product = Product::where('product_code',$product_code)->first();

        if(empty($product)) {
            return abort(404);
        }

        $product_ave_reviews = Review::where('product_code',$product_code)->avg('stars');

        return view('Pages.NormalUser.product',[
            'product' => $product,
            'product_ave_reviews' => $product_ave_reviews,

        ]);
    }

    // public function post($product_code,Post $post )
    // {
    
    //     return view('Pages.NormalUser.product_review', [
    //         'post' => $post,
    //     ]);
    // }

    public function review($product_code,Review $review )
    {
        $product = Product::where('product_code',$product_code)->first();

        if(empty($product)) {
            return abort(404);
        }
        return view('Pages.NormalUser.product_review', [
            'review' => $review,
            'product' => $product,

        ]);
    }
}
