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
     * Dapatkan nilai setting berdasarkan key.
     */
    public static function get(string $key, ?string $default = null): ?string
    {
        $setting = self::find($key);
        return $setting ? $setting->value : $default;
    }

    /**
     * Simpan atau update nilai setting.
     */
    public static function set(string $key, ?string $value): void
    {
        self::updateOrCreate(
            ['key' => $key],
            ['value' => $value]
        );
    }
}
