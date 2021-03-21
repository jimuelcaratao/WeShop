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

        $user = Socialite::driver('facebook')->user();

        $existingUser = User::where('external_id', $user->getId())->first();

        if ($existingUser) {

            Auth::login($existingUser);
        } else {


            $create_user = User::create([
                'name' => $user->getName(),
                'email' =>  $user->getEmail(),
                'external_id' =>  $user->getId(),
                // 'password' => Hash::make("test1"),
            ]);

            Auth::login($create_user, true);
            Auth::loginUsingId(Auth::id(), true);
        }
        return redirect()->to('/dashboard');
    }

    public function callbackGoogle()
    {

        $user = Socialite::driver('google')->user();

        $existingUser = User::where('external_id', $user->getId())->first();

        if ($existingUser) {

            Auth::login($existingUser);
        } else {
            $token = $user->token;

            $create_user = User::create([
                'external_id' => $user->getId(),
                'name' => $user->getName(),
                'email' =>  $user->getEmail(),
                // 'password' => Hash::make("test1"),
            ]);

            Auth::login($create_user, true);
            Auth::loginUsingId(Auth::id(), true);
        }
        return redirect()->to('/dashboard');
    }
}
