@extends('admins.partials.main')

@section('admin-content')
<div>
    <h1 class="font-semibold text-lg uppercase">Rekap Permohonan Klaim Data</h1>
    <div class="bg-blue-600 h-[4px] rounded w-28 mt-2 mb-4"></div>

    <div class="text-sm mb-6">
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
        </div>
    </div>

    {{-- dekstop table --}}
    <div class="text-sm font-light rounded-md overflow-x-auto">
        @if ($claimDatas)
        <table class="min-w-full table-auto">
            <thead>
                <tr class="bg-indigo-400 text-white">
                    <th class="px-4 py-2 font-semibold text-left uppercase">#</th>
                    <th class="px-4 py-2 font-semibold text-left uppercase">NIK</th>
                    <th class="px-4 py-2 font-semibold text-left uppercase">Nama</th>
                    <th class="px-4 py-2 font-semibold text-left uppercase">Email</th>
                    <th class="px-4 py-2 font-semibold text-left uppercase">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($claimDatas as $data)
                <tr class="border-b hover:bg-indigo-100">
                    <td class="px-4 py-2">{{ $loop->iteration }}</td>
                    <td class="px-4 py-2">{{ App\Models\Applicant::find($data->applicant_id)->nik }}</td>
                    <td class="px-4 py-2">{{ App\Models\Applicant::find($data->applicant_id)->nama }}</td>
                    <td class="px-4 py-2">{{ $data->user->email }}</td>
                    <td class="px-4 py-2 uppercase font-semibold 
                            @if ($data->status == 'pending') text-yellow-500
                            @elseif($data->status == 'rejected') text-red-500 
                            @else text-green-500 @endif">
                        {{ $data->status }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="flex mt-5 justify-end">
            {{ $claimDatas->links() }}
        </div>
        @else
        <div class="text-center my-10 text uppercase">
            <p>Data Tidak ditemukan</p>
        </div>
        @endif
    </div>

</div>
@endsection