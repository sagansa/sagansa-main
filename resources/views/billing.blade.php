@extends('layouts.app')

@php
    $priceNormalVal = (int) \App\Models\Setting::get('price_normal', '99000');
    $pricePromoVal = \App\Models\Setting::get('price_promo', '59000');
    $pricePromoVal = $pricePromoVal !== null && $pricePromoVal !== '' ? (int)$pricePromoVal : null;
    $pricePercentage = \App\Models\Setting::get('price_percentage', '1');
    $priceAttendanceVal = (int) \App\Models\Setting::get('price_attendance_additional', '2000');

    $isPromoActive = $pricePromoVal !== null && $pricePromoVal < $priceNormalVal;
    $priceNormalFormatted = 'Rp' . number_format($priceNormalVal, 0, ',', '.');
    $pricePromoFormatted = $pricePromoVal !== null ? 'Rp' . number_format($pricePromoVal, 0, ',', '.') : '';
    $priceAttendanceFormatted = 'Rp' . number_format($priceAttendanceVal, 0, ',', '.');
    
    // Hitung total untuk contoh multi-store
    $storeATagihan = 30000;
    $storeBTagihan = $pricePromoVal ?? $priceNormalVal;
    $storeCTagihan = 8000;
    $totalMultiStore = $storeATagihan + $storeBTagihan + $storeCTagihan;
    $totalMultiStoreFormatted = 'Rp' . number_format($totalMultiStore, 0, ',', '.');
@endphp

