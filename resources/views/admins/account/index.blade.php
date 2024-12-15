@extends('admins.partials.main')

@section('admin-content')
<div class="max-w-md mx-auto bg-white shadow-lg rounded-lg p-6">
    <h2 class="text-lg font-semibold text-gray-700 mb-4">Ubah Password</h2>
    <form method="POST" action="" class="flex flex-col gap-4">
        @csrf

        <!-- Password Lama -->
        <div>
            <label for="current_password" class="text-sm font-medium text-gray-700">Password Lama</label>
            <input type="password" id="current_password" name="current_password" required
                class="w-full px-3 py-2 border rounded-md outline-0 focus:ring-indigo-500 focus:border-indigo-500 @error('current_password') border-red-500 @enderror">
            @error('current_password')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Password Baru -->
        <div>
            <label for="new_password" class="text-sm font-medium text-gray-700">Password Baru</label>
            <input type="password" id="new_password" name="new_password" required
                class="w-full px-3 py-2 border rounded-md outline-0 focus:ring-indigo-500 focus:border-indigo-500 @error('new_password') border-red-500 @enderror">
            @error('new_password')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Konfirmasi Password Baru -->
        <div>
            <label for="new_password_confirmation" class="text-sm font-medium text-gray-700">Konfirmasi Password Baru</label>
            <input type="password" id="new_password_confirmation" name="new_password_confirmation" required
                class="w-full px-3 py-2 border rounded-md outline-0 focus:ring-indigo-500 focus:border-indigo-500">
        </div>

        <!-- Submit Button -->
        <div class="flex justify-end">
            <button type="submit"
                class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>

@endsection