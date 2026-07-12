@extends('layouts.app')

@section('title', 'Beta Tester Sagansa — Jadi Yang Pertama Mencoba POS & Attendance')
@section('description', 'Daftar jadi Beta Tester Sagansa POS & Sagansa Attendance. Dapatkan akses awal sebelum rilis resmi di Google Play Store. Gratis selama masa pengujian.')
@section('keywords', 'beta tester, sagansa beta, early access, uji coba aplikasi, pos beta, attendance beta')
@section('canonical', 'https://sagansa.id/beta')

@section('head')
<style>
    .beta-hero {
        background: linear-gradient(170deg, #0f172a 0%, #1e1b4b 60%, #312e81 100%);
        color: #fff;
        padding: 140px 24px 64px;
        text-align: center;
        position: relative;
        overflow: hidden;
    }
    .beta-hero::before {
        content: '';
        position: absolute;
        top: -25%;
        left: -10%;
        width: 500px;
        height: 500px;
        background: radial-gradient(circle, rgba(139, 92, 246, 0.25) 0%, transparent 70%);
        border-radius: 50%;
    }
    .beta-hero::after {
        content: '';
        position: absolute;
        bottom: -25%;
        right: -10%;
        width: 500px;
        height: 500px;
        background: radial-gradient(circle, rgba(37, 99, 235, 0.2) 0%, transparent 70%);
        border-radius: 50%;
    }
    .beta-hero-inner {
        max-width: 720px;
        margin: 0 auto;
        position: relative;
        z-index: 1;
    }
    .beta-hero-badge {
        display: inline-block;
        font-size: 0.78rem;
        font-weight: 700;
        padding: 7px 18px;
        border-radius: 100px;
        background: linear-gradient(135deg, #fbbf24, #f59e0b);
        color: #fff;
        margin-bottom: 20px;
        letter-spacing: 0.04em;
        box-shadow: 0 4px 14px rgba(245, 158, 11, 0.4);
    }
    .beta-hero h1 {
        font-size: 2.8rem;
        font-weight: 900;
        margin-bottom: 16px;
        line-height: 1.15;
        letter-spacing: -0.02em;
    }
    .beta-hero p {
        font-size: 1.15rem;
        color: rgba(255, 255, 255, 0.8);
        line-height: 1.6;
        margin-bottom: 32px;
    }
    .beta-hero-apps {
        display: flex;
        justify-content: center;
        gap: 16px;
        flex-wrap: wrap;
        margin-top: 8px;
    }
    .beta-hero-app {
        display: flex;
        align-items: center;
        gap: 10px;
        background: rgba(255, 255, 255, 0.08);
        border: 1px solid rgba(255, 255, 255, 0.15);
        border-radius: 14px;
        padding: 12px 20px;
        font-size: 0.95rem;
        font-weight: 600;
        backdrop-filter: blur(10px);
    }

    .beta-section {
        padding: 64px 24px;
    }
    .beta-section-inner {
        max-width: 960px;
        margin: 0 auto;
    }

    /* Form card */
    .beta-form-card {
        max-width: 560px;
        margin: 0 auto;
        background: #fff;
        border-radius: 24px;
        padding: 40px;
        box-shadow: 0 25px 60px rgba(0, 0, 0, 0.15);
        position: relative;
        z-index: 2;
        margin-top: -48px;
    }
    .beta-form-card h2 {
        font-size: 1.5rem;
        font-weight: 800;
        color: var(--gray-900);
        margin-bottom: 8px;
        text-align: center;
    }
    .beta-form-card .form-sub {
        font-size: 0.95rem;
        color: var(--gray-500);
        text-align: center;
        margin-bottom: 28px;
    }
    .beta-form-group {
        margin-bottom: 20px;
    }
    .beta-form-group label {
        display: block;
        font-size: 0.85rem;
        font-weight: 600;
        color: var(--gray-700);
        margin-bottom: 8px;
    }
    .beta-email-row {
        display: flex;
        gap: 10px;
    }
    .beta-email-row input {
        flex: 1;
        padding: 14px 18px;
        border: 1px solid var(--gray-200);
        border-radius: 12px;
        font-size: 0.95rem;
        font-family: inherit;
        transition: border 0.15s;
    }
    .beta-email-row input:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
    }
    .beta-submit-btn {
        padding: 14px 28px;
        background: linear-gradient(135deg, var(--primary), var(--accent2));
        color: #fff;
        border: none;
        border-radius: 12px;
        font-size: 0.95rem;
        font-weight: 700;
        cursor: pointer;
        white-space: nowrap;
        transition: opacity 0.15s;
    }
    .beta-submit-btn:hover {
        opacity: 0.92;
    }
    /* Honeypot — tersembunyi dari user, terlihat oleh bot */
    .beta-honeypot {
        position: absolute;
        left: -9999px;
        top: -9999px;
        opacity: 0;
        pointer-events: none;
    }
    .beta-app-choice {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
    }
    .beta-app-option {
        flex: 1;
        min-width: 130px;
        position: relative;
    }
    .beta-app-option input {
        position: absolute;
        opacity: 0;
        width: 0;
        height: 0;
    }
    .beta-app-option label {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 6px;
        padding: 16px 12px;
        border: 2px solid var(--gray-200);
        border-radius: 14px;
        cursor: pointer;
        transition: all 0.15s;
        text-align: center;
        font-size: 0.85rem;
        font-weight: 600;
        color: var(--gray-600);
        margin: 0;
    }
    .beta-app-option label .emoji { font-size: 1.6rem; }
    .beta-app-option input:checked + label {
        border-color: var(--primary);
        background: #eff6ff;
        color: var(--primary);
    }
    .beta-form-note {
        font-size: 0.78rem;
        color: var(--gray-400);
        text-align: center;
        margin-top: 16px;
        line-height: 1.5;
    }
    .beta-form-note a { color: var(--primary); }

    /* Success / error message */
    .beta-alert {
        padding: 16px 20px;
        border-radius: 12px;
        margin-bottom: 24px;
        font-size: 0.9rem;
        font-weight: 500;
        line-height: 1.5;
    }
    .beta-alert.success {
        background: #ecfdf5;
        color: #065f46;
        border: 1px solid #a7f3d0;
    }
    .beta-alert.error {
        background: #fef2f2;
        color: #991b1b;
        border: 1px solid #fecaca;
    }

    /* Timeline Steps */
    .testing-workflow {
        background: #fff;
        border-radius: 24px;
        border: 1px solid var(--gray-200);
        padding: 48px 32px;
        margin-top: 48px;
    }
    .testing-workflow h3 {
        text-align: center;
        font-size: 1.5rem;
        font-weight: 800;
        margin-bottom: 12px;
    }
    .testing-workflow .workflow-subtitle {
        text-align: center;
        color: var(--gray-500);
        margin-bottom: 40px;
        font-size: 0.95rem;
    }
    .steps-timeline {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 24px;
        position: relative;
    }
    .step-card {
        background: var(--gray-50);
        border: 1px solid var(--gray-200);
        border-radius: 16px;
        padding: 24px;
        position: relative;
        transition: all 0.25s;
    }
    .step-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.05);
        border-color: var(--primary);
    }
    .step-num {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        background: var(--primary);
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 800;
        font-size: 1rem;
        margin-bottom: 16px;
    }
    .step-card.recommend {
        border-color: #fbbf24;
        background: #fffdf5;
    }
    .step-card.recommend .step-num {
        background: #fbbf24;
    }
    .recommend-badge {
        position: absolute;
        top: 12px;
        right: 12px;
        font-size: 0.7rem;
        font-weight: 800;
        background: #fef3c7;
        color: #b45309;
        padding: 2px 8px;
        border-radius: 100px;
        text-transform: uppercase;
    }
    .step-card h4 {
        font-size: 1rem;
        font-weight: 700;
        margin-bottom: 8px;
        color: var(--gray-900);
    }
    .step-card p {
        font-size: 0.85rem;
        color: var(--gray-500);
        line-height: 1.5;
        margin-bottom: 12px;
    }
    .step-btn {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-size: 0.8rem;
        font-weight: 700;
        color: var(--primary);
        text-decoration: none;
        padding: 6px 12px;
        background: #eff6ff;
        border-radius: 8px;
        transition: background 0.15s;
    }
    .step-btn:hover {
        background: #dbeafe;
    }
    .step-btn.gold {
        color: #b45309;
        background: #fef3c7;
    }
    .step-btn.gold:hover {
        background: #fde68a;
    }

    /* Benefits grid */
    .beta-benefits {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 24px;
        margin-top: 32px;
    }
    .beta-benefit {
        text-align: center;
    }
    .beta-benefit-icon {
        width: 64px;
        height: 64px;
        border-radius: 18px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.8rem;
        margin: 0 auto 16px;
    }
    .beta-benefit h3 {
        font-size: 1.05rem;
        font-weight: 700;
        color: var(--gray-900);
        margin-bottom: 8px;
    }
    .beta-benefit p {
        font-size: 0.88rem;
        color: var(--gray-500);
        line-height: 1.55;
    }

    /* FAQ */
    .beta-faq {
        max-width: 720px;
        margin: 0 auto;
    }
    .beta-faq-item {
        border-bottom: 1px solid var(--gray-200);
        padding: 20px 0;
    }
    .beta-faq-item h4 {
        font-size: 1.05rem;
        font-weight: 700;
        color: var(--gray-900);
        margin-bottom: 8px;
    }
    .beta-faq-item p {
        font-size: 0.92rem;
        color: var(--gray-500);
        line-height: 1.6;
    }

    .beta-disclaimer {
        max-width: 720px;
        margin: 48px auto 0;
        padding: 24px;
        background: #fff7ed;
        border: 1px solid #fed7aa;
        border-radius: 14px;
        font-size: 0.85rem;
        color: #9a3412;
        line-height: 1.6;
    }

    @media (max-width: 900px) {
        .steps-timeline { grid-template-columns: 1fr; }
        .beta-hero h1 { font-size: 2rem; }
        .beta-form-card { padding: 28px 20px; }
        .beta-email-row { flex-direction: column; }
        .beta-benefits { grid-template-columns: 1fr; }
    }
