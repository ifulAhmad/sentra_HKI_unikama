@extends('guest.partials.main')

@section('content')
<div class="w-full">
    <section class="md:flex-row flex items-center justify-center flex-col gap-8 mb-8">
        <div class="text-center flex-1">
            <div class="w-full h-auto rounded-3xl overflow-hidden">
                <img src="{{ asset('assets/images/hero-hki-sementara-2.jpg') }}" alt="hero-image.jpg" width="100%">
            </div>
        </div>
        <div class="text-start w-full flex-1">
            <div class="rounded-lg p-3">
                <h1 class="md:text-4xl text-3xl font-bold text-gray-800 flex flex-col gap-2">
                    <p>Ajukan</p>
                    <p>Kekayaan Intelektualmu!</p>
                </h1>
                <div class="bg-gray-800 h-[4px] rounded my-8"></div>
                <a href="{{ route('submission.index') }}"
                    class="px-5 py-3 rounded-2xl border-2 border-amber-600 text-lg text-gray-700 font-bold duration-200 hover:bg-amber-600 hover:text-white">Ajukan
                    &raquo;</a>
            </div>
        </div>
    </section>

    @if ($news->count())
    <section class="mb-8 p-6 rounded-lg">
        <div class="m-4 flex items-center justify-between">
            <h1 class="text-xl font-semibold">Berita Terbaru</h1>
            <a href="{{ route('news') }}" class="p-2 text-indigo-600 text-sm rounded-md hover:underline">Semua
                Berita &raquo;</a>
        </div>
        <div class="grid md:grid-cols-4 grid-cols-1 items-center justify-center gap-4">
            <!-- items -->
            @foreach ($news as $n)
            <div class="h-full p-3 rounded-lg bg-white shadow-lg border">
                <a href="{{ route('news.detail', $n->uuid) }}" class="text-gray-800 hover:text-amber-600">
                    @if ($n->image1)
                    <div class="w-full h-[180px]">
                        <img src="{{ asset('storage/' . $n->image1) }}" alt="image-article.jpg"
                            class="w-full h-full rounded-lg">
                    </div>
                    @else
                    <div class="w-full h-[180px] bg-white flex items-center justify-center">
                        <p class="text-gray-400 text-lg">NOTHING IMAGE</p>
                    </div>
                    @endif
                    <h1 class="font-semibold my-2">{{ $n->title }}</h1>
                </a>
                <div class="my-2">
                    <p class="text-xs text-gray-400 flex items-center gap-2">
                        <span>{{ \Carbon\Carbon::parse($n->created_at)->format('d F Y') }}</span> <i
                            class="bi bi-person-fill"> </i>
                        <!-- <span><i class="bi bi-chat-fill"></i> 0</span> -->
                    </p>
                </div>
                <div class="text-end">
                    <a href="{{ route('news.detail', $n->uuid) }}"
                        class="text-amber-600 text-sm hover:underline">Baca Selengkapnya
                        &raquo;</a>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    @endif
</div>

@endsection