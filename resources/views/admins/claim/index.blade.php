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
        <div class="text-sm flex font-light flex-col">
            @if ($claimDatas)
                <div class="rounded-md flex items-center gap-3 px-3 mb-2">
                    <h4 class="w-16 font-semibold uppercase">#</h4>
                    <h4 class="flex-1 font-semibold uppercase">NIK</h4>
                    <h4 class="flex-1 font-semibold uppercase">Nama</h4>
                    <h4 class="flex-1 font-semibold uppercase">Email</h4>
                    <h4 class="flex-1 font-semibold uppercase">Status</h4>
                </div>
                <div>
                    @foreach ($claimDatas as $data)
                        <a href="{{ route('admin.claim.detail', $data->uuid) }}"
                            class="w-full rounded-md bg-white flex items-center border-2 border-white gap-3 p-2 mb-1 hover:border-indigo-400">
                            <p class="w-16">{{ $loop->iteration }}</p>
                            <p class="flex-1">{{ App\Models\Applicant::find($data->applicant_id)->nik }}</p>
                            <p class="flex-1">{{ App\Models\Applicant::find($data->applicant_id)->nama }}</p>
                            <p class="flex-1">{{ $data->user->email }}</p>
                            <p
                                class="flex-1 uppercase font-semibold @if ($data->status == 'pending') text-yellow-500
                            @elseif($data->status == 'rejected') text-red-500 @else text-green-500 @endif">
                                {{ $data->status }}</p>
                        </a>
                    @endforeach
                </div>
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
