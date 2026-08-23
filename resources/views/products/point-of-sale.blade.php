@extends('layouts.app')

@section('title', 'Sagansa POS — Aplikasi Kasir & Point of Sale Modern')
@section('description', 'Sagansa POS adalah aplikasi kasir modern untuk restoran, cafe, foodcourt, dan UMKM F&B Indonesia. Mendukung QRIS, multi-channel online order, manajemen shift, dan terintegrasi attendance.')
@section('keywords', 'POS, point of sale, aplikasi kasir, QRIS, restoran, cafe, foodcourt, UMKM, Sagansa')
@section('canonical', 'https://sagansa.id/produk/point-of-sale')

@section('content')
{{-- HERO --}}
<div class="product-hero">
    <div class="product-hero-inner">
        <div class="product-hero-badge">Point of Sale</div>
        <h1>Aplikasi Kasir Modern<br>untuk Bisnis Indonesia</h1>
        <p>Sagansa POS dirancang khusus untuk restoran, cafe, foodcourt, dan UMKM F&B. Kelola transaksi, menu, shift, dan order online — semua dalam satu platform yang mudah digunakan.</p>
        
        @php
            $playStorePos = \App\Models\Setting::get('google_play_pos_link');
            $appStorePos = \App\Models\Setting::get('app_store_pos_link');
        @endphp
        <div style="display: flex; flex-direction: column; gap: 16px; align-items: center; justify-content: center;">
            <div class="app-buttons" style="display: flex; gap: 12px; justify-content: center; flex-wrap: wrap;">
                @include('welcome.partials._store-badge', ['type' => 'appstore', 'link' => $appStorePos, 'alert' => 'Sagansa POS untuk iOS segera hadir di App Store!'])
                @include('welcome.partials._store-badge', ['type' => 'googleplay', 'link' => $playStorePos, 'alert' => 'Sagansa POS untuk Android segera hadir di Google Play!'])
            </div>
            <div class="product-hero-buttons" style="margin-top: 0;">
                <a href="https://ops.sagansa.id/id/auth/register" target="_blank" class="btn btn-primary" style="padding: 10px 24px; font-size: 0.9rem;">
                    Daftar Web Ops Admin
                </a>
                <a href="https://wa.me/628111923572?text=Halo%20Sagansa%2C%20saya%20tertarik%20dengan%20Sagansa%20POS" target="_blank" class="btn btn-secondary" style="padding: 10px 24px; font-size: 0.9rem;">
                    💬 Hubungi Kami
                </a>
            </div>
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
            <div class="section-label green">💰 Model Berlangganan</div>
            <h2>Aplikasi POS Mobile Gratis Selamanya</h2>
            <p>Aplikasi kasir POS di toko dan absensi karyawan di handphone dapat digunakan <strong>gratis selamanya</strong> tanpa potongan omzet. Berlangganan hanya diperlukan jika Anda ingin membuka akses ke <strong>Panel Web Admin</strong>.</p>
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
            @include('welcome.partials._store-badge', ['type' => 'appstore', 'link' => $appStorePos, 'alert' => 'Sagansa POS untuk iOS segera hadir di App Store!'])
            @include('welcome.partials._store-badge', ['type' => 'googleplay', 'link' => $playStorePos, 'alert' => 'Sagansa POS untuk Android segera hadir di Google Play!'])
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