<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

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

    public function ban(Request $request)
    {
        
        $user = User::where('email', Auth::user()->email)->first();

        if($user->password == null){
            return Redirect::back()->with('info','Opps you have currently no password.');
        }

        if (Hash::check($request->input('password'), $user->password)) {

            $get_user = User::where('id', $request->input('id'))->first();

            if($get_user->is_banned == null) {
            
                $get_user->update([
                    'is_banned' => Carbon::now(),
                ]);
                return Redirect::back()->with('success','Yey user is banned now.');
            }
            if($get_user->is_banned != null) {
                $get_user->update([
                    'is_banned' => null,
                ]);
                return Redirect::back()->with('success','Yey user is unbanned now.');

            }
        }
        else{
            return Redirect::back()->with('info','Sorry Wrong credentials.');
        }

    }

}
