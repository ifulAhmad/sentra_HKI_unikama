<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\User;
use Illuminate\Http\Request;

class ApplicantController extends Controller
{
    public function redirect()
    {
        $user = User::where('id', auth()->user()->id)->first();
        $applicant = Applicant::where('user_id', $user->id)->first();
        if ($applicant) {
            return redirect()->route('profile.index');
        }
        return redirect()->route('profile.adjustment');
    }
    public function index()
    {
        $user = User::where('id', auth()->user()->id)->first();
        $applicant = Applicant::where('user_id', $user->id)->first();
        if ($applicant) {
            return view('users.profile.index', compact('applicant'));
        }
        return redirect()->route('profile.adjustment');
    }
    public function adjustment()
    {
        $applicant = Applicant::where('user_id', auth()->user()->id)->first();
        if ($applicant) {
            return redirect()->route('profile.index');
        }
        return view('users.profile.check_nik');
    }
    public function adjustmentCheck(Request $request)
    {
        $validatedData = $request->validate([
            'nik' => 'required|min:16',
        ], [
            'nik.required' => 'NIK harus diisi',
            'nik.min' => 'NIK harus terdiri dari minimal 16 karakter',
        ]);
        $applicant = Applicant::where('nik', $validatedData['nik'])->first();
        if ($applicant) {
            $user = User::where('id', auth()->user()->id)->first();
            return view('users.profile.claim', compact('user', 'applicant'));
        }
        session(['nik' => $validatedData['nik']]);
        return redirect()->route('profile.create');
    }

    public function create()
    {
        $user = User::where('id', auth()->user()->id)->first();

        $nik = session('nik');
        if (!$nik) {
            return redirect()->route('profile.adjustment');
        }
        return view('users.profile.create', compact('nik', 'user'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nik' => 'required|min:16|unique:applicants',
            'nama' => 'required',
            'email' => 'required|email|unique:applicants,email',
            'kontak' => 'required|min:11|max:13',
            'tgl_lahir' => 'required|date',
            'kewarganegaraan' => 'required',
            'alamat' => 'required',
            'kode_pos' => 'required',
        ]);
        $user = User::where('id', auth()->user()->id)->first();
        $validatedData['user_id'] = $user->id;
        $validatedData['email'] = $user->email;
        Applicant::create($validatedData);
        $user->nama = $validatedData['nama'];
        $user->update();
        session()->forget('nik');
        return redirect()->route('profile.index')->with('success', 'profil berhasil ditambahkan');
    }

    public function update(Request $request, Applicant $applicant)
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

        $user = User::where('id', auth()->user()->id)->first();
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
