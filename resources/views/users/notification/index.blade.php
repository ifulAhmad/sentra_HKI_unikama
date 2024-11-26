@extends('users.partials.main')

@section('users-content')
<div class="p-4">
    <h1 class="text-lg font-semibold">Feedback</h1>
    <div class="bg-amber-600 h-[3px] rounded w-28 mt-2 mb-4"></div>

    <div class="mb-4 flex items-center gap-3 justify-between">
        <h4 class="font-semibold">2 Notifikasi</h4>
        <div class="border-b flex-1"></div>
        <div class="flex items-center gap-3">
            <a href="#" class="text-indigo-600 hover:underline">Mark as Read</a>
            |
            <a href="#" class="text-red-600 hover:underline">Delete All</a>
        </div>
    </div>

    <a href="{{ route('notification.detail') }}"
        class="w-full mb-2 p-3 flex flex-col gap-1 rounded-md shadow-sm border border-indigo-100 hover:border-amber-600 text-sm">
        <div>
            <h3 class="font-semibold">Kemajuan Pengajuan Hak cipta Lorem...</h3>
            <p>Lorem ipsum dolor sit Lorem, ipsum dolor....</p>
            <div class="text-end">
                <p class="text-xs"><i>12 days ago</i></p>
            </div>
        </div>
    </a>
    <a href="{{ route('notification.detail') }}"
        class="w-full mb-2 p-3 flex flex-col gap-1 rounded-md shadow-sm border border-indigo-100 hover:border-amber-600 text-sm">
        <div>
            <h3 class="font-semibold">Kemajuan Pengajuan Hak cipta Lorem...</h3>
            <p>Lorem ipsum dolor sit Lorem, ipsum dolor....</p>
            <div class="text-end">
                <p class="text-xs"><i>12 days ago</i></p>
            </div>
        </div>
    </a>
</div>
@endsection