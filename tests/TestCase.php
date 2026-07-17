<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Config;

abstract class TestCase extends BaseTestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        // Model marketing menggunakan koneksi 'mysql_main' yang di environment
        // testing tetap menunjuk ke MySQL. Alihkan ke sqlite in-memory agar
        // test tidak butuh server MySQL, lalu jalankan migrasi di koneksi tsb.
        Config::set('database.connections.mysql_main', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'foreign_key_constraints' => true,
        ]);

        Artisan::call('migrate', ['--database' => 'mysql_main', '--force' => true]);
    }
}

