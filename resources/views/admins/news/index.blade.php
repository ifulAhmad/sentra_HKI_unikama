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
<div class="container mx-auto p-5">
    <h1 class="font-semibold text-lg uppercase">Kelola Data Berita</h1>
    <div class="bg-blue-600 h-[4px] rounded w-28 mt-2 mb-4"></div>

    <div class="text-end my-4">
        <a href="{{ route('admin.news.create') }}"
            class="px-5 py-2 rounded-xl text-white font-semibold bg-indigo-500 hover:bg-indigo-600">+ Tambah
            Berita</a>
    </div>

    <!-- Tabel -->
    @if ($news->count())
    <div class="overflow-x-auto bg-white shadow-md rounded-lg">
        <table class="min-w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-white uppercase bg-indigo-400">
                <tr>
                    <th class="px-6 py-3">#</th>
                    <th class="px-6 py-3">Judul Berita</th>
                    <th class="px-6 py-3">Tanggal Publikasi</th>
                    <th class="px-6 py-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($news as $n)
                <tr class="bg-white border-b hover:bg-gray-100">
                    <td class="px-3 py-2 font-medium text-gray-900">{{ $loop->iteration }}</td>
                    <td class="px-3 py-2">{{ $n->title }}</td>
                    <td class="px-3 py-2">
                        {{ \Carbon\Carbon::parse($n->created_at)->format('d F Y') }}
                    </td>
                    <td class="px-3 py-2 text-center">
                        <div class="flex justify-center space-x-2">
                            <a href="#" class="text-blue-600 hover:underline">Detail</a>
                            <a href="{{ route('admin.news.edit', $n->uuid) }}"
                                class="text-yellow-600 hover:underline">Edit</a>
                            <form action="{{ route('admin.news.delete', $n->uuid) }}" method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus berita ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class=" p-4 flex justify-end">
            {{ $news->links() }}
        </div>
    </div>
    @else
    <div class="text-center">
        <p class="text-lg my-10 text-gray-600">Data belum dibuat</p>
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