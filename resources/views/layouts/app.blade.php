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
    <link rel="canonical" href="@yield('canonical', 'https://sagansa.id/')">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="@yield('og_type', 'website')">
    <meta property="og:url" content="@yield('og_url', 'https://sagansa.id/')">
    <meta property="og:title" content="@yield('og_title', 'Sagansa POS — Aplikasi Kasir Modern & Terintegrasi Attendance')">
    <meta property="og:description" content="@yield('og_description', 'Sagansa POS — Aplikasi Kasir Modern & Terintegrasi Attendance untuk UMKM Indonesia')">
    <meta property="og:site_name" content="Sagansa POS">
    <meta property="og:locale" content="id_ID">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('og_title', 'Sagansa POS — Aplikasi Kasir Modern & Terintegrasi Attendance')">
    <meta name="twitter:description" content="@yield('og_description', 'Sagansa POS — Aplikasi Kasir Modern & Terintegrasi Attendance untuk UMKM Indonesia')">

    <!-- Default share image (di-override per-halaman bila ada, mis. thumbnail blog) -->
    <meta property="og:image" content="@yield('og_image', asset('images/og-sagansa.png'))">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta name="twitter:image" content="@yield('og_image', asset('images/og-sagansa.png'))">

    <!-- Favicon SVG -->
    <link rel="icon" type="image/svg+xml" href="{{ asset('images/sagansa-logo.svg') }}?v=2">
    <link rel="shortcut icon" type="image/svg+xml" href="{{ asset('images/sagansa-logo.svg') }}?v=2">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    @vite(['resources/css/welcome.css'])

    @php
        $appPromoPriceVal = (int) \App\Models\Setting::get('price_promo', '59000');
        $appPromoPriceFormatted = 'Rp' . number_format($appPromoPriceVal, 0, ',', '.');

        $softwareAppSchema = [
            '@context' => 'https://schema.org',
            '@type' => 'SoftwareApplication',
            'name' => 'Sagansa POS',
            'applicationCategory' => 'BusinessApplication',
            'operatingSystem' => 'Web',
            'description' => 'Sagansa POS & Attendance adalah aplikasi kasir & absensi karyawan terintegrasi untuk UMKM. Aplikasi mobile kasir & absensi gratis selamanya, serta berlangganan terjangkau khusus untuk mengaktifkan akses bagian Panel Web Admin.',
            'url' => 'https://sagansa.id/',
            'offers' => [
                '@type' => 'Offer',
                'price' => '0',
                'priceCurrency' => 'IDR',
                'description' => 'Aplikasi mobile POS & Absensi gratis selamanya. Berlangganan ' . $appPromoPriceFormatted . '/bulan khusus untuk membuka Panel Web Admin.',
            ],
            'provider' => [
                '@type' => 'Organization',
                'name' => 'PT Sagansa Engineering Indonesia',
                'url' => 'https://sagansa.id/',
                'contactPoint' => [
                    '@type' => 'ContactPoint',
                    'telephone' => '+62-811-1923-572',
                    'contactType' => 'sales',
                    'availableLanguage' => 'Indonesian',
                ],
            ],
            'featureList' => [
                'QRIS dengan Nominal Otomatis',
                'Variant & Modification',
                'Fitur Paket & Bahan Baku',
                'Manajemen Shift',
                'Tax & Biaya Layanan',
                'Refund via Approval',
                'Jumlah User Tidak Terbatas',
                'Support Foodcourt',
                'Pemisahan Channel Online (GoFood, ShopeeFood, GrabFood)',
                'Terintegrasi Attendance',
            ],
        ];

        $organizationSchema = [
            '@context' => 'https://schema.org',
            '@type' => 'Organization',
            'name' => 'PT Sagansa Engineering Indonesia',
            'alternateName' => 'Sagansa',
            'url' => 'https://sagansa.id/',
            'logo' => 'https://sagansa.id/logo.png',
            'description' => 'Perusahaan teknologi Indonesia yang mengembangkan Sagansa POS — aplikasi kasir dan point of sale terintegrasi dengan sistem absensi karyawan untuk UMKM, restoran, cafe, dan foodcourt.',
            'foundingDate' => '2024',
            'contactPoint' => [
                '@type' => 'ContactPoint',
                'telephone' => '+62-811-1923-572',
                'contactType' => 'sales',
                'availableLanguage' => 'Indonesian',
            ],
            'sameAs' => [
                'https://instagram.com/sagansa.id',
                'https://www.linkedin.com/company/sagansa',
                'https://www.youtube.com/@sagansa',
            ],
        ];

        $websiteSchema = [
            '@context' => 'https://schema.org',
            '@type' => 'WebSite',
            'name' => 'Sagansa POS',
            'url' => 'https://sagansa.id/',
            'potentialAction' => [
                '@type' => 'SearchAction',
                'target' => 'https://sagansa.id/search?q={search_term_string}',
                'query-input' => 'required name=search_term_string',
            ],
            'publisher' => [
                '@id' => 'https://sagansa.id/#organization',
            ],
        ];
    @endphp

    <!-- JSON-LD: SoftwareApplication -->
    <script type="application/ld+json">
    {!! json_encode($softwareAppSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
    </script>

    <!-- JSON-LD: Organization -->
    <script type="application/ld+json">
    {!! json_encode($organizationSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
    </script>

    <!-- JSON-LD: WebSite + SearchAction -->
    <script type="application/ld+json">
    {!! json_encode($websiteSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
    </script>

    @yield('jsonld')

    @yield('head')
</head>
<body>

<div class="site-header">
    @if(request()->is('/'))
        @include('welcome.partials._beta-banner')
    @endif
    @include('welcome.partials._navbar')
</div>

@yield('content')

@include('welcome.partials._footer')

@include('welcome.partials._cookie-banner')

@include('welcome.partials._wa-float')

    @vite(['resources/js/welcome.js'])

@yield('scripts')

</body>
</html>