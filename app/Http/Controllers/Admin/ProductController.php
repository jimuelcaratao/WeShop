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
use Illuminate\Validation\ValidationException;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic as Image;

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

        $products = Product::latest()->paginate(5);

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
        $validator = Validator::make($request->all(), [
            'sku' => 'required|unique:products',
            'product_code' => 'required|unique:products|numeric',
            'category_name' => 'required',
            'sub_category_name' => 'required',
            'brand_id' => 'required',
            'product_name' => 'required',
            // 'description' => 'required',
            // 'specs' => 'required',
            'stock' => 'required|numeric',
            'price' => 'required|numeric',
            'default_photo' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect('products')
                ->with('toast_error', $validator->messages()->all())
                ->withInput();
        }

        // converting category value to text
        $categories = Category::where('category_id', $request->input('category_name'))->first();

        DB::table('products')->insert([
            'product_code' => $request->input('product_code'),
            'sku' => $request->input('sku'),
            'product_name' => $request->input('product_name'),
            'description' => $request->input('description'),
            'specs' => $request->input('specs'),
            'category_name' => $categories->category_name,
            'sub_category_name' => $request->input('sub_category_name'),
            'brand_id' => $request->input('brand_id'),
            'stock' => $request->input('stock'),
            'price' => $request->input('price'),
            'default_photo' => $request->input('price'),
        ]);


        if ($request->hasFile('default_photo') != null) {
            if ($request->file('default_photo')->isValid()) {
                // create images
                $image       = $request->file('default_photo');
                $filename    = $image->getClientOriginalName();
                $product_code =  $request->input('product_code');

                $image_resize = Image::make($image);
                $image_resize->resize(300, 300);

                $image_resize->save(public_path('storage/media/products/'
                    . $product_code . '_' . $filename));

                // create barcode 
                $char = strval($filename);
                Product::where('product_code', $product_code)
                    ->update([
                        'default_photo' => $char,
                    ]);
            }
        }

        // dd($sad);
        return Redirect::route('products')->withSuccess('Product :' . $request->input('product_name') . '. Created Successfully!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // $validator = Validator::make($request->all(), [
        //     'sku' => 'required|unique:products',
        //     'product_code' => 'required|unique:products|numeric',
        //     'category_name' => 'required',
        //     'sub_category_name' => 'required',
        //     'brand_id' => 'required',
        //     'product_name' => 'required',
        //     // 'description' => 'required',
        //     // 'specs' => 'required',
        //     'stock' => 'required|numeric',
        //     'price' => 'required|numeric',
        //     // 'default_photo' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        // ]);

        // if ($validator->fails()) {
        //     return redirect('products')
        //         ->with('toast_error', $validator->messages()->all())
        //         ->withInput();
        // }
        // dd($request->all());

        // converting category value to text
        $categories = Category::where('category_id', $request->input('edit_category_name'))->first();

        Product::where('product_code',  $request->input('edit_product_code'))
            ->update([
                'product_code' => $request->input('edit_product_code'),
                'sku' => $request->input('edit_sku'),
                'product_name' => $request->input('edit_product_name'),
                'description' => $request->input('edit_description'),
                'specs' => $request->input('edit_specs'),
                'category_name' => $categories->category_name,
                'sub_category_name' => $request->input('edit_sub_category_name'),
                'brand_id' => $request->input('edit_brand'),
                'stock' => $request->input('edit_stock'),
                'price' => $request->input('edit_price'),
                'default_photo' => $request->input('edit_price'),
            ]);

        return Redirect::route('products')->withSuccess('Product :' . $request->input('edit_product_name') . '. Edited Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($product_code)
    {
        if (is_null($product_code)) {
            return Redirect::route('products')->withInfo('Yawa!');
        }
        // Softdeletes
        Product::find($product_code)->delete();

        return Redirect::route('products')->withSuccess('Product (Product code: ' . $product_code . '). Deleted Succussfull Created Successfully!');
    }
}
