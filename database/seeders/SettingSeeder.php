<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            'google_play_pos_link' => '',
            'google_play_attendance_link' => '',
            'app_store_pos_link' => '',
            'app_store_attendance_link' => '',
            'google_group_link' => 'https://groups.google.com/g/sagansa-beta-testers',
            'price_normal' => '99000',
            'price_promo' => '59000',
            'price_percentage' => '1',
            'price_attendance_additional' => '2000',
        ];

        foreach ($settings as $key => $value) {
            Setting::firstOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }
    }
}
