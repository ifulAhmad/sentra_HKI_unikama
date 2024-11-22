@extends('users.partials.main')

@section('users-content')
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
@endsection
