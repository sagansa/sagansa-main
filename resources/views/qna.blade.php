@extends('layouts.app')

@section('title', 'Tanya Jawab — Sagansa POS')
@section('description', 'Pertanyaan yang sering diajukan tentang Sagansa POS — dari cara mulai, sistem billing, integrasi, hingga teknis.')
@section('keywords', 'FAQ, tanya jawab, Q&A, Sagansa POS, pertanyaan umum')
@section('canonical', '<link rel="canonical" href="https://sagansa.id/qna">')

@section('content')
<div class="product-hero">
    <div class="product-hero-inner">
        <div class="product-hero-icon">💬</div>
        <div class="product-hero-badge" style="background: rgba(6,182,212,0.1); color: var(--accent);">Q&A</div>
        <h1>Pertanyaan yang<br>Sering Diajukan</h1>
        <p>Temukan jawaban atas pertanyaan umum tentang Sagansa POS — dari cara mulai, sistem billing, hingga integrasi yang tersedia.</p>
    </div>
</div>

<div class="product-section">
    <div class="product-section-inner" style="max-width: 800px;">
        <div class="qa-list" role="list">
            @include('welcome.partials._qa-items')
        </div>
    </div>
</div>

<div class="product-cta-section">
    <div class="product-cta-inner">
        <h2>Masih Punya Pertanyaan?</h2>
        <p>Hubungi kami via WhatsApp dan tim kami akan dengan senang hati membantu Anda.</p>
        <div class="product-cta-buttons">
            <a href="https://wa.me/628111923572?text=Halo%20Sagansa%2C%20saya%20punya%20pertanyaan" target="_blank" class="btn btn-primary">
                💬 Chat WhatsApp
            </a>
        </div>
    </div>
</div>
@endsection