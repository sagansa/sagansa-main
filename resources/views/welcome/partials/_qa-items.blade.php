@php
    $priceNormalVal = (int) \App\Models\Setting::get('price_normal', '99000');
    $pricePromoVal = \App\Models\Setting::get('price_promo', '59000');
    $pricePromoVal = $pricePromoVal !== null && $pricePromoVal !== '' ? (int)$pricePromoVal : null;
    $priceAttendanceVal = (int) \App\Models\Setting::get('price_attendance_additional', '1500');

    $priceNormalFormatted = 'Rp' . number_format($priceNormalVal, 0, ',', '.');
    $pricePromoFormatted = $pricePromoVal !== null ? 'Rp' . number_format($pricePromoVal, 0, ',', '.') : $priceNormalFormatted;
    $priceAttendanceFormatted = 'Rp' . number_format($priceAttendanceVal, 0, ',', '.');
@endphp
<div class="qa-item animate-in" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question" role="listitem">
    <div class="qa-question" role="heading" aria-level="3" itemprop="name">
        <h3>Apa itu Sagansa POS dan untuk siapa?</h3>
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M6 9l6 6 6-6"/></svg>
    </div>
    <div class="qa-answer" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
        <div class="qa-answer-inner">
            <p itemprop="text">Sagansa POS adalah aplikasi kasir (Point of Sale) modern yang dirancang untuk UMKM, restoran, cafe, foodcourt, dan bisnis F&B lainnya di Indonesia. Sagansa juga terintegrasi dengan sistem absensi karyawan (Attendance), sehingga Anda bisa mengelola transaksi dan SDM dalam satu platform.</p>
        </div>
    </div>
</div>

<div class="qa-item animate-in" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question" role="listitem">
    <div class="qa-question" role="heading" aria-level="3" itemprop="name">
        <h3>Bagaimana sistem berlangganan Sagansa bekerja?</h3>
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M6 9l6 6 6-6"/></svg>
    </div>
    <div class="qa-answer" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
        <div class="qa-answer-inner">
            <p itemprop="text">Aplikasi kasir POS dan absensi karyawan di handphone (mobile) dapat digunakan <strong>gratis & bebas 100% selamanya</strong>.<br>
            • <strong>Mobile POS & Absensi HP</strong>: Gratis selamanya tanpa potongan omzet.<br>
            • <strong>Panel Web Admin</strong>: Diwajibkan berlangganan ({{ $pricePromoFormatted }}/store/bulan) untuk membuka laporan keuangan & analitik bisnis. Pengelolaan presensi di admin dihitung {{ $priceAttendanceFormatted }} per user aktif presensi per bulan.</p>
        </div>
    </div>
</div>

<div class="qa-item animate-in" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question" role="listitem">
    <div class="qa-question" role="heading" aria-level="3" itemprop="name">
        <h3>Apakah ada biaya awal atau biaya setup?</h3>
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M6 9l6 6 6-6"/></svg>
    </div>
    <div class="qa-answer" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
        <div class="qa-answer-inner">
            <p itemprop="text">Tidak ada. Sagansa bebas digunakan di mobile tanpa biaya pendaftaran (setup fee) dan tanpa potongan omzet. Anda hanya membayar biaya berlangganan flat jika ingin membuka akses ke Panel Web Admin.</p>
        </div>
    </div>
</div>

<div class="qa-item animate-in" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question" role="listitem">
    <div class="qa-question" role="heading" aria-level="3" itemprop="name">
        <h3>Bagaimana jika belum berlangganan admin? Apakah aplikasi kasir atau absen akan terkunci?</h3>
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M6 9l6 6 6-6"/></svg>
    </div>
    <div class="qa-answer" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
        <div class="qa-answer-inner">
            <p itemprop="text">Jangan khawatir. <strong>Aplikasi kasir POS di toko dan aplikasi absensi karyawan di handphone tetap dapat berjalan secara normal tanpa gangguan</strong>. Operasional bisnis Anda tidak akan terhenti. Batasan hanya berlaku pada akses ke Panel Web Admin (apps/ops) untuk melihat data historis dan laporan keuangan, yang akan langsung terbuka seketika setelah berlangganan diaktifkan.</p>
        </div>
    </div>
</div>

<div class="qa-item animate-in" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question" role="listitem">
    <div class="qa-question" role="heading" aria-level="3" itemprop="name">
        <h3>Channel online apa saja yang didukung?</h3>
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M6 9l6 6 6-6"/></svg>
    </div>
    <div class="qa-answer" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
        <div class="qa-answer-inner">
            <p itemprop="text">Sagansa mendukung pemisahan channel online termasuk GoFood, ShopeeFood, dan GrabFood. Setiap order dari channel online akan tercatat secara terpisah, sehingga laporan keuangan Anda lebih akurat dan mudah di-rekonciliasi.</p>
        </div>
    </div>
</div>

<div class="qa-item animate-in" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question" role="listitem">
    <div class="qa-question" role="heading" aria-level="3" itemprop="name">
        <h3>Apakah Sagansa mendukung pembayaran QRIS?</h3>
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M6 9l6 6 6-6"/></svg>
    </div>
    <div class="qa-answer" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
        <div class="qa-answer-inner">
            <p itemprop="text">Ya! Sagansa mendukung QRIS dengan nominal otomatis. Pelanggan cukup scan QR code dan nominal pembayaran akan sesuai dengan total tagihan — praktis, cepat, dan tanpa risiko kesalahan input.</p>
        </div>
    </div>
</div>

<div class="qa-item animate-in" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question" role="listitem">
    <div class="qa-question" role="heading" aria-level="3" itemprop="name">
        <h3>Bagaimana cara mulai menggunakan Sagansa POS?</h3>
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M6 9l6 6 6-6"/></svg>
    </div>
    <div class="qa-answer" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
        <div class="qa-answer-inner">
            <p itemprop="text">Cukup klik tombol "Mulai Gratis" atau daftar langsung di ops.sagansa.id. Setelah membuat akun, Anda bisa langsung mengatur store, menambahkan menu produk, dan mulai bertransaksi. Jika butuh bantuan, tim kami siap membantu via WhatsApp.</p>
        </div>
    </div>
</div>

<div class="qa-item animate-in" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question" role="listitem">
    <div class="qa-question" role="heading" aria-level="3" itemprop="name">
        <h3>Apakah jumlah user dibatasi?</h3>
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M6 9l6 6 6-6"/></svg>
    </div>
    <div class="qa-answer" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
        <div class="qa-answer-inner">
            <p itemprop="text">Tidak. Sagansa tidak membatasi jumlah user per store. Anda bisa menambahkan kasir, manajer, dan staf lainnya tanpa biaya tambahan. Setiap user dapat diatur hak aksesnya sesuai peran masing-masing.</p>
        </div>
    </div>
</div>

<div class="qa-item animate-in" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question" role="listitem">
    <div class="qa-question" role="heading" aria-level="3" itemprop="name">
        <h3>Apakah Sagansa cocok untuk foodcourt?</h3>
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M6 9l6 6 6-6"/></svg>
    </div>
    <div class="qa-answer" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
        <div class="qa-answer-inner">
            <p itemprop="text">Ya! Sagansa dirancang untuk mendukung operasional foodcourt. Anda bisa mengelola multiple tenant dalam satu platform, dengan laporan terpisah per tenant dan konsolidasi untuk pengelola foodcourt.</p>
        </div>
    </div>
</div>