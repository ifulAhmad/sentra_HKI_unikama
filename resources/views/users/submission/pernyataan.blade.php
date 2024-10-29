@extends('users.partials.main')

@section('users-content')
    <div class="p-4">
        <h1 class="text-lg font-semibold">Formulir Pengajuan Hak Cipta</h1>
        <div class="bg-amber-600 h-[4px] rounded w-28 mt-2 mb-4"></div>
        Dengan ini saya menyatakan bahwa:
        <ul class="mb-8 list-decimal p-6 flex flex-col gap-2">
            <li>Seluruh data yang saya isikan adalah benar, dan saya bertanggung jawab penuh atas data yang diisikan.
            </li>
            <li>Segala kesalahan isian pada sertifikat Hak Cipta karena kelalaian saya bukan tanggung jawab Sentra HKI
                UNIKAMA.</li>
        </ul>
        <div class="text-end">
            <button
                class="px-4 py-2 rounded-md border-2 border-blue-600 duration-200 hover:text-white hover:bg-blue-600">Kirim
                &check;</button>
        </div>
    </div>
@endsection
