@extends('users.partials.main')

@section('users-content')
<div class="p-4 min-h-80">
    <h1 class="text-lg font-semibold">Sertifikat Anda</h1>
    <div class="bg-amber-600 h-[3px] rounded w-28 mt-2 mb-4"></div>

    @if ($certificates->count())
    @foreach ($certificates as $certificate)
    @if ($certificate->file_certificate)
    <!-- files -->
    <h3 class="ms-4 my-4 font-semibold">File Sertifikat : </h3>
    <div class="grid grid-cols-2 md:grid-cols-3 gap-3 text-sm">
        <a href="{{ route('certificate.download', $certificate->submission->uuid) }}"
            class=" w-full border-2 border-indigo-200 rounded-md overflow-hidden duration-200 hover:bg-indigo-600 hover:text-white hover:border-indigo-600">
            <div class="w-full p-3 flex items-center justify-between gap-2">
                <p>{{ $certificate->submission->judul }}.pdf</p>
                <p><i class="bi bi-download"></i></p>
            </div>
        </a>
    </div>
    @endif
    <hr class="w-full my-5">
    @if ($certificate->link_certificate)
    {{-- links --}}
    <h3 class="ms-4 my-4 font-semibold">File Sertifikat</h3>
    <a href="{{ $certificate->link_certificate }}" target="_blank" class="text-indigo-600 p-3 hover:underline">link
        {{ $certificate->submission->judul }}</a>
    @endif
    @endforeach
    @else
    <div class="text-center">
        <p class="text-lg my-10">Belum ada sertifikat</p>
    </div>
    @endif
</div>
@endsection