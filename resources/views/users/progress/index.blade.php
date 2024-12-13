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
    <div class="p-4 bg-indigo-100 min-h-96">
        <h1 class="text-lg font-semibold">Kemajuan Usulan</h1>
        <div class="bg-amber-600 h-[3px] rounded w-28 mt-2 mb-4"></div>

        <div class="text-xs text-end mb-4">
            <a href="{{ route('submission.index') }}"
                class="px-3 py-2 rounded-md bg-indigo-600 text-white uppercase duration-100 hover:bg-indigo-800"> + Buat
                Pengajuan</a>
        </div>

        {{-- dekstop table --}}
        <div class="text-sm font-light pb-10">
            @if ($submissions->count())
                <div class="overflow-x-auto rounded-lg">
                    <table class="table-auto w-full border-collapse border border-indigo-200">
                        <thead>
                            <tr class="bg-indigo-500 text-white">
                                <th class="text-start p-3 border-b border-indigo-200">No</th>
                                <th class="text-start p-3 border-b border-indigo-200">Judul</th>
                                <th class="text-start p-3 border-b border-indigo-200">Email Penc.1</th>
                                <th class="text-start p-3 border-b border-indigo-200">Waktu</th>
                                <th class="text-start p-3 border-b border-indigo-200">Status</th>
                                <th class="text-start p-3 border-b border-indigo-200">Menu</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($submissions as $submission)
                                <tr class="odd:bg-white even:bg-indigo-50">
                                    <td class="p-3 border-b border-indigo-200">{{ $loop->iteration }}</td>
                                    <td class="p-3 border-b border-indigo-200">{!! $submission->judul !!}</td>
                                    <td class="p-3 border-b border-indigo-200">{{ $applicant->email }}</td>
                                    <td class="p-3 border-b border-indigo-200">
                                        {{ $submission->created_at->format('d F Y') }}
                                    </td>
                                    <td class="p-3 border-b border-indigo-200 text-xs">
                                        <p
                                            class="capitalize text-sm
                                                @if ($submission->status == 'proses') text-yellow-500 
                                                @elseif($submission->status == 'menunggu')
                                                    text-gray-500
                                                @elseif($submission->status == 'ditolak')
                                                    text-red-500
                                                @elseif($submission->status == 'diterima')
                                                    text-green-500
                                                @elseif($submission->status == 'revisi')
                                                    text-orange-400 @endif font-semibold">
                                            {{ $submission->status }}
                                        </p>
                                    </td>
                                    <td class="p-3 border-b border-indigo-200 text-center">
                                        <div class="flex items-center gap-3 font-semibold">
                                            <a href="{{ route('progress.detail', $submission->uuid) }}"
                                                class="text-indigo-600 hover:underline">Detail</a>
                                            @if ($submission->status == 'revisi')
                                                <a href="#" class="text-amber-600 hover:underline">Edit</a>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="text-center my-8 text-lg">
                    <p>Data belum dibuat</p>
                </div>
            @endif
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
        });

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
