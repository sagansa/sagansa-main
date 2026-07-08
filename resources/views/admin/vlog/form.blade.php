@extends('admin.layouts.app', ['title' => isset($vlog) ? 'Edit Video' : 'Tambah Video'])

@push('styles')
<style>
    .yt-hint { background:#fef2f2; border:1px solid #fecaca; border-radius:8px; padding:10px 14px; font-size:0.78rem; color:#991b1b; margin-bottom:10px; }
    .yt-preview { margin-top:14px; }
    .yt-preview img { max-width: 240px; border-radius:8px; border:1px solid var(--gray-200); }
</style>
@endpush

@section('content')
    <div class="panel" style="max-width:800px;">
        <div class="panel-header">
            <h2>{{ isset($vlog) ? '✏️ Edit Video' : '➕ Tambah Video YouTube' }}</h2>
            <a href="{{ route('admin.vlog.index') }}" class="btn btn-secondary btn-sm">← Kembali</a>
        </div>
        <div style="padding:28px;">
            <form method="POST" action="{{ isset($vlog) ? route('admin.vlog.update', $vlog) : route('admin.vlog.store') }}" enctype="multipart/form-data">
                @csrf
                @if(isset($vlog)) @method('PUT') @endif

                <div class="form-group">
                    <label for="title">Judul Video *</label>
                    <input type="text" id="title" name="title" class="form-control" required maxlength="200"
                           value="{{ old('title', $vlog->title ?? '') }}" placeholder="Contoh: Tutorial Setup Kasir Sagansa POS">
                </div>

                <div class="form-grid">
                    <div class="form-group">
                        <label for="slug">Slug (opsional)</label>
                        <input type="text" id="slug" name="slug" class="form-control"
                               value="{{ old('slug', $vlog->slug ?? '') }}" placeholder="Otomatis dari judul">
                    </div>
                    <div class="form-group">
                        <label for="category">Kategori</label>
                        <input type="text" id="category" name="category" class="form-control"
                               value="{{ old('category', $vlog->category ?? '') }}" placeholder="Contoh: Tutorial, Tips Bisnis, Demo">
                    </div>
                </div>

                <div class="form-group">
                    <label for="youtube_url">URL YouTube *</label>
                    <div class="yt-hint">💡 Tempel URL lengkap dari YouTube. ID akan otomatis diekstrak. Contoh: https://www.youtube.com/watch?v=XXXXXXXXXXX atau https://youtu.be/XXXXXXXXXXX atau https://youtube.com/shorts/XXXXXXXXXXX</div>
                    <input type="text" id="youtube_url" name="youtube_url" class="form-control" required
                           value="{{ old('youtube_url', $vlog->youtube_url ?? '') }}" placeholder="https://www.youtube.com/watch?v=...">
                    <div class="yt-preview" id="ytPreview">
                        @if(isset($vlog) && $vlog->youtube_id)
                            <img src="{{ $vlog->thumbnail_url }}" alt="">
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="youtube_id">YouTube ID <span style="font-weight:400; color:#9ca3af;">(opsional, otomatis dari URL)</span></label>
                    <input type="text" id="youtube_id" name="youtube_id" class="form-control" maxlength="20"
                           value="{{ old('youtube_id', $vlog->youtube_id ?? '') }}" placeholder="11 karakter, mis. dQw4w9WgXcQ">
                </div>

                <div class="form-group">
                    <label for="description">Deskripsi</label>
                    <textarea id="description" name="description" class="form-control" maxlength="2000" style="min-height:100px;"
                              placeholder="Deskripsi video untuk halaman detail">{{ old('description', $vlog->description ?? '') }}</textarea>
                </div>

                <div class="form-grid">
                    <div class="form-group">
                        <label for="duration">Durasi</label>
                        <input type="text" id="duration" name="duration" class="form-control" maxlength="10"
                               value="{{ old('duration', $vlog->duration ?? '') }}" placeholder="mm:ss atau hh:mm:ss">
                    </div>
                    <div class="form-group full">
                        <label for="thumbnail">Custom Thumbnail (opsional)</label>
                        <input type="file" id="thumbnail" name="thumbnail" class="form-control" accept="image/*">
                        <div class="hint">Jika kosong, otomatis pakai thumbnail YouTube. Format: JPG, PNG, WebP. Maks {{ config('admin.max_upload_kb', 2048) }} KB.</div>
                        @if(isset($vlog) && $vlog->thumbnail)
                            <div style="margin-top:12px; display:flex; align-items:center; gap:12px;">
                                <img src="{{ $vlog->thumbnail_url }}" alt="" style="width:80px;height:45px;border-radius:6px;object-fit:cover;border:1px solid #e5e7eb;">
                                <label class="checkbox-row"><input type="checkbox" name="remove_thumbnail" value="1"> Hapus custom thumbnail (pakai YouTube)</label>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="form-grid">
                    <div class="form-group">
                        <label class="checkbox-row">
                            <input type="checkbox" name="is_published" value="1" @checked(old('is_published', $vlog->is_published ?? false))>
                            <strong>Terbitkan video</strong>
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="checkbox-row">
                            <input type="checkbox" name="is_featured" value="1" @checked(old('is_featured', $vlog->is_featured ?? false))>
                            <strong>Featured ⭐</strong>
                        </label>
                    </div>
                </div>

                @if(isset($vlog) && $vlog->is_published)
                <div class="form-group">
                    <label for="published_at">Tanggal Terbit</label>
                    <input type="datetime-local" id="published_at" name="published_at" class="form-control"
                           value="{{ old('published_at', $vlog->published_at?->format('Y-m-d\TH:i')) }}">
                </div>
                @endif

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">{{ isset($vlog) ? '💾 Simpan Perubahan' : '➕ Tambah Video' }}</button>
                    <a href="{{ route('admin.vlog.index') }}" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    // Auto-extract YouTube ID dari URL dan preview thumbnail
    const urlInput = document.getElementById('youtube_url');
    const idInput = document.getElementById('youtube_id');
    const preview = document.getElementById('ytPreview');

    function extractId(url) {
        const patterns = [
            /youtube\.com\/watch\?v=([a-zA-Z0-9_-]{11})/,
            /youtu\.be\/([a-zA-Z0-9_-]{11})/,
            /youtube\.com\/embed\/([a-zA-Z0-9_-]{11})/,
            /youtube\.com\/shorts\/([a-zA-Z0-9_-]{11})/,
            /youtube\.com\/v\/([a-zA-Z0-9_-]{11})/,
        ];
        for (const p of patterns) {
            const m = url.match(p);
            if (m) return m[1];
        }
        if (/^[a-zA-Z0-9_-]{11}$/.test(url.trim())) return url.trim();
        return null;
    }

    urlInput.addEventListener('input', () => {
        const id = extractId(urlInput.value);
        if (id) {
            if (!idInput.dataset.manual || idInput.dataset.manual === '0') {
                idInput.value = id;
            }
            preview.innerHTML = `<img src="https://img.youtube.com/vi/${id}/maxresdefault.jpg" alt="preview" onerror="this.src='https://img.youtube.com/vi/${id}/hqdefault.jpg'">`;
        }
    });

    idInput.addEventListener('input', () => {
        idInput.dataset.manual = '1';
        if (idInput.value.length === 11) {
            preview.innerHTML = `<img src="https://img.youtube.com/vi/${idInput.value}/maxresdefault.jpg" alt="preview" onerror="this.src='https://img.youtube.com/vi/${idInput.value}/hqdefault.jpg'">`;
        }
    });
</script>
@endpush
