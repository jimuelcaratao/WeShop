<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $tableUsers = User::all();

        if ($tableUsers->isEmpty()) {
            $users = User::oldest()->paginate();
        }

        if ($tableUsers->isNotEmpty()) {
        

             // search validation
             $search = User::where(request()->search_col ?? 'name', 'like', '%' . request()->search . '%')
             ->first();

            if ($search === null) {
                return redirect('users')->with('info', 'No "' . request()->search . '" found in the database.');
            }

            if ($search != null) {
                // default returning
                $users = User::where(request()->search_col ?? 'name', 'like', '%' . request()->search . '%')
                    ->oldest()
                    ->paginate(5);

            }
        }
        return view('Pages.Admin.users',[
            'users' =>   $users,
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
    public function destroy($id)
    {
        //
    }
}
