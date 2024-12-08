@extends('admins.partials.main')

@section('admin-content')
<h2 class="text-lg font-semibold my-4 text-center">Hasil Pencarian untuk: "{{ $query }}"</h2>

{{-- Hasil dari model Submission --}}
@if ($submissions->isNotEmpty())
<h3 class="text-md font-semibold mt-4">Pengajuan</h3>
<div class="overflow-x-auto rounded-md my-2">
    <table class="table-auto w-full text-sm border-collapse border-b border-gray-200 bg-white shadow-sm">
        <thead>
            <tr class="bg-indigo-400 text-white uppercase text-left">
                <th class="border-b border-gray-200 px-4 py-2 w-16">#</th>
                <th class="border-b border-gray-200 px-4 py-2">Judul</th>
                <th class="border-b border-gray-200 px-4 py-2">Waktu Pengajuan</th>
                <th class="border-b border-gray-200 px-4 py-2">Email</th>
                <th class="border-b border-gray-200 px-4 py-2 w-20 text-center">Status</th>
                <th class="border-b border-gray-200 px-4 py-2 w-20 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody class="text-gray-600">
            @foreach ($submissions as $submission)
            <tr class="hover:bg-gray-50">
                <td class="border-b border-gray-200 px-4 py-2 text-center">{{ $loop->iteration }}</td>
                <td class="border-b border-gray-200 px-4 py-2 truncate">{{ $submission->judul }}</td>
                <td class="border-b border-gray-200 px-4 py-2">
                    {{ \Carbon\Carbon::parse($submission->created_at)->format('d F Y') }}
                </td>
                <td class="border-b border-gray-200 px-4 py-2 truncate">
                    {{ $submission->applicants->first()->email }}
                </td>
                <td class="border-b border-gray-200 px-4 py-2 text-center">
                    <span
                        class="px-2 py-1 rounded-full text-sm font-semibold
                              @if ($submission->status == 'proses') bg-yellow-100 text-yellow-600
                              @elseif($submission->status == 'menunggu') bg-gray-100 text-gray-500
                              @elseif($submission->status == 'ditolak') bg-red-100 text-red-600
                              @elseif($submission->status == 'diterima') bg-green-100 text-green-600
                              @elseif($submission->status == 'revisi') bg-orange-100 text-orange-600 @endif">
                        {{ $submission->status }}
                    </span>
                </td>
                <td class="border-b border-gray-200 px-4 py-2 text-center">
                    <a href="{{ route('admin.submission.detail', $submission->uuid) }}"
                        class="block px-4 py-2 text-indigo-600 hover:underline">Detail</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endif

{{-- Hasil dari model Applicant --}}
@if ($applicants->isNotEmpty())
<h3 class="text-md font-semibold mt-8">Pemohon</h3>
<table class="min-w-full text-sm table-auto my-2">
    <thead class="bg-indigo-400 text-white uppercase text-sm">
        <tr>
            <th class="py-3 px-6 text-left">#</th>
            <th class="py-3 px-6 text-left">NIK</th>
            <th class="py-3 px-6 text-left">Nama</th>
            <th class="py-3 px-6 text-left">Email</th>
            <th class="py-3 px-6 text-left">Kontak</th>
            <th class="py-3 px-6 text-left">Aksi</th>
        </tr>
    </thead>
    <tbody class="text-gray-600">
        @foreach ($applicants as $applicant)
        <tr class="border-b bg-white hover:bg-gray-100">
            <td class="py-3 px-6">{{ $loop->iteration }}</td>
            <td class="py-3 px-6">{{ $applicant->nik }}</td>
            <td class="py-3 px-6">{{ $applicant->nama }}</td>
            <td class="py-3 px-6">{{ $applicant->email }}</td>
            <td class="py-3 px-6">{{ $applicant->kontak }}</td>
            <td class="py-3 px-6">
                <a href="{{ route('admin.applicant.detail', $applicant->nik) }}"
                    class="text-indigo-600 hover:underline">Detail</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endif

{{-- Jika tidak ada hasil --}}
@if ($submissions->isEmpty() && $applicants->isEmpty())
<p class="text-gray-500 text-center text-lg my-6">Tidak ada hasil ditemukan.</p>
@endif

@endsection