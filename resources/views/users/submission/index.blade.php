@extends('users.partials.main')
@section('users-content')
    @if (session()->has('success'))
        <div
            class="notif-success z-[999] fixed end-3 top-28 min-w-[400px] text-sm rounded-md text-green-600 bg-green-100 border border-green-400">
            <div class="relative p-4 flex justify-between gap-2">
                <p class="flex items-center gap-2">
                    <i class="bi bi-check-circle-fill"></i>
                    {{ session()->get('success') }}
                </p>
                <button type="button" id="notif-success" class="text-xl absolute right-2 text-green-400 bottom-7">
                    <i class="bi bi-x"></i>
                </button>
            </div>
        </div>
    @endif
    @if (session()->has('error'))
        <div
            class="notif-error z-[999] fixed end-3 top-28 min-w-[400px] text-sm rounded-md bg-red-100 text-red-600 border border-red-400">
            <div class="relative p-4 flex justify-between gap-2">
                <p class="flex items-center gap-2">
                    <i class="bi bi-exclamation-circle-fill"></i>
                    {{ session()->get('error') }}
                </p>
                <button type="button" id="notif-error" class="text-xl absolute right-2 text-red-400 bottom-7">
                    <i class="bi bi-x"></i>
                </button>
            </div>
        </div>
    @endif
    <div class="relative scrollbar-custom max-h-screen overflow-y-auto">
        <div class="bg-indigo-100 py-4 px-2">
            <h1 class="text-lg font-semibold">Formulir Pengajuan Hak Cipta</h1>
            <div class="bg-amber-600 h-[3px] rounded w-28 mt-2 mb-4"></div>

            <div class="mb-2 bg-amber-100 rounded-md p-4">
                <p class="text-sm text-amber-600"><strong>NOTE:</strong> Data Pencipta yang sudah terdaftar pada sistem
                    sebelumnya tidak dapat diubah. Silahkan hubungi pencipta terkait jika perlu perubahan data pencipta.</p>
            </div>

            <div class="mb-4 bg-white rounded-md p-4">
                <p class="text-sm">Lengkapi formulir persyaratan sebelum mengisi
                    pengajuan. <a href="{{ route('syaratLampiran') }}" class="text-indigo-600 hover:underline">Download
                        disini</a></p>
            </div>

            <form action="{{ route('submission.create') }}" method="post" enctype="multipart/form-data">
                @csrf
                {{-- Submission --}}
                <div class="mb-4 text-sm flex flex-col gap-3 p-1">
                    <div class="flex items-center justify-between gap-3">
                        <div class="shadow-md rounded-md flex-1 bg-white overflow-hidden">
                            <select name="skema"
                                class="p-3 w-full rounded-t-md border-b-2 outline-0 @error('skema') border-red-400 @enderror focus:border-amber-600">
                                <option disabled selected>
                                    Pilih Skema <span class="text-red-600">*</span>
                                </option>
                                <option value="lembaga">
                                    UNIKAMA, UMK, Lem.Pendidikan, Lem.pemerintahan
                                </option>
                                <option value="umum">Umum</option>
                            </select>
                            @error('skema')
                                <div class="text-red-600 text-sm px-2 py-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        {{-- Jenis Ciptaan --}}
                        <div class="shadow-md flex-1 rounded-md overflow-hidden bg-white">
                            <select id="copyright_sub_type_uuid" name="copyright_sub_type_uuid"
                                class="p-3 w-full rounded-t-md border-b-2 outline-0 @error('copyright_sub_type_uuid') border-red-400 @enderror focus:border-amber-600">
                                <option selected disabled>
                                    Pilih Jenis Hak Cipta
                                    <span class="text-red-600">*</span>
                                </option>
                                @foreach ($copyrightTypes as $copyrightType)
                                    <optgroup class="font-semibold" label="{{ $copyrightType->type }}"
                                        class="font-semibold">
                                        @foreach ($copyrightType->subTypes as $subtype)
                                            <option value="{{ $subtype->uuid }}">
                                                &bullet; {{ $subtype->type }}
                                            </option>
                                        @endforeach
                                    </optgroup>
                                @endforeach
                            </select>
                            @error('copyright_sub_type_uuid')
                                <div class="text-red-600 text-sm px-2 py-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="flex flex-col h-auto md:flex-row gap-3">
                        <div class="flex-1">
                            <div class="bg-white h-full shadow-md px-4 py-4 rounded-md flex flex-col gap-7">
                                <label for="judul" class="font-semibold">Judul Ciptaan
                                    <span class="text-red-600">*</span></label>
                                <input type="text" id="judul" name="judul"
                                    class="w-full px-1 py-2 outline-0 border-b-2 @error('judul') border-red-400 @enderror focus:border-amber-600"
                                    placeholder="Judul Ciptaan..." value="{{ old('judul') }}" />
                                @error('judul')
                                    <div class="text-red-600 text-sm">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="flex-1">
                            <div class="bg-white shadow-md px-4 py-4 rounded-md flex flex-col gap-4">
                                <label for="publikasi" class="font-semibold">Waktu Publikasi
                                    <span class="text-red-600">*</span></label>
                                <input type="date" id="publikasi" name="publikasi"
                                    class="w-full h-full px-1 py-3 outline-0 border-b-2 @error('publikasi') border-red-400 @enderror focus:border-amber-600"
                                    value="{{ old('publikasi') }}"></input>
                                @error('publikasi')
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
                                <label for="negara" class="font-semibold">Negara Pertama Kali Diumumkan
                                    <span class="text-red-600">*</span></label>
                                <input type="text" id="negara" name="negara"
                                    class="w-full px-1 py-2 outline-0 border-b-2 @error('negara') border-red-400 @enderror focus:border-amber-600"
                                    placeholder="Negara..." value="{{ old('negara') }}" />
                                @error('negara')
                                    <div class="text-red-600 text-sm">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="flex-1">
                            <div class="bg-white shadow-md px-4 py-4 rounded-md flex flex-col gap-7">
                                <label for="kota" class="font-semibold">Kota Pertama Kali Diumumkan
                                    <span class="text-red-600">*</span></label>
                                <input type="text" id="kota" name="kota"
                                    class="w-full px-1 py-2 outline-0 border-b-2 @error('kota') border-red-400 @enderror focus:border-amber-600"
                                    placeholder="Kota..." value="{{ old('kota') }}" />
                                @error('kota')
                                    <div class="text-red-600 text-sm">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="flex-1">
                        <div class="bg-white shadow-md px-4 py-4 rounded-md flex flex-col gap-4">
                            <label for="deskripsi" class="font-semibold">Deskripsi Produk Ciptaan
                                <span class="text-red-600">*</span></label>
                            <textarea id="deskripsi" name="deskripsi"
                                class="w-full h-full px-1 py-1 outline-0 border-b-2 @error('deskripsi') border-red-400 @enderror focus:border-amber-600"
                                placeholder="Deskripsi Produk...">{{ old('deskripsi') }}</textarea>
                            @error('deskripsi')
                                <div class="text-red-600 text-sm">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- Applicants --}}
                <div class="mb-4">
                    <div class="mx-3 flex items-center justify-between">
                        <div>
                            <h1 class="font-semibold text-lg">Pencipta</h1>
                        </div>
                        {{-- tombol --}}
                        <div class="text-3xl font-extrabold cursor-pointer" id="btn-add-applicant">
                            +
                        </div>
                    </div>
                    <div
                        class="main-accordion max-w-full mx-auto bg-indigo-100 border border-white overflow-hidden rounded-lg shadow-md">
                        <div class="accordion-item">
                            <div
                                class="w-full p-4 bg-white text-left text-lg hover:text-indigo-600 focus:outline-none flex justify-between items-center accordion-header">
                                <span>Data Pencipta</span>
                                <svg class="w-5 h-5 transform transition-transform duration-200 accordion-icon"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </div>
                            <div class="accordion-content hidden p-4 text-gray-600">
                                <div class="mb-4 text-sm flex flex-col gap-3 p-1">
                                    <div class="flex-1">
                                        <div class="bg-white flex gap-7 items-center shadow-md px-4 py-4 rounded-md">
                                            <label for="order" class="font-semibold">Pencipta ke : </label>
                                            <input type="number" id="order" name="order[]" min="1"
                                                class="outline-0 bg-gray-100 p-2 rounded-md focus:border-amber-600"
                                                placeholder="123..." required />
                                        </div>
                                    </div>
                                    <div class="flex flex-col md:flex-row gap-3">
                                        <div class="flex-1">
                                            <div class="bg-white shadow-md px-4 py-4 rounded-md flex flex-col gap-7">
                                                <label for="nik" class="font-semibold">NIK</label>
                                                <input type="number" id="nik" name="applicant[nik][]"
                                                    class="px-1 py-2 outline-0 border-b-2 focus:border-amber-600"
                                                    placeholder="90098xxx"
                                                    value="{{ old('applicant.nik.0', $applicant->nik) }}" />
                                            </div>
                                        </div>
                                        <div class="flex-1">
                                            <div class="bg-white shadow-md px-4 py-4 rounded-md flex flex-col gap-7">
                                                <label for="nama" class="font-semibold">Nama Pencipta</label>
                                                <input type="text" id="nama" name="applicant[nama][]"
                                                    class="px-1 py-2 outline-0 border-b-2 focus:border-amber-600"
                                                    placeholder="Nama ..."
                                                    value="{{ old('applicant.nama.0', $applicant->nama) }}" />
                                            </div>
                                        </div>
                                        <div class="flex-1">
                                            <div class="bg-white shadow-md px-4 py-4 rounded-md flex flex-col gap-7">
                                                <label for="email" class="font-semibold">Email</label>
                                                <input type="email" id="email" name="applicant[email][]"
                                                    class="px-1 py-2 outline-0 border-b-2 focus:border-amber-600"
                                                    placeholder="Email ..."
                                                    value="{{ old('applicant.email.0', $applicant->email) }}" />
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
                                                    value="{{ old('applicant.kontak.0', $applicant->kontak) }}" />
                                            </div>
                                        </div>
                                        <div class="flex-1">
                                            <div class="bg-white shadow-md px-4 py-4 rounded-md flex flex-col gap-7">
                                                <label for="tgl_lahir" class="font-semibold">Tanggal Lahir</label>
                                                <input type="date" id="tgl_lahir" name="applicant[tgl_lahir][]"
                                                    class="px-1 py-2 outline-0 border-b-2 focus:border-amber-600"
                                                    value="{{ old('applicant.tgl_lahir.0', $applicant->tgl_lahir) }}" />
                                            </div>
                                        </div>
                                        <div class="flex-1">
                                            <div class="bg-white shadow-md px-4 py-4 rounded-md flex flex-col gap-7">
                                                <label for="kewarganegaraan" class="font-semibold">Kewarganegaraan</label>
                                                <input type="text" id="kewarganegaraan"
                                                    name="applicant[kewarganegaraan][]"
                                                    class="px-1 py-2 outline-0 border-b-2 focus:border-amber-600"
                                                    placeholder="Kewarganegaraan..."
                                                    value="{{ old('applicant.kewarganegaraan.0', $applicant->kewarganegaraan) }}" />
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="bg-white shadow-md px-4 py-4 rounded-md flex flex-col gap-7">
                                            <label for="alamat" class="font-semibold">Alamat Lengkap</label>
                                            <input type="text" id="alamat" name="applicant[alamat][]"
                                                class="px-1 py-2 outline-0 border-b-2 focus:border-amber-600"
                                                placeholder="Alamat Lengkap..."
                                                value="{{ old('applicant.alamat.0', $applicant->alamat) }}" />
                                        </div>
                                    </div>
                                    <div>
                                        <div class="bg-white shadow-md px-4 py-4 rounded-md flex flex-col gap-7">
                                            <label for="kode_pos" class="font-semibold">Kode Pos</label>
                                            <input type="text" id="kode_pos" name="applicant[kode_pos][]"
                                                class="px-1 py-2 outline-0 border-b-2 focus:border-amber-600"
                                                placeholder="Kode Pos..."
                                                value="{{ old('applicant.kode_pos.0', $applicant->kode_pos) }}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- submission files --}}
                <div class="flex flex-col gap-3 p-1">
                    <div class="mx-3">
                        <h5 class="font-semibold text-lg">Unggah berkas</h5>
                    </div>
                    <div class="bg-white h-full shadow-md px-4 py-4 rounded-md flex flex-col gap-7">
                        <label for="link_ciptaan" class="font-light">Link File Ciptaan
                            <span class="text-red-600">*</span></label>
                        <p class="text-sm py-2 text-gray-400">
                            Isikan link google drive yang berisikan file ciptaan
                            anda! pastikan link tersebut dimulai dengan <b>https://</b>
                        </p>
                        <input type="text" id="link_ciptaan" name="link_ciptaan" pattern="https://.*"
                            class="w-full px-1 py-2 outline-0 border-b-2 @error('link_ciptaan') border-red-400 @enderror focus:border-amber-600"
                            placeholder="link ciptaan" value="{{ old('link_ciptaan') }}" />
                        @error('link_ciptaan')
                            <div class="text-red-600 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="bg-white shadow-md px-4 py-4 rounded-md flex flex-col gap-7">
                        <label for="file_pernyataan_karya_cipta" class="font-light">
                            Upload Bukti Form Pernyataan Karya Cipta
                            <span class="text-red-600">*</span>
                        </label>

                        <div id="pdf-preview-pernyataan"
                            class="w-full h-[300px] border border-gray-300 rounded-lg overflow-hidden mb-4 hidden">
                            <iframe id="pdf-frame-pernyataan" class="w-full h-full"></iframe>
                        </div>
                        <p class="text-sm text-gray-400">
                            Upload 1 file yang didukung: PDF. Maks 5 MB.
                        </p>
                        <input type="file" id="file_pernyataan_karya_cipta" name="file_pernyataan_karya_cipta"
                            accept=".pdf" class="px-1 py-2 outline-0 border-b-2 focus:border-amber-600"
                            placeholder="file" />
                    </div>

                    <div class="bg-white shadow-md px-4 py-4 rounded-md flex flex-col gap-7">
                        <label for="file_pengalihan_karya_cipta" class="font-light">
                            Upload Bukti Form Pengalihan Hak Cipta <br />
                            (Opsional: Diisi jika ikut skema kampus)
                        </label>

                        <div id="pdf-preview-pengalihan"
                            class="w-full h-[300px] border border-gray-300 rounded-lg overflow-hidden mb-4 hidden">
                            <iframe id="pdf-frame-pengalihan" class="w-full h-full"></iframe>
                        </div>
                        <p class="text-sm text-gray-400">
                            Upload 1 file yang didukung: PDF. Maks 5 MB.
                        </p>
                        <input type="file" id="file_pengalihan_karya_cipta" name="file_pengalihan_karya_cipta"
                            accept=".pdf" class="px-1 py-2 outline-0 border-b-2 focus:border-amber-600"
                            placeholder="file" />
                    </div>

                    <div class="bg-white shadow-md px-4 py-4 rounded-md flex flex-col gap-7">
                        <label for="file_scan_ktp" class="font-light">
                            Upload Scan KTP seluruh pencipta (Semua KTP dijadikan
                            satu file PDF)
                            <span class="text-red-600">*</span>
                        </label>

                        <div id="pdf-preview-ktp"
                            class="w-full h-[300px] border border-gray-300 rounded-lg overflow-hidden mb-4 hidden">
                            <iframe id="pdf-frame-ktp" class="w-full h-full"></iframe>
                        </div>
                        <p class="text-sm text-gray-400">
                            Upload 1 file yang didukung: PDF. Maks 5 MB.
                        </p>
                        <input type="file" id="file_scan_ktp" name="file_scan_ktp" accept=".pdf"
                            class="px-1 py-2 outline-0 border-b-2 focus:border-amber-600" placeholder="file" />
                    </div>

                    <div class="bg-white shadow-md px-4 py-4 rounded-md flex flex-col gap-7">
                        <label for="file_bukti_pembayaran" class="font-light">
                            Upload Scan Bukti Pembayaran Hak Cipta (Informasi Lebih
                            lanjut dapat menghubungi Staf DP3M)
                            <span class="text-red-600">*</span>
                        </label>

                        <div id="pdf-preview-bukti"
                            class="w-full h-[300px] border border-gray-300 rounded-lg overflow-hidden mb-4 hidden">
                            <iframe id="pdf-frame-bukti" class="w-full h-full"></iframe>
                        </div>
                        <p class="text-sm text-gray-400">
                            Upload 1 file yang didukung: PDF. Maks 5 MB.
                        </p>
                        <input type="file" id="file_bukti_pembayaran" name="file_bukti_pembayaran" accept=".pdf"
                            class="px-1 py-2 outline-0 border-b-2 focus:border-amber-600" placeholder="file" />
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

    <!-- modal popup -->
    <div id="nik-check-modal" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden">
        <form id="nik-check-form" class="flex justify-center w-full">
            <div class="bg-white p-6 rounded-lg shadow-lg w-2/3">
                <h2 class="text-xl font-semibold mb-4">Cek NIK</h2>
                <div class="flex flex-col gap-4">
                    <input type="number" id="check-nik"
                        class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-amber-600"
                        placeholder="Masukkan NIK" required />
                    <button type="button" id="btn-check-nik" class="w-full bg-blue-600 text-white py-2 rounded">
                        Cek
                    </button>
                    <button type="button" id="btn-close-nik-modal" class="w-full bg-gray-400 text-white py-2 rounded">
                        Tutup
                    </button>
                </div>
            </div>
        </form>
    </div>

    <script>
        $(document).ready(function() {
            setTimeout(() => {
                $(".notif-success").fadeOut();
            }, 5000);
            $("#notif-success").click(function() {
                $(".notif-success").addClass("hidden");
            });
            setTimeout(() => {
                $(".notif-error").fadeOut();
            }, 5000);
            $("#notif-error").click(function() {
                $(".notif-error").addClass("hidden");
            });

            $(document).ready(function() {
                let penciptaCounter = 2;

                // Tampilkan modal cek NIK
                $("#btn-add-applicant").click(function() {
                    $("#nik-check-modal").removeClass("hidden");
                });

                // Tutup modal cek NIK
                $("#btn-close-nik-modal").click(function() {
                    $("#nik-check-modal").addClass("hidden");
                    $("#check-nik").val(""); 
                });

                // Proses pengecekan NIK
                $("#btn-check-nik").click(function() {
                    const nik = $("#check-nik").val();

                    if (!nik) {
                        alert("Masukkan NIK terlebih dahulu!");
                        return;
                    }

                    $.ajax({
                        url: "{{ route('check.nik') }}", 
                        method: "POST",
                        data: {
                            nik: nik,
                            _token: $('meta[name="csrf-token"]').attr("content"),
                        },
                        success: function(response) {
                            if (response.status === "found") {
                                // Tambah accordion dengan data dari server
                                addAccordion(penciptaCounter, response.data);
                            } else {
                                // Tambah accordion kosong jika data tidak ditemukan
                                addAccordion(penciptaCounter, null);
                                alert(
                                    "NIK tidak ditemukan. Silakan isi data secara manual."
                                );
                            }
                            penciptaCounter++;
                            $("#nik-check-modal").addClass("hidden");
                            $("#check-nik").val("");
                        },
                        error: function() {
                            alert(
                                "Terjadi kesalahan saat memproses permintaan. Coba lagi nanti."
                            );
                        },
                    });
                });

                // Fungsi untuk menambah accordion
                function addAccordion(counter, data) {
                    const newItem = `
        <div class="accordion-item">
            <div
                class="w-full p-4 bg-white text-left text-lg hover:text-indigo-600 focus:outline-none flex justify-between items-center accordion-header">
                <span>Data pencipta</span>
                <svg class="w-5 h-5 transform transition-transform duration-200 accordion-icon"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </div>
            <div class="accordion-content hidden p-4 text-gray-600">
                <div class="mb-4 text-sm flex flex-col gap-3 p-1">
                    <div class="flex-1">
                        <div class="bg-white flex gap-7 items-center shadow-md px-4 py-4 rounded-md">
                            <label for="order-${counter}" class="font-semibold">Pencipta ke : </label>
                            <input type="number" id="order-${counter}" name="order[]" min="1"
                                class="outline-0 bg-gray-100 p-2 rounded-md focus:border-amber-600"
                                placeholder="123..." required />
                        </div>
                    </div>
                    <div class="flex flex-col md:flex-row gap-3">
                        <div class="flex-1">
                            <div class="bg-white shadow-md px-4 py-4 rounded-md flex flex-col gap-7">
                                <label for="nik-${counter}" class="font-semibold">NIK</label>
                                <input type="number" id="nik-${counter}" name="applicant[nik][]" class="px-1 py-2 outline-0 border-b-2 focus:border-amber-600"
                                    placeholder="90098xxx" value="${
                                        data ? data.nik : ""
                                    }">
                            </div>
                        </div>
                        <div class="flex-1">
                            <div class="bg-white shadow-md px-4 py-4 rounded-md flex flex-col gap-7">
                                <label for="nama-${counter}" class="font-semibold">Nama Pencipta</label>
                                <input type="text" id="nama-${counter}" name="applicant[nama][]" class="px-1 py-2 outline-0 border-b-2 focus:border-amber-600"
                                    placeholder="Nama ..." value="${
                                        data ? data.nama : ""
                                    }">
                            </div>
                        </div>
                        <div class="flex-1">
                            <div class="bg-white shadow-md px-4 py-4 rounded-md flex flex-col gap-7">
                                <label for="email-${counter}" class="font-semibold">Email</label>
                                <input type="email" id="email-${counter}" name="applicant[email][]"
                                class="px-1 py-2 outline-0 border-b-2 focus:border-amber-600"
                                placeholder="Email ..."
                                value="${data ? data.email : ""}">
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col md:flex-row gap-3">
                        <div class="flex-1">
                            <div class="bg-white shadow-md px-4 py-4 rounded-md flex flex-col gap-7">
                                <label for="kontak-${counter}" class="font-semibold">Nomor Telepon</label>
                                <input type="number" id="kontak-${counter}" name="applicant[kontak][]"
                                    class="px-1 py-2 outline-0 border-b-2 focus:border-amber-600"
                                    placeholder="Nomor Telepon..."
                                    value="${data ? data.kontak : ""}">
                            </div>
                        </div>
                        <div class="flex-1">
                            <div class="bg-white shadow-md px-4 py-4 rounded-md flex flex-col gap-7">
                               <label for="tgl_lahir-${counter}" class="font-semibold">Tanggal Lahir</label>
                                <input type="date" id="tgl_lahir-${counter}" name="applicant[tgl_lahir][]"
                                    class="px-1 py-2 outline-0 border-b-2 focus:border-amber-600"
                                    value="${data ? data.tgl_lahir : ""}">
                            </div>
                        </div>
                        <div class="flex-1">
                            <div class="bg-white shadow-md px-4 py-4 rounded-md flex flex-col gap-7">
                                <label for="kewarganegaraan-${counter}" class="font-semibold">Kewarganegaraan</label>
                                <input type="text" id="kewarganegaraan-${counter}"
                                    name="applicant[kewarganegaraan][]"
                                    class="px-1 py-2 outline-0 border-b-2 focus:border-amber-600"
                                    placeholder="Kewarganegaraan..."
                                    value="${data ? data.kewarganegaraan : ""}">
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="bg-white shadow-md px-4 py-4 rounded-md flex flex-col gap-7">
                            <label for="alamat-${counter}" class="font-semibold">Alamat</label>
                            <input type="text" id="alamat-${counter}" name="applicant[alamat][]"
                                class="px-1 py-2 outline-0 border-b-2 focus:border-amber-600"
                                placeholder="Alamat..."
                                value="${data ? data.alamat : ""}">
                        </div>
                    </div>
                    <div>
                        <div
                        class="bg-white shadow-md px-4 py-4 rounded-md flex flex-col gap-7">
                            <label 
                            for="kode_pos-${counter}"
                                class="font-semibold">Kode Pos</label>
                            <input
                                type="text"
                                id="kode_pos-${counter}"
                                name="applicant[kode_pos][]"
                                class="px-1 py-2 outline-0 border-b-2 focus:border-amber-600"
                                placeholder="Kode Pos..."
                                value="${data ? data.kode_pos : ""}">
                        </div>
                    </div>
                </div>
            </div>
        </div>`;

                    $(".main-accordion").append(newItem);
                }

                // Toggle accordion
                $(document).on("click", ".accordion-header", function() {
                    const $content = $(this).next(".accordion-content");
                    const $icon = $(this).find(".accordion-icon");
                    $content.slideToggle(200);
                    $icon.toggleClass("rotate-180");
                });
            });
        });

        function handleFilePreview(inputId, previewId, frameId) {
            $(`#${inputId}`).on("change", function(event) {
                const file = event.target.files[0];
                if (file && file.type === "application/pdf") {
                    const fileURL = URL.createObjectURL(file);
                    $(`#${frameId}`).attr("src", fileURL);
                    $(`#${previewId}`).removeClass("hidden");
                } else {
                    alert("Mohon unggah file berformat PDF.");
                }
            });
        }

        handleFilePreview(
            "file_pernyataan_karya_cipta",
            "pdf-preview-pernyataan",
            "pdf-frame-pernyataan"
        );
        handleFilePreview(
            "file_pengalihan_karya_cipta",
            "pdf-preview-pengalihan",
            "pdf-frame-pengalihan"
        );
        handleFilePreview("file_scan_ktp", "pdf-preview-ktp", "pdf-frame-ktp");
        handleFilePreview(
            "file_bukti_pembayaran",
            "pdf-preview-bukti",
            "pdf-frame-bukti"
        );
    </script>
@endsection
