@extends('layouts.app')

@section('title', $video->title)
@section('description', \Illuminate\Support\Str::limit($video->description ?? 'Video dari Sagansa POS — tips dan tutorial bisnis.', 160))
@section('canonical', 'https://sagansa.id/vlog/' . $video->slug)
@section('og_type', 'article')
@section('og_image', $video->thumbnail_url)

@section('jsonld')
@php
    $vlogBreadcrumbs = [
        '@context' => 'https://schema.org',
        '@type' => 'BreadcrumbList',
        'itemListElement' => [
            [
                '@type' => 'ListItem',
                'position' => 1,
                'name' => 'Beranda',
                'item' => 'https://sagansa.id/',
            ],
            [
                '@type' => 'ListItem',
                'position' => 2,
                'name' => 'Vlog',
                'item' => 'https://sagansa.id/vlog',
            ],
            [
                '@type' => 'ListItem',
                'position' => 3,
                'name' => $video->title,
                'item' => 'https://sagansa.id/vlog/' . $video->slug,
            ],
        ],
    ];
@endphp
<script type="application/ld+json">
{!! json_encode($vlogBreadcrumbs, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
</script>
@endsection

@section('head')
<style>
    .vdetail-hero { background:#0f172a; padding: 120px 24px 40px; }
    .vdetail-inner { max-width: 960px; margin: 0 auto; }
    .vdetail-back { display:inline-flex; align-items:center; gap:6px; font-size:0.85rem; color: rgba(255,255,255,0.7); text-decoration:none; margin-bottom:20px; }
    .vdetail-back:hover { color:#fff; }
    .vdetail-frame { position:relative; width:100%; aspect-ratio:16/9; border-radius:16px; overflow:hidden; background:#000; box-shadow: 0 20px 60px rgba(0,0,0,0.4); }
    .vdetail-frame iframe { position:absolute; top:0; left:0; width:100%; height:100%; border:0; }

    .vdetail-body { max-width: 960px; margin: 0 auto; padding: 32px 24px 60px; }
    .vdetail-cat { display:inline-block; font-size:0.75rem; font-weight:700; text-transform:uppercase; letter-spacing:0.04em; color: var(--primary); margin-bottom:10px; }
    .vdetail-body h1 { font-size:1.9rem; font-weight:800; color: var(--gray-900); margin-bottom: 12px; line-height:1.3; }
    .vdetail-meta { display:flex; gap:20px; font-size:0.85rem; color: var(--gray-500); margin-bottom:24px; padding-bottom:24px; border-bottom:1px solid var(--gray-200); }
    .vdetail-desc { font-size:1.02rem; line-height:1.75; color: var(--gray-700); white-space:pre-wrap; }

    .vdetail-share { display:flex; align-items:center; gap:12px; margin: 32px 0; }
    .vdetail-share span { font-size:0.85rem; color: var(--gray-500); font-weight:600; }
    .vdetail-share a { width:38px; height:38px; border-radius:50%; display:flex; align-items:center; justify-content:center; background: var(--gray-100); color: var(--gray-600); }
    .vdetail-share a:hover { background: var(--primary); color:#fff; }

    .vrelated-section { background: var(--gray-50); padding: 48px 24px; }
    .vrelated-section h2 { text-align:center; font-size:1.5rem; font-weight:800; color: var(--gray-900); margin-bottom: 32px; }
    .vrelated-grid { max-width: 1100px; margin: 0 auto; display:grid; grid-template-columns: repeat(3, 1fr); gap: 24px; }
    .vrelated-card { background:#fff; border:1px solid var(--gray-200); border-radius:14px; overflow:hidden; text-decoration:none; color:inherit; transition: all 0.2s; }
    .vrelated-card:hover { transform: translateY(-3px); box-shadow: 0 12px 30px rgba(0,0,0,0.08); }
    .vrelated-thumb { position:relative; aspect-ratio:16/9; background:var(--gray-900); overflow:hidden; }
    .vrelated-thumb img { width:100%; height:100%; object-fit:cover; }
    .vrelated-play { position:absolute; top:50%; left:50%; transform:translate(-50%,-50%); width:44px; height:44px; background: rgba(255,0,0,0.9); border-radius:50%; display:flex; align-items:center; justify-content:center; }
    .vrelated-play svg { width:20px; height:20px; fill:#fff; margin-left:2px; }
    .vrelated-card-body { padding: 14px 16px; }
    .vrelated-card h4 { font-size:0.95rem; font-weight:700; color: var(--gray-900); line-height:1.35; }

    @media (max-width: 768px) {
        .vdetail-body h1 { font-size: 1.5rem; }
        .vrelated-grid { grid-template-columns: 1fr; }
    }
</style>
@endsection

@section('content')
<div class="vdetail-hero">
    <div class="vdetail-inner">
        <a href="{{ route('vlog.index') }}" class="vdetail-back">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
            Kembali ke Vlog
        </a>
        <div class="vdetail-frame">
            <iframe src="{{ $video->embed_url }}"
                    title="{{ $video->title }}"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    allowfullscreen
                    loading="lazy"></iframe>
        </div>
    </div>
</div>

<div class="vdetail-body">
    @if($video->category)
        <span class="vdetail-cat">{{ $video->category }}</span>
    @endif
    <h1>{{ $video->title }}</h1>
    <div class="vdetail-meta">
        <span>👁️ {{ number_format($video->views) }}x ditonton</span>
        <span>🗓️ {{ $video->published_at?->format('d M Y') ?? $video->created_at->format('d M Y') }}</span>
        @if($video->duration)
            <span>⏱️ {{ $video->duration }}</span>
        @endif
    </div>

    @if($video->description)
        <div class="vdetail-desc">{{ $video->description }}</div>
    @endif

    <div class="vdetail-share">
        <span>Bagikan:</span>
        <a href="https://wa.me/?text={{ urlencode($video->title . ' - ' . url('/vlog/' . $video->slug)) }}" target="_blank" title="WhatsApp">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M17.5 14.4c-.3-.1-1.7-.9-2-1-.3-.1-.5-.1-.7.1-.2.3-.7 1-.9 1.1-.2.2-.3.2-.6.1-.3-.1-1.2-.5-2.3-1.5-.9-.8-1.4-1.7-1.6-2-.2-.3 0-.5.1-.6.1-.1.3-.3.4-.5.1-.2.2-.3.3-.5.1-.2 0-.4 0-.5 0-.1-.7-1.6-.9-2.2-.2-.6-.5-.5-.7-.5h-.6c-.2 0-.5.1-.8.4-.3.3-1 1-1 2.5s1.1 2.9 1.2 3.1c.1.2 2.1 3.2 5.1 4.5.7.3 1.3.5 1.7.6.7.2 1.4.2 1.9.1.6-.1 1.7-.7 2-1.4.2-.7.2-1.2.2-1.4-.1-.1-.3-.2-.6-.3z"/></svg>
        </a>
        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url('/vlog/' . $video->slug)) }}" target="_blank" title="Facebook">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M9 8h-3v4h3v12h5v-12h3.6l.4-4h-4v-1.7c0-1 .2-1.3 1.1-1.3h2.9v-5h-3.8c-3.6 0-5.2 1.6-5.2 4.6v3.4z"/></svg>
        </a>
        <a href="https://twitter.com/intent/tweet?text={{ urlencode($video->title) }}&url={{ urlencode(url('/vlog/' . $video->slug)) }}" target="_blank" title="Twitter/X">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24h-6.66l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
        </a>
    </div>
</div>

@if($related->isNotEmpty())
<section class="vrelated-section">
    <h2>🎬 Video Lainnya</h2>
    <div class="vrelated-grid">
        @foreach($related as $r)
            <a href="{{ route('vlog.show', $r->slug) }}" class="vrelated-card">
                <div class="vrelated-thumb">
                    <img src="{{ $r->thumbnail_url }}" alt="{{ $r->title }}"
                         onerror="this.src='{{ $r->thumbnail_fallback_url }}'" loading="lazy">
                    <div class="vrelated-play"><svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg></div>
                </div>
                <div class="vrelated-card-body">
                    <h4>{{ $r->title }}</h4>
                </div>
            </a>
        @endforeach
    </div>
</section>
@endif
@endsection
