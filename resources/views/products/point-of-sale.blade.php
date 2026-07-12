@extends('layouts.app')

@section('title', 'Sagansa POS — Aplikasi Kasir & Point of Sale Modern')
@section('description', 'Sagansa POS adalah aplikasi kasir modern untuk restoran, cafe, foodcourt, dan UMKM F&B Indonesia. Mendukung QRIS, multi-channel online order, manajemen shift, dan terintegrasi attendance.')
@section('keywords', 'POS, point of sale, aplikasi kasir, QRIS, restoran, cafe, foodcourt, UMKM, Sagansa')
@section('canonical', 'https://sagansa.id/produk/point-of-sale')

@section('content')
{{-- HERO --}}
<div class="product-hero">
    <div class="product-hero-inner">
        <div class="product-hero-icon">💳</div>
        <div class="product-hero-badge">Point of Sale</div>
        <h1>Aplikasi Kasir Modern<br>untuk Bisnis Indonesia</h1>
        <p>Sagansa POS dirancang khusus untuk restoran, cafe, foodcourt, dan UMKM F&B. Kelola transaksi, menu, shift, dan order online — semua dalam satu platform yang mudah digunakan.</p>
        <div class="product-hero-buttons">
            <a href="https://ops.sagansa.id/id/auth/register" target="_blank" class="btn btn-primary">
                Mulai Gratis
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>
            <a href="https://wa.me/628111923572?text=Halo%20Sagansa%2C%20saya%20tertarik%20dengan%20Sagansa%20POS" target="_blank" class="btn btn-secondary">
                💬 Hubungi Kami
            </a>
        </div>
    </div>
</div>

{{-- FITUR UTAMA --}}
<div class="product-section">
    <div class="product-section-inner">
        <div class="product-section-header">
            <div class="section-label blue">✨ Fitur Utama</div>
            <h2>Semua yang Bisnis Anda Butuhkan</h2>
            <p>Dari transaksi cepat hingga laporan lengkap, Sagansa POS punya solusi untuk setiap kebutuhan operasional bisnis Anda.</p>
        </div>
        <div class="product-features-grid">
            <div class="product-feature-card">
                <div class="feature-icon green">💳</div>
                <h3>QRIS dengan Nominal Otomatis</h3>
                <p>QRIS tampil langsung dengan nominal sesuai nilai pembayaran. Pelanggan cukup scan dan bayar — tanpa perlu input manual.</p>
            </div>
            <div class="product-feature-card">
                <div class="feature-icon purple">🎯</div>
                <h3>Variant & Modification</h3>
                <p>Kelola produk dengan berbagai varian rasa, ukuran, topping, dan modifikasi lainnya. Cocok untuk F&B dengan menu yang fleksibel.</p>
            </div>
            <div class="product-feature-card">
                <div class="feature-icon orange">📦</div>
                <h3>Fitur Paket & Bahan Baku</h3>
                <p>Buat paket menu yang terintegrasi dengan setiap bahan baku. Lacak penggunaan bahan secara otomatis dan dapatkan notifikasi stok menipis.</p>
            </div>
            <div class="product-feature-card">
                <div class="feature-icon blue">⏰</div>
                <h3>Manajemen Shift</h3>
                <p>Atur shift karyawan dan pantau ketepatan waktu. Terintegrasi langsung dengan fitur absensi untuk kontrol SDM yang lebih baik.</p>
            </div>
            <div class="product-feature-card">
                <div class="feature-icon cyan">🧾</div>
                <h3>Tax & Biaya Layanan</h3>
                <p>Hitung pajak (PB1) dan biaya layanan secara otomatis. Dukungan multi-rate dan konfigurasi fleksibel sesuai regulasi Indonesia.</p>
            </div>
            <div class="product-feature-card">
                <div class="feature-icon red">🔄</div>
                <h3>Refund via Approval</h3>
                <p>Proses refund dengan sistem persetujuan berlapis. Setiap request refund harus di-approve oleh supervisor untuk keamanan keuangan.</p>
            </div>
        </div>
    </div>
</div>

