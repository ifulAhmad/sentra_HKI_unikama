@extends('users.partials.main')

@section('users-content')
    <div class="p-4 bg-gray-100 min-h-96">
        <h1 class="text-lg font-semibold">Kemajuan Usulan</h1>
        <div class="bg-amber-600 h-[4px] rounded w-28 mt-2 mb-4"></div>

        <div class="text-xs text-end mb-4">
            <a href="{{ route('submission.index') }}"
                class="px-3 py-2 rounded-md bg-blue-600 text-white uppercase duration-100 hover:bg-blue-800"> + Buat
                Pengajuan</a>
        </div>

        {{-- dekstop table --}}
        <div class="text-sm font-light hidden md:block">
            <table class="table-auto w-full">
                <thead>
                    <tr>
                        <th class="text-start p-2">No</th>
                        <th class="text-start p-2">Judul</th>
                        <th class="text-start p-2">Email</th>
                        <th class="text-start p-2">Waktu</th>
                        <th class="text-start p-2">Kemajuan</th>
                        <th class="text-start p-2">Menu</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white border-b-4 border-gray-100">
                        <th class="p-2 md:py-4 text-start">1</th>
                        <td class="p-2 md:py-4 text-start">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        </td>
                        <td class="p-2 md:py-4 text-start">saifultesting@gmail.com
                        </td>
                        <td class="p-2 md:py-4 text-start">26 Oktober 2024
                        </td>
                        <td class="p-2 md:py-4 text-xs">
                            <span class="bg-green-500 px-3 py-1 rounded-xl uppercase text-white">success</span>
                        </td>
                        <td class="p-2 md:py-4 text-center">
                            <div class="relative">
                                <button onclick="toggleDropdown(this)" class="menu-btn">
                                    <i class="bi bi-three-dots-vertical"></i>
                                </button>
                                <div
                                    class="dropdown-menu hidden absolute right-0 mt-2 w-32 bg-white rounded z-[199] shadow-lg">
                                    <a href="{{ route('progress.detailProgress') }}"
                                        class="block px-4 py-2 text-gray-700 hover:bg-gray-200">Detail</a>
                                    <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-200">Edit</a>
                                    <a href="#"
                                        class="block px-4 py-2 text-white bg-red-400 hover:bg-red-600">Batalkan</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr class="bg-white border-b-4 border-gray-100">
                        <th class="p-2 md:py-4 text-start">2</th>
                        <td class="p-2 md:py-4 text-start">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        </td>
                        <td class="p-2 md:py-4 text-start">saifultesting@gmail.com
                        </td>
                        <td class="p-2 md:py-4 text-start">26 Oktober 2024
                        </td>
                        <td class="p-2 md:py-4 text-xs">
                            <span class="bg-green-500 px-3 py-1 rounded-xl uppercase text-white">success</span>
                        </td>
                        <td class="p-2 md:py-4 text-center">
                            <div class="relative">
                                <button onclick="toggleDropdown(this)" class="menu-btn">
                                    <i class="bi bi-three-dots-vertical"></i>
                                </button>
                                <div
                                    class="dropdown-menu hidden absolute right-0 mt-2 w-32 bg-white rounded z-[199] shadow-lg">
                                    <a href="{{ route('progress.detailProgress') }}"
                                        class="block px-4 py-2 text-gray-700 hover:bg-gray-200">Detail</a>
                                    <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-200">Edit</a>
                                    <a href="#"
                                        class="block px-4 py-2 text-white bg-red-400 hover:bg-red-600">Batalkan</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        {{-- Mobile table --}}
        <div class="text-sm font-light md:hidden">
            <table class="table-auto w-full">
                <thead>
                    <tr>
                        <th class="text-start p-2">No</th>
                        <th class="text-start p-2">Judul</th>
                        <th class="text-start p-2">Kemajuan</th>
                        <th class="text-start p-2">Menu</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white border-b-4 border-gray-100">
                        <th class="p-2 md:py-4 text-start">1</th>
                        <td class="p-2 md:py-4 text-start">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        </td>
                        <td class="p-2 md:py-4 text-xs">
                            <span class="bg-green-500 px-3 py-1 rounded-xl uppercase text-white">success</span>
                        </td>
                        <td class="p-2 md:py-4 text-center">
                            <div class="relative">
                                <button onclick="toggleDropdown(this)" class="menu-btn">
                                    <i class="bi bi-three-dots-vertical"></i>
                                </button>
                                <div
                                    class="dropdown-menu hidden absolute right-0 mt-2 w-32 bg-white z-[199] rounded shadow-lg">
                                    <a href="{{ route('progress.detailProgress') }}"
                                        class="block px-4 py-2 text-gray-700 hover:bg-gray-200">Detail</a>
                                    <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-200">Edit</a>
                                    <a href="#"
                                        class="block px-4 py-2 text-white bg-red-400 hover:bg-red-600">Batalkan</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr class="bg-white border-b-4 border-gray-100">
                        <th class="p-2 md:py-4 text-start">2</th>
                        <td class="p-2 md:py-4 text-start">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        </td>
                        <td class="p-2 md:py-4 text-xs">
                            <span class="bg-green-500 px-3 py-1 rounded-xl uppercase text-white">success</span>
                        </td>
                        <td class="p-2 md:py-4 text-center">
                            <div class="relative">
                                <button onclick="toggleDropdown(this)" class="menu-btn">
                                    <i class="bi bi-three-dots-vertical"></i>
                                </button>
                                <div
                                    class="dropdown-menu hidden absolute right-0 mt-2 w-32 bg-white z-[199] rounded shadow-lg">
                                    <a href="{{ route('progress.detailProgress') }}"
                                        class="block px-4 py-2 text-gray-700 hover:bg-gray-200">Detail</a>
                                    <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-200">Edit</a>
                                    <a href="#"
                                        class="block px-4 py-2 text-white bg-red-400 hover:bg-red-600">Batalkan</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>

    <script>
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
