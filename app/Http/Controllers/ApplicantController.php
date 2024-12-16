<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\User;
use App\Models\ClaimApplicantData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Notifications\RequestFromUserForClaimApplicantData;

class ApplicantController extends Controller
{
    // description: this function is check a user have applicant or not if not then redirect to adjustment and user have applicant then redirect to profile
    public function redirect()
    {
        $user = User::where('id', auth()->user()->id)->first();
        $claimPending = ClaimApplicantData::where('user_id', $user->id)->where('status', 'pending')->first();
        if ($claimPending) {
            return redirect()->route('claim.wait', $claimPending->uuid)->with('warning', 'Anda harus menunggu verifikasi data!');
        } else {
            $applicant = Applicant::where('user_id', $user->id)->first();
            if ($applicant) {
                return redirect()->route('profile.index');
            }
        }
        return redirect()->route('profile.adjustment');
    }

    // description: this function is check a user have applicant or not if user have applicant then redirect to profile
    public function index()
    {
        $user = User::where('id', auth()->user()->id)->first();
        $claimPending = ClaimApplicantData::where('user_id', $user->id)->where('status', 'pending')->first();
        if ($claimPending) {
            return redirect()->route('claim.wait', $claimPending->uuid)->with('warning', 'Anda harus menunggu verifikasi data!');
        } else {
            $applicant = Applicant::where('user_id', $user->id)->first();
            if ($applicant) {
                return view('users.profile.index', compact('applicant'));
            }
        }
        return redirect()->route('profile.adjustment');
    }

    // description: this function is check a nik from applicant if nik already exists then redirect to claim
    public function adjustment()
    {
        $claimPending = ClaimApplicantData::where('user_id', auth()->user()->id)->where('status', 'pending')->first();
        if ($claimPending) {
            return redirect()->route('claim.wait', $claimPending->uuid)->with('warning', 'Anda harus menunggu verifikasi data!');
        } else {
            $applicant = Applicant::where('user_id', auth()->user()->id)->first();
            if ($applicant) {
                return redirect()->route('profile.index');
            }
        }
        $claimReject = ClaimApplicantData::where('user_id', auth()->user()->id)->where('status', 'rejected')->get();
        return view('users.profile.check_nik', compact('claimReject'));
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
            return redirect()->route('claim.index', $applicant->nik);
        }
        session(['nik' => $validatedData['nik']]);
        return redirect()->route('profile.create');
    }

    // claim
    // description: this function redirect a user to claim
    public function claim(Applicant $applicant)
    {
        $user = User::where('id', auth()->user()->id)->first();
        return view('users.profile.claim', compact('user', 'applicant'));
    }
    public function claimStore(Request $request, Applicant $applicant)
    {
        $validatedData = $request->validate([
            'file_scan_ktp' => 'required|file|mimes:png,jpg,jpeg,pdf|max:1024',
        ]);
        if ($applicant->user_id == null) {
            $validatedData['user_id'] = auth()->user()->id;
            $validatedData['applicant_id'] = $applicant->id;
            if ($request->hasFile('file_scan_ktp')) {
                $validatedData['file_scan_ktp'] = $request->file('file_scan_ktp')->store('claim-files');
            }
            $validatedData['status'] = 'pending';
            $claim = ClaimApplicantData::create($validatedData);
            $admins = User::where('role', 'admin')->get();
            foreach ($admins as $admin) {
                Notification::send($admin, new RequestFromUserForClaimApplicantData($claim));
            }
            return redirect()->route('claim.wait', $claim->uuid)->with('success', 'Klaim berhasil diajukan');
        }
        return redirect()->route('profile.adjustment')->with('error', 'Data sudah diklaim oleh user lain. Hubungi HKI untuk informasi lebih lanjut');
    }
    // description: this function redirect a user to pending page if claim is not approved
    public function claimWait(ClaimApplicantData $claim)
    {
        if ($claim->status == 'approved') {
            return redirect()->route('profile.index');
        }
        return view('users.profile.pending_view', compact('claim'));
    }

    // description: this function redirect a user to create profile if he check nik and nik not exists from applicant
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

    // description: this function redirect a user to edit profile if he have profile from applicant data
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
