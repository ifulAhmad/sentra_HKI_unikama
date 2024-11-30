<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Applicant;

class AdminApplicantsAccessController extends Controller
{
    public function index()
    {
        $applicants = Applicant::orderBy('nama', 'asc')->paginate(20);
        return view('admins.applicant.index', compact('applicants'));
    }
    public function detail(Applicant $applicant)
    {
        return view('admins.applicant.detail', compact('applicant'));
    }
}
