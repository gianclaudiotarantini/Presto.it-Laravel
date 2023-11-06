<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Two\GoogleProvider;

class SocialiteController extends Controller
{
    public function login()
    {
    return Socialite::driver('github')->redirect();
    }
    public function callback()
    {
    $githubUser = Socialite::driver('github')->user();
    $user = User::updateOrCreate([
        'email' => $githubUser->email,
        ], [
        'name' => empty($githubUser->name) ? 'user' : $githubUser->name,
        'surname' => empty($githubUser->surname) ? '' : $githubUser->surname,
        'email' => $githubUser->email,
        'password' => Hash::make($githubUser->token),
        ]);
    Auth::login($user);
    return redirect('/');
    
    }

    public function loginGoogle()
    {
        
    return Socialite::driver('google')->redirect();
      //  return Socialite::buildProvider(GoogleProvider::class, config('Services.google'))->redirect();
    }

    public function callbackGoogle()
    {
    $googlehubUser = Socialite::driver('google')->user();
    $user = User::updateOrCreate([
        'email' => $googlehubUser->email,
        ], [
        'name' => $googlehubUser->name,
        'surname' => empty($googlehubUser->surname) ? '' : $googlehubUser->surname,
        'email' => $googlehubUser->email,
        'password' => Hash::make($googlehubUser->token),
        ]);
    Auth::login($user);
    return redirect('/');
    
    }
}
