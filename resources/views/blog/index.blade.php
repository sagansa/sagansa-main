@extends('layouts.app')

@if(isset($category) && $category)
@section('title', 'Blog Kategori ' . $category->name . ' — Sagansa')
@section('description', 'Kumpulan artikel kategori ' . $category->name . ' dari Sagansa: tips, insight, dan panduan bisnis F&B, UMKM, kasir, dan POS untuk pemilik bisnis di Indonesia.')
@section('canonical', 'https://sagansa.id/blog/kategori/' . $category->slug)
@else
@section('title', 'Blog Sagansa — Tips & Insight Bisnis F&B, UMKM, dan POS')
@section('description', 'Artikel terbaru seputar bisnis F&B, manajemen UMKM, tips kasir, integrasi QRIS & online order, dan insight industri untuk pemilik bisnis di Indonesia.')
@section('canonical', 'https://sagansa.id/blog')
@endif

@if(isset($posts) && $posts->currentPage() > 1)
@section('head')
<link rel="prev" href="https://sagansa.id/blog?page={{ $posts->currentPage() - 1 }}">
@endsection
@endif
@if(isset($posts) && $posts->hasMorePages())
@section('head')
<link rel="next" href="https://sagansa.id/blog?page={{ $posts->currentPage() + 1 }}">
@endsection
@endif

