<?php

namespace Tests\Feature;

use App\Models\BlogCategory;
use App\Models\BlogPost;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SeoAndRoutingTest extends TestCase
{
    use RefreshDatabase;

    public function test_sitemap_returns_valid_xml(): void
    {
        $response = $this->get('/sitemap.xml');

        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'application/xml');
        $response->assertSee('<urlset', false);
        $response->assertSee('/blog', false);
        $response->assertSee('<loc>', false);
    }

    public function test_static_public_routes_return_200(): void
    {
        foreach ([
            '/',
            '/blog',
            '/vlog',
            '/qna',
            '/cara-perhitungan',
            '/kebijakan-privasi',
            '/beta',
            '/download',
            '/produk/point-of-sale',
            '/produk/attendance',
            '/produk/hardware',
        ] as $route) {
            $this->get($route)->assertStatus(200);
        }
    }

    public function test_blog_show_returns_404_for_unknown_slug(): void
    {
        $this->get('/blog/slug-tidak-ada')->assertStatus(404);
    }

    public function test_blog_show_renders_published_post_with_meta(): void
    {
        $category = BlogCategory::firstOrCreate(
            ['slug' => 'tips-seo-test'],
            ['name' => 'Tips Test', 'is_active' => true]
        );

        $post = BlogPost::firstOrCreate(
            ['slug' => 'cara-mengelola-kasir-seo-test'],
            [
                'title' => 'Cara Mengelola Kasir',
                'content' => '<p>Konten artikel contoh.</p>',
                'meta_title' => 'Meta Unik Kasir',
                'is_published' => true,
                'published_at' => now(),
                'category_id' => $category->id,
            ]
        );

        $response = $this->get('/blog/' . $post->slug);

        $response->assertStatus(200);
        $response->assertSee('Meta Unik Kasir');
        $response->assertSee('https://sagansa.id/blog/' . $post->slug);
    }

    public function test_admin_login_is_throttled(): void
    {
        for ($i = 0; $i < 6; $i++) {
            $response = $this->post('/marketing-admin/login', [
                'email' => 'nonexistent@example.com',
                'password' => 'wrong-password',
            ]);
        }

        // Setelah 5 percobaan dalam 60 detik, respons harus 429 (Too Many Requests)
        $this->assertEquals(429, $response->getStatusCode());
    }
}
