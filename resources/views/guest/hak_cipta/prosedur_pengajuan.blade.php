@extends('guest.partials.main')

@section('content')
<article class="container bg-prosedur-pengajuan min-h-screen bg-no-repeat bg-center bg-cover rounded-xl">
    <div class="p-4">
        <h1 class="text-xl font-semibold">Cara Pengajuan Hak Cipta</h1>
        <div class="bg-amber-600 h-[4px] rounded w-28 my-4"></div>
        <div class="text-sm md:text-base font-normal">
            <p class="mb-2">Untuk mengajukan pendaftaran hak cipta, pemohon perlu melengkapi dokumen yang
                diperlukan. Berikut adalah
                dokumen-dokumen yang harus disiapkan untuk pendaftaran hak cipta:</p>
            <ul class="list-decimal ms-8 mb-2 flex flex-col gap-2">
                <li>Mengisi formulir permohonan pendaftaran hak cipta</li>
                <li>Membuat surat pernyataan kepemilikan ciptaan yang di tandatangani oleh semua pemegang hak cipta
                    (template bisa di donwload pada menu <span class="text-amber-600 hover:underline">Template</span> )
                </li>
                <li>Membuat surat pengalihan hak cipta yang di tandatangani semua pencipta dan pemegang hak cipta (jika
                    di alihkan dan template bisa di donwload pada menu <span
                        class="text-amber-600 hover:underline">Template</span> )</li>
                <li>Melampirkan contoh ciptaan</li>
                <li>Membuat uraian ciptaan</li>
                <li>Melampirkan bukti kewarganegaraan pencipta (KTP)</li>
                <li>Melampirkan bukti badan hukum (jika berbadan hukum)</li>
                <li>Melampirkan surat kuasa (jika dikuasakan)</li>
                <li>Membayar biaya permohonan</li>
            </ul>
            <p class="mb-5">Seluruh dokumen yang telah disiapkan di atas dapat diserahkan ke kantor Sentra HKI
                Universitas PGRI
                Kanjuruhan Malang untuk menjalani pemeriksaan administratif sebelum didaftarkan.</p>
            <p>Lanjutkan Proses Dengan Mengakses Tombol Dibawah Ini!</p>
        </div>
        <a href="#" class="font-semibold text-amber-600 hover:underline">Ajukan Sekarang &raquo;</a>
    </div>
</article>
@endsection