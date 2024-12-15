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
<div class="container mx-auto px-4 py-6">
    @if ($errors->any())
    <div class="bg-red-100 text-sm border border-red-400 text-red-700 px-4 py-3 rounded relative">
        <ul class="list-disc pl-5">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="bg-white shadow-md rounded-md p-6">
        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-lg font-semibold text-gray-700">Pencipta</h2>
            <button id="openModal"
                class="bg-indigo-600 text-white text-xs px-4 py-2 rounded-md hover:bg-indigo-700 focus:ring-2 outline-0 focus:ring-indigo-500 focus:ring-offset-2">
                + Tambah Pencipta
            </button>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto rounded-lg bg-white">
            <table class="min-w-full text-sm bg-white border border-gray-200 rounded-md">
                <thead>
                    <tr class="bg-indigo-600 text-white">
                        <th class="px-4 py-2 text-left">#</th>
                        <th class="px-4 py-2 text-left">NIK</th>
                        <th class="px-4 py-2 text-left">Nama</th>
                        <th class="px-4 py-2 text-left">Email</th>
                        <th class="px-4 py-2 text-left">Kontak</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($applicants as $index => $applicant)
                    <tr class="border-t">
                        <td class="px-4 py-2">{{ $index + 1 }}</td>
                        <td class="px-4 py-2">{{ $applicant->nik }}</td>
                        <td class="px-4 py-2">{{ $applicant->nama }}</td>
                        <td class="px-4 py-2">{{ $applicant->email }}</td>
                        <td class="px-4 py-2">{{ $applicant->kontak }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="text-end mt-3">
            <a href="{{ route('progress.detail', $submission->uuid) }}" class="px-4 py-2 mx-3 bg-gray-300 rounded-md hover:bg-gray-400">Batal</a>
        </div>
    </div>
</div>

<!-- Modal -->
<div id="modalTambah" class="hidden fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-[999]">
    <div class="overflow-auto bg-white rounded-md shadow-md p-6 w-full max-h-[90%] max-w-lg">
        <form action="{{ route('progress.check.nik', $submission->uuid) }}" method="get">
            @csrf
            <div class="mb-4">
                <label for="nik">Masukkan NIK</label>
                <input type="number" name="nik"
                    class="w-full px-3 py-2 my-3 border rounded focus:outline-none focus:ring-2 focus:ring-indigo-600"
                    id="nik">
            </div>
            <div class="text-end">
                <button type="button" id="closeModal"
                    class="px-4 py-2 mx-3 bg-gray-300 rounded-md hover:bg-gray-400">Batal</button>
                <button type="submit"
                    class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">Submit</button>
            </div>
        </form>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#openModal').on('click', function() {
            $('#modalTambah').removeClass('hidden').addClass('flex');
        });
        $('#closeModal').on('click', function() {
            $('#modalTambah').addClass('hidden').removeClass('flex');
        });
        $('#modalTambah').on('click', function(e) {
            if ($(e.target).is('#modalTambah')) {
                $(this).addClass('hidden').removeClass('flex');
            }
        });
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
    });
</script>
@endsection