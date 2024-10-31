@extends('users.partials.main')

@section('users-content')
    <div class="bg-gray-100">
        <div class="bg-white mb-3 p-4 shadow-md rounded-md">
            <h3 class="font-semibold capitalize">Pembuatan Web Pengajuan Hak Cipta Menggunakan Aplikasi laravel 10.</h3>
            <div class="flex text-xs my-2 items-center justify-between">
                <div class="flex gap-3 items-center text-gray-600">
                    <p>
                        <i class="bi bi-geo"></i> Kota Malang, Indonesia
                    </p>
                    <p><i class="bi bi-person"></i> 3</p>
                    <p>23 days ago</p>
                </div>
                <p class="text-end py-1 px-4 rounded-xl bg-yellow-400">Diroses</p>
            </div>
        </div>
        <div class="flex flex-col md:flex-row gap-3">
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
                            <div class="border-b border-gray-200 px-4">
                                <button
                                    class="w-full text-left py-2 font-medium text-gray-700 hover:text-amber-600 focus:outline-none flex justify-between items-center accordion-header">
                                    <span>Pencipta 1</span>
                                    <svg class="w-5 h-5 transform transition-transform duration-200 accordion-icon"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>
                                <div class="accordion-content hidden p-4 text-gray-600">
                                    <div class="flex gap-6 mb-3">
                                        <div class="w-20">Nama</div>
                                        <div class="">: Saiful Islam Ahmad Ramadhan</div>
                                    </div>
                                    <div class="flex gap-6 mb-3">
                                        <div class="w-20">Tgl Lahir</div>
                                        <div class="">: 06 November 2002</div>
                                    </div>
                                    <div class="flex gap-6 mb-3">
                                        <div class="w-20">Email</div>
                                        <div class="">: saifultesting@gmail.com</div>
                                    </div>
                                    <div class="flex gap-6 mb-3">
                                        <div class="w-20">No Telp</div>
                                        <div class="">: 08122211xxxx</div>
                                    </div>
                                    <div class="flex gap-6 mb-3">
                                        <div class="w-20">Alamat</div>
                                        <div class="">: Jl.Simpang Kepuh Blog F, Kel.Bandungrejosari, Kec.Sukun, Kota
                                            Malang, Prov.Jawatimur, Indonesia</div>
                                    </div>
                                </div>
                            </div>
                            <div class="border-b border-gray-200 px-4">
                                <button
                                    class="w-full text-left py-2 font-medium text-gray-700 hover:text-amber-600 focus:outline-none flex justify-between items-center accordion-header">
                                    <span>Pencipta 2</span>
                                    <svg class="w-5 h-5 transform transition-transform duration-200 accordion-icon"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>
                                <div class="accordion-content hidden p-4 text-gray-600">
                                    <div class="flex gap-6 mb-3">
                                        <div class="w-20">Nama</div>
                                        <div class="">: Saiful Islam Ahmad Ramadhan</div>
                                    </div>
                                    <div class="flex gap-6 mb-3">
                                        <div class="w-20">Tgl Lahir</div>
                                        <div class="">: 06 November 2002</div>
                                    </div>
                                    <div class="flex gap-6 mb-3">
                                        <div class="w-20">Email</div>
                                        <div class="">: saifultesting@gmail.com</div>
                                    </div>
                                    <div class="flex gap-6 mb-3">
                                        <div class="w-20">No Telp</div>
                                        <div class="">: 08122211xxxx</div>
                                    </div>
                                    <div class="flex gap-6 mb-3">
                                        <div class="w-20">Alamat</div>
                                        <div class="">: Jl.Simpang Kepuh Blog F, Kel.Bandungrejosari, Kec.Sukun, Kota
                                            Malang, Prov.Jawatimur, Indonesia</div>
                                    </div>
                                </div>
                            </div>
                            <div class="border-b border-gray-200 px-4">
                                <button
                                    class="w-full text-left py-2 font-medium text-gray-700 hover:text-amber-600 focus:outline-none flex justify-between items-center accordion-header">
                                    <span>Pencipta 3</span>
                                    <svg class="w-5 h-5 transform transition-transform duration-200 accordion-icon"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>
                                <div class="accordion-content hidden p-4 text-gray-600">
                                    <div class="flex gap-6 mb-3">
                                        <div class="w-20">Nama</div>
                                        <div class="">: Saiful Islam Ahmad Ramadhan</div>
                                    </div>
                                    <div class="flex gap-6 mb-3">
                                        <div class="w-20">Tgl Lahir</div>
                                        <div class="">: 06 November 2002</div>
                                    </div>
                                    <div class="flex gap-6 mb-3">
                                        <div class="w-20">Email</div>
                                        <div class="">: saifultesting@gmail.com</div>
                                    </div>
                                    <div class="flex gap-6 mb-3">
                                        <div class="w-20">No Telp</div>
                                        <div class="">: 08122211xxxx</div>
                                    </div>
                                    <div class="flex gap-6 mb-3">
                                        <div class="w-20">Alamat</div>
                                        <div class="">: Jl.Simpang Kepuh Blog F, Kel.Bandungrejosari, Kec.Sukun, Kota
                                            Malang, Prov.Jawatimur, Indonesia</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex-1 bg-white rounded-md shadow-md p-4">
                    <div class="grid grid-cols-2 gap-3">
                        <a href="#" class=" w-full border rounded-md overflow-hidden hover:border-red-600">
                            <div class="bg-pdf h-[150px] bg-top flex items-end">
                                <div class="bg-red-300 w-full p-2 opacity-95">Surat Pengajuan.pdf
                                </div>
                            </div>
                        </a>
                        <a href="#" class=" w-full border rounded-md overflow-hidden hover:border-red-600">
                            <div class="bg-pdf h-[150px] bg-top flex items-end">
                                <div class="bg-red-300 w-full p-2 opacity-95">Surat Pengalihan.pdf
                                </div>
                            </div>
                        </a>
                        <a href="#" class=" w-full border rounded-md overflow-hidden hover:border-red-600">
                            <div class="bg-pdf h-[150px] bg-top flex items-end">
                                <div class="bg-red-300 w-full p-2 opacity-95">Surat 3.pdf
                                </div>
                            </div>
                        </a>
                        <a href="#" class=" w-full border rounded-md overflow-hidden hover:border-red-600">
                            <div class="bg-pdf h-[150px] bg-top flex items-end">
                                <div class="bg-red-300 w-full p-2 opacity-95">Surat 4.pdf
                                </div>
                            </div>
                        </a>
                        <a href="#" class=" w-full border rounded-md overflow-hidden hover:border-red-600">
                            <div class="bg-pdf h-[150px] bg-top flex items-end">
                                <div class="bg-red-300 w-full p-2 opacity-95">Surat 5.pdf
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            {{-- comment --}}
            <div class="md:w-96 max-h-[400px] overflow-y-auto">
                <div class="max-w-full mx-auto bg-white rounded-lg shadow-md">
                    <!-- Item -->
                    <div class="border-b border-gray-200">
                        <button
                            class="w-full text-left py-2 px-4 font-medium border-b text-gray-700 hover:text-amber-600 focus:outline-none flex justify-between items-center accordion-header">
                            <span>Komentar</span>
                            <svg class="w-5 h-5 transform transition-transform duration-200 accordion-icon"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
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
                            <div class="flex flex-col gap-2 text-sm border-b pb-2 mb-2 text-end">
                                <div class="flex items-center justify-between">
                                    <small class="text-ggray-600">1 hours ago</small>
                                    <h5 class="font-semibold text-gray-800">Anda</h5>
                                </div>
                                <p>Siapp komandan!</p>
                            </div>
                            <div class="mt-4 text-sm">
                                <form action="" class="flex items-end gap-2">
                                    <textarea id="autoResizeTextarea" class="py-2 outline-0 border-b w-full focus:border-amber-600 resize-none"
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
            $(".accordion-header").click(function() {
                $(this).next(".accordion-content").slideToggle(200);
                $(this).find(".accordion-icon").toggleClass("transform rotate-180");
            });
        });

        function adjustTextareaHeight(element) {
            element.style.height = "auto";
            element.style.height = (element.scrollHeight) + "px";
        }
    </script>
@endsection
