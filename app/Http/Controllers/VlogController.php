<?php

namespace App\Http\Controllers;

use App\Models\Vlog;
use Illuminate\Http\Request;

class VlogController extends Controller
{
    /**
     * Halaman daftar video (paginated + filter kategori).
     */
    public function index(Request $request)
    {
        $query = Vlog::published()->latest('published_at');

        if ($cat = $request->get('kategori')) {
            $query->where('category', $cat);
        }

        $videos = $query->paginate(9);
        $categories = Vlog::published()
            ->whereNotNull('category')
            ->select('category')
            ->selectRaw('COUNT(*) as count')
            ->groupBy('category')
            ->orderBy('category')
            ->get();

        return view('vlog.index', compact('videos', 'categories'));
    }

    /**
     * Detail video — embed YouTube + deskripsi + related.
     */
    public function show(string $slug)
    {
        $video = Vlog::published()->where('slug', $slug)->firstOrFail();

        $key = 'vlog_viewed_' . $video->id;
        if (!session($key)) {
            $video->increment('views');
            session([$key => true]);
        }

        $related = Vlog::published()
            ->where('id', '!=', $video->id)
            ->when($video->category, fn($q) => $q->where('category', $video->category))
            ->latest('published_at')
            ->take(6)
            ->get();

        return view('vlog.detail', compact('video', 'related'));
    }
}
