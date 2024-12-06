@extends('admins.partials.main')

@section('admin-content')
<div>
    <h1 class="font-semibold text-lg uppercase">Rekap Pengajuan</h1>
    <div class="bg-blue-600 h-[4px] rounded w-28 mt-2 mb-4"></div>

    <div class="flex items-center text-sm justify-between mb-6">
        <h4 class="text-lg font-semibold">{{ $submissions->count() }} Pengajuan Terdaftar</h4>
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
    </div>

    {{-- dekstop table --}}
    <div class="text-sm">
        @if ($submissions->count())
        <div class="overflow-x-auto rounded-md">
            <table class="table-auto w-full border-collapse border-b border-gray-200 bg-white shadow-sm">
                <thead>
                    <tr class="bg-indigo-400 text-white uppercase text-left">
                        <th class="border-b border-gray-200 px-4 py-2 w-16">#</th>
                        <th class="border-b border-gray-200 px-4 py-2">Judul</th>
                        <th class="border-b border-gray-200 px-4 py-2">Waktu Pengajuan</th>
                        <th class="border-b border-gray-200 px-4 py-2">Email</th>
                        <th class="border-b border-gray-200 px-4 py-2 w-20 text-center">Status</th>
                        <th class="border-b border-gray-200 px-4 py-2 w-20 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($submissions as $submission)
                    <tr class="hover:bg-gray-50">
                        <td class="border-b border-gray-200 px-4 py-2 text-center">{{ $loop->iteration }}</td>
                        <td class="border-b border-gray-200 px-4 py-2 truncate">{{ $submission->judul }}</td>
                        <td class="border-b border-gray-200 px-4 py-2">
                            {{ \Carbon\Carbon::parse($submission->created_at)->format('d F Y') }}
                        </td>
                        <td class="border-b border-gray-200 px-4 py-2 truncate">{{ $submission->applicants->first()->email }}</td>
                        <td class="border-b border-gray-200 px-4 py-2 text-center">
                            <span
                                class="px-2 py-1 rounded-full text-sm font-semibold
                                @if ($submission->status == 'proses') bg-yellow-100 text-yellow-600
                                @elseif($submission->status == 'menunggu') bg-gray-100 text-gray-500
                                @elseif($submission->status == 'ditolak') bg-red-100 text-red-600
                                @elseif($submission->status == 'diterima') bg-green-100 text-green-600
                                @elseif($submission->status == 'revisi') bg-orange-100 text-orange-600 @endif">
                                {{ $submission->status }}
                            </span>
                        </td>
                        <td class="border-b border-gray-200 px-4 py-2 text-center">
                            <a href="{{ route('admin.submission.detail', $submission->uuid) }}"
                                class="block px-4 py-2 text-indigo-600 hover:underline">Detail</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="flex justify-end mt-5">
            {{ $submissions->links() }}
        </div>
        @else
        <div class="text-center text-gray-600 text-lg py-10">Data tidak ditemukan</div>
        @endif
    </div>

</div>

@endsection