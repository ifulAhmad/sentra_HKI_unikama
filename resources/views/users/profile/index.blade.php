@extends('users.partials.main')

@section('users-content')
<div class="my-4 p-4">
    <h1 class="text-lg font-semibold">Profil Saiful Islam_</h1>
    <div class="bg-amber-600 h-[4px] rounded w-28 mt-2 mb-4"></div>

    <div>
        <form action="" method="get">
            <div class="flex flex-col lg:flex-row gap-3">
                <div class="flex-1">
                    <div class="flex flex-col mb-4">
                        <label for="name" class="font-semibold text-sm ms-3 mb-5">Nama</label>
                        <input type="text" id="name" class="border-b-2 border-indigo-100 focus:border-amber-600 py-2 px-3 outline-0"
                            placeholder="Nama..." value="Saiful Islam">
                    </div>
                    <div class="flex flex-col mb-4">
                        <label for="birth" class="font-semibold text-sm ms-3 mb-5">Tanggal Lahir</label>
                        <input type="text" id="birth" class="border-b-2 border-indigo-100 py-2 px-3 focus:border-amber-600 outline-0"
                            placeholder="06 november 2002" value="06/11/2002">
                    </div>
                </div>
                <div class="flex-1">
                    <div class="flex flex-col mb-4">
                        <label for="email" class="font-semibold text-sm ms-3 mb-5">Email</label>
                        <input type="email" id="email" class="border-b-2 border-indigo-100 py-2 px-3 focus:border-amber-600 outline-0"
                            placeholder="email@gmail.com" value="SaifulTesting098@gmail.com" disabled>
                    </div>
                    <div class="flex flex-col mb-4">
                        <label for="contact" class="font-semibold text-sm ms-3 mb-5">Kontak</label>
                        <input type="text" id="contact" class="border-b-2 border-indigo-100 py-2 px-3 focus:border-amber-600 outline-0"
                            placeholder="0812xxx..." value="08124433xxxx">
                    </div>
                </div>
            </div>
            <div class="flex flex-col mb-4">
                <label for="full_address" class="font-semibold text-sm ms-3 mb-5">Alamat Lengkap</label>
                <input type="text" id="full_address" class="border-b-2 border-indigo-100 py-2 px-3 focus:border-amber-600 outline-0" placeholder="full_address"
                    value="Jl.Simpang Kepuh Blok F, Bandungrejosari, Kec.Sukun, Kota.Malang, Prov.Jawa Timur">
            </div>
            <div class="flex flex-col mb-4">
                <label for="nationality" class="font-semibold text-sm ms-3 mb-5">Kewarganegaraan</label>
                <input type="text" id="nationality" class="border-b-2 border-indigo-100 py-2 px-3 focus:border-amber-600 outline-0" placeholder="nationality"
                    value="Indonesia">
            </div>

            <div class="text-end">
                <button
                    class="py-2 px-4 rounded-lg bg-indigo-600 text-white duration-100 hover:bg-indigo-700 ">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection