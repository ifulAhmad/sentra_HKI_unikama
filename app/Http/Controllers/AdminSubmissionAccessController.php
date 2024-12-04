<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Models\Submission;
use App\Models\Comment;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class AdminSubmissionAccessController extends Controller
{
    public function index()
    {
        $submissions = Submission::orderBy('judul', 'asc')->paginate(20);
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
        return redirect()->back()->with('success', 'Status Berhasil Diperbarui');
    }
    public function statusDitolak(Submission $submission)
    {
        $submission->update(['status' => 'ditolak']);
        return redirect()->back()->with('success', 'Status Berhasil Diperbarui');
    }

    public function statusDiterima(Request $request, Submission $submission)
    {
        $validatedData = request()->validate([
            'file_certificate' => 'nullable|mimes:pdf|max:5120',
            'link_certificate' => 'nullable',
        ]);
        try {
            if (request()->hasFile('file_certificate')) {
                $validatedData['file_certificate'] = request()->file('file_certificate')->store('certificate');
            }
            $validatedData['submission_uuid'] = $submission->uuid;
            Certificate::create($validatedData);
            $submission->update(['status' => 'diterima']);
            return redirect()->back()->with('success', 'Sertifikat berhasil diberikan');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menerima data ' . $e->getMessage());
        }
    }
}
