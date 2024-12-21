<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Letter;
use Illuminate\Support\Facades\Storage;

class GuestHakCiptaController extends Controller
{
    public function pengenalan()
    {
        return view('guest.hak_cipta.pengenalan');
    }
    public function prosedurPengajuan()
    {
        return view('guest.hak_cipta.prosedur_pengajuan');
    }
    public function syaratLampiran()
    {
        $letters = Letter::all();
        return view('guest.hak_cipta.syarat_lampiran', compact('letters'));
    }
    public function download(Letter $letter)
    {
        return Storage::download($letter->file_letter, $letter->type . '.pdf');
    }
}
