<section class="section screenshots-section" id="screenshots">
    <div class="section-inner">
        <div class="section-header">
            <div class="section-label purple">📸 Antarmuka Aplikasi</div>
            <h2 class="section-title">Lihat Sagansa dalam Aksi</h2>
            <p class="section-desc">Eksplorasi tampilan antarmuka yang bersih, modern, dan dirancang khusus untuk kemudahan operasional harian Anda.</p>
        </div>

        <div class="gallery-container">
            <!-- Tabs -->
            <div class="gallery-tabs">
                <button class="gallery-tab active" data-target="pos">
                    <span class="tab-icon">🛒</span>
                    <span class="tab-label">Sagansa POS (Tablet)</span>
                </button>
                <button class="gallery-tab" data-target="attendance">
                    <span class="tab-icon">📋</span>
                    <span class="tab-label">Sagansa Attendance (Mobile)</span>
                </button>
                <button class="gallery-tab" data-target="admin">
                    <span class="tab-icon">📊</span>
                    <span class="tab-label">Web Admin (Laporan)</span>
                </button>
            </div>

            <!-- Viewport / Slides -->
            <div class="gallery-viewport">
                <!-- Slide: POS -->
                <div class="gallery-slide active" id="slide-pos">
                    <div class="device-wrapper tablet-landscape">
                        <div class="device-frame">
                            <div class="device-screen pos-screen">
                                <!-- POS App Header -->
                                <div class="pos-header">
                                    <div class="pos-brand">
                                        <span class="pos-logo">S</span>
                                        <div style="display: flex; flex-direction: column; gap: 3px; width: 90px;">
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
                    </div>
                    <div class="slide-caption">
                        <h3>Antarmuka Kasir Tercepat</h3>
                        <p>Desain grid produk yang responsif memudahkan kasir memproses transaksi pesanan makan di tempat (dine-in), dibawa pulang (takeaway), maupun order online. Mendukung pembayaran QRIS otomatis.</p>
                    </div>
                </div>

                <!-- Slide: Attendance -->
                <div class="gallery-slide" id="slide-attendance">
                    <div class="device-wrapper mobile-portrait">
                        <div class="device-frame">
                            <div class="device-notch"></div>
                            <div class="device-screen attendance-screen" style="padding-top: 20px;">
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
                    </div>
                    <div class="slide-caption">
                        <h3>Absensi Karyawan Anti-Curang</h3>
                        <p>Karyawan melakukan absensi langsung dari ponsel mereka masing-masing dengan verifikasi foto selfie (face recognition) dan pencocokan koordinat GPS area outlet secara akurat.</p>
                    </div>
                </div>

                <!-- Slide: Admin -->
                <div class="gallery-slide" id="slide-admin">
                    <div class="device-wrapper desktop">
                        <div class="device-frame">
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
                                    <div class="ops-nav-link">
                                        <span class="nav-icon">👥</span> 
                                        <span class="placeholder-bar w-45" style="height: 5px;"></span>
                                    </div>
                                    <div class="ops-nav-link">
                                        <span class="nav-icon">⚙️</span> 
                                        <span class="placeholder-bar w-40" style="height: 5px;"></span>
                                    </div>
                                </div>

                                <!-- Next.js Content Area -->
                                <div class="ops-content">
                                    <div class="ops-page-header" style="margin-bottom: 8px;">
                                        <div class="placeholder-bar w-30" style="height: 8px; margin-bottom: 4px;"></div>
                                        <div class="placeholder-bar w-50" style="height: 4px;"></div>
                                    </div>

                                    <!-- Next.js Tabs -->
                                    <div class="ops-tabs" style="margin-bottom: 12px; gap: 8px;">
                                        <span class="ops-tab active" style="padding: 2px 8px;"><div class="placeholder-bar w-100" style="height: 4px; background: var(--primary);"></div></span>
                                        <span class="ops-tab" style="padding: 2px 8px;"><div class="placeholder-bar w-100" style="height: 4px; background: rgba(0,0,0,0.2);"></div></span>
                                    </div>

                                    <!-- Next.js Metrics -->
                                    <div class="ops-metrics" style="grid-template-columns: repeat(3, 1fr); gap: 8px; margin-bottom: 12px;">
                                        <div class="ops-metric-card" style="padding: 8px;">
                                            <div class="placeholder-bar w-50" style="height: 4px; margin-bottom: 4px; background: rgba(15,23,42,0.4);"></div>
                                            <div class="placeholder-bar w-80 primary" style="height: 8px; margin-bottom: 4px;"></div>
                                            <div class="placeholder-bar w-60 success" style="height: 4px;"></div>
                                        </div>
                                        <div class="ops-metric-card" style="padding: 8px;">
                                            <div class="placeholder-bar w-50" style="height: 4px; margin-bottom: 4px; background: rgba(15,23,42,0.4);"></div>
                                            <div class="placeholder-bar w-70 primary" style="height: 8px; margin-bottom: 4px;"></div>
                                            <div class="placeholder-bar w-60 success" style="height: 4px;"></div>
                                        </div>
                                        <div class="ops-metric-card" style="padding: 8px;">
                                            <div class="placeholder-bar w-50" style="height: 4px; margin-bottom: 4px; background: rgba(15,23,42,0.4);"></div>
                                            <div class="placeholder-bar w-60 primary" style="height: 8px; margin-bottom: 4px;"></div>
                                            <div class="placeholder-bar w-60 success" style="height: 4px;"></div>
                                        </div>
                                    </div>

                                    <!-- Next.js Main Chart -->
                                    <div class="ops-report-body" style="padding: 8px; flex: 1;">
                                        <div class="ops-report-header" style="margin-bottom: 8px;">
                                            <div class="placeholder-bar w-40" style="height: 6px;"></div>
                                        </div>
                                        <div class="ops-chart-container" style="height: 80px;">
                                            <div class="ops-chart-bar-wrapper" style="width: 25px;"><div class="ops-chart-bar" style="height: 35px; width: 12px;"></div></div>
                                            <div class="ops-chart-bar-wrapper" style="width: 25px;"><div class="ops-chart-bar" style="height: 60px; width: 12px;"></div></div>
                                            <div class="ops-chart-bar-wrapper" style="width: 25px;"><div class="ops-chart-bar" style="height: 110px; width: 12px;"></div></div>
                                            <div class="ops-chart-bar-wrapper" style="width: 25px;"><div class="ops-chart-bar" style="height: 80px; width: 12px;"></div></div>
                                            <div class="ops-chart-bar-wrapper" style="width: 25px;"><div class="ops-chart-bar" style="height: 95px; width: 12px;"></div></div>
                                            <div class="ops-chart-bar-wrapper" style="width: 25px;"><div class="ops-chart-bar" style="height: 125px; width: 12px;"></div></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slide-caption">
                        <h3>Dashboard Bisnis Komprehensif</h3>
                        <p>Pantau laporan penjualan harian, pergeseran shift karyawan, stok inventori terpakai, serta analisis omzet cabang secara real-time dari satu halaman web admin pusat.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
