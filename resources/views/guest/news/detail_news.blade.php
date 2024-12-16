@extends('guest.partials.main')

@section('content')
<div class="flex flex-col lg:gap-4 gap-8 lg:flex-row text-gray-800">
    <div class="lg:w-96 w-full bg-white p-4 rounded-lg shadow-lg">
        <h2 class="text-lg font-semibold my-4 border-b-2 pb-4 border-amber-600">Berita Terkini</h2>
        @foreach ($allNews as $item)
        <div class="border-b p-2 my-2">
            <a href="{{ route('news.detail', $item->uuid) }}"
                class="w-full text-amber-600 hover:underline">{{ $item->title }}</a>
        </div>
        @endforeach
    </div>
    <div class="flex-1">
        <div class="flex flex-col gap-2 p-4">
            <h1 class="md:text-3xl text-2xl font-semibold uppercase">{{ $news->title }}</h1>
            <p class="text-sm text-gray-400 flex items-center gap-2 ms-3">
                <span>{{ \Carbon\Carbon::parse($news->created_at)->format('d F Y') }}</span> <i
                    class="bi bi-person-fill"></i> ADMINISTRATOR sentra HKI UNIKAMA
                <!-- <span><i class="bi bi-chat-fill"></i> 0</span> -->
            </p>
        </div>
        @if ($news->image1)
        <div class="mb-4">
            <div class="w-full max-h-[450px] overflow-hidden rounded-lg">
                <img src="{{ asset('storage/' . $news->image1) }}" alt="image-article.jpg"
                    class="w-full h-full object-cover">
            </div>
            <p class="text-gray-600 text-sm ms-4 mt-1">Gambar 1 : <i>{{ $news->caption1 }}</i></p>
        </div>
        @endif
        @if ($news->image2)
        <div class="mb-4">
            <div class="w-full max-h-[450px] overflow-hidden rounded-lg">
                <img src="{{ asset('storage/' . $news->image2) }}" alt="image-article.jpg"
                    class="w-full h-full object-cover">
            </div>
            <p class="text-gray-600 text-sm ms-4 mt-1">Gambar 2 : <i>{{ $news->caption2 }}</i></p>
        </div>
        @endif
        <div class="mb-4">
            <p>{!! $news->content !!}</p>
        </div>
        <div class="text-end">
            <a href="{{ route('news') }}" class="text-amber-600 text-sm hover:underline">
                &laquo; Kembali Ke Daftar Berita</a>
        </div>
    </div>
</div>
@endsection