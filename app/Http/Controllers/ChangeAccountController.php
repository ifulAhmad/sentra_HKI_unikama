<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;


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
        $user = auth()->user();
        return view('admins.account.index', compact('user'));
    }
    public function update(Request $request, User $user)
    {
        $request->validate([
            'current_password' => 'required|string',
            'new_password' => 'required|string|min:8|confirmed',
        ]);
        if (!Hash::check($request->current_password, Auth::user()->password)) {
            throw ValidationException::withMessages([
                'current_password' => ['Password lama yang Anda masukkan tidak sesuai.'],
            ]);
        }
        $user->update([
            'password' => Hash::make($request->new_password),
        ]);
        return redirect()->back()->with('success', 'Password berhasil diubah!');
    }
}
