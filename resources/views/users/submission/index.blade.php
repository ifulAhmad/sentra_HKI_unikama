@extends('users.partials.main')

@section('users-content')
<div class="bg-gray-100 py-4">
    <h1 class="text-lg font-semibold">Formulir Pengajuan Hak Cipta</h1>
    <div class="bg-amber-600 h-[4px] rounded w-28 mt-2 mb-4"></div>

    <div class="text-center my-3 text-xl text-amber-600">
        - <i class="bi bi-1-circle-fill"></i> -
    </div>
    <form action="" method="get" class="text-sm flex flex-col gap-3 p-1">
        <div class="shadow-md">
            <select name="user_skema" id=""
                class="p-3 w-full rounded-t-md border-b-2 outline-0 focus:border-amber-600">
                <option disabled selected>Pilih Skema</option>
                <option value="">UNIKAMA, UMK,
                    Lem.Pendidikan, Lem.pemerintahan</option>
                <option value="">Umum</option>
            </select>
        </div>
        <div class="flex flex-col md:flex-row gap-3">
            <div class="flex-1">
                <div class="bg-white shadow-md px-4 py-4 rounded-md flex flex-col gap-7">
                    <label for="judul_ciptaan" class="font-semibold">Judul Ciptaan</label>
                    <input type="text" id="judul_ciptaan"
                        class="px-1 py-2 outline-0 border-b-2 focus:border-amber-600" placeholder="Judul Ciptaan...">
                </div>
            </div>
            <div class="flex-1">
                <div class="bg-white shadow-md px-4 py-4 rounded-md flex flex-col gap-7">
                    <label for="deskripsi_produk" class="font-semibold">Deskripsi Produk Ciptaan</label>
                    <input type="text" id="deskripsi_produk"
                        class="px-1 py-2 outline-0 border-b-2 focus:border-amber-600" placeholder="Deskripsi Produk...">
                </div>
            </div>
        </div>
        <div class="flex flex-col md:flex-row gap-3 mb-1">
            <div class="flex-1">
                <div class="bg-white shadow-md px-4 py-4 rounded-md flex flex-col gap-7">
                    <label for="negara" class="font-semibold">Negara Pertama Kali Diumumkan</label>
                    <input type="text" id="negara" class="px-1 py-2 outline-0 border-b-2 focus:border-amber-600"
                        placeholder="Negara...">
                </div>
            </div>
            <div class="flex-1">
                <div class="bg-white shadow-md px-4 py-4 rounded-md flex flex-col gap-7">
                    <label for="kota" class="font-semibold">Kota Pertama Kali Diumumkan</label>
                    <input type="text" id="kota" class="px-1 py-2 outline-0 border-b-2 focus:border-amber-600"
                        placeholder="Kota...">
                </div>
            </div>
        </div>
        <div class="text-end mb-4">
            <a href="{{ route('submission.author1') }}"
                class="px-4 py-2 rounded-md shadow bg-blue-600 text-white duration-200 hover:bg-blue-800">Berikutnya
                &raquo;</a>
        </div>
    </form>
</div>
@endsection