{{-- ONLINE ORDER --}}
<div class="product-section" style="background: var(--gray-50);">
    <div class="product-section-inner">
        <div class="product-section-header">
            <div class="section-label orange">📱 Online Order</div>
            <h2>Pemisahan Channel Online</h2>
            <p>Pisahkan order dari GoFood, ShopeeFood, dan GrabFood secara otomatis. Laporan per channel memudahkan analisis performa dan rekonsiliasi pembayaran.</p>
        </div>
        <div class="product-features-grid" style="grid-template-columns: repeat(3, 1fr);">
            <div class="product-feature-card" style="text-align: center;">
                <div style="font-size: 2.5rem; margin-bottom: 12px;">🛵</div>
                <h3>GoFood</h3>
                <p>Order GoFood otomatis tercatat dan dipisahkan dari transaksi offline. Laporan langsung tersedia per channel.</p>
            </div>
            <div class="product-feature-card" style="text-align: center;">
                <div style="font-size: 2.5rem; margin-bottom: 12px;">🛒</div>
                <h3>ShopeeFood</h3>
                <p>Integrasikan ShopeeFood dan lacak semua order dalam satu dashboard yang sama dengan POS Anda.</p>
            </div>
            <div class="product-feature-card" style="text-align: center;">
                <div style="font-size: 2.5rem; margin-bottom: 12px;">🟢</div>
                <h3>GrabFood</h3>
                <p>Semua order GrabFood tercatat rapi dan terpisah. Mudah di-rekonsiliasi di akhir bulan.</p>
            </div>
        </div>
    </div>
</div>

{{-- ROADMAP / PENGEMBANGAN KE DEPAN --}}
<div class="product-section">
    <div class="product-section-inner">
        <div class="product-section-header">
            <div class="section-label purple">🚀 Pengembangan ke Depan</div>
            <h2>Selalu Berkembang untuk Bisnis Anda</h2>
            <p>Kami terus mengembangkan fitur baru untuk meningkatkan efisiensi operasional bisnis Anda.</p>
        </div>
        <div class="product-list-inner" style="max-width: 800px; margin: 0 auto;">
            <div class="product-list-item">
                <div class="product-list-icon">🖥️</div>
                <div class="product-list-text">
                    <h3>Layar Dapur (Kitchen Display) <span class="product-tag soon">Coming Soon</span></h3>
                    <p>Tampilkan pesanan langsung di layar dapur secara real-time. Tim dapur bisa langsung melihat order masuk tanpa perlu struk kertas — lebih cepat, lebih akurat, dan minim kesalahan.</p>
                </div>
            </div>
            <div class="product-list-item">
                <div class="product-list-icon">📊</div>
                <div class="product-list-text">
                    <h3>Dashboard Analitik Lanjutan</h3>
                    <p>Laporan penjualan yang lebih detail dengan visualisasi grafik, tren penjualan per produk, per jam, dan per channel. Keputusan bisnis yang lebih tepat dengan data yang akurat.</p>
                </div>
            </div>
            <div class="product-list-item">
                <div class="product-list-icon">🔔</div>
                <div class="product-list-text">
                    <h3>Notifikasi Stok Real-time</h3>
                    <p>Peringatan otomatis saat bahan baku hampir habis. Integrasikan dengan supplier untuk pemesanan ulang yang lebih cepat dan efisien.</p>
                </div>
            </div>
            <div class="product-list-item">
                <div class="product-list-icon">🏪</div>
                <div class="product-list-text">
                    <h3>Support Foodcourt</h3>
                    <p>Kelola banyak tenant dalam satu platform foodcourt. Setiap tenant memiliki laporan terpisah, namun manajemen pusat tetap terkontrol dalam satu dashboard.</p>
                </div>
            </div>
            <div class="product-list-item">
                <div class="product-list-icon">🔌</div>
                <div class="product-list-text">
                    <h3>Integrasi API & SaaS Custom</h3>
                    <p>Menyediakan akses API untuk dihubungkan langsung dengan platform SaaS internal Anda. Butuh aplikasi kustom/SaaS khusus skala perusahaan? Hubungi kami untuk mendesain dan membangun aplikasi kustom yang sesuai dengan kebutuhan unik bisnis Anda.</p>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- INTEGRASI --}}
<div class="product-section" style="background: var(--gray-50);">
    <div class="product-section-inner">
        <div class="product-highlight-card">
            <div class="highlight-text">
                <h2>Terintegrasi dengan Attendance</h2>
                <p>POS dan absensi karyawan dalam satu platform. Data kehadiran, terlambat, dan lembur otomatis terekam — tidak perlu aplikasi terpisah untuk mengelola SDM Anda.</p>
                <a href="/produk/attendance" class="btn btn-white" style="display: inline-flex;">
                    Pelajari Attendance
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
            </div>
            <div class="highlight-visual">📋</div>
        </div>
    </div>
</div>

{{-- HARGA --}}
<div class="product-section">
    <div class="product-section-inner" style="text-align: center;">
        <div class="product-section-header">
            <div class="section-label green">💰 Harga</div>
            <h2>Pakai Dulu, Bayar Kemudian</h2>
            <p>Tidak ada biaya awal, tidak ada biaya langganan tetap. Tagihan hanya berdasarkan 1% omzet (maksimal Rp59.000 per store/bulan). Dengan menggunakan POS, fitur absensi karyawan (Attendance) otomatis <strong>gratis sepuasnya</strong> tanpa biaya tambahan.</p>
        </div>
        <a href="/cara-perhitungan" class="btn btn-secondary">
            Lihat Cara Perhitungan
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
        </a>
    </div>
