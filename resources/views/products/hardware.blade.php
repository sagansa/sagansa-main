@extends('layouts.app')

@section('title', 'Sagansa Hardware — Perangkat Kasir yang Terjangkau')
@section('description', 'Perangkat keras kasir yang kompatibel dengan Sagansa POS — printer thermal, scanner, dan perangkat pendukung lainnya dengan harga terjangkau.')
@section('keywords', 'hardware kasir, printer thermal, scanner barcode, perangkat POS, Sagansa')
@section('canonical', '<link rel="canonical" href="https://sagansa.id/produk/hardware">')

@section('content')
{{-- HERO --}}
<div class="product-hero">
    <div class="product-hero-inner">
        <div class="product-hero-icon">🖨️</div>
        <div class="product-hero-badge" style="background: rgba(245,158,11,0.1); color: var(--warning);">Hardware</div>
        <h1>Perangkat Kasir<br>yang Terjangkau</h1>
        <p>Tidak perlu investasi mahal untuk perangkat kasir. Sagansa menyediakan hardware yang kompatibel dan terjangkau — atau gunakan perangkat Anda sendiri.</p>
        <div class="product-hero-buttons">
            <a href="https://wa.me/628111923572?text=Halo%20Sagansa%2C%20saya%20tertarik%20dengan%20hardware%20kasir" target="_blank" class="btn btn-primary">
                💬 Tanya via WhatsApp
            </a>
        </div>
    </div>
</div>

{{-- KENAPA TIDAK PERLU MAHAL --}}
<div class="product-section">
    <div class="product-section-inner">
        <div class="product-section-header">
            <div class="section-label green">💡 Filosofi Kami</div>
            <h2>Perangkat Kasir Tidak Harus Mahal</h2>
            <p>Kami percaya UMKM tidak perlu mengeluarkan biaya besar untuk perangkat kasir. Sagansa POS bisa berjalan di perangkat yang sudah Anda miliki.</p>
        </div>
        <div class="product-features-grid">
            <div class="product-feature-card">
                <div class="feature-icon green">📱</div>
                <h3>Gunakan Smartphone Anda</h3>
                <p>Sagansa POS bisa dioperasikan dari smartphone Android atau iOS yang sudah Anda miliki. Tidak wajib beli perangkat baru.</p>
            </div>
            <div class="product-feature-card">
                <div class="feature-icon blue">💻</div>
                <h3>Jalankan di Tablet/Laptop</h3>
                <p>Akses dashboard POS dari browser tablet atau laptop mana saja. Tidak perlu spesifikasi tinggi — cukup koneksi internet.</p>
            </div>
            <div class="product-feature-card">
                <div class="feature-icon orange">🔌</div>
                <h3>Hardware Opsional</h3>
                <p>Butuh printer struk atau scanner? Kami sediakan opsi hardware yang terjangkau dan sudah teruji kompatibel dengan Sagansa POS.</p>
            </div>
        </div>
    </div>
</div>

{{-- PERANGKAT YANG TERSEDIA --}}
<div class="product-section" style="background: var(--gray-50);">
    <div class="product-section-inner">
        <div class="product-section-header">
            <div class="section-label blue">🔌 Perangkat</div>
            <h2>Hardware yang Akan Tersedia</h2>
            <p>Perangkat pendukung yang kompatibel dan terjangkau untuk meningkatkan efisiensi operasional Anda.</p>
        </div>
        <div class="product-list-inner" style="max-width: 800px; margin: 0 auto;">
            <div class="product-list-item">
                <div class="product-list-icon">🧾</div>
                <div class="product-list-text">
                    <h3>Printer Thermal 58mm <span class="product-tag soon">Coming Soon</span></h3>
                    <p>Printer struk kasir yang ringkas dan cepat. Bluetooth dan USB — langsung terhubung ke aplikasi Sagansa POS tanpa konfigurasi rumit.</p>
                </div>
            </div>
            <div class="product-list-item">
                <div class="product-list-icon">📠</div>
                <div class="product-list-text">
                    <h3>Printer Thermal 80mm <span class="product-tag soon">Coming Soon</span></h3>
                    <p>Printer struk berukuran lebar untuk restoran dan cafe yang membutuhkan struk lebih besar. Mendukung cetak logo dan pesan kustom.</p>
                </div>
            </div>
            <div class="product-list-item">
                <div class="product-list-icon">📱</div>
                <div class="product-list-text">
                    <h3>Scanner Barcode <span class="product-tag soon">Coming Soon</span></h3>
                    <p>Scanner barcode handheld yang ringan dan akurat. Mempercepat proses input produk di kasir — cukup scan dan produk langsung muncul.</p>
                </div>
            </div>
            <div class="product-list-item">
                <div class="product-list-icon">💵</div>
                <div class="product-list-text">
                    <h3>QRIS Stand <span class="product-tag soon">Coming Soon</span></h3>
                    <p>Stand QRIS yang rapi dan profesional untuk meja kasir. Pelanggan bisa scan dan bayar dengan mudah — nominal otomatis dari Sagansa POS.</p>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- BISA PAKAI SENDIRI --}}
<div class="product-section">
    <div class="product-section-inner" style="text-align: center; max-width: 700px; margin: 0 auto;">
        <div class="product-section-header">
            <div class="section-label purple">🎯 Fleksibel</div>
            <h2>Sudah Punya Perangkat Sendiri?</h2>
            <p>Tidak masalah! Sagansa POS kompatibel dengan banyak printer thermal dan scanner barcode di pasaran. Hubungi kami untuk mengecek kompatibilitas perangkat Anda.</p>
        </div>
        <a href="https://wa.me/628111923572?text=Halo%20Sagansa%2C%20saya%20mau%20tanya%20kompatibilitas%20perangkat" target="_blank" class="btn btn-primary">
            💬 Tanya Kompatibilitas via WhatsApp
        </a>
    </div>
</div>

{{-- CTA --}}
<div class="product-cta-section">
    <div class="product-cta-inner">
        <h2>Mulai Dulu, Hardware Belakangan</h2>
        <p>Anda bisa langsung menggunakan Sagansa POS dari smartphone. Hardware bisa menyusul kapan saja Anda butuh.</p>
        <div class="product-cta-buttons">
            <a href="https://ops.sagansa.id/auth/register" target="_blank" class="btn btn-primary">
                Mulai Gratis Sekarang
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>
            <a href="/produk/point-of-sale" class="btn btn-white">
                Pelajari POS
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>
        </div>
    </div>
</div>
@endsection