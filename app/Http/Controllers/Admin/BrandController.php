<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

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
        $validator = Validator::make($request->all(), [
            'brand_name' => 'required|unique:brands',
            'status' => 'required',

        ]);

        if ($validator->fails()) {
            return Redirect::route('brand')
                ->with('toast_error', $validator->messages()->all())
                ->withInput();
        }

        DB::table('brands')->insert([
            'brand_name'=> $request->input('brand_name'),
            'status' => $request->input('status'),
        ]);

        return Redirect::route('brand')->withSuccess('Brand :' . $request->input('brand_name') . '. Created Successfully!');

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

        Brand::where('brand_id',  $request->input('brand_id'))
        ->update([
            'brand_name' => $request->input('brand_name'),
            'status' => $request->input('status'),
        ]);

        return Redirect::route('brand')->withSuccess('Brand :' . $request->input('brand_name') . '. Updated Successfully!');
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
