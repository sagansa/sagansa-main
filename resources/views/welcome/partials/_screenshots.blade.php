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
                                        <div>
                                            <span class="pos-store-name">Warung Kaki Lima</span>
                                            <span class="pos-user-role">Kasir Utama</span>
                                        </div>
                                    </div>
                                    <div class="pos-search-bar">
                                        <span>🔍 Cari menu...</span>
                                    </div>
                                </div>
                                
                                <!-- POS App Categories -->
                                <div class="pos-categories">
                                    <span class="pos-category active">Semua</span>
                                    <span class="pos-category">Makanan</span>
                                    <span class="pos-category">Minuman</span>
                                </div>
                                
                                <div class="pos-main">
                                    <!-- POS Products Grid -->
                                    <div class="pos-products">
                                        @php
                                            $products = [
                                                ['🍜', 'Mie Ayam', 'Rp15k'],
                                                ['🍹', 'Es Jeruk', 'Rp6k'],
                                                ['🍗', 'Ayam Bakar', 'Rp18k'],
                                                ['🧊', 'Es Teh', 'Rp4k'],
                                                ['🥣', 'Bakso Sapi', 'Rp14k'],
                                                ['🍳', 'Nasgor', 'Rp15k'],
                                                ['🍢', 'Sate Ayam', 'Rp16k'],
                                                ['☕', 'Kopi Aren', 'Rp8k'],
                                                ['🍧', 'Es Campur', 'Rp10k'],
                                                ['🍞', 'Roti Bakar', 'Rp12k'],
                                                ['🥗', 'Gado-Gado', 'Rp13k'],
                                                ['🥑', 'Jus Alpukat', 'Rp8k'],
                                                ['🥟', 'Siomay', 'Rp12k'],
                                                ['🐟', 'Pempek', 'Rp15k'],
                                                ['🧇', 'Mendoan', 'Rp6k'],
                                                ['🍌', 'Pisang Goreng', 'Rp7k']
                                            ];
                                        @endphp
                                        @foreach($products as $p)
                                            <div class="pos-product-card">
                                                <div class="pos-product-image">{{ $p[0] }}</div>
                                                <div class="pos-product-info">
                                                    <span class="pos-product-name">{{ $p[1] }}</span>
                                                    <span class="pos-product-price">{{ $p[2] }}</span>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    
                                    <!-- POS Cart Sidebar -->
                                    <div class="pos-cart">
                                        <div class="pos-cart-header">
                                            <span>🛒 Keranjang (2)</span>
                                            <span class="pos-order-type">🍽️ Dine-In</span>
                                        </div>
                                        <div class="pos-cart-items">
                                            <div class="pos-cart-item">
                                                <span class="pos-item-name">Mie Ayam</span>
                                                <span class="pos-item-qty">1x</span>
                                                <span class="pos-item-price">Rp15.000</span>
                                            </div>
                                            <div class="pos-cart-item">
                                                <span class="pos-item-name">Es Jeruk</span>
                                                <span class="pos-item-qty">2x</span>
                                                <span class="pos-item-price">Rp12.000</span>
                                            </div>
                                        </div>
                                        <div class="pos-cart-total">
                                            <span>Total</span>
                                            <strong>Rp27.000</strong>
                                        </div>
                                        <button class="pos-pay-btn" type="button">Bayar</button>
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
                                        <div class="att-avatar">B</div>
                                        <div class="att-greeting">
                                            <span class="att-hello">Halo, Budi 👋</span>
                                            <span class="att-sub">Warung Kaki Lima</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Attendance Status Card -->
                                <div class="att-status-card">
                                    <span class="att-card-title">Presensi Hari Ini</span>
                                    <div class="att-time-box">
                                        <span class="att-clock-label">Jam Masuk</span>
                                        <strong class="att-clock-time">08:02</strong>
                                        <span class="att-lateness">🟢 Tepat Waktu</span>
                                    </div>
                                    <div class="att-buttons">
                                        <button class="att-btn check-in-btn disabled" type="button">Check-In</button>
                                        <button class="att-btn check-out-btn" type="button">Check-Out</button>
                                    </div>
                                </div>

                                <!-- Attendance History -->
                                <div class="att-history">
                                    <span class="att-history-title">Riwayat Terbaru</span>
                                    <div class="att-history-item">
                                        <div class="att-history-left">
                                            <span class="att-history-date">Kemarin, 11 Jul</span>
                                            <span class="att-history-store">Jakarta Selatan</span>
                                        </div>
                                        <span class="att-history-status approve">Hadir</span>
                                    </div>
                                    <div class="att-history-item">
                                        <div class="att-history-left">
                                            <span class="att-history-date">10 Jul 2026</span>
                                            <span class="att-history-store">Jakarta Selatan</span>
                                        </div>
                                        <span class="att-history-status approve">Hadir</span>
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
                                        <span class="ops-logo-text">Sagansa Ops</span>
                                    </div>
                                    <span class="ops-nav-section">Utama</span>
                                    <div class="ops-nav-link"><span class="nav-icon">📊</span> <span>Dashboard</span></div>
                                    <div class="ops-nav-link active"><span class="nav-icon">📈</span> <span>Laporan</span></div>
                                    <div class="ops-nav-link"><span class="nav-icon">👥</span> <span>Karyawan</span></div>
                                    <div class="ops-nav-link"><span class="nav-icon">⚙️</span> <span>Pengaturan</span></div>
                                </div>

                                <!-- Next.js Content Area -->
                                <div class="ops-content">
                                    <div class="ops-page-header">
                                        <h4 class="ops-page-title">Laporan Penjualan</h4>
                                        <p class="ops-page-subtitle">Analisis performa omzet dan shift secara komprehensif</p>
                                    </div>

                                    <!-- Next.js Tabs -->
                                    <div class="ops-tabs">
                                        <span class="ops-tab active">Ringkasan</span>
                                        <span class="ops-tab">Grafik Penjualan</span>
                                        <span class="ops-tab">Metode Pembayaran</span>
                                    </div>

                                    <!-- Next.js Metrics -->
                                    <div class="ops-metrics">
                                        <div class="ops-metric-card">
                                            <span class="ops-metric-label">Omzet Kotor</span>
                                            <strong class="ops-metric-value">Rp4.820.000</strong>
                                            <span class="ops-metric-sub">▲ 12% vs Kemarin</span>
                                        </div>
                                        <div class="ops-metric-card">
                                            <span class="ops-metric-label">Total Transaksi</span>
                                            <strong class="ops-metric-value">142 Transaksi</strong>
                                            <span class="ops-metric-sub">▲ 8% vs Kemarin</span>
                                        </div>
                                        <div class="ops-metric-card">
                                            <span class="ops-metric-label">Karyawan Aktif</span>
                                            <strong class="ops-metric-value">8 Karyawan</strong>
                                            <span class="ops-metric-sub">100% Kehadiran</span>
                                        </div>
                                    </div>

                                    <!-- Next.js Main Chart -->
                                    <div class="ops-report-body">
                                        <div class="ops-report-header">
                                            <span class="ops-report-title">Statistik Penjualan Hari Ini</span>
                                        </div>
                                        <div class="ops-chart-container">
                                            <div class="ops-chart-bar-wrapper">
                                                <div class="ops-chart-bar" style="height: 35px;"></div>
                                                <span class="ops-chart-label">08:00</span>
                                            </div>
                                            <div class="ops-chart-bar-wrapper">
                                                <div class="ops-chart-bar" style="height: 60px;"></div>
                                                <span class="ops-chart-label">10:00</span>
                                            </div>
                                            <div class="ops-chart-bar-wrapper">
                                                <div class="ops-chart-bar" style="height: 110px;"></div>
                                                <span class="ops-chart-label">12:00</span>
                                            </div>
                                            <div class="ops-chart-bar-wrapper">
                                                <div class="ops-chart-bar" style="height: 80px;"></div>
                                                <span class="ops-chart-label">14:00</span>
                                            </div>
                                            <div class="ops-chart-bar-wrapper">
                                                <div class="ops-chart-bar" style="height: 95px;"></div>
                                                <span class="ops-chart-label">16:00</span>
                                            </div>
                                            <div class="ops-chart-bar-wrapper">
                                                <div class="ops-chart-bar" style="height: 125px;"></div>
                                                <span class="ops-chart-label">18:00</span>
                                            </div>
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
