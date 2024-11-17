@extends('users.partials.main')

@section('users-content')
@if (session()->has('success'))
<div class="notif-success fixed end-3 top-28 min-w-[400px] text-sm rounded-md text-green-600 bg-green-100 border border-green-400">
    <div class="relative p-4 flex justify-between gap-2">
        <p class="flex items-center gap-2"><i class="bi bi-check-circle-fill"></i> {{ session()->get('success') }}</p>
        <button type="button" id="notif-success" class="text-xl absolute right-2 text-green-400 bottom-7"><i
                class="bi bi-x"></i></button>
    </div>
</div>
@endif
@if (session()->has('error'))
<div class="notif-error fixed end-3 top-28 min-w-[400px] text-sm rounded-md bg-red-100 text-red-600 border border-red-400">
    <div class="relative p-4 flex justify-between gap-2">
        <p class="flex items-center gap-2"><i class="bi bi-exclamation-circle-fill"></i> {{ session()->get('error') }}</p>
        <button type="button" id="notif-error" class="text-xl absolute right-2 text-red-400 bottom-7"><i
                class="bi bi-x"></i></button>
    </div>
</div>
@endif
<div class="my-4 p-4">
    <h1 class="text-lg font-semibold">Profil {{ $applicant ? $applicant->nama : $user->nama }}</h1>
    <div class="bg-amber-600 h-[4px] rounded w-28 mt-2 mb-4"></div>
    <div>
        @if ($applicant)
        <form action="{{ route('profile.updateData', $applicant->id) }}" method="post">
            @method('PUT')
            @else
            <form action="{{ route('profile.addData') }}" method="post">
                @endif
                @csrf
                <div class="flex flex-col lg:flex-row gap-3">
                    <div class="flex-1">
                        <div class="flex flex-col mb-4">
                            <label for="nama" class="font-semibold text-sm ms-3 mb-5">Nama<span
                                    class="text-red-600 text-lg">*</span></label>
                            <input type="text" id="nama" name="nama"
                                class="border-b-2 border-indigo-100 @error('nama') border-red-400 @enderror focus:border-amber-600 py-2 px-3 outline-0"
                                placeholder="Nama..." value="{{ $applicant->nama ?? $user->nama }}">
                            @error('nama')
                            <div class="text-red-600 text-sm">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="flex flex-col mb-4">
                            <label for="tgl_lahir" class="font-semibold text-sm ms-3 mb-5">Tanggal Lahir<span
                                    class="text-red-600 text-lg">*</span></label>
                            <input type="date" id="tgl_lahir" name="tgl_lahir"
                                class="border-b-2 border-indigo-100 @error('tgl_lahir') border-red-400 @enderror py-2 px-3 focus:border-amber-600 outline-0"
                                placeholder="06 november 2002"
                                value="{{ old('tgl_lahir', $applicant->tgl_lahir ?? $user->tgl_lahir) }}">
                            @error('tgl_lahir')
                            <div class="text-red-600 text-sm">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="flex-1">
                        <div class="flex flex-col mb-4">
                            <label for="email" class="font-semibold text-sm ms-3 mb-5">Email<span
                                    class="text-red-600 text-lg">*</span></label>
                            <input type="email" id="email" name="email"
                                class="border-b-2 border-indigo-100 @error('email') border-red-400 @enderror py-2 px-3 focus:border-amber-600 outline-0"
                                placeholder="email@gmail.com" value="{{ old('email', $applicant->email ?? $user->email) }}"
                                @if ($applicant) disabled @endif>
                            @error('email')
                            <div class="text-red-600 text-sm">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="flex flex-col mb-4">
                            <label for="kontak" class="font-semibold text-sm ms-3 mb-5">Kontak<span
                                    class="text-red-600 text-lg">*</span></label>
                            <input type="number" id="kontak" name="kontak"
                                class="border-b-2 border-indigo-100 @error('kontak') border-red-400 @enderror py-2 px-3 focus:border-amber-600 outline-0"
                                placeholder="0812xxx..." value="{{ old('kontak', $applicant->kontak ?? '') }}">
                            @error('kontak')
                            <div class="text-red-600 text-sm">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="flex flex-col mb-4">
                    <label for="alamat" class="font-semibold text-sm ms-3 mb-5">Alamat Lengkap<span
                            class="text-red-600 text-lg">*</span></label>
                    <input type="text" id="alamat" name="alamat"
                        class="border-b-2 border-indigo-100 @error('alamat') border-red-400 @enderror py-2 px-3 focus:border-amber-600 outline-0"
                        placeholder="Alamat..." value="{{ old('alamat', $applicant->alamat ?? '') }}">
                    @error('alamat')
                    <div class="text-red-600 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="flex flex-col mb-4">
                    <label for="kewarganegaraan" class="font-semibold text-sm ms-3 mb-5">Kewarganegaraan<span
                            class="text-red-600 text-lg">*</span></label>
                    <input type="text" id="kewarganegaraan" name="kewarganegaraan"
                        class="border-b-2 border-indigo-100 @error('kewarganegaraan') border-red-400 @enderror py-2 px-3 focus:border-amber-600 outline-0"
                        placeholder="kewarganegaraan" value="{{ old('kewarganegaraan', $applicant->kewarganegaraan ?? '') }}">
                    @error('kewarganegaraan')
                    <div class="text-red-600 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="flex flex-col mb-4">
                    <label for="kode_pos" class="font-semibold text-sm ms-3 mb-5">Kode Pos<span
                            class="text-red-600 text-lg">*</span></label>
                    <input type="text" id="kode_pos" name="kode_pos"
                        value="{{ old('kode_pos', $applicant->kode_pos ?? '') }}"
                        class="border-b-2 border-indigo-100 @error('kode_pos') border-red-400 @enderror py-2 px-3 focus:border-amber-600 outline-0">
                    @error('kode_pos')
                    <div class="text-red-600 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="text-end">
                    @if ($applicant)
                    <button
                        class="py-2 px-4 rounded-lg bg-indigo-600 text-white duration-100 hover:bg-indigo-700">Update</button>
                    @else
                    <button
                        class="py-2 px-4 rounded-lg bg-indigo-600 text-white duration-100 hover:bg-indigo-700">Create</button>
                    @endif
                </div>
            </form>
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