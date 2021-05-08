<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::oldest()->paginate(5);

        return view('Pages.Admin.brands',[
            'brands' =>   $brands,
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function destroy($brand_id)
    {
        if (is_null($brand_id)) {
            return Redirect::route('brand')->withInfo('Oppss... Something went wrong..');
        }

        // fetching info
        $brand_fetch = Brand::where('brand_id', $brand_id)->first();
        // Softdeletes
        Brand::find($brand_id)->delete();

        return Redirect::route('brand')->withSuccess('Brand :' . $brand_fetch->brand_name . ' .Deleted Successfully!');
    }
}
