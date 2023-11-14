<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Arr;

class GoogleController extends Controller
{
    /**
     * Redirects to Google Oauth login
     **/
    public function redirectTo(Request $request)
    {
        return Socialite::driver('google')->redirect();
    }
    /**
     * Webhook: Callback after sucessful login
     **/
    public function callback(Request $request)
    {
        $googleUser = Socialite::driver('google')->user();
        if (!empty($googleUser)) {
            // User find or create PS: Cleaner way is repository pattern but cannot do it due to the limitation of time
            $googleEmail = Arr::get($googleUser, 'email');
            $user = User::where('email', $googleEmail)->first();
            if (empty($user)) {
                // build user properties
                $properties = [
                    'avatar' => $googleUser->avatar
                ];
                // create user
                $user = User::create([
                    'name' => Arr::get($googleUser, 'name'),
                    'email' => $googleEmail,
                    'google_id' => Arr::get($googleUser, 'id'),
                    'google_access_token' => $googleUser->token,
                    'google_refresh_token' => $googleUser->refreshToken,
                    'google_expires_in' => $googleUser->expiresIn,
                    'properties' => $properties
                ]);
            }
            else {
                // update token
                $user->update([
                    'google_access_token' => $googleUser->token,
                    'google_refresh_token' => $googleUser->refreshToken,
                    'google_expires_in' => $googleUser->expiresIn,
                ]);
            }
            // login user && redirect to deliveries.index
            auth()->login($user);
            return redirect( route('deliveries.index') );
        }
        // default: redirect, it should be error response or something
        return redirect( route('home') );
    }
}
