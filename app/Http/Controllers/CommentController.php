<?php

namespace App\Http\Controllers;

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
            'user' => auth()->user()->role,
            'comment' => $validatedComment['comment']
        ]);
        return redirect()->back()->with('success', 'Komentar berhasil ditambahkan!');
    }
}
