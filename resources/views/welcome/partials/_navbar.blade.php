<nav class="navbar" id="navbar">
    <div class="navbar-inner">
        <a href="/" class="logo">
            <img src="{{ asset('images/sagansa-logo.svg') }}" alt="Sagansa Logo" style="height: 36px; width: 36px; object-fit: contain;">
            Sagansa
        </a>
        <div class="nav-links" id="navLinks">
            <a href="/#features">Fitur</a>
            <a href="/blog">Blog</a>
            <a href="/vlog">Vlog</a>
            <div class="nav-dropdown">
                <button class="nav-dropdown-toggle" aria-expanded="false">
                    Produk
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"/></svg>
                </button>
                <div class="nav-dropdown-menu">
                    <a href="/produk/point-of-sale" class="nav-dropdown-item">
                        <span class="nav-dropdown-icon">💳</span>
                        <span>
                            <strong>POS</strong>
                            <small>Aplikasi kasir & point of sale</small>
                        </span>
                    </a>
                    <a href="/produk/attendance" class="nav-dropdown-item">
                        <span class="nav-dropdown-icon">📋</span>
                        <span>
                            <strong>Attendance</strong>
                            <small>Sistem absensi karyawan terintegrasi</small>
                        </span>
                    </a>
                    <a href="/produk/hardware" class="nav-dropdown-item">
                        <span class="nav-dropdown-icon">🖨️</span>
                        <span>
                            <strong>Hardware</strong>
                            <small>Printer, scanner, dan perangkat kasir</small>
                        </span>
                    </a>
                </div>
            </div>
            
            <a href="/cara-perhitungan">Harga</a>
            <a href="/qna">Q&A</a>
            <div class="nav-actions">
                <a href="https://ops.sagansa.id/id/auth/login" target="_blank" class="btn btn-secondary" style="padding: 10px 24px; font-size: 0.9rem; margin: 0;">Login</a>
                <a href="https://ops.sagansa.id/id/auth/register" target="_blank" class="btn btn-primary" style="padding: 10px 24px; font-size: 0.9rem; margin: 0;">Mulai Gratis</a>
            </div>
        </div>
        <button class="mobile-toggle" id="mobileToggle" aria-label="Menu">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </div>
</nav>