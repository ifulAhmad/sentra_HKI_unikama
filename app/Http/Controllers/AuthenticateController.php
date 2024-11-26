<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

class AuthenticateController extends Controller
{
    public function loginPage()
    {
        return view('guest.auth.login');
    }

    public function googleLogin()
    {
        return Socialite::driver('google')->redirect();
    }
    public function googleCallback()
    {
        $googleUser = Socialite::driver('google')->user();

        $user = User::where('google_id', $googleUser->id)->firstOrCreate([
            'nama' => $googleUser->name,
            'username' => Str::slug($googleUser->name),
            'email' => $googleUser->email,
            'google_id' => $googleUser->id,
            'password' => Hash::make('password')
        ]);

        Auth::login(User::where('google_id', $googleUser->id)->first());

        return redirect()->route('profile.index')->with('success', 'Login Berhasil Sebagai ' . $user->name);
    }
}
