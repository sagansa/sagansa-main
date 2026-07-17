import fs from 'fs';
import path from 'path';
import sharp from 'sharp';

const __dirname = path.resolve();

// Path to warung_kaki_lima illustration
const warungPath = path.join(__dirname, 'public/images/warung_kaki_lima.png');

// Encode illustration to base64
const warungBase64 = fs.readFileSync(warungPath).toString('base64');

const svg = `
<svg width="1200" height="630" viewBox="0 0 1200 630" xmlns="http://www.w3.org/2000/svg">
  <defs>
    <!-- Background Gradient (Dark Blue/Indigo Theme) -->
    <linearGradient id="bg-grad" x1="0%" y1="0%" x2="100%" y2="100%">
      <stop offset="0%" stop-color="#070a13" />
      <stop offset="100%" stop-color="#0f172a" />
    </linearGradient>

    <!-- Fade Gradient (for blending image seamlessly from solid to transparent) -->
    <linearGradient id="fade-grad" x1="0%" y1="0%" x2="100%" y2="0%">
      <stop offset="0%" stop-color="#070a13" stop-opacity="1" />
      <stop offset="30%" stop-color="#070a13" stop-opacity="0.9" />
      <stop offset="100%" stop-color="#070a13" stop-opacity="0" />
    </linearGradient>

    <!-- Primary Blue Gradient for Logo & Accents -->
    <linearGradient id="primary-grad" x1="0%" y1="0%" x2="100%" y2="100%">
      <stop offset="0%" stop-color="#3b82f6" />
      <stop offset="100%" stop-color="#6366f1" />
    </linearGradient>

    <!-- Glow/Shadow Effect -->
    <filter id="glow" x="-20%" y="-20%" width="140%" height="140%">
      <feDropShadow dx="0" dy="6" stdDeviation="10" flood-color="#3b82f6" flood-opacity="0.35"/>
    </filter>
  </defs>

  <!-- Background -->
  <rect width="1200" height="630" fill="url(#bg-grad)" />

  <!-- Illustration on Right -->
  <g transform="translate(580, 0)">
    <!-- Image -->
    <image width="620" height="630" href="data:image/jpeg;base64,${warungBase64}" preserveAspectRatio="xMidYMid slice" />
    <!-- Gradient Fade Overlay to blend left edge -->
    <rect x="-1" y="0" width="280" height="630" fill="url(#fade-grad)" />
    <!-- Overall dark tint overlay to ensure text contrast and premium integration -->
    <rect width="620" height="630" fill="#070a13" opacity="0.18" />
  </g>

  <!-- Decorative Abstract Shapes on the left -->
  <circle cx="80" cy="80" r="300" fill="#3b82f6" opacity="0.04" />
  <circle cx="480" cy="550" r="220" fill="#6366f1" opacity="0.03" />

  <!-- =============================== -->
  <!-- KONTEN TEKS & BRANDING (KIRI)   -->
  <!-- =============================== -->

  <!-- Logo Sagansa -->
  <g transform="translate(80, 80)">
    <rect width="56" height="56" rx="14" fill="url(#primary-grad)" filter="url(#glow)" />
    <text x="28" y="39" font-family="system-ui, -apple-system, sans-serif" font-size="32" font-weight="900" fill="#ffffff" text-anchor="middle">S</text>
    <text x="74" y="39" font-family="system-ui, -apple-system, sans-serif" font-size="34" font-weight="800" fill="#ffffff">Sagansa</text>
  </g>

  <!-- Headline Utama -->
  <text x="80" y="240" font-family="system-ui, -apple-system, sans-serif" font-size="52" font-weight="900" fill="#ffffff" letter-spacing="-1.5">
    Aplikasi Kasir &amp; Absensi
  </text>
  <text x="80" y="305" font-family="system-ui, -apple-system, sans-serif" font-size="52" font-weight="900" fill="#3b82f6" letter-spacing="-1.5">
    Karyawan Terintegrasi
  </text>

  <!-- Sub-headline / Copywriting -->
  <text x="80" y="375" font-family="system-ui, -apple-system, sans-serif" font-size="24" font-weight="500" fill="#cbd5e1">
    Solusi andalan kelola operasional UMKM &amp; bisnis kuliner.
  </text>
  <text x="80" y="415" font-family="system-ui, -apple-system, sans-serif" font-size="24" font-weight="800" fill="#10b981">
    Pakai Dulu, Bayar Kemudian — Mulai Gratis!
  </text>

  <!-- Fitur Tags / Badges -->
  <g transform="translate(80, 470)">
    <!-- Tag 1: POS -->
    <rect x="0" y="0" width="135" height="42" rx="21" fill="rgba(59, 130, 246, 0.15)" stroke="rgba(59, 130, 246, 0.3)" stroke-width="1.5"/>
    <text x="67.5" y="26" font-family="system-ui, -apple-system, sans-serif" font-size="15" font-weight="700" fill="#93c5fd" text-anchor="middle">🛒 POS Kasir</text>
    
    <!-- Tag 2: Attendance -->
    <rect x="150" y="0" width="165" height="42" rx="21" fill="rgba(59, 130, 246, 0.15)" stroke="rgba(59, 130, 246, 0.3)" stroke-width="1.5"/>
    <text x="232.5" y="26" font-family="system-ui, -apple-system, sans-serif" font-size="15" font-weight="700" fill="#93c5fd" text-anchor="middle">📋 Absensi GPS</text>
    
    <!-- Tag 3: QRIS -->
    <rect x="330" y="0" width="155" height="42" rx="21" fill="rgba(59, 130, 246, 0.15)" stroke="rgba(59, 130, 246, 0.3)" stroke-width="1.5"/>
    <text x="407.5" y="26" font-family="system-ui, -apple-system, sans-serif" font-size="15" font-weight="700" fill="#93c5fd" text-anchor="middle">💳 QRIS Dinamis</text>
  </g>

  <!-- URL Website / CTA -->
  <text x="80" y="565" font-family="system-ui, -apple-system, sans-serif" font-size="18" font-weight="700" fill="#64748b" letter-spacing="1.5">
    WWW.SAGANSA.ID
  </text>
</svg>
`;

sharp(Buffer.from(svg))
  .png({ palette: true, quality: 80 })
  .toFile(path.join(__dirname, 'public/images/og-sagansa.png'))
  .then(() => {
    console.log('OG Image generated successfully using the warung_kaki_lima illustration!');
  })
  .catch(err => {
    console.error('Error generating OG Image:', err);
  });
