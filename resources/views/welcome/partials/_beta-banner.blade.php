<div class="beta-banner" id="betaBanner" role="region" aria-label="Pengumuman Beta Tester">
    <div class="beta-banner-inner">
        <span class="beta-banner-emoji">🎉</span>
        <div class="beta-banner-text">
            <strong>Sagansa POS &amp; Attendance sudah siap!</strong>
            <span class="beta-banner-sub">Daftar jadi Beta Tester &amp; jadi yang pertama mencoba sebelum rilis resmi di Google Play Store.</span>
        </div>
        <a href="/beta" class="beta-banner-btn">Daftar Beta Tester
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
        </a>
        <button class="beta-banner-close" id="betaBannerClose" aria-label="Tutup pengumuman" type="button">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M18 6L6 18M6 6l12 12"/></svg>
        </button>
    </div>
</div>
<script>
    // Dismiss banner (simpan 7 hari di localStorage)
    (function () {
        var KEY = 'beta_banner_dismissed';
        var banner = document.getElementById('betaBanner');
        var close = document.getElementById('betaBannerClose');
        if (!banner || !close) return;

        try {
            var dismissed = JSON.parse(localStorage.getItem(KEY) || 'null');
            // dismissed = { until: timestamp }
            if (dismissed && dismissed.until && Date.now() < dismissed.until) {
                banner.style.display = 'none';
                return;
            }
        } catch (e) {}

        // Add class to body if banner is shown
        document.body.classList.add('has-beta-banner');

        close.addEventListener('click', function () {
            banner.style.display = 'none';
            document.body.classList.remove('has-beta-banner');
            try {
                localStorage.setItem(KEY, JSON.stringify({ until: Date.now() + 7 * 24 * 60 * 60 * 1000 }));
            } catch (e) {}
        });
    })();
</script>
