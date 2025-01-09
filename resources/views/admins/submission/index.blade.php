@extends('admins.partials.main')

@section('admin-content')
    <div>
        <h1 class="font-semibold text-lg uppercase">Rekap Pengajuan</h1>
        <div class="bg-blue-600 h-[4px] rounded w-28 mt-2 mb-4"></div>

        <div class="flex items-center text-sm justify-between mb-6">
            <h4 class="text-lg font-semibold">{{ $submissions->count() }} Pengajuan Terdaftar</h4>
            <div class=" flex items-center gap-6">
                <p class="font-semibold">Filters :</p>
                <form action="{{ route('admin.submission.index') }}" class="flex items-center gap-3">
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

        {{-- dekstop table --}}
        <div class="text-sm">
            @if ($submissions->count())
                <div class="overflow-x-auto rounded-md bg-white">
                    <table class="table-auto text-sm w-full border-collapse border-b border-gray-200 bg-white shadow-sm">
                        <thead>
                            <tr class="bg-indigo-400 text-white uppercase text-left">
                                <th class="border-b border-gray-200 px-5 py-2 w-16">#</th>
                                <th class="border-b border-gray-200 px-5 py-2">Judul</th>
                                <th class="border-b border-gray-200 px-5 py-2">Waktu Pengajuan</th>
                                <th class="border-b border-gray-200 px-5 py-2 w-20 text-center">Status</th>
                                <th class="border-b border-gray-200 px-5 py-2 w-20 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600">
                            @foreach ($submissions as $submission)
                                <tr class="hover:bg-gray-50">
                                    <td class="border-b border-gray-200 px-5 py-2 text-center">{{ $loop->iteration }}</td>
                                    <td class="border-b border-gray-200 px-5 py-2 truncate">{{ $submission->judul }}</td>
                                    <td class="border-b border-gray-200 px-5 py-2">
                                        {{ \Carbon\Carbon::parse($submission->created_at)->format('d F Y') }}
                                    </td>
                                    <td class="border-b border-gray-200 px-3 py-2 text-center">
                                        <span
                                            class="text-sm font-semibold
                                @if ($submission->status == 'proses') text-yellow-600
                                @elseif($submission->status == 'menunggu') text-gray-500
                                @elseif($submission->status == 'ditolak') text-red-600
                                @elseif($submission->status == 'diterima') text-green-600
                                @elseif($submission->status == 'revisi') text-orange-600
                                @elseif($submission->status == 'revisi selesai')text-indigo-600 @endif">
                                            {{ $submission->status }}
                                        </span>
                                    </td>
                                    <td class="border-b border-gray-200 px-5 py-2 text-center">
                                        <a href="{{ route('admin.submission.detail', $submission->uuid) }}"
                                            class="block px-5 py-2 text-indigo-600 hover:underline">Detail</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class=" p-4 flex justify-end">
                        {{ $submissions->links() }}
                    </div>
                </div>
            @else
                <div class="text-center text-gray-600 text-lg py-10">Data tidak ditemukan</div>
            @endif
        </div>

    </div>

@endsection