</style>
@endsection

@section('content')
{{-- Hero --}}
<div class="beta-hero">
    <div class="beta-hero-inner">
        <span class="beta-hero-badge">🚀 PROGRAM BETA</span>
        <h1>Jadi Beta Tester Sagansa</h1>
        <p>Sagansa POS &amp; Sagansa Attendance sudah siap di Google Play Console! Jadilah bagian dari penguji resmi kami dan coba kecanggihan fiturnya sebelum diluncurkan ke publik secara luas.</p>
        <div class="beta-hero-apps">
            <div class="beta-hero-app">🛒 Sagansa POS</div>
            <div class="beta-hero-app">📋 Sagansa Attendance</div>
        </div>
    </div>
</div>

{{-- Form --}}
<div class="beta-section" style="background: linear-gradient(180deg, #f5f3ff 0%, #fff 100%); padding-top: 0;">
    <div class="beta-form-card">
        @if(session('success'))
            <div class="beta-alert success">
                {!! session('success') !!}
            </div>
        @endif
        @if(session('error'))
            <div class="beta-alert error">{{ session('error') }}</div>
        @endif

        <h2>Daftar Penguji Resmi</h2>
        <p class="form-sub">Masukkan email akun Google Play Anda untuk kami daftarkan ke daftar whitelist Google Console.</p>

        <form method="POST" action="{{ route('beta.store') }}">
            @csrf
            {{-- Honeypot anti-spam --}}
            <div class="beta-honeypot" aria-hidden="true">
                <label>Website (jangan isi)<input type="text" name="website" tabindex="-1" autocomplete="off"></label>
            </div>

            <div class="beta-form-group">
                <label for="email">Alamat Email Google Play *</label>
                <div class="beta-email-row">
                    <input type="email" id="email" name="email" required
                           value="{{ old('email') }}" placeholder="nama@gmail.com" autocomplete="email">
                    <button type="submit" class="beta-submit-btn">Daftar</button>
                </div>
                @error('email') <div style="color: var(--danger); font-size: 0.8rem; margin-top: 6px;">{{ $message }}</div> @enderror
            </div>

            <div class="beta-form-group">
                <label>Aplikasi yang Ingin Diuji</label>
                <div class="beta-app-choice">
                    <div class="beta-app-option">
                        <input type="radio" id="app-both" name="app" value="both" @checked(old('app', 'both') === 'both')>
                        <label for="app-both"><span class="emoji">🚀</span> Keduanya</label>
                    </div>
                    <div class="beta-app-option">
                        <input type="radio" id="app-pos" name="app" value="pos" @checked(old('app') === 'pos')>
                        <label for="app-pos"><span class="emoji">🛒</span> POS</label>
                    </div>
                    <div class="beta-app-option">
                        <input type="radio" id="app-attendance" name="app" value="attendance" @checked(old('app') === 'attendance')>
                        <label for="app-attendance"><span class="emoji">📋</span> Attendance</label>
                    </div>
                </div>
            </div>

            <p class="beta-form-note">
                Sesuai dengan ketentuan Google Play Store, penguji diharuskan untuk aktif menguji dan membiarkan aplikasi terinstal selama **14 hari berturut-turut**.
            </p>
        </form>
    </div>

    <!-- Timeline Closed Testing -->
    <div class="beta-section-inner">
        <div class="testing-workflow">
            <h3>4 Langkah Mudah Memulai Pengujian</h3>
            <p class="workflow-subtitle">Ikuti langkah-langkah di bawah ini agar Anda terdaftar sebagai penguji sah sesuai ketentuan Google Play.</p>
            
            <div class="steps-timeline">
                <!-- Step 1 -->
                <div class="step-card">
                    <div class="step-num">1</div>
                    <h4>Daftar Email</h4>
                    <p>Isi formulir pendaftaran di atas menggunakan email yang Anda gunakan untuk login di Google Play Store perangkat Anda.</p>
                </div>

                <!-- Step 2 -->
                <div class="step-card recommend">
                    <span class="recommend-badge">Sangat Disarankan</span>
                    <div class="step-num">2</div>
                    <h4>Gabung Google Group</h4>
                    <p>Google Console memerlukan akses izin penguji. Gabung ke Google Group Penguji Sagansa untuk persetujuan instan otomatis.</p>
                    @php
                        $groupLink = \App\Models\Setting::get('google_group_link', 'https://groups.google.com/g/sagansa-beta-testers');
                    @endphp
                    <a href="{{ $groupLink }}" target="_blank" class="step-btn gold">
                        Gabung Group ➔
                    </a>
                </div>

                <!-- Step 3 -->
                <div class="step-card">
                    <div class="step-num">3</div>
                    <h4>Opt-In Pengujian</h4>
                    <p>Setelah email Anda masuk whitelist (melalui Google Group/Formulir), klik link persetujuan Google Play di bawah ini:</p>
                    @php
                        $playPos = \App\Models\Setting::get('google_play_pos_link', '#');
                        $playAtt = \App\Models\Setting::get('google_play_attendance_link', '#');
                    @endphp
                    <div style="display:flex; flex-direction:column; gap:8px;">
                        <a href="{{ $playPos }}" target="_blank" class="step-btn">
                            Opt-in POS ➔
                        </a>
                        <a href="{{ $playAtt }}" target="_blank" class="step-btn">
                            Opt-in Attendance ➔
                        </a>
                    </div>
                </div>

                <!-- Step 4 -->
                <div class="step-card">
                    <div class="step-num">4</div>
                    <h4>Instal & Gunakan</h4>
                    <p>Download aplikasi di Google Play Store, lalu gunakan dan biarkan terinstal selama minimal **14 hari berturut-turut**.</p>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Benefits --}}
