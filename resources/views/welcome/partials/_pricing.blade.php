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
@endphp
<section class="section pricing-highlight" id="pricing">
    <div class="section-inner">
        <div class="section-header">
            <div class="section-label">💰 Model Berlangganan Transparan</div>
            <h2 class="section-title">Aplikasi Mobile Gratis, Berlangganan Khusus Admin</h2>
            <p class="section-desc">Kasir POS dan Absensi karyawan di handphone gratis & bebas selamanya. Berlangganan hanya diperlukan untuk membuka bagian Panel Admin (Web Ops).</p>
        </div>

        <style>
            .pricing-grid {
                display: grid;
                grid-template-columns: repeat(2, 1fr);
                gap: 32px;
                max-width: 960px;
                margin: 40px auto 0;
            }
            .pricing-card-custom {
                background: rgba(15, 23, 42, 0.65);
                backdrop-filter: blur(24px);
                -webkit-backdrop-filter: blur(24px);
                border: 1px solid rgba(139, 92, 246, 0.25);
                border-radius: 28px;
                padding: 40px;
                display: flex;
                flex-direction: column;
                justify-content: space-between;
                text-align: left;
                box-shadow: 0 30px 60px -15px rgba(0,0,0,0.5), 0 0 40px rgba(139, 92, 246, 0.15);
                transition: transform 0.3s ease, border-color 0.3s ease;
            }
            .pricing-card-custom:hover {
                transform: translateY(-4px);
                border-color: rgba(139, 92, 246, 0.5);
            }
            .pricing-card-custom.featured {
                border-color: rgba(245, 158, 11, 0.45); /* Amber outline */
                box-shadow: 0 30px 60px -15px rgba(0,0,0,0.5), 0 0 40px rgba(245, 158, 11, 0.18);
                position: relative;
            }
            .pricing-card-custom.featured .pricing-promo-badge-custom {
                position: absolute;
                top: -16px;
                left: 40px;
                background: linear-gradient(135deg, #fbbf24, #d97706);
                color: #fff;
                font-size: 0.75rem;
                font-weight: 800;
                padding: 6px 16px;
                border-radius: 100px;
                text-transform: uppercase;
                letter-spacing: 0.04em;
                box-shadow: 0 0 15px rgba(245, 158, 11, 0.4);
                border: 1px solid rgba(255,255,255,0.15);
            }
            .pricing-card-custom h3 {
                font-size: 1.4rem;
                color: #fff;
                margin-top: 10px;
                margin-bottom: 8px;
                font-weight: 800;
                letter-spacing: -0.01em;
            }
            .pricing-card-custom .pricing-desc {
                font-size: 0.9rem;
                color: rgba(255,255,255,0.7);
                line-height: 1.55;
                margin-bottom: 24px;
            }
            .pricing-card-custom .pricing-amount-custom {
                display: flex;
                align-items: baseline;
                gap: 8px;
                margin: 20px 0;
            }
            .pricing-card-custom .price-glow-custom {
                font-size: 2.2rem;
                font-weight: 900;
                color: #fff;
            }
            .pricing-card-custom.featured .price-glow-custom {
                background: linear-gradient(135deg, #fff, #fbb824);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
            }
            .pricing-card-custom .price-original-custom {
                text-decoration: line-through;
                font-size: 1.2rem;
                color: rgba(255,255,255,0.35);
            }
            .pricing-card-custom .price-unit-custom {
                font-size: 0.85rem;
                color: rgba(255,255,255,0.5);
            }
            .pricing-card-custom .pricing-features-list {
                margin: 24px 0;
                display: flex;
                flex-direction: column;
                gap: 12px;
                list-style: none;
                padding: 0;
            }
            .pricing-card-custom .pricing-feature-item {
                display: flex;
                align-items: flex-start;
                gap: 10px;
                font-size: 0.9rem;
                color: rgba(255,255,255,0.85);
                line-height: 1.45;
            }
            .pricing-card-custom .pricing-feature-item svg {
                width: 18px;
                height: 18px;
                flex-shrink: 0;
                color: #34d399;
                margin-top: 1px;
            }
            .pricing-card-custom .btn-action {
                margin-top: 24px;
            }
            @media (max-width: 820px) {
                .pricing-grid {
                    grid-template-columns: 1fr;
                    max-width: 480px;
                    gap: 36px;
                }
                .pricing-card-custom.featured .pricing-promo-badge-custom {
                    left: 24px;
                }
            }
        </style>

        <div class="pricing-grid">
            <!-- Paket 1: POS & Attendance Mobile Gratis -->
            <div class="pricing-card-custom featured">
                <div class="pricing-promo-badge-custom">🔥 100% Gratis Selamanya</div>
                <h3>Mobile POS & Absensi HP</h3>
                <p class="pricing-desc">Aplikasi kasir POS di toko dan absensi karyawan di HP bebas digunakan <strong>gratis selamanya</strong> tanpa biaya pendaftaran & tanpa potongan omzet.</p>
                <div class="pricing-amount-custom">
                    <span class="price-glow-custom">Gratis</span>
                    <span class="price-unit-custom">(Rp0 / selamanya)</span>
                </div>
                <p style="font-size: 0.8rem; color: rgba(255,255,255,0.5); margin-top: -16px; margin-bottom: 20px;">
                    Operasional kasir & absensi karyawan di toko dijamin selalu berjalan 100% normal.
                </p>
                <ul class="pricing-features-list">
                    <li class="pricing-feature-item">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M20 6L9 17l-5-5"/></svg>
                        Aplikasi Kasir POS lengkap di HP/Tablet Android & iOS
                    </li>
                    <li class="pricing-feature-item">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M20 6L9 17l-5-5"/></svg>
                        Absensi karyawan (GPS & foto selfie) bebas sepuasnya
                    </li>
                    <li class="pricing-feature-item">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M20 6L9 17l-5-5"/></svg>
                        Tanpa biaya pendaftaran, tanpa potongan omzet
                    </li>
                    <li class="pricing-feature-item">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M20 6L9 17l-5-5"/></svg>
                        Dukungan pembayaran QRIS otomatis nominal & e-wallet
                    </li>
                    <li class="pricing-feature-item">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M20 6L9 17l-5-5"/></svg>
                        Cetak struk kasir, manajemen stok lokal, & multi-channel
                    </li>
                </ul>
                <a href="https://ops.sagansa.id/id/auth/register" target="_blank" class="btn btn-primary btn-action">
                    Mulai Pakai Gratis Kapan Saja
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
            </div>

            <!-- Paket 2: Berlangganan Panel Admin Web Ops -->
            <div class="pricing-card-custom">
                <h3 style="margin-top: 0;">Akses Panel Web Admin</h3>
                <p class="pricing-desc">Membuka bagian admin (Web Ops) untuk melihat laporan keuangan bulanan, analisa penjualan, & mengunduh rekap data.</p>
                <div class="pricing-amount-custom">
                    @if($isPromoActive)
                        <span class="price-original-custom">{{ $priceNormalFormatted }}</span>
                        <span class="price-glow-custom" style="background: linear-gradient(135deg, #fff, #a78bfa); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">{{ $pricePromoFormatted }}</span>
                    @else
                        <span class="price-glow-custom" style="background: linear-gradient(135deg, #fff, #a78bfa); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">{{ $priceNormalFormatted }}</span>
                    @endif
                    <span class="price-unit-custom">/ store / bulan</span>
                </div>
                <p style="font-size: 0.8rem; color: rgba(255,255,255,0.5); margin-top: -16px; margin-bottom: 20px;">
                    Fitur presensi admin dihitung <strong>{{ $priceAttendanceFormatted }} / user aktif presensi / bulan</strong>.
                </p>
                <ul class="pricing-features-list">
                    <li class="pricing-feature-item">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M20 6L9 17l-5-5"/></svg>
                        Akses dashboard web operasional (apps/ops) lengkap
                    </li>
                    <li class="pricing-feature-item">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M20 6L9 17l-5-5"/></svg>
                        Laporan keuangan, grafik omzet, & analisis penjualan
                    </li>
                    <li class="pricing-feature-item">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M20 6L9 17l-5-5"/></svg>
                        Kelola modul presensi & ekspor laporan Excel ({{ $priceAttendanceFormatted }}/user)
                    </li>
                    <li class="pricing-feature-item">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M20 6L9 17l-5-5"/></svg>
                        Manajemen katalog produk, inventaris stok, & supplier
                    </li>
                    <li class="pricing-feature-item">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M20 6L9 17l-5-5"/></svg>
                        Dukungan prioritas & manajemen multi-store terpusat
                    </li>
                </ul>
                <a href="https://ops.sagansa.id/id/auth/register" target="_blank" class="btn btn-secondary btn-action" style="background: transparent; color: #fff; border: 1px solid rgba(255,255,255,0.25);">
                    Buka Akses Admin
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
            </div>
        </div>

        <div style="text-align: center; margin-top: 36px;">
            <a href="/cara-perhitungan" class="btn btn-white" style="background: transparent; color: rgba(255,255,255,0.9); border: 1px solid rgba(255,255,255,0.2); display: inline-flex;">
                💡 Lihat Rincian Berlangganan &amp; Akses Admin
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>
        </div>
    </div>
</section>