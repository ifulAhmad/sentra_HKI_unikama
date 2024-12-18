@extends('guest.partials.main')

@section('content')
<div class="w-full">

    @if ($news->count())
    <section class="mb-8 p-6 rounded-lg">
        <div class="m-4 flex items-center justify-between">
            <h1 class="text-xl font-semibold">Semua Berita</h1>
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
        <div class="p-4 flex justify-end">
            {{ $news->links() }}
        </div>
    </section>
    @else
    <div class="text-center my-10">
        <p class="text-gray-600 text-lg">Tidak ada berita</p>
    </div>
    @endif
</div>
@endsection