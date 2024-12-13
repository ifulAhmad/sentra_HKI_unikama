<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Submission;
use App\Models\User;
use Illuminate\Support\Facades\Notification;
use App\Notifications\CommentFromUserApplicant;

class CommentController extends Controller
{
    public function store(Request $request, Submission $submission)
    {
        $validatedComment = $request->validate([
            'comment' => 'required',
        ]);
        $comment = $submission->comments()->create([
            'user_id' => auth()->user()->id,
            'user_role' => auth()->user()->role,
            'comment' => $validatedComment['comment']
        ]);
        if ($comment->user_role == 'pemohon') {
            $admins = User::where('role', 'admin')->get();
            foreach ($admins as $admin) {
                Notification::send($admin, new CommentFromUserApplicant($comment));
            }
        }

        if ($comment->user_role == 'admin') {
            $applicants = $submission->applicants;
            foreach ($applicants as $applicant) {
                Notification::send($applicant, new CommentFromUserApplicant($comment));
            }
        }

        return redirect()->back()->with('success', 'Komentar berhasil ditambahkan!');
    }
    public function delete(Comment $comment)
    {
        Comment::where('uuid', $comment->uuid)->delete();
        return redirect()->back()->with('success', 'Komentar berhasil dihapus!');
    }
}
