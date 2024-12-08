<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Submission;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');
        $submissions = Submission::where('judul', 'like', "%$query%")
            ->orWhere('deskripsi', 'like', "%$query%")
            ->orderBy('created_at', 'desc')
            ->with('applicants')
            ->get();

        $applicants = Applicant::where('nama', 'like', "%$query%")
            ->orWhere('nik', 'like', "%$query%")
            ->orderBy('created_at', 'desc')
            ->with('submissions')
            ->get();

        return view('admins.result', compact('query', 'submissions', 'applicants'));
    }
}
