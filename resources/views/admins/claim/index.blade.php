@extends('admins.partials.main')

@section('admin-content')
<div>
    <h1 class="font-semibold text-lg uppercase">Rekap Permohonan Klaim Data</h1>
    <div class="bg-blue-600 h-[4px] rounded w-28 mt-2 mb-4"></div>

    {{-- dekstop table --}}
    <div class="text-sm font-light bg-white rounded-lg overflow-x-auto">
        @if ($claimDatas)
        <table class="min-w-full table-auto">
            <thead>
                <tr class="bg-indigo-400 text-white">
                    <th class="px-4 py-2 font-semibold text-left uppercase">#</th>
                    <th class="px-4 py-2 font-semibold text-left uppercase">NIK</th>
                    <th class="px-4 py-2 font-semibold text-left uppercase">Nama</th>
                    <th class="px-4 py-2 font-semibold text-left uppercase">Email</th>
                    <th class="px-4 py-2 font-semibold text-left uppercase">Status</th>
                    <th class="px-4 py-2 font-semibold text-left uppercase">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-600">
                @foreach ($claimDatas as $data)
                <tr class="border-b bg-white hover:bg-gray-100">
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
                    <td class="px-4 py-2">
                        <a href="{{ route('admin.claim.detail', $data->uuid) }}" class="text-indigo-600 font-semibold text-xs hover:underline">Kelola</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="flex p-4 justify-end">
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