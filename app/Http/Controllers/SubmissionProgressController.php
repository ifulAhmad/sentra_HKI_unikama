<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\CopyrightType;
use App\Models\Submission;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class SubmissionProgressController extends Controller
{
    public function index()
    {
        $applicant = Applicant::first();
        $submissions = $applicant->submissions;
        $copyrightTypes = CopyrightType::orderby('type', 'asc')->get();
        return view('users.progress.index', compact('submissions', 'applicant', 'copyrightTypes'));
    }

    public function detail(Submission $submission)
    {
        $applicants = $submission->applicants;
        $files = $submission->files;
        $subtype = $submission->subtype;
        $userId = User::first()->id;
        $commentUsers = $submission->comments->where('user_id', $userId);
        return view('users.progress.detail_progress', compact('submission', 'applicants', 'files', 'subtype', 'commentUsers'));
    }
}
