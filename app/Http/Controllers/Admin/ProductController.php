<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductSubCategory;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $brands = Brand::where('status', 'active')->get();

        $categories = Category::get();

        $subcategories = Category::get();

        $products = Product::get();

        // $subcat = Category::with('sub_categories')->get();


        return view('Pages.Admin.products', [
            'products' => $products,
            'brands' => $brands,
            'categories' => $categories,
            'subcategories' => $subcategories,

        ]);
    }

    public function fetchSubCategories(Request $request)
    {
        return new ProductSubCategory(
            SubCategory::where('category_id', $request->Id)
                ->get()
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'input_product_code' => 'bail|required|unique:products',
            'input_category' => 'required',
            'input_sub_category' => 'required',
            'input_brand' => 'required',
            'input_sku' => 'required',
            'input_product_name' => 'required',
            // 'input_description' => 'required',
            // 'input_specs' => 'required',
            'input_price' => 'required',
            'input_stock' => 'required',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($product_code)
    {
        // Softdeletes
        $product_code != null ?
            $student_delete  = Product::find($product_code)->delete() :
            Redirect::back();

        return Redirect::route('products')->withSuccess('Product (Product code: ' . $product_code . '). Deleted Succussfull Created Successfully!');
    }
}
