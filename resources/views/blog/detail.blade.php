@extends('layouts.app')

@section('title', $post->meta_title)
@section('description', $post->meta_description ?? $post->excerpt ?? \Illuminate\Support\Str::limit(strip_tags($post->content), 160))
@section('canonical', 'https://sagansa.id/blog/' . $post->slug)
@section('og_type', 'article')
@section('og_image', $post->thumbnail_url)

@section('jsonld')
@php
    $breadcrumbs = [
        [
            '@type' => 'ListItem',
            'position' => 1,
            'name' => 'Beranda',
            'item' => 'https://sagansa.id/',
        ],
        [
            '@type' => 'ListItem',
            'position' => 2,
            'name' => 'Blog',
            'item' => 'https://sagansa.id/blog',
        ],
    ];
    if ($post->category) {
        $breadcrumbs[] = [
            '@type' => 'ListItem',
            'position' => 3,
            'name' => $post->category->name,
            'item' => 'https://sagansa.id/blog/kategori/' . $post->category->slug,
        ];
        $breadcrumbs[] = [
            '@type' => 'ListItem',
            'position' => 4,
            'name' => $post->title,
            'item' => 'https://sagansa.id/blog/' . $post->slug,
        ];
    } else {
        $breadcrumbs[] = [
            '@type' => 'ListItem',
            'position' => 3,
            'name' => $post->title,
            'item' => 'https://sagansa.id/blog/' . $post->slug,
        ];
    }
    $breadcrumbData = [
        '@context' => 'https://schema.org',
        '@type' => 'BreadcrumbList',
        'itemListElement' => $breadcrumbs,
    ];
