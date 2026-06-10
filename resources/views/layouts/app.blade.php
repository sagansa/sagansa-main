<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Sagansa POS') — Sagansa</title>
    <meta name="description" content="@yield('description', 'Sagansa POS — Aplikasi Kasir Modern & Terintegrasi Attendance untuk UMKM Indonesia')">
    <meta name="keywords" content="@yield('keywords', 'POS, aplikasi kasir, QRIS, absensi karyawan, Sagansa, UMKM, restoran, cafe')">
    <meta name="author" content="PT Sagansa Engineering Indonesia">
    <meta name="robots" content="index, follow">
    @yield('canonical')

    <!-- Favicon SVG -->
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 40 40'%3E%3Crect width='40' height='40' rx='10' fill='url(%23g)'/%3E%3Cdefs%3E%3ClinearGradient id='g' x1='0' y1='0' x2='40' y2='40'%3E%3Cstop offset='0%25' stop-color='%232563eb'/%3E%3Cstop offset='100%25' stop-color='%238b5cf6'/%3E%3C/defs%3E%3Ctext x='50%25' y='54%25' dominant-baseline='central' text-anchor='middle' font-family='Arial,sans-serif' font-weight='900' font-size='22' fill='white'%3ES%3C/text%3E%3C/svg%3E">
    <link rel="icon" type="image/x-icon" href="/favicon.ico">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    @vite(['resources/css/welcome.css'])

    @yield('head')
</head>
<body>

@include('welcome.partials._navbar')

@yield('content')

@include('welcome.partials._footer')

@include('welcome.partials._cookie-banner')

@include('welcome.partials._wa-float')

@vite(['resources/js/welcome.js'])

@yield('scripts')

</body>
</html>