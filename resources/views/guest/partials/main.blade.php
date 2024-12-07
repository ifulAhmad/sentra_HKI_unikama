<!DOCTYPE html>
<html lang="en" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="Setra HKI Unikama - Pusat layanan pengajuan dan pengelolaan hak kekayaan intelektual di Universitas Kanjuruhan Malang. Mudah, cepat, dan terpercaya.">
    <meta name="keywords" content="Setra HKI, HKI Unikama, hak kekayaan intelektual, Unikama, Universitas Kanjuruhan Malang, pengajuan HKI, layanan HKI">
    <meta name="author" content="Universitas Kanjuruhan Malang">
    <meta name="robots" content="index, follow">

    <meta property="og:title" content="Setra HKI Unikama - Layanan HKI Universitas Kanjuruhan Malang">
    <meta property="og:description" content="Pusat layanan pengajuan dan pengelolaan hak kekayaan intelektual di Universitas Kanjuruhan Malang. Mudah, cepat, dan terpercaya.">
    <!-- <meta property="og:url" content=""> -->
    <meta property="og:type" content="website">

    <title>SENTRA HKI UNIKAMA</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/images/Unikama.png') }}">
    @vite('resources/css/app.css')
    {{-- alpine js --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- font poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            font-weight: 400;
            font-style: normal;
        }
    </style>
</head>

<body class="relative min-h-full">
    @include('guest.partials.navbar')
    <div class="min-h-full">
        <main>
            <div class="mx-auto w-full max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                @yield('content')
            </div>
        </main>
    </div>
    @include('guest.partials.footer')
</body>

</html>