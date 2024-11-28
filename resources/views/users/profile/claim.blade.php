@extends('users.partials.main')

@section('users-content')
<div class="p-4 min-h-64 flex justify-center">
    <div class="block" id="statement">
        <div class="flex flex-col items-center">
            <h1 class="font-semibold">INFORMASI!</h1>
            <div class="bg-amber-600 h-[3px] rounded w-20 mt-2 mb-4"></div>
        </div>
        <p class="text-center capitalize text-sm my-4">NIK Sudah Terdaftar Pada Sistem, Apakah Anda Ingin mengklaim data
            dibawah ini?
        </p>
        <table class="w-full table-sm table-fixed mb-3">
            <thead>
                <tr>
                    <th class="p-1 bg-indigo-200 text-sm">NIK</th>
                    <th class="p-1 bg-indigo-200 text-sm">Nama</th>
                    <th class="p-1 bg-indigo-200 text-sm">Email</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="p-1 bg-indigo-100 text-center text-sm">{{ $applicant->nik }}</td>
                    <td class="p-1 bg-indigo-100 text-center text-sm">{{ $applicant->nama }}</td>
                    <td class="p-1 bg-indigo-100 text-center text-sm">{{ $applicant->email }}</td>
                </tr>
            </tbody>
        </table>
        <div class="flex items-center justify-end gap-3">
            <button type="button" id="trigger"
                class="px-4 py-2 text-sm rounded-md bg-indigo-600 duration-200 text-white hover:bg-indigo-700">Iya, Ini
                Data Saya</button>
            <a href="{{ route('profile.index') }}"
                class="px-4 py-2 text-sm rounded-md bg-red-600 duration-200 text-white hover:bg-red-700">Batal</a>
        </div>
    </div>
    <div class="w-[70%] hidden" id="form">
        <h3 class="text-center my-4 text-sm">Tambahkan Bukti Scan KTP</h3>
        <form action="{{ route('claim.store', $applicant->nik) }}" method="post" class="text-sm" enctype="multipart/form-data">
            @csrf
            <div class="bg-white shadow px-4 py-4 mb-3 rounded-md flex flex-col gap-7">
                <label for="scan_ktp" class="font-light">
                    Upload Scan KTP Sebagai Bukti Klaim
                </label>

                <div id="pdf-preview-scan-ktp"
                    class="w-full h-[300px] border border-gray-300 rounded-lg overflow-hidden mb-4 hidden">
                    <iframe id="pdf-frame-scan-ktp" class="w-full h-full"></iframe>
                </div>
                <input type="file" id="scan_ktp" accept=".pdf" name="file_scan_ktp"
                    class="px-1 py-2 outline-0 border-b-2 focus:border-amber-600" placeholder="file">
            </div>
            <div class="text-end">
                <button type="submit"
                    class="px-4 py-2 text-sm rounded-md bg-indigo-600 duration-200 text-white hover:bg-indigo-700">Submit</button>
            </div>
        </form>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#trigger').click(function() {
            $('#statement').removeClass('block').addClass('hidden');
            $('#form').removeClass('hidden').addClass('block');
        })
    });

    function handleFilePreview(inputId, previewId, frameId) {
        $(`#${inputId}`).on('change', function(event) {
            const file = event.target.files[0];
            if (file && file.type === "application/pdf") {
                const fileURL = URL.createObjectURL(file);
                $(`#${frameId}`).attr('src', fileURL);
                $(`#${previewId}`).removeClass('hidden');
            } else {
                alert("Mohon unggah file berformat PDF.");
            }
        });
    }

    handleFilePreview('scan_ktp', 'pdf-preview-scan-ktp', 'pdf-frame-scan-ktp');
</script>
@endsection