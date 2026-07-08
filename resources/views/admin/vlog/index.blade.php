@extends('admin.layouts.app', ['title' => 'Vlog — Video'])

@section('content')
    <div class="panel">
        <div class="panel-header">
            <h2>🎥 Daftar Video ({{ $vlogs->total() }})</h2>
            <a href="{{ route('admin.vlog.create') }}" class="btn btn-primary btn-sm">+ Tambah Video</a>
        </div>
        @if($vlogs->isEmpty())
            <div style="padding:48px; text-align:center; color:#6b7280;">
                <p style="font-size:0.95rem;">Belum ada video. Tambahkan video YouTube pertama Anda.</p>
            </div>
        @else
        <table>
            <thead>
                <tr>
                    <th style="width:100px;">Thumbnail</th>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>YouTube ID</th>
                    <th style="width:80px;">Views</th>
                    <th style="width:90px;">Status</th>
                    <th style="width:240px; text-align:right;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($vlogs as $v)
                    <tr>
                        <td>
                            <img src="{{ $v->thumbnail_url }}" alt="" onerror="this.src='{{ $v->thumbnail_fallback_url }}'"
                                 style="width:80px;height:45px;border-radius:6px;object-fit:cover;background:#f3f4f6;">
                        </td>
                        <td>
                            <strong>{{ \Illuminate\Support\Str::limit($v->title, 50) }}</strong>
                            @if($v->is_featured) <span class="badge green" style="margin-left:4px;">⭐</span> @endif
                            <br><small style="color:#9ca3af;">/{{ $v->slug }}</small>
                        </td>
                        <td>{{ $v->category ?? '—' }}</td>
                        <td style="font-family:monospace; font-size:0.8rem; color:#6b7280;">{{ $v->youtube_id }}</td>
                        <td style="color:#6b7280;">{{ number_format($v->views) }}</td>
                        <td><span class="badge {{ $v->is_published ? 'green' : 'gray' }}">{{ $v->is_published ? 'Terbit' : 'Draft' }}</span></td>
                        <td style="text-align:right;">
                            <form method="POST" action="{{ route('admin.vlog.toggle', $v) }}" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-secondary btn-sm">{{ $v->is_published ? 'Unpublish' : 'Publish' }}</button>
                            </form>
                            <a href="{{ route('admin.vlog.edit', $v) }}" class="btn btn-secondary btn-sm">Edit</a>
                            <a href="{{ route('vlog.show', $v->slug) }}" target="_blank" class="btn btn-secondary btn-sm" title="Lihat">👁️</a>
                            <form method="POST" action="{{ route('admin.vlog.destroy', $v) }}" style="display:inline;" onsubmit="return confirm('Hapus video ini?');">
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
        {{ $vlogs->links() }}
    </div>
@endsection
