@extends('users.partials.main')

@section('users-content')
    <div class="relative scrollbar-custom max-h-screen overflow-y-auto">
        <div class="bg-indigo-100 py-4 px-2">
            <h1 class="text-lg font-semibold">Formulir Pengajuan Hak Cipta</h1>
            <div class="bg-amber-600 h-[4px] rounded w-28 mt-2 mb-4"></div>

            <form action="{{ route('submission.create') }}" method="post" class="">
                @csrf
                {{-- Submission --}}
                <div class="mb-4 text-sm flex flex-col gap-3 p-1">
                    <div class="shadow-md">
                        <select name="skema" class="p-3 w-full rounded-t-md border-b-2 outline-0 focus:border-amber-600">
                            <option disabled selected>Pilih Skema</option>
                            <option value="lembaga">UNIKAMA, UMK, Lem.Pendidikan, Lem.pemerintahan</option>
                            <option value="umum">Umum</option>
                        </select>
                    </div>
                    <div class="flex flex-col md:flex-row gap-3">
                        <div class="flex-1">
                            <div class="bg-white shadow-md px-4 py-4 rounded-md flex flex-col gap-7">
                                <label for="judul" class="font-semibold">Judul Ciptaan</label>
                                <input type="text" id="judul" name="judul"
                                    class="w-full px-1 py-2 outline-0 border-b-2 @error('judul') border-red-400 @enderror focus:border-amber-600"
                                    placeholder="Judul Ciptaan...">
                                @error('judul')
                                    <div class="text-red-600 text-sm">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="flex-1">
                            <div class="bg-white shadow-md px-4 py-4 rounded-md flex flex-col gap-7">
                                <label for="deskripsi" class="font-semibold">Deskripsi Produk Ciptaan</label>
                                <input type="text" id="deskripsi" name="deskripsi"
                                    class="w-full px-1 py-2 outline-0 border-b-2 @error('deskripsi') border-red-400 @enderror focus:border-amber-600"
                                    placeholder="Deskripsi Produk...">
                                @error('deskripsi')
                                    <div class="text-red-600 text-sm">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col md:flex-row gap-3 mb-1">
                        <div class="flex-1">
                            <div class="bg-white shadow-md px-4 py-4 rounded-md flex flex-col gap-7">
                                <label for="negara" class="font-semibold">Negara Pertama Kali Diumumkan</label>
                                <input type="text" id="negara" name="negara"
                                    class="w-full px-1 py-2 outline-0 border-b-2 @error('negara') border-red-400 @enderror focus:border-amber-600"
                                    placeholder="Negara...">
                                @error('negara')
                                    <div class="text-red-600 text-sm">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="flex-1">
                            <div class="bg-white shadow-md px-4 py-4 rounded-md flex flex-col gap-7">
                                <label for="kota" class="font-semibold">Kota Pertama Kali Diumumkan</label>
                                <input type="text" id="kota" name="kota"
                                    class="w-full px-1 py-2 outline-0 border-b-2 @error('kota') border-red-400 @enderror focus:border-amber-600"
                                    placeholder="Kota...">
                                @error('kota')
                                    <div class="text-red-600 text-sm">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Applicants --}}

                <div class="mb-4">
                    <div class="mx-3 flex items-center justify-between">
                        <div>
                            <h1 class="font-semibold text-lg">Pencipta</h1>
                            <div class="bg-amber-600 w-28 h-[4px] rounded my-2"></div>
                        </div>
                        {{-- tombol --}}
                        <div class="text-3xl font-extrabold cursor-pointer" id="btn-add-applicant">+</div>
                    </div>
                    <div
                        class="main-accordion max-w-full mx-auto bg-indigo-100 border border-white overflow-hidden rounded-lg shadow-md">
                        <div class="accordion-item">
                            <div
                                class="w-full p-4 bg-white text-left text-lg hover:text-indigo-600 focus:outline-none flex justify-between items-center accordion-header">
                                <span>Pencipta 1</span>
                                <svg class="w-5 h-5 transform transition-transform duration-200 accordion-icon"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </div>
                            <div class="accordion-content hidden p-4 text-gray-600">
                                <div class="mb-4 text-sm flex flex-col gap-3 p-1">
                                    <div class="flex flex-col md:flex-row gap-3">
                                        <div class="flex-1">
                                            <div class="bg-white shadow-md px-4 py-4 rounded-md flex flex-col gap-7">
                                                <label for="nama" class="font-semibold">Nama Pencipta</label>
                                                <input type="text" id="nama" name="applicant[nama][]"
                                                    class="px-1 py-2 outline-0 border-b-2 focus:border-amber-600"
                                                    placeholder="Nama ..." value="{{ old('applicant.nama.0') }}">
                                            </div>
                                        </div>
                                        <div class="flex-1">
                                            <div class="bg-white shadow-md px-4 py-4 rounded-md flex flex-col gap-7">
                                                <label for="email" class="font-semibold">Email</label>
                                                <input type="email" id="email" name="applicant[email][]"
                                                    class="px-1 py-2 outline-0 border-b-2 focus:border-amber-600"
                                                    placeholder="Email ..." value="{{ old('applicant.email.0') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex flex-col md:flex-row gap-3">
                                        <div class="flex-1">
                                            <div class="bg-white shadow-md px-4 py-4 rounded-md flex flex-col gap-7">
                                                <label for="kontak" class="font-semibold">Nomor Telepon</label>
                                                <input type="number" id="kontak" name="applicant[kontak][]"
                                                    class="px-1 py-2 outline-0 border-b-2 focus:border-amber-600"
                                                    placeholder="Nomor Telepon..."
                                                    value="{{ old('applicant.kontak.0') }}">
                                            </div>
                                        </div>
                                        <div class="flex-1">
                                            <div class="bg-white shadow-md px-4 py-4 rounded-md flex flex-col gap-7">
                                                <label for="tgl_lahir" class="font-semibold">Tanggal Lahir</label>
                                                <input type="date" id="tgl_lahir" name="applicant[tgl_lahir][]"
                                                    class="px-1 py-2 outline-0 border-b-2 focus:border-amber-600"
                                                    value="{{ old('applicant.tgl_lahir.0') }}">
                                            </div>
                                        </div>
                                        <div class="flex-1">
                                            <div class="bg-white shadow-md px-4 py-4 rounded-md flex flex-col gap-7">
                                                <label for="kewarganegaraan" class="font-semibold">Kewarganegaraan</label>
                                                <input type="text" id="kewarganegaraan"
                                                    name="applicant[kewarganegaraan][]"
                                                    class="px-1 py-2 outline-0 border-b-2 focus:border-amber-600"
                                                    placeholder="Kewarganegaraan..."
                                                    value="{{ old('applicant.kewarganegaraan.0') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="bg-white shadow-md px-4 py-4 rounded-md flex flex-col gap-7">
                                            <label for="alamat_lengkap" class="font-semibold">Alamat Lengkap</label>
                                            <input type="text" id="alamat_lengkap" name="applicant[alamat][]"
                                                class="px-1 py-2 outline-0 border-b-2 focus:border-amber-600"
                                                placeholder="Alamat Lengkap..." value="{{ old('applicant.alamat.0') }}">
                                        </div>
                                    </div>
                                    <div>
                                        <div class="bg-white shadow-md px-4 py-4 rounded-md flex flex-col gap-7">
                                            <label for="kode_pos" class="font-semibold">Kode Pos</label>
                                            <input type="text" id="kode_pos" name="applicant[kode_pos][]"
                                                class="px-1 py-2 outline-0 border-b-2 focus:border-amber-600"
                                                placeholder="Kode Pos..." value="{{ old('applicant.kode_pos.0') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                {{-- Jenis Ciptaan --}}
                <div class="flex flex-col gap-5 mb-5 border-b pb-5">
                    <div class="mx-3">
                        <label for="jenis_hak_cipta" class="font-semibold text-lg">Jenis Hak Cipta</label>
                        <div class="bg-amber-600 w-28 h-[4px] rounded my-2"></div>
                    </div>
                    <select id="jenis_hak_cipta" name="jenis_hak_cipta"
                        class="w-full p-4 border rounded-md cursor-pointer shadow-md">
                        <option selected disabled>Pilih Jenis Hak Cipta</option>
                        <optgroup class="font-semibold" label="Karya Tulis" class="font-semibold">
                            <option value="tulis">&bullet; Karya Tulis</option>
                        </optgroup>
                        <optgroup class="font-semibold" label="Karya Seni">
                            <option value="seni">&bullet; Karya Seni</option>
                        </optgroup>
                        <optgroup class="font-semibold" label="Komposisi Musik">
                            <option value="komposisi_musik">&bullet; Komposisi Musik</option>
                        </optgroup>
                        <optgroup class="font-semibold" label="Karya Audio Visual">
                            <option value="audio_visual">&bullet; Karya Audio Visual</option>
                        </optgroup>
                        <optgroup class="font-semibold" label="Karya Fotografi">
                            <option value="Fotografi">&bullet; Karya Fotografi</option>
                        </optgroup>
                        <optgroup class="font-semibold" label="Karya Drama dan Koreografi">
                            <option value="drama_koreografi">&bullet; Karya Drama dan Koreografi</option>
                        </optgroup>
                        <optgroup class="font-semibold" label="Karya Rekaman">
                            <option value="rekaman">&bullet;Karya Rekaman</option>
                        </optgroup>
                        <optgroup class="font-semibold" label="Karya Lainnya">
                            <option value="lainnya">&bullet; Karya Lainnya</option>
                        </optgroup>
                    </select>
                </div>

                {{-- submission files --}}
                <div class="flex flex-col gap-3 p-1">
                    <div class="mx-3">
                        <h5 class="font-semibold text-lg">Unggah berkas</h5>
                        <div class="bg-amber-600 w-28 h-[4px] rounded my-2"></div>
                    </div>
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
                </div>

                {{-- Submit Button --}}
                <div class="flex justify-end py-4">
                    <button type="submit"
                        class="px-4 py-2 bg-indigo-600 text-white font-semibold rounded-md duration-200 hover:bg-indigo-700 focus:outline-none">
                        Ajukan Hak Cipta
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // Event untuk membuka dan menutup accordion
            $(document).on('click', '.accordion-header', function() {
                var $content = $(this).next('.accordion-content');
                var $icon = $(this).find('.accordion-icon');
                $content.slideToggle(200);
                $icon.toggleClass('rotate-180');
            });

            // Menambah pencipta baru
            let penciptaCounter = 2; // Untuk menandai nomor pencipta yang baru

            $('#btn-add-applicant').click(function() {
                var newItem = $('.accordion-item:first').clone(); // Mengkloning item pertama

                // Mengubah label agar sesuai dengan nomor pencipta
                newItem.find('.accordion-header span').text('Pencipta ' + penciptaCounter);

                // Mengosongkan input di dalam accordion yang baru
                newItem.find('input').val('');

                // Menambahkan tombol hapus hanya untuk item kedua dan seterusnya
                if (penciptaCounter > 1) {
                    newItem.find('.accordion-content').append(
                        '<button type="button" class="btn-remove-accordion px-4 py-2 mt-2 bg-red-600 text-white rounded-md">Hapus Pencipta</button>'
                    );
                }

                // Menambahkan item baru setelah item terakhir
                $('.main-accordion').append(newItem);
                penciptaCounter++; // Menambah nomor pencipta
            });

            // Event untuk menghapus accordion yang dipilih
            $(document).on('click', '.btn-remove-accordion', function() {
                var $item = $(this).closest('.accordion-item');
                $item.remove(); // Menghapus item accordion
            });
        });

        function handleFilePreview(inputId, previewId, frameId) {
            $(`#${inputId}`).on('change', function(event) {
                const file = event.target.files[0];
                if (file && file.type === "application/pdf") {
                    const fileURL = URL.createObjectURL(file);
                    $(`#${frameId}`).attr('src', fileURL);
                    $(`#${previewId}`).removeClass('hidden');
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
