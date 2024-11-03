@extends('admins.partials.main')

@section('admin-content')
    <div class="flex justify-center">
        <div class="bg-white w-[90%] min-h-[80vh] rounded-md p-4">
            <h1 class="font-semibold text-lg uppercase">Notifikasi</h1>
            <div class="bg-indigo-600 h-[4px] rounded w-20 mt-2 mb-4"></div>
            <div class="px-12 mb-4 flex items-center gap-3 justify-between">
                <h4 class="font-semibold">74 Notifikasi</h4>
                <div class="border-b flex-1"></div>
                <div class="flex items-center gap-3">
                    <a href="#" class="text-indigo-600 hover:underline">Mark as Read</a>
                    |
                    <a href="#" class="text-red-600 hover:underline">Delete All</a>
                </div>
            </div>
            <div class="px-12 flex flex-col gap-2 text-sm">
                {{-- unread notifications --}}
                <a href="{{ route('admin.applicant.detail') }}">
                    <div
                        class="flex items-center justify-between rounded-md border border-amber-300 p-3 text-amber-600 hover:border-amber-500">
                        <div>
                            <h1 class="font-semibold">Pengajuan Hak Cipta</h1>
                            <p class="font-light">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Alias
                                dolorem
                                velit...
                            </p>
                        </div>
                        <div class="text-center">
                            <i class="bi bi-exclamation-circle"></i>
                            <p class="text-xs">21 days ago</p>
                        </div>
                    </div>
                </a>

                {{-- read notifications --}}
                <a href="{{ route('admin.applicant.detail') }}">
                    <div class="flex items-center justify-between rounded-md border p-3 hover:border-amber-500">
                        <div>
                            <h1 class="font-semibold">Pengajuan Hak Cipta</h1>
                            <p class="font-light mb-1">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Alias
                                dolorem
                                velit...
                            </p>
                        </div>
                        <p class="text-xs">21 days ago</p>
                    </div>
                </a>
                <a href="{{ route('admin.applicant.detail') }}">
                    <div class="flex items-center justify-between rounded-md border p-3 hover:border-amber-500">
                        <div>
                            <h1 class="font-semibold">Pengajuan Hak Cipta</h1>
                            <p class="font-light mb-1">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Alias
                                dolorem
                                velit...
                            </p>
                        </div>
                        <p class="text-xs">21 days ago</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection
