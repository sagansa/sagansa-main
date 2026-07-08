@extends('admin.layouts.app', ['title' => isset($post) ? 'Edit Artikel' : 'Tulis Artikel'])

@push('styles')
<style>
    .editor-hint { background:#eff6ff; border:1px solid #bfdbfe; border-radius:8px; padding:10px 14px; font-size:0.78rem; color:#1e40af; margin-bottom:10px; }
    .char-counter { font-size:0.75rem; color:#9ca3af; text-align:right; margin-top:4px; }
</style>
@endpush

@section('content')
    <div class="panel" style="max-width:900px;">
        <div class="panel-header">
            <h2>{{ isset($post) ? '✏️ Edit Artikel' : '✍️ Tulis Artikel Baru' }}</h2>
            <a href="{{ route('admin.blog.index') }}" class="btn btn-secondary btn-sm">← Kembali</a>
        </div>
        <div style="padding:28px;">
            <form method="POST" action="{{ isset($post) ? route('admin.blog.update', $post) : route('admin.blog.store') }}" enctype="multipart/form-data">
                @csrf
                @if(isset($post)) @method('PUT') @endif

                <div class="form-group">
                    <label for="title">Judul Artikel *</label>
                    <input type="text" id="title" name="title" class="form-control" required maxlength="200"
                           value="{{ old('title', $post->title ?? '') }}" placeholder="Contoh: 5 Tips Mengelola Kasir untuk Cafe">
                </div>

                <div class="form-grid">
                    <div class="form-group">
                        <label for="slug">Slug (opsional)</label>
                        <input type="text" id="slug" name="slug" class="form-control"
                               value="{{ old('slug', $post->slug ?? '') }}" placeholder="Otomatis dari judul">
                    </div>
                    <div class="form-group">
                        <label for="category_id">Kategori</label>
                        <select id="category_id" name="category_id" class="form-control">
                            <option value="">— Tanpa kategori —</option>
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}" @selected(old('category_id', $post->category_id ?? '') == $cat->id)>{{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="excerpt">Ringkasan (excerpt)</label>
                    <textarea id="excerpt" name="excerpt" class="form-control" maxlength="500" style="min-height:80px;"
                              placeholder="Ringkasan singkat untuk daftar artikel & SEO meta. Maks 500 karakter.">{{ old('excerpt', $post->excerpt ?? '') }}</textarea>
                    <div class="char-counter"><span id="excerpt-count">{{ strlen(old('excerpt', $post->excerpt ?? '')) }}</span>/500</div>
                </div>

                <div class="form-group full">
                    <label for="content">Isi Artikel * <span style="font-weight:400; color:#9ca3af;">(HTML diperbolehkan)</span></label>
                    <div class="editor-hint">💡 Anda dapat menulis dengan tag HTML: &lt;h2&gt;, &lt;p&gt;, &lt;ul&gt;, &lt;blockquote&gt;, &lt;img&gt;, &lt;a&gt;, dll.</div>
                    <textarea id="content" name="content" class="form-control" required style="min-height:400px; font-family:monospace; font-size:0.88rem;"
                              placeholder="<h2>Subjudul</h2>&#10;<p>Tulis paragraf artikel di sini...</p>">{{ old('content', $post->content ?? '') }}</textarea>
                </div>

                <div class="form-grid">
                    <div class="form-group full">
                        <label for="thumbnail">Thumbnail / Cover</label>
                        <input type="file" id="thumbnail" name="thumbnail" class="form-control" accept="image/*">
                        <div class="hint">Format: JPG, PNG, WebP. Maks {{ config('admin.max_upload_kb', 2048) }} KB. Rasio ideal 16:9.</div>
                        @if(isset($post) && $post->thumbnail_url)
                            <div style="margin-top:12px; display:flex; align-items:center; gap:12px;">
                                <img src="{{ $post->thumbnail_url }}" alt="" style="width:80px;height:45px;border-radius:6px;object-fit:cover;border:1px solid #e5e7eb;">
                                <label class="checkbox-row"><input type="checkbox" name="remove_thumbnail" value="1"> Hapus thumbnail</label>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="tags">Tags <span style="font-weight:400; color:#9ca3af;">(pisahkan dengan koma)</span></label>
                    <input type="text" id="tags" name="tags" class="form-control" value="{{ old('tags', $post->tags ?? '') }}"
                           placeholder="kasir, umkm, tips, qris">
                </div>

                <div class="form-grid">
                    <div class="form-group">
                        <label for="meta_title">Meta Title <span style="font-weight:400; color:#9ca3af;">(SEO)</span></label>
                        <input type="text" id="meta_title" name="meta_title" class="form-control" maxlength="200"
                               value="{{ old('meta_title', $post->meta_title ?? '') }}" placeholder="Kosongkan untuk pakai judul">
                    </div>
                    <div class="form-group">
                        <label for="meta_description">Meta Description <span style="font-weight:400; color:#9ca3af;">(SEO)</span></label>
                        <input type="text" id="meta_description" name="meta_description" class="form-control" maxlength="300"
                               value="{{ old('meta_description', $post->meta_description ?? '') }}" placeholder="Kosongkan untuk pakai excerpt">
                    </div>
                </div>

                <div class="form-grid">
                    <div class="form-group">
                        <label class="checkbox-row">
                            <input type="checkbox" name="is_published" value="1" @checked(old('is_published', $post->is_published ?? false))>
                            <strong>Terbitkan artikel</strong>
                        </label>
                        <div class="hint">Jika dicentang, artikel langsung tampil di website</div>
                    </div>
                    <div class="form-group">
                        <label class="checkbox-row">
                            <input type="checkbox" name="is_featured" value="1" @checked(old('is_featured', $post->is_featured ?? false))>
                            <strong>Tandai sebagai Featured ⭐</strong>
                        </label>
                        <div class="hint">Tampil di bagian unggulan sidebar</div>
                    </div>
                </div>

                @if(isset($post) && $post->is_published)
                <div class="form-group">
                    <label for="published_at">Tanggal Terbit</label>
                    <input type="datetime-local" id="published_at" name="published_at" class="form-control"
                           value="{{ old('published_at', $post->published_at?->format('Y-m-d\TH:i')) }}">
                </div>
                @endif

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">{{ isset($post) ? '💾 Simpan Perubahan' : '✍️ Simpan Artikel' }}</button>
                    @if(isset($post))
                        <a href="{{ route('blog.show', $post->slug) }}" target="_blank" class="btn btn-secondary">👁️ Preview</a>
                    @endif
                    <a href="{{ route('admin.blog.index') }}" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        // Char counter untuk excerpt
        const excerpt = document.getElementById('excerpt');
        const counter = document.getElementById('excerpt-count');
        if (excerpt && counter) {
            excerpt.addEventListener('input', () => { counter.textContent = excerpt.value.length; });
        }
        // Auto-generate slug dari judul
        const title = document.getElementById('title');
        const slug = document.getElementById('slug');
        if (title && slug) {
            title.addEventListener('input', () => {
                if (!slug.value || slug.dataset.auto !== '0') {
                    slug.value = title.value.toLowerCase()
                        .replace(/[^a-z0-9\s-]/g, '')
                        .replace(/\s+/g, '-')
                        .replace(/-+/g, '-')
                        .replace(/^-|-$/g, '');
                    slug.dataset.auto = '1';
                }
            });
            slug.addEventListener('input', () => { slug.dataset.auto = '0'; });
        }
    </script>
@endpush
