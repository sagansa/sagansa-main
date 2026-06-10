@extends('layouts.app')

@section('title', 'Download Aplikasi — Sagansa POS & Attendance')
@section('description', 'Download aplikasi Sagansa POS dan Sagansa Attendance untuk Android dan iOS. Kelola transaksi dan absensi langsung dari perangkat mobile Anda.')
@section('keywords', 'download, aplikasi, Sagansa POS, Sagansa Attendance, Google Play, App Store, Android, iOS')
@section('canonical', '<link rel="canonical" href="https://sagansa.id/download">')

@section('content')
<div class="product-hero">
    <div class="product-hero-inner">
        <div class="product-hero-icon">📱</div>
        <div class="product-hero-badge" style="background: rgba(16,185,129,0.1); color: var(--success);">Download</div>
        <h1>Sagansa di Genggaman<br>Anda</h1>
        <p>Download aplikasi Sagansa POS dan Attendance untuk pengelolaan bisnis yang lebih praktis langsung dari perangkat mobile Anda.</p>
    </div>
</div>

<div class="product-section" style="background: var(--gray-50);">
    <div class="product-section-inner" style="max-width: 900px;">
        <div class="app-cards">
            {{-- POS App --}}
            <div class="app-card">
                <span class="coming-soon-badge">Coming Soon</span>
                <div class="app-card-icon pos-icon">🛒</div>
                <h3>Sagansa POS</h3>
                <p class="app-desc">Aplikasi kasir modern untuk mengelola transaksi, stok, dan laporan bisnis Anda langsung dari tablet atau smartphone.</p>
                <div class="app-buttons">
                    <a href="#" class="app-store-btn" onclick="return false;">
                        <svg viewBox="0 0 24 24" fill="currentColor"><path d="M17.05 20.28c-.98.95-2.05.8-3.08.35-1.09-.46-2.09-.48-3.24 0-1.44.62-2.2.44-3.06-.35C2.79 15.25 3.51 7.59 9.05 7.31c1.35.07 2.29.74 3.08.8 1.18-.24 2.31-.93 3.57-.84 1.51.12 2.65.72 3.4 1.8-3.12 1.87-2.38 5.98.48 7.13-.57 1.5-1.31 2.99-2.54 4.09zM12.03 7.25c-.15-2.23 1.66-4.07 3.74-4.25.29 2.58-2.34 4.5-3.74 4.25z"/></svg>
                        <span class="btn-text">
                            <span class="small">Download on the</span>
                            <span class="big">App Store</span>
                        </span>
                    </a>
                    <a href="#" class="app-store-btn" onclick="return false;">
                        <svg viewBox="0 0 24 24" fill="currentColor"><path d="M3.609 1.814L13.792 12 3.61 22.186a.996.996 0 0 1-.61-.92V2.734a1 1 0 0 1 .609-.92zm10.89 10.893l2.302 2.302-10.937 6.333 8.635-8.635zm3.199-3.199l2.302 2.302a1 1 0 0 1 0 1.38l-2.302 2.302L15.396 12l2.302-3.492zM5.864 2.658L16.8 9.49l-2.302 2.302-8.635-9.134z"/></svg>
                        <span class="btn-text">
                            <span class="small">GET IT ON</span>
                            <span class="big">Google Play</span>
                        </span>
                    </a>
                </div>
            </div>

            {{-- Attendance App --}}
            <div class="app-card">
                <span class="coming-soon-badge">Coming Soon</span>
                <div class="app-card-icon att-icon">📋</div>
                <h3>Sagansa Attendance</h3>
                <p class="app-desc">Aplikasi absensi karyawan dengan tracking lokasi, manajemen shift, dan rekam kehadiran real-time secara akurat.</p>
                <div class="app-buttons">
                    <a href="#" class="app-store-btn" onclick="return false;">
                        <svg viewBox="0 0 24 24" fill="currentColor"><path d="M17.05 20.28c-.98.95-2.05.8-3.08.35-1.09-.46-2.09-.48-3.24 0-1.44.62-2.2.44-3.06-.35C2.79 15.25 3.51 7.59 9.05 7.31c1.35.07 2.29.74 3.08.8 1.18-.24 2.31-.93 3.57-.84 1.51.12 2.65.72 3.4 1.8-3.12 1.87-2.38 5.98.48 7.13-.57 1.5-1.31 2.99-2.54 4.09zM12.03 7.25c-.15-2.23 1.66-4.07 3.74-4.25.29 2.58-2.34 4.5-3.74 4.25z"/></svg>
                        <span class="btn-text">
                            <span class="small">Download on the</span>
                            <span class="big">App Store</span>
                        </span>
                    </a>
                    <a href="#" class="app-store-btn" onclick="return false;">
                        <svg viewBox="0 0 24 24" fill="currentColor"><path d="M3.609 1.814L13.792 12 3.61 22.186a.996.996 0 0 1-.61-.92V2.734a1 1 0 0 1 .609-.92zm10.89 10.893l2.302 2.302-10.937 6.333 8.635-8.635zm3.199-3.199l2.302 2.302a1 1 0 0 1 0 1.38l-2.302 2.302L15.396 12l2.302-3.492zM5.864 2.658L16.8 9.49l-2.302 2.302-8.635-9.134z"/></svg>
                        <span class="btn-text">
                            <span class="small">GET IT ON</span>
                            <span class="big">Google Play</span>
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="product-cta-section">
    <div class="product-cta-inner">
        <h2>Ingin Tahu Kapan Aplikasi Tersedia?</h2>
        <p>Hubungi kami via WhatsApp dan kami akan menginformasikan saat aplikasi resmi diluncurkan di Google Play Store dan Apple App Store.</p>
        <div class="product-cta-buttons">
            <a href="https://wa.me/628111923572?text=Halo%20Sagansa%2C%20saya%20ingin%20tahu%20kapan%20aplikasi%20tersedia" target="_blank" class="btn btn-primary">
                💬 Chat WhatsApp
            </a>
        </div>
    </div>
</div>
@endsection