<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Hash;
use PHPUnit\Framework\MockObject\DuplicateMethodException;

class SocialAuthController extends Controller
{

    /**
     * Return a callback method from facebook api.
     *
     * @return callback URL from facebook
     */
    public function callback()
    {

        // add stateless if error
        $user = Socialite::driver('facebook')->stateless()->user();

        $existingUser = User::where('external_id', $user->getId())->first();

        if ($existingUser) {
            Auth::login($existingUser);
            return redirect()->to('/dashboard');
        }

        if ($existingUser === null) {
            try {

                $new_user = User::create([
                    'name' => $user->getName(),
                    'email' =>  $user->getEmail(),
                    'external_id' =>  $user->getId(),
                ]);

                Auth::login($new_user, true);
                return redirect()->to('/dashboard');
            } catch (QueryException $e) {

                $errorCode = $e->errorInfo[1];

                if ($errorCode == '1062') {
                    return redirect()->to('/register')->withErrors('Cannot create a account email is already taken. Please use another email.');
                }
            }
        }
    }

    /**
     * Return a callback method from google api.
     *
     * @return callback URL from google
     */

    public function callbackGoogle()
    {

        $user = Socialite::driver('google')->stateless()->user();

        $existingUser = User::where('external_id', $user->getId())->first();

        // already exist callback need 

        if ($existingUser) {
            Auth::login($existingUser);
            return redirect()->to('/dashboard');
        }

        if ($existingUser === null) {
            try {
                $new_user = User::create([
                    'external_id' => $user->getId(),
                    'name' => $user->getName(),
                    'email' =>  $user->getEmail(),
                ]);

                Auth::login($new_user, true);
                return redirect()->to('/dashboard');
            } catch (QueryException $e) {

                $errorCode = $e->errorInfo[1];

                if ($errorCode == '1062') {
                    return redirect()->to('/register')->withErrors('Cannot create a account email is already taken. Please use another email.');
                }
            }
        }
    }
}
