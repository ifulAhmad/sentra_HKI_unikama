@extends('users.partials.main')

@section('users-content')
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-lg font-semibold mb-6">Edit file pengajuan</h2>

        <form method="POST" action="{{ route('progress.filesUpdate', $submission->uuid) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="link_ciptaan" class="block text-sm font-medium text-gray-700">Link Ciptaan</label>
                <textarea id="link_ciptaan" name="link_ciptaan" rows="3"
                    class="w-full px-3 py-2 border rounded-md outline-0 focus:ring-indigo-500 focus:border-indigo-500">{{ old('link_ciptaan', $submission->files->link_ciptaan) }}</textarea>
                @error('link_ciptaan')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="file_pernyataan_karya_cipta" class="block text-sm font-medium text-gray-700">File Pernyataan
                    Karya Cipta</label>
                <div class="flex items-center space-x-3" id="file_pernyataan_karya_cipta_preview">
                    @if ($submission->files->file_pernyataan_karya_cipta)
                        <iframe src="{{ asset('storage/' . $submission->files->file_pernyataan_karya_cipta) }}"
                            width="100%" height="300px" class="border my-4"></iframe>
                            <input type="hidden" name="oldFilePernyataanKaryaCipta" value="{{ $submission->files->file_pernyataan_karya_cipta }}">
                    @else
                        <span class="my-4">Tidak ada file yang diunggah.</span>
                    @endif
                </div>
                <input type="file" id="file_pernyataan_karya_cipta" name="file_pernyataan_karya_cipta"
                    class="mt-2 w-full px-3 py-2 border rounded-md outline-0 focus:ring-indigo-500 focus:border-indigo-500"
                    onchange="updateFilePreview(this)">
                @error('file_pernyataan_karya_cipta')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="file_pengalihan_karya_cipta" class="block text-sm font-medium text-gray-700">File Pengalihan
                    Karya Cipta</label>
                <div class="flex items-center space-x-3" id="file_pengalihan_karya_cipta_preview">
                    @if ($submission->files->file_pengalihan_karya_cipta)
                        <iframe src="{{ asset('storage/' . $submission->files->file_pengalihan_karya_cipta) }}"
                            width="100%" height="300px" class="border my-4"></iframe>
                            <input type="hidden" name="oldFilePengalihanKaryaCipta" value="{{ $submission->files->file_pengalihan_karya_cipta }}">
                    @else
                        <span class="my-4">Tidak ada file yang diunggah.</span>
                    @endif
                </div>
                <input type="file" id="file_pengalihan_karya_cipta" name="file_pengalihan_karya_cipta"
                    class="mt-2 w-full px-3 py-2 border rounded-md outline-0 focus:ring-indigo-500 focus:border-indigo-500"
                    onchange="updateFilePreview(this)">
                @error('file_pengalihan_karya_cipta')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="file_scan_ktp" class="block text-sm font-medium text-gray-700">File Scan KTP</label>
                <div class="flex items-center space-x-3" id="file_scan_ktp_preview">
                    @if ($submission->files->file_scan_ktp)
                        <iframe src="{{ asset('storage/' . $submission->files->file_scan_ktp) }}" width="100%"
                            height="300px" class="border my-4"></iframe>
                            <input type="hidden" name="oldFileScanKtp" value="{{ $submission->files->file_scan_ktp }}">
                    @else
                        <span class="my-4">Tidak ada file yang diunggah.</span>
                    @endif
                </div>
                <input type="file" id="file_scan_ktp" name="file_scan_ktp"
                    class="mt-2 w-full px-3 py-2 border rounded-md outline-0 focus:ring-indigo-500 focus:border-indigo-500"
                    onchange="updateFilePreview(this)">
                @error('file_scan_ktp')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="file_bukti_pembayaran" class="block text-sm font-medium text-gray-700">File Bukti
                    Pembayaran</label>
                <div class="flex items-center space-x-3" id="file_bukti_pembayaran_preview">
                    @if ($submission->files->file_bukti_pembayaran)
                        <iframe src="{{ asset('storage/' . $submission->files->file_bukti_pembayaran) }}" width="100%"
                            height="300px" class="border my-4"></iframe>
                            <input type="hidden" name="oldFileBuktiPembayaran" value="{{ $submission->files->file_bukti_pembayaran }}">
                    @else
                        <span class="my-4">Tidak ada file yang diunggah.</span>
                    @endif
                </div>
                <input type="file" id="file_bukti_pembayaran" name="file_bukti_pembayaran"
                    class="mt-2 w-full px-3 py-2 border rounded-md outline-0 focus:ring-indigo-500 focus:border-indigo-500"
                    onchange="updateFilePreview(this)">
                @error('file_bukti_pembayaran')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex justify-end gap-2 mt-6">
            <a href="{{ route('progress.detail', $submission->uuid) }}" class="px-4 py-2 mx-3 bg-gray-300 rounded-md hover:bg-gray-400">Batal</a>
                <button type="submit"
                    class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">Simpan</button>
            </div>
        </form>
    </div>

    <script>
        function updateFilePreview(input) {
            const fileInputId = input.id;
            const previewContainer = $('#' + fileInputId + '_preview');
            previewContainer.empty();

            const file = input.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const iframe = $('<iframe>', {
                        src: e.target.result,
                        width: '100%',
                        height: '300px',
                        class: 'border my-4'
                    });
                    previewContainer.append(iframe);
                };
                reader.readAsDataURL(file);
            }
        }
    </script>
@endsection
