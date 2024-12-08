<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Applicant;
use App\Models\Submission;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $currentYear = now()->year;

        $totalApplicants = Applicant::count();
        $totalSubmissions = Submission::count();

        $applicantsThisYear = Applicant::whereYear('created_at', $currentYear)->count();
        $submissionsThisYear = Submission::whereYear('created_at', $currentYear)->count();

        $years = range($currentYear - 5, $currentYear);
        $applicantsPerYear = [];
        $submissionsPerYear = [];

        foreach ($years as $year) {
            $applicantsPerYear[] = Applicant::whereYear('created_at', $year)->count();
            $submissionsPerYear[] = Submission::whereYear('created_at', $year)->count();
        }

        return view('admins.dashboard.index', compact(
            'totalApplicants',
            'totalSubmissions',
            'applicantsThisYear',
            'submissionsThisYear',
            'years',
            'applicantsPerYear',
            'submissionsPerYear'
        ));
    }
}
