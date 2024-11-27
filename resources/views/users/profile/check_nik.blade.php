@extends('users.partials.main')

@section('users-content')

@if (session()->has('success'))
<div
    class="notif-success fixed end-3 top-28 min-w-[400px] text-sm rounded-md text-green-600 bg-green-100 border border-green-400">
    <div class="relative p-4 flex justify-between gap-2">
        <p class="flex items-center gap-2"><i class="bi bi-check-circle-fill"></i> {{ session()->get('success') }}</p>
        <button type="button" id="notif-success" class="text-xl absolute right-2 text-green-400 bottom-7"><i
                class="bi bi-x"></i></button>
    </div>
</div>
@endif
@if (session()->has('error'))
<div
    class="notif-error fixed end-3 top-28 min-w-[400px] text-sm rounded-md bg-red-100 text-red-600 border border-red-400">
    <div class="relative p-4 flex justify-between gap-2">
        <p class="flex items-center gap-2"><i class="bi bi-exclamation-circle-fill"></i>
            {{ session()->get('error') }}
        </p>
        <button type="button" id="notif-error" class="text-xl absolute right-2 text-red-400 bottom-7"><i
                class="bi bi-x"></i></button>
    </div>
</div>
@endif
<div class="p-4 min-h-64">
    <h1 class="text-lg font-semibold">Lengkapi Form</h1>
    <div class="bg-amber-600 h-[3px] rounded w-28 mt-2 mb-4"></div>
    <form action="{{ route('profile.adjustment.check') }}" method="POST" class="flex justify-center md:mt-10">
        @csrf
        <div class="w-full md:w-[60%]">
            <div class="mb-4">
                <label for="nik" class="font-semibold text-sm ms-3 mb-5">NIK<span
                        class="text-red-600 text-lg">*</span></label>
                <input type="number" id="nik" name="nik"
                    class="border rounded-md w-full border-indigo-200 @error('nik') border-red-400 @enderror py-2 px-3 focus:border-amber-600 outline-0">
                @error('nik')
                <div class="text-red-600 text-sm">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="text-end">
                <button
                    class="py-2 px-4 rounded-lg bg-indigo-600 text-white duration-100 hover:bg-indigo-700">Submit</button>
            </div>
        </div>
    </form>
</div>
<script>
    $(document).ready(function() {
        setTimeout(() => {
            $('.notif-success').fadeOut();
        }, 10000);
        $('#notif-success').click(function() {
            $('.notif-success').addClass('hidden');
        });
        setTimeout(() => {
            $('.notif-error').fadeOut();
        }, 10000);
        $('#notif-error').click(function() {
            $('.notif-error').addClass('hidden');
        });
    });
</script>
@endsection