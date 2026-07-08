<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Feature extends Model
{
    /**
     * Koneksi database khusus konten marketing.
     */
    protected $connection = 'mysql_main';

    protected $fillable = [
        'title',
        'slug',
        'short_description',
        'icon',
        'color',
        'image_path',
        'is_active',
        'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'sort_order' => 'integer',
        ];
    }

    /**
     * Auto-generate slug dari title jika kosong.
     */
    protected static function booted(): void
    {
        static::saving(function (Feature $feature) {
            if (empty($feature->slug)) {
                $feature->slug = Str::slug($feature->title);
            }
        });
    }

    /**
     * Scope: hanya fitur aktif, urut sort_order.
     */
    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true)->orderBy('sort_order')->orderBy('id');
    }

    /**
     * Accessor URL gambar (jika ada).
     */
    public function getImageUrlAttribute(): ?string
    {
        if (empty($this->image_path)) {
            return null;
        }

        return asset('storage/' . ltrim($this->image_path, '/'));
    }
}
