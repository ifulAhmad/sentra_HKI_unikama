@extends('admins.partials.main')

@section('admin-content')
    @if (session()->has('success'))
        <div
            class="notif-success z-[999] fixed end-3 top-20 min-w-[400px] text-sm rounded-md text-green-600 bg-green-100 border border-green-400">
            <div class="relative p-4 flex justify-between gap-2">
                <p class="flex items-center gap-2"><i class="bi bi-check-circle-fill"></i> {{ session()->get('success') }}</p>
                <button type="button" id="notif-success" class="text-xl absolute right-2 text-green-400 bottom-7"><i
                        class="bi bi-x"></i></button>
            </div>
        </div>
    @endif
    @if (session()->has('error'))
        <div
            class="notif-error fixed end-3 top-20 min-w-[400px] text-sm rounded-md bg-red-100 text-red-600 border border-red-400">
            <div class="relative p-4 flex justify-between gap-2">
                <p class="flex items-center gap-2"><i class="bi bi-exclamation-circle-fill"></i>
                    {{ session()->get('error') }}
                </p>
                <button type="button" id="notif-error" class="text-xl absolute right-2 text-red-400 bottom-7"><i
                        class="bi bi-x"></i></button>
            </div>
        </div>
    @endif
    <div class="bg-indigo-100">
        <div class="bg-white mb-3 p-4 shadow-md rounded-md">
            <div class="bg-white my-2 text-sm pb-2 border-b">
                @if ($submission->skema == 'lembaga')
                    <p>Skema : <span class="font-semibold">UNIKAMA, UMKM, Lem.Pendidikan, Lem.pemerintahan </span></p>
                @elseif($submission->skema == 'umum')
                    <p>Skema : <span class="font-semibold">UMUM</span></p>
                @endif
            </div>
            <h3 class="font-semibold capitalize">{{ $submission->judul }}</h3>
            <p class="text-sm py-3 mb-3 border-b ms-3">{{ $submission->deskripsi }}</p>
            <div class="flex items-center gap-4 text-sm ms-1 my-3">
                <p>Jenis : <span class="font-semibold">{{ $submission->subType->copyrightType->type }}</span></p>
                <p>Sub Jenis : <span class="font-semibold">{{ $submission->subType->type }}</span></p>
                <p>Waktu Publikasi : <span
                        class="font-semibold">{{ \Carbon\Carbon::parse($submission->publikasi)->format('d F Y') }}</span>
                </p>
            </div>
            <div class="flex text-xs my-2 items-center justify-between">
                <div class="flex gap-3 items-center text-gray-600">
                    <p class="capitalize">
                        <i class="bi bi-geo"></i> {{ $submission->kota }}, {{ $submission->negara }}
                    </p>
                    <p><i class="bi bi-person"></i> {{ $submission->applicants->count() }}</p> |
                    <p>{{ $submission->created_at->diffForHumans() }}</p>
                </div>
                <p
                    class="text-end capitalize py-1 text-sm px-4 rounded-xl
                @if ($submission->status == 'proses') text-yellow-500 
                @elseif($submission->status == 'menunggu')
                    text-gray-500
                @elseif($submission->status == 'ditolak')
                    text-red-500
                @elseif($submission->status == 'diterima')
                    text-green-500
                @elseif($submission->status == 'revisi')
                 text-orange-400 
                 @elseif($submission->status == 'revisi selesai')
                 text-indigo-600 @endif font-semibold">
                    {{ $submission->status }}
                </p>
            </div>
        </div>
        <div class="flex flex-col md:flex-row gap-3 relative">
            {{-- main information --}}
            <div class="flex-1 flex gap-3 flex-col">
                <div class="flex-1 rounded-md bg-white">
                    {{-- Accordion --}}
                    <div>
                        <div class="py-2 px-4 border-b">
                            <h1 class="font-bold">Pencipta</h1>
                        </div>
                        <div class="max-w-full mx-auto bg-white rounded-lg shadow-md">
                            <!-- Item -->
                            @foreach ($submission->orderOfCreators->sortBy('order') as $orderOfCreator)
                                <div class="border-b border-gray-200 px-4">
                                    <button
                                        class="w-full text-left py-2 font-medium text-gray-700 hover:text-amber-600 focus:outline-none flex justify-between items-center accordion-header">
                                        <span>Pencipta {{ $orderOfCreator->order }}</span>
                                        <svg class="w-5 h-5 transform transition-transform duration-200 accordion-icon"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 9l-7 7-7-7" />
                                        </svg>
                                    </button>
                                    <div class="accordion-content capitalize hidden p-4 text-gray-600">
                                        <div class="flex gap-6 mb-3">
                                            <div class="w-20">Nama</div>
                                            <div class="">: {{ $orderOfCreator->applicant->nama }}</div>
                                        </div>
                                        <div class="flex gap-6 mb-3">
                                            <div class="w-20">Tgl Lahir</div>
                                            <div class="">:
                                                {{ \Carbon\Carbon::parse($orderOfCreator->applicant->tgl_lahir)->format('d F Y') }}
                                            </div>
                                        </div>
                                        <div class="flex gap-6 mb-3">
                                            <div class="w-20">Email</div>
                                            <div class="">: {{ $orderOfCreator->applicant->email }}</div>
                                        </div>
                                        <div class="flex gap-6 mb-3">
                                            <div class="w-20">No Telp</div>
                                            <div class="">: {{ $orderOfCreator->applicant->kontak }}</div>
                                        </div>
                                        <div class="flex gap-6 mb-3">
                                            <div class="w-20">Alamat</div>
                                            <div class="">: {{ $orderOfCreator->applicant->alamat }}</div>
                                        </div>
                                        <div class="flex gap-6 mb-3">
                                            <div class="w-20">Kode Pos</div>
                                            <div class="">: {{ $orderOfCreator->applicant->kode_pos }}</div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="flex-1 bg-white rounded-md shadow-md p-4">
                    <div class="grid grid-cols-2 gap-3">
                        <a href="#" class="w-full border rounded-md overflow-hidden hover:border-indigo-400"
                            id="file0-link">
                            <div class="bg-pdf h-[150px] bg-top flex items-end">
                                <div class="bg-indigo-100 w-full p-2 opacity-95">Surat pernyataan hak cipta</div>
                            </div>
                        </a>
                        @if ($submission->files->file_pengalihan_karya_cipta)
                            <a href="#" class="w-full border rounded-md overflow-hidden hover:border-indigo-400"
                                id="file1-link">
                                <div class="bg-pdf h-[150px] bg-top flex items-end">
                                    <div class="bg-indigo-100 w-full p-2 opacity-95">Surat Pengalihan hak cipta</div>
                                </div>
                            </a>
                        @endif

                        <a href="#" class="w-full border rounded-md overflow-hidden hover:border-indigo-400"
                            id="file2-link">
                            <div class="bg-pdf h-[150px] bg-top flex items-end">
                                <div class="bg-indigo-100 w-full p-2 opacity-95">Scan KTP anggota</div>
                            </div>
                        </a>

                        <a href="#" class="w-full border rounded-md overflow-hidden hover:border-indigo-400"
                            id="file3-link">
                            <div class="bg-pdf h-[150px] bg-top flex items-end">
                                <div class="bg-indigo-100 w-full p-2 opacity-95">Bukti pembayaran</div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            {{-- modal file --}}
            <div id="file-modal"
                class="fixed inset-0 flex items-center justify-center z-[999] bg-gray-900 bg-opacity-50 hidden">
                <div class="bg-white p-8 rounded-lg shadow-lg w-3/4 h-[90%] relative">
                    <button id="close-modal" class="absolute top-2 right-2 text-red-500 text-3xl rounded-full"><i
                            class="bi bi-x-circle-fill"></i></button>
                    <div id="file-content" class="w-full h-full">
                    </div>
                </div>
            </div>

            {{-- Right Content --}}
            <div class="md:w-96 sticky top-20 max-h-[500px] overflow-y-auto">
                @if ($files)
                    <div class="mb-3 bg-white rounded-md shadow-md p-3">
                        <p class="text-center mb-3">Link File Ciptaan</p>
                        <a href="{{ $files->link_ciptaan }}" target="_blank" class="text-blue-600 hover:underline">link
                            file ciptaan &raquo;</a>
                    </div>
                @endif
                @if ($submission->certificate)
                    <div class="mb-3 bg-white rounded-md shadow-md p-3">
                        @if ($submission->certificate->link_certificate)
                            <div class="flex flex-col gap-3 mb-3">
                                <p class="text-center mb-3">Link File Sertifikat</p>
                                <a href="{{ $submission->certificate->link_certificate }}" target="_blank"
                                    class="text-blue-600 hover:underline">link {{ $submission->judul }} &raquo;</a>
                            </div>
                        @elseif($submission->certificate->file_certificate)
                            <div class="flex flex-col gap-3">
                                <p class="text-center mb-3">File Sertifikat</p>
                                <a href="{{ asset('storage/' . $submission->certificate->file_certificate . '#toolbar=0') }}"
                                    target="_blank" class="text-blue-600 hover:underline">file
                                    {{ $submission->judul }} &raquo;</a>
                            </div>
                        @endif
                    </div>
                @endif
                <div class="bg-white rounded-md shadow-md p-3 mb-3">
                    <div class="flex-1 rounded-md overflow-hidden text-center mb-3">
                        <form action="{{ route('admin.submission.revisi', $submission->uuid) }}" method="post">
                            @csrf
                            @method('put')
                            <button type="submit"
                                class="p-2 w-full bg-orange-400 duration-100 text-white disabled:cursor-not-allowed disabled:opacity-50"
                                onclick="return confirm('Apakah anda yakin mengubah status menjadi Revisi?')"
                                @if ($submission->status == 'revisi' || $submission->status == 'ditolak' || $submission->status == 'diterima') disabled @endif>
                                Izinkan Revisi
                            </button>
                        </form>
                    </div>

                    <div class="flex items-center gap-3 mb-3">
                        <div class="flex-1 rounded-md overflow-hidden text-center">
                            <form action="{{ route('admin.submission.export', $submission->uuid) }}" method="get">
                                @csrf
                                <button type="submit"
                                    class="p-2 w-full bg-green-500 duration-100 hover:bg-green-600 text-white">
                                    Download Excel
                                </button>
                            </form>
                        </div>
                        <div class="flex-1 rounded-md overflow-hidden text-center">
                            <form action="{{ route('admin.submission.ditolak', $submission->uuid) }}" method="post"
                                class="w-full">
                                @csrf
                                @method('PUT')
                                <button type="submit"
                                    class="p-2 w-full bg-red-600 duration-100 text-white disabled:cursor-not-allowed disabled:opacity-50"
                                    onclick="return confirm('Apakah anda yakin menolak pengajuan ini?')"
                                    @if ($submission->status == 'ditolak' || $submission->status == 'diterima') disabled @endif>
                                    Tolak Pengajuan
                                </button>
                            </form>
                        </div>
                    </div>

                    @if ($submission->status != 'ditolak')
                        <div class="max-w-full mx-auto bg-white">
                            <!-- Item -->
                            <div class="border-b border-gray-200 shadow">
                                <button
                                    class="w-full text-left py-2 px-4 font-medium text-gray-700 hover:text-amber-600 focus:outline-none flex justify-between items-center accordion-header">
                                    <span>Berikan Sertifikat</span>
                                    <svg class="w-5 h-5 transform transition-transform duration-200 accordion-icon"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>
                                <div class="accordion-content hidden p-4 text-gray-600">
                                    <div class="mt-4 text-sm">
                                        <form action="{{ route('admin.submission.diterima', $submission->uuid) }}"
                                            method="post" class="flex flex-col gap-2" enctype="multipart/form-data">
                                            @csrf
                                            <div class="bg-white p-2 rounded-md flex flex-col gap-4">
                                                <label for="link_certificate" class="font-semibold">Berikan Link
                                                    Sertifikat</label>
                                                <input type="text" id="link_certificate" name="link_certificate"
                                                    class="px-1 py-2 outline-0 border-b-2 focus:border-amber-600"
                                                    placeholder="link sertifikat">
                                            </div>
                                            <div class="flex items-center gap-2 my-4">
                                                <hr class="w-full">
                                                <p>Atau</p>
                                                <hr class="w-full">
                                            </div>
                                            <div class="bg-white p-2 rounded-md flex flex-col gap-4">
                                                <label for="file_certificate" class="font-semibold">Berikan file
                                                    Sertifikat</label>
                                                <p id="file_certificate" class="text-xs text-gray-400">Upload 1 file yang
                                                    didukung: PDF. Maks 10 MB.</p>
                                                <input type="file" id="file_certificate" name="file_certificate"
                                                    accept=".pdf"
                                                    class="px-1 py-2 outline-0 border-b-2 focus:border-amber-600"
                                                    placeholder="file">
                                            </div>
                                            <button
                                                class="text-white block p-2 font-semibold bg-indigo-600 rounded-md duration-100 hover:bg-indigo-700">Kirim</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="max-w-full mx-auto bg-white">
                        <!-- Item -->
                        <div class="border-b border-gray-200 shadow">
                            <button
                                class="w-full text-left py-2 px-4 font-medium text-gray-700 hover:text-amber-600 focus:outline-none flex justify-between items-center accordion-header">
                                <span>Komentar</span>
                                <svg class="w-5 h-5 transform transition-transform duration-200 accordion-icon"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                            <div class="accordion-content hidden p-4 text-gray-600">
                                @foreach ($comments as $comment)
                                    <div
                                        class="
                                    
                                    @if ($comment->user_id == auth()->user()->id) text-end @endif flex-col gap-2 text-sm border-b pb-2 mb-2">
                                        <div
                                            class="flex items-center justify-between @if ($comment->user_id == auth()->user()->id) flex-row-reverse @endif">
                                            <div class="flex items-center gap-3">
                                                <h5
                                                    class="@if ($comment->user_id == auth()->user()->id) text-end text-indigo-600 @else text-gray-800 @endif font-semibold">
                                                    {{ $comment->user->nama }}
                                                </h5>
                                                @if ($comment->user_id == auth()->user()->id)
                                                    <form action="{{ route('comment.delete', $comment->uuid) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            onclick="return confirm('Yakin ingin menghapus?')"
                                                            class="text-red-600"><i class="bi bi-trash"></i></button>
                                                    </form>
                                                @endif
                                            </div>
                                            <small
                                                class="text-gray-600">{{ $comment->created_at->diffForHumans() }}</small>
                                        </div>
                                        <p class="my-2">{{ $comment->comment }}</p>
                                    </div>
                                @endforeach
                                <div class="mt-4 text-sm">
                                    <form action="{{ route('comment.store', $submission->uuid) }}" method="post"
                                        class="flex items-end gap-2">
                                        @csrf
                                        <textarea id="autoResizeTextarea" name="comment"
                                            class="py-2 outline-0 border-b w-full focus:border-amber-600 resize-none" placeholder="komentar disini..."
                                            rows="1" oninput="adjustTextareaHeight(this)"></textarea>
                                        <button class="text-blue-400 hover:underline">Kirim</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // time notification 
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

            $(".accordion-header").click(function() {
                $(this).next(".accordion-content").slideToggle(200);
                $(this).find(".accordion-icon").toggleClass("transform rotate-180");
            });

            // open files
            $('#file0-link').click(function(e) {
                e.preventDefault();
                var fileUrl =
                    '{{ asset('storage/' . $files->file_pernyataan_karya_cipta) }}';
                $('#file-modal').removeClass('hidden');
                $('#file-content').html('<iframe src="' + fileUrl +
                    '" class="w-full h-full" frameborder="0"></iframe>');
            });

            $('#file1-link').click(function(e) {
                e.preventDefault();
                var fileUrl =
                    '{{ asset('storage/' . $files->file_pengalihan_karya_cipta) }}';
                $('#file-modal').removeClass('hidden');
                $('#file-content').html('<iframe src="' + fileUrl +
                    '" class="w-full h-full" frameborder="0"></iframe>');
            });

            $('#file2-link').click(function(e) {
                e.preventDefault();
                var fileUrl =
                    '{{ asset('storage/' . $files->file_scan_ktp) }}';
                $('#file-modal').removeClass('hidden');
                $('#file-content').html('<iframe src="' + fileUrl +
                    '" class="w-full h-full" frameborder="0"></iframe>');
            });

            $('#file3-link').click(function(e) {
                e.preventDefault();
                var fileUrl =
                    '{{ asset('storage/' . $files->file_bukti_pembayaran) }}';
                $('#file-modal').removeClass('hidden');
                $('#file-content').html('<iframe src="' + fileUrl +
                    '" class="w-full h-full" frameborder="0"></iframe>');
            });


            $('#close-modal').click(function() {
                $('#file-modal').addClass('hidden');
            });
        });

        function adjustTextareaHeight(element) {
            element.style.height = "auto";
            element.style.height = (element.scrollHeight) + "px";
        }
    </script>
@endsection
