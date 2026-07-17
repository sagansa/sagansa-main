<?php

namespace App\Http\Controllers;

use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Models\Vlog;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\URL;

class SitemapController extends Controller
{
    public function index(): Response
    {
        $staticRoutes = [
            '/',
            '/produk/point-of-sale',
            '/produk/attendance',
            '/produk/hardware',
            '/blog',
            '/vlog',
            '/qna',
            '/cara-perhitungan',
            '/kebijakan-privasi',
            '/beta',
            '/download',
        ];

        $urls = [];

        foreach ($staticRoutes as $route) {
            $urls[] = $this->url(URL::to($route), 'weekly', '0.8');
        }

        foreach (BlogCategory::active()->get() as $category) {
            $urls[] = $this->url(
                route('blog.category', $category->slug),
                'weekly',
                '0.6'
            );
        }

        foreach (BlogPost::published()->latest('published_at')->get() as $post) {
            $urls[] = $this->url(
                route('blog.show', $post->slug),
                'monthly',
                '0.7',
                $post->published_at?->toAtomString()
            );
        }

        foreach (Vlog::published()->latest('published_at')->get() as $video) {
            $urls[] = $this->url(
                route('vlog.show', $video->slug),
                'monthly',
                '0.6',
                $video->published_at?->toAtomString()
            );
        }

        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL;
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . PHP_EOL;
        foreach ($urls as $item) {
            $xml .= '  <url>' . PHP_EOL;
            $xml .= '    <loc>' . htmlspecialchars($item['loc'], ENT_XML1, 'UTF-8') . '</loc>' . PHP_EOL;
            if ($item['lastmod']) {
                $xml .= '    <lastmod>' . $item['lastmod'] . '</lastmod>' . PHP_EOL;
            }
            $xml .= '    <changefreq>' . $item['changefreq'] . '</changefreq>' . PHP_EOL;
            $xml .= '    <priority>' . $item['priority'] . '</priority>' . PHP_EOL;
            $xml .= '  </url>' . PHP_EOL;
        }
        $xml .= '</urlset>';

        return response($xml, 200, ['Content-Type' => 'application/xml']);
    }

    private function url(string $loc, string $changefreq, string $priority, ?string $lastmod = null): array
    {
        return [
            'loc' => $loc,
            'lastmod' => $lastmod,
            'changefreq' => $changefreq,
            'priority' => $priority,
        ];
    }
}