</div>

{{-- DOWNLOAD APLIKASI --}}
@php
    $playStorePos = \App\Models\Setting::get('google_play_pos_link');
    $appStorePos = \App\Models\Setting::get('app_store_pos_link');
    $isPosReleased = !empty($playStorePos) || !empty($appStorePos);
@endphp
<div class="product-section" style="background: var(--gray-50); border-top: 1px solid var(--gray-200); border-bottom: 1px solid var(--gray-200);">
    <div class="product-section-inner" style="text-align: center; max-width: 600px; margin: 0 auto; padding: 48px 24px;">
        <div class="product-section-header" style="margin-bottom: 24px;">
            <div class="section-label blue" style="display: inline-block; margin-bottom: 8px;">📱 Download Aplikasi</div>
            <h2 style="font-size: 1.8rem; font-weight: 800; color: var(--gray-900); margin-bottom: 12px;">Unduh Sagansa POS</h2>
            <p style="font-size: 1rem; color: var(--gray-600); line-height: 1.6;">Gunakan Sagansa POS langsung di tablet atau smartphone Android dan iOS Anda untuk mengelola kasir dengan mudah.</p>
        </div>
        <div class="app-buttons" style="display: flex; gap: 12px; justify-content: center; flex-wrap: wrap;">
            <a href="{{ $appStorePos ?: '#' }}" @if($appStorePos) target="_blank" @else onclick="alert('Sagansa POS untuk iOS segera hadir di App Store!'); return false;" @endif class="app-store-btn {{ !$appStorePos ? 'coming-soon' : '' }}">
                <svg viewBox="0 0 24 24" fill="currentColor" style="width: 24px; height: 24px; flex-shrink: 0;"><path d="M17.05 20.28c-.98.95-2.05.8-3.08.35-1.09-.46-2.09-.48-3.24 0-1.44.62-2.2.44-3.06-.35C2.79 15.25 3.51 7.59 9.05 7.31c1.35.07 2.29.74 3.08.8 1.18-.24 2.31-.93 3.57-.84 1.51.12 2.65.72 3.4 1.8-3.12 1.87-2.38 5.98.48 7.13-.57 1.5-1.31 2.99-2.54 4.09zM12.03 7.25c-.15-2.23 1.66-4.07 3.74-4.25.29 2.58-2.34 4.5-3.74 4.25z"/></svg>
                <span class="btn-text">
                    <span class="small">Download on the</span>
                    <span class="big">App Store</span>
                </span>
            </a>
            <a href="{{ $playStorePos ?: '#' }}" @if($playStorePos) target="_blank" @else onclick="alert('Sagansa POS untuk Android segera hadir di Google Play!'); return false;" @endif class="app-store-btn {{ !$playStorePos ? 'coming-soon' : '' }}">
                <svg viewBox="0 0 24 24" fill="currentColor" style="width: 24px; height: 24px; flex-shrink: 0;"><path d="M3.609 1.814L13.792 12 3.61 22.186a.996.996 0 0 1-.61-.92V2.734a1 1 0 0 1 .609-.92zm10.89 10.893l2.302 2.302-10.937 6.333 8.635-8.635zm3.199-3.199l2.302 2.302a1 1 0 0 1 0 1.38l-2.302 2.302L15.396 12l2.302-3.492zM5.864 2.658L16.8 9.49l-2.302 2.302-8.635-9.134z"/></svg>
                <span class="btn-text">
                    <span class="small">GET IT ON</span>
                    <span class="big">Google Play</span>
                </span>
            </a>
        </div>
    </div>
</div>

{{-- CTA --}}
<div class="product-cta-section">
    <div class="product-cta-inner">
        <h2>Siap Memulai dengan Sagansa POS?</h2>
        <p>Gratis tanpa biaya awal. Daftar sekarang dan kelola bisnis Anda lebih efisien.</p>
        <div class="product-cta-buttons">
            <a href="https://ops.sagansa.id/id/auth/register" target="_blank" class="btn btn-primary">
                Mulai Gratis Sekarang
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>
            <a href="https://wa.me/628111923572?text=Halo%20Sagansa%2C%20saya%20tertarik%20dengan%20Sagansa%20POS" target="_blank" class="btn btn-white">
                💬 Chat WhatsApp
            </a>
        </div>
    </div>
</div>
@endsection