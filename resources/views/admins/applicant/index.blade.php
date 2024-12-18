@extends('admins.partials.main')

@section('admin-content')
    @if (session()->has('success'))
        <div
            class="notif-success z-[999] fixed end-3 top-20 min-w-[400px] text-sm rounded-md text-green-600 bg-green-100 border border-green-400">
            <div class="relative p-4 flex justify-between gap-2">
                <p class="flex items-center gap-2"><i class="bi bi-check-circle-fill"></i> {{ session()->get('success') }}</p>
                <button type="button" id="notif-success" class="text-xl absolute right-2 text-green-400 bottom-7"><i
                        class="bi bi-x"></i></button>
            </div>
        </div>
    @endif
    @if (session()->has('error'))
        <div
            class="notif-error fixed end-3 top-20 min-w-[400px] text-sm rounded-md bg-red-100 text-red-600 border border-red-400">
            <div class="relative p-4 flex justify-between gap-2">
                <p class="flex items-center gap-2"><i class="bi bi-exclamation-circle-fill"></i>
                    {{ session()->get('error') }}
                </p>
                <button type="button" id="notif-error" class="text-xl absolute right-2 text-red-400 bottom-7"><i
                        class="bi bi-x"></i></button>
            </div>
        </div>
    @endif

    <div>
        <h1 class="font-semibold text-2xl uppercase text-gray-800">Rekap Data Pencipta</h1>
        <div class="bg-blue-600 h-1 rounded w-28 mt-2 mb-6"></div>

        <div class="flex flex-wrap items-center justify-between text-sm mb-6">
            <h4 class="text-lg font-semibold text-gray-700">{{ $applicants->count() }} Pencipta Terdaftar</h4>
            <div class="flex flex-wrap items-center gap-4">
                <p class="font-medium text-gray-600">Filters :</p>
                <form action="{{ route('admin.applicant.index') }}" class="flex items-center gap-3">
                    <select name="sort"
                        class="bg-white rounded-md p-2 border border-gray-300 focus:ring focus:ring-blue-200">
                        <option disabled {{ is_null($sort) ? 'selected' : '' }}>Urutkan Berdasarkan</option>
                        <option value="asc" {{ $sort === 'asc' ? 'selected' : '' }}>Dari A-Z</option>
                        <option value="desc" {{ $sort === 'desc' ? 'selected' : '' }}>Dari Z-A</option>
                        <option value="newest" {{ $sort === 'newest' ? 'selected' : '' }}>Waktu Terbaru</option>
                        <option value="oldest" {{ $sort === 'oldest' ? 'selected' : '' }}>Waktu Terlama</option>
                    </select>
                    <button type="submit"
                        class="px-4 py-2 text-sm bg-indigo-500 text-white rounded-md hover:bg-indigo-600">
                        <i class="bi bi-search"></i>
                    </button>
                </form>
            </div>
        </div>

        {{-- Table --}}
        <div class="bg-white shadow-md rounded-md overflow-hidden">
            @if ($applicants->count())
                <table class="min-w-full text-sm table-auto">
                    <thead class="bg-indigo-400 text-white uppercase text-sm">
                        <tr>
                            <th class="py-2 px-6 text-left">#</th>
                            <th class="py-2 px-6 text-left">NIK</th>
                            <th class="py-2 px-6 text-left">Nama</th>
                            <th class="py-2 px-6 text-left">Email</th>
                            <th class="py-2 px-6 text-left">Kontak</th>
                            <th class="py-2 px-6 text-left">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600">
                        @foreach ($applicants as $applicant)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="py-2 px-6">{{ $loop->iteration }}</td>
                                <td class="py-2 px-6">{{ $applicant->nik }}</td>
                                <td class="py-2 px-6">{{ $applicant->nama }}</td>
                                <td class="py-2 px-6">{{ $applicant->email }}</td>
                                <td class="py-2 px-6">{{ $applicant->kontak }}</td>
                                <td class="py-2 px-6">
                                    <a href="{{ route('admin.applicant.detail', $applicant->nik) }}"
                                        class="text-indigo-600 hover:underline">Detail</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="p-4 flex justify-end">
                    {{ $applicants->links('pagination::tailwind') }}
                </div>
            @else
                <div class="text-center p-6 text-gray-500 uppercase">
                    <p>Data Tidak Ditemukan</p>
                </div>
            @endif
        </div>
    </div>



    <script>
        $(document).ready(function() {
            // time notification 
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
