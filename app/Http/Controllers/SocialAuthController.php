<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Hash;
use PHPUnit\Framework\MockObject\DuplicateMethodException;

class SocialAuthController extends Controller
{
    /**
     * Create a redirect method to facebook api.
     *
     * @return void
     */
    public function redirect()
    {
        return Socialite::driver('facebook')->redirect();
    }
    /**
     * Return a callback method from facebook api.
     *
     * @return callback URL from facebook
     */
    public function callback()
    {

        $user = Socialite::driver('facebook')->stateless()->user();

        $existingUser = User::where('email', $user->email)->first();

        if ($existingUser) {

            Auth::login($existingUser);
        } else {

            // $fbavatar = $user->avatar + "?type=large&access_token=zrqd4621_GnESiR5NEUhvrMTHEw";
            // $newUser                  = new User;
            // $newUser->name            = $user->name;
            // $newUser->email           = $user->email;
            // $newUser->password       =  Hash::make("test1");
            // // $newUser->google_id       = $user->id;
            // // $newUser->profile_photo_path          =  +"?type=large&access_token=zrqd4621_GnESiR5NEUhvrMTHEw";
            // // $newUser->avatar_original = $user->avatar_original;
            // $newUser->save();

            $sa = User::create([
                'name' => $user->getName(),
                'email' =>  $user->getEmail(),
                'password' => Hash::make("test1"),
            ]);

            Auth::login($sa, true);
            Auth::loginUsingId(Auth::id(), true);
        }
        return redirect()->to('/dashboard');
    }

    public function callbackGoogle()
    {

        $user = Socialite::driver('google')->stateless()->user();

        $existingUser = User::where('email', $user->email)->first();

        if ($existingUser) {

            Auth::login($existingUser);
        } else {

            // $fbavatar = $user->avatar + "?type=large&access_token=zrqd4621_GnESiR5NEUhvrMTHEw";
            // $newUser                  = new User;
            // $newUser->name            = $user->name;
            // $newUser->email           = $user->email;
            // $newUser->password       =  Hash::make("test1");
            // // $newUser->google_id       = $user->id;
            // // $newUser->profile_photo_path          =  +"?type=large&access_token=zrqd4621_GnESiR5NEUhvrMTHEw";
            // // $newUser->avatar_original = $user->avatar_original;
            // $newUser->save();

            $sa = User::create([
                'name' => $user->getName(),
                'email' =>  $user->getEmail(),
                'password' => Hash::make("test1"),
            ]);

            Auth::login($sa, true);
            Auth::loginUsingId(Auth::id(), true);
        }
        return redirect()->to('/dashboard');
    }
}
