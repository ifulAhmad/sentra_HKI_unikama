@extends('users.partials.main')
@section('users-content')
<div class="container p-4">
    <h1 class="text-lg font-semibold">Formulir Pengajuan Hak Cipta</h1>
    <div class="bg-amber-600 h-[4px] rounded w-28 mt-2 mb-4"></div>

    <div class="text-center my-3 text-xl text-amber-600">
        - <i class="bi bi-5-circle-fill"></i> -
    </div>

    <div class="">Sub-Jenis Ciptaan (Pilihlah sesuai karya ciptaan saudara):</div>
    <form action="#" method="post" class="flex flex-col gap-4 p-3">
        <div class="flex items-center gap-5">
            <input type="radio" id="tulis" name="jenis_hak_cipta" value="tulis" class="w-4 h-4 cursor-pointer">
            <label class="cursor-pointer" for="tulis">Karya Tulis</label>
        </div>
        <div class="flex items-center gap-5">
            <input type="radio" id="seni" name="jenis_hak_cipta" value="seni" class="w-4 h-4 cursor-pointer">
            <label class="cursor-pointer" for="seni">Karya Seni</label>
        </div>
        <div class="flex items-center gap-5">
            <input type="radio" id="komposisi_musik" name="jenis_hak_cipta" value="komposisi_musik"
                class="w-4 h-4 cursor-pointer">
            <label class="cursor-pointer" for="komposisi_musik">Komposisi Musik</label>
        </div>
        <div class="flex items-center gap-5">
            <input type="radio" id="audio_visual" name="jenis_hak_cipta" value="audio_visual"
                class="w-4 h-4 cursor-pointer">
            <label class="cursor-pointer" for="audio_visual">Karya Audio Visual</label>
        </div>
        <div class="flex items-center gap-5">
            <input type="radio" id="Fotografi" name="jenis_hak_cipta" value="Fotografi"
                class="w-4 h-4 cursor-pointer">
            <label class="cursor-pointer" for="Fotografi">Karya Fotografi</label>
        </div>
        <div class="flex items-center gap-5">
            <input type="radio" id="drama_koreografi" name="jenis_hak_cipta" value="drama_koreografi"
                class="w-4 h-4 cursor-pointer">
            <label class="cursor-pointer" for="drama_koreografi">Karya Drama dan Koreografi</label>
        </div>
        <div class="flex items-center gap-5">
            <input type="radio" id="rekaman" name="jenis_hak_cipta" value="rekaman" class="w-4 h-4 cursor-pointer">
            <label class="cursor-pointer" for="rekaman">Karya Rekaman</label>
        </div>
        <div class="flex items-center gap-5">
            <input type="radio" id="lainnya" name="jenis_hak_cipta" value="lainnya" class="w-4 h-4 cursor-pointer">
            <label class="cursor-pointer" for="lainnya">Karya Lainnya</label>
        </div>
        <div class="flex items-center gap-5">
            <input type="radio" id="tulis" name="jenis_hak_cipta" value="tulis" class="w-4 h-4 cursor-pointer">
            <label class="cursor-pointer" for="tulis">Karya Tulis</label>
        </div>
        <div class="flex items-center gap-5">
            <input type="radio" id="seni" name="jenis_hak_cipta" value="seni" class="w-4 h-4 cursor-pointer">
            <label class="cursor-pointer" for="seni">Karya Seni</label>
        </div>
        <div class="flex items-center gap-5">
            <input type="radio" id="komposisi_musik" name="jenis_hak_cipta" value="komposisi_musik"
                class="w-4 h-4 cursor-pointer">
            <label class="cursor-pointer" for="komposisi_musik">Komposisi Musik</label>
        </div>
        <div class="flex items-center gap-5">
            <input type="radio" id="audio_visual" name="jenis_hak_cipta" value="audio_visual"
                class="w-4 h-4 cursor-pointer">
            <label class="cursor-pointer" for="audio_visual">Karya Audio Visual</label>
        </div>
        <div class="flex items-center gap-5">
            <input type="radio" id="Fotografi" name="jenis_hak_cipta" value="Fotografi"
                class="w-4 h-4 cursor-pointer">
            <label class="cursor-pointer" for="Fotografi">Karya Fotografi</label>
        </div>
        <div class="flex items-center gap-5">
            <input type="radio" id="drama_koreografi" name="jenis_hak_cipta" value="drama_koreografi"
                class="w-4 h-4 cursor-pointer">
            <label class="cursor-pointer" for="drama_koreografi">Karya Drama dan Koreografi</label>
        </div>
        <div class="flex items-center gap-5">
            <input type="radio" id="rekaman" name="jenis_hak_cipta" value="rekaman"
                class="w-4 h-4 cursor-pointer">
            <label class="cursor-pointer" for="rekaman">Karya Rekaman</label>
        </div>
        <div class="flex items-center gap-5">
            <input type="radio" id="lainnya" name="jenis_hak_cipta" value="lainnya"
                class="w-4 h-4 cursor-pointer">
            <label class="cursor-pointer" for="lainnya">Karya Lainnya</label>
        </div>
        <div class="text-end">
            <a href="{{ route('submission.uploadFile') }}"
                class="px-4 py-2 rounded-md shadow bg-blue-600 text-white duration-200 hover:bg-blue-800">Berikutnya
                &raquo;</a>
        </div>
    </form>

</div>
@endsection