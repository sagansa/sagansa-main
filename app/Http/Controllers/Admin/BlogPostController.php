<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogPostController extends Controller
{
    /**
     * Daftar semua artikel.
     */
    public function index()
    {
        $posts = BlogPost::with('category')
            ->latest()
            ->paginate(15);

        return view('admin.blog.index', compact('posts'));
    }

    /**
     * Form tambah artikel.
     */
    public function create()
    {
        $categories = BlogCategory::active()->orderBy('name')->get();

        return view('admin.blog.form', compact('categories'));
    }

    /**
     * Simpan artikel baru.
     */
    public function store(Request $request)
    {
        $data = $this->validateData($request);

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')->store(
                config('admin.upload_paths.blog', 'blog'),
                'public'
            );
        }

        $data['slug'] = $data['slug'] ?? Str::slug($data['title']);
        $data['author_id'] = auth('admin')->id();
        $data['is_published'] = $request->has('is_published');
        $data['is_featured'] = $request->has('is_featured');
        $data['published_at'] = $data['is_published'] ? ($data['published_at'] ?? now()) : null;

        BlogPost::create($data);

        return redirect()
            ->route('admin.blog.index')
            ->with('success', 'Artikel berhasil ditambahkan.');
    }

    /**
     * Form edit artikel.
     */
    public function edit(BlogPost $post)
    {
        $categories = BlogCategory::active()->orderBy('name')->get();

        return view('admin.blog.form', compact('post', 'categories'));
    }

    /**
     * Update artikel.
     */
    public function update(Request $request, BlogPost $post)
    {
        $data = $this->validateData($request);

        if ($request->hasFile('thumbnail')) {
            if ($post->thumbnail) {
                Storage::disk('public')->delete($post->thumbnail);
            }
            $data['thumbnail'] = $request->file('thumbnail')->store(
                config('admin.upload_paths.blog', 'blog'),
                'public'
            );
        }

        if ($request->boolean('remove_thumbnail') && $post->thumbnail) {
            Storage::disk('public')->delete($post->thumbnail);
            $data['thumbnail'] = null;
        }

        $data['is_published'] = $request->has('is_published');
        $data['is_featured'] = $request->has('is_featured');

        // Saat toggle ke publish pertama kali, isi published_at
        if ($data['is_published'] && !$post->is_published && empty($data['published_at'])) {
            $data['published_at'] = now();
        } elseif (!$data['is_published']) {
            $data['published_at'] = null;
        }

        $post->update($data);

        return redirect()
            ->route('admin.blog.index')
            ->with('success', 'Artikel berhasil diperbarui.');
    }

    /**
     * Toggle publish (untuk tombol cepat).
     */
    public function togglePublish(BlogPost $post)
    {
        $post->is_published = !$post->is_published;
        if ($post->is_published && !$post->published_at) {
            $post->published_at = now();
        }
        $post->save();

        return back()->with('success', $post->is_published ? 'Artikel diterbitkan.' : 'Artikel di-unpublish.');
    }

    /**
     * Hapus artikel.
     */
    public function destroy(BlogPost $post)
    {
        if ($post->thumbnail) {
            Storage::disk('public')->delete($post->thumbnail);
        }
        $post->delete();

        return redirect()
            ->route('admin.blog.index')
            ->with('success', 'Artikel berhasil dihapus.');
    }

    private function validateData(Request $request): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:200'],
            'slug' => ['nullable', 'string', 'max:200'],
            'excerpt' => ['nullable', 'string', 'max:500'],
            'content' => ['required', 'string'],
            'thumbnail' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:' . config('admin.max_upload_kb', 2048)],
            'remove_thumbnail' => ['nullable', 'boolean'],
            'category_id' => ['nullable', 'exists:' . (new BlogCategory)->getTable() . ',id'],
            'meta_title' => ['nullable', 'string', 'max:200'],
            'meta_description' => ['nullable', 'string', 'max:300'],
            'tags' => ['nullable', 'string', 'max:500'],
            'is_published' => ['nullable', 'boolean'],
            'is_featured' => ['nullable', 'boolean'],
            'published_at' => ['nullable', 'date'],
        ]);
    }
}
