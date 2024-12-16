@extends('admins.partials.main')
@section('admin-content')
    <div class="container mx-auto px-6 py-8 rounded-lg bg-white">
        <!-- Judul Berita -->
        <h1 class="text-xl font-semibold text-indigo-600">{{ $news->title }}</h1>
        <p class="text-sm text-gray-500 italic mt-2 mb-4">{{ \Carbon\Carbon::parse($news->created_at)->format('d F Y') }},
            Administrator sentra HKI UNIKAMA</p>

        <!-- Gambar Utama -->
        @if ($news->image1)
            <div class="mb-4">
                <img src="{{ asset('storage/' . $news->image1) }}" alt="{{ $news->caption1 }}"
                    class="w-full h-96 object-cover rounded-lg shadow-md">
                <p class="mt-2 text-sm text-gray-500 italic">{{ $news->caption1 }}</p>
            </div>
        @endif
        @if ($news->image2)
            <div class="mt-8">
                <img src="{{ asset('storage/' . $news->image2) }}" alt="{{ $news->caption2 }}"
                    class="w-full h-96 object-cover rounded-lg shadow-md">
                <p class="mt-2 text-sm text-gray-500 italic">{{ $news->caption2 }}</p>
            </div>
        @endif
        <div class="prose prose-indigo max-w-none my-4">
            {!! $news->content !!}
        </div>

        <div class="mt-8 flex justify-end">
            <a href="{{ route('admin.news.index') }}"
                class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">
                Kembali ke Berita
            </a>
        </div>
    </div>
@endsection
