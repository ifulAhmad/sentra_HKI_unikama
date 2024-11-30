@extends('admins.partials.main')

@section('admin-content')
<div class="bg-indigo-100">
    <div class="bg-white flex justify-between items-center mb-3 p-4 shadow-md rounded-md">
        <h3 class="font-semibold capitalize">Data Pemohon {{ $applicant->nama }}</h3>
        @if (!$applicant->user_id == null)
        <p class="text-sm text-indigo-600">Sudah Terkait ke User &check;</p>
        @else
        <p class="text-sm text-red-600">Belum Terkait ke User &cross;</p>
        @endif
    </div>
    <div class="flex justify-center gap-5 p-3 bg-white rounded-md  mb-3">
        <div class="flex-1">
            <div class="flex items-center gap-5 mb-3">
                <p>Nama</p>
                <h3 class="font-semibold">: {{ $applicant->nama }}</h3>
            </div>
            <div class="flex items-center gap-5 mb-3">
                <p>nik</p>
                <h3 class="font-semibold">: {{ $applicant->nik }}</h3>
            </div>
            <div class="flex items-center gap-5 mb-3">
                <p>email</p>
                <h3 class="font-semibold">: {{ $applicant->email }}</h3>
            </div>
            <div class="flex items-center gap-5 mb-3">
                <p>kontak</p>
                <h3 class="font-semibold">: {{ $applicant->kontak }}</h3>
            </div>
        </div>
        <div class="flex-1">
            <div class="flex items-center gap-5 mb-3">
                <p>Tgl Lahir</p>
                <h3 class="font-semibold">: {{ \Carbon\Carbon::parse($applicant->tgl_lahir)->format('d F Y') }}</h3>
            </div>
            <div class="flex items-center gap-5 mb-3">
                <p>Kewarganegaraan</p>
                <h3 class="font-semibold">: {{ $applicant->kewarganegaraan }}</h3>
            </div>
            <div class="flex items-center gap-5 mb-3">
                <p>Alamat</p>
                <h3 class="font-semibold">: {{ $applicant->alamat }}</h3>
            </div>
        </div>
    </div>
    <div class="bg-white p-3 rounded-md">
        <h3 class="font-semibold mb-3">Sertifikat</h3>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3">
            <a href="#" class="w-full border rounded-md overflow-hidden hover:border-indigo-400"
                id="file2-link">
                <div class="bg-pdf h-[150px] bg-top flex items-end">
                    <div class="bg-indigo-100 w-full p-2 opacity-95">Scan KTP anggota</div>
                </div>
            </a>
            <a href="#" class="w-full border rounded-md overflow-hidden hover:border-indigo-400"
                id="file3-link">
                <div class="bg-pdf h-[150px] bg-top flex items-end">
                    <div class="bg-indigo-100 w-full p-2 opacity-95">Bukti pembayaran</div>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection