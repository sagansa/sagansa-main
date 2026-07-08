<?php

namespace Database\Seeders;

use App\Models\BlogCategory;
use App\Models\BlogPost;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BlogPostSeeder extends Seeder
{
    public function run(): void
    {
        // Hanya seed jika belum ada artikel sama sekali
        if (BlogPost::exists()) {
            return;
        }

        $tipsCat = BlogCategory::where('slug', 'tips-bisnis')->first();

        $post = BlogPost::create([
            'title' => '5 Strategi Meningkatkan Omzet Cafe di Era Digital',
            'slug' => '5-strategi-meningkatkan-omzet-cafe',
            'excerpt' => 'Pelajari 5 strategi terbukti untuk meningkatkan omzet cafe Anda dengan memanfaatkan teknologi POS, QRIS, dan integrasi online order.',
            'content' => '<p>Memiliki cafe di era digital menuntut lebih dari sekadar menyajikan kopi yang nikmat. Persaingan yang ketat menuntut pemilik cafe untuk berpikir strategis tentang bagaimana meningkatkan omzet secara berkelanjutan. Berikut adalah 5 strategi yang terbukti efektif.</p>

<h2>1. Optimalkan Pembayaran Digital dengan QRIS</h2>
<p>QRIS (Quick Response Code Indonesian Standard) telah menjadi standar pembayaran di Indonesia. Dengan Sagansa POS, QRIS muncul otomatis dengan nominal yang sesuai — pelanggan cukup scan dan bayar tanpa perlu input manual.</p>
<blockquote>Pelanggan yang bisa membayar dengan cepat cenderung kembali lagi. Proses pembayaran yang lancar adalah pengalaman positif yang sulit dilupakan.</blockquote>

<h2>2. Integrasikan Channel Online (GoFood, ShopeeFood, GrabFood)</h2>
<p>Online food delivery kini menyumbang porsi signifikan dari omzet F&B. Sagansa POS memungkinkan Anda memisahkan order dari setiap channel secara otomatis, sehingga laporan keuangan tetap akurat.</p>
<ul>
    <li>Pisahkan revenue per channel untuk analisis yang tepat</li>
    <li>Hindari double-entry yang memakan waktu</li>
    <li>Rekonsiliasi pembayaran lebih mudah</li>
</ul>

<h2>3. Kelola Inventory dengan Bahan Baku</h2>
<p>Stok yang habis di tengah hari operasional adalah mimpi buruk. Dengan fitur bahan baku, Anda bisa mendapat notifikasi otomatis saat stok menipis dan menghindari kehilangan penjualan.</p>

<h2>4. Manfaatkan Data Absensi Karyawan</h2>
<p>Karyawan adalah aset terbesar cafe Anda. Dengan absensi terintegrasi, Anda bisa memantau ketepatan waktu, mengatur shift optimal, dan mengurangi biaya operasional yang tidak perlu.</p>

<h2>5. Gunakan Data untuk Pengambilan Keputusan</h2>
<p>Laporan real-time dari Sagansa POS memberi visibilitas penuh atas performa bisnis Anda. Produk terlaris, jam tersibuk, hingga margin per kategori — semuanya bisa dianalisis.</p>

<h2>Mulai Sekarang, Gratis</h2>
<p>Dengan sistem "pakai dulu, bayar kemudian", Sagansa POS memungkinkan Anda mulai bertransformasi tanpa biaya awal. <strong>Promo berlaku: maksimal hanya Rp59.000 per store per bulan (dari harga normal Rp99.000).</strong></p>

<p><a href="https://ops.sagansa.id/auth/register">Daftar sekarang</a> dan rasakan sendiri manfaatnya.</p>',
            'category_id' => $tipsCat?->id,
            'meta_title' => '5 Strategi Meningkatkan Omzet Cafe di Era Digital | Blog Sagansa',
            'meta_description' => 'Pelajari 5 strategi terbukti meningkatkan omzet cafe dengan POS, QRIS, dan integrasi online order. Tips praktis untuk pemilik cafe di Indonesia.',
            'tags' => 'cafe, omzet, tips bisnis, qris, online order',
            'is_published' => true,
            'is_featured' => true,
            'published_at' => now()->subDays(3),
            'author_id' => 1,
        ]);
    }
}
