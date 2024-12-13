<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Applicant;
use App\Models\Certificate;
use App\Models\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CertificateController extends Controller
{
    // description : This function redirects a user to the certificate page and retrieves the certificates of the applicant from their submissions
    public function index()
    {
        $user = User::where('id', auth()->user()->id)->first();
        $applicant = Applicant::where('user_id', $user->id)->first();
        if (!$applicant) {
            return redirect()->route('profile.adjustment')->with('error', 'Anda harus melengkapi data profil terlebih dahulu!');
        }
        $applicantId = Applicant::where('user_id', auth()->user()->id)->first()->id;
        $certificates = Certificate::whereHas('submission', function ($query) use ($applicantId) {
            $query->whereHas('applicants', function ($query) use ($applicantId) {
                $query->where('applicant_id', $applicantId);
            });
        })->get();

        return view('users.sertificate.index', compact('certificates'));
    }

    // description : download certificate file
    public function download(Submission $submission)
    {
        $certificate = Certificate::where('submission_uuid', $submission->uuid)->first();
        if (Storage::exists($certificate->file_certificate)) {
            return Storage::download($certificate->file_certificate, 'Sertifikat-' . $submission->judul . '.pdf');
        } else {
            abort(404, 'File not found');
        }
    }
}
