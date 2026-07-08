@extends('admin.layouts.app', ['title' => 'Blog — Artikel'])

@section('content')
    <div class="panel">
        <div class="panel-header">
            <h2>📝 Daftar Artikel</h2>
            <div style="display:flex; gap:8px;">
                <a href="{{ route('admin.blog.categories') }}" class="btn btn-secondary btn-sm">Kategori</a>
                <a href="{{ route('admin.blog.create') }}" class="btn btn-primary btn-sm">+ Tulis Artikel</a>
            </div>
        </div>
        @if($posts->isEmpty())
            <div style="padding:48px; text-align:center; color:#6b7280;">
                <p style="font-size:0.95rem;">Belum ada artikel. Mulai tulis artikel pertama Anda.</p>
            </div>
        @else
        <table>
            <thead>
                <tr>
                    <th style="width:80px;">Thumbnail</th>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th style="width:90px;">Status</th>
                    <th style="width:80px;">Views</th>
                    <th>Tanggal</th>
                    <th style="width:200px; text-align:right;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td>
                            @if($post->thumbnail_url)
                                <img src="{{ $post->thumbnail_url }}" alt="" style="width:50px;height:50px;border-radius:8px;object-fit:cover;">
                            @else
                                <div style="width:50px;height:50px;border-radius:8px;background:#f3f4f6;display:flex;align-items:center;justify-content:center;">📝</div>
                            @endif
                        </td>
                        <td>
                            <strong>{{ \Illuminate\Support\Str::limit($post->title, 60) }}</strong>
                            @if($post->is_featured) <span class="badge green" style="margin-left:6px;">⭐ Featured</span> @endif
                            <br><small style="color:#9ca3af;">/{{ $post->slug }}</small>
                        </td>
                        <td>{{ $post->category?->name ?? '—' }}</td>
                        <td><span class="badge {{ $post->is_published ? 'green' : 'gray' }}">{{ $post->is_published ? 'Terbit' : 'Draft' }}</span></td>
                        <td style="color:#6b7280;">{{ number_format($post->views) }}</td>
                        <td style="color:#6b7280; font-size:0.82rem;">{{ $post->published_at?->format('d M Y') ?? $post->created_at->format('d M Y') }}</td>
                        <td style="text-align:right;">
                            <form method="POST" action="{{ route('admin.blog.toggle', $post) }}" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-secondary btn-sm">{{ $post->is_published ? 'Unpublish' : 'Publish' }}</button>
                            </form>
                            <a href="{{ route('admin.blog.edit', $post) }}" class="btn btn-secondary btn-sm">Edit</a>
                            <a href="{{ route('blog.show', $post->slug) }}" target="_blank" class="btn btn-secondary btn-sm" title="Lihat">👁️</a>
                            <form method="POST" action="{{ route('admin.blog.destroy', $post) }}" style="display:inline;" onsubmit="return confirm('Hapus artikel ini?');">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>

    <div style="margin-top:24px;">
        {{ $posts->links() }}
    </div>
@endsection
