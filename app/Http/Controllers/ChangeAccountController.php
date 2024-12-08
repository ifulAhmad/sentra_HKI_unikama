<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ChangeAccountController extends Controller
{
    public function formCheck()
    {
        if (Session::has('password_verified')) {
            return redirect()->route('admin.account.index');
        }
        return view('admins.account.check_password');
    }

    public function checkPassword(Request $request)
    {
        $request->validate(['password' => 'required']);

        $user = Auth::user();
        if (Hash::check($request->password, $user->password)) {
            Session::put('password_verified', true);
            return redirect()->route('admin.account.index');
        }
        return redirect()->back()->with('error', 'Password salah');
    }

    public function index()
    {
        if (!Session::has('password_verified')) {
            return redirect()->route('admin.account.check');
        }
        return view('admins.account.index');
    }
}