@endphp
<script type="application/ld+json">
{!! json_encode($breadcrumbData, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
</script>
@endsection

@section('head')
<style>
    .article-hero {
        background: linear-gradient(170deg, #eff6ff 0%, #f5f3ff 50%, #fff 100%);
        padding: 140px 24px 40px;
    }
    .article-hero-inner { max-width: 760px; margin: 0 auto; text-align: center; }
    .article-back { display:inline-flex; align-items:center; gap:6px; font-size:0.85rem; color: var(--gray-500); text-decoration:none; margin-bottom:20px; }
    .article-back:hover { color: var(--primary); }
    .article-cat { display:inline-block; font-size:0.75rem; font-weight:700; padding:4px 14px; border-radius:100px; background:#eff6ff; color: var(--primary); margin-bottom:16px; }
    .article-hero h1 { font-size: 2.4rem; font-weight: 900; color: var(--gray-900); margin-bottom: 16px; line-height: 1.2; letter-spacing:-0.02em; }
    .article-hero-meta { display:flex; justify-content:center; gap:20px; font-size:0.85rem; color: var(--gray-500); }
    .article-thumb { max-width: 800px; margin: 32px auto 0; border-radius: 18px; overflow:hidden; aspect-ratio: 16/9; background: linear-gradient(135deg, #eff6ff, #f5f3ff); display:flex; align-items:center; justify-content:center; font-size: 4rem; }
    .article-thumb img { width:100%; height:100%; object-fit:cover; }

    .article-body { max-width: 760px; margin: 0 auto; padding: 48px 24px 80px; }
    .article-content { font-size: 1.05rem; line-height: 1.85; color: var(--gray-700); }
    .article-content h2 { font-size: 1.6rem; font-weight:800; color: var(--gray-900); margin: 36px 0 16px; line-height:1.3; }
    .article-content h3 { font-size: 1.25rem; font-weight:700; color: var(--gray-900); margin: 28px 0 12px; }
    .article-content p { margin-bottom: 20px; }
    .article-content ul, .article-content ol { margin: 0 0 20px 24px; }
    .article-content li { margin-bottom: 8px; }
    .article-content blockquote { border-left: 4px solid var(--primary); padding: 12px 20px; margin: 24px 0; background: #eff6ff; border-radius: 0 12px 12px 0; font-style: italic; color: var(--gray-700); }
    .article-content img { max-width: 100%; border-radius: 12px; margin: 20px 0; }
    .article-content a { color: var(--primary); text-decoration: underline; }
    .article-content pre { background: var(--gray-900); color:#fff; padding: 18px; border-radius: 12px; overflow-x:auto; font-size:0.88rem; margin: 20px 0; }
    .article-content code { background: var(--gray-100); padding: 2px 6px; border-radius: 4px; font-size:0.9em; }
    .article-content pre code { background: none; padding:0; }

    .article-tags { display:flex; flex-wrap:wrap; gap:8px; margin: 32px 0; padding-top: 28px; border-top: 1px solid var(--gray-200); }
    .article-tag { font-size:0.78rem; padding: 5px 12px; border-radius: 100px; background: var(--gray-100); color: var(--gray-600); text-decoration:none; }
    .article-tag:hover { background: #eff6ff; color: var(--primary); }

    .article-share { display:flex; align-items:center; gap:12px; margin: 24px 0 48px; }
    .article-share span { font-size:0.85rem; color: var(--gray-500); font-weight:600; }
    .article-share a { width:38px; height:38px; border-radius:50%; display:flex; align-items:center; justify-content:center; background: var(--gray-100); color: var(--gray-600); transition: all 0.15s; }
    .article-share a:hover { background: var(--primary); color:#fff; }

    .related-section { background: var(--gray-50); padding: 56px 24px; }
    .related-section h2 { text-align:center; font-size:1.6rem; font-weight:800; color: var(--gray-900); margin-bottom: 32px; }
    .related-grid { max-width: 1000px; margin: 0 auto; display:grid; grid-template-columns: repeat(3, 1fr); gap: 24px; }
    .related-card { background:#fff; border:1px solid var(--gray-200); border-radius:14px; padding:20px; text-decoration:none; color:inherit; transition: all 0.2s; }
    .related-card:hover { transform: translateY(-3px); box-shadow: 0 12px 30px rgba(0,0,0,0.08); }
    .related-card h4 { font-size:1rem; font-weight:700; color: var(--gray-900); margin-bottom:8px; line-height:1.35; }
    .related-card small { color: var(--gray-500); font-size:0.78rem; }

    @media (max-width: 768px) {
        .article-hero h1 { font-size: 1.8rem; }
        .related-grid { grid-template-columns: 1fr; }
    }
</style>
@endsection

@section('content')
<div class="article-hero">
    <div class="article-hero-inner">
        <a href="{{ route('blog.index') }}" class="article-back">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
            Kembali ke Blog
        </a>
        @if($post->category)
            <span class="article-cat">{{ $post->category->name }}</span>
        @endif
        <h1>{{ $post->title }}</h1>
        <div class="article-hero-meta">
            <span>🗓️ {{ $post->published_at?->format('d M Y') ?? $post->created_at->format('d M Y') }}</span>
            <span>⏱️ {{ $post->reading_time }} menit baca</span>
            <span>👁️ {{ number_format($post->views) }}x dilihat</span>
        </div>
    </div>
    @if($post->thumbnail_url)
        <div class="article-thumb">
            <img src="{{ $post->thumbnail_url }}" alt="{{ $post->title }}">
        </div>
    @endif
</div>

<article class="article-body">
    @if($post->excerpt)
        <p style="font-size:1.2rem; line-height:1.6; color: var(--gray-600); font-style:italic; margin-bottom: 32px; padding-bottom: 24px; border-bottom: 1px solid var(--gray-200);">{{ $post->excerpt }}</p>
    @endif

    <div class="article-content">
        {!! $post->content !!}
    </div>

    @if($post->tags_array)
        <div class="article-tags">
            @foreach($post->tags_array as $tag)
                <span class="article-tag">#{{ $tag }}</span>
            @endforeach
        </div>
    @endif

    <div class="article-share">
        <span>Bagikan:</span>
        <a href="https://wa.me/?text={{ urlencode($post->title . ' - ' . url('/blog/' . $post->slug)) }}" target="_blank" title="WhatsApp">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M17.5 14.4c-.3-.1-1.7-.9-2-1-.3-.1-.5-.1-.7.1-.2.3-.7 1-.9 1.1-.2.2-.3.2-.6.1-.3-.1-1.2-.5-2.3-1.5-.9-.8-1.4-1.7-1.6-2-.2-.3 0-.5.1-.6.1-.1.3-.3.4-.5.1-.2.2-.3.3-.5.1-.2 0-.4 0-.5 0-.1-.7-1.6-.9-2.2-.2-.6-.5-.5-.7-.5h-.6c-.2 0-.5.1-.8.4-.3.3-1 1-1 2.5s1.1 2.9 1.2 3.1c.1.2 2.1 3.2 5.1 4.5.7.3 1.3.5 1.7.6.7.2 1.4.2 1.9.1.6-.1 1.7-.7 2-1.4.2-.7.2-1.2.2-1.4-.1-.1-.3-.2-.6-.3z"/></svg>
        </a>
        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url('/blog/' . $post->slug)) }}" target="_blank" title="Facebook">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M9 8h-3v4h3v12h5v-12h3.6l.4-4h-4v-1.7c0-1 .2-1.3 1.1-1.3h2.9v-5h-3.8c-3.6 0-5.2 1.6-5.2 4.6v3.4z"/></svg>
        </a>
        <a href="https://twitter.com/intent/tweet?text={{ urlencode($post->title) }}&url={{ urlencode(url('/blog/' . $post->slug)) }}" target="_blank" title="Twitter/X">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24h-6.66l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
        </a>
        <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(url('/blog/' . $post->slug)) }}" target="_blank" title="LinkedIn">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M6.94 5a2 2 0 1 1-4-.002 2 2 0 0 1 4 .002zM7 8.48H3V21h4V8.48zm6.32 0H9.34V21h3.94v-6.57c0-3.66 4.77-4 4.77 0V21H22v-7.93c0-6.17-7.06-5.94-8.72-2.91l.04-1.68z"/></svg>
        </a>
    </div>
</article>

@if($related->isNotEmpty())
<section class="related-section">
    <h2>📖 Artikel Terkait</h2>
    <div class="related-grid">
        @foreach($related as $r)
            <a href="{{ route('blog.show', $r->slug) }}" class="related-card">
                <h4>{{ $r->title }}</h4>
                <small>{{ $r->published_at?->format('d M Y') ?? $r->created_at->format('d M Y') }} · ⏱️ {{ $r->reading_time }} mnt</small>
            </a>
        @endforeach
    </div>
</section>
@endif
@endsection
