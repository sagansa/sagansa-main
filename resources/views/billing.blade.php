@extends('layouts.app')

@php
    $priceNormalVal = (int) \App\Models\Setting::get('price_normal', '99000');
    $pricePromoVal = \App\Models\Setting::get('price_promo', '59000');
    $pricePromoVal = $pricePromoVal !== null && $pricePromoVal !== '' ? (int)$pricePromoVal : null;
    $priceAttendanceVal = (int) \App\Models\Setting::get('price_attendance_additional', '1500');

    $isPromoActive = $pricePromoVal !== null && $pricePromoVal < $priceNormalVal;
    $priceNormalFormatted = 'Rp' . number_format($priceNormalVal, 0, ',', '.');
    $pricePromoFormatted = $pricePromoVal !== null ? 'Rp' . number_format($pricePromoVal, 0, ',', '.') : '';
    $priceAttendanceFormatted = 'Rp' . number_format($priceAttendanceVal, 0, ',', '.');
    $priceEffective = $pricePromoVal ?? $priceNormalVal;
    $priceEffectiveFormatted = 'Rp' . number_format($priceEffective, 0, ',', '.');

    // Contoh perhitungan multi-store admin + presensi
    $sampleAdminFee = $priceEffective;
    $samplePresensiCount = 8;
    $samplePresensiFee = $samplePresensiCount * $priceAttendanceVal;
    $sampleTotal = $sampleAdminFee + $samplePresensiFee;
    $sampleTotalFormatted = 'Rp' . number_format($sampleTotal, 0, ',', '.');
@endphp

@section('title', 'Model Berlangganan & Akses Admin — Sagansa')
@section('description', 'Penjelasan lengkap model berlangganan Sagansa: Kasir POS & Absensi mobile gratis selamanya. Berlangganan diperlukan khusus untuk membuka akses bagian admin.')
@section('keywords', 'perhitungan tagihan, berlangganan admin, harga POS, harga absensi, Sagansa')
@section('canonical', 'https://sagansa.id/cara-perhitungan')

