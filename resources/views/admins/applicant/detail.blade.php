@extends('admins.partials.main')

@section('admin-content')
<div class="bg-indigo-100">
    <div class="bg-white flex justify-between items-center mb-3 p-4 shadow-md rounded-md">
        <h3 class="font-semibold capitalize">Data Pemohon {{ $applicant->nama }}</h3>
        @if (!$applicant->user_id == null)
        <p class="text-sm text-indigo-600">&check; Sudah Terkait ke User</p>
        @else
        <p class="text-sm text-red-600">&cross; Belum Terkait ke User</p>
        @endif
    </div>
    <div class="max-w-4xl mx-auto bg-gradient-to-r from-blue-50 via-white to-blue-50 p-6 rounded-lg shadow-lg border border-gray-200">
        <h2 class="text-xl font-bold text-center text-blue-600 mb-5">Detail Data Pemohon</h2>
        <div class="grid grid-cols-1">
            <div class="flex items-center gap-3 mb-4">
                <p class="w-28 text-gray-600 font-medium">Nama</p>
                <h3 class="font-semibold text-gray-800">: {{ $applicant->nama }}</h3>
            </div>
            <div class="flex items-center gap-3 mb-4">
                <p class="w-28 text-gray-600 font-medium">NIK</p>
                <h3 class="font-semibold text-gray-800">: {{ $applicant->nik }}</h3>
            </div>
            <div class="flex items-center gap-3 mb-4">
                <p class="w-28 text-gray-600 font-medium">Email</p>
                <h3 class="font-semibold text-gray-800">: {{ $applicant->email }}</h3>
            </div>
            <div class="flex items-center gap-3 mb-4">
                <p class="w-28 text-gray-600 font-medium">Kontak</p>
                <h3 class="font-semibold text-gray-800">: {{ $applicant->kontak }}</h3>
            </div>

            <div class="flex items-center gap-3 mb-4">
                <p class="w-28 text-gray-600 font-medium">Tgl Lahir</p>
                <h3 class="font-semibold text-gray-800">: {{ \Carbon\Carbon::parse($applicant->tgl_lahir)->format('d F Y') }}</h3>
            </div>
            <div class="flex items-center gap-3 mb-4">
                <p class="w-28 text-gray-600 font-medium">Nationality</p>
                <h3 class="font-semibold text-gray-800">: {{ $applicant->kewarganegaraan }}</h3>
            </div>
            <div class="flex items-center gap-3 mb-4">
                <p class="w-28 text-gray-600 font-medium">Alamat</p>
                <h3 class="font-semibold text-gray-800">: {{ $applicant->alamat }}</h3>
            </div>
        </div>

        <div class="mt-5 text-center">
            <a href="{{ route('admin.applicant.index') }}" class="px-6 py-2 bg-blue-500 text-white font-medium rounded-md hover:bg-blue-600 focus:ring focus:ring-blue-300">Kembali</a>
        </div>
    </div>


</div>
@endsection