<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    /**
     * Koneksi database khusus untuk konten marketing.
     */
    protected $connection = 'mysql_main';

    protected $table = 'settings';

    protected $primaryKey = 'key';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'key',
        'value',
    ];

    /**
     * Dapatkan nilai setting berdasarkan key (di-cache per-key agar tidak query DB tiap render).
     */
    public static function get(string $key, ?string $default = null): ?string
    {
        return \Illuminate\Support\Facades\Cache::remember(
            'setting.' . $key,
            now()->addHour(),
            fn () => (self::find($key))?->value ?? $default
        );
    }

    /**
     * Simpan atau update nilai setting (dan invalidasi cache key terkait).
     */
    public static function set(string $key, ?string $value): void
    {
        self::updateOrCreate(
            ['key' => $key],
            ['value' => $value]
        );

        \Illuminate\Support\Facades\Cache::forget('setting.' . $key);
    }
}
