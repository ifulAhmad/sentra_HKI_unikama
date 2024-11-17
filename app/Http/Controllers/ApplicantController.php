<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\User;
use Illuminate\Http\Request;

class ApplicantController extends Controller
{
    public function index()
    {
        $user = User::first();
        $applicant = Applicant::where('user_id', $user->id)->first();
        return view('users.profile.index', compact('user', 'applicant'));
    }
    public function addData(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:applicants,email',
            'kontak' => 'required|min:11|max:13',
            'tgl_lahir' => 'required|date',
            'kewarganegaraan' => 'required',
            'alamat' => 'required',
            'kode_pos' => 'required',
        ], [
            'nama.required' => 'Nama harus diisi',
            'email.required' => 'Email harus diisi',
            'kontak.required' => 'Kontak harus diisi',
            'tgl_lahir.required' => 'Tanggal lahir harus diisi',
            'kewarganegaraan.required' => 'Kewarganegaraan harus diisi',
            'alamat.required' => 'Alamat harus diisi',
            'kode_pos.required' => 'Kode pos harus diisi',
        ]);
        $user = User::first();
        $validatedData['user_id'] = $user->id;
        $validatedData['email'] = $user->email;
        Applicant::create($validatedData);
        $user->nama = $validatedData['nama'];
        $user->update();
        return redirect()->back()->with('success', 'profil berhasil ditambahkan');
    }

    public function updateData(Request $request, Applicant $applicant)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'kontak' => 'required|min:11|max:13',
            'tgl_lahir' => 'required|date',
            'kewarganegaraan' => 'required',
            'alamat' => 'required',
            'kode_pos' => 'required',
        ], [
            'nama.required' => 'Nama harus diisi',
            'kontak.required' => 'Kontak harus diisi',
            'tgl_lahir.required' => 'Tanggal lahir harus diisi',
            'kewarganegaraan.required' => 'Kewarganegaraan harus diisi',
            'alamat.required' => 'Alamat harus diisi',
            'kode_pos.required' => 'Kode pos harus diisi',
        ]);

        $user = User::first();
        $validatedData['user_id'] = $user->id;
        $applicant->fill($validatedData);
        if (!$applicant->isDirty()) {
            return redirect()->back()->with('error', 'tidak ada perubahan');
        }
        $applicant->update($validatedData);
        $user->nama = $validatedData['nama'];
        $user->update();
        return redirect()->back()->with('success', 'profil berhasil diperbarui');
    }
}
