<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubmissionController extends Controller
{
    public function index()
    {
        $applicant = Applicant::first();
        if (!$applicant) {
            return redirect()->route('profile.index')->with('error', 'Anda harus melengkapi data profil terlebih dahulu');
        } else {
            return view('users.submission.index', compact('applicant'));
        }
    }

    public function submissionCreate(Request $request)
    {
        // Validasi data submission
        $validatedSubmission = $request->validate([
            'skema' => 'required',
            'judul' => 'required',
            'deskripsi' => 'required',
            'negara' => 'required',
            'kota' => 'required',
        ], [
            'skema.required' => 'Skema harus diisi',
            'judul.required' => 'Judul harus diisi',
            'deskripsi.required' => 'Deskripsi harus diisi',
            'negara.required' => 'Negara harus diisi',
            'kota.required' => 'Kota harus diisi',
        ]);

        // Validasi data applicants
        $validatedApplicant = $request->validate([
            'applicant.nama.*' => 'required|string|max:255',
            'applicant.email.*' => 'required|email',
            'applicant.tgl_lahir.*' => 'required|date',
            'applicant.kontak.*' => 'required|string',
            'applicant.alamat.*' => 'required|string',
            'applicant.kewarganegaraan.*' => 'required|string',
            'applicant.kode_pos.*' => 'required|string',
        ], [
            'applicant.nama.*.required' => 'Nama harus diisi',
            'applicant.email.*.required' => 'Email harus diisi',
            'applicant.tgl_lahir.*.required' => 'Tanggal lahir harus diisi',
            'applicant.kontak.*.required' => 'Kontak harus diisi',
            'applicant.alamat.*.required' => 'alamat harus diisi',
            'applicant.kewarganegaraan.*.required' => 'Kewarganegaraan harus diisi',
            'applicant.kode_pos.*.required' => 'Kode pos harus diisi',
        ]);


        $submission = Submission::create($validatedSubmission);
        foreach ($validatedApplicant['applicant']['nama'] as $index => $nama) {

            $applicant = Applicant::firstOrCreate(
                [
                    'email' => $validatedApplicant['applicant']['email'][$index],
                ],
                [
                    'nama' => $nama,
                    'tgl_lahir' => $validatedApplicant['applicant']['tgl_lahir'][$index],
                    'kontak' => $validatedApplicant['applicant']['kontak'][$index],
                    'alamat' => $validatedApplicant['applicant']['alamat'][$index],
                    'kewarganegaraan' => $validatedApplicant['applicant']['kewarganegaraan'][$index],
                    'kode_pos' => $validatedApplicant['applicant']['kode_pos'][$index],
                    'user_id' => 1
                ]
            );

            DB::table('submission_applicant')->insert([
                'submission_uuid' => $submission->uuid,
                'applicant_id' => $applicant->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        return redirect()->back()->with('success', 'Submission berhasil ditambahkan');
    }
}
