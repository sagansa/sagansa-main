<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Admin Panel Konfigurasi
    |--------------------------------------------------------------------------
    |
    | Konfigurasi untuk panel admin konten marketing Sagansa (fitur, blog, vlog).
    | Kredensial default admin dibuat lewat seeder (lihat AdminSeeder).
    |
    */

    // Prefix URL untuk area admin
    'prefix' => env('ADMIN_PREFIX', 'admin'),

    // Redirect setelah login berhasil
    'redirect_after_login' => 'admin.dashboard',

    // Upload path untuk gambar (relatif terhadap storage/app/public)
    'upload_paths' => [
        'features' => 'features',
        'blog' => 'blog',
        'vlog' => 'vlog',
    ],

    // Maks. ukuran upload dalam KB
    'max_upload_kb' => 2048,
];
