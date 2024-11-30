@extends('admins.partials.main')

@section('admin-content')
<div>
    <h1 class="font-semibold text-lg uppercase">Rekap Pengajuan</h1>
    <div class="bg-blue-600 h-[4px] rounded w-28 mt-2 mb-4"></div>

    <div class="flex items-center text-sm justify-between mb-6">
        <h4 class="text-lg font-semibold">{{ $applicants->count() }} Pengajuan Terdaftar</h4>
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
        @if ($applicants->count())
        <div class="rounded-md flex items-center gap-3 px-3 mb-2">
            <h4 class="w-16 font-semibold uppercase">#</h4>
            <h4 class="flex-1 font-semibold uppercase">NIK</h4>
            <h4 class="flex-1 font-semibold uppercase">Nama</h4>
            <h4 class="flex-1 font-semibold uppercase">Email</h4>
            <h4 class="flex-1 font-semibold uppercase">Kontak</h4>
        </div>
        <div>
            @foreach ($applicants as $applicant)
            <a href="{{ route('admin.applicant.detail', $applicant->nik) }}"
                class="w-full rounded-md bg-white flex items-center border-2 border-white gap-3 p-2 mb-1 hover:border-indigo-400">
                <p class="w-16">{{ $loop->iteration }}</p>
                <p class="flex-1">{{ $applicant->nik }}</p>
                <p class="flex-1">{{ $applicant->nama }}</p>
                <p class="flex-1">{{ $applicant->email }}</p>
                <p class="flex-1">{{ $applicant->kontak }}</p>
            </a>
            @endforeach
        </div>
        <div class="flex mt-5 justify-end">
            {{ $applicants->links() }}
        </div>
        @else
        <div class="text-center my-10 text uppercase">
            <p>Data Tidak ditemukan</p>
        </div>
        @endif
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