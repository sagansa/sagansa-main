@extends('admin.layouts.app', ['title' => isset($feature) ? 'Edit Fitur' : 'Tambah Fitur'])

@section('content')
    <div class="panel" style="max-width:760px;">
        <div class="panel-header">
            <h2>{{ isset($feature) ? '✏️ Edit Fitur' : '➕ Tambah Fitur' }}</h2>
            <a href="{{ route('admin.features.index') }}" class="btn btn-secondary btn-sm">← Kembali</a>
        </div>
        <div style="padding:28px;">
            <form method="POST" action="{{ isset($feature) ? route('admin.features.update', $feature) : route('admin.features.store') }}" enctype="multipart/form-data">
                @csrf
                @if(isset($feature)) @method('PUT') @endif

                <div class="form-grid">
                    <div class="form-group">
                        <label for="title">Judul Fitur *</label>
                        <input type="text" id="title" name="title" class="form-control" required
                               value="{{ old('title', $feature->title ?? '') }}" placeholder="Contoh: QRIS dengan Nominal Otomatis">
                    </div>
                    <div class="form-group">
                        <label for="slug">Slug (opsional)</label>
                        <input type="text" id="slug" name="slug" class="form-control"
                               value="{{ old('slug', $feature->slug ?? '') }}" placeholder="Otomatis dari judul jika dikosongkan">
                    </div>
                </div>

                <div class="form-group full">
                    <label for="short_description">Deskripsi Singkat *</label>
                    <textarea id="short_description" name="short_description" class="form-control" required maxlength="500"
                              placeholder="Penjelasan singkat fitur, max 500 karakter">{{ old('short_description', $feature->short_description ?? '') }}</textarea>
                </div>

                <div class="form-grid">
                    <div class="form-group">
                        <label for="icon">Ikon Emoji (fallback jika tanpa gambar)</label>
                        <input type="text" id="icon" name="icon" class="form-control"
                               value="{{ old('icon', $feature->icon ?? '✨') }}" placeholder="💳" maxlength="10">
                        <div class="hint">Salin emoji dari keyboard emoji (Win+.) atau emojipedia.org</div>
                    </div>
                    <div class="form-group">
                        <label for="color">Warna Ikon *</label>
                        <select id="color" name="color" class="form-control">
                            @foreach($colors as $value => $label)
                                <option value="{{ $value }}" @selected(old('color', $feature->color ?? 'blue') === $value)>{{ $label }}</option>
                            @endforeach
                        </select>
                        <div class="hint">Menentukan warna background ikon emoji</div>
                    </div>
                </div>

                <div class="form-group full">
                    <label for="image">Gambar Fitur (opsional)</label>
                    <input type="file" id="image" name="image" class="form-control" accept="image/*">
                    <div class="hint">Format: JPG, PNG, WebP, SVG. Maks {{ config('admin.max_upload_kb', 2048) }} KB. Jika diisi, gambar menimpa ikon emoji.</div>
                    @if(isset($feature) && $feature->image_url)
                        <div style="margin-top:12px; display:flex; align-items:center; gap:12px;">
                            <img src="{{ $feature->image_url }}" alt="" style="width:64px;height:64px;border-radius:12px;object-fit:cover;border:1px solid #e5e7eb;">
                            <label class="checkbox-row"><input type="checkbox" name="remove_image" value="1"> Hapus gambar ini</label>
                        </div>
                    @endif
                </div>

                <div class="form-grid">
                    <div class="form-group">
                        <label class="checkbox-row">
                            <input type="checkbox" name="is_active" value="1" @checked(old('is_active', $feature->is_active ?? true))>
                            Aktif (tampil di website)
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="sort_order">Urutan Tampil</label>
                        <input type="number" id="sort_order" name="sort_order" class="form-control" min="0"
                               value="{{ old('sort_order', $feature->sort_order ?? 0) }}">
                        <div class="hint">Angka kecil = tampil lebih dulu</div>
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">{{ isset($feature) ? '💾 Simpan Perubahan' : '➕ Tambah Fitur' }}</button>
                    <a href="{{ route('admin.features.index') }}" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
@endsection
