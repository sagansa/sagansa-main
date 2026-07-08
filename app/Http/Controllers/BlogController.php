<?php

namespace App\Http\Controllers;

use App\Models\BlogCategory;
use App\Models\BlogPost;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Halaman daftar artikel (paginated + filter kategori + pencarian).
     */
    public function index(Request $request)
    {
        $query = BlogPost::published()
            ->with('category')
            ->latest('published_at');

        // Filter kategori
        if ($slug = $request->get('kategori')) {
            $category = BlogCategory::where('slug', $slug)->first();
            if ($category) {
                $query->where('category_id', $category->id);
            }
        }

        // Pencarian
        if ($search = $request->get('q')) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('excerpt', 'like', "%{$search}%");
            });
        }

        $posts = $query->paginate(9);
        $categories = $this->categories();
        $featured = $this->featuredPosts();

        return view('blog.index', compact('posts', 'categories', 'featured'));
    }

    /**
     * Detail artikel berdasarkan slug.
     */
    public function show(string $slug)
    {
        $post = BlogPost::published()
            ->with('category')
            ->where('slug', $slug)
            ->firstOrFail();

        // Increment views (anti-spam sederhana via session)
        $viewedKey = 'blog_viewed_' . $post->id;
        if (!session($viewedKey)) {
            $post->increment('views');
            session([$viewedKey => true]);
        }

        $related = BlogPost::published()
            ->where('id', '!=', $post->id)
            ->when($post->category_id, fn($q) => $q->where('category_id', $post->category_id))
            ->latest('published_at')
            ->take(3)
            ->get();

        $categories = $this->categories();

        return view('blog.detail', compact('post', 'related', 'categories'));
    }

    /**
     * Filter by kategori via URL cantik /blog/kategori/{slug}.
     */
    public function byCategory(string $slug)
    {
        return $this->index(request()->merge(['kategori' => $slug]));
    }

    /**
     * Daftar kategori aktif dengan jumlah post.
     */
    private function categories()
    {
        return BlogCategory::active()
            ->withCount(['posts' => fn($q) => $q->published()])
            ->get();
    }

    /**
     * Artikel featured untuk bagian hero.
     */
    private function featuredPosts()
    {
        return BlogPost::published()->featured()->latest('published_at')->take(3)->get();
    }
}
