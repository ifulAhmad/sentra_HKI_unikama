@extends('users.partials.main')

@section('users-content')
    <div class="p-4">
        <h1 class="text-lg font-semibold">Notifikasi</h1>
        <div class="bg-amber-600 h-[3px] rounded w-28 mt-2 mb-4"></div>

        <div class="mb-4 flex items-center gap-3 justify-between">
            <h4 class="font-semibold">{{ $notifications->count() }} Total Notifikasi</h4>
            <div class="border-b flex-1"></div>
            <div class="flex items-center gap-3">
                @if ($notificationsUnread->count())
                    <form action="{{ route('notification.markAllAsRead') }}" method="post">
                        @csrf
                        <button type="submit" class="text-indigo-600 hover:underline">Mark as Read</button>
                    </form>
                @else
                    <button class="text-indigo-600 opacity-50 disabled:cursor-not-allowed" disabled>Mark as Read</button>
                @endif
                |
                @if ($notifications->count())
                    <form action="{{ route('notification.deleteAllNotif') }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline">Delete All</a>
                    </form>
                @else
                    <button class="text-red-600 opacity-50 disabled:cursor-not-allowed" disabled>Delete All</button>
                @endif
            </div>
        </div>
        @if ($notifications->count())
            @foreach ($notificationsUnread as $notifUnread)
                <a href="{{ $notifUnread->data['link'] }}"
                    class="w-full mb-2 p-3 flex flex-col gap-1 rounded-md shadow-sm border border-amber-100 hover:border-amber-600 text-sm bg-amber-100 text-amber-700">
                    <div>
                        <h3 class="font-semibold">{{ $notifUnread->data['title'] }}</h3>
                        <p class="my-2">{{ $notifUnread->data['body'] }}</p>
                        <div class="">
                            <p class="text-xs text-amber-600"><i>{{ $notifUnread->created_at->diffForHumans() }}</i></p>
                        </div>
                    </div>
                </a>
            @endforeach

            @foreach ($notificationsRead as $notifRead)
                <a href="{{ $notifRead->data['link'] }}"
                    class="w-full mb-2 p-3 flex flex-col gap-1 rounded-md shadow-sm border border-amber-100 hover:border-amber-600 text-sm">
                    <div>
                        <h3 class="font-semibold">{{ $notifRead->data['title'] }}</h3>
                        <p class="my-2">{{ $notifRead->data['body'] }}</p>
                        <div class="">
                            <p class="text-xs text-gray-600"><i>{{ $notifRead->created_at->diffForHumans() }}</i></p>
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
