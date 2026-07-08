@extends('admin.layouts.app', ['title' => 'Fitur'])

@section('content')
    <div class="panel">
        <div class="panel-header">
            <h2>✨ Daftar Fitur ({{ $features->count() }})</h2>
            <a href="{{ route('admin.features.create') }}" class="btn btn-primary btn-sm">+ Tambah Fitur</a>
        </div>
        @if($features->isEmpty())
            <div style="padding:48px; text-align:center; color:#6b7280;">
                <p style="font-size:0.95rem;">Belum ada fitur. Klik tombol di atas untuk menambahkan.</p>
            </div>
        @else
        <table>
            <thead>
                <tr>
                    <th style="width:60px;">#</th>
                    <th style="width:70px;">Ikon/Gambar</th>
                    <th>Judul</th>
                    <th>Slug</th>
                    <th style="width:80px;">Status</th>
                    <th style="width:80px;">Urut</th>
                    <th style="width:160px; text-align:right;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($features as $feature)
                    <tr>
                        <td style="color:#9ca3af;">{{ $feature->id }}</td>
                        <td>
                            @if($feature->image_url)
                                <img src="{{ $feature->image_url }}" alt="{{ $feature->title }}" style="width:40px;height:40px;border-radius:8px;object-fit:cover;">
                            @else
                                <div style="width:40px;height:40px;border-radius:8px;background:#f3f4f6;display:flex;align-items:center;justify-content:center;font-size:1.2rem;">{{ $feature->icon }}</div>
                            @endif
                        </td>
                        <td><strong>{{ $feature->title }}</strong></td>
                        <td style="color:#6b7280; font-family:monospace; font-size:0.82rem;">{{ $feature->slug }}</td>
                        <td><span class="badge {{ $feature->is_active ? 'green' : 'gray' }}">{{ $feature->is_active ? 'Aktif' : 'Nonaktif' }}</span></td>
                        <td style="color:#6b7280;">{{ $feature->sort_order }}</td>
                        <td style="text-align:right;">
                            <a href="{{ route('admin.features.edit', $feature) }}" class="btn btn-secondary btn-sm">Edit</a>
                            <form method="POST" action="{{ route('admin.features.destroy', $feature) }}" style="display:inline;" onsubmit="return confirm('Hapus fitur &quot;{{ $feature->title }}&quot;?');">
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
@endsection
