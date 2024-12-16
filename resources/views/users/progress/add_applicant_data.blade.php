@extends('users.partials.main')

@section('users-content')
@if (session()->has('error'))
<div
    class="notif-error z-[999] fixed end-3 top-28 min-w-[400px] text-sm rounded-md bg-red-100 text-red-600 border border-red-400">
    <div class="relative p-4 flex justify-between gap-2">
        <p class="flex items-center gap-2"><i class="bi bi-exclamation-circle-fill"></i>
            {{ session()->get('error') }}
        </p>
        <button type="button" id="notif-error" class="text-xl absolute right-2 text-red-400 bottom-7"><i
                class="bi bi-x"></i></button>
    </div>
</div>
@endif
<div class="p-3 md:p-10">
    <h3 class="text-xl font-semibold mb-4">Tambah Applicant</h3>
    @if ($applicant == null)
    <p class="text-amber-600 p-4 rounded-md bg-amber-100 mb-4">Silahkan masukkan data secara manual</p>
    @endif
    @if ($applicant != null)
    <p class="text-amber-600 p-4 rounded-md bg-amber-100 mb-4">Data tersedia dalam sistem, silahkan simpan data
        untuk
        menambahkan pencipta berikut kedalam daftar karya yang anda ajukan.</p>
    @endif
    <form method="POST" action="{{ route('progress.applicantStore', $submission->uuid) }}" class="flex flex-col gap-4">
        @csrf
        <div>
            <label for="nik" class="text-sm font-medium text-gray-700">NIK</label>
            <input type="text" id="nik" name="nik" value="{{ old('nik', $applicant->nik ?? '') }}"
                class="w-full px-3 py-2 border rounded-md outline-0 focus:ring-indigo-500 
                    focus:border-indigo-500 @error('nik') border-red-500 @enderror"
                @if ($applicant && $applicant->nik != null) readonly @endif>
            @error('nik')
            <p class="text-red-500 ms-2">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="nama" class="text-sm font-medium text-gray-700">Nama</label>
            <input type="text" id="nama" name="nama" value="{{ old('nama', $applicant->nama ?? '') }}"
                class="w-full px-3 py-2 border rounded-md outline-0 focus:ring-indigo-500 focus:border-indigo-500 @error('nama') border-red-500 @enderror"
                @if ($applicant && $applicant->nama != null) readonly @endif>
            @error('nama')
            <p class="text-red-500 ms-2">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="email" class="text-sm font-medium text-gray-700">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email', $applicant->email ?? '') }}"
                class="w-full px-3 py-2 border rounded-md outline-0 focus:ring-indigo-500 focus:border-indigo-500 @error('email') border-red-500 @enderror"
                @if ($applicant && $applicant->email != null) readonly @endif>
            @error('email')
            <p class="text-red-500 ms-2">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="tgl_lahir" class="text-sm font-medium text-gray-700">Tanggal Lahir</label>
            <input type="date" id="tgl_lahir" name="tgl_lahir"
                value="{{ old('tgl_lahir', $applicant->tgl_lahir ?? '') }}"
                class="w-full px-3 py-2 border rounded-md outline-0 focus:ring-indigo-500 focus:border-indigo-500 @error('tgl_lahir') border-red-500 @enderror"
                @if ($applicant && $applicant->tgl_lahir != null) readonly @endif>
            @error('tgl_lahir')
            <p class="text-red-500 ms-2">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="kontak" class="text-sm font-medium text-gray-700">Kontak</label>
            <input type="text" id="kontak" name="kontak" value="{{ old('kontak', $applicant->kontak ?? '') }}"
                class="w-full px-3 py-2 border rounded-md outline-0 focus:ring-indigo-500 focus:border-indigo-500 @error('kontak') border-red-500 @enderror"
                @if ($applicant && $applicant->kontak != null) readonly @endif>
            @error('kontak')
            <p class="text-red-500 ms-2">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="kewarganegaraan" class="text-sm font-medium text-gray-700">Kewarganegaraan</label>
            <input type="text" id="kewarganegaraan" name="kewarganegaraan"
                value="{{ old('kewarganegaraan', $applicant->kewarganegaraan ?? '') }}"
                class="w-full px-3 py-2 border rounded-md outline-0 focus:ring-indigo-500 focus:border-indigo-500 @error('kewarganegaraan') border-red-500 @enderror"
                @if ($applicant && $applicant->kewarganegaraan != null) readonly @endif>
            @error('kewarganegaraan')
            <p class="text-red-500 ms-2">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="alamat" class="text-sm font-medium text-gray-700">Alamat</label>
            <textarea id="alamat" name="alamat" rows="3"
                class="w-full px-3 py-2 border rounded-md outline-0 focus:ring-indigo-500 focus:border-indigo-500 @error('alamat') border-red-500 @enderror"
                @if ($applicant && $applicant->alamat != null) readonly @endif>{{ old('alamat', $applicant->alamat ?? '') }}</textarea>
            @error('alamat')
            <p class="text-red-500 ms-2">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="kode_pos" class="text-sm font-medium text-gray-700">Kode Pos</label>
            <input type="text" id="kode_pos" name="kode_pos"
                value="{{ old('kode_pos', $applicant->kode_pos ?? '') }}"
                class="w-full px-3 py-2 border rounded-md outline-0 focus:ring-indigo-500 focus:border-indigo-500 @error('kode_pos') border-red-500 @enderror"
                @if ($applicant && $applicant->kode_pos != null) readonly @endif>
            @error('kode_pos')
            <p class="text-red-500 ms-2">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex justify-end gap-2 mt-4">
            <a href="{{ route('progress.detail', $submission->uuid) }}" class="px-4 py-2 mx-3 bg-gray-300 rounded-md hover:bg-gray-400">Batal</a>
            <button type="submit"
                class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">Simpan</button>
        </div>
    </form>
</div>
<script>
    $(document).ready(function() {
        setTimeout(() => {
            $('.notif-error').fadeOut();
        }, 5000);
        $('#notif-error').click(function() {
            $('.notif-error').addClass('hidden');
        });
    });
</script>
@endsection