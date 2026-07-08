@extends('layouts.app')

@section('title', 'Vlog Sagansa — Video Tips & Tutorial Bisnis, Kasir, dan POS')
@section('description', 'Tonton video tutorial, tips bisnis F&B, dan demo produk Sagansa POS. Pelajari cara mengelola kasir, absensi, dan online order dari para ahli.')
@section('canonical', 'https://sagansa.id/vlog')

@section('head')
<style>
    .vlog-hero { background: linear-gradient(170deg, #0f172a 0%, #1e1b4b 100%); color:#fff; padding: 140px 24px 56px; text-align:center; position:relative; overflow:hidden; }
    .vlog-hero::before { content:''; position:absolute; top:-30%; right:-10%; width:500px; height:500px; background: radial-gradient(circle, rgba(139,92,246,0.25) 0%, transparent 70%); border-radius:50%; }
    .vlog-hero h1 { font-size: 2.6rem; font-weight:900; margin-bottom: 12px; letter-spacing:-0.02em; position:relative; }
    .vlog-hero p { font-size: 1.1rem; color: rgba(255,255,255,0.7); max-width: 620px; margin: 0 auto; position:relative; }

    .vlog-wrap { max-width: 1180px; margin: 0 auto; padding: 48px 24px 80px; }
    .vlog-cat-filter { display:flex; flex-wrap:wrap; gap:8px; justify-content:center; margin-bottom:40px; }
    .vlog-cat-filter a { padding: 8px 18px; border-radius:100px; background:#fff; border:1px solid var(--gray-200); font-size:0.85rem; font-weight:600; color: var(--gray-600); text-decoration:none; transition: all 0.15s; }
    .vlog-cat-filter a:hover, .vlog-cat-filter a.active { background: var(--primary); color:#fff; border-color: var(--primary); }

    .vlog-grid { display:grid; grid-template-columns: repeat(auto-fill, minmax(320px, 1fr)); gap: 28px; }
    .vlog-card { background:#fff; border:1px solid var(--gray-200); border-radius:16px; overflow:hidden; text-decoration:none; color:inherit; transition: all 0.25s; }
    .vlog-card:hover { transform: translateY(-4px); box-shadow: 0 16px 40px rgba(0,0,0,0.1); border-color: transparent; }
    .vlog-card-thumb { position:relative; aspect-ratio: 16/9; background: var(--gray-900); overflow:hidden; }
    .vlog-card-thumb img { width:100%; height:100%; object-fit:cover; transition: transform 0.3s; }
    .vlog-card:hover .vlog-card-thumb img { transform: scale(1.05); }
    .vlog-play { position:absolute; top:50%; left:50%; transform:translate(-50%,-50%); width:64px; height:64px; background: rgba(255,0,0,0.9); border-radius:50%; display:flex; align-items:center; justify-content:center; box-shadow: 0 4px 20px rgba(0,0,0,0.4); }
    .vlog-play svg { width:28px; height:28px; fill:#fff; margin-left:3px; }
    .vlog-duration { position:absolute; bottom:8px; right:8px; background: rgba(0,0,0,0.85); color:#fff; font-size:0.72rem; font-weight:600; padding:3px 8px; border-radius:4px; }
    .vlog-card-body { padding: 18px 20px; }
    .vlog-card-cat { display:inline-block; font-size:0.7rem; font-weight:700; text-transform:uppercase; letter-spacing:0.04em; color: var(--primary); margin-bottom:8px; }
    .vlog-card h3 { font-size:1.05rem; font-weight:700; color: var(--gray-900); line-height:1.35; margin-bottom:8px; }
    .vlog-card p { font-size:0.85rem; color: var(--gray-500); line-height:1.5; }
    .vlog-card-meta { margin-top:12px; font-size:0.76rem; color: var(--gray-400); display:flex; gap:12px; }

    .vlog-empty { text-align:center; padding: 60px 20px; color: var(--gray-500); }
    .vlog-empty .emoji { font-size: 3.5rem; margin-bottom:16px; }

    .pagination { display:flex; justify-content:center; gap:6px; margin-top:48px; }
    .pagination a, .pagination span { padding:9px 14px; border:1px solid var(--gray-200); border-radius:8px; font-size:0.88rem; color: var(--gray-700); text-decoration:none; }
    .pagination .active span, .pagination .active { background: var(--primary); color:#fff; border-color: var(--primary); }

    @media (max-width: 640px) {
        .vlog-hero h1 { font-size: 2rem; }
        .vlog-grid { grid-template-columns: 1fr; }
    }
</style>
@endsection

@section('content')
<div class="vlog-hero">
    <h1>🎥 Vlog Sagansa</h1>
    <p>Tonton tutorial, tips bisnis, dan demo Sagansa POS langsung dari tim kami.</p>
</div>

<div class="vlog-wrap">
    @if($categories->isNotEmpty())
    <div class="vlog-cat-filter">
        <a href="{{ route('vlog.index') }}" class="{{ !request('kategori') ? 'active' : '' }}">Semua</a>
        @foreach($categories as $cat)
            <a href="{{ route('vlog.index', ['kategori' => $cat->category]) }}" class="{{ request('kategori') === $cat->category ? 'active' : '' }}">{{ $cat->category }} ({{ $cat->count }})</a>
        @endforeach
    </div>
    @endif

    @if($videos->isEmpty())
        <div class="vlog-empty">
            <div class="emoji">🎬</div>
            <h3 style="font-size:1.3rem; font-weight:700; margin-bottom:8px; color:var(--gray-700);">Belum ada video</h3>
            <p>Video vlog pertama akan segera hadir. Nantikan tutorial dan tips bisnis dari Sagansa!</p>
        </div>
    @else
        <div class="vlog-grid">
            @foreach($videos as $video)
                <a href="{{ route('vlog.show', $video->slug) }}" class="vlog-card">
                    <div class="vlog-card-thumb">
                        <img src="{{ $video->thumbnail_url }}" alt="{{ $video->title }}"
                             onerror="this.src='{{ $video->thumbnail_fallback_url }}'"
                             loading="lazy">
                        <div class="vlog-play">
                            <svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                        </div>
                        @if($video->duration)
                            <span class="vlog-duration">{{ $video->duration }}</span>
                        @endif
                    </div>
                    <div class="vlog-card-body">
                        @if($video->category)
                            <span class="vlog-card-cat">{{ $video->category }}</span>
                        @endif
                        <h3>{{ $video->title }}</h3>
                        @if($video->description)
                            <p>{{ \Illuminate\Support\Str::limit($video->description, 100) }}</p>
                        @endif
                        <div class="vlog-card-meta">
                            <span>👁️ {{ number_format($video->views) }}x</span>
                            <span>🗓️ {{ $video->published_at?->format('d M Y') ?? $video->created_at->format('d M Y') }}</span>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>

        <div class="pagination">
            {{ $videos->withQueryString()->links() }}
        </div>
    @endif
</div>
@endsection
