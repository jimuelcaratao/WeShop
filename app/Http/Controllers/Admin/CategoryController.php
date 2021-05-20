<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::oldest()->paginate(5);

        return view('Pages.Admin.categories', [
            'categories' => $categories,
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
            'category_name' => 'required|unique:categories',
        ]);

        if ($validator->fails()) {
            return Redirect::route('category')
                ->with('toast_error', $validator->messages()->all())
                ->withInput();
        }
        
        DB::table('categories')->insert([
            'category_name' => $request->input('category_name'),
        ]);

        return Redirect::route('category')->withSuccess('Category :' . $request->input('category_name') . '. Created Successfully!');

    }

    public function sub_store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'sub_category_name' => 'required|unique:sub_categories',
            'category_id' => 'required',

        ]);

        if ($validator->fails()) {
            return Redirect::route('category')
                ->with('toast_error', $validator->messages()->all())
                ->withInput();
        }
        
        DB::table('sub_categories')->insert([
            'category_id'=> $request->input('category_id'),
            'sub_category_name' => $request->input('sub_category_name'),
        ]);

        return Redirect::route('category')->withSuccess('Sub Category :' . $request->input('sub_category_name') . '. Created Successfully!');

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
        $validator = Validator::make($request->all(), [
            'category_name' => 'required|unique:categories',
            'category_id' => 'required',

        ]);

        if ($validator->fails()) {
            return redirect('categories')
                ->with('toast_error', $validator->messages()->all())
                ->withInput();
        }

        Category::where('category_id',  $request->input('category_id'))
        ->update([
            'category_name' => $request->input('category_name'),
        ]);

        return Redirect::route('category')->withSuccess('Category :' . $request->input('category_name') . '. Updated Successfully!');
    }

    public function update_sub(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'sub_category_name' => 'required|unique:sub_categories',
            'sub_category_id' => 'required',

        ]);

        if ($validator->fails()) {
            return redirect('categories')
                ->with('toast_error', $validator->messages()->all())
                ->withInput();
        }

        SubCategory::where('sub_category_id',  $request->input('sub_category_id'))
        ->update([
            'sub_category_name' => $request->input('sub_category_name'),
        ]);

        return Redirect::route('category')->withSuccess('Sub Category :' . $request->input('category_name') . '. Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($category_id)
    {
        if (is_null($category_id)) {
            return Redirect::route('category')->withInfo('Yawa!');
        }

        // fetching info
        $category_fetch = Category::where('category_id', $category_id)->first();
        // Softdeletes
        Category::find($category_id)->delete();

        return Redirect::route('category')->withSuccess('Category (Category Name: ' . $category_fetch->category_name . '). Deleted Successfully!');
    }

    public function destroy_sub_category($sub_category_id)
    {
        if (is_null($sub_category_id)) {
            return Redirect::route('category')->withInfo('Yawa!');
        }
        // Softdeletes
        SubCategory::find($sub_category_id)->delete();

        return Redirect::route('category')->withSuccess('Sub Category (Sub Category ID: ' . $sub_category_id . '). Deleted Successfully!');
    }
}
