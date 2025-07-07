@extends('admins.partials.main')

@section('admin-content')
<div class="flex justify-center items-center ">
    <div class="w-[70%]" id="form">
        <h3 class="text-center my-4 text-sm">Tambahkan Template Surat</h3>
        <form action="{{ route('admin.letter.store') }}" method="post" class="text-sm" enctype="multipart/form-data">
            @csrf
            <div class="bg-white shadow px-4 py-4 mb-3 rounded-md flex flex-col gap-7">
                <label for="letter" class="font-light">
                    Template surat yang digunakan pencipta untuk memenuhi persyaratan pengajuan.
                </label>

                <div id="pdf-preview-letter"
                    class="w-full h-[300px] border border-gray-300 rounded-lg overflow-hidden mb-4 hidden">
                    <iframe id="pdf-frame-letter" class="w-full h-full"></iframe>
                </div>
                <input type="file" id="letter" accept=".pdf" name="file_letter"
                    class="px-1 py-2 outline-0 border-b-2 focus:border-amber-600" placeholder="file">
                @error('file_letter')
                <div class="text-red-600 text-xs mt-1">
                    {{ $message }}
                </div>
                @enderror
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

    handleFilePreview('letter', 'pdf-preview-letter', 'pdf-frame-letter');
</script>
@endsection