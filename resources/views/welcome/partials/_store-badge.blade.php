@php($isComingSoon = empty($link) || $link === '#')
<a href="{{ $link ?: '#' }}" @if(!$isComingSoon) target="_blank" @else onclick="alert('{{ $alert }}'); return false;" @endif class="app-store-btn {{ $isComingSoon ? 'coming-soon' : '' }}">
    @if($type === 'appstore')
        <svg viewBox="0 0 24 24" fill="url(#appstore-logo-gradient)">
            <defs>
                <linearGradient id="appstore-logo-gradient" x1="0" y1="0" x2="0" y2="1">
                    <stop offset="0" stop-color="#3EC1FF"/>
                    <stop offset="1" stop-color="#0A6CFF"/>
                </linearGradient>
            </defs>
            <path d="M17.05 20.28c-.98.95-2.05.8-3.08.35-1.09-.46-2.09-.48-3.24 0-1.44.62-2.2.44-3.06-.35C2.79 15.25 3.51 7.59 9.05 7.31c1.35.07 2.29.74 3.08.8 1.18-.24 2.31-.93 3.57-.84 1.51.12 2.65.72 3.4 1.8-3.12 1.87-2.38 5.98.48 7.13-.57 1.5-1.31 2.99-2.54 4.09zM12.03 7.25c-.15-2.23 1.66-4.07 3.74-4.25.29 2.58-2.34 4.5-3.74 4.25z"/>
        </svg>
        <span class="btn-text">
            <span class="small">Download on the</span>
            <span class="big">App Store</span>
        </span>
    @else
        <svg viewBox="0 0 24 24">
            <path fill="#00A0FF" d="M3.609 1.814L13.792 12 3.61 22.186a.996.996 0 0 1-.61-.92V2.734a1 1 0 0 1 .609-.92z"/>
            <path fill="#00F076" d="M5.864 2.658L16.8 9.49l-2.302 2.302-8.635-9.134z"/>
            <path fill="#FFE400" d="M17.698 9.508l2.302 2.302a1 1 0 0 1 0 1.38l-2.302 2.302L15.396 12l2.302-3.492z"/>
            <path fill="#FF3A44" d="M14.499 12.707l2.302 2.302-10.937 6.333 8.635-8.635z"/>
        </svg>
        <span class="btn-text">
            <span class="small">GET IT ON</span>
            <span class="big">Google Play</span>
        </span>
    @endif
</a>
