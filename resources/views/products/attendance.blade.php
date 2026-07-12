@extends('layouts.app')

@section('title', 'Sagansa Attendance — Sistem Absensi Karyawan Terintegrasi')
@section('description', 'Sistem absensi karyawan yang terintegrasi langsung dengan Sagansa POS. Kelola kehadiran, shift, terlambat, dan lembur dalam satu platform.')
@section('keywords', 'attendance, absensi karyawan, sistem absensi, manajemen shift, kehadiran, Sagansa')
@section('canonical', 'https://sagansa.id/produk/attendance')

@section('content')
{{-- HERO --}}
<div class="product-hero">
    <div class="product-hero-inner">
        <div class="product-hero-icon">📋</div>
        <div class="product-hero-badge" style="background: rgba(139,92,246,0.1); color: var(--accent2);">Attendance</div>
        <h1>Absensi Karyawan<br>Terintegrasi POS</h1>
        <p>Tidak perlu aplikasi terpisah untuk mengelola kehadiran karyawan. Sagansa Attendance terhubung langsung dengan POS — data kehadiran, shift, dan performa SDM dalam satu dashboard.</p>
        <div class="product-hero-buttons">
            <a href="https://ops.sagansa.id/id/auth/register" target="_blank" class="btn btn-primary">
                Mulai Gratis
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>
            <a href="https://wa.me/628111923572?text=Halo%20Sagansa%2C%20saya%20tertarik%20dengan%20Sagansa%20Attendance" target="_blank" class="btn btn-secondary">
                💬 Hubungi Kami
            </a>
        </div>
    </div>
</div>

{{-- FITUR UTAMA --}}
<div class="product-section">
    <div class="product-section-inner">
        <div class="product-section-header">
            <div class="section-label purple">✨ Fitur Utama</div>
            <h2>Kelola SDM dengan Lebih Mudah</h2>
            <p>Dari absensi harian hingga manajemen shift, semua terintegrasi langsung dengan sistem POS Anda.</p>
        </div>
        <div class="product-features-grid">
            <div class="product-feature-card">
                <div class="feature-icon green">✅</div>
                <h3>Absensi Digital</h3>
                <p>Karyawan bisa melakukan check-in dan check-out langsung dari aplikasi mobile. Tidak perlu mesin absensi terpisah — cukup smartphone.</p>
            </div>
            <div class="product-feature-card">
                <div class="feature-icon blue">⏰</div>
                <h3>Manajemen Shift</h3>
                <p>Atur jadwal shift karyawan dengan mudah. Sistem otomatis menandai karyawan yang tepat waktu, terlambat, atau pulang cepat.</p>
            </div>
            <div class="product-feature-card">
                <div class="feature-icon orange">📊</div>
                <h3>Laporan Kehadiran</h3>
                <p>Dapatkan rekap kehadiran harian, mingguan, dan bulanan. Ketahui siapa yang sering terlambat dan siapa yang performanya konsisten.</p>
            </div>
            <div class="product-feature-card">
                <div class="feature-icon purple">🔗</div>
                <h3>Terintegrasi POS</h3>
                <p>Data absensi terhubung langsung dengan POS. Hanya karyawan yang sudah check-in yang bisa mengakses sistem kasir.</p>
            </div>
            <div class="product-feature-card">
                <div class="feature-icon cyan">👥</div>
                <h3>User Tidak Terbatas</h3>
                <p>Tambahkan karyawan sebanyak yang Anda butuhkan tanpa biaya tambahan per user. Atur hak akses sesuai peran masing-masing.</p>
            </div>
            <div class="product-feature-card">
                <div class="feature-icon indigo">📱</div>
                <h3>Aplikasi Mobile</h3>
                <p>Tersedia di Android dan iOS. Karyawan bisa absen langsung dari smartphone mereka masing-masing.</p>
            </div>
        </div>
    </div>
</div>

