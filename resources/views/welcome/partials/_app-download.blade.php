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
                    <a href="{{ $appStorePos ?: '#' }}" @if($appStorePos && $appStorePos !== '#') target="_blank" @else onclick="alert('Sagansa POS untuk iOS segera hadir di App Store!'); return false;" @endif class="app-store-btn {{ (!$appStorePos || $appStorePos === '#') ? 'coming-soon' : '' }}">
                        <svg viewBox="0 0 24 24" fill="currentColor"><path d="M17.05 20.28c-.98.95-2.05.8-3.08.35-1.09-.46-2.09-.48-3.24 0-1.44.62-2.2.44-3.06-.35C2.79 15.25 3.51 7.59 9.05 7.31c1.35.07 2.29.74 3.08.8 1.18-.24 2.31-.93 3.57-.84 1.51.12 2.65.72 3.4 1.8-3.12 1.87-2.38 5.98.48 7.13-.57 1.5-1.31 2.99-2.54 4.09zM12.03 7.25c-.15-2.23 1.66-4.07 3.74-4.25.29 2.58-2.34 4.5-3.74 4.25z"/></svg>
                        <span class="btn-text">
                            <span class="small">Download on the</span>
                            <span class="big">App Store</span>
                        </span>
                    </a>
                    <a href="{{ $playStorePos ?: '#' }}" @if($playStorePos && $playStorePos !== '#') target="_blank" @else onclick="alert('Sagansa POS untuk Android segera hadir di Google Play!'); return false;" @endif class="app-store-btn {{ (!$playStorePos || $playStorePos === '#') ? 'coming-soon' : '' }}">
                        <svg viewBox="0 0 24 24" fill="currentColor"><path d="M3.609 1.814L13.792 12 3.61 22.186a.996.996 0 0 1-.61-.92V2.734a1 1 0 0 1 .609-.92zm10.89 10.893l2.302 2.302-10.937 6.333 8.635-8.635zm3.199-3.199l2.302 2.302a1 1 0 0 1 0 1.38l-2.302 2.302L15.396 12l2.302-3.492zM5.864 2.658L16.8 9.49l-2.302 2.302-8.635-9.134z"/></svg>
                        <span class="btn-text">
                            <span class="small">GET IT ON</span>
                            <span class="big">Google Play</span>
                        </span>
                    </a>
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
                    <a href="{{ $appStoreAtt ?: '#' }}" @if($appStoreAtt && $appStoreAtt !== '#') target="_blank" @else onclick="alert('Sagansa Attendance untuk iOS segera hadir di App Store!'); return false;" @endif class="app-store-btn {{ (!$appStoreAtt || $appStoreAtt === '#') ? 'coming-soon' : '' }}">
                        <svg viewBox="0 0 24 24" fill="currentColor"><path d="M17.05 20.28c-.98.95-2.05.8-3.08.35-1.09-.46-2.09-.48-3.24 0-1.44.62-2.2.44-3.06-.35C2.79 15.25 3.51 7.59 9.05 7.31c1.35.07 2.29.74 3.08.8 1.18-.24 2.31-.93 3.57-.84 1.51.12 2.65.72 3.4 1.8-3.12 1.87-2.38 5.98.48 7.13-.57 1.5-1.31 2.99-2.54 4.09zM12.03 7.25c-.15-2.23 1.66-4.07 3.74-4.25.29 2.58-2.34 4.5-3.74 4.25z"/></svg>
                        <span class="btn-text">
                            <span class="small">Download on the</span>
                            <span class="big">App Store</span>
                        </span>
                    </a>
                    <a href="{{ $playStoreAtt ?: '#' }}" @if($playStoreAtt && $playStoreAtt !== '#') target="_blank" @else onclick="alert('Sagansa Attendance untuk Android segera hadir di Google Play!'); return false;" @endif class="app-store-btn {{ (!$playStoreAtt || $playStoreAtt === '#') ? 'coming-soon' : '' }}">
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
</section>