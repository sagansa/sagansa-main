<?php

namespace Database\Seeders;

use App\Models\BlogCategory;
use Illuminate\Database\Seeder;

class BlogCategorySeeder extends Seeder
{
    public function run(): void
    {
        $cats = [
            ['Tips Bisnis', 'blue', 'Tips praktis untuk mengembangkan bisnis F&B dan UMKM Indonesia.'],
            ['Tutorial', 'green', 'Panduan langkah demi langkah menggunakan Sagansa POS.'],
            ['Industri', 'purple', 'Insight dan tren industri F&B, retail, dan teknologi kasir.'],
            ['Fitur', 'orange', 'Penjelasan mendalam fitur-fitur Sagansa POS.'],
        ];

        foreach ($cats as $idx => [$name, $color, $desc]) {
            BlogCategory::firstOrCreate(
                ['name' => $name],
                [
                    'slug' => \Illuminate\Support\Str::slug($name),
                    'description' => $desc,
                    'color' => $color,
                    'is_active' => true,
                    'sort_order' => $idx,
                ]
            );
        }
    }
}
