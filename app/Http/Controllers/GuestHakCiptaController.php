<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    public function pengajuan()
    {
        return view('guest.hak_cipta.pengajuan');
    }
    public function jenisCiptaan()
    {
        return view('guest.hak_cipta.jenis_ciptaan');
    }
    public function syaratLampiran()
    {
        return view('guest.hak_cipta.syarat_lampiran');
    }
}
