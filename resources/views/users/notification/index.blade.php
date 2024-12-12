@extends('users.partials.main')

@section('users-content')
    <div class="p-4">
        <h1 class="text-lg font-semibold">Feedback</h1>
        <div class="bg-amber-600 h-[3px] rounded w-28 mt-2 mb-4"></div>

        <div class="mb-4 flex items-center gap-3 justify-between">
            <h4 class="font-semibold">{{ $notificationsUnread->count() }} Notifikasi</h4>
            <div class="border-b flex-1"></div>
            <div class="flex items-center gap-3">
                <a href="#" class="text-indigo-600 hover:underline">Mark as Read</a>
                |
                <a href="#" class="text-red-600 hover:underline">Delete All</a>
            </div>
        </div>
        @if ($notificationsUnread->count())
            @foreach ($notificationsUnread as $notif)
                <a href="{{ $notif->data['link'] }}"
                    class="w-full mb-2 p-3 flex flex-col gap-1 rounded-md shadow-sm border border-amber-100 hover:border-amber-600 text-sm bg-amber-100 text-amber-700">
                    <div>
                        <h3 class="font-semibold">{{ $notif->data['title'] }}</h3>
                        <p class="my-2">{{ $notif->data['body'] }}</p>
                        <div class="">
                            <p class="text-xs text-amber-600"><i>{{ $notif->created_at->diffForHumans() }}</i></p>
                        </div>
                    </div>
                </a>
            @endforeach
        @else
            <div class="text-center my-10 text-lg text-gray-600">
                <p>Tidak Ada Notifikasi</p>
            </div>
        @endif
    </div>
@endsection
