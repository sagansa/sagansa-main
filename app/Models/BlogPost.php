<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class BlogPost extends Model
{
    protected $connection = 'mysql_main';

    protected $table = 'blog_posts';

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'thumbnail',
        'category_id',
        'meta_title',
        'meta_description',
        'tags',
        'is_published',
        'is_featured',
        'published_at',
        'author_id',
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
     * Catatan: rute publik /blog/{slug} resolve via controller (string $slug).
     * Rute admin (resource) memakai id default Laravel. Tidak ada
     * getRouteKeyName() override agar URL admin & binding konsisten via id.
     * Untuk URL publik di view, gunakan $post->slug secara eksplisit.
     */

    protected static function booted(): void
    {
        static::saving(function (BlogPost $post) {
            if (empty($post->slug)) {
                $post->slug = Str::slug($post->title);
            }

            // Auto-set published_at saat pertama kali dipublikasi
            if ($post->is_published && empty($post->published_at)) {
                $post->published_at = now();
            }
        });
    }

    /**
     * Scope: hanya yang sudah publish dan sudah jadwal publikasinya.
     */
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

    public function category(): BelongsTo
    {
        return $this->belongsTo(BlogCategory::class, 'category_id');
    }

    /**
     * URL thumbnail (jika ada), fallback ke null.
     */
    public function getThumbnailUrlAttribute(): ?string
    {
        if (empty($this->thumbnail)) {
            return null;
        }

        return asset('storage/' . ltrim($this->thumbnail, '/'));
    }

    /**
     * Estimasi waktu baca (menit).
     */
    public function getReadingTimeAttribute(): int
    {
        $wordCount = str_word_count(strip_tags($this->content ?? ''));
        return max(1, (int) ceil($wordCount / 200));
    }

    /**
     * Tags sebagai array.
     */
    public function getTagsArrayAttribute(): array
    {
        if (empty($this->tags)) {
            return [];
        }

        return array_filter(array_map('trim', explode(',', $this->tags)));
    }

    /**
     * Meta title (fallback ke judul).
     */
    public function getMetaTitleAttribute(): ?string
    {
        return $this->attributes['meta_title'] ?? null ?: $this->title;
    }
}
