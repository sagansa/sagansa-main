<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Models\Feature;
use App\Models\Vlog;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Tampilkan dashboard admin dengan statistik ringkas.
     */
    public function index()
    {
        $stats = [
            'features' => Feature::count(),
            'features_active' => Feature::where('is_active', true)->count(),
            'blog_posts' => BlogPost::count(),
            'blog_published' => BlogPost::published()->count(),
            'vlogs' => Vlog::count(),
            'vlogs_published' => Vlog::published()->count(),
            'beta_testers' => \App\Models\BetaTester::count(),
            'beta_pending' => \App\Models\BetaTester::pending()->count(),
            'beta_invited' => \App\Models\BetaTester::invited()->count(),
        ];

        $recent_posts = BlogPost::latest()->take(5)->get();
        $recent_vlogs = Vlog::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recent_posts', 'recent_vlogs'));
    }
}
