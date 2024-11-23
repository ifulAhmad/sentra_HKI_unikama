<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Submission;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class SubmissionProgressController extends Controller
{
    public function index()
    {
        $applicant = Applicant::first();
        $submissions = $applicant->submissions;
        return view('users.progress.index', compact('submissions', 'applicant'));
    }

    public function detail(Submission $submission)
    {
        $applicants = $submission->applicants;
        $files = $submission->files;
        $subtype = $submission->subtype;
        return view('users.progress.detail_progress', compact('submission', 'applicants', 'files', 'subtype'));
    }
}
