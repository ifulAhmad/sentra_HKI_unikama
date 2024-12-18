@extends('admins.partials.main')

@section('admin-content')
@if (session()->has('success'))
<div
    class="notif-success z-[999] fixed end-3 top-20 min-w-[400px] text-sm rounded-md text-green-600 bg-green-100 border border-green-400">
    <div class="relative p-4 flex justify-between gap-2">
        <p class="flex items-center gap-2"><i class="bi bi-check-circle-fill"></i> {{ session()->get('success') }}</p>
        <button type="button" id="notif-success" class="text-xl absolute right-2 text-green-400 bottom-7"><i
                class="bi bi-x"></i></button>
    </div>
</div>
@endif
@if (session()->has('error'))
<div
    class="notif-error fixed end-3 top-20 min-w-[400px] text-sm rounded-md bg-red-100 text-red-600 border border-red-400">
    <div class="relative p-4 flex justify-between gap-2">
        <p class="flex items-center gap-2"><i class="bi bi-exclamation-circle-fill"></i>
            {{ session()->get('error') }}
        </p>
        <button type="button" id="notif-error" class="text-xl absolute right-2 text-red-400 bottom-7"><i
                class="bi bi-x"></i></button>
    </div>
</div>
@endif

<div class="bg-indigo-100 mb-5">
    <div class="bg-white flex gap-5 items-center mb-3 p-4 shadow-md rounded-md">
        <h3 class="font-semibold capitalize">Status Data Pencipta: </h3>
        @if (!$applicant->user_id == null)
        <p class="text-sm text-indigo-600">Sudah terkait dengan pengguna</p>
        @else
        <p class="text-sm text-red-600">Belum terkait dengan pengguna manapun</p>
        @endif
    </div>
    <div class="p-3 bg-white rounded-md mb-3">
        <h3 class="font-semibold mb-3">NOTE;</h3>
        <p class="ms-3">Pengguna baru dengan email <span class="font-semibold">{{ $claimData->user->email }}</span>,
            ingin mengajukan klaim data pencipta yang sudah terdaftar sebelumnya di sistem dengan NIK <span
                class="font-semibold">{{ $claimData->applicant->nik }}</span>, Informasi lengkap terkait data pencipta
            dapat Anda lihat di bawah ini.</p>
    </div>
    <div class="p-3 bg-white rounded-md mb-3">
        <h3 class="font-semibold mb-3">Data yang ingin diklaim;</h3>
        <div class="flex justify-center gap-5">
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
    </div>
    <div class="bg-white p-3 rounded-md mb-3">
        <h3 class="font-semibold mb-3">Scan KTP sebagai bukti kepemilikan data</h3>
        <div class="flex justify-center ">
            @php
            $filePath = $claimData->file_scan_ktp ?? null;
            $fileExtension = $filePath ? pathinfo($filePath, PATHINFO_EXTENSION) : null;
            @endphp
            @if ($fileExtension === 'pdf')
            <iframe src="{{ asset('storage/' . $claimData->file_scan_ktp) }}" class="w-3/4 h-96 border rounded"
                frameborder="0">
            </iframe>
            @elseif (in_array($fileExtension, ['jpg', 'jpeg', 'png']))
            <img src="{{ asset('storage/' . $claimData->file_scan_ktp) }}" alt="Scan KTP"
                class="w-3/4 object-contain rounded">
            @else
            <p class="text-red-500">File tidak dapat ditampilkan. Pastikan formatnya PDF atau gambar.</p>
            @endif
        </div>
    </div>
    <div class="flex justify-end items-center gap-3 mb-5">

        @if ($claimData->status != 'rejected')
        <form action="{{ route('admin.claim.reject', $claimData->uuid) }}" method="post">
            @csrf
            <button type="submit"
                class="px-4 py-2 text-sm rounded-md bg-red-600 duration-200 text-white hover:bg-red-700 disabled:cursor-not-allowed disabled:opacity-50"
                onclick="return confirm('Apakah Anda yakin ingin menolak permohonan ini?')"
                @if ($claimData->status == 'approved' || $claimData->status == 'rejected') disabled @endif>
                Tolak permohonan
            </button>
        </form>

        <form action="{{ route('admin.claim.accept', $claimData->uuid) }}" method="post">
            @csrf
            <button type="submit"
                class="px-4 py-2 text-sm rounded-md bg-indigo-600 duration-200 text-white hover:bg-indigo-700"
                onclick="return confirm('Apakah Anda yakin ingin menerima permohonan ini?')">
                Terima permohonan
            </button>
        </form>
        @endif
    </div>
</div>

<script>
    $(document).ready(function() {
        setTimeout(() => {
            $('.notif-success').fadeOut();
        }, 5000);
        $('#notif-success').click(function() {
            $('.notif-success').addClass('hidden');
        });
        setTimeout(() => {
            $('.notif-error').fadeOut();
        }, 5000);
        $('#notif-error').click(function() {
            $('.notif-error').addClass('hidden');
        });
    });
</script>
@endsection