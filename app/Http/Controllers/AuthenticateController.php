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

    // manual login
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|min:8|max:16',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            if (Auth::user()->role == 'admin') {
                $request->session()->regenerate();
                return redirect()->route('admin.dashboard.index')->with('success', 'Login Berhasil Sebagai ' . Auth::user()->nama);
            }
            $request->session()->regenerateToken();
            $request->session()->invalidate();
            Auth::logout();
            return redirect()->back()->with('error', 'Login gagal');
        }
        return redirect()->back()->with('error', 'Username atau Password Salah');
    }

    // google login
    public function googleLogin()
    {
        return Socialite::driver('google')->redirect();
    }
    public function googleCallback(Request $request)
    {
        $googleUser = Socialite::driver('google')->user();
        $user = User::where('google_id', $googleUser->id)->first();
        if ($user) {
            Auth::login($user);
            $request->session()->regenerate();
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
            $request->session()->regenerate();
            return redirect()->route('profile.index')->with('success', 'Login Berhasil Sebagai ' . $newUser->name);
        }
        return redirect()->route('auth.login')->with('Error', 'Terjadi kesalahan saat login');
    }
    // end google login

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->regenerateToken();
        $request->session()->invalidate();
        return redirect()->route('home');
    }
}
