@extends('guest.partials.main')

@section('content')
<div class="min-h-full flex flex-col lg:flex-row md:gap-4 gap-6 bg-gray-100 rounded-md p-4">
    @include('users.partials.navbar')
    <main class="flex-1">
        <div class="container bg-white rounded-lg overflow-hidden">
            @yield('users-content')
        </div>
    </main>
</div>
@endsection