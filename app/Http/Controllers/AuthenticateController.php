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
        $user = User::where('google_id', $googleUser->id)->first();
        if ($user) {
            Auth::login($user);
            return redirect()->route('profile.index')->with('success', 'Login Berhasil Sebagai ' . $user->nama);
        } else {
            $newUser = User::create([
                'nama' => $googleUser->name,
                'username' => Str::slug($googleUser->name),
                'email' => $googleUser->email,
                'google_id' => $googleUser->id,
                'password' => Hash::make('password')
            ]);
            Auth::login($newUser);
            return redirect()->route('profile.index')->with('success', 'Login Berhasil Sebagai ' . $newUser->name);
        }
        return redirect()->route('auth.login')->with('Error', 'Terjadi kesalahan saat login');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('home');
    }
}
