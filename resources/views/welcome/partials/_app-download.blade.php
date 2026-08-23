@php
    $playStorePos = \App\Models\Setting::get('google_play_pos_link');
    $playStoreAtt = \App\Models\Setting::get('google_play_attendance_link');
    $appStorePos = \App\Models\Setting::get('app_store_pos_link');
    $appStoreAtt = \App\Models\Setting::get('app_store_attendance_link');

    $isPosReleased = (!empty($playStorePos) && $playStorePos !== '#') || (!empty($appStorePos) && $appStorePos !== '#');
    $isAttReleased = (!empty($playStoreAtt) && $playStoreAtt !== '#') || (!empty($appStoreAtt) && $appStoreAtt !== '#');
@endphp
<section class="section app-download-section" id="apps">
    <div class="section-inner">
        <div class="section-header">
            <div class="section-label blue">📱 Download Aplikasi</div>
            <h2 class="section-title">Sagansa di Genggaman Anda</h2>
            <p class="section-desc">Download aplikasi Sagansa POS dan Attendance untuk pengelolaan bisnis yang lebih praktis langsung dari perangkat mobile Anda.</p>
        </div>
        <div class="app-cards">
            <!-- Sagansa POS -->
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

            <!-- Sagansa Attendance -->
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
</section>