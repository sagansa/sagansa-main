@php
    $pricePromoVal = \App\Models\Setting::get('price_promo', '59000');
    $pricePercentage = \App\Models\Setting::get('price_percentage', '1');
    $pricePromoFormatted = 'Rp' . number_format((int)$pricePromoVal, 0, ',', '.');
    $priceAttendanceVal = \App\Models\Setting::get('price_attendance_additional', '2000');
    $priceAttendanceFormatted = 'Rp' . number_format((int)$priceAttendanceVal, 0, ',', '.');
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
        <h3>Bagaimana sistem billing Sagansa bekerja?</h3>
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M6 9l6 6 6-6"/></svg>
    </div>
    <div class="qa-answer" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
        <div class="qa-answer-inner">
            <p itemprop="text">Sagansa menggunakan sistem "Pakai dulu, bayar kemudian" — tanpa biaya awal (setup fee). Kami memiliki dua pilihan skema tagihan:<br>
            • <strong>POS + Attendance</strong>: Dihitung {{ $pricePercentage }}% dari omzet store Anda (maksimal {{ $pricePromoFormatted }}/store/bulan selama promo), dan fitur absensi karyawan (Attendance) <strong>gratis sepuasnya</strong> tanpa batas.<br>
            • <strong>Attendance Saja</strong>: Gratis untuk 5 karyawan aktif pertama. Mulai karyawan ke-6, hanya dikenakan {{ $priceAttendanceFormatted }} per karyawan aktif per bulan (hanya membayar karyawan yang melakukan absen pada bulan itu).</p>
        </div>
    </div>
</div>

<div class="qa-item animate-in" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question" role="listitem">
    <div class="qa-question" role="heading" aria-level="3" itemprop="name">
        <h3>Apakah ada biaya awal atau biaya langganan tetap?</h3>
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M6 9l6 6 6-6"/></svg>
    </div>
    <div class="qa-answer" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
        <div class="qa-answer-inner">
            <p itemprop="text">Tidak ada. Sagansa sepenuhnya gratis untuk dimulai — tanpa biaya setup, tanpa biaya langganan tetap, dan tanpa kontrak. Anda hanya dikenakan tagihan pascabayar (postpaid) berdasarkan penggunaan nyata Anda (POS berdasarkan omzet, atau Attendance-only berdasarkan jumlah karyawan aktif).</p>
        </div>
    </div>
</div>

<div class="qa-item animate-in" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question" role="listitem">
    <div class="qa-question" role="heading" aria-level="3" itemprop="name">
        <h3>Bagaimana jika saya terlambat membayar tagihan? Apakah aplikasi kasir atau absen akan terkunci?</h3>
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M6 9l6 6 6-6"/></svg>
    </div>
    <div class="qa-answer" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
        <div class="qa-answer-inner">
            <p itemprop="text">Jangan khawatir. Jika Anda terlambat melakukan pembayaran, <strong>aplikasi kasir POS di toko dan aplikasi absensi karyawan di handphone tetap dapat berjalan secara normal tanpa gangguan</strong>. Operasional bisnis Anda tidak akan terhenti. Batasan hanya berlaku pada akses ke dashboard operasional (apps/ops) untuk melihat data historis dan laporan keuangan, yang akan langsung terbuka kembali segera setelah tagihan dilunasi.</p>
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