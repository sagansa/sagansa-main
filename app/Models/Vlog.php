<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Vlog extends Model
{
    protected $connection = 'mysql_main';

    protected $fillable = [
        'title',
        'slug',
        'description',
        'youtube_id',
        'youtube_url',
        'thumbnail',
        'category',
        'duration',
        'is_published',
        'is_featured',
        'published_at',
        'views',
    ];

    protected function casts(): array
    {
        return [
            'is_published' => 'boolean',
            'is_featured' => 'boolean',
            'published_at' => 'datetime',
            'views' => 'integer',
        ];
    }

    /**
     * Catatan: rute publik /vlog/{slug} resolve via controller (string $slug).
     * Rute admin (resource) memakai id default Laravel. Tidak ada
     * getRouteKeyName() override agar URL admin & binding konsisten via id.
     * Untuk URL publik di view, gunakan $vlog->slug secara eksplisit.
     */

    protected static function booted(): void
    {
        static::saving(function (Vlog $vlog) {
            if (empty($vlog->slug)) {
                $vlog->slug = Str::slug($vlog->title);
            }

            // Auto-ekstrak youtube_id dari URL jika hanya diisi URL
            if (empty($vlog->youtube_id) && !empty($vlog->youtube_url)) {
                $vlog->youtube_id = static::extractYoutubeId($vlog->youtube_url);
            }

            if (!empty($vlog->youtube_url) && empty($vlog->youtube_id) === false) {
                $vlog->youtube_url = $vlog->youtube_url ?: "https://www.youtube.com/watch?v={$vlog->youtube_id}";
            }

            if ($vlog->is_published && empty($vlog->published_at)) {
                $vlog->published_at = now();
            }
        });
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('is_published', true)
            ->where(function ($q) {
                $q->whereNull('published_at')->orWhere('published_at', '<=', now());
            });
    }

    public function scopeFeatured(Builder $query): Builder
    {
        return $query->where('is_featured', true);
    }

    /**
     * URL embed iframe YouTube.
     */
    public function getEmbedUrlAttribute(): string
    {
        return "https://www.youtube.com/embed/{$this->youtube_id}?rel=0";
    }

    /**
     * Thumbnail URL: custom > YouTube maxres > hqdefault.
     */
    public function getThumbnailUrlAttribute(): string
    {
        if (!empty($this->thumbnail)) {
            return asset('storage/' . ltrim($this->thumbnail, '/'));
        }

        // YouTube thumbnail (maxres, fallback ke hq saat 404 via onerror di view)
        return "https://img.youtube.com/vi/{$this->youtube_id}/maxresdefault.jpg";
    }

    public function getThumbnailFallbackUrlAttribute(): string
    {
        return "https://img.youtube.com/vi/{$this->youtube_id}/hqdefault.jpg";
    }

    /**
     * Ekstrak 11-karakter video ID dari berbagai format URL YouTube.
     */
    public static function extractYoutubeId(string $url): ?string
    {
        $patterns = [
            '/youtube\.com\/watch\?v=([a-zA-Z0-9_-]{11})/',
            '/youtu\.be\/([a-zA-Z0-9_-]{11})/',
            '/youtube\.com\/embed\/([a-zA-Z0-9_-]{11})/',
            '/youtube\.com\/shorts\/([a-zA-Z0-9_-]{11})/',
            '/youtube\.com\/v\/([a-zA-Z0-9_-]{11})/',
        ];

        foreach ($patterns as $pattern) {
            if (preg_match($pattern, $url, $m)) {
                return $m[1];
            }
        }

        // Mungkin inputnya langsung ID 11 karakter
        if (preg_match('/^[a-zA-Z0-9_-]{11}$/', trim($url))) {
            return trim($url);
        }

        return null;
    }
}
