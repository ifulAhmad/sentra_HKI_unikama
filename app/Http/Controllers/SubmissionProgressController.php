<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\CopyrightType;
use App\Models\Submission;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

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
}
