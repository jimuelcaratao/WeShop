<?php

namespace App\Http\Controllers\NormalUser;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class WriteReviewController extends Controller
{
    public function index($product_code,$order_no)
    {
        $user_has_review = Review::where('user_id' , 'like', '%' . Auth::user()->id . '%')
            ->where('order_no' , $order_no)
            ->where('product_code' , $product_code)
            ->first();

        if(!empty($user_has_review)){
            return Redirect::back()->with('info','Opps you cannot review on same item with same transaction');
        }

        $product = Product::where('product_code', $product_code)->first();

        $order = Order::where('order_no', $order_no)->first();

        return view('Pages.NormalUser.write_review',[
            'product' =>  $product,
            'order' =>  $order,
        ]);
    }

    public function write_review($product_code,$order_no,Request $request)
    {
        $validator = Validator::make($request->all(), [
            'stars' => 'required',
            'body' => 'required',
        ]);

        if ($validator->fails()) {
            return Redirect::route('write_review',[$product_code,$order_no])
                ->with('toast_error', $validator->messages()->all())
                ->withInput();
        }

        Review::insert([
            'user_id'=> Auth::user()->id,
            'product_code' => $product_code,
            'order_no' => $order_no,
            'stars' => $request->input('stars'),
            'body' => $request->input('body'),
        ]);

        return Redirect::route('my_orders')->with('toast_success', 'Review added');
    }
}
    