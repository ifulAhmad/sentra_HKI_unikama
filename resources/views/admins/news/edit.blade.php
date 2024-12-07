@extends('admins.partials.main')

@section('admin-content')
<div class="container mx-auto p-5">

    <h1 class="font-semibold text-lg uppercase">Buat Berita</h1>
    <div class="bg-blue-600 h-[4px] rounded w-28 mt-2 mb-4"></div>

    <div class="max-w-4xl mx-auto bg-white p-6 shadow-md rounded-lg">
        <form action="{{ route('admin.news.update', $news->uuid) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="mb-5">
                <label for="image1" class="block text-gray-700 font-semibold mb-2">Gambar Berita</label>
                <div id="preview-container" class="mb-4">
                    @if ($news->image1)
                    <img id="preview-image1" src="{{ asset('storage/' . $news->image1) }}" alt="Preview Gambar"
                        class="w-96 h-48 object-cover rounded-md border">
                    <input type="hidden" name="oldImage1" value="{{ $news->image1 }}">
                    @else
                    <img id="preview-image1" src="" alt="Preview Gambar"
                        class="hidden w-96 h-48 object-cover rounded-md border">
                    @endif
                </div>
                <input type="file" id="image1" name="image1"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                @error('image1')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-5">
                <label for="caption1" class="block text-gray-700 font-semibold mb-2">Caption Image 1</label>
                <input type="text" id="caption1" name="caption1"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    value="{{ old('caption1', $news->caption1) }}">
                @error('caption1')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-5">
                <label for="image2" class="block text-gray-700 font-semibold mb-2">Gambar Berita 2</label>
                <div id="preview-container" class="mb-4">
                    @if ($news->image2)
                    <img id="preview-image2" src="{{ asset('storage/' . $news->image2) }}" alt="Preview Gambar"
                        class="w-96 h-48 object-cover rounded-md border">
                    <input type="hidden" name="oldImage2" value="{{ $news->image2 }}">
                    @else
                    <img id="preview-image2" src="" alt="Preview Gambar"
                        class="hidden w-96 h-48 object-cover rounded-md border">
                    @endif
                </div>
                <input type="file" id="image2" name="image2"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                @error('image2')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-5">
                <label for="caption2" class="block text-gray-700 font-semibold mb-2">Caption Image 2</label>
                <input type="text" id="caption2" name="caption2"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    value="{{ old('caption2', $news->caption2) }}">
                @error('caption2')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-5">
                <label for="title" class="block text-gray-700 font-semibold mb-2">Judul Berita</label>
                <input type="text" id="title" name="title"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    required value="{{ old('title', $news->title) }}">
                @error('title')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3 trix-wrapper rounded">
                <label for="content" class="block text-gray-700 font-semibold mb-2">Konten Berita</label>
                <input id="content" type="hidden" name="content" value="{{ old('content', $news->content) }}">
                <trix-editor input="content" class="min-h-40 @error('content') border-red-500 @enderror"></trix-editor>
                @error('content')
                <div class="text-red-500 text-sm mt-1">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="flex justify-end">
                <button type="submit"
                    class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Buat
                    Berita</button>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener('trix-file-accept', function(e) {
        e.preventDefault();
    });

    $(document).ready(function() {
        $('#image1').on('change', function(event) {
            const file = event.target.files[0];
            const $previewImage = $('#preview-image1');

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    $previewImage.attr('src', e.target.result);
                    $previewImage.removeClass('hidden');
                };
                reader.readAsDataURL(file);
            } else {
                $previewImage.attr('src', '').addClass(
                    'hidden');
            }
        });
        $('#image2').on('change', function(event) {
            const file = event.target.files[0];
            const $previewImage = $('#preview-image2');

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    $previewImage.attr('src', e.target.result);
                    $previewImage.removeClass('hidden');
                };
                reader.readAsDataURL(file);
            } else {
                $previewImage.attr('src', '').addClass(
                    'hidden');
            }
        });
    });
</script>
@endsection