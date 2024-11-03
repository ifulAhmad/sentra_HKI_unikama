@extends('admins.partials.main')

@section('admin-content')
<div>
    <h1 class="font-semibold text-lg uppercase">Rekap Pengajuan</h1>
    <div class="bg-blue-600 h-[4px] rounded w-28 mt-2 mb-4"></div>

    <div class="flex items-center text-sm justify-between mb-6">
        <h4 class="text-lg font-semibold">3 Pengajuan Terdaftar</h4>
        <div class=" flex items-center gap-6">
            <p class="font-semibold">Filters :</p>
            <form action="">
                <select name="" id="" class="bg-white rounded-md p-2 outline-0 shadow">
                    <option selected disabled>Urutkan Berdasarkan</option>
                    <option value="" class="bg-white">Dari A-Z</option>
                    <option value="" class="bg-white">Dari Z-A</option>
                    <option value="" class="bg-white">Waktu Terbaru</option>
                    <option value="" class="bg-white">Waktu Terlama</option>
                </select>
            </form>
            <form action="">
                <select name="" id="" class="bg-white rounded-md p-2 outline-0 shadow">
                    <option selected disabled>Grup Sesuai Jenis</option>
                    <option value="" class="bg-white">Karya Tulis</option>
                    <option value="" class="bg-white">Karya Seni</option>
                    <option value="" class="bg-white">Komposisi Musik</option>
                    <option value="" class="bg-white">Karya Audio Visual</option>
                    <option value="" class="bg-white">Karya Fotografi</option>
                    <option value="" class="bg-white">Karya Drama dan Koreografi</option>
                    <option value="" class="bg-white">Karya Rekaman</option>
                    <option value="" class="bg-white">Karya Lainnya</option>
                </select>
            </form>

        </div>
    </div>

    {{-- dekstop table --}}
    <div class="text-sm flex font-light flex-col">
        <div class="rounded-md flex items-center gap-3 px-3 mb-2">
            <h4 class="w-16 font-semibold uppercase">#</h4>
            <h4 class="flex-1 font-semibold uppercase">Judul</h4>
            <h4 class="flex-1 font-semibold uppercase">Waktu Pengajuan</h4>
            <h4 class="flex-1 font-semibold uppercase">Email</h4>
            <h4 class="w-16 font-semibold uppercase">Status</h4>
            <h4 class="w-16 font-semibold uppercase text-center">Aksi</h4>
        </div>
        <div>
            <div class="rounded-md bg-white flex items-center gap-3 p-3 mb-1">
                <p class="w-16">1</p>
                <p class="flex-1">Lorem ipsum, dolor sit amet consectetur adipisicing elit...</p>
                <p class="flex-1">20 November 2024</p>
                <p class="flex-1">saifultesting@gmaail.com</p>
                <p class="w-16">
                    <span class="px-2 py-1 rounded-3xl text-yellow-500 font-semibold">Proses</span>
                </p>
                <div class="w-16">
                    <div class="relative text-center">
                        <button onclick="toggleDropdown(this)" class="menu-btn">
                            <i class="bi bi-three-dots-vertical"></i>
                        </button>
                        <div class="dropdown-menu hidden absolute right-0 mt-2 w-32 bg-white z-[199] rounded shadow-lg">
                            <a href="{{ route('admin.applicant.detail') }}"
                                class="block px-4 py-2 text-gray-700 hover:bg-gray-200">Detail</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="rounded-md bg-white flex items-center gap-3 p-3 mb-1">
                <p class="w-16">2</p>
                <p class="flex-1">Lorem ipsum, dolor sit amet consectetur adipisicing elit...</p>
                <p class="flex-1">20 November 2024</p>
                <p class="flex-1">saifultesting@gmaail.com</p>
                <p class="w-16">
                    <span class="px-2 py-1 rounded-3xl text-red-500 font-semibold">Ditolak</span>
                </p>
                <div class="w-16">
                    <div class="relative text-center">
                        <button onclick="toggleDropdown(this)" class="menu-btn">
                            <i class="bi bi-three-dots-vertical"></i>
                        </button>
                        <div class="dropdown-menu hidden absolute right-0 mt-2 w-32 bg-white z-[199] rounded shadow-lg">
                            <a href="{{ route('admin.applicant.detail') }}"
                                class="block px-4 py-2 text-gray-700 hover:bg-gray-200">Detail</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="rounded-md bg-white flex items-center gap-3 p-3 mb-1">
                <p class="w-16">3</p>
                <p class="flex-1">Lorem ipsum, dolor sit amet consectetur adipisicing elit...</p>
                <p class="flex-1">20 November 2024</p>
                <p class="flex-1">saifultesting@gmaail.com</p>
                <p class="w-16">
                    <span class="px-3 py-1 rounded-3xl text-gray-500 font-semibold">Revisi</span>
                </p>
                <div class="w-16">
                    <div class="relative text-center">
                        <button onclick="toggleDropdown(this)" class="menu-btn">
                            <i class="bi bi-three-dots-vertical"></i>
                        </button>
                        <div class="dropdown-menu hidden absolute right-0 mt-2 w-32 bg-white z-[199] rounded shadow-lg">
                            <a href="{{ route('admin.applicant.detail') }}"
                                class="block px-4 py-2 text-gray-700 hover:bg-gray-200">Detail</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    function toggleDropdown(button) {
        document.querySelectorAll('.dropdown-menu').forEach(menu => menu.classList.add('hidden'));

        const dropdown = button.nextElementSibling;
        dropdown.classList.toggle('hidden');
    }
    document.addEventListener('click', function(event) {
        if (!event.target.closest('.menu-btn')) {
            document.querySelectorAll('.dropdown-menu').forEach(menu => menu.classList.add('hidden'));
        }
    });
</script>
@endsection