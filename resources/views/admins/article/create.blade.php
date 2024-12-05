@extends('admins.partials.main')

@section('admin-content')
    <div class="container mx-auto p-5">
        <!-- Header -->
        <div class="text-center mb-10">
            <h1 class="text-3xl font-bold text-gray-800">Buat Artikel Baru</h1>
            <p class="text-gray-600">Isi form berikut untuk membuat artikel baru</p>
        </div>

        <!-- Form Create Article -->
        <div class="max-w-4xl mx-auto bg-white p-6 shadow-md rounded-lg">
            <form action="" method="POST">
                @csrf

                <!-- Judul Artikel -->
                <div class="mb-4">
                    <label for="image" class="block text-gray-700 font-semibold mb-2">Gambar Artikel</label>
                    <input type="file" id="image" name="image"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        required value="{{ old('image') }}">
                    @error('image')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="title" class="block text-gray-700 font-semibold mb-2">Judul Artikel</label>
                    <input type="text" id="title" name="title"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        required value="{{ old('title') }}">
                    @error('title')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Konten Artikel -->
                <div class="mb-4">
                    <label for="content" class="block text-gray-700 font-semibold mb-2">Konten Artikel</label>
                    <input id="x" value="Editor content goes here" type="hidden" name="content">
                    <trix-editor input="x" class="h-40"></trix-editor>
                    @error('content')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Tombol Submit -->
                <div class="flex justify-end">
                    <button type="submit"
                        class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Buat
                        Artikel</button>
                </div>
            </form>
        </div>
    </div>
@endsection
