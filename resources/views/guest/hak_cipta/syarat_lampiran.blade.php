@extends('guest.partials.main')

@section('content')
<div class="min-h-96 px-6">
  @if ($letters->count())
  @foreach ($letters as $letter)
  <form action="{{ route('letter.download', $letter->id) }}" method="post">
    @csrf
    <button class="mb-3 text-amber-600 hover:underline">{{ $letter->type }}</button>
  </form>
  @endforeach
  @else
  <div class="text-center my-10">
    <p>Template surat belum tersedia, silahkan dapatkan surat dengan mengunjungi sentra HKI UNIKAMA</p>
  </div>
  @endif
</div>
@endsection