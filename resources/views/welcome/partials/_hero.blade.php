@php
    $playStorePos = \App\Models\Setting::get('google_play_pos_link');
    $playStoreAtt = \App\Models\Setting::get('google_play_attendance_link');
    $appStorePos = \App\Models\Setting::get('app_store_pos_link');
    $appStoreAtt = \App\Models\Setting::get('app_store_attendance_link');
@endphp
<section class="hero">
    <div class="hero-inner">
        <div class="hero-text">
            <div class="hero-badge">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/></svg>
                POS & Attendance Terintegrasi
            </div>
            <h1>
                Aplikasi Kasir dan Kehadiran Karyawan <span class="gradient-text">Gratis Terintegrasi</span>
            </h1>
            <p>
                Sagansa menggabungkan sistem kasir POS modern dengan manajemen absensi kehadiran karyawan 100% gratis di mobile. Kelola transaksi toko dan kehadiran SDM dalam satu platform terpadu.
            </p>
            <div class="hero-buttons">
                <a href="https://ops.sagansa.id/id/auth/register" target="_blank" class="btn btn-primary">
                    Mulai Sekarang — Gratis
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
                <a href="#features" class="btn btn-secondary">Lihat Fitur</a>
            </div>
            <div class="hero-store-badges">
                <div class="hero-store-group">
                    <span class="hero-store-label">Sagansa POS</span>
                    <div class="hero-store-buttons">
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
                <div class="hero-store-group">
                    <span class="hero-store-label">Sagansa Attendance</span>
                    <div class="hero-store-buttons">
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
        <div class="hero-visual">
            <div class="devices-container">
                <!-- Desktop Web Admin (HTML/CSS Mockup) -->
                <div class="device-mockup desktop-hero">
                    <div class="device-bezel">
                        <div class="device-screen ops-screen">
                            <!-- Next.js Sidebar -->
                            <div class="ops-sidebar">
                                <div class="ops-logo-area">
                                    <span class="ops-logo-icon">S</span>
                                    <span class="placeholder-bar w-60" style="margin-left: 4px; height: 5px;"></span>
                                </div>
                                <span class="ops-nav-section" style="margin-bottom: 6px;"><span class="placeholder-bar w-40" style="height: 4px;"></span></span>
                                <div class="ops-nav-link active">
                                    <span class="nav-icon">📊</span> 
                                    <span class="placeholder-bar w-50" style="height: 5px; background: white;"></span>
                                </div>
                            </div>

                            <!-- Next.js Content Area -->
                            <div class="ops-content">
                                <div class="ops-page-header" style="margin-bottom: 8px;">
                                    <div class="placeholder-bar w-40" style="height: 7px; margin-bottom: 4px;"></div>
                                    <div class="placeholder-bar w-60" style="height: 4px;"></div>
                                </div>

                                <!-- Next.js Metrics -->
                                <div class="ops-metrics" style="grid-template-columns: repeat(2, 1fr); gap: 6px; margin-bottom: 8px;">
                                    <div class="ops-metric-card" style="padding: 6px;">
                                        <div class="placeholder-bar w-40" style="height: 4px; margin-bottom: 4px;"></div>
                                        <div class="placeholder-bar w-80 primary" style="height: 7px;"></div>
                                    </div>
                                    <div class="ops-metric-card" style="padding: 6px;">
                                        <div class="placeholder-bar w-40" style="height: 4px; margin-bottom: 4px;"></div>
                                        <div class="placeholder-bar w-60 success" style="height: 7px;"></div>
                                    </div>
                                </div>

                                <!-- Next.js Main Chart -->
                                <div class="ops-report-body" style="padding: 6px; flex: 1;">
                                    <div class="ops-chart-container" style="height: 60px;">
                                        <div class="ops-chart-bar-wrapper" style="width: 20px;"><div class="ops-chart-bar" style="height: 25px; width: 10px;"></div></div>
                                        <div class="ops-chart-bar-wrapper" style="width: 20px;"><div class="ops-chart-bar" style="height: 45px; width: 10px;"></div></div>
                                        <div class="ops-chart-bar-wrapper" style="width: 20px;"><div class="ops-chart-bar" style="height: 55px; width: 10px;"></div></div>
                                        <div class="ops-chart-bar-wrapper" style="width: 20px;"><div class="ops-chart-bar" style="height: 35px; width: 10px;"></div></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="device-label">Sagansa Web Admin</div>
                </div>

                <!-- POS Tablet App (HTML/CSS Mockup) -->
                <div class="device-mockup tablet">
                    <div class="device-bezel">
                        <div class="device-screen pos-screen">
                            <!-- POS App Header -->
                            <div class="pos-header">
                                <div class="pos-brand">
                                    <span class="pos-logo">S</span>
                                    <div style="display: flex; flex-direction: column; gap: 3px; width: 80px;">
                                        <div class="placeholder-bar w-80" style="height: 5px; background: white;"></div>
                                        <div class="placeholder-bar w-50" style="height: 3px; background: rgba(255,255,255,0.4);"></div>
                                    </div>
                                </div>
                                <div class="pos-search-bar" style="display: flex; align-items: center; justify-content: flex-start; padding-left: 8px;">
                                    <span style="font-size: 0.55rem; color: rgba(255,255,255,0.3); margin-right: 4px;">🔍</span>
                                    <div class="placeholder-bar w-40" style="height: 4px; background: rgba(255,255,255,0.2);"></div>
                                </div>
                            </div>
                            
                            <!-- POS App Categories -->
                            <div class="pos-categories">
                                <span class="pos-category active" style="width: 40px; height: 14px; padding: 0; display: inline-flex; align-items: center; justify-content: center;"><div class="placeholder-bar w-60" style="background: white; height: 4px;"></div></span>
                                <span class="pos-category" style="width: 45px; height: 14px; padding: 0; display: inline-flex; align-items: center; justify-content: center;"><div class="placeholder-bar w-60" style="height: 4px;"></div></span>
                                <span class="pos-category" style="width: 45px; height: 14px; padding: 0; display: inline-flex; align-items: center; justify-content: center;"><div class="placeholder-bar w-60" style="height: 4px;"></div></span>
                            </div>
                            
                            <div class="pos-main">
                                <!-- POS Products Grid -->
                                <div class="pos-products">
                                    @php
                                        $productEmojis = ['🍜', '🍹', '🍗', '🧊', '🥣', '🍳', '🍢', '☕', '🍧', '🍞', '🥗', '🥑', '🥟', '🐟', '🧇', '🍌'];
                                    @endphp
                                    @foreach($productEmojis as $emoji)
                                        <div class="pos-product-card">
                                            <div class="pos-product-image" style="font-size: 1.1rem; margin-bottom: 2px;">{{ $emoji }}</div>
                                            <div class="pos-product-info" style="display: flex; flex-direction: column; gap: 3px; align-items: center; width: 100%; margin-top: 2px;">
                                                <div class="placeholder-bar w-70" style="height: 4px;"></div>
                                                <div class="placeholder-bar w-40 primary" style="height: 4px;"></div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                
                                <!-- POS Cart Sidebar -->
                                <div class="pos-cart">
                                    <div class="pos-cart-header" style="padding-bottom: 6px; margin-bottom: 6px;">
                                        <div class="placeholder-bar w-70" style="height: 5px; background: white; margin-bottom: 4px;"></div>
                                        <div class="placeholder-bar w-40" style="height: 3px; background: rgba(255,255,255,0.4);"></div>
                                    </div>
                                    <div class="pos-cart-items" style="display: flex; flex-direction: column; gap: 8px; flex: 1;">
                                        <div class="pos-cart-item" style="display: flex; justify-content: space-between; align-items: center;">
                                            <div class="placeholder-bar w-40" style="height: 4px;"></div>
                                            <div class="placeholder-bar w-25 primary" style="height: 4px;"></div>
                                        </div>
                                        <div class="pos-cart-item" style="display: flex; justify-content: space-between; align-items: center;">
                                            <div class="placeholder-bar w-50" style="height: 4px;"></div>
                                            <div class="placeholder-bar w-25 primary" style="height: 4px;"></div>
                                        </div>
                                    </div>
                                    <div class="pos-cart-total" style="display: flex; justify-content: space-between; align-items: center; padding-top: 6px; border-top: 1px dashed rgba(255,255,255,0.1); margin-bottom: 8px;">
                                        <div class="placeholder-bar w-30" style="height: 5px;"></div>
                                        <div class="placeholder-bar w-40 success" style="height: 6px;"></div>
                                    </div>
                                    <button class="pos-pay-btn" type="button" style="height: 20px; font-size: 0.55rem; padding: 0; display: flex; align-items: center; justify-content: center;"><div class="placeholder-bar w-30" style="height: 4px; background: white;"></div></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="device-label">Sagansa POS</div>
                </div>

                <!-- Attendance Phone App (HTML/CSS Mockup) -->
                <div class="device-mockup phone">
                    <div class="device-bezel">
                        <div class="device-notch"></div>
                        <div class="device-screen attendance-screen">
                            <!-- Attendance Header -->
                            <div class="att-header">
                                <div class="att-profile">
                                    <div class="att-avatar" style="font-size: 0.55rem; font-weight: 700;">A</div>
                                    <div class="att-greeting" style="display: flex; flex-direction: column; gap: 3px; width: 60px;">
                                        <div class="placeholder-bar w-80" style="height: 5px; background: #0f172a;"></div>
                                        <div class="placeholder-bar w-50" style="height: 3px; background: rgba(15,23,42,0.4);"></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Attendance Status Card -->
                            <div class="att-status-card" style="padding: 10px;">
                                <div class="placeholder-bar w-50" style="height: 5px; margin-bottom: 6px; background: rgba(0,0,0,0.5);"></div>
                                <div class="att-time-box" style="padding: 6px; display: flex; flex-direction: column; align-items: center; gap: 4px;">
                                    <div class="placeholder-bar w-40" style="height: 4px; background: rgba(0,0,0,0.3);"></div>
                                    <div class="placeholder-bar w-70 primary" style="height: 10px;"></div>
                                    <div class="placeholder-bar w-50 success" style="height: 5px;"></div>
                                </div>
                                <div class="att-buttons" style="margin-top: 8px;">
                                    <button class="att-btn check-in-btn disabled" type="button" style="display: flex; align-items: center; justify-content: center; height: 22px; padding: 0;"><div class="placeholder-bar w-50" style="height: 4px; background: white;"></div></button>
                                    <button class="att-btn check-out-btn" type="button" style="display: flex; align-items: center; justify-content: center; height: 22px; padding: 0;"><div class="placeholder-bar w-50" style="height: 4px; background: white;"></div></button>
                                </div>
                            </div>

                            <!-- Attendance History -->
                            <div class="att-history">
                                <div class="placeholder-bar w-40" style="height: 5px; margin-bottom: 6px; background: rgba(0,0,0,0.4);"></div>
                                <div class="att-history-item" style="display: flex; justify-content: space-between; align-items: center; padding: 6px;">
                                    <div style="display: flex; flex-direction: column; gap: 3px; width: 60%;">
                                        <div class="placeholder-bar w-70" style="height: 4px; background: rgba(0,0,0,0.5);"></div>
                                        <div class="placeholder-bar w-45" style="height: 3px; background: rgba(0,0,0,0.3);"></div>
                                    </div>
                                    <div class="placeholder-bar w-20 success" style="height: 10px; border-radius: 3px;"></div>
                                </div>
                                <div class="att-history-item" style="display: flex; justify-content: space-between; align-items: center; padding: 6px;">
                                    <div style="display: flex; flex-direction: column; gap: 3px; width: 60%;">
                                        <div class="placeholder-bar w-80" style="height: 4px; background: rgba(0,0,0,0.5);"></div>
                                        <div class="placeholder-bar w-50" style="height: 3px; background: rgba(0,0,0,0.3);"></div>
                                    </div>
                                    <div class="placeholder-bar w-20 success" style="height: 10px; border-radius: 3px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="device-label">Sagansa Attendance</div>
                </div>
            </div>
        </div>
    </div>
</section>