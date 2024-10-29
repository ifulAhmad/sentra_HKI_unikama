@extends('users.partials.main')

@section('users-content')
    <div class="p-4">
        <h1 class="text-lg font-semibold">Feedback</h1>
        <div class="bg-amber-600 h-[4px] rounded w-28 mt-2 mb-4"></div>

        <a href="{{ route('feedback.detail') }}"
            class="w-full mb-2 p-4 flex flex-col gap-1 rounded-md shadow-md border hover:border-amber-600">
            <div>
                <h3 class="font-semibold">Kemajuan Pengajuan Hak cipta Lorem...</h3>
                <p>Lorem ipsum dolor sit Lorem, ipsum dolor....</p>
                <div class="text-end">
                    <p class="text-xs"><i>12 days ago</i></p>
                </div>
            </div>
        </a>
        <a href="{{ route('feedback.detail') }}"
            class="w-full mb-2 p-4 flex flex-col gap-1 rounded-md shadow-md border hover:border-amber-600">
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
