<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        Admin::firstOrCreate(
            ['email' => 'admin@sagansa.id'],
            [
                'name' => 'Admin Sagansa',
                'email' => 'admin@sagansa.id',
                'password' => Hash::make('sagansa123'),
                'is_active' => true,
            ]
        );
    }
}
