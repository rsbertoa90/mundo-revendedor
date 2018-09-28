<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;

class FacebookUserController extends Controller
{

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
        $user = SocialUser::findOrCreate(Socialite::driver('facebook')->user());
        auth()->login($user);
        return redirect()->to('/home');
    }


}
