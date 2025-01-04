<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\DeleteUsers;

class UsersAccessController extends Controller
{
    public function index()
    {
        $users = User::where('role', 'pemohon')->orderBy('created_at', 'desc')->get();
        return view('admins.users_access.index', compact('users'));
    }

    public function delete(Request $request)
    {
        $ids = $request->ids;
        if (empty($ids)) {
            return redirect()->back()->with('error', 'Tidak ada data yang dipilih');
        }
        $users = User::whereIn('id', $ids)->get();
        foreach ($users as $user) {
            Mail::to($user->email)->send(new DeleteUsers($user));
        }
        User::whereIn('id', $ids)->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}
