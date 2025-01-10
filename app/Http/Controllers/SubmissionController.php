<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\CopyrightType;
use App\Models\User;
use App\Models\Submission;
use App\Models\SubmissionFiles;
use App\Models\Letter;
use App\Models\OrderOfCreator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ApplicantSubmissionCreate;


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
        DB::beginTransaction();

        try {
            // Validasi data submission
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

            $validatedOrders = $request->input('order');
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

            // submission create
            $submission = Submission::create($validatedSubmission);

            // applicant
            foreach ($validatedApplicant['applicant']['nama'] as $index => $nama) {
                $applicant = Applicant::firstOrCreate(
                    ['nik' => $validatedApplicant['applicant']['nik'][$index]],
                    [
                        'nama' => $nama,
                        'email' => $validatedApplicant['applicant']['email'][$index] ?? null,
                        'tgl_lahir' => $validatedApplicant['applicant']['tgl_lahir'][$index] ?? null,
                        'kontak' => $validatedApplicant['applicant']['kontak'][$index] ?? null,
                        'alamat' => $validatedApplicant['applicant']['alamat'][$index] ?? null,
                        'kewarganegaraan' => $validatedApplicant['applicant']['kewarganegaraan'][$index] ?? null,
                        'kode_pos' => $validatedApplicant['applicant']['kode_pos'][$index] ?? null,
                    ]
                );

                DB::table('submission_applicant')->insert([
                    'submission_uuid' => $submission->uuid,
                    'applicant_id' => $applicant->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                if (isset($validatedOrders[$index])) {
                    OrderOfCreator::create([
                        'order' => $validatedOrders[$index],
                        'submission_uuid' => $submission->uuid,
                        'applicant_id' => $applicant->id,
                    ]);
                } else {
                    throw new \Exception("Order untuk applicant dengan nama $nama tidak ditemukan.");
                }
            }

            // create file submission
            $validatedSubmissionFiles = $request->validate($rulesFile);
            $validatedSubmissionFiles['submission_uuid'] = $submission->uuid;

            foreach (['file_pernyataan_karya_cipta', 'file_pengalihan_karya_cipta', 'file_scan_ktp', 'file_bukti_pembayaran'] as $field) {
                if ($request->hasFile($field)) {
                    $validatedSubmissionFiles[$field] = $request->file($field)->store($field, 'public');
                }
            }

            SubmissionFiles::create($validatedSubmissionFiles);

            // Send notifications
            $admins = User::where('role', 'admin')->get();
            foreach ($admins as $admin) {
                Notification::send($admin, new ApplicantSubmissionCreate($submission));
            }

            DB::commit();

            return redirect()->route('progress.index')->with('success', 'Pengajuan berhasil ditambahkan');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
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