@section('head')
<style>
    /* ========== BILLING PAGE HERO ========== */
    .billing-hero {
        background: linear-gradient(170deg, #eff6ff 0%, #f0f9ff 30%, #faf5ff 60%, #fff 100%);
        padding: 140px 24px 60px;
        text-align: center;
        position: relative;
        overflow: hidden;
    }
    .billing-hero::before {
        content: '';
        position: absolute;
        top: -40%;
        right: -15%;
        width: 600px;
        height: 600px;
        background: radial-gradient(circle, rgba(37,99,235,0.08) 0%, transparent 70%);
        border-radius: 50%;
    }
    .billing-hero-inner {
        max-width: 700px;
        margin: 0 auto;
        position: relative;
        z-index: 1;
    }
    .billing-hero-icon { font-size: 3rem; margin-bottom: 16px; }
    .billing-hero h1 {
        font-size: 2.8rem; font-weight: 900; color: var(--gray-900);
        margin-bottom: 16px; letter-spacing: -0.02em; line-height: 1.15;
    }
    .billing-hero p { font-size: 1.15rem; color: var(--gray-500); line-height: 1.7; }
    .billing-content { padding: 0 24px 80px; }
    .billing-inner { max-width: 860px; margin: 0 auto; }
    .billing-section { padding: 48px 0; border-bottom: 1px solid var(--gray-100); }
    .billing-section:last-of-type { border-bottom: none; }
    .billing-section-badge {
        display: inline-block; font-size: 0.8rem; font-weight: 700;
        text-transform: uppercase; letter-spacing: 0.06em;
        padding: 6px 14px; border-radius: 100px; margin-bottom: 16px;
    }
    .billing-section-badge.blue { background: #eff6ff; color: var(--primary); }
    .billing-section-badge.green { background: #ecfdf5; color: var(--success); }
    .billing-section-badge.orange { background: #fffbeb; color: var(--warning); }
    .billing-section-badge.red { background: #fef2f2; color: var(--danger); }
    .billing-section-badge.purple { background: #e0f2fe; color: var(--accent2); }
    .billing-section h2 { font-size: 1.8rem; font-weight: 800; color: var(--gray-900); margin-bottom: 12px; line-height: 1.25; }
    .billing-section-intro { font-size: 1.05rem; color: var(--gray-600); line-height: 1.7; margin-bottom: 32px; }
    .billing-formula-card {
        background: linear-gradient(135deg, #eff6ff, #e0f2fe);
        border: 1px solid var(--gray-200); border-radius: 20px; padding: 32px; margin-bottom: 40px;
    }
    .billing-formula-label { font-size: 0.8rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.06em; color: var(--primary); margin-bottom: 12px; }
    .billing-formula-text { font-size: 1.15rem; color: var(--gray-700); margin-bottom: 6px; line-height: 1.6; }
    .billing-formula-text strong { color: var(--gray-900); }
    .billing-examples h3 { font-size: 1.2rem; font-weight: 700; color: var(--gray-900); margin-bottom: 20px; }
    .billing-example-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; }
    .billing-example-card { background: #fff; border: 1px solid var(--gray-200); border-radius: 16px; overflow: hidden; transition: box-shadow 0.3s ease; }
    .billing-example-card:hover { box-shadow: 0 8px 30px rgba(0,0,0,0.08); }
    .billing-example-header { padding: 16px 20px; border-bottom: 1px solid var(--gray-100); }
    .billing-example-tag { font-size: 0.8rem; font-weight: 700; padding: 4px 12px; border-radius: 100px; }
    .billing-example-tag.green { background: #ecfdf5; color: var(--success); }
    .billing-example-tag.blue { background: #eff6ff; color: var(--primary); }
    .billing-example-tag.purple { background: #e0f2fe; color: var(--accent2); }
    .billing-example-body { padding: 20px; }
    .billing-example-row { display: flex; justify-content: space-between; align-items: center; padding: 8px 0; font-size: 0.9rem; color: var(--gray-600); }
    .billing-example-row strong { color: var(--gray-800); }
    .billing-example-row.result { background: linear-gradient(135deg, #eff6ff, #e0f2fe); margin: 0 -20px; padding: 12px 20px; font-size: 1rem; }
    .billing-example-row.result strong { color: var(--primary); font-size: 1.15rem; }
    .billing-example-row .strikethrough { text-decoration: line-through; color: var(--gray-400); }
    .billing-example-divider { height: 1px; background: var(--gray-100); margin: 8px 0; }
    .billing-store-breakdown { background: #fff; border: 1px solid var(--gray-200); border-radius: 16px; overflow: hidden; }
    .billing-store-item { display: flex; align-items: center; gap: 16px; padding: 20px 24px; border-bottom: 1px solid var(--gray-100); }
    .billing-store-icon { font-size: 1.8rem; width: 48px; height: 48px; border-radius: 12px; background: var(--gray-50); display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
    .billing-store-info { display: flex; flex-direction: column; gap: 4px; }
    .billing-store-info strong:first-child { font-size: 0.95rem; color: var(--gray-800); }
    .billing-store-info span { font-size: 0.9rem; color: var(--gray-500); }
    .billing-store-info strong { color: var(--gray-800); }
    .billing-store-total { display: flex; justify-content: space-between; align-items: center; padding: 20px 24px; background: linear-gradient(135deg, #eff6ff, #f5f3ff); font-size: 1.05rem; }
    .billing-store-total span { font-weight: 600; color: var(--gray-700); }
    .billing-store-total strong { font-size: 1.4rem; color: var(--primary); font-weight: 800; }
    .billing-warning-box { display: flex; gap: 20px; padding: 24px; border-radius: 16px; background: #fef2f2; border: 1px solid #fecaca; margin-bottom: 16px; }
    .billing-warning-box.success { background: #ecfdf5; border-color: #a7f3d0; }
    .billing-warning-icon { font-size: 2rem; flex-shrink: 0; }
    .billing-warning-content h4 { font-size: 1.05rem; font-weight: 700; color: var(--gray-900); margin-bottom: 8px; }
    .billing-warning-content ul { list-style: none; padding: 0; }
    .billing-warning-content li { font-size: 0.9rem; color: var(--gray-600); padding: 4px 0 4px 16px; position: relative; }
    .billing-warning-content li::before { content: '•'; position: absolute; left: 0; color: var(--gray-400); }
    .billing-summary-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 16px; }
    .billing-summary-card { background: #fff; border: 1px solid var(--gray-200); border-radius: 16px; padding: 24px 20px; text-align: center; transition: all 0.3s ease; }
    .billing-summary-card:hover { transform: translateY(-4px); box-shadow: 0 12px 30px rgba(0,0,0,0.08); border-color: transparent; }
    .billing-summary-number { width: 40px; height: 40px; border-radius: 50%; background: linear-gradient(135deg, var(--primary), var(--accent2)); color: #fff; font-weight: 800; font-size: 1.1rem; display: flex; align-items: center; justify-content: center; margin: 0 auto 14px; }
    .billing-summary-card h4 { font-size: 0.95rem; font-weight: 700; color: var(--gray-900); margin-bottom: 8px; line-height: 1.3; }
    .billing-summary-card p { font-size: 0.85rem; color: var(--gray-500); line-height: 1.5; }
    .billing-cta { text-align: center; padding: 48px 0 0; }
    .billing-cta p { font-size: 1.1rem; color: var(--gray-500); margin-bottom: 20px; }
    @media (max-width: 900px) {
        .billing-example-grid { grid-template-columns: 1fr; }
        .billing-summary-grid { grid-template-columns: repeat(2, 1fr); }
    }
    @media (max-width: 640px) {
        .billing-hero { padding: 120px 20px 40px; }
        .billing-hero h1 { font-size: 2rem; }
        .billing-section h2 { font-size: 1.4rem; }
        .billing-summary-grid { grid-template-columns: 1fr; }
    }
</style>
@endsection

@section('content')
<div class="policy-page">
    <div class="billing-hero">
        <div class="billing-hero-inner">
            <div class="billing-hero-icon">💡</div>
            <h1>Model Berlangganan & Akses Admin</h1>
            <p>Aplikasi kasir POS dan aplikasi absensi (Attendance) di HP dapat digunakan <strong>gratis & bebas selamanya</strong>. Berlangganan hanya diperlukan jika Anda ingin membuka dan mengelola data di <strong>Panel Admin (Web Ops)</strong>.</p>
        </div>
    </div>

    <div class="billing-content">
        <div class="billing-inner">

            {{-- SECTION 1: SKEMA AKSES --}}
            <div class="billing-section">
                <div class="billing-section-badge blue">Skema Akses</div>
                <h2>Aplikasi Mobile Gratis, Berlangganan Khusus Admin</h2>
                <p class="billing-section-intro">Untuk mempermudah penggunaan bisnis UMKM Anda, aplikasi di HP tidak dikenakan biaya transaksi maupun batas omzet.</p>
                
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 24px; margin-bottom: 40px;">
                    <div style="background: var(--gray-50); border: 1px solid var(--gray-200); border-radius: 20px; padding: 28px;">
                        <div class="billing-formula-label" style="color: var(--primary);">1. Mobile POS & Attendance (HP)</div>
                        <p style="font-size: 0.95rem; color: var(--gray-600); margin-bottom: 16px; line-height: 1.5;">Aplikasi kasir POS untuk transaksi toko dan aplikasi absensi karyawan di HP bebas digunakan <strong>gratis 100% selamanya</strong> tanpa potongan omzet.</p>
                        <div class="billing-formula-text">Biaya Kasir POS = <strong>Gratis (Rp0)</strong></div>
                        <div class="billing-formula-text">Biaya Absensi HP = <strong>Gratis (Rp0)</strong></div>
                    </div>
                    
                    <div style="background: var(--gray-50); border: 1px solid var(--gray-200); border-radius: 20px; padding: 28px;">
                        <div class="billing-formula-label" style="color: var(--accent2);">2. Akses Panel Admin (Web Ops)</div>
                        <p style="font-size: 0.95rem; color: var(--gray-600); margin-bottom: 16px; line-height: 1.5;">Untuk membuka laporan keuangan, kelola produk, dan analisa bisnis di panel web admin wajib mengaktifkan berlangganan.</p>
                        <div class="billing-formula-text">Akses Admin = <strong>{{ $priceEffectiveFormatted }}</strong> / store / bulan</div>
                        <div class="billing-formula-text">Akses Fitur Presensi Admin = <strong>{{ $priceAttendanceFormatted }}</strong> / user aktif presensi / bulan</div>
                    </div>
                </div>

                <div class="billing-examples">
                    <h3>Ilustrasi Perhitungan Akses Admin</h3>
                    <div class="billing-example-grid">
                        <div class="billing-example-card">
                            <div class="billing-example-header"><span class="billing-example-tag green">Kasir POS Saja</span></div>
                            <div class="billing-example-body">
                                <div class="billing-example-row"><span>Mobile POS di Store</span><strong>Gratis (Rp0)</strong></div>
                                <div class="billing-example-row"><span>Mobile Attendance</span><strong>Gratis (Rp0)</strong></div>
                                <div class="billing-example-row"><span>Berlangganan Admin</span><strong>{{ $priceEffectiveFormatted }}</strong></div>
                                <div class="billing-example-divider"></div>
                                <div class="billing-example-row result"><span>Total / bulan</span><strong>{{ $priceEffectiveFormatted }}</strong></div>
                            </div>
                        </div>
                        <div class="billing-example-card">
                            <div class="billing-example-header"><span class="billing-example-tag blue">Admin + Presensi Karyawan</span></div>
                            <div class="billing-example-body">
                                <div class="billing-example-row"><span>Berlangganan Admin</span><strong>{{ $priceEffectiveFormatted }}</strong></div>
                                <div class="billing-example-row"><span>8 User Aktif Presensi</span><strong>Rp{{ number_format(8 * $priceAttendanceVal, 0, ',', '.') }}</strong> <span style="font-size:0.75rem;color:var(--gray-400)">(8 × {{ $priceAttendanceFormatted }})</span></div>
                                <div class="billing-example-divider"></div>
                                <div class="billing-example-row result"><span>Total / bulan</span><strong>{{ $sampleTotalFormatted }}</strong></div>
                            </div>
                        </div>
                        <div class="billing-example-card">
                            <div class="billing-example-header"><span class="billing-example-tag purple">Tanpa Akses Admin</span></div>
                            <div class="billing-example-body">
                                <div class="billing-example-row"><span>Penggunaan POS Kasir HP</span><strong>Gratis (Rp0)</strong></div>
                                <div class="billing-example-row"><span>Absensi Karyawan HP</span><strong>Gratis (Rp0)</strong></div>
                                <div class="billing-example-row"><span>Akses Admin Panel</span><strong>Tidak Aktif</strong></div>
                                <div class="billing-example-divider"></div>
                                <div class="billing-example-row result"><span>Total / bulan</span><strong>Rp0</strong></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- SECTION 2: JAMINAN KEAMANAN OPERASIONAL --}}
            <div class="billing-section">
                <div class="billing-section-badge green">Jaminan Operasional</div>
                <h2>Kasir & Absensi Mobile Tetap Berjalan 100%</h2>
                <p class="billing-section-intro">Jika berlangganan admin belum diaktifkan atau dalam status non-aktif, operasional kasir dan absensi karyawan di lapangan dijamin <strong>tetap berjalan normal tanpa hambatan</strong>.</p>
                
                <div class="billing-warning-box success" style="background: #eff6ff; border-color: #bfdbfe;">
                    <div class="billing-warning-icon">📱</div>
                    <div class="billing-warning-content">
                        <h4 style="color: var(--primary);">Selalu Bekerja Normal di Lapangan</h4>
                        <ul>
                            <li><strong>Aplikasi Kasir POS Mobile</strong> di toko tetap dapat mencetak struk, menerima pembayaran QRIS, dan mengolah order</li>
                            <li><strong>Aplikasi Absensi Karyawan Mobile</strong> tetap dapat merekam clock-in/out, GPS, dan selfie karyawan</li>
                            <li>Data transaksi dan presensi tersimpan sangat aman di cloud server</li>
                        </ul>
                    </div>
                </div>

                <div class="billing-warning-box">
                    <div class="billing-warning-icon">🔒</div>
                    <div class="billing-warning-content">
                        <h4>Akses yang Membutuhkan Berlangganan (Panel Admin Ops)</h4>
                        <ul>
                            <li>Akses masuk ke dashboard web admin (apps/ops) untuk melihat grafik keuangan & rekap transaksi</li>
                            <li>Akses mengunduh laporan presensi karyawan ke Excel melalui panel admin</li>
                            <li>Akses bagian admin akan terbuka seketika setelah berlangganan diaktifkan</li>
                        </ul>
                    </div>
                </div>
            </div>

            {{-- SECTION 3: RINGKASAN --}}
            <div class="billing-section">
                <div class="billing-section-badge purple">Ringkasan</div>
                <h2>4 Poin Utama Model Berlangganan</h2>
                <div class="billing-summary-grid">
                    <div class="billing-summary-card"><div class="billing-summary-number">1</div><h4>Mobile POS Gratis</h4><p>Aplikasi kasir POS di HP gratis selamanya tanpa potong omzet.</p></div>
                    <div class="billing-summary-card"><div class="billing-summary-number">2</div><h4>Mobile Absensi Gratis</h4><p>Absensi karyawan di HP bebas digunakan sepuasnya tanpa biaya.</p></div>
                    <div class="billing-summary-card"><div class="billing-summary-number">3</div><h4>Berlangganan Khusus Admin</h4><p>Biaya flat {{ $priceEffectiveFormatted }}/bulan untuk membuka bagian web admin.</p></div>
                    <div class="billing-summary-card"><div class="billing-summary-number">4</div><h4>Presensi Admin Rp1.500/User</h4><p>Pengelolaan presensi di admin dihitung Rp1.500 per user aktif presensi.</p></div>
                </div>
            </div>

            <div class="billing-cta">
                <p>Ingin bertanya lebih lanjut mengenai berlangganan admin Sagansa?</p>
                <a href="https://wa.me/628111923572" target="_blank" class="btn btn-primary">💬 Hubungi Kami via WhatsApp <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg></a>
            </div>
        </div>
    </div>
</div>
@endsection