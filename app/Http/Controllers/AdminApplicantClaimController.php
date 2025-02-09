<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\ClaimApplicantData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
        if (!$applicant) {
            return redirect()->back()->with('error', 'Data pemohon tidak ditemukan.');
        }
        try {
            if ($applicant->user_id == null) {
                $applicant->user_id = $claimData->user_id;
                $applicant->save();
                // accepted
                ClaimApplicantData::where('uuid', $claimData->uuid)->update(['status' => 'approved']);
                Mail::to($applicant->user->email)
                    ->send(new \App\Mail\AdminClaimAccept($applicant));

                // rejected
                $rejectedClaims = ClaimApplicantData::where('applicant_id', $claimData->applicant_id)
                    ->where('uuid', '!=', $claimData->uuid)
                    ->get();
                foreach ($rejectedClaims as $rejectedClaim) {
                    $rejectedClaim->update(['status' => 'rejected']);
                    Mail::to($rejectedClaim->user->email)
                        ->send(new \App\Mail\AdminClaimReject($rejectedClaim));
                }
                return redirect()->route('admin.applicant.index')->with('success', 'Data berhasil Diterima');
            }
        } catch (\Exception $e) {
            throw $e;
            return redirect()->back()->with('error', 'Kesalahan saat mengakses data');
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
                Mail::to($claimData->user->email)
                    ->send(new \App\Mail\AdminClaimReject($claimData));
                return redirect()->back()->with('success', 'Data berhasil ditolak.');
            }

            return redirect()->back()->with('error', 'User ID tidak cocok dengan data pemohon.');
        } catch (\Exception $e) {
            $e->getMessage();
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menolak data.');
        }
    }
}
