@extends('users.partials.main')

@section('users-content')
<div class="flex justify-center">
    <div class="bg-white w-[90%] min-h-[80vh] rounded-md p-4">
        <h1 class="font-semibold text-lg uppercase">Notifikasi</h1>
        <div class="bg-indigo-600 h-[4px] rounded w-20 mt-2 mb-4"></div>
        <div class="px-12 mb-4 flex items-center gap-3 justify-between">
            <h4 class="font-semibold">{{ $notifications->count() }} Notifikasi</h4>
            <div class="border-b flex-1"></div>
            <div class="flex items-center gap-3">
                @if ($notificationsUnread->count())
                <form action="{{ route('notification.markAllAsRead') }}" method="post">
                    @csrf
                    <button type="submit" class="text-indigo-600 hover:underline">Mark as Read</button>
                </form>
                @else
                <button type="submit" class="text-indigo-600 opacity-50 disabled:cursor-not-allowed" disabled>Mark
                    as Read</button>
                @endif
                |
                @if ($notifications->count())
                <form action="{{ route('notification.deleteAllNotif') }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-600 hover:underline">Delete All</button>
                </form>
                @else
                <button class="text-red-600 opacity-50 disabled:cursor-not-allowed" disabled>Delete All</button>
                @endif
            </div>
        </div>
        @if ($notifications->count())
        <div class="mx-12 text-sm rounded-lg overflow-hidden">
            {{-- unread notifications --}}
            @if ($notificationsUnread->count())
            @foreach ($notificationsUnread as $unread)
            <a href="{{ $unread->data['link'] }}">
                <div
                    class="flex items-center justify-between gap-3 border-b border-indigo-300 bg-indigo-50 p-4 text-indigo-600 hover:border-indigo-500">
                    <div>
                        <h1 class="font-semibold">{{ $unread->data['title'] }}</h1>
                        <p class="font-light ps-2">{!! $unread->data['body'] !!}</p>
                    </div>
                    <div class="text-center">
                        <i class="bi bi-exclamation-circle"></i>
                        <p class="text-xs font-light">{{ $unread->created_at->diffForHumans() }}</p>
                    </div>
                </div>
            </a>
            @endforeach
            @endif

            {{-- read notifications --}}
            @if ($notificationsRead->count())
            @foreach ($notificationsRead as $read)
            <a href="{{ $read->data['link'] }}">
                <div class="flex items-center justify-between border-b gap-3 p-4 hover:border-indigo-300">
                    <div>
                        <h1 class="font-semibold">{{ $read->data['title'] }}</h1>
                        <p class="font-light ps-2">{!! $read->data['body'] !!}</p>
                    </div>
                    <div class="text-center">
                        <i class="bi bi-exclamation-circle"></i>
                        <p class="text-xs font-light">{{ $read->created_at->diffForHumans() }}</p>
                    </div>
                </div>
            </a>
            @endforeach
            @endif
        </div>
        @else
        <div class="text-center my-10 text-lg text-gray-600">
            <p>Tidak ada notifikasi</p>
        </div>
        @endif
    </div>
</div>
@endsection