@extends('users.partials.main')

@section('users-content')
<div class="p-4">
    <h1 class="text-lg font-semibold">Detail Kemajuan Usulan</h1>
    <div class="bg-amber-600 h-[4px] rounded w-28 mt-2 mb-4"></div>

    <div class="flex items-center justify-center gap-2 mb-6 pb-4 border-b-2">
        <span class="text-amber-600">Menunggu</span>
        <div class="flex items-center">
            <p class="text-amber-600">-------&raquo;</p>
        </div>
        <span class="text-amber-600">Diproses</span>
        <div class="flex items-center">
            <p class="">-------&raquo;</p>
        </div>
        <span>Hasil</span>
    </div>

    <div class="mb-6">
        <div class="mb-3 font-semibold">Data Pencipta 1___</div>
        <table class="w-full table-auto ms-4">
            <tbody class="flex flex-col gap-2">
                <tr class="flex items-start gap-3">
                    <th class="w-[8rem] md:w-[12rem] font-semibold text-start flex items-center justify-between">Nama
                        <span>:</span>
                    </th>
                    <td>Saiful Islam</td>
                </tr>
                <tr class="flex items-start gap-3">
                    <th class="w-[8rem] md:w-[12rem] font-semibold text-start flex items-center justify-between">Tanggal
                        Lahir
                        <span>:</span>
                    </th>
                    <td>06 November 2002</td>
                </tr>
                <tr class="flex items-start gap-3">
                    <th class="w-[8rem] md:w-[12rem] font-semibold text-start flex items-center justify-between">Email
                        <span>:</span>
                    </th>
                    <td>saifultesting@gmail.com</td>
                </tr>
                <tr class="flex items-start gap-3">
                    <th class="w-[8rem] md:w-[12rem] font-semibold text-start flex items-center justify-between">Kontak
                        <span>:</span>
                    </th>
                    <td>08123344xxxx</td>
                </tr>
                <tr class="flex items-start gap-3">
                    <th class="w-[8rem] md:w-[12rem] font-semibold text-start flex items-center justify-between">Alamat
                        <span>:</span>
                    </th>
                    <td>Jl.Simpang Kepuh Blok F, Bandungrejosari, Kec.Sukun, Kota.Malang, Prov.Jawa Timur</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="mb-6 pb-4">
        <div class="mb-3 font-semibold">Data Pencipta 2___</div>
        <table class="w-full table-auto ms-4">
            <tbody class="flex flex-col gap-2">
                <tr class="flex items-start gap-3">
                    <th class="w-[8rem] md:w-[12rem] font-semibold text-start flex items-center justify-between">Nama
                        <span>:</span>
                    </th>
                    <td>Saiful Islam</td>
                </tr>
                <tr class="flex items-start gap-3">
                    <th class="w-[8rem] md:w-[12rem] font-semibold text-start flex items-center justify-between">Tanggal
                        Lahir
                        <span>:</span>
                    </th>
                    <td>06 November 2002</td>
                </tr>
                <tr class="flex items-start gap-3">
                    <th class="w-[8rem] md:w-[12rem] font-semibold text-start flex items-center justify-between">Email
                        <span>:</span>
                    </th>
                    <td>saifultesting@gmail.com</td>
                </tr>
                <tr class="flex items-start gap-3">
                    <th class="w-[8rem] md:w-[12rem] font-semibold text-start flex items-center justify-between">Kontak
                        <span>:</span>
                    </th>
                    <td>08123344xxxx</td>
                </tr>
                <tr class="flex items-start gap-3">
                    <th class="w-[8rem] md:w-[12rem] font-semibold text-start flex items-center justify-between">Alamat
                        <span>:</span>
                    </th>
                    <td>Jl.Simpang Kepuh Blok F, Bandungrejosari, Kec.Sukun, Kota.Malang, Prov.Jawa Timur</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="border-b-2 mb-6 font-semibold">
        Detail Ciptaan
    </div>
    <div class="mb-6">
        <div class="flex gap-3 mb-3">
            <h5 class="font-semibold w-[100px] md:w-[200px] flex items-start justify-between ">Judul Ciptaan
                <span>:</span>
            </h5>
            <p class="capitalize flex-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit
                similique
                rerum soluta earum amet nihil.</p>
        </div>
        <div class="flex gap-3 mb-3">
            <h5 class="font-semibold w-[100px] md:w-[200px] flex items-start justify-between ">Deskripsi
                <span>:</span>
            </h5>
            <p class="capitalize flex-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
        </div>
        <div class="flex gap-3 mb-3">
            <h5 class="font-semibold w-[100px] md:w-[200px] flex items-start justify-between ">Negara Pertamakali
                Diumumkan
                <span>:</span>
            </h5>
            <p class="capitalize flex-1">Indonesia </p>
        </div>
        <div class="flex gap-3 mb-3">
            <h5 class="font-semibold w-[100px] md:w-[200px] flex items-start justify-between ">Kota Pertamakali
                Diumumkan
                <span>:</span>
            </h5>
            <p class="capitalize flex-1">Kota Malang</p>
        </div>
    </div>

    <div class="border-b-2 mb-6 font-semibold">
        File Persyaratan
    </div>
    <div class="grid grid-cols-2 md:grid-cols-3 gap-3 text-sm">
        <a href="#" class=" w-full border rounded-md overflow-hidden hover:border-amber-600">
            <div class="bg-pdf h-[150px] bg-top flex items-end">
                <div class="bg-white w-full p-2 opacity-95">Surat Pengajuan Hak Cipta.pdf
                </div>
            </div>
        </a>
        <a href="#" class=" w-full border rounded-md overflow-hidden hover:border-amber-600">
            <div class="bg-pdf h-[150px] bg-top flex items-end">
                <div class="bg-white w-full p-2 opacity-95">Scan KTP Semua Pencipta.pdf
                </div>
            </div>
        </a>
        <a href="#" class=" w-full border rounded-md overflow-hidden hover:border-amber-600">
            <div class="bg-pdf h-[150px] bg-top flex items-end">
                <div class="bg-white w-full p-2 opacity-95">Bukti Pembayaran.pdf /jpg
                </div>
            </div>
        </a>
        <a href="#" class=" w-full border rounded-md overflow-hidden hover:border-amber-600">
            <div class="bg-pdf h-[150px] bg-top flex items-end">
                <div class="bg-white w-full p-2 opacity-95">Surat Pengalihan Hak cipta.pdf
                </div>
            </div>
        </a>
        <a href="#" class=" w-full border rounded-md overflow-hidden hover:border-amber-600">
            <div class="bg-pdf h-[150px] bg-top flex items-end">
                <div class="bg-white w-full p-2 opacity-95">File Ciptaan.pdf
                </div>
            </div>
        </a>
    </div>
</div>
@endsection