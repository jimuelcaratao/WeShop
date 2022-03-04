<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderItem as ResourcesOrderItem;
use App\Mail\OrderDelivered;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $orders = Order::latest('order_no')->paginate(5);

        $tableOrders = Order::all();

        if ($tableOrders->isEmpty()) {
            $orders = Order::latest('order_no')->paginate();
        }

        if ($tableOrders->isNotEmpty()) {
            // search validation
            $search = Order::where('order_no', 'like', '%' . request()->search . '%')
                // ->OrWhere('name', 'like', '%' . request()->search . '%')
                ->first();

            if ($search === null) {
                return Redirect::route('orders')->with('info', 'No "' . request()->search . '" found in the database.');
            }

            if ($search != null) {
                // default returning
                $orders = Order::where('order_no', 'like', '%' . request()->search . '%')
                    ->statusfilter()
                    ->latest('order_no')
                    ->paginate(5);
            }
        }

        return view('Pages.Admin.orders', [
            'orders' => $orders,
        ]);
    }

    public function order_items(Request $request)
    {
        return new ResourcesOrderItem(
            OrderItem::where('order_no', $request->order_no)
                ->with('product')
                ->get()
        );
    }

    public function order_status(Request $request)
    {
        $order = Order::where('order_no', $request->input('order_no'))->first();

        if (empty($order->confirmed)) {
            return Redirect::route('orders')->withInfo('Order no.:' . $request->input('order_no') . '. Confirmation needed!');
        }

        if (!empty($order->canceled_at)) {
            return Redirect::route('orders')->withInfo('Order no.:' . $request->input('order_no') . '. Already Canceled!');
        }

        // Switches status
        if ($order->packaged_at == null) {
            if ($request->has('packaged_switch')) {

                Order::where('order_no', $request->input('order_no'))
                    ->update([
                        'status' => 'Shipping',
                        'packaged_at' => Carbon::now(),
                        'viewed_by_user' => 0,
                    ]);


                // minus in the stock
                $get_items = OrderItem::where('order_no', $request->input('order_no'))->get();

                foreach ($get_items as $item) {
                    $get_products = Product::where('product_code', $item->product_code)->first();

                    $updated_stock = $get_products->stock - $item->quantity;

                    if ($updated_stock <= 0) {
                        return  Redirect::back()->with('toast_error', 'No more Stocks');
                    }

                    if ($updated_stock >= 0) {
                        Product::where('product_code', $item->product_code)->update([
                            'stock' => $updated_stock,
                        ]);
                    }
                }
            }
        }

        if ($request->input('packaged_switch') == null) {
            Order::where('order_no', $request->input('order_no'))
                ->update([
                    'packaged_at' => null,
                ]);
        }

        if ($order->shipped_at == null) {
            if ($request->has('shipped_switch')) {
                Order::where('order_no', $request->input('order_no'))
                    ->update([
                        'status' => 'Delivering',
                        'shipped_at' => Carbon::now(),
                        'viewed_by_user' => 0,
                    ]);
            }
        }
        if ($request->input('shipped_switch') == null) {
            Order::where('order_no', $request->input('order_no'))
                ->update([
                    'shipped_at' => null,
                ]);
        }

        if ($order->delivered_at == null) {
            if ($request->has('delivered_switch')) {
                Order::where('order_no', $request->input('order_no'))
                    ->update([
                        'status' => 'Delivered',
                        'delivered_at' => Carbon::now(),
                        'viewed_by_user' => 0,
                    ]);


                $order = Order::findOrFail($request->input('order_no'));

                // Ship the order...
                // Mail::to( $order->user->email)->send(new OrderDelivered($order));
            }
        }
        if ($request->input('delivered_switch') == null) {
            Order::where('order_no', $request->input('order_no'))
                ->update([
                    'delivered_at' => null,
                ]);
        }


        if ($order->returned_at == null) {
            if ($request->has('returned_switch')) {
                Order::where('order_no', $request->input('order_no'))
                    ->update([
                        'status' => 'Returned',
                        'returned_at' => Carbon::now(),
                        'viewed_by_user' => 0,
                    ]);
            }
        }
        if ($request->input('returned_switch') == null) {
            Order::where('order_no', $request->input('order_no'))
                ->update([
                    'returned_at' => null,
                ]);
        }

        // text status
        if ($request->input('returned_switch') == null) {
            Order::where('order_no', $request->input('order_no'))
                ->update([
                    'status' => 'Delivered',
                ]);
        }

        if ($request->input('delivered_switch') == null) {
            Order::where('order_no', $request->input('order_no'))
                ->update([
                    'status' => 'Delivering',
                ]);
        }

        if ($request->input('delivered_switch') == null && $request->input('shipped_switch') == null) {
            Order::where('order_no', $request->input('order_no'))
                ->update([
                    'status' => 'Shipping',
                ]);
        }

        if ($request->input('delivered_switch') == null && $request->input('shipped_switch') == null && $request->input('packaged_switch') == null) {
            Order::where('order_no', $request->input('order_no'))
                ->update([
                    'status' => 'Packaging',
                ]);
        }

        return Redirect::route('orders')->withSuccess('Order no.:' . $request->input('order_no') . '. Updated Successfully!');
    }
}