<div class="beta-section" style="border-top: 1px solid var(--gray-200);">
    <div class="beta-section-inner">
        <h2 style="text-align:center; font-size:1.8rem; font-weight:800; color:var(--gray-900); margin-bottom:12px;">Kenapa Jadi Beta Tester?</h2>
        <p style="text-align:center; color:var(--gray-500); margin-bottom:48px; font-size:1.02rem;">Keuntungan eksklusif yang Anda dapat sebagai beta tester Sagansa.</p>
        <div class="beta-benefits">
            <div class="beta-benefit">
                <div class="beta-benefit-icon" style="background:#eff6ff;">⚡</div>
                <h3>Akses Lebih Awal</h3>
                <p>Coba fitur terbaru Sagansa sebelum publik. Rasakan pengalaman jadi pengguna pertama.</p>
            </div>
            <div class="beta-benefit">
                <div class="beta-benefit-icon" style="background:#ecfdf5;">🎁</div>
                <h3>Gratis Selama Testing</h3>
                <p>Gunakan semua fitur tanpa biaya selama masa program beta. Tanpa kartu kredit.</p>
            </div>
            <div class="beta-benefit">
                <div class="beta-benefit-icon" style="background:#f5f3ff;">💬</div>
                <h3>Beri Masukan Langsung</h3>
                <p>Suara Anda berdampak. Saran &amp; kritik langsung mempengaruhi pengembangan produk.</p>
            </div>
        </div>
    </div>
