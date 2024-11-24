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
<div class="bg-indigo-100">
    <div class="bg-white mb-3 p-4 shadow-md rounded-md">
        <h3 class="font-semibold capitalize">{{ $submission->judul }}</h3>
        <p class="text-sm py-3 ms-3">{{ $submission->deskripsi }}</p>
        <div class="flex text-xs items-center justify-between">
            <div class="flex gap-2 items-center text-gray-600">
                <p>
                    <i class="bi bi-geo"></i> {{ $submission->kota }}, {{ $submission->negara }}
                </p> |
                <p><i class="bi bi-person"></i> {{ $applicants->count() }}</p> |
                <p>{{ $submission->created_at->diffForHumans() }}</p>
            </div>
            <p class="text-end py-1 px-4 rounded-xl bg-indigo-200 capitalize">{{ $submission->status }}</p>
        </div>
    </div>
    <div class="flex flex-col md:flex-row gap-3 relative">
        {{-- Main information --}}
        <div class="flex-1 flex gap-3 flex-col">
            <div class="flex-1 rounded-md bg-white">
                {{-- Accordion --}}
                <div>
                    <div class="py-2 px-4 border-b">
                        <h1 class="font-bold">Pencipta</h1>
                    </div>
                    <div class="max-w-full mx-auto bg-white rounded-lg shadow-md">
                        <!-- Item -->
                        @foreach ($applicants as $applicant)
                        <div class="border-b border-gray-200 px-4">
                            <button
                                class="w-full text-left py-2 font-medium text-gray-700 hover:text-amber-600 focus:outline-none flex justify-between items-center accordion-header">
                                <span>Pencipta {{ $loop->iteration }}</span>
                                <svg class="w-5 h-5 transform transition-transform duration-200 accordion-icon"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                            <div class="accordion-content hidden p-4 text-gray-600">
                                <div class="flex gap-6 mb-3">
                                    <div class="w-20">NIK</div>
                                    <div class="">: {{ $applicant->nik }}</div>
                                </div>
                                <div class="flex gap-6 mb-3">
                                    <div class="w-20">Nama</div>
                                    <div class="">: {{ $applicant->nama }}</div>
                                </div>
                                <div class="flex gap-6 mb-3">
                                    <div class="w-20">Tgl Lahir</div>
                                    <div class="">:
                                        {{ \Carbon\Carbon::parse($applicant->tgl_lahir)->format('d F Y') }}
                                    </div>
                                </div>
                                <div class="flex gap-6 mb-3">
                                    <div class="w-20">Email</div>
                                    <div class="">: {{ $applicant->email }}</div>
                                </div>
                                <div class="flex gap-6 mb-3">
                                    <div class="w-20">No Telp</div>
                                    <div class="">: {{ $applicant->kontak }}</div>
                                </div>
                                <div class="flex gap-6 mb-3">
                                    <div class="w-20">Alamat</div>
                                    <div class="">: {{ $applicant->alamat }}</div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="flex-1 bg-white rounded-md shadow-md p-4">
                <div class="grid grid-cols-2 gap-3">
                    <a href="#" class="w-full border rounded-md overflow-hidden hover:border-red-600"
                        id="file0-link">
                        <div class="bg-pdf h-[150px] bg-top flex items-end">
                            <div class="bg-red-300 w-full p-2 opacity-95">Surat pernyataan hak cipta</div>
                        </div>
                    </a>
                    @if ($files->file_pengalihan_karya_cipta)
                    <a href="#" class="w-full border rounded-md overflow-hidden hover:border-red-600"
                        id="file1-link">
                        <div class="bg-pdf h-[150px] bg-top flex items-end">
                            <div class="bg-red-300 w-full p-2 opacity-95">Surat Pengalihan hak cipta</div>
                        </div>
                    </a>
                    @endif

                    <a href="#" class="w-full border rounded-md overflow-hidden hover:border-red-600"
                        id="file2-link">
                        <div class="bg-pdf h-[150px] bg-top flex items-end">
                            <div class="bg-red-300 w-full p-2 opacity-95">Scan KTP anggota</div>
                        </div>
                    </a>

                    <a href="#" class="w-full border rounded-md overflow-hidden hover:border-red-600"
                        id="file3-link">
                        <div class="bg-pdf h-[150px] bg-top flex items-end">
                            <div class="bg-red-300 w-full p-2 opacity-95">Bukti pembayaran</div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <!-- Modal Popup -->
        <div id="file-modal"
            class="fixed inset-0 flex items-center justify-center z-[999] bg-gray-900 bg-opacity-50 hidden">
            <div class="bg-white p-8 rounded-lg shadow-lg w-3/4 h-[90%] relative">
                <button id="close-modal" class="absolute top-2 right-2 text-red-500 text-3xl rounded-full"><i
                        class="bi bi-x-circle-fill"></i></button>
                <div id="file-content" class="w-full h-full">
                </div>
            </div>
        </div>

        {{-- right content --}}
        <div class="md:w-96 max-h-[500px] overflow-y-auto">
            <div class="p-3 rounded-md shadow-md bg-white mb-3">
                <p class="text-center mb-3">Link File Ciptaan</p>
                <a href="{{ $files->link_ciptaan }}" target="_blank"
                    class="text-blue-600 hover:underline">{{ $submission->judul }}</a>
            </div>
            <div class="max-w-full mx-auto bg-white rounded-lg shadow-md">
                <!-- Item -->
                <div class="border-b border-gray-200">
                    <button
                        class="w-full text-left py-2 px-4 font-medium border-b text-gray-700 hover:text-amber-600 focus:outline-none flex justify-between items-center accordion-header">
                        <span>Komentar</span>
                        <svg class="w-5 h-5 transform transition-transform duration-200 accordion-icon"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div class="accordion-content hidden p-4 text-gray-600">
                        <div class="flex flex-col gap-2 text-sm border-b pb-2 mb-2">
                            <div class="flex items-center justify-between">
                                <h5 class="font-semibold text-gray-800">Administrator</h5>
                                <small class="text-ggray-600">2 hours ago</small>
                            </div>
                            <p>Tolong kirim file yang benar anak muda!</p>
                        </div>
                        @foreach ($commentUsers as $comment)
                        <div class="flex flex-col gap-2 text-sm border-b pb-2 mb-2 text-end">
                            <div class="flex items-center justify-between">
                                <small class="text-ggray-600">{{ $comment->created_at->diffForHumans() }}</small>
                                <h5 class="font-semibold text-gray-800">{{ $comment->user->nama }}</h5>
                            </div>
                            <p>{{ $comment->comment }}</p>
                        </div>
                        @endforeach
                        <div class="mt-4 text-sm">
                            <form action="{{ route('comment.store', $submission->uuid) }}" method="post" class="flex items-end gap-2">
                                @csrf
                                <textarea id="comment" name="comment" class="py-2 outline-0 border-b w-full focus:border-amber-600 resize-none"
                                    placeholder="komentar disini..." rows="1" oninput="adjustTextareaHeight(this)"></textarea>
                                <button class="text-blue-400 hover:underline">Kirim</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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

        $(".accordion-header").click(function() {
            $(this).next(".accordion-content").slideToggle(200);
            $(this).find(".accordion-icon").toggleClass("transform rotate-180");
        });

        $('#file0-link').click(function(e) {
            e.preventDefault();
            var fileUrl =
                '{{ asset("storage/" . $files->file_pernyataan_karya_cipta) }}';
            $('#file-modal').removeClass('hidden');
            $('#file-content').html('<iframe src="' + fileUrl +
                '" class="w-full h-full" frameborder="0"></iframe>');
        });

        $('#file1-link').click(function(e) {
            e.preventDefault();
            var fileUrl =
                '{{ asset("storage/" . $files->file_pengalihan_karya_cipta) }}';
            $('#file-modal').removeClass('hidden');
            $('#file-content').html('<iframe src="' + fileUrl +
                '" class="w-full h-full" frameborder="0"></iframe>');
        });

        $('#file2-link').click(function(e) {
            e.preventDefault();
            var fileUrl =
                '{{ asset("storage/" . $files->file_scan_ktp) }}';
            $('#file-modal').removeClass('hidden');
            $('#file-content').html('<iframe src="' + fileUrl +
                '" class="w-full h-full" frameborder="0"></iframe>');
        });

        $('#file3-link').click(function(e) {
            e.preventDefault();
            var fileUrl =
                '{{ asset("storage/" . $files->file_bukti_pembayaran) }}';
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