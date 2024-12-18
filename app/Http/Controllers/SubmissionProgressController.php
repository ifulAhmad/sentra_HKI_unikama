<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\CopyrightType;
use App\Models\Submission;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Notifications\ClearRevisiFromUserApplicant;
use Illuminate\Support\Facades\Notification;

class SubmissionProgressController extends Controller
{
    public function index()
    {
        $user = User::where('id', auth()->user()->id)->first();
        $applicant = Applicant::where('user_id', $user->id)->first();
        if ($applicant) {
            $submissions = $applicant->submissions;
            return view('users.progress.index', compact('submissions', 'applicant'));
        }
        return redirect()->route('profile.adjustment')->with('error', 'Anda harus melengkapi data profil terlebih dahulu!');
    }

    public function detail(Submission $submission)
    {
        $applicants = $submission->applicants;
        $files = $submission->files;
        $subtype = $submission->subtype;
        $userId = User::where('id', auth()->user()->id)->first()->id;
        $comments = Comment::where('submission_uuid', $submission->uuid)
            ->with('user')
            ->orderBy('created_at', 'asc')
            ->get();
        return view('users.progress.detail_progress', compact('submission', 'applicants', 'files', 'subtype', 'comments'));
    }

    public function submissionEdit(Submission $submission)
    {
        if ($submission->status != 'revisi') {
            return redirect()->route('progress.index')->with('error', 'Akses tidak diberikan!');
        }
        $copyrightTypes = CopyrightType::all();
        return view('users.progress.edit_submission', compact('submission', 'copyrightTypes'));
    }
    public function submissionUpdate(Request $request, Submission $submission)
    {
        $validatedSubmission = $request->validate([
            'skema' => 'required',
            'judul' => 'required',
            'deskripsi' => 'required',
            'publikasi' => 'required|date',
            'negara' => 'required',
            'kota' => 'required',
            'copyright_sub_type_uuid' => 'required'
        ], [
            'skema.required' => 'Skema harus diisi',
            'judul.required' => 'Judul harus diisi',
            'deskripsi.required' => 'Deskripsi harus diisi',
            'publikasi.required' => 'Waktu Publikasi harus diisi',
            'negara.required' => 'Negara harus diisi',
            'kota.required' => 'Kota harus diisi',
            'copyright_sub_type_uuid.required' => 'Jenis hak cipta wajib diisi'
        ]);

        Submission::where('uuid', $submission->uuid)->update($validatedSubmission);
        return redirect()->route('progress.detail', $submission->uuid)->with('success', 'Data pengajuan berhasil diperbarui');
    }
    public function applicantAdd(Submission $submission)
    {
        if ($submission->status != 'revisi') {
            return redirect()->route('progress.index')->with('error', 'Akses tidak diberikan!');
        }
        $applicants = $submission->applicants;
        return view('users.progress.applicant_view', compact('submission', 'applicants'));
    }

    public function checkNik(Request $request, Submission $submission)
    {
        if ($submission->status != 'revisi') {
            return redirect()->route('progress.index')->with('error', 'Akses tidak diberikan!');
        }
        $applicant = Applicant::where('nik', $request->nik)->first();
        if ($applicant) {
            return view('users.progress.add_applicant_data', compact('applicant', 'submission'));
        }
        return view('users.progress.add_applicant_data', ['applicant' => null, 'submission' => $submission]);
    }

    public function applicantStore(Request $request, Submission $submission)
    {
        try {
            $applicantNik = Applicant::where('nik', $request->nik)->first();
            if ($applicantNik) {
                $hasRelation = $submission->applicants->contains($applicantNik->id);
                if ($hasRelation) {
                    return redirect()->back()->with('error', 'Data Pencipta sudah terkait di pengajuan ini!');
                }
                $submission->applicants()->attach($applicantNik);
                return redirect()->route('progress.detail', $submission->uuid)->with('success', 'Pencipta berhasil ditambahkan.');
            } else {
                $validatedApplicant = $request->validate([
                    'nik' => 'required|string|unique:applicants,nik',
                    'nama' => 'required|string|max:255',
                    'email' => 'required|email|unique:applicants,email',
                    'tgl_lahir' => 'required|date',
                    'kontak' => 'required|string',
                    'alamat' => 'required|string',
                    'kewarganegaraan' => 'required|string',
                    'kode_pos' => 'required|string',
                ]);
                $applicant = Applicant::create($validatedApplicant);
                $submission->applicants()->attach($applicant);
                return redirect()->route('progress.detail', $submission->uuid)->with('success', 'Pencipta baru berhasil ditambahkan.');
            }
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan, silakan coba lagi.')->withInput();
        }
    }

    public function filesEdit(Submission $submission)
    {
        if ($submission->status != 'revisi') {
            return redirect()->route('progress.index')->with('error', 'Akses tidak diberikan!');
        }
        $files = $submission->files;
        return view('users.progress.edit_submission_files', compact('submission', 'files'));
    }
    public function filesUpdate(Request $request, Submission $submission)
    {
        $validated = $request->validate([
            'link_ciptaan' => 'nullable|string',
            'file_pernyataan_karya_cipta' => 'nullable|file|mimes:pdf|max:3072',
            'file_pengalihan_karya_cipta' => 'nullable|file|mimes:pdf|max:3072',
            'file_scan_ktp' => 'nullable|file|mimes:pdf|max:3072',
            'file_bukti_pembayaran' => 'nullable|file|mimes:pdf,jpg,png,jpeg|max:3072',
        ]);
        $submission->files->link_ciptaan = $request->input('link_ciptaan', $submission->files->link_ciptaan);
        if ($request->hasFile('file_pernyataan_karya_cipta')) {
            if ($submission->files->file_pernyataan_karya_cipta) {
                Storage::delete($submission->files->file_pernyataan_karya_cipta);
            }
            $path = $request->file('file_pernyataan_karya_cipta')->store('file_pernyataan_karya_cipta');
            $submission->files->file_pernyataan_karya_cipta = $path;
        }

        if ($request->hasFile('file_pengalihan_karya_cipta')) {
            if ($submission->files->file_pengalihan_karya_cipta) {
                Storage::delete($submission->files->file_pengalihan_karya_cipta);
            }
            $path = $request->file('file_pengalihan_karya_cipta')->store('file_pengalihan_karya_cipta');
            $submission->files->file_pengalihan_karya_cipta = $path;
        }

        if ($request->hasFile('file_scan_ktp')) {
            if ($submission->files->file_scan_ktp) {
                Storage::delete($submission->files->file_scan_ktp);
            }
            $path = $request->file('file_scan_ktp')->store('file_scan_ktp');
            $submission->files->file_scan_ktp = $path;
        }

        if ($request->hasFile('file_bukti_pembayaran')) {
            if ($submission->files->file_bukti_pembayaran) {
                Storage::delete($submission->files->file_bukti_pembayaran);
            }
            $path = $request->file('file_bukti_pembayaran')->store('file_bukti_pembayaran');
            $submission->files->file_bukti_pembayaran = $path;
        }
        $submission->files->save();
        return redirect()->route('progress.detail', $submission->uuid)->with('success', 'Data file pengajuan berhasil diperbarui.');
    }

    public function revisiClear(Submission $submission)
    {
        $submission->update(['status' => 'revisi selesai']);
        $admins = User::where('role', 'admin')->get();
        foreach ($admins as $admin) {
            Notification::send($admin, new ClearRevisiFromUserApplicant($submission));
        }
        return back()->with('success', 'Revisi telah diselesaikan.');
    }
}
