@extends('layouts.app')

@section('title', 'Download Aplikasi — Sagansa POS & Attendance')
@section('description', 'Download aplikasi Sagansa POS dan Sagansa Attendance untuk Android dan iOS. Kelola transaksi dan absensi langsung dari perangkat mobile Anda.')
@section('keywords', 'download, aplikasi, Sagansa POS, Sagansa Attendance, Google Play, App Store, Android, iOS')
@section('canonical', 'https://sagansa.id/download')

@php
    $playStorePos = \App\Models\Setting::get('google_play_pos_link');
    $playStoreAtt = \App\Models\Setting::get('google_play_attendance_link');
    $appStorePos = \App\Models\Setting::get('app_store_pos_link');
    $appStoreAtt = \App\Models\Setting::get('app_store_attendance_link');

    $isPosReleased = (!empty($playStorePos) && $playStorePos !== '#') || (!empty($appStorePos) && $appStorePos !== '#');
    $isAttReleased = (!empty($playStoreAtt) && $playStoreAtt !== '#') || (!empty($appStoreAtt) && $appStoreAtt !== '#');
@endphp

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
                @if(!$isPosReleased)
                    <span class="coming-soon-badge">Coming Soon</span>
                @endif
                <div class="app-card-icon pos-icon-img">
                    <img src="{{ asset('images/pos-icon.png') }}" alt="Sagansa POS Icon" class="app-logo-img">
                </div>
                <h3>Sagansa POS</h3>
                <p class="app-desc">Aplikasi kasir modern untuk mengelola transaksi, stok, dan laporan bisnis Anda langsung dari tablet atau smartphone.</p>
                <div class="app-buttons">
                    @include('welcome.partials._store-badge', ['type' => 'appstore', 'link' => $appStorePos, 'alert' => 'Sagansa POS untuk iOS segera hadir di App Store!'])
                    @include('welcome.partials._store-badge', ['type' => 'googleplay', 'link' => $playStorePos, 'alert' => 'Sagansa POS untuk Android segera hadir di Google Play!'])
                </div>
            </div>

            {{-- Attendance App --}}
            <div class="app-card">
                @if(!$isAttReleased)
                    <span class="coming-soon-badge">Coming Soon</span>
                @endif
                <div class="app-card-icon att-icon-img">
                    <img src="{{ asset('images/attendance-icon.png') }}" alt="Sagansa Attendance Icon" class="app-logo-img">
                </div>
                <h3>Sagansa Attendance</h3>
                <p class="app-desc">Aplikasi absensi karyawan dengan tracking lokasi, manajemen shift, dan rekam kehadiran real-time secara akurat.</p>
                <div class="app-buttons">
                    @include('welcome.partials._store-badge', ['type' => 'appstore', 'link' => $appStoreAtt, 'alert' => 'Sagansa Attendance untuk iOS segera hadir di App Store!'])
                    @include('welcome.partials._store-badge', ['type' => 'googleplay', 'link' => $playStoreAtt, 'alert' => 'Sagansa Attendance untuk Android segera hadir di Google Play!'])
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