@extends('layouts.app')

@section('title', 'Sagansa POS — Aplikasi Kasir & Point of Sale Terintegrasi Attendance')
@section('description', 'Sagansa POS adalah aplikasi kasir modern yang terintegrasi dengan sistem absensi karyawan. Pakai dulu, bayar kemudian — tagihan berdasarkan persentase omzet, maksimal Rp59.000 per store (promo dari Rp99.000). Mendukung QRIS, GoFood, ShopeeFood, GrabFood.')
@section('keywords', 'POS, point of sale, aplikasi kasir, kasir online, QRIS, absensi karyawan, attendance, GoFood, ShopeeFood, GrabFood, restoran, cafe, UMKM, Indonesia, Sagansa, sagansa pos, software kasir, sistem kasir, aplikasi restoran, foodcourt, manajemen shift')
@section('canonical', 'https://sagansa.id/')
@section('og_title', 'Sagansa POS — Aplikasi Kasir & Point of Sale Terintegrasi Attendance')
@section('og_description', 'Aplikasi kasir modern terintegrasi absensi karyawan. Pakai dulu, bayar kemudian — maksimal Rp59.000 per store (promo dari Rp99.000). Mendukung QRIS, GoFood, ShopeeFood, GrabFood.')

@section('jsonld')
    <!-- JSON-LD: FAQPage (GEO/AEO — Answer Engine Optimization) -->
    @verbatim
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "FAQPage",
        "mainEntity": [
            {
                "@type": "Question",
                "name": "Apa itu Sagansa POS dan untuk siapa?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Sagansa POS adalah aplikasi kasir (Point of Sale) modern yang dirancang untuk UMKM, restoran, cafe, foodcourt, dan bisnis F&B lainnya di Indonesia. Sagansa juga terintegrasi dengan sistem absensi karyawan (Attendance), sehingga Anda bisa mengelola transaksi dan SDM dalam satu platform."
                }
            },
            {
                "@type": "Question",
                "name": "Bagaimana sistem billing Sagansa POS bekerja?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Sagansa menggunakan sistem 'Pakai dulu, bayar kemudian' — tanpa biaya awal (setup fee). Tagihan dihitung berdasarkan persentase omzet toko Anda, dengan batas maksimal Rp59.000 per store per bulan (promo dari Rp99.000). Jadi semakin kecil omzet Anda, semakin kecil tagihannya."
                }
            },
            {
                "@type": "Question",
                "name": "Apakah ada biaya awal atau biaya langganan tetap?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Tidak ada. Sagansa sepenuhnya gratis untuk dimulai — tanpa biaya setup, tanpa biaya langganan tetap, dan tanpa kontrak. Anda hanya dikenakan tagihan berdasarkan persentase omzet, maksimal Rp59.000 per store per bulan (promo dari Rp99.000)."
                }
            },
            {
                "@type": "Question",
                "name": "Channel online apa saja yang didukung?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Sagansa mendukung pemisahan channel online termasuk GoFood, ShopeeFood, dan GrabFood. Setiap order dari channel online akan tercatat secara terpisah, sehingga laporan keuangan Anda lebih akurat dan mudah di-rekonciliasi."
                }
            },
            {
                "@type": "Question",
                "name": "Apakah Sagansa mendukung pembayaran QRIS?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Ya! Sagansa mendukung QRIS dengan nominal otomatis. Pelanggan cukup scan QR code dan nominal pembayaran akan sesuai dengan total tagihan — praktis, cepat, dan tanpa risiko kesalahan input."
                }
            },
            {
                "@type": "Question",
                "name": "Bagaimana cara mulai menggunakan Sagansa POS?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Cukup klik tombol 'Mulai Gratis' atau daftar langsung di ops.sagansa.id. Setelah membuat akun, Anda bisa langsung mengatur store, menambahkan menu produk, dan mulai bertransaksi. Jika butuh bantuan, tim kami siap membantu via WhatsApp."
                }
            },
            {
                "@type": "Question",
                "name": "Apakah jumlah user dibatasi?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Tidak. Sagansa tidak membatasi jumlah user per store. Anda bisa menambahkan kasir, manajer, dan staf lainnya tanpa biaya tambahan. Setiap user dapat diatur hak aksesnya sesuai peran masing-masing."
                }
            },
            {
                "@type": "Question",
                "name": "Apakah Sagansa cocok untuk foodcourt?",
                "acceptedAnswer": {
                    "@type": "Answer",
                    "text": "Ya! Sagansa dirancang untuk mendukung operasional foodcourt. Anda bisa mengelola multiple tenant dalam satu platform, dengan laporan terpisah per tenant dan konsolidasi untuk pengelola foodcourt."
                }
            }
        ]
    }
    </script>
    @endverbatim

    <!-- JSON-LD: HowTo (GEO/AEO — Step-by-Step Guide) -->
    @verbatim
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "HowTo",
        "name": "Cara Mulai Menggunakan Sagansa POS",
        "description": "Panduan langkah demi langkah untuk mulai menggunakan aplikasi kasir Sagansa POS secara gratis.",
        "totalTime": "PT10M",
        "step": [
            {
                "@type": "HowToStep",
                "position": 1,
                "name": "Daftar Akun",
                "text": "Klik tombol 'Mulai Gratis' atau daftar langsung di ops.sagansa.id untuk membuat akun Sagansa POS Anda.",
                "url": "https://ops.sagansa.id/auth/register"
            },
            {
                "@type": "HowToStep",
                "position": 2,
                "name": "Buat Store",
                "text": "Setelah login, buat store baru dan atur profil toko Anda termasuk nama, alamat, dan pengaturan pajak."
            },
            {
                "@type": "HowToStep",
                "position": 3,
                "name": "Tambahkan Menu Produk",
                "text": "Masukkan daftar menu produk beserta varian, modifikasi, dan harga jual. Anda juga bisa mengatur bahan baku untuk tracking stok otomatis."
            },
            {
                "@type": "HowToStep",
                "position": 4,
                "name": "Mulai Bertransaksi",
                "text": "Kasir siap digunakan! Proses transaksi dengan cepat, terima pembayaran via QRIS, dan kelola order dari channel online — semua dalam satu dashboard."
            }
        ]
    }
    </script>
    @endverbatim
@endsection

@section('content')
    @include('welcome.partials._beta-banner')

    @include('welcome.partials._hero')

    @include('welcome.partials._pricing')

    @include('welcome.partials._features')

    @include('welcome.partials._integration')

    @include('welcome.partials._online-orders')

    @include('welcome.partials._cta')

    @include('welcome.partials._qa')
@endsection