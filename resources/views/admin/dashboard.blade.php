@extends('admin.layouts.app', ['title' => 'Dashboard'])

@section('content')
    <p style="color:#6b7280; margin-bottom:32px; font-size:0.95rem;">
        Selamat datang kembali, <strong>{{ auth('admin')->user()?->name }}</strong>. Kelola konten marketing Sagansa dari panel ini.
    </p>

    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-label">✨ Fitur</div>
            <div class="stat-value">{{ $stats['features'] ?? 0 }}</div>
            <div class="stat-sub">{{ $stats['features_active'] ?? 0 }} aktif</div>
        </div>
        <div class="stat-card">
            <div class="stat-label">📝 Blog Posts</div>
            <div class="stat-value">{{ $stats['blog_posts'] ?? 0 }}</div>
            <div class="stat-sub">{{ $stats['blog_published'] ?? 0 }} terbit</div>
        </div>
        <div class="stat-card">
            <div class="stat-label">🎥 Vlog</div>
            <div class="stat-value">{{ $stats['vlogs'] ?? 0 }}</div>
            <div class="stat-sub">{{ $stats['vlogs_published'] ?? 0 }} terbit</div>
        </div>
        <div class="stat-card">
            <div class="stat-label">👥 Beta Tester</div>
            <div class="stat-value">{{ $stats['beta_testers'] ?? 0 }}</div>
            <div class="stat-sub">{{ $stats['beta_pending'] ?? 0 }} pending · {{ $stats['beta_invited'] ?? 0 }} invited</div>
        </div>
    </div>

    <div class="panel">
        <div class="panel-header">
            <h2>⚡ Aksi Cepat</h2>
        </div>
        <table>
            <tr>
                <td>Tambah fitur baru dengan gambar</td>
                <td style="text-align:right;">
                    <a href="{{ route('admin.features.create') }}" class="btn btn-primary btn-sm">+ Fitur</a>
                </td>
            </tr>
            <tr>
                <td>Tulis artikel blog baru</td>
                <td style="text-align:right;">
                    <a href="{{ route('admin.blog.create') }}" class="btn btn-primary btn-sm">+ Artikel</a>
                </td>
            </tr>
            <tr>
                <td>Tambah video vlog dari YouTube</td>
                <td style="text-align:right;">
                    <a href="{{ route('admin.vlog.create') }}" class="btn btn-primary btn-sm">+ Video</a>
                </td>
            </tr>
        </table>
    </div>

    @if(!empty($recent_posts) && $recent_posts->count() > 0)
    <div class="panel">
        <div class="panel-header">
            <h2>📝 Artikel Terbaru</h2>
            <a href="{{ route('admin.blog.index') }}" class="btn btn-secondary btn-sm">Lihat semua</a>
        </div>
        <table>
            @foreach($recent_posts as $post)
                <tr>
                    <td>{{ $post->title }}</td>
                    <td style="text-align:right;">
                        <span class="badge {{ $post->is_published ? 'green' : 'gray' }}">{{ $post->is_published ? 'Terbit' : 'Draft' }}</span>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    @endif
@endsection
