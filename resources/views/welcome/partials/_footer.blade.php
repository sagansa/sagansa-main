@php
    $playStorePos = \App\Models\Setting::get('google_play_pos_link');
    $playStoreAtt = \App\Models\Setting::get('google_play_attendance_link');
    $appStorePos = \App\Models\Setting::get('app_store_pos_link');
    $appStoreAtt = \App\Models\Setting::get('app_store_attendance_link');

    $targetPos = !empty($playStorePos) ? 'target="_blank"' : 'onclick="alert(\'Sagansa POS untuk Android segera hadir di Google Play!\'); return false;"';
    $targetAtt = !empty($playStoreAtt) ? 'target="_blank"' : 'onclick="alert(\'Sagansa Attendance untuk Android segera hadir di Google Play!\'); return false;"';
    $targetAppPos = !empty($appStorePos) ? 'target="_blank"' : 'onclick="alert(\'Sagansa POS untuk iOS segera hadir di App Store!\'); return false;"';
    $targetAppAtt = !empty($appStoreAtt) ? 'target="_blank"' : 'onclick="alert(\'Sagansa Attendance untuk iOS segera hadir di App Store!\'); return false;"';
@endphp
<footer class="footer">
    <div class="footer-top">
        <div class="footer-brand">
            <a href="/" class="footer-logo">
                <img src="{{ asset('images/sagansa-logo.svg') }}" alt="Sagansa Logo" style="height: 36px; width: 36px; object-fit: contain;">
                Sagansa
            </a>
            <p class="footer-tagline">Aplikasi kasir modern & terintegrasi attendance untuk UMKM Indonesia.</p>
            <a href="https://wa.me/628111923572?text=Halo%20Sagansa%2C%20saya%20tertarik%20dengan%20Sagansa%20POS" target="_blank" class="footer-wa">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                0811-1923-572
            </a>
        </div>
        <div class="footer-cols">
            <div class="footer-col">
                <h4>Produk</h4>
                <ul>
                    <li><a href="/produk/point-of-sale">POS</a></li>
                    <li><a href="/produk/attendance">Attendance</a></li>
                    <li><a href="/produk/hardware">Hardware</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Fitur</h4>
                <ul>
                    <li><a href="/#features">Semua Fitur</a></li>
                    <li><a href="/#pricing">Harga</a></li>
                    <li><a href="/#integration">Integrasi</a></li>
                    <li><a href="/#online-orders">Online Order</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Resources</h4>
                <ul>
                    <li><a href="/qna">Q&A</a></li>
                    <li><a href="/blog">Blog</a></li>
                    <li><a href="/vlog">Vlog</a></li>
                    <li><a href="/beta">Beta Tester</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Download Play Store</h4>
                <ul>
                    <li>
                        <a href="{{ $playStorePos ?: '#' }}" {!! $targetPos !!} class="footer-app-link">
                            Sagansa POS
                        </a>
                    </li>
                    <li>
                        <a href="{{ $playStoreAtt ?: '#' }}" {!! $targetAtt !!} class="footer-app-link">
                            Sagansa Attendance
                        </a>
                    </li>
                </ul>
                <h4 style="margin-top:16px;">Download App Store</h4>
                <ul>
                    <li>
                        <a href="{{ $appStorePos ?: '#' }}" {!! $targetAppPos !!} class="footer-app-link">
                            Sagansa POS
                        </a>
                    </li>
                    <li>
                        <a href="{{ $appStoreAtt ?: '#' }}" {!! $targetAppAtt !!} class="footer-app-link">
                            Sagansa Attendance
                        </a>
                    </li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Perusahaan</h4>
                <ul>
                    <li><a href="/kebijakan-privasi">Kebijakan Privasi</a></li>
                    <li><span style="color: rgba(255,255,255,0.4); font-size: 0.85rem;">PT Sagansa Engineering Indonesia</span></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <p class="footer-text">&copy; {{ date('Y') }} Sagansa. All rights reserved.</p>
    </div>
</footer>