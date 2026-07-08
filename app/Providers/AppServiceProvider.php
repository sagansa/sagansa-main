<?php

namespace App\Providers;

use App\Models\Feature;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Bagikan data fitur (cache 10 menit) ke partial _features.blade.php
        View::composer('welcome.partials._features', function ($view) {
            try {
                // Cache array of primitives (bukan objek Eloquent) untuk
                // menghindari masalah __PHP_Incomplete_Class saat unserialize.
                $cached = Cache::remember('features.active', now()->addMinutes(10), function () {
                    return Feature::active()->get()->map(fn ($f) => [
                        'title' => $f->title,
                        'short_description' => $f->short_description,
                        'icon' => $f->icon,
                        'color' => $f->color,
                        'image_url' => $f->image_url,
                    ])->all();
                });

                $features = collect($cached)->map(fn ($f) => (object) $f);

                // Fallback data statis jika tabel belum ter-seed
                if ($features->isEmpty()) {
                    $features = collect($this->defaultFeatures());
                }
            } catch (\Throwable $e) {
                // Jika tabel belum ada / belum migrate, pakai data statis
                $features = collect($this->defaultFeatures());
            }

            $view->with('features', $features);
        });
    }

    /**
     * Data fitur default (fallback bila DB kosong / belum migrate).
     * Struktur: [emoji, warna, judul, deskripsi]
     */
    private function defaultFeatures(): array
    {
        $items = [
            ['💳', 'green', 'QRIS dengan Nominal Otomatis', 'QRIS tampil langsung dengan nominal sesuai nilai pembayaran. Pelanggan cukup scan dan bayar — tanpa perlu input manual. Mendukung semua e-wallet dan bank Indonesia.'],
            ['🎯', 'purple', 'Variant & Modification', 'Kelola produk dengan berbagai varian rasa, ukuran, topping, dan modifikasi lainnya. Cocok untuk F&B dengan menu yang fleksibel.'],
            ['📦', 'orange', 'Fitur Paket & Bahan Baku', 'Buat paket menu yang terintegrasi dengan setiap bahan baku. Lacak penggunaan bahan secara otomatis dan dapatkan notifikasi stok menipis.'],
            ['⏰', 'blue', 'Manajemen Shift', 'Atur shift karyawan dan pantau ketepatan waktu. Sistem otomatis menandai karyawan yang tepat waktu, terlambat, atau pulang cepat — terintegrasi dengan fitur absensi.'],
            ['🧾', 'cyan', 'Tax & Biaya Layanan', 'Hitung pajak (PB1) dan biaya layanan secara otomatis. Dukungan multi-rate dan konfigurasi fleksibel sesuai regulasi Indonesia.'],
            ['🔄', 'red', 'Refund via Approval', 'Proses refund dengan sistem persetujuan berlapis. Setiap request refund harus di-approve oleh supervisor, memastikan keamanan dan akuntabilitas keuangan.'],
            ['👥', 'indigo', 'Jumlah User Tidak Terbatas', 'Tambahkan kasir, supervisor, manajer, dan admin sebanyak yang Anda butuhkan tanpa biaya tambahan per user. Semua peran dan hak akses fully customizable.'],
            ['🏪', 'teal', 'Support Foodcourt', 'Kelola banyak tenant dalam satu platform foodcourt. Setiap tenant memiliki laporan terpisah, namun manajemen pusat tetap terkontrol dalam satu dashboard.'],
            ['🇮🇩', 'amber', 'Dirancang untuk Indonesia', 'Disesuaikan sepenuhnya dengan kebutuhan bisnis Indonesia — mulai dari format struk, perhitungan pajak, integrasi pembayaran lokal, hingga dukungan bahasa Indonesia.'],
            ['📈', 'emerald', 'Skalabel: UMKM hingga Enterprise', 'Mulai dari 1 outlet hingga ratusan cabang. Sagansa tumbuh bersama bisnis Anda tanpa perlu ganti sistem. Performance tetap optimal di skala apa pun.'],
            ['📱', 'pink', 'Pemisahan Channel Online', 'Pisahkan order dari GoFood, ShopeeFood, dan GrabFood secara otomatis. Laporan per channel memudahkan analisis performa dan rekonsiliasi pembayaran.'],
            ['✅', 'sky', 'Terintegrasi Attendance', 'Absensi karyawan terhubung langsung dengan POS. Data kehadiran, terlambat, dan lembur otomatis terekam — tidak perlu aplikasi terpisah untuk mengelola SDM.'],
        ];

        return array_map(function ($i) {
            return new class($i) {
                public $title, $short_description, $icon, $color, $image_path = null, $image_url = null;
                public function __construct(array $i) {
                    $this->title = $i[2];
                    $this->short_description = $i[3];
                    $this->icon = $i[0];
                    $this->color = $i[1];
                }
            };
        }, $items);
    }
}
