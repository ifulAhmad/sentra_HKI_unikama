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


    <div class="container">
        <h1 class="font-semibold text-lg uppercase">Kelola Data Pengguna</h1>
        <div class="bg-blue-600 h-[4px] rounded w-28 mt-2 mb-4"></div>

        @if ($users->count())
            <form action="{{ route('admin.users.delete') }}" method="post">
                @csrf
                @method('delete')
                {{-- btn delete --}}
                <div class="flex justify-between items-center my-2">
                    <p class="font-semibold text-lg"><span class="text-indigo-600">{{ $users->count() }}</span>
                        Pengguna
                        Terdaftar</p>
                    <button type="submit"
                        class="text-white bg-red-500 hover:bg-red-700 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5"
                        onclick="return confirm('Apakah anda yakin ingin menghapus data terpilih?')">Hapus
                        data terpilih</button>
                </div>
                <div class="my-3 p-3 rounded-md bg-amber-100 text-amber-700">
                    <p><span class="font-semibold">NOTE : </span> Data yang terkait pada <i
                            class="font-semibold">pengguna</i> seperti <i class="font-semibold">data
                            pencipta,
                            data pengajuan dan data klaim</i> akan ikut terhapus</p>
                </div>
                <div class="overflow-x-auto bg-white shadow-md rounded-lg">
                    <table class="min-w-full text-sm text-center text-gray-500">
                        <thead class="text-xs text-white uppercase bg-indigo-400">
                            <tr>
                                <th class="px-6 py-3">#</th>
                                <th class="px-6 py-3">Nama</th>
                                <th class="px-6 py-3">Waktu Pendaftaran</th>
                                <th class="px-6 py-3 text-center">Data Pencipta</th>
                                <th class="px-6 py-3 text-center">Pilih</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr class="bg-white border-b hover:bg-gray-100">
                                    <td class="px-3 py-2 text-center font-medium text-gray-900">{{ $loop->iteration }}</td>
                                    <td class="px-3 py-2 text-center">{{ $user->nama }}</td>
                                    <td class="px-3 py-2 text-center">
                                        {{ \Carbon\Carbon::parse($user->created_at)->format('d F Y') }}
                                    </td>
                                    <td class="px-3 py-2 text-center">
                                        @if ($user->applicant != null)
                                            <a href="#" class="text-indigo-600 hover:underline">Detail</a>
                                        @else
                                            <p><i>Belum terkait</i></p>
                                        @endif
                                    </td>
                                    <td class="px-3 py-2 text-center">
                                        <input type="checkbox" name="ids[]" value="{{ $user->id }}">
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </form>
        @else
            <div class="text-center">
                <p class="text-lg my-10 text-gray-600">Tidak ada Pengguna</p>
            </div>
        @endif
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
    </script>
@endsection
