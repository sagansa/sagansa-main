<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Tampilkan form pengaturan.
     */
    public function index()
    {
        $settings = [
            'google_play_pos_link' => Setting::get('google_play_pos_link', ''),
            'google_play_attendance_link' => Setting::get('google_play_attendance_link', ''),
            'app_store_pos_link' => Setting::get('app_store_pos_link', ''),
            'app_store_attendance_link' => Setting::get('app_store_attendance_link', ''),
            'google_group_link' => Setting::get('google_group_link', 'https://groups.google.com/g/sagansa-beta-testers'),
            'price_normal' => Setting::get('price_normal', '99000'),
            'price_promo' => Setting::get('price_promo', '59000'),
            'price_percentage' => Setting::get('price_percentage', '1'),
            'price_attendance_additional' => Setting::get('price_attendance_additional', '2000'),
        ];

        return view('admin.settings.index', compact('settings'));
    }

    /**
     * Simpan pembaruan pengaturan.
     */
    public function update(Request $request)
    {
        // Bersihkan input kosong menjadi null agar tidak memicu error validasi url
        $inputs = $request->all();
        foreach ($inputs as $key => $value) {
            if ($value === '') {
                $inputs[$key] = null;
            }
        }

        // Hilangkan titik dan koma pada input harga jika dimasukkan secara manual (e.g. 59.000 -> 59000)
        if (isset($inputs['price_normal'])) {
            $inputs['price_normal'] = str_replace(['.', ','], '', $inputs['price_normal']);
        }
        if (isset($inputs['price_promo']) && $inputs['price_promo'] !== null) {
            $inputs['price_promo'] = str_replace(['.', ','], '', $inputs['price_promo']);
        }
        if (isset($inputs['price_attendance_additional'])) {
            $inputs['price_attendance_additional'] = str_replace(['.', ','], '', $inputs['price_attendance_additional']);
        }

        $request->replace($inputs);

        $data = $request->validate([
            'google_play_pos_link' => ['nullable', 'url', 'max:500'],
            'google_play_attendance_link' => ['nullable', 'url', 'max:500'],
            'app_store_pos_link' => ['nullable', 'url', 'max:500'],
            'app_store_attendance_link' => ['nullable', 'url', 'max:500'],
            'google_group_link' => ['nullable', 'url', 'max:500'],
            'price_normal' => ['required', 'numeric', 'min:0'],
            'price_promo' => ['nullable', 'numeric', 'min:0'],
            'price_percentage' => ['required', 'numeric', 'min:0', 'max:100'],
            'price_attendance_additional' => ['required', 'numeric', 'min:0'],
        ]);

        foreach ($data as $key => $value) {
            Setting::set($key, $value);
        }

        return redirect()->route('admin.settings.index')->with('success', 'Pengaturan berhasil diperbarui.');
    }
}
