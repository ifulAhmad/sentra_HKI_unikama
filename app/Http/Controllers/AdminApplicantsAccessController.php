<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Applicant;

class AdminApplicantsAccessController extends Controller
{
    public function index(Request $request)
    {
        $query = Applicant::query();
        $sort = $request->input('sort');
        if ($sort == 'asc') {
            $query->orderBy('nama', 'asc');
        } else if ($sort == 'desc') {
            $query->orderBy('nama', 'desc');
        } else if ($sort == 'newest') {
            $query->orderBy('created_at', 'desc');
        } else if ($sort == 'oldest') {
            $query->orderBy('created_at', 'asc');
        } else {
            $query->orderBy('nama', 'asc');
        }

        $applicants = $query->paginate(20);
        return view('admins.applicant.index', compact('applicants', 'sort'));
    }
    public function detail(Applicant $applicant)
    {
        return view('admins.applicant.detail', compact('applicant'));
    }
}
