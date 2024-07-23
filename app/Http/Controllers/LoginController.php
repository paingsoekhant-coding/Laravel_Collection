<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Mockery\CountValidator\AtMost;

class LoginController extends Controller
{
    //login with google
     public function loginWithGoogle()
     {
        return Socialite::driver('google')->redirect();
     }

     public function loginWithGoogleCallback()
     {
        $user = Socialite::driver('google')->user();
        $findUser = User::where('provider_id', $user->id)->first();
        if($findUser){
            Auth::login($findUser);
            return redirect()->route('dashboard');
        }else{
            $user = User::updateOrCreate([
                'email'=> $user->email,
            ],[
                'name'=> $user->name,
                'provider_id'=> $user->id,
                'avatar'=> $user->avatar,
                'password'=> encrypt('123456')

            ]);
            Auth::login($user);
        }

        return redirect()->route('dashboard');
     }


    //  login with github
    public function loginWithGithub()
    {
        return Socialite::driver('github')->redirect();
    }

    public function loginWithGithubCallback()
    {
        $user = Socialite::driver('github')->user();
        $findUser = User::where('provider_id', $user->id)->first();
        if($findUser){
            Auth::login($findUser);
            return redirect()->route('dashboard');
        }else{
            $user = User::updateOrCreate([
                'email'=> $user->email,
            ],[
                'name'=> $user->name,
                'provider_id'=> $user->id,
                'avatar'=> $user->avatar,
                'password'=> encrypt('123456')

            ]);
            Auth::login($user);
        }
        return redirect()->route('dashboard');
    }
}
