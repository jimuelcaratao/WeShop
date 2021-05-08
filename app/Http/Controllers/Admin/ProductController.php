<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductPhotoCollection;
use App\Http\Resources\ProductSubCategory;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductPhoto;
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
        // text display for filter
        $categories_search = null;
        $sub_categories_search = null;
        $brands_search = null;

        $brands = Brand::where('status', 'active')->get();

        $categories = Category::get();

        // $subcategories = Category::get();

        $tableProducts = Product::all();

        if ($tableProducts->isEmpty()) {
            $products = Product::paginate();
        }

        if ($tableProducts->isNotEmpty()) {
            // $products = Product::paginate(5);

            // search validation
            $search = Product::where('product_code', 'like', '%' . request()->search . '%')
                ->OrWhere('product_name', 'like', '%' . request()->search . '%')
                ->OrWhere('sku', 'like', '%' . request()->search . '%')
                ->first();

            $searchAdvance = Product::where('product_code', 'like', '%' . request()->advanceSearch . '%')
                ->OrWhere('product_name', 'like', '%' . request()->advanceSearch . '%')
                ->OrWhere('sku', 'like', '%' . request()->advanceSearch . '%')
                ->first();

            if ($search === null) {
                return redirect('products')->with('info', 'No "' . request()->search . '" found in the database.');
            }

            if ($searchAdvance === null) {
                return redirect('products')->with('info', 'No "' . request()->advanceSearch . '" found in the database.');
            }

            if ($search != null) {
                // default returning
                $products = Product::Where('product_code', 'like', '%' . request()->search . '%')
                    ->OrWhere('product_name', 'like', '%' . request()->search . '%')
                    ->OrWhere('sku', 'like', '%' . request()->search . '%')
                    ->latest()
                    ->paginate(5);
            }

            if (!empty(request()->advanceSearch)  ||  !empty(request()->searchBrand) || !empty(request()->searchCategory) || !empty(request()->searchSubCategory)) {

                // converting category value to text
                if (!empty(request()->searchCategory)) {
                    $categories_searchConvert = Category::where('category_id', request()->searchCategory)->first();
                    $categories_search = $categories_searchConvert->category_name;
                }
                // converting category value to text
                if (!empty(request()->searchBrand)) {
                    $searchBrandConvert = Brand::where('brand_id', request()->searchBrand)->first();
                    $brands_search = $searchBrandConvert->brand_name;
                }

                if (!empty(request()->searchSubCategory)) {
                    $sub_categories_search = request()->searchSubCategory;
                }

                // filtered
                $products = Product::productfilter()
                    ->brandfilter()
                    ->categoryfilter()
                    ->subcategoryfilter()
                    ->latest()
                    ->paginate(5, ['*'], 'products');
            }
        }

        // $subcat = Category::with('sub_categories')->get();


        return view('Pages.Admin.products', [
            'products' => $products,
            'brands' => $brands,
            'categories' => $categories,
            'categories_search' => $categories_search,
            'sub_categories_search' => $sub_categories_search,
            'brands_search' => $brands_search,
            // 'subcategories' => $subcategories,
        ]);
    }

    public function fetchSubCategories(Request $request)
    {
        return new ProductSubCategory(
            SubCategory::where('category_id', $request->Id)
                ->get()
        );
    }

    public function fetchProductPhoto(Request $request)
    {
        // dd($request->product_code);
        $product_photos = ProductPhoto::where('product_code', $request->product_code)
            ->first();

        return ['product_photos' => $product_photos];
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
    public function upload_product_image($request)
    {
        if ($request->hasFile('photo_1') != null) {
            // create images
            $image       = $request->file('photo_1');
            $filename    = $image->getClientOriginalName();
            $product_code =  $request->input('product_code') ?? $request->input('edit_product_code');

            $image_resize = Image::make($image);
            $image_resize->resize(300, 300);

            if ($request->file('photo_1')->isValid()) {
                // create product_code path 
                $photo_1 = strval($filename);

                ProductPhoto::upsert([
                    'product_code' => $product_code,
                    'photo_1' => $photo_1,
                ], 'product_code');

                $image_resize->save(public_path('storage/media/products/'
                    . $product_code . '_photo_1_' . $filename));
            }
        }

        if ($request->hasFile('photo_2') != null) {
            // create images
            $image       = $request->file('photo_2');
            $filename    = $image->getClientOriginalName();
            $product_code =  $request->input('product_code') ?? $request->input('edit_product_code');

            $image_resize = Image::make($image);
            $image_resize->resize(300, 300);

            if ($request->file('photo_2')->isValid()) {
                // create product_code path 
                $photo_2 = strval($filename);

                ProductPhoto::upsert([
                    'product_code' => $product_code,
                    'photo_2' => $photo_2,
                ], 'product_code');

                $image_resize->save(public_path('storage/media/products/'
                    . $product_code . '_photo_2_' . $filename));
            }
        }


        if ($request->hasFile('photo_3') != null) {
            // create images
            $image       = $request->file('photo_3');
            $filename    = $image->getClientOriginalName();
            $product_code =  $request->input('product_code') ?? $request->input('edit_product_code');

            $image_resize = Image::make($image);
            $image_resize->resize(300, 300);

            if ($request->file('photo_3')->isValid()) {
                // create product_code path 
                $photo_3 = strval($filename);

                ProductPhoto::upsert([
                    'product_code' => $product_code,
                    'photo_3' => $photo_3,
                ], 'product_code');

                $image_resize->save(public_path('storage/media/products/'
                    . $product_code . '_photo_3_' . $filename));
            }
        }
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
            'category_name' => $categories->category_name ?? null,
            'sub_category_name' => $request->input('sub_category_name'),
            'brand_id' => $request->input('brand_id'),
            'stock' => $request->input('stock'),
            'price' => $request->input('price'),
            // 'default_photo' => $request->input('price'),
        ]);


        if ($request->hasFile('default_photo') != null) {
            if ($request->file('default_photo')->isValid()) {
                // create images
                $image       = $request->file('default_photo');
                $filename    = $image->getClientOriginalName();
                $product_code =  $request->input('product_code');

                $image_resize = Image::make($image);
                $image_resize->resize(300, 300);

                $image_resize->save(public_path('storage/media/products/main_'
                    . $product_code . '_' . $filename));

                // create barcode 
                $char = strval($filename);
                Product::where('product_code', $product_code)
                    ->update([
                        'default_photo' => $char,
                    ]);
            }
        }

        $this->upload_product_image($request);

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
                // 'default_photo' => $request->input('edit_price'),
            ]);

        if ($request->hasFile('default_photo') != null) {
            if ($request->file('default_photo')->isValid()) {
                // create images
                $image       = $request->file('default_photo');
                $filename    = $image->getClientOriginalName();
                $product_code =  $request->input('edit_product_code');

                $image_resize = Image::make($image);
                $image_resize->resize(300, 300);

                $image_resize->save(public_path('storage/media/products/main_'
                    . $product_code . '_' . $filename));

                // create barcode 
                $char = strval($filename);
                Product::where('product_code', $product_code)
                    ->update([
                        'default_photo' => $char,
                    ]);
            }
        }

        $this->upload_product_image($request);

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

        return Redirect::route('products')->withSuccess('Product (Product code: ' . $product_code . '). Deleted Successfully!');
    }
}
