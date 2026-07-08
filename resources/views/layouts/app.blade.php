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

    <!-- Favicon SVG -->
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 40 40'%3E%3Crect width='40' height='40' rx='10' fill='url(%23g)'/%3E%3Cdefs%3E%3ClinearGradient id='g' x1='0' y1='0' x2='40' y2='40'%3E%3Cstop offset='0%25' stop-color='%232563eb'/%3E%3Cstop offset='100%25' stop-color='%238b5cf6'/%3E%3C/defs%3E%3Ctext x='50%25' y='54%25' dominant-baseline='central' text-anchor='middle' font-family='Arial,sans-serif' font-weight='900' font-size='22' fill='white'%3ES%3C/text%3E%3C/svg%3E">
    <link rel="icon" type="image/x-icon" href="/favicon.ico">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    @vite(['resources/css/welcome.css'])

    <!-- JSON-LD: SoftwareApplication -->
    @verbatim
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "SoftwareApplication",
        "name": "Sagansa POS",
        "applicationCategory": "BusinessApplication",
        "operatingSystem": "Web",
        "description": "Sagansa POS adalah aplikasi kasir modern yang terintegrasi dengan sistem absensi karyawan. Pakai dulu, bayar kemudian — tagihan berdasarkan persentase omzet, maksimal Rp59.000 per store (promo dari Rp99.000).",
        "url": "https://sagansa.id/",
        "offers": {
            "@type": "Offer",
            "price": "0",
            "priceCurrency": "IDR",
            "description": "Gratis tanpa biaya awal. Tagihan berdasarkan persentase omzet, maksimal Rp59.000 per store per bulan (promo dari harga normal Rp99.000)."
        },
        "provider": {
            "@type": "Organization",
            "name": "PT Sagansa Engineering Indonesia",
            "url": "https://sagansa.id/",
            "contactPoint": {
                "@type": "ContactPoint",
                "telephone": "+62-811-1923-572",
                "contactType": "sales",
                "availableLanguage": "Indonesian"
            }
        },
        "featureList": [
            "QRIS dengan Nominal Otomatis",
            "Variant & Modification",
            "Fitur Paket & Bahan Baku",
            "Manajemen Shift",
            "Tax & Biaya Layanan",
            "Refund via Approval",
            "Jumlah User Tidak Terbatas",
            "Support Foodcourt",
            "Pemisahan Channel Online (GoFood, ShopeeFood, GrabFood)",
            "Terintegrasi Attendance"
        ]
    }
    </script>
    @endverbatim

    <!-- JSON-LD: Organization (GEO/AEO — Entity Building) -->
    @verbatim
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Organization",
        "name": "PT Sagansa Engineering Indonesia",
        "alternateName": "Sagansa",
        "url": "https://sagansa.id/",
        "logo": "https://sagansa.id/logo.png",
        "description": "Perusahaan teknologi Indonesia yang mengembangkan Sagansa POS — aplikasi kasir dan point of sale terintegrasi dengan sistem absensi karyawan untuk UMKM, restoran, cafe, dan foodcourt.",
        "foundingDate": "2024",
        "contactPoint": {
            "@type": "ContactPoint",
            "telephone": "+62-811-1923-572",
            "contactType": "sales",
            "availableLanguage": "Indonesian"
        },
        "sameAs": [
            "https://instagram.com/sagansa.id",
            "https://www.linkedin.com/company/sagansa",
            "https://www.youtube.com/@sagansa"
        ]
    }
    </script>
    @endverbatim

    <!-- JSON-LD: WebSite + SearchAction (GEO/AEO — Knowledge Graph) -->
    @verbatim
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "WebSite",
        "name": "Sagansa POS",
        "url": "https://sagansa.id/",
        "potentialAction": {
            "@type": "SearchAction",
            "target": "https://sagansa.id/search?q={search_term_string}",
            "query-input": "required name=search_term_string"
        },
        "publisher": {
            "@id": "https://sagansa.id/#organization"
        }
    }
    </script>
    @endverbatim

    @yield('jsonld')

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