@extends('users.partials.main')

@section('users-content')
@if (session()->has('success'))
<div
  class="notif-success fixed end-3 top-28 min-w-[400px] text-sm rounded-md text-green-600 bg-green-100 border border-green-400">
  <div class="relative p-4 flex justify-between gap-2">
    <p class="flex items-center gap-2"><i class="bi bi-check-circle-fill"></i> {{ session()->get('success') }}</p>
    <button type="button" id="notif-success" class="text-xl absolute right-2 text-green-400 bottom-7"><i
        class="bi bi-x"></i></button>
  </div>
</div>
@endif
@if (session()->has('warning'))
<div
  class="notif-warning fixed end-3 top-28 min-w-[400px] text-sm rounded-md bg-yellow-100 text-yellow-600 border border-yellow-400">
  <div class="relative p-4 flex justify-between gap-2">
    <p class="flex items-center gap-2"><i class="bi bi-exclamation-circle-fill"></i>
      {{ session()->get('warning') }}
    </p>
    <button type="button" id="notif-warning" class="text-xl absolute right-2 text-yellow-400 bottom-7"><i
        class="bi bi-x"></i></button>
  </div>
</div>
@endif
<div class="p-4 min-h-64 flex justify-center">
  <div class="block" id="statement">
    <div class="flex flex-col items-center">
      <h1 class="font-semibold">INFORMASI!</h1>
      <div class="bg-amber-600 h-[3px] rounded w-20 mt-2 mb-4"></div>
    </div>
    <p class="text-center capitalize text-sm my-4">Mohon Tunggu beberapa saat, kami sedang memproses permohonan anda.</p>
    </p>
    <table class="w-full table-sm table-fixed mb-3">
      <thead>
        <tr>
          <th class="p-1 bg-indigo-200 text-sm">NIK</th>
          <th class="p-1 bg-indigo-200 text-sm">Nama</th>
          <th class="p-1 bg-indigo-200 text-sm">Email</th>
          <th class="p-1 bg-indigo-200 text-sm">Status</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="p-1 text-center border p-3 text-sm">{{ $claim->applicant->nik }}</td>
          <td class="p-1 text-center border p-3 text-sm">{{ $claim->applicant->nama }}</td>
          <td class="p-1 text-center border p-3 text-sm">{{ $claim->applicant->email }}</td>
          <td class="p-1 text-center border p-3 text-sm">
            <p class=" @if ($claim->status == 'pending')
              text-yellow-500
            @else
              text-red-600
            @endif font-semibold uppercase">{{ $claim->status }}</p>
          </td>
        </tr>
      </tbody>
    </table>
  </div>

  <script>
    $(document).ready(function() {
      $(document).ready(function() {
        setTimeout(() => {
          $('.notif-success').fadeOut();
        }, 5000);
        $('#notif-success').click(function() {
          $('.notif-success').addClass('hidden');
        });
        setTimeout(() => {
          $('.notif-warning').fadeOut();
        }, 5000);
        $('#notif-warning').click(function() {
          $('.notif-warning').addClass('hidden');
        });
      });
    });
  </script>
  @endsection