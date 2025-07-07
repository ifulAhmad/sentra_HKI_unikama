@extends('guest.partials.main')

@section('content')
<div class="container">
    <div class="md:flex-row flex gap-6 flex-col items-center bg-indigo-100 p-4 min-h-80 rounded-3xl mb-4">
        <div class="flex-1 text-center my-4">
            <h1 class="text-5xl font-extrabold text-indigo-400 flex flex-col">
                <span>APA ITU</span>
                <span>HAK CIPTA?</span>
            </h1>
        </div>
        <div class="flex-1 text-sm font-normal">
            <p>Hak Cipta adalah bagian dari kekayaan intelektual yang memiliki cakupan perlindungan yang sangat luas,
                meliputi bidang ilmu pengetahuan, seni, dan sastra (art and literary), termasuk juga program komputer.
                Pesatnya perkembangan ekonomi kreatif, yang menjadi salah satu pilar penting bagi Indonesia dan banyak
                negara lainnya, serta kemajuan teknologi informasi dan komunikasi, menuntut adanya pembaruan dalam
                Undang-Undang Hak Cipta. Pembaruan ini diperlukan karena Hak Cipta merupakan fondasi utama bagi ekonomi
                kreatif nasional. Dengan adanya Undang-Undang Hak Cipta yang mendukung perlindungan serta pengembangan
                ekonomi kreatif, diharapkan kontribusi dari sektor Hak Cipta dan Hak Terkait terhadap perekonomian
                negara dapat semakin maksimal.</p>
            <small>Source <i>
                    <a href="https://www.dgip.go.id/menu-utama/hak-cipta/pengenalan"
                        class="text-blue-500 hover:underline">Situs Resmi DGIP &raquo;</a>
                </i></small>
        </div>
    </div>

    <div class="md:flex-row-reverse flex gap-6 flex-col items-center p-4 min-h-80 rounded-3xl mb-4">
        <div class="flex-1 text-center my-4">
            <h1 class="text-5xl font-extrabold text-indigo-400 flex flex-col">
                <span>BERIKUT</span>
                <span>DEFINISINYA</span>
            </h1>
        </div>
        <div class="flex-1">
            <ol class="list-disc font-normal text-sm">
                <li class="mb-3">Hak Cipta adalah hak eksklusif yang dimiliki oleh pencipta, yang muncul secara
                    otomatis berdasarkan
                    prinsip deklaratif setelah karya tersebut diwujudkan dalam bentuk nyata, tanpa mengurangi
                    batasan-batasan yang diatur oleh peraturan perundang-undangan.</li>
                <li> Hak Terkait adalah hak
                    yang berhubungan dengan Hak Cipta, memberikan hak eksklusif kepada pelaku pertunjukan, produser
                    fonogram, atau lembaga penyiaran.</li>
            </ol>
            <small>Source
                <i>
                    <a href="https://www.dgip.go.id/menu-utama/hak-cipta/pengenalan"
                        class="text-blue-500 hover:underline">Situs Resmi DGIP &raquo;</a>
                </i>
            </small>
        </div>
    </div>

    <div class="md:flex-row flex gap-8 flex-col bg-indigo-100 items-center p-8 min-h-80 rounded-3xl mb-4">
        <div class="flex-1 text-center my-4">
            <h1 class="text-5xl font-extrabold text-indigo-400 flex flex-col">
                <span>APA SAJA</span>
                <span>YANG DILINDUNGI?</span>
            </h1>
        </div>
        <div class="flex-1">
            <ul class="list-decimal text-sm font-normal">
                <li class="mb-3">Buku, program komputer, pamflet, perwajahan (layout) karya tulis yang diterbitkan,
                    dan semua hasil karya tulis lain.</li>
                <li>Ceramah, kuliah, pidato, dan ciptaan lain yang sejenis dengan itu.</li>
                <li>Alat peraga yang dibuat untuk kepentingan pendidikan dan ilmu pengetahuan.</li>
                <li>Lagu atau musik dengan atau tanpa teks;</li>
                <li>Drama atau drama musikal, tari, koreografi, pewayangan, dan pantomim.</li>
                <li>Seni rupa dalam segala bentuk seperti seni lukis, gambar, seni ukir, seni kaligrafi, seni pahat,
                    seni patung, kolase, dan seni terapan.</li>
                <li>Arsitektur.</li>
                <li>Peta.</li>
                <li>Seni Batik.</li>
                <li>Fotografi.</li>
                <li>Terjemahan, tafsir, saduran, bunga rampai, dan karya lain dari hasil pengalihwujudan.</li>
            </ul>
            <small>Source
                <i>
                    <a href="https://www.dgip.go.id/menu-utama/hak-cipta/pengenalan"
                        class="text-blue-500 hover:underline">Situs Resmi DGIP &raquo;</a>
                </i>
            </small>
        </div>
    </div>

    <div class="p-8">
        <h1 class="font-bold text-lg">MASA PERLINDUNGAN</h1>
        <div class="bg-amber-600 h-[4px] rounded w-28 my-4"></div>
        <ul class="text-sm font-normal list-decimal">
            <li><b>Perlindungan Hak Cipta :</b> Seumur Hidup Pencipta + 70 Tahun.</li>
            <li><b>Program Komputer :</b> 50 tahun Sejak pertama kali dipublikasikan.</li>
            <li> <b>Pelaku :</b> 50 tahun sejak pertama kali dipertunjukkan.</li>
            <li><b>Produser Rekaman :</b> 50 tahun sejak Ciptaan difiksasikan.</li>
            <li><b>Lembaga Penyiaran :</b> 20 tahun sejak pertama kali disiarkan.</li>
        </ul>
        <small>Source
            <i>
                <a href="https://www.dgip.go.id/menu-utama/hak-cipta/pengenalan"
                    class="text-blue-500 hover:underline">Situs Resmi DGIP &raquo;</a>
            </i>
        </small>
    </div>
</div>
@endsection
