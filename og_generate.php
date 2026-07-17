<?php
// Generator OG image Sagansa (1200x630) — jalankan: php og_generate.php
// Menghasilkan public/images/og-sagansa.png

declare(strict_types=1);

$width = 1200;
$height = 630;

function rgb(int $r, int $g, int $b): int {
    return ($r << 16) | ($g << 8) | $b;
}

$img = imagecreatetruecolor($width, $height);
imagesavealpha($img, true);
imagealphablending($img, true);

$white  = rgb(255, 255, 255);
$ink    = rgb(17, 24, 39);
$gray   = rgb(71, 85, 105);
$gray2  = rgb(100, 116, 139);
$blue   = rgb(59, 130, 246);
$cardBg = rgb(255, 255, 255);

$c0 = [59, 130, 246];   // biru
$c1 = [139, 92, 246];   // ungu

// Gradient background biru -> ungu
for ($y = 0; $y < $height; $y++) {
    $t = $y / ($height - 1);
    $r = (int) round($c0[0] + ($c1[0] - $c0[0]) * $t);
    $g = (int) round($c0[1] + ($c1[1] - $c0[1]) * $t);
    $b = (int) round($c0[2] + ($c1[2] - $c0[2]) * $t);
    imageline($img, 0, $y, $width, $y, rgb($r, $g, $b));
}

// Aksen blob
imagefilledellipse($img, 1080, 80, 380, 380, imagecolorallocatealpha($img, 255, 255, 255, 38));
imagefilledellipse($img, 110, 610, 340, 340, imagecolorallocatealpha($img, 255, 255, 255, 28));

// Card putih membulat
$cardX = 90; $cardY = 150; $cardW = 1020; $cardH = 330; $radius = 28;
imagefilledrectangle($img, $cardX + $radius, $cardY, $cardX + $cardW - $radius, $cardY + $cardH, $cardBg);
imagefilledrectangle($img, $cardX, $cardY + $radius, $cardX + $cardW, $cardY + $cardH - $radius, $cardBg);
foreach ([[$cardX+$radius,$cardY+$radius],[$cardX+$cardW-$radius,$cardY+$radius],[$cardX+$radius,$cardY+$cardH-$radius],[$cardX+$cardW-$radius,$cardY+$cardH-$radius]] as [$cx,$cy]) {
    imagefilledellipse($img, $cx, $cy, $radius * 2, $radius * 2, $cardBg);
}

// Logo
$logoPath = __DIR__ . '/public/images/sagansa-logo.png';
if (file_exists($logoPath)) {
    $info = getimagesize($logoPath);
    $src = imagecreatefrompng($logoPath);
    $lw = 110; $lh = 110;
    $dst = imagecreatetruecolor($lw, $lh);
    imagealphablending($dst, false);
    imagesavealpha($dst, true);
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $lw, $lh, $info[0], $info[1]);
    imagecopy($img, $dst, $cardX + 50, $cardY + 40, 0, 0, $lw, $lh);
    imagedestroy($dst);
    imagedestroy($src);
}

// Font
$font = '/System/Library/Fonts/NewYork.ttf';
if (!file_exists($font)) { $font = '/System/Library/Fonts/Geneva.ttf'; }

$title = 'Sagansa POS & Attendance';
$sub   = 'Aplikasi Kasir & Absensi Karyawan Terintegrasi';
$sub2  = 'Pakai dulu, bayar kemudian - untuk UMKM Indonesia';
$badge = 'QRIS  -  Multi-channel  -  Attendance';

if (file_exists($font)) {
    imagettftext($img, 40, 0, $cardX + 185, $cardY + 92, $ink, $font, $title);
    imagettftext($img, 22, 0, $cardX + 185, $cardY + 142, $gray, $font, $sub);
    imagettftext($img, 20, 0, $cardX + 185, $cardY + 182, $gray2, $font, $sub2);
    imagettftext($img, 18, 0, $cardX + 50, $cardY + $cardH - 35, $blue, $font, $badge);
    imagettftext($img, 20, 0, 90, 565, $white, $font, 'sagansa.id');
} else {
    imagestring($img, 5, $cardX + 185, $cardY + 60, $title, $ink);
    imagestring($img, 4, $cardX + 185, $cardY + 110, $sub, $gray);
}

$out = __DIR__ . '/public/images/og-sagansa.png';
imagepng($img, $out);
echo "OG image generated: $out (" . filesize($out) . " bytes)\n";
