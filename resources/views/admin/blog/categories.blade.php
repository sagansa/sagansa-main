@extends('admin.layouts.app', ['title' => 'Blog — Kategori'])

@section('content')
    <div class="panel" style="max-width:800px; margin-bottom:32px;">
        <div class="panel-header">
            <h2>➕ Tambah Kategori</h2>
            <a href="{{ route('admin.blog.index') }}" class="btn btn-secondary btn-sm">← Artikel</a>
        </div>
        <div style="padding:24px;">
            <form method="POST" action="{{ route('admin.blog.categories.store') }}">
                @csrf
                <div class="form-grid">
                    <div class="form-group">
                        <label for="name">Nama Kategori *</label>
                        <input type="text" id="name" name="name" class="form-control" required maxlength="100"
                               value="{{ old('name') }}" placeholder="Contoh: Tips Bisnis">
                    </div>
                    <div class="form-group">
                        <label for="color">Warna</label>
                        <select id="color" name="color" class="form-control">
                            @foreach(['blue'=>'Biru','green'=>'Hijau','purple'=>'Ungu','orange'=>'Oranye','red'=>'Merah','pink'=>'Pink','teal'=>'Teal','amber'=>'Amber'] as $v=>$l)
                                <option value="{{ $v }}" @selected(old('color') === $v)>{{ $l }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="description">Deskripsi</label>
                    <textarea id="description" name="description" class="form-control" maxlength="500" style="min-height:70px;">{{ old('description') }}</textarea>
                </div>
                <div class="form-grid">
                    <div class="form-group">
                        <label class="checkbox-row">
                            <input type="checkbox" name="is_active" value="1" @checked(old('is_active', true))> Aktif
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="sort_order">Urutan</label>
                        <input type="number" id="sort_order" name="sort_order" class="form-control" min="0" value="{{ old('sort_order', 0) }}">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">+ Tambah Kategori</button>
            </form>
        </div>
    </div>

    <div class="panel">
        <div class="panel-header">
            <h2>📂 Daftar Kategori ({{ $categories->count() }})</h2>
        </div>
        @if($categories->isEmpty())
            <div style="padding:40px; text-align:center; color:#6b7280;">Belum ada kategori.</div>
        @else
        <table>
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Warna</th>
                    <th>Jumlah Artikel</th>
                    <th>Status</th>
                    <th>Urut</th>
                    <th style="text-align:right;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $cat)
                    <tr>
                        <td>
                            <strong>{{ $cat->name }}</strong>
                            <br><small style="color:#9ca3af;">/{{ $cat->slug }}</small>
                        </td>
                        <td><span class="badge" style="background:var(--gray-100); text-transform:capitalize;">{{ $cat->color }}</span></td>
                        <td>{{ $cat->posts_count }}</td>
                        <td><span class="badge {{ $cat->is_active ? 'green' : 'gray' }}">{{ $cat->is_active ? 'Aktif' : 'Nonaktif' }}</span></td>
                        <td>{{ $cat->sort_order }}</td>
                        <td style="text-align:right;">
                            <form method="POST" action="{{ route('admin.blog.categories.destroy', $cat) }}" style="display:inline;" onsubmit="return confirm('Hapus kategori &quot;{{ $cat->name }}&quot;?');">
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
