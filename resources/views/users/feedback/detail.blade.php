@extends('users.partials.main')
@section('users-content')
    <div class="bg-gray-100">
        <div class="p-4 bg-white mb-4 rounded-md">
            <a href="{{ route('progress.detailProgress') }}" class="hover:underline">
                <h1 class="text-lg">Respon Dari Admin Mengenai Pengajuan Anda pada Hak Cipta Dengan Judul
                    "Pembuatan
                    Website HKI UNIKAMA" </h1>
            </a>
            <div class="bg-amber-600 h-[4px] rounded w-28 mt-2 mb-4"></div>
        </div>
        <div class="p-4 bg-white flex flex-col justify-between rounded-md font-light min-h-64">
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                Facere
                laudantium ipsam
                eos laborum inventore? Maxime recusandae ullam incidunt expedita temporibus explicabo possimus ad nulla
                vitae
                reiciendis, dolores, repudiandae provident nemo.</p>
            <div class="text-end">
                <a href="{{ route('feedback.index') }}" class="text-blue-600 hover:underline">&laquo; Kembali</a>
            </div>
        </div>
    </div>
@endsection
