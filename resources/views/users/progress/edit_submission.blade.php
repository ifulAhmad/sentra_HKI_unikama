@extends('users.partials.main')

@section('users-content')
<div class="bg-white shadow-md px-6 py-6 rounded-md flex flex-col gap-6">
    <h2 class="text-xl font-bold text-gray-700 mb-4">Edit Data</h2>
    <form method="POST" action="{{ route('progress.submissionUpdate', $submission->uuid) }}" class="flex flex-col gap-6">
        @csrf
        @method('PUT')
        <div class="flex items-center gap-3">
            <div class="flex-1 flex flex-col gap-2">
                <label for="skema" class="font-semibold">Skema <span class="text-red-600">*</span></label>
                <select name="skema" id="skema"
                    class="w-full px-2 py-2 outline-0 border-b-2 focus:border-indigo-600 text-gray-700">
                    <option value="umum" {{ $submission->skema === 'umum' ? 'selected' : '' }}>Umum</option>
                    <option value="lembaga" {{ $submission->skema === 'lembaga' ? 'selected' : '' }}>Lembaga</option>
                </select>
            </div>
            <div class="flex-1 rounded-md overflow-hidden bg-white">
                <label for="copyright_sub_type_uuid" class="font-semibold">Sub Jenis Hak Cipta<span
                        class="text-red-600">*</span></label>
                <select id="copyright_sub_type_uuid" name="copyright_sub_type_uuid"
                    class="p-3 w-full rounded-t-md border-b-2 outline-0 @error('copyright_sub_type_uuid') border-red-400 @enderror focus:border-indigo-600">
                    <option selected disabled>
                        Pilih Sub Jenis Hak Cipta
                        <span class="text-red-600">*</span>
                    </option>
                    @foreach ($copyrightTypes as $copyrightType)
                    <optgroup class="font-semibold" label="{{ $copyrightType->type }}" class="font-semibold">
                        @foreach ($copyrightType->subTypes as $subtype)
                        <option value="{{ $subtype->uuid }}"
                            {{ $submission->subtype->uuid === $subtype->uuid ? 'selected' : '' }}>
                            &bullet; {{ $subtype->type }}
                        </option>
                        @endforeach
                    </optgroup>
                    @endforeach
                </select>
                @error('copyright_sub_type_uuid')
                <div class="text-red-600 text-sm px-2 py-1">
                    {{ $message }}
                </div>
                @enderror
            </div>

        </div>
        <div class="flex flex-col gap-2">
            <label for="judul" class="font-semibold">Judul <span class="text-red-600">*</span></label>
            <input type="text" id="judul" name="judul" value="{{ old('judul', $submission->judul) }}"
                class="w-full px-2 py-2 outline-0 border-b-2 @error('judul') border-red-400 @enderror focus:border-indigo-600 text-gray-700"
                placeholder="Masukkan judul..." />
            @error('judul')
            <div class="text-red-600 text-sm">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="flex flex-col gap-2">
            <label for="deskripsi" class="font-semibold">Deskripsi <span class="text-red-600">*</span></label>
            <textarea id="deskripsi" name="deskripsi" rows="4"
                class="w-full px-2 py-2 outline-0 border-b-2 @error('deskripsi') border-red-400 @enderror focus:border-indigo-600 text-gray-700"
                placeholder="Masukkan deskripsi...">{{ old('deskripsi', $submission->deskripsi) }}</textarea>
            @error('deskripsi')
            <div class="text-red-600 text-sm">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="flex flex-col gap-2">
            <label for="negara" class="font-semibold">Negara</label>
            <input type="text" id="negara" name="negara" value="{{ old('negara', $submission->negara) }}"
                readonly
                class="w-full px-2 py-2 outline-0 border-b-2 focus:border-indigo-600 text-gray-700 bg-gray-100 cursor-not-allowed"
                placeholder="Negara" />
        </div>
        <div class="flex flex-col gap-2">
            <label for="kota" class="font-semibold">Kota <span class="text-red-600">*</span></label>
            <input type="text" id="kota" name="kota" value="{{ old('kota', $submission->kota) }}"
                class="w-full px-2 py-2 outline-0 border-b-2 @error('kota') border-red-400 @enderror focus:border-indigo-600 text-gray-700"
                placeholder="Masukkan kota..." />
            @error('kota')
            <div class="text-red-600 text-sm">
                {{ $message }}
            </div>
            @enderror
        </div>

        <!-- Submit Button -->
        <div class="flex justify-end">
            <a href="{{ route('progress.detail', $submission->uuid) }}" class="px-4 py-2 mx-3 bg-gray-300 rounded-md hover:bg-gray-400">Batal</a>
            <button type="submit"
                class="bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                Simpan
            </button>
        </div>
    </form>
</div>
@endsection