</div>

{{-- FAQ --}}
<div class="beta-section" style="background: var(--gray-50); border-top: 1px solid var(--gray-200);">
    <div class="beta-section-inner">
        <h2 style="text-align:center; font-size:1.8rem; font-weight:800; color:var(--gray-900); margin-bottom:40px;">Pertanyaan Umum</h2>
        <div class="beta-faq">
            <div class="beta-faq-item">
                <h4>Mengapa saya harus bergabung ke Google Group?</h4>
                <p>Google Play Console membutuhkan daftar email penguji yang sah. Memasukkan satu per satu email penguji secara manual membutuhkan waktu verifikasi admin. Dengan bergabung ke Google Group kami, email Anda akan dikenali langsung oleh sistem Google Play sebagai penguji yang sah secara instan.</p>
            </div>
            <div class="beta-faq-item">
                <h4>Bagaimana cara mendapatkan aplikasinya?</h4>
                <p>Setelah email Anda bergabung di Google Group, klik tombol <strong>Opt-in</strong> pada Langkah 3. Google Play akan menampilkan halaman persetujuan. Klik tombol 'Become a Tester', lalu Anda akan diberikan link khusus untuk mengunduh aplikasi langsung dari Google Play Store.</p>
            </div>
            <div class="beta-faq-item">
                <h4>Apakah aman untuk data bisnis saya?</h4>
                <p>Pasti. Data pengujian Anda aman, terenkripsi, dan hanya digunakan untuk analisis performa aplikasi selama masa pengembangan.</p>
            </div>
            <div class="beta-faq-item">
                <h4>Kenapa harus diinstal selama 14 hari?</h4>
                <p>Ini adalah syarat wajib dan mutlak dari kebijakan terbaru Google Play Console bagi akun developer perorangan baru sebelum aplikasi kami diizinkan untuk dipublikasikan secara umum.</p>
            </div>
        </div>

        <div class="beta-disclaimer">
            <strong>📝 Catatan Penting:</strong> Terima kasih atas kesediaan Anda meluangkan waktu menjadi penguji. Bantuan Anda dalam menginstal dan membuka aplikasi selama 14 hari berturut-turut sangat membantu Sagansa untuk rilis secara resmi di Google Play Store dengan cepat!
        </div>
    </div>
</div>
@endsection
