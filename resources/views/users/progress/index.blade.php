@extends('users.partials.main')

@section('users-content')

    @if (session()->has('success'))
        <div
            class="notif-success z-[999] fixed end-3 top-28 min-w-[400px] text-sm rounded-md text-green-600 bg-green-100 border border-green-400">
            <div class="relative p-4 flex justify-between gap-2">
                <p class="flex items-center gap-2"><i class="bi bi-check-circle-fill"></i> {{ session()->get('success') }}</p>
                <button type="button" id="notif-success" class="text-xl absolute right-2 text-green-400 bottom-7"><i
                        class="bi bi-x"></i></button>
            </div>
        </div>
    @endif
    @if (session()->has('error'))
        <div
            class="notif-error z-[999] fixed end-3 top-28 min-w-[400px] text-sm rounded-md bg-red-100 text-red-600 border border-red-400">
            <div class="relative p-4 flex justify-between gap-2">
                <p class="flex items-center gap-2"><i class="bi bi-exclamation-circle-fill"></i>
                    {{ session()->get('error') }}
                </p>
                <button type="button" id="notif-error" class="text-xl absolute right-2 text-red-400 bottom-7"><i
                        class="bi bi-x"></i></button>
            </div>
        </div>
    @endif
    <div class="p-4 bg-indigo-100 min-h-96">
        <h1 class="text-lg font-semibold">Kemajuan Usulan</h1>
        <div class="bg-amber-600 h-[3px] rounded w-28 mt-2 mb-4"></div>

        <div class="flex items-center text-sm justify-between mb-6">
            <div class=" flex items-center gap-6">
                <p class="font-semibold">Filters :</p>
                <form action="">
                    <select name="" id="" class="bg-white rounded-md p-2 outline-0 shadow">
                        <option selected disabled>Urutkan Berdasarkan</option>
                        <option value="" class="bg-white">Dari A-Z</option>
                        <option value="" class="bg-white">Dari Z-A</option>
                        <option value="" class="bg-white">Waktu Terbaru</option>
                        <option value="" class="bg-white">Waktu Terlama</option>
                    </select>
                </form>
                <form action="">
                    <select name="" id="" class="bg-white rounded-md p-2 outline-0 shadow">
                        <option selected disabled>Grup Sesuai Jenis</option>
                        <option value="" class="bg-white">Karya Tulis</option>
                        <option value="" class="bg-white">Karya Seni</option>
                        <option value="" class="bg-white">Komposisi Musik</option>
                        <option value="" class="bg-white">Karya Audio Visual</option>
                        <option value="" class="bg-white">Karya Fotografi</option>
                        <option value="" class="bg-white">Karya Drama dan Koreografi</option>
                        <option value="" class="bg-white">Karya Rekaman</option>
                        <option value="" class="bg-white">Karya Lainnya</option>
                    </select>
                </form>

            </div>
            <div class="text-xs text-end mb-4">
                <a href="{{ route('submission.index') }}"
                    class="px-3 py-2 rounded-md bg-indigo-600 text-white uppercase duration-100 hover:bg-indigo-800"> + Buat
                    Pengajuan</a>
            </div>
        </div>

        {{-- dekstop table --}}
        <div class="text-sm font-light hidden md:block">
            @if ($submissions)
                <table class="table-auto w-full">
                    <thead>
                        <tr>
                            <th class="text-start p-2">No</th>
                            <th class="text-start p-2">Judul</th>
                            <th class="text-start p-2">Email</th>
                            <th class="text-start p-2">Waktu</th>
                            <th class="text-start p-2">Status</th>
                            <th class="text-start p-2">Menu</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($submissions as $submission)
                            <tr class="bg-white border-b-4 border-indigo-100">
                                <th class="p-2 md:py-4 text-start">{{ $loop->iteration }}</th>
                                <td class="p-2 md:py-4 text-start">{!! $submission->judul !!}
                                </td>
                                <td class="p-2 md:py-4 text-start">{{ $applicant->email }}
                                </td>
                                <td class="p-2 md:py-4 text-start">{{ $submission->created_at->format('d F Y') }}
                                </td>
                                <td class="p-2 md:py-4 text-xs">
                                    <span
                                        class="bg-gray-200 px-3 py-1 rounded-xl uppercase">{{ $submission->status }}</span>
                                </td>
                                <td class="p-2 md:py-4 text-center">
                                    <div class="relative">
                                        <button onclick="toggleDropdown(this)" class="menu-btn">
                                            <i class="bi bi-three-dots-vertical"></i>
                                        </button>
                                        <div
                                            class="dropdown-menu hidden absolute right-0 mt-2 w-32 bg-white rounded z-[199] shadow-lg">
                                            <a href="{{ route('progress.detail', $submission->uuid) }}"
                                                class="block px-4 py-2 text-gray-700 hover:bg-gray-200">Detail</a>
                                            <a href="#"
                                                class="block px-4 py-2 text-gray-700 hover:bg-gray-200">Edit</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>oekoek</p>
            @endif
        </div>

        {{-- Mobile table --}}
        <div class="text-sm font-light md:hidden">
            @if ($submissions)
                <table class="table-auto w-full">
                    <thead>
                        <tr>
                            <th class="text-start p-2">No</th>
                            <th class="text-start p-2">Judul</th>
                            <th class="text-start p-2">Status</th>
                            <th class="text-start p-2">Menu</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($submissions as $submission)
                            <tr class="bg-white border-b-4 border-indigo-100">
                                <th class="p-2 md:py-4 text-start">1</th>
                                <td class="p-2 md:py-4 text-start">{!! $submission->judul !!}
                                </td>
                                <td class="p-2 md:py-4 text-xs">
                                    <span
                                        class="bg-gray-200 px-3 py-1 rounded-xl uppercase text-white">{{ $submission->status }}</span>
                                </td>
                                <td class="p-2 md:py-4 text-center">
                                    <div class="relative">
                                        <button onclick="toggleDropdown(this)" class="menu-btn">
                                            <i class="bi bi-three-dots-vertical"></i>
                                        </button>
                                        <div
                                            class="dropdown-menu hidden absolute right-0 mt-2 w-32 bg-white z-[199] rounded shadow-lg">
                                            <a href="{{ route('progress.detail', $submission->uuid) }}"
                                                class="block px-4 py-2 text-gray-700 hover:bg-gray-200">Detail</a>
                                            <a href="#"
                                                class="block px-4 py-2 text-gray-700 hover:bg-gray-200">Edit</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <tr>oekoek</tr>
            @endif
        </div>

    </div>

    <script>
        $(document).ready(function() {

            setTimeout(() => {
                $('.notif-success').fadeOut();
            }, 5000);
            $('#notif-success').click(function() {
                $('.notif-success').addClass('hidden');
            });
            setTimeout(() => {
                $('.notif-error').fadeOut();
            }, 5000);
            $('#notif-error').click(function() {
                $('.notif-error').addClass('hidden');
            });
        });

        function toggleDropdown(button) {
            document.querySelectorAll('.dropdown-menu').forEach(menu => menu.classList.add('hidden'));

            const dropdown = button.nextElementSibling;
            dropdown.classList.toggle('hidden');
        }
        document.addEventListener('click', function(event) {
            if (!event.target.closest('.menu-btn')) {
                document.querySelectorAll('.dropdown-menu').forEach(menu => menu.classList.add('hidden'));
            }
        });
    </script>
@endsection
