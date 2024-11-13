@extends('guest.partials.main')

@section('content')
    <div class="container pt-6 rounded-xl overflow-hidden bg-indigo-100">
        <div class="flex justify-center mb-4">
            <h1 class="text-3xl md:text-5xl font-bold text-indigo-400 py-4">PENGENALAN PATEN</h1>
        </div>
        <div class="bg-white min-h-[300px]">
            <div class="mb-3">
                <div class="max-w-full mx-auto bg-white p-4 rounded-lg shadow-md">
                    <!-- Item -->
                    <div class="border-b border-indigo-200">
                        <button
                            class="w-full text-left py-4 text-lg font-medium text-gray-700 hover:text-indigo-600 focus:outline-none flex justify-between items-center accordion-header">
                            <span>Apa Itu Paten?</span>
                            <svg class="w-5 h-5 transform transition-transform duration-200 accordion-icon"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div class="accordion-content hidden p-4 md:pe-20 text-gray-600">
                            <p>Paten adalah hak eksklusif inventor atas invensi di bidang teknologi untuk selama waktu
                                tertentu melaksanakan sendiri atau memberikan persetujuan kepada pihak lain untuk
                                melaksanakan invensinya.
                            </p>
                        </div>
                    </div>
                    <div class="border-b border-indigo-200">
                        <button
                            class="w-full text-left py-4 text-lg font-medium text-gray-700 hover:text-indigo-600 focus:outline-none flex justify-between items-center accordion-header">
                            <span>Apa Itu Invensi?</span>
                            <svg class="w-5 h-5 transform transition-transform duration-200 accordion-icon"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div class="accordion-content hidden p-4 md:pe-20 text-gray-600">
                            <p class="mb-3">Invensi adalah ide inventor yang dituangkan ke dalam suatu kegiatan pemecahan
                                masalah yang
                                spesifik di bidang teknologi, dapat berupa produk atau proses atau penyempurnaan dan
                                pengembangan produk atau proses.</p>
                            <div class="flex flex-col gap-3">
                                <h5 class="font-semibold text-lg">Invensi bagaimanakah yang dapat dipatenkan?</h5>
                                <p>Invensi dapat dipatenkan jika invensi tersebut:</p>
                                <ol class="list-disc list-outside flex flex-col gap-2 px-8">
                                    <li> Jika pada saat pengajuan permohonan Paten invensi tersebut tidak sama dengan
                                        teknologi yang
                                        diungkapkan sebelumnya;</li>
                                    <li>Mengandung langkah inventif. Jika invensi tersebut merupakan hal yang tidak dapat
                                        diduga
                                        sebelumnya bagi seseorang yang mempunyai keahlian tertentu di bidang teknik;</li>
                                    <li>Dapat diterapkan dalam industri. Jika invensi tersebut dapat diproduksi atau dapat
                                        digunakan
                                        dalam berbagai jenis industri.</li>
                                </ol>



                            </div>
                        </div>
                    </div>
                    <div class="border-b border-indigo-200">
                        <button
                            class="w-full text-left py-4 text-lg font-medium text-gray-700 hover:text-indigo-600 focus:outline-none flex justify-between items-center accordion-header">
                            <span>Berapa lama Paten berlaku?</span>
                            <svg class="w-5 h-5 transform transition-transform duration-200 accordion-icon"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div class="accordion-content hidden p-4 md:pe-20 text-gray-600">
                            <ul class="list-decimal list-outside">
                                <li class="mb-3">Paten diberikan untuk jangka waktu selama 20 tahun sejak tanggal
                                    penerimaan permohonan
                                    Paten.</li>
                                <li>Paten sederhana diberikan untuk jangka waktu 10 tahun sejak tanggal penerimaan
                                    permohonan Paten sederhana.</li>
                            </ul>
                        </div>
                    </div>
                    <div class="border-b border-indigo-200">
                        <button
                            class="w-full text-left py-4 text-lg font-medium text-gray-700 hover:text-indigo-600 focus:outline-none flex justify-between items-center accordion-header">
                            <span>Bagaimana cara mengajukan permohonan Paten?</span>
                            <svg class="w-5 h-5 transform transition-transform duration-200 accordion-icon"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div class="accordion-content hidden px-4 md:pe-20 text-gray-600">
                            <ul class="list-decimal list-outside flex flex-col gap-3">
                                <li>Mengajukan permohonan ke kantor Direktorat Jenderal Kekayaan Intelektual
                                    (DJKI) secara tertulis dalam Bahasa Indonesia dengan mengisi formulir permohonan yang
                                    disediakan dan diketik rangkap 2.</li>
                                <li>Pemohon wajib melampirkan:
                                    <ul class="list-decimal list-outside ps-6 flex flex-col gap-2">
                                        <li>surat kuasa khusus, apabila permohonan diajukan melalui konsultan KI terdaftar
                                            selaku
                                            kuasa;</li>
                                        <li>surat pengalihan hak, apabila permohonan diajukan oleh pihak lain yang bukan
                                            inventor;</li>
                                        <li>deskripsi permohonan Paten dibuat rangkap 2 dan mencakup:
                                            <ol class="list-disc list-outside ps-6 flex flex-col gap-2 mb-3">
                                                <li>judul invensi, dibuat dalam huruf kapital dan tidak digaris bawah;</li>
                                                <li>bidang teknik invensi, memuat secara umum dimana invensi ini termasuk di
                                                    dalam bidang teknik tersebut dengan mengemukakan kekhususannya;</li>
                                                <li>latar belakang invensi, harus dikemukakan teknologi yang telah ada
                                                    sebelumnya dan relevan dengan invensi tersebut;</li>
                                                <li>ringkasan invensi, memuat ciri teknis dari pokok invensi yang
                                                    diungkapkan dalam klaim;</li>
                                                <li>uraian singkat gambar (bila disertakan gambar), memuat keterangan gambar
                                                    secara singkat;</li>
                                                <li>uraian lengkap invensi, merupakan suatu pengungkapan invensi yang
                                                    selengkap-lengkapnya, tidak boleh ada yang tertinggal atau tidak
                                                    diungkapkan;</li>
                                                <li>klaim (dibuat pada halaman terpisah), memuat pokok invensi dan tidak
                                                    boleh berisikan gambar atau grafik tetapi dapat memuat tabel rumus
                                                    matematika atau reaksi kimia;</li>
                                                <li>abstrak (dibuat pada halaman terpisah), berisi ringkasan dari uraian
                                                    lengkap invensi dan tidak lebih dari 200 kata.</li>
                                            </ol>
                                            <ul class="list-decimal list-outside ps-10 flex flex-col gap-2">
                                                <li>gambar, apabila ada dibuat rangkap 2: hanya memuat tanda-tanda, simbol,
                                                    huruf, angka, bagan, atau diagram yang menjelaskan tentang bagian-bagian
                                                    dari invensi, tetapi tidak boleh terdapat kata-kata penjelasan;</li>
                                                <li>bukti prioritas asli, dan terjemahan halaman depan dalam bahasa
                                                    Indonesia rangkap 2, apabila diajukan dengan hak prioritas;</li>
                                                <li>terjemahan uraian invensi dalam bahasa Inggris, apabila invensi tersebut
                                                    aslinya dalam bahasa asing selain bahasa Inggris;</li>
                                                <li>bukti pembayaran biaya permohonan Paten;</li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li>Penulisan deskripsi, klaim, abstrak dan gambar sebagaimana dimaksud dalam butir 2 huruf
                                    c dan d ditentukan sebagai berikut:</li>
                                <li>setiap lembar kertas hanya salah satu mukanya yang boleh dipergunakan untuk penulisan
                                    dan gambar;</li>
                                <li>deskripsi, klaim dan abstrak diketik dalam kertas HVS atau yang sejenis dan terpisah,
                                    ukuran A4, berat minimum 80 gram dengan batas sebagai berikut:
                                    <ol class="list-disc list-outside ps-6 flex flex-col gap-2">
                                        <li>batas atas: 2 cm</li>
                                        <li>batas bawah: 2 cm</li>
                                        <li>batas kiri: 2,5 cm</li>
                                        <li>batas kanan: 2 cm</li>
                                    </ol>
                                </li>
                                <li>kertas A4 tersebut harus berwarna putih, rata tidak mengkilap dan pemakaiannya dilakukan
                                    dengan menempatkan sisinya yang pendek di bagian atas dan bawah (kecuali dipergunakan
                                    untuk gambar);</li>
                                <li>setiap lembar deskripsi, klaim dan gambar diberi nomor urut angka Arab pada bagian
                                    tengah atas dan tidak pada batas sebagaimana yang dimaksud pada butir 3 huruf b (1);
                                </li>
                                <li>pada setiap lima baris pengetikan baris uraian dan klaim, harus diberi nomor baris dan
                                    setiap halaman baru merupakan permulaan (awal) nomor dan ditempatkan di sebelah kiri
                                    uraian atau klaim serta tidak pada batas sebagaimana yang dimaksud pada butir 3 huruf b
                                    (3);</li>
                                <li>pengetikan harus dilakukan dengan menggunakan tinta (toner) warna hitam, dengan ukuran
                                    spasi 1,5 dan huruf tegak berukuran tinggi huruf minimum 0,21 cm;</li>
                                <li>tanda-tanda dengan garis, rumus kimia, dan tanda-tanda tertentu dapat ditulis dengan
                                    tangan;</li>
                                <li>gambar harus menggunakan tinta cina hitam pada kertas gambar putih ukuran A4 dengan
                                    berat minimum 100 gram yang tidak mengkilap dengan batas sebagai berikut:
                                    <ol class="list-disc list-outside ps-6 flex flex-col gap-2">
                                        <li>batas atas: 2,5 cm</li>
                                        <li>batas bawah: 1 cm</li>
                                        <li>batas kiri: 2,5 cm</li>
                                        <li>batas kanan: 1,5 cm</li>
                                    </ol>
                                </li>
                                <li>seluruh dokumen Paten yang diajukan harus dalam lembar-lembar kertas utuh, tidak boleh
                                    dalam keadaan tersobek, terlipat, rusak atau gambar yang ditempelkan;</li>
                                <li>setiap istilah yang dipergunakan dalam deskripsi, klaim, abstrak dan gambar harus
                                    konsisten satu sama lain.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $(".accordion-header").click(function() {
                $(this).next(".accordion-content").slideToggle(200);
                $(this).find(".accordion-icon").toggleClass("transform rotate-180");
            });
        });
    </script>
@endsection