{{-- INTEGRASI POS --}}
<div class="product-section" style="background: var(--gray-50);">
    <div class="product-section-inner">
        <div class="product-highlight-card">
            <div class="highlight-text">
                <h2>Satu Platform dengan POS</h2>
                <p>Attendance bukan aplikasi terpisah — ia terintegrasi langsung dengan Sagansa POS. Kelola transaksi dan SDM dalam satu dashboard yang sama. Tidak perlu switch antar aplikasi.</p>
                <a href="/produk/point-of-sale" class="btn btn-white" style="display: inline-flex;">
                    Pelajari POS
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
            </div>
            <div class="highlight-visual">💳</div>
        </div>
    </div>
</div>

{{-- DOWNLOAD APLIKASI --}}
@php
    $playStoreAtt = \App\Models\Setting::get('google_play_attendance_link');
    $appStoreAtt = \App\Models\Setting::get('app_store_attendance_link');
    $isAttReleased = !empty($playStoreAtt) || !empty($appStoreAtt);
@endphp
<div class="product-section" style="background: var(--gray-50); border-top: 1px solid var(--gray-200); border-bottom: 1px solid var(--gray-200);">
    <div class="product-section-inner" style="text-align: center; max-width: 600px; margin: 0 auto; padding: 48px 24px;">
        <div class="product-section-header" style="margin-bottom: 24px;">
            <div class="section-label blue" style="display: inline-block; margin-bottom: 8px;">📱 Download Aplikasi</div>
            <h2 style="font-size: 1.8rem; font-weight: 800; color: var(--gray-900); margin-bottom: 12px;">Unduh Sagansa Attendance</h2>
            <p style="font-size: 1rem; color: var(--gray-600); line-height: 1.6;">Gunakan Sagansa Attendance di smartphone Android dan iOS karyawan Anda untuk mencatat kehadiran dengan verifikasi GPS & foto selfie.</p>
        </div>
        <div class="app-buttons" style="display: flex; gap: 12px; justify-content: center; flex-wrap: wrap;">
            <a href="{{ $appStoreAtt ?: '#' }}" @if($appStoreAtt) target="_blank" @else onclick="alert('Sagansa Attendance untuk iOS segera hadir di App Store!'); return false;" @endif class="app-store-btn {{ !$appStoreAtt ? 'coming-soon' : '' }}">
                <svg viewBox="0 0 24 24" fill="currentColor" style="width: 24px; height: 24px; flex-shrink: 0;"><path d="M17.05 20.28c-.98.95-2.05.8-3.08.35-1.09-.46-2.09-.48-3.24 0-1.44.62-2.2.44-3.06-.35C2.79 15.25 3.51 7.59 9.05 7.31c1.35.07 2.29.74 3.08.8 1.18-.24 2.31-.93 3.57-.84 1.51.12 2.65.72 3.4 1.8-3.12 1.87-2.38 5.98.48 7.13-.57 1.5-1.31 2.99-2.54 4.09zM12.03 7.25c-.15-2.23 1.66-4.07 3.74-4.25.29 2.58-2.34 4.5-3.74 4.25z"/></svg>
                <span class="btn-text">
                    <span class="small">Download on the</span>
                    <span class="big">App Store</span>
                </span>
            </a>
            <a href="{{ $playStoreAtt ?: '#' }}" @if($playStoreAtt) target="_blank" @else onclick="alert('Sagansa Attendance untuk Android segera hadir di Google Play!'); return false;" @endif class="app-store-btn {{ !$playStoreAtt ? 'coming-soon' : '' }}">
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
        <h2>Kelola Karyawan Lebih Efisien</h2>
        <p>Mulai gratis sekarang. Absensi terintegrasi dengan POS — tanpa biaya tambahan.</p>
        <div class="product-cta-buttons">
            <a href="https://ops.sagansa.id/id/auth/register" target="_blank" class="btn btn-primary">
                Mulai Gratis Sekarang
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>
            <a href="https://wa.me/628111923572?text=Halo%20Sagansa%2C%20saya%20tertarik%20dengan%20Sagansa%20Attendance" target="_blank" class="btn btn-white">
                💬 Chat WhatsApp
            </a>
        </div>
    </div>
</div>
@endsection