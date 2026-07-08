<?php

namespace Database\Seeders;

use App\Models\Feature;
use Illuminate\Database\Seeder;

class FeatureSeeder extends Seeder
{
    /**
     * Seed 12 fitur eksisting dari _features.blade.php agar
     * website langsung punya konten saat migrate pertama kali.
     */
    public function run(): void
    {
        $features = [
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

        foreach ($features as $idx => [$icon, $color, $title, $desc]) {
            Feature::firstOrCreate(
                ['title' => $title],
                [
                    'slug' => \Illuminate\Support\Str::slug($title),
                    'short_description' => $desc,
                    'icon' => $icon,
                    'color' => $color,
                    'is_active' => true,
                    'sort_order' => $idx,
                ]
            );
        }
    }
}
