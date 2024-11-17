<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use Illuminate\Http\Request;

class SubmissionController extends Controller
{
    public function index()
    {
        $applicant = Applicant::first();

        if (!$applicant) {
            return redirect()->route('profile.index')->with('error', 'Anda harus melengkapi data profil terlebih dahulu');
        } else {
            return view('users.submission.index');
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
            'applicant.kewarganegaraan.*' => 'required|string',
            'applicant.kode_pos.*' => 'required|string',
        ], [
            'applicant.nama.*.required' => 'Nama harus diisi',
            'applicant.email.*.required' => 'Email harus diisi',
            'applicant.tgl_lahir.*.required' => 'Tanggal lahir harus diisi',
            'applicant.kontak.*.required' => 'Kontak harus diisi',
            'applicant.kewarganegaraan.*.required' => 'Kewarganegaraan harus diisi',
            'applicant.kode_pos.*.required' => 'Kode pos harus diisi',
        ]);

        // Menyimpan data submission terlebih dahulu
        dd([
            'skema' => $validatedSubmission['skema'],
            'judul' => $validatedSubmission['judul'],
            'deskripsi' => $validatedSubmission['deskripsi'],
            'negara' => $validatedSubmission['negara'],
            'kota' => $validatedSubmission['kota'],
            'created_at' => now(),
            'updated_at' => now(),
        ], $validatedApplicant);

        // Memproses data applicants
        foreach ($validatedApplicant['applicant']['nama'] as $index => $nama) {
            // Memeriksa jika ada data yang kurang atau tidak sesuai
            if (isset($validatedApplicant['applicant']['email'][$index])) {
                dd([
                    'submission_id' => $submission->id,
                    'nama' => $nama,
                    'email' => $validatedApplicant['applicant']['email'][$index],
                    'tgl_lahir' => $validatedApplicant['applicant']['tgl_lahir'][$index],
                    'kontak' => $validatedApplicant['applicant']['kontak'][$index],
                    'kewarganegaraan' => $validatedApplicant['applicant']['kewarganegaraan'][$index],
                    'kode_pos' => $validatedApplicant['applicant']['kode_pos'][$index],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
