<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\CopyrightType;
use App\Models\User;
use App\Models\Submission;
use App\Models\SubmissionFiles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubmissionController extends Controller
{
    public function index()
    {
        $user = User::where('id', auth()->user()->id)->first();
        $applicant = Applicant::where('user_id', $user->id)->first();
        $copyrightTypes = CopyrightType::all();
        if (!$applicant) {
            return redirect()->route('profile.adjustment')->with('error', 'Anda harus melengkapi data profil terlebih dahulu!');
        } else {
            return view('users.submission.index', compact('applicant', 'copyrightTypes'));
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
            'copyright_sub_type_uuid' => 'required'
        ], [
            'skema.required' => 'Skema harus diisi',
            'judul.required' => 'Judul harus diisi',
            'deskripsi.required' => 'Deskripsi harus diisi',
            'negara.required' => 'Negara harus diisi',
            'kota.required' => 'Kota harus diisi',
            'copyright_sub_type_uuid.required' => 'Jenis hak cipta wajib diisi'
        ]);

        // Validasi data applicants
        $validatedApplicant = $request->validate([
            'applicant.nik.*' => 'required|string',
            'applicant.nama.*' => 'required|string|max:255',
            'applicant.email.*' => 'required|email',
            'applicant.tgl_lahir.*' => 'required|date',
            'applicant.kontak.*' => 'required|string',
            'applicant.alamat.*' => 'required|string',
            'applicant.kewarganegaraan.*' => 'required|string',
            'applicant.kode_pos.*' => 'required|string',
        ], [
            'applicant.nik.*.required' => 'NIK harus diisi',
            'applicant.nama.*.required' => 'Nama harus diisi',
            'applicant.email.*.required' => 'Email harus diisi',
            'applicant.tgl_lahir.*.required' => 'Tanggal lahir harus diisi',
            'applicant.kontak.*.required' => 'Kontak harus diisi',
            'applicant.alamat.*.required' => 'alamat harus diisi',
            'applicant.kewarganegaraan.*.required' => 'Kewarganegaraan harus diisi',
            'applicant.kode_pos.*.required' => 'Kode pos harus diisi',
        ]);

        $rulesFile = [
            'link_ciptaan' => 'required',
            'file_pernyataan_karya_cipta' => 'required|file|mimes:pdf|max:5120',
            'file_pengalihan_karya_cipta' => 'nullable|file|mimes:pdf|max:5120',
            'file_scan_ktp' => 'required|file|mimes:pdf|max:5120',
            'file_bukti_pembayaran' => 'required|file|mimes:pdf,jpg,jpeg,png|max:5120',
        ];

        try {

            $submission = Submission::create($validatedSubmission);

            // save applicant
            try {
                foreach ($validatedApplicant['applicant']['nama'] as $index => $nama) {

                    $applicant = Applicant::firstOrCreate(
                        [
                            'nik' => $validatedApplicant['applicant']['nik'][$index],
                        ],
                        [
                            'nama' => $nama,
                            'email' => $validatedApplicant['applicant']['email'][$index],
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
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data Pemohon.');
            }

            // save submission files
            try {
                $validatedSubmissionFiles = $request->validate($rulesFile);
                $validatedSubmissionFiles['submission_uuid'] = $submission->uuid;
                $fileFields = [
                    'file_pernyataan_karya_cipta',
                    'file_pengalihan_karya_cipta',
                    'file_scan_ktp',
                    'file_bukti_pembayaran',
                ];

                foreach ($fileFields as $field) {
                    if ($request->hasFile($field)) {
                        $validatedSubmissionFiles[$field] = $request->file($field)->store($field, 'public');
                    } else {
                        $validatedSubmissionFiles[$field] = $field === 'file_pengalihan_karya_cipta' ? null : $validatedSubmissionFiles[$field] ?? null;
                    }
                }
                SubmissionFiles::create([
                    'submission_uuid' => $validatedSubmissionFiles['submission_uuid'],
                    'link_ciptaan' => $validatedSubmissionFiles['link_ciptaan'],
                    'file_pernyataan_karya_cipta' => $validatedSubmissionFiles['file_pernyataan_karya_cipta'],
                    'file_pengalihan_karya_cipta' => $validatedSubmissionFiles['file_pengalihan_karya_cipta'],
                    'file_scan_ktp' => $validatedSubmissionFiles['file_scan_ktp'],
                    'file_bukti_pembayaran' => $validatedSubmissionFiles['file_bukti_pembayaran'],
                ]);
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data File.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data.');
        }
        return redirect()->route('progress.index')->with('success', 'Submission berhasil ditambahkan');
    }

    public function checkNik(Request $request)
    {
        $nik = $request->nik;

        // Logika untuk mencari data berdasarkan NIK
        $applicant = Applicant::where('nik', $nik)->first();

        if ($applicant) {
            return response()->json([
                'status' => 'found',
                'data' => [
                    'nik' => $applicant->nik,
                    'nama' => $applicant->nama,
                    'email' => $applicant->email,
                    'kontak' => $applicant->kontak,
                    'tgl_lahir' => $applicant->tgl_lahir,
                    'kewarganegaraan' => $applicant->kewarganegaraan,
                    'alamat' => $applicant->alamat,
                    'kode_pos' => $applicant->kode_pos,
                ],
            ]);
        } else {
            return response()->json([
                'status' => 'not_found',
            ]);
        }
    }
}
