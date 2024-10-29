@extends('users.partials.main')

@section('users-content')
<div class="bg-gray-100 py-4">
    <h1 class="text-lg font-semibold">Formulir Pengajuan Hak Cipta</h1>
    <div class="bg-amber-600 h-[4px] rounded w-28 mt-2 mb-4"></div>

    <div class="text-center my-3 text-xl text-amber-600">
        - <i class="bi bi-2-circle-fill"></i> -
    </div>
    <form action="" method="get" class="text-sm flex flex-col gap-3 p-1">
        <div class="flex flex-col md:flex-row gap-3">
            <div class="flex-1">
                <div class="bg-white shadow-md px-4 py-4 rounded-md flex flex-col gap-7">
                    <label for="nama" class="font-semibold">Nama Pencipta 1</label>
                    <input type="text" id="nama" class="px-1 py-2 outline-0 border-b-2 focus:border-amber-600"
                        placeholder="Nama ...">
                </div>
            </div>
            <div class="flex-1">
                <div class="bg-white shadow-md px-4 py-4 rounded-md flex flex-col gap-7">
                    <label for="email" class="font-semibold">Email</label>
                    <input type="email" id="email" class="px-1 py-2 outline-0 border-b-2 focus:border-amber-600"
                        placeholder="Email ...">
                </div>
            </div>
        </div>
        <div class="flex flex-col md:flex-row gap-3">
            <div class="flex-1">
                <div class="bg-white shadow-md px-4 py-4 rounded-md flex flex-col gap-7">
                    <label for="telepon" class="font-semibold">Nomor Telepon</label>
                    <input type="number" id="telepon" class="px-1 py-2 outline-0 border-b-2 focus:border-amber-600"
                        placeholder="Nomor Telepon...">
                </div>
            </div>
            <div class="flex-1">
                <div class="bg-white shadow-md px-4 py-4 rounded-md flex flex-col gap-7">
                    <label for="kewarganegaraan" class="font-semibold">Kewarganegaraan</label>
                    <input type="text" id="kewarganegaraan"
                        class="px-1 py-2 outline-0 border-b-2 focus:border-amber-600" placeholder="Kewarganegaraan...">
                </div>
            </div>
        </div>
        <div>
            <div class="bg-white shadow-md px-4 py-4 rounded-md flex flex-col gap-7">
                <label for="alamat_lengkap" class="font-semibold">Alamat Lengkap (Cantumkan Juga: Provinsi,
                    Kota/Kabupaten, Kecamatan)</label>
                <input type="text" id="alamat_lengkap" class="px-1 py-2 outline-0 border-b-2 focus:border-amber-600"
                    placeholder="Alamat Lengkap...">
            </div>
        </div>
        <div>
            <div class="bg-white shadow-md px-4 py-4 rounded-md flex flex-col gap-7">
                <label for="kode_pos" class="font-semibold">Kode Pos</label>
                <input type="number" id="kode_pos" class="px-1 py-2 outline-0 border-b-2 focus:border-amber-600"
                    placeholder="Kode Pos...">
            </div>
        </div>
        <div class="shadow-md mb-1">
            <select name="user_skema" id=""
                class="p-3 w-full rounded-t-md border-b-2 outline-0 focus:border-amber-600">
                <option disabled selected>Tambahkan Pencipta</option>
                <option value="">Iya</option>
                <option value="">Tidak</option>
            </select>
        </div>
        <div class="text-end">
            <a href="{{ route('submission.author2') }}"
                class="px-4 py-2 rounded-md shadow bg-blue-600 text-white duration-200 hover:bg-blue-800">Berikutnya
                &raquo;</a>
        </div>
    </form>
</div>
@endsection