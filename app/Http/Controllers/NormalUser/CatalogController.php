<?php

namespace App\Http\Controllers\NormalUser;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index()
    {
            
        // filtered
        $products = Product::brandTypefilter()
            ->stockfilter()
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

    public function category($category_name)
    {
        $category_check = Category::where('category_name',$category_name)->first();

        if(empty($category_check)){
            abort(404);
        }

        // filtered
        $products = Product::where('category_name',$category_name)
            ->brandTypefilter()
            ->stockfilter()
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
            'category_name' => $category_name,
        ]);
    }

    public function collection($category_name,$sub_category_name)
    {
        $category_check = Category::where('category_name',$category_name)->first();
        $sub_category_check = SubCategory::where('sub_category_name',$sub_category_name)->first();

        if(empty($category_check) || empty( $sub_category_check)){
            abort(404);
        }

        // filtered
        $products = Product::where('category_name',$category_name)
            ->where('sub_category_name',$sub_category_name)
            ->brandTypefilter()
            ->stockfilter()
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
            'category_name' => $category_name,
            'sub_category_name' => $sub_category_name,
        ]);
    }
}
