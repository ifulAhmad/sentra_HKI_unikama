<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use App\Models\Comment;
use Illuminate\Http\Request;

class AdminSubmissionAccessController extends Controller
{
    public function index()
    {
        $submissions = Submission::orderBy('judul', 'asc')->get();
        return view('admins.submission.index', compact('submissions'));
    }
    public function detail(Submission $submission)
    {
        if ($submission->status == 'menunggu') {
            $submission->update(['status' => 'proses']);
        }

        $comments = Comment::where('submission_uuid', $submission->uuid)
            ->with('user')
            ->orderBy('created_at', 'asc')
            ->get();
        $files = $submission->files;
        return view('admins.submission.detail', compact('submission', 'comments', 'files'));
    }

    public function statusRevisi(Submission $submission)
    {
        $submission->update(['status' => 'revisi']);
        return redirect()->back()->with('success', 'Status Berhasil Diubah');
    }
    public function statusDitolak(Submission $submission)
    {
        $submission->update(['status' => 'ditolak']);
        return redirect()->back()->with('success', 'Status Berhasil Diubah');
    }
}
