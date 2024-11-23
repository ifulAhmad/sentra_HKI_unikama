@extends('users.partials.main')

@section('users-content')
    @if (session()->has('success'))
        <div
            class="notif-success z-[999] fixed end-3 top-28 min-w-[400px] text-sm rounded-md text-green-600 bg-green-100 border border-green-400">
            <div class="relative p-4 flex justify-between gap-2">
                <p class="flex items-center gap-2"><i class="bi bi-check-circle-fill"></i> {{ session()->get('success') }}</p>
                <button type="button" id="notif-success" class="text-xl absolute right-2 text-green-400 bottom-7"><i
                        class="bi bi-x"></i></button>
            </div>
        </div>
    @endif
    @if (session()->has('error'))
        <div
            class="notif-error z-[999] fixed end-3 top-28 min-w-[400px] text-sm rounded-md bg-red-100 text-red-600 border border-red-400">
            <div class="relative p-4 flex justify-between gap-2">
                <p class="flex items-center gap-2"><i class="bi bi-exclamation-circle-fill"></i>
                    {{ session()->get('error') }}
                </p>
                <button type="button" id="notif-error" class="text-xl absolute right-2 text-red-400 bottom-7"><i
                        class="bi bi-x"></i></button>
            </div>
        </div>
    @endif
    <div class="relative scrollbar-custom max-h-screen overflow-y-auto">
        <div class="bg-indigo-100 py-4 px-2">
            <h1 class="text-lg font-semibold">Formulir Pengajuan Hak Cipta</h1>
            <div class="bg-amber-600 h-[3px] rounded w-28 mt-2 mb-4"></div>

            <form action="{{ route('submission.create') }}" method="post" enctype="multipart/form-data">
                @csrf
                {{-- Submission --}}
                <div class="mb-4 text-sm flex flex-col gap-3 p-1">
                    <div class="flex items-center justify-between gap-3">
                        <div class="shadow-md rounded-md flex-1 bg-white overflow-hidden">
                            <select name="skema"
                                class="p-3 w-full rounded-t-md border-b-2 outline-0 @error('skema') border-red-400 @enderror focus:border-amber-600">
                                <option disabled selected>Pilih Skema <span class="text-red-600">*</span></option>
                                <option value="lembaga">UNIKAMA, UMK, Lem.Pendidikan, Lem.pemerintahan</option>
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
                                <option selected disabled>Pilih Jenis Hak Cipta <span class="text-red-600">*</span></option>
                                @foreach ($copyrightTypes as $copyrightType)
                                    <optgroup class="font-semibold" label="{{ $copyrightType->type }}"
                                        class="font-semibold">
                                        @foreach ($copyrightType->subTypes as $subtype)
                                            <option value="{{ $subtype->uuid }}">&bullet; {{ $subtype->type }}</option>
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
                                <label for="judul" class="font-semibold">Judul Ciptaan <span
                                        class="text-red-600">*</span></label>
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
                            <div class="bg-white shadow-md px-4 py-4 rounded-md flex flex-col gap-4">
                                <label for="deskripsi" class="font-semibold">Deskripsi Produk Ciptaan <span
                                        class="text-red-600">*</span></label>
                                <textarea id="deskripsi" name="deskripsi"
                                    class="w-full h-full px-1 py-1 outline-0 border-b-2 @error('deskripsi') border-red-400 @enderror focus:border-amber-600"
                                    placeholder="Deskripsi Produk..."></textarea>
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
                                <label for="negara" class="font-semibold">Negara Pertama Kali Diumumkan <span
                                        class="text-red-600">*</span></label>
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
                                <label for="kota" class="font-semibold">Kota Pertama Kali Diumumkan <span
                                        class="text-red-600">*</span></label>
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
                                                <label for="nik" class="font-semibold">NIK</label>
                                                <input type="number" id="nik" name="applicant[nik][]"
                                                    class="px-1 py-2 outline-0 border-b-2 focus:border-amber-600"
                                                    placeholder="90098xxx"
                                                    value="{{ old('applicant.nik.0', $applicant->nik) }}">
                                            </div>
                                        </div>
                                        <div class="flex-1">
                                            <div class="bg-white shadow-md px-4 py-4 rounded-md flex flex-col gap-7">
                                                <label for="nama" class="font-semibold">Nama Pencipta</label>
                                                <input type="text" id="nama" name="applicant[nama][]"
                                                    class="px-1 py-2 outline-0 border-b-2 focus:border-amber-600"
                                                    placeholder="Nama ..."
                                                    value="{{ old('applicant.nama.0', $applicant->nama) }}">
                                            </div>
                                        </div>
                                        <div class="flex-1">
                                            <div class="bg-white shadow-md px-4 py-4 rounded-md flex flex-col gap-7">
                                                <label for="email" class="font-semibold">Email</label>
                                                <input type="email" id="email" name="applicant[email][]"
                                                    class="px-1 py-2 outline-0 border-b-2 focus:border-amber-600"
                                                    placeholder="Email ..."
                                                    value="{{ old('applicant.email.0', $applicant->email) }}">
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
                                                    value="{{ old('applicant.kontak.0', $applicant->kontak) }}">
                                            </div>
                                        </div>
                                        <div class="flex-1">
                                            <div class="bg-white shadow-md px-4 py-4 rounded-md flex flex-col gap-7">
                                                <label for="tgl_lahir" class="font-semibold">Tanggal Lahir</label>
                                                <input type="date" id="tgl_lahir" name="applicant[tgl_lahir][]"
                                                    class="px-1 py-2 outline-0 border-b-2 focus:border-amber-600"
                                                    value="{{ old('applicant.tgl_lahir.0', $applicant->tgl_lahir) }}">
                                            </div>
                                        </div>
                                        <div class="flex-1">
                                            <div class="bg-white shadow-md px-4 py-4 rounded-md flex flex-col gap-7">
                                                <label for="kewarganegaraan" class="font-semibold">Kewarganegaraan</label>
                                                <input type="text" id="kewarganegaraan"
                                                    name="applicant[kewarganegaraan][]"
                                                    class="px-1 py-2 outline-0 border-b-2 focus:border-amber-600"
                                                    placeholder="Kewarganegaraan..."
                                                    value="{{ old('applicant.kewarganegaraan.0', $applicant->kewarganegaraan) }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="bg-white shadow-md px-4 py-4 rounded-md flex flex-col gap-7">
                                            <label for="alamat" class="font-semibold">Alamat Lengkap</label>
                                            <input type="text" id="alamat" name="applicant[alamat][]"
                                                class="px-1 py-2 outline-0 border-b-2 focus:border-amber-600"
                                                placeholder="Alamat Lengkap..."
                                                value="{{ old('applicant.alamat.0', $applicant->alamat) }}">
                                        </div>
                                    </div>
                                    <div>
                                        <div class="bg-white shadow-md px-4 py-4 rounded-md flex flex-col gap-7">
                                            <label for="kode_pos" class="font-semibold">Kode Pos</label>
                                            <input type="text" id="kode_pos" name="applicant[kode_pos][]"
                                                class="px-1 py-2 outline-0 border-b-2 focus:border-amber-600"
                                                placeholder="Kode Pos..."
                                                value="{{ old('applicant.kode_pos.0', $applicant->kode_pos) }}">
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
                        <label for="link_ciptaan" class="font-light">Link File Ciptaan <span
                                class="text-red-600">*</span></label>
                        <p class="text-sm py-2 text-gray-400">Isikan link google drive yang berisikan file ciptaan anda!
                        </p>
                        <input type="text" id="link_ciptaan" name="link_ciptaan"
                            class="w-full px-1 py-2 outline-0 border-b-2 @error('link_ciptaan') border-red-400 @enderror focus:border-amber-600"
                            placeholder="link ciptaan">
                        @error('link_ciptaan')
                            <div class="text-red-600 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="bg-white shadow-md px-4 py-4 rounded-md flex flex-col gap-7">
                        <label for="file_pernyataan_karya_cipta" class="font-light">
                            Upload Bukti Form Pernyataan Karya Cipta (<a href="#"
                                class="text-blue-600 hover:underline">Download Form</a>)
                            <span class="text-red-600">*</span>
                        </label>

                        <div id="pdf-preview-pernyataan"
                            class="w-full h-[300px] border border-gray-300 rounded-lg overflow-hidden mb-4 hidden">
                            <iframe id="pdf-frame-pernyataan" class="w-full h-full"></iframe>
                        </div>
                        <p class="text-sm text-gray-400">Upload 1 file yang didukung: PDF. Maks 5 MB.</p>
                        <input type="file" id="file_pernyataan_karya_cipta" name="file_pernyataan_karya_cipta"
                            accept=".pdf" class="px-1 py-2 outline-0 border-b-2 focus:border-amber-600"
                            placeholder="file">
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
                        <p class="text-sm text-gray-400">Upload 1 file yang didukung: PDF. Maks 5 MB.</p>
                        <input type="file" id="file_pengalihan_karya_cipta" name="file_pengalihan_karya_cipta"
                            accept=".pdf" class="px-1 py-2 outline-0 border-b-2 focus:border-amber-600"
                            placeholder="file">
                    </div>

                    <div class="bg-white shadow-md px-4 py-4 rounded-md flex flex-col gap-7">
                        <label for="file_scan_ktp" class="font-light">
                            Upload Scan KTP seluruh pencipta (Semua KTP dijadikan satu file PDF)
                            <span class="text-red-600">*</span>
                        </label>

                        <div id="pdf-preview-ktp"
                            class="w-full h-[300px] border border-gray-300 rounded-lg overflow-hidden mb-4 hidden">
                            <iframe id="pdf-frame-ktp" class="w-full h-full"></iframe>
                        </div>
                        <p class="text-sm text-gray-400">Upload 1 file yang didukung: PDF. Maks 5 MB.</p>
                        <input type="file" id="file_scan_ktp" name="file_scan_ktp" accept=".pdf"
                            class="px-1 py-2 outline-0 border-b-2 focus:border-amber-600" placeholder="file">
                    </div>

                    <div class="bg-white shadow-md px-4 py-4 rounded-md flex flex-col gap-7">
                        <label for="file_bukti_pembayaran" class="font-light">
                            Upload Scan Bukti Pembayaran Hak Cipta
                            (Informasi Lebih lanjut dapat menghubungi Staf DP3M)
                            <span class="text-red-600">*</span>
                        </label>

                        <div id="pdf-preview-bukti"
                            class="w-full h-[300px] border border-gray-300 rounded-lg overflow-hidden mb-4 hidden">
                            <iframe id="pdf-frame-bukti" class="w-full h-full"></iframe>
                        </div>
                        <p class="text-sm text-gray-400">Upload 1 file yang didukung: PDF. Maks 5 MB.</p>
                        <input type="file" id="file_bukti_pembayaran" name="file_bukti_pembayaran" accept=".pdf"
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

            setTimeout(() => {
                $('.notif-success').fadeOut();
            }, 5000);
            $('#notif-success').click(function() {
                $('.notif-success').addClass('hidden');
            });
            setTimeout(() => {
                $('.notif-error').fadeOut();
            }, 5000);
            $('#notif-error').click(function() {
                $('.notif-error').addClass('hidden');
            });

            $(document).on('click', '.accordion-header', function() {
                var $content = $(this).next('.accordion-content');
                var $icon = $(this).find('.accordion-icon');
                $content.slideToggle(200);
                $icon.toggleClass('rotate-180');
            });

            let penciptaCounter = 2;

            $('#btn-add-applicant').click(function() {
                var newItem = $('.accordion-item:first').clone();
                newItem.find('.accordion-header span').text('Pencipta ' + penciptaCounter);

                newItem.find('input').val('');

                if (penciptaCounter > 1) {
                    newItem.find('.accordion-content').append(
                        '<button type="button" class="btn-remove-accordion px-4 py-2 mt-2 bg-red-600 text-white rounded-md">Hapus Pencipta</button>'
                    );
                }

                $('.main-accordion').append(newItem);
                penciptaCounter++;
            });

            $(document).on('click', '.btn-remove-accordion', function() {
                var $item = $(this).closest('.accordion-item');
                $item.remove();
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
