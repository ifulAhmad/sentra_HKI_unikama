@extends('users.partials.main')

@section('users-content')
<div class="bg-indigo-100 py-4">
    <h1 class="text-lg font-semibold">Formulir Pengajuan Hak Cipta</h1>
    <div class="bg-amber-600 h-[4px] rounded w-28 mt-2 mb-4"></div>

    <div class="text-center my-3 text-xl text-amber-600">
        - <i class="bi bi-6-circle-fill"></i> -
    </div>
    <form action="" method="get" class="flex flex-col gap-3 p-1">
        <div class="bg-white shadow-md px-4 py-4 rounded-md flex flex-col gap-7">
            <label for="file_pernyataan_karya_cipta" class="font-light">
                Upload Bukti Form Pernyataan Karya Cipta (<a href="#"
                    class="text-blue-600 hover:underline">Download Form</a>)
                <span class="text-red-600">&cir;</span>
            </label>

            <div id="pdf-preview-pernyataan"
                class="w-full h-[300px] border border-gray-300 rounded-lg overflow-hidden mb-4 hidden">
                <iframe id="pdf-frame-pernyataan" class="w-full h-full"></iframe>
            </div>
            <p class="text-sm text-gray-400">Upload 1 file yang didukung: PDF. Maks 10 MB.</p>
            <input type="file" id="file_pernyataan_karya_cipta" accept=".pdf"
                class="px-1 py-2 outline-0 border-b-2 focus:border-amber-600" placeholder="file">
        </div>

        <div class="bg-white shadow-md px-4 py-4 rounded-md flex flex-col gap-7">
            <label for="file_pengalihan_karya_cipta" class="font-light">
                Upload Bukti Form Pengalihan Hak Cipta
                (<a href="#" class="text-blue-600 hover:underline">Download Form</a>) <br>
                (Opsional: Diisi jika ikut skema kampus)
            </label>

            <div id="pdf-preview-pengalihan"
                class="w-full h-[300px] border border-gray-300 rounded-lg overflow-hidden mb-4 hidden">
                <iframe id="pdf-frame-pengalihan" class="w-full h-full"></iframe>
            </div>
            <p class="text-sm text-gray-400">Upload 1 file yang didukung: PDF. Maks 10 MB.</p>
            <input type="file" id="file_pengalihan_karya_cipta" accept=".pdf"
                class="px-1 py-2 outline-0 border-b-2 focus:border-amber-600" placeholder="file">
        </div>

        <div class="bg-white shadow-md px-4 py-4 rounded-md flex flex-col gap-7">
            <label for="file_produk_ciptaan" class="font-light">
                Upload Produk Ciptaan <span class="text-red-600">&cir;</span>
            </label>

            <p class="text-sm text-gray-400">Upload 1 file yang didukung: PDF, audio, document, drawing, image,
                presentation,
                spreadsheet, atau video. Maks 10 MB.</p>
            <input type="file" id="file_produk_ciptaan" accept=".pdf"
                class="px-1 py-2 outline-0 border-b-2 focus:border-amber-600" placeholder="file">
        </div>

        <div class="bg-white shadow-md px-4 py-4 rounded-md flex flex-col gap-7">
            <label for="file_scan_ktp" class="font-light">
                Upload Scan KTP seluruh pencipta (Semua KTP dijadikan satu file PDF)
                <span class="text-red-600">&cir;</span>
            </label>

            <div id="pdf-preview-ktp"
                class="w-full h-[300px] border border-gray-300 rounded-lg overflow-hidden mb-4 hidden">
                <iframe id="pdf-frame-ktp" class="w-full h-full"></iframe>
            </div>
            <p class="text-sm text-gray-400">Upload 1 file yang didukung: PDF. Maks 10 MB.</p>
            <input type="file" id="file_scan_ktp" accept=".pdf"
                class="px-1 py-2 outline-0 border-b-2 focus:border-amber-600" placeholder="file">
        </div>

        <div class="bg-white shadow-md px-4 py-4 rounded-md flex flex-col gap-7">
            <label for="file_bukti_pembayaran" class="font-light">
                Upload Scan Bukti Pembayaran Hak Cipta
                (Informasi Lebih lanjut dapat menghubungi Staf DP3M)
                <span class="text-red-600">&cir;</span>
            </label>

            <div id="pdf-preview-bukti"
                class="w-full h-[300px] border border-gray-300 rounded-lg overflow-hidden mb-4 hidden">
                <iframe id="pdf-frame-bukti" class="w-full h-full"></iframe>
            </div>
            <p class="text-sm text-gray-400">Upload 1 file yang didukung: PDF. Maks 10 MB.</p>
            <input type="file" id="file_bukti_pembayaran" accept=".pdf"
                class="px-1 py-2 outline-0 border-b-2 focus:border-amber-600" placeholder="file">
        </div>

        <div class="text-end">
            <a href="{{ route('submission.pernyataan') }}"
                class="px-4 py-2 rounded-md shadow bg-blue-600 text-white duration-200 hover:bg-blue-800">Berikutnya
                &raquo;</a>
        </div>
    </form>
</div>

<script>
    function handleFilePreview(inputId, previewId, frameId) {
        const inputElement = document.getElementById(inputId);
        const previewElement = document.getElementById(previewId);
        const frameElement = document.getElementById(frameId);

        inputElement.addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file && file.type === "application/pdf") {
                const fileURL = URL.createObjectURL(file);
                frameElement.src = fileURL;
                previewElement.classList.remove('hidden');
            } else {
                alert("Mohon unggah file berformat PDF.");
            }
        });
    }

    handleFilePreview('file_pernyataan_karya_cipta', 'pdf-preview-pernyataan', 'pdf-frame-pernyataan');
    handleFilePreview('file_pengalihan_karya_cipta', 'pdf-preview-pengalihan', 'pdf-frame-pengalihan');
    handleFilePreview('file_scan_ktp', 'pdf-preview-ktp', 'pdf-frame-ktp');
    handleFilePreview('file_bukti_pembayaran', 'pdf-preview-bukti', 'pdf-frame-bukti');
</script>
@endsection