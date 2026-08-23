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
            <div class="hero-store-badges">
                <div class="hero-store-group">
                    <span class="hero-store-label">Sagansa POS</span>
                    <div class="hero-store-buttons">
                        @include('welcome.partials._store-badge', ['type' => 'appstore', 'link' => $appStorePos, 'alert' => 'Sagansa POS untuk iOS segera hadir di App Store!'])
                        @include('welcome.partials._store-badge', ['type' => 'googleplay', 'link' => $playStorePos, 'alert' => 'Sagansa POS untuk Android segera hadir di Google Play!'])
                    </div>
                </div>
                <div class="hero-store-group">
                    <span class="hero-store-label">Sagansa Attendance</span>
                    <div class="hero-store-buttons">
                        @include('welcome.partials._store-badge', ['type' => 'appstore', 'link' => $appStoreAtt, 'alert' => 'Sagansa Attendance untuk iOS segera hadir di App Store!'])
                        @include('welcome.partials._store-badge', ['type' => 'googleplay', 'link' => $playStoreAtt, 'alert' => 'Sagansa Attendance untuk Android segera hadir di Google Play!'])
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