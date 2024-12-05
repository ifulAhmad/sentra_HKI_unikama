@extends('admins.partials.main')

@section('admin-content')
    <div class="container mx-auto p-5">
        <!-- Header -->
        <h1 class="font-semibold text-lg uppercase">Kelola Data Artikel</h1>
        <div class="bg-blue-600 h-[4px] rounded w-28 mt-2 mb-4"></div>

        <div class="text-end my-4">
            <a href="{{ route('admin.articles.create') }}"
                class="px-5 py-2 rounded-xl text-white font-semibold bg-indigo-500 hover:bg-indigo-600">+ Tambah
                Artikel</a>
        </div>

        <!-- Tabel -->
        <div class="overflow-x-auto bg-white shadow-md rounded-lg">
            <table class="min-w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-white uppercase bg-indigo-400">
                    <tr>
                        <th class="px-6 py-3">#</th>
                        <th class="px-6 py-3">Judul Artikel</th>
                        <th class="px-6 py-3">Penulis</th>
                        <th class="px-6 py-3">Tanggal Publikasi</th>
                        <th class="px-6 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Loop Data Artikel -->
                    <tr class="bg-white border-b hover:bg-gray-100">
                        <td class="px-6 py-4 font-medium text-gray-900">1</td>
                        <td class="px-6 py-4">judul</td>
                        <td class="px-6 py-4">penulis</td>
                        <td class="px-6 py-4">tanggal publikasi</td>
                        <td class="px-6 py-4 text-center">
                            <div class="flex justify-center space-x-2">
                                <a href="#" class="text-blue-600 hover:underline">Detail</a>
                                <a href="#" class="text-yellow-600 hover:underline">Edit</a>
                                <form action="" method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus artikel ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        {{-- <div class="mt-5 flex justify-center">
            {{ $articles->links('pagination::tailwind') }}
        </div> --}}
    </div>
@endsection