@section('title', 'Cara Perhitungan & Pembayaran — Sagansa')
@section('description', 'Penjelasan lengkap cara perhitungan tagihan dan sistem pembayaran Sagansa POS & Attendance — Skema tagihan adil pascabayar untuk UMKM.')
@section('keywords', 'perhitungan tagihan, cara bayar, billing Sagansa, harga POS, omzet')
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
    .billing-timeline { position: relative; padding-left: 32px; }
    .billing-timeline-item { position: relative; padding-bottom: 36px; }
    .billing-timeline-item:last-child { padding-bottom: 0; }
    .billing-timeline-dot { width: 16px; height: 16px; border-radius: 50%; position: absolute; left: -32px; top: 4px; z-index: 2; }
    .billing-timeline-dot.green { background: var(--success); }
    .billing-timeline-dot.warning { background: var(--warning); }
    .billing-timeline-dot.danger { background: var(--danger); }
    .billing-timeline-line { position: absolute; left: -25px; top: 20px; bottom: 0; width: 2px; background: var(--gray-200); }
    .billing-timeline-item:last-child .billing-timeline-line { display: none; }
    .billing-timeline-period { font-size: 1.1rem; font-weight: 700; color: var(--gray-900); margin-bottom: 6px; }
    .billing-timeline-desc { font-size: 0.95rem; color: var(--gray-600); line-height: 1.7; }
    .billing-calendar { background: #fff; border: 1px solid var(--gray-200); border-radius: 16px; overflow: hidden; }
    .billing-calendar-header { background: var(--gray-50); padding: 16px 24px; border-bottom: 1px solid var(--gray-100); font-weight: 700; font-size: 0.95rem; color: var(--gray-700); }
    .billing-calendar-body { padding: 24px; }
    .billing-calendar-period { border-radius: 12px; padding: 20px; }
    .billing-calendar-period.safe { background: #ecfdf5; border: 1px solid #a7f3d0; }
    .billing-calendar-period.bill { background: #eff6ff; border: 1px solid #bfdbfe; }
    .billing-calendar-period.deadline { background: #fef2f2; border: 1px solid #fecaca; }
    .billing-calendar-label strong { font-size: 0.95rem; font-weight: 700; display: block; margin-bottom: 6px; }
    .billing-calendar-period.safe .billing-calendar-label strong { color: #065f46; }
    .billing-calendar-period.bill .billing-calendar-label strong { color: #1e40af; }
    .billing-calendar-period.deadline .billing-calendar-label strong { color: #991b1b; }
    .billing-calendar-desc { font-size: 0.9rem; color: var(--gray-600); line-height: 1.6; }
    .billing-calendar-arrow { text-align: center; font-size: 1.5rem; color: var(--gray-300); padding: 8px 0; }
    .billing-warning-box { display: flex; gap: 20px; padding: 24px; border-radius: 16px; background: #fef2f2; border: 1px solid #fecaca; margin-bottom: 16px; }
    .billing-warning-box.success { background: #ecfdf5; border-color: #a7f3d0; }
    .billing-warning-icon { font-size: 2rem; flex-shrink: 0; }
    .billing-warning-content h4 { font-size: 1.05rem; font-weight: 700; color: var(--gray-900); margin-bottom: 8px; }
    .billing-warning-content ul { list-style: none; padding: 0; }
    .billing-warning-content li { font-size: 0.9rem; color: var(--gray-600); padding: 4px 0 4px 16px; position: relative; }
    .billing-warning-content li::before { content: '•'; position: absolute; left: 0; color: var(--gray-400); }
    .billing-summary-grid { display: grid; grid-template-columns: repeat(5, 1fr); gap: 16px; }
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
        .billing-summary-grid .billing-summary-card:last-child { grid-column: 1 / -1; }
    }
    @media (max-width: 640px) {
        .billing-hero { padding: 120px 20px 40px; }
        .billing-hero h1 { font-size: 2rem; }
        .billing-section h2 { font-size: 1.4rem; }
        .billing-formula-text { font-size: 1rem; }
        .billing-summary-grid { grid-template-columns: 1fr; }
        .billing-summary-grid .billing-summary-card:last-child { grid-column: auto; }
    }
</style>
@endsection

@section('content')
<div class="policy-page">
    <div class="billing-hero">
        <div class="billing-hero-inner">
            <div class="billing-hero-icon">💡</div>
            <h1>Cara Perhitungan & Pembayaran</h1>
            <p>Penjelasan lengkap bagaimana tagihan dihitung, pilihan skema tagihan adil (POS / Attendance), dan jaminan operasional kasir & absensi tetap berjalan normal walau terjadi keterlambatan bayar.</p>
        </div>
    </div>

    <div class="billing-content">
        <div class="billing-inner">

            {{-- SECTION 1: PILIHAN PAKET & PERHITUNGAN --}}
            <div class="billing-section">
                <div class="billing-section-badge blue">Skema Tagihan</div>
                <h2>Dua Pilihan Skema Tagihan Bersahabat</h2>
                <p class="billing-section-intro">Kami menawarkan dua pilihan skema tagihan pascabayar (postpaid) yang sangat adil dan disesuaikan dengan skala operasional bisnis UMKM Anda.</p>
                
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 24px; margin-bottom: 40px;">
                    <div style="background: var(--gray-50); border: 1px solid var(--gray-200); border-radius: 20px; padding: 28px;">
                        <div class="billing-formula-label" style="color: var(--primary);">Opsi A: POS + Attendance Saja</div>
                        <p style="font-size: 0.95rem; color: var(--gray-600); margin-bottom: 16px; line-height: 1.5;">Jika menggunakan aplikasi kasir POS, modul absensi karyawan otomatis <strong>gratis sepuasnya</strong> tanpa batas karyawan.</p>
                        <div class="billing-formula-text">Tagihan = <strong>{{ $pricePercentage }}%</strong> × Omzet Bulanan</div>
                        <div class="billing-formula-text">Maksimal = <strong>{{ $pricePromoFormatted }}</strong> / store / bulan <span style="font-size:0.8rem;color:var(--gray-500)">(Promo dari {{ $priceNormalFormatted }})</span></div>
                    </div>
                    
                    <div style="background: var(--gray-50); border: 1px solid var(--gray-200); border-radius: 20px; padding: 28px;">
                        <div class="billing-formula-label" style="color: var(--accent2);">Opsi B: Attendance Saja</div>
                        <p style="font-size: 0.95rem; color: var(--gray-600); margin-bottom: 16px; line-height: 1.5;">Jika hanya menggunakan sistem absensi karyawan tanpa aplikasi kasir POS. Tagihan dihitung berbasis karyawan aktif.</p>
                        <div class="billing-formula-text"><strong>5 Karyawan Aktif Pertama</strong> = <strong>Gratis (Rp0)</strong></div>
                        <div class="billing-formula-text">Mulai Karyawan ke-6 = <strong>{{ $priceAttendanceFormatted }}</strong> / karyawan aktif / bulan</div>
                    </div>
                </div>

                <div class="billing-examples">
                    <h3>Contoh Perhitungan Opsi A (POS + Attendance Saja)</h3>
                    <div class="billing-example-grid" style="margin-bottom: 45px;">
                        <div class="billing-example-card">
                            <div class="billing-example-header"><span class="billing-example-tag green">Omzet Kecil</span></div>
                            <div class="billing-example-body">
                                <div class="billing-example-row"><span>Omzet bulan ini</span><strong>Rp1.500.000</strong></div>
                                <div class="billing-example-row"><span>1% × Omzet</span><strong>Rp15.000</strong></div>
                                <div class="billing-example-row"><span>Fitur Absensi</span><strong>Gratis</strong></div>
                                <div class="billing-example-divider"></div>
                                <div class="billing-example-row result"><span>Tagihan</span><strong>Rp15.000</strong></div>
                            </div>
                        </div>
                        <div class="billing-example-card">
                            <div class="billing-example-header"><span class="billing-example-tag blue">Omzet Menengah</span></div>
                            <div class="billing-example-body">
                                <div class="billing-example-row"><span>Omzet bulan ini</span><strong>Rp4.000.000</strong></div>
                                <div class="billing-example-row"><span>1% × Omzet</span><strong>Rp40.000</strong></div>
                                <div class="billing-example-row"><span>Fitur Absensi</span><strong>Gratis</strong></div>
                                <div class="billing-example-divider"></div>
                                <div class="billing-example-row result"><span>Tagihan</span><strong>Rp40.000</strong></div>
                            </div>
                        </div>
                        <div class="billing-example-card">
                            <div class="billing-example-header"><span class="billing-example-tag purple">Omzet Besar</span></div>
                            <div class="billing-example-body">
                                <div class="billing-example-row"><span>Omzet bulan ini</span><strong>Rp8.000.000</strong></div>
                                <div class="billing-example-row"><span>{{ $pricePercentage }}% × Omzet</span><strong class="strikethrough">Rp80.000</strong></div>
                                <div class="billing-example-row"><span>Fitur Absensi</span><strong>Gratis</strong></div>
                                <div class="billing-example-divider"></div>
                                <div class="billing-example-row result"><span>Tagihan (maks.)</span><strong>{{ $pricePromoFormatted }}</strong></div>
                            </div>
                        </div>
                    </div>

                    <h3>Contoh Perhitungan Opsi B (Attendance Saja)</h3>
                    <p class="billing-section-intro" style="margin-bottom: 20px;">*Hanya menghitung karyawan terdaftar yang aktif melakukan absensi masuk/keluar minimal satu kali dalam satu bulan tagihan.</p>
                    <div class="billing-example-grid">
                        <div class="billing-example-card">
                            <div class="billing-example-header"><span class="billing-example-tag green">Karyawan Kecil</span></div>
                            <div class="billing-example-body">
                                <div class="billing-example-row"><span>Karyawan terdaftar</span><strong>8 Karyawan</strong></div>
                                <div class="billing-example-row"><span>Karyawan aktif absen</span><strong>4 Karyawan</strong></div>
                                <div class="billing-example-row"><span>Karyawan berbayar</span><strong>0 Karyawan</strong> <span style="font-size:0.8rem;color:var(--gray-400)">(<5)</span></div>
                                <div class="billing-example-divider"></div>
                                <div class="billing-example-row result"><span>Tagihan</span><strong>Rp0</strong></div>
                            </div>
                        </div>
                        <div class="billing-example-card">
                            <div class="billing-example-header"><span class="billing-example-tag blue">Karyawan Sedang</span></div>
                            <div class="billing-example-body">
                                <div class="billing-example-row"><span>Karyawan terdaftar</span><strong>8 Karyawan</strong></div>
                                <div class="billing-example-row"><span>Karyawan aktif absen</span><strong>8 Karyawan</strong></div>
                                <div class="billing-example-row"><span>Karyawan berbayar</span><strong>3 Karyawan</strong> <span style="font-size:0.8rem;color:var(--gray-400)">(8 - 5)</span></div>
                                <div class="billing-example-divider"></div>
                                <div class="billing-example-row result"><span>Tagihan</span><strong>Rp{{ number_format(3 * $priceAttendanceVal, 0, ',', '.') }}</strong></div>
                            </div>
                        </div>
                        <div class="billing-example-card">
                            <div class="billing-example-header"><span class="billing-example-tag purple">Karyawan Banyak</span></div>
                            <div class="billing-example-body">
                                <div class="billing-example-row"><span>Karyawan terdaftar</span><strong>25 Karyawan</strong></div>
                                <div class="billing-example-row"><span>Karyawan aktif absen</span><strong>15 Karyawan</strong></div>
                                <div class="billing-example-row"><span>Karyawan berbayar</span><strong>10 Karyawan</strong> <span style="font-size:0.8rem;color:var(--gray-400)">(15 - 5)</span></div>
                                <div class="billing-example-divider"></div>
                                <div class="billing-example-row result"><span>Tagihan</span><strong>Rp{{ number_format(10 * $priceAttendanceVal, 0, ',', '.') }}</strong></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- SECTION 2: MULTI STORE --}}
            <div class="billing-section">
                <div class="billing-section-badge green">Multi Store</div>
                <h2>Tagihan Digabung, Dibayar Seluruhnya</h2>
                <p class="billing-section-intro">Jika Anda memiliki lebih dari satu store, tagihan dihitung per store lalu <strong>digabung menjadi satu total</strong>. Pembayaran wajib dilakukan seluruhnya, tidak bisa per store.</p>
                <div class="billing-formula-card">
                    <div class="billing-formula">
                        <div class="billing-formula-label">Total Tagihan</div>
                        <div class="billing-formula-text">Total = Tagihan Store 1 + Store 2 + ... + Store N</div>
                    </div>
                </div>
                <div class="billing-examples">
                    <h3>Contoh: 3 Store dalam 1 Akun</h3>
                    <div class="billing-store-breakdown">
                        <div class="billing-store-item">
                            <div class="billing-store-icon">🏪</div>
                            <div class="billing-store-info"><strong>Store A — Warung Kopi</strong><span>Omzet Rp3.000.000 → <strong>Rp30.000</strong></span></div>
                        </div>
                        <div class="billing-store-item">
                            <div class="billing-store-icon">🍜</div>
                            <div class="billing-store-info"><strong>Store B — Mie Ayam</strong><span>Omzet Rp5.900.000 → <strong>{{ $pricePromoFormatted }}</strong> (maks.)</span></div>
                        </div>
                        <div class="billing-store-item">
                            <div class="billing-store-icon">🍰</div>
                            <div class="billing-store-info"><strong>Store C — Bakery</strong><span>Omzet Rp800.000 → <strong>Rp8.000</strong></span></div>
                        </div>
                        <div class="billing-store-total"><span>Total Tagihan Bulan Ini</span><strong>{{ $totalMultiStoreFormatted }}</strong></div>
                    </div>
                </div>
            </div>

            {{-- SECTION 3: TIMELINE --}}
            <div class="billing-section">
                <div class="billing-section-badge orange">Alur Waktu</div>
                <h2>Dari Gratis, Tagihan Muncul di Bulan ke-5</h2>
                <p class="billing-section-intro">Store baru <strong>tidak perlu berlangganan</strong> selama belum ada transaksi. Setelah transaksi pertama muncul, Anda memiliki waktu hingga bulan ke-5 sebelum tagihan mulai dikenakan.</p>
                <div class="billing-timeline">
                    <div class="billing-timeline-item">
                        <div class="billing-timeline-dot green"></div><div class="billing-timeline-line"></div>
                        <div class="billing-timeline-content"><div class="billing-timeline-period">Bulan 1 — Transaksi Pertama</div><div class="billing-timeline-desc"><strong>Gratis.</strong> Store mulai digunakan dan transaksi pertama tercatat. Belum ada tagihan.</div></div>
                    </div>
                    <div class="billing-timeline-item">
                        <div class="billing-timeline-dot green"></div><div class="billing-timeline-line"></div>
                        <div class="billing-timeline-content"><div class="billing-timeline-period">Bulan 2 – 4</div><div class="billing-timeline-desc"><strong>Masa percobaan.</strong> Anda tetap bisa menggunakan semua fitur tanpa tagihan. Gunakan waktu ini untuk merasakan manfaat Sagansa.</div></div>
                    </div>
                    <div class="billing-timeline-item">
                        <div class="billing-timeline-dot warning"></div><div class="billing-timeline-line"></div>
                        <div class="billing-timeline-content"><div class="billing-timeline-period">Bulan 5 — Tagihan Pertama</div><div class="billing-timeline-desc"><strong>Tagihan mulai muncul.</strong> Perhitungan berdasarkan 1% omzet bulan sebelumnya. Tagihan harus dibayar <strong>sebelum tanggal 10</strong>.</div></div>
                    </div>
                    <div class="billing-timeline-item">
                        <div class="billing-timeline-dot danger"></div>
                        <div class="billing-timeline-content"><div class="billing-timeline-period">Melewati Tanggal 10</div><div class="billing-timeline-desc"><strong>Pembatasan Dashboard.</strong> Jika tagihan belum dibayar setelah tanggal 10, kasir POS & absensi karyawan di handphone tetap dapat digunakan 100% secara normal. Hanya akses ke data historis dan laporan keuangan di panel operasional (apps/ops) yang dibatasi sampai tagihan dilunasi.</div></div>
                    </div>
                </div>
            </div>

            {{-- SECTION 4: DEADLINE --}}
            <div class="billing-section">
                <div class="billing-section-badge red">Batas Waktu</div>
                <h2>Wajib Bayar Sebelum Tanggal 10</h2>
                <p class="billing-section-intro">Setiap bulan, tagihan harus dilunasi seluruhnya sebelum tanggal 10. Ini berlaku untuk semua store dalam akun Anda.</p>
                <div class="billing-calendar">
                    <div class="billing-calendar-header"><span>Ilustrasi Satu Bulan</span></div>
                    <div class="billing-calendar-body">
                        <div class="billing-calendar-period safe"><div class="billing-calendar-label"><strong>Tanggal 1 – Akhir Bulan</strong></div><div class="billing-calendar-desc">Periode penjualan berjalan. Omzet dicatat untuk perhitungan tagihan bulan berikutnya.</div></div>
                        <div class="billing-calendar-arrow">↓</div>
                        <div class="billing-calendar-period bill"><div class="billing-calendar-label"><strong>Awal Bulan Berikutnya</strong></div><div class="billing-calendar-desc">Tagihan bulan lalu muncul. Anda bisa melihat rincian perhitungan di dashboard.</div></div>
                        <div class="billing-calendar-arrow">↓</div>
                        <div class="billing-calendar-period deadline"><div class="billing-calendar-label"><strong>⚠️ Batas Tanggal 10</strong></div><div class="billing-calendar-desc">Tagihan wajib sudah dibayar seluruhnya sebelum tanggal 10. Jika melewati, akses riwayat transaksi & laporan keuangan di panel operasional (apps/ops) akan dikunci secara otomatis.</div></div>
                    </div>
                </div>
            </div>

            {{-- SECTION 5: SUSPEND --}}
            <div class="billing-section">
                <div class="billing-section-badge" style="background: rgba(239,68,68,0.1); color: var(--danger);">Konsekuensi</div>
                <h2>Terlambat Bayar = Pembatasan Akses Dashboard</h2>
                <p class="billing-section-intro">Jika tagihan belum dilunasi setelah tanggal 10, akses ke panel operasional (apps/ops) akan dibatasi. Namun, operasional kasir & absensi karyawan di lapangan dijamin <strong>tetap berjalan normal 100%</strong>.</p>
                <div class="billing-warning-box">
                    <div class="billing-warning-icon">🚫</div>
                    <div class="billing-warning-content">
                        <h4>Fungsi yang Dibatasi (Dashboard apps/ops)</h4>
                        <ul>
                            <li>Akses melihat laporan keuangan bulanan & grafik analitik dikunci</li>
                            <li>Akses mengunduh laporan absensi Excel & riwayat transaksi ditangguhkan</li>
                            <li>Data Anda tetap tersimpan sangat aman dan tidak akan hilang</li>
                        </ul>
                    </div>
                </div>
                <div class="billing-warning-box success" style="background: #eff6ff; border-color: #bfdbfe;">
                    <div class="billing-warning-icon">📱</div>
                    <div class="billing-warning-content">
                        <h4 style="color: var(--primary);">Fungsi yang Tetap Bekerja Normal (Operasional Lapangan)</h4>
                        <ul>
                            <li><strong>Aplikasi Kasir POS</strong> di toko tetap bisa memproses transaksi & menerima pembayaran</li>
                            <li><strong>Aplikasi Absensi Karyawan</strong> tetap dapat merekam kehadiran, lokasi GPS, & foto selfie</li>
                            <li>Data absensi & transaksi terekam offline/lokal dan otomatis tersinkron setelah status aktif kembali</li>
                        </ul>
                    </div>
                </div>
                <div class="billing-warning-box success">
                    <div class="billing-warning-icon">✅</div>
                    <div class="billing-warning-content">
                        <h4>Setelah Melunasi Tagihan</h4>
                        <ul>
                            <li>Akses dashboard langsung terbuka kembali seketika secara otomatis</li>
                            <li>Semua data transaksi & kehadiran yang terekam selama masa pembatasan langsung sinkron dan muncul utuh</li>
                        </ul>
                    </div>
                </div>
            </div>

            {{-- SECTION 6: RINGKASAN --}}
            <div class="billing-section">
                <div class="billing-section-badge purple">Ringkasan</div>
                <h2>5 Poin Penting</h2>
                <div class="billing-summary-grid">
                    <div class="billing-summary-card"><div class="billing-summary-number">1</div><h4>Gratis untuk Store Baru</h4><p>Store baru tanpa transaksi tidak dikenakan biaya apapun.</p></div>
                    <div class="billing-summary-card"><div class="billing-summary-number">2</div><h4>Skema Tagihan Adil</h4><p>POS 1% omzet (maks Rp59k) + Attendance Gratis; atau Attendance Saja Rp5k/karyawan aktif setelah 5 karyawan gratis.</p></div>
                    <div class="billing-summary-card"><div class="billing-summary-number">3</div><h4>Tagihan Mulai Bulan ke-5</h4><p>Setelah transaksi pertama, Anda punya waktu hingga bulan ke-5.</p></div>
                    <div class="billing-summary-card"><div class="billing-summary-number">4</div><h4>Bayar Sebelum Tanggal 10</h4><p>Total tagihan wajib dibayar seluruhnya, tidak bisa per store.</p></div>
                    <div class="billing-summary-card"><div class="billing-summary-number">5</div><h4>Operasional Tetap Aman</h4><p>Terlambat bayar hanya membatasi dashboard. Kasir POS & Absensi Karyawan tetap berjalan normal 100%.</p></div>
                </div>
            </div>

            <div class="billing-cta">
                <p>Masih punya pertanyaan tentang tagihan?</p>
                <a href="https://wa.me/628111923572" target="_blank" class="btn btn-primary">💬 Hubungi Kami via WhatsApp <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg></a>
            </div>
        </div>
    </div>
</div>
@endsection