@section('head')
<style>
    .blog-hero {
        background: linear-gradient(170deg, #eff6ff 0%, #f5f3ff 50%, #fff 100%);
        padding: 140px 24px 48px;
        text-align: center;
    }
    .blog-hero h1 { font-size: 2.6rem; font-weight: 900; color: var(--gray-900); margin-bottom: 12px; letter-spacing:-0.02em; }
    .blog-hero p { font-size: 1.1rem; color: var(--gray-500); max-width: 640px; margin: 0 auto; }
    .blog-wrap { max-width: 1180px; margin: 0 auto; padding: 40px 24px 80px; display: grid; grid-template-columns: 1fr 280px; gap: 48px; }
    .blog-search { max-width: 540px; margin: 24px auto 0; position: relative; }
    .blog-search input { width: 100%; padding: 14px 18px 14px 48px; border: 1px solid var(--gray-200); border-radius: 100px; font-size: 0.95rem; font-family: inherit; }
    .blog-search input:focus { outline:none; border-color: var(--primary); }
    .blog-search svg { position: absolute; left: 18px; top: 50%; transform: translateY(-50%); color: var(--gray-400); }

    .blog-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 28px; }
    .blog-card { background:#fff; border:1px solid var(--gray-200); border-radius: 18px; overflow:hidden; transition: all 0.25s; text-decoration:none; color: inherit; display:flex; flex-direction:column; }
    .blog-card:hover { transform: translateY(-4px); box-shadow: 0 16px 40px rgba(0,0,0,0.08); border-color: transparent; }
    .blog-card-thumb { width:100%; aspect-ratio: 16/9; background: linear-gradient(135deg, #eff6ff, #f5f3ff); display:flex; align-items:center; justify-content:center; font-size: 3rem; overflow: hidden; }
    .blog-card-thumb img { width:100%; height:100%; object-fit:cover; }
    .blog-card-body { padding: 20px; flex:1; display:flex; flex-direction:column; }
    .blog-card-cat { display:inline-block; align-self:flex-start; font-size:0.72rem; font-weight:700; padding:3px 10px; border-radius:100px; background:#eff6ff; color: var(--primary); margin-bottom:10px; }
    .blog-card h3 { font-size:1.1rem; font-weight:700; color: var(--gray-900); margin-bottom:8px; line-height:1.35; }
    .blog-card p { font-size:0.88rem; color: var(--gray-500); line-height:1.6; flex:1; }
    .blog-card-meta { display:flex; align-items:center; gap:12px; margin-top:14px; padding-top:14px; border-top:1px solid var(--gray-100); font-size:0.78rem; color: var(--gray-500); }

    .blog-sidebar { position: sticky; top: 100px; align-self: start; }
    .sidebar-block { background:#fff; border:1px solid var(--gray-200); border-radius:16px; padding:20px; margin-bottom:24px; }
    .sidebar-block h4 { font-size:0.85rem; font-weight:800; text-transform:uppercase; letter-spacing:0.04em; color: var(--gray-700); margin-bottom:16px; }
    .cat-list { list-style:none; padding:0; margin:0; }
    .cat-list li { margin-bottom:4px; }
    .cat-list a { display:flex; justify-content:space-between; align-items:center; padding:9px 12px; border-radius:8px; font-size:0.9rem; color: var(--gray-700); text-decoration:none; transition: background 0.15s; }
    .cat-list a:hover, .cat-list a.active { background: var(--gray-50); color: var(--primary); font-weight:600; }
    .cat-list .count { font-size:0.75rem; background: var(--gray-100); padding:2px 8px; border-radius:100px; color: var(--gray-500); }

    .blog-empty { text-align:center; padding: 60px 20px; color: var(--gray-500); }
    .blog-empty .emoji { font-size: 3.5rem; margin-bottom: 16px; }

    .pagination { display:flex; justify-content:center; gap:6px; margin-top:48px; }
    .pagination a, .pagination span { padding:9px 14px; border:1px solid var(--gray-200); border-radius:8px; font-size:0.88rem; color: var(--gray-700); text-decoration:none; }
    .pagination a:hover { background: var(--gray-50); }
    .pagination .active, .pagination .active span { background: var(--primary); color:#fff; border-color: var(--primary); }
    .pagination .disabled { color: var(--gray-300); cursor: not-allowed; }

    @media (max-width: 900px) {
        .blog-wrap { grid-template-columns: 1fr; }
        .blog-sidebar { position: static; }
        .blog-hero h1 { font-size: 2rem; }
    }
</style>
@endsection

@section('content')
<div class="blog-hero">
    <h1>Blog Sagansa</h1>
    <p>Insight, tips, dan inspirasi untuk mengembangkan bisnis F&B dan UMKM Anda di Indonesia.</p>
    <form class="blog-search" method="GET" action="{{ url('/blog') }}">
        @if(request('kategori')) <input type="hidden" name="kategori" value="{{ request('kategori') }}"> @endif
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/></svg>
        <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari artikel...">
    </form>
</div>

<div class="blog-wrap">
    <main>
        @if($posts->isEmpty())
            <div class="blog-empty">
                <div class="emoji">📭</div>
                <h3 style="font-size:1.3rem; font-weight:700; margin-bottom:8px; color:var(--gray-700);">Belum ada artikel</h3>
                <p>Artikel blog pertama akan segera hadir. Nantikan tips dan insight bisnis dari Sagansa!</p>
            </div>
        @else
            <div class="blog-grid">
                @foreach($posts as $post)
                    <a href="{{ route('blog.show', $post->slug) }}" class="blog-card">
                        <div class="blog-card-thumb">
                            @if($post->thumbnail_url)
                                <img src="{{ $post->thumbnail_url }}" alt="{{ $post->title }}" loading="lazy">
                            @else
                                📝
                            @endif
                        </div>
                        <div class="blog-card-body">
                            @if($post->category)
                                <span class="blog-card-cat">{{ $post->category->name }}</span>
                            @endif
                            <h3>{{ $post->title }}</h3>
                            <p>{{ \Illuminate\Support\Str::limit($post->excerpt ?? strip_tags($post->content), 120) }}</p>
                            <div class="blog-card-meta">
                                <span>🗓️ {{ $post->published_at?->format('d M Y') ?? $post->created_at->format('d M Y') }}</span>
                                <span>⏱️ {{ $post->reading_time }} mnt baca</span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

            <div class="pagination">
                {{ $posts->withQueryString()->links() }}
            </div>
        @endif
    </main>

    <aside class="blog-sidebar">
        <div class="sidebar-block">
            <h4>Kategori</h4>
            <ul class="cat-list">
                <li>
                    <a href="{{ route('blog.index') }}" class="{{ !request('kategori') ? 'active' : '' }}">
                        <span>Semua Artikel</span>
                        <span class="count">{{ \App\Models\BlogPost::published()->count() }}</span>
                    </a>
                </li>
                @foreach($categories as $cat)
                    <li>
                        <a href="{{ route('blog.category', $cat->slug) }}" class="{{ request('kategori') === $cat->slug ? 'active' : '' }}">
                            <span>{{ $cat->name }}</span>
                            <span class="count">{{ $cat->posts_count }}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>

        @if($featured->isNotEmpty())
        <div class="sidebar-block">
            <h4>⭐ Featured</h4>
            <ul class="cat-list">
                @foreach($featured as $f)
                    <li>
                        <a href="{{ route('blog.show', $f->slug) }}">
                            <span>{{ \Illuminate\Support\Str::limit($f->title, 50) }}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
        @endif
    </aside>
</div>
@endsection
