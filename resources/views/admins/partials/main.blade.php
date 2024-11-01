<!DOCTYPE html>
<html lang="en" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HKI UNIKAMA</title>
    @vite('resources/css/app.css')
    {{-- alpine js --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body class="relative min-h-full">
    <div class="flex min-h-full">
        @include('admins.partials.navbar')
        <main class="flex-1 bg-blue-100 overflow-y-auto h-[100vh] relative">
            @include('admins.partials.header')
            <div class="mx-auto max-w-7xl p-4 sm:px-6 lg:px-8">
                @yield('admin-content')
            </div>
        </main>
    </div>
</body>

</html>