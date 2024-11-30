<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Submission;
use App\Models\User;

class CommentController extends Controller
{
    public function store(Request $request, Submission $submission)
    {
        $validatedComment = $request->validate([
            'comment' => 'required',
        ]);
        $submission->comments()->create([
            'user_id' => auth()->user()->id,
            'user_role' => auth()->user()->role,
            'comment' => $validatedComment['comment']
        ]);
        return redirect()->back()->with('success', 'Komentar berhasil ditambahkan!');
    }
    public function delete(Comment $comment)
    {
        Comment::where('uuid', $comment->uuid)->delete();
        return redirect()->back()->with('success', 'Komentar berhasil dihapus!');
    }
}
