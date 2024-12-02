<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\ClaimApplicantData;
use Illuminate\Http\Request;

class AdminApplicantClaimController extends Controller
{
    public function index()
    {
        $claimDatas = ClaimApplicantData::whereIn('status', ['pending', 'rejected'])->orderBy('created_at', 'desc')->paginate(20);
        return view('admins.claim.index', compact('claimDatas'));
    }
    public function detail(ClaimApplicantData $claimData)
    {
        $applicant = Applicant::where('id', $claimData->applicant_id)->first();
        return view('admins.claim.detail', compact('claimData', 'applicant'));
    }
    public function accept(ClaimApplicantData $claimData)
    {
        $applicant = Applicant::find($claimData->applicant_id);
        try {
            if ($applicant->user_id == null) {
                $applicant->user_id = $claimData->user_id;
                $applicant->save();
                ClaimApplicantData::where('uuid', $claimData->uuid)->update(['status' => 'approved']);
                return redirect()->route('admin.applicant.index')->with('success', 'Data berhasil Diterima');
            }
        } catch (\Exception $e) {
            throw $e;
        }
        return redirect()->route('admin.applicant.index')->with('error', 'Terjadi kesalahan saat menerima data');
    }

    public function reject(ClaimApplicantData $claimData)
    {
        $applicant = Applicant::find($claimData->applicant_id);

        if (!$applicant) {
            return redirect()->back()->with('error', 'Data pemohon tidak ditemukan.');
        }

        try {
            if ($applicant->user_id == null) {
                ClaimApplicantData::where('uuid', $claimData->uuid)->update(['status' => 'rejected']);
                return redirect()->back()->with('success', 'Data berhasil ditolak.');
            }

            return redirect()->back()->with('error', 'User ID tidak cocok dengan data pemohon.');
        } catch (\Exception $e) {
            $e->getMessage();
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menolak data.');
        }
    }
}
