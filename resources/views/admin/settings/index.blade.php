@extends('admin.layouts.app', ['title' => 'Pengaturan Link Aplikasi'])

@section('content')
    <p style="color:#6b7280; margin-bottom:32px; font-size:0.95rem;">
        Kelola link unduhan Google Play Store, Apple App Store, serta Google Group untuk program Beta Testing.
    </p>

    <div class="panel">
        <div class="panel-header">
            <h2>🔗 Link Unduhan & Pengujian</h2>
        </div>
        <div style="padding: 24px;">
            <form method="POST" action="{{ route('admin.settings.update') }}">
                @csrf
                @method('PUT')

                <div class="form-grid">
                    <!-- Sagansa POS -->
                    <div class="form-group">
                        <label for="google_play_pos_link">Google Play - Sagansa POS</label>
                        <input type="url" id="google_play_pos_link" name="google_play_pos_link" 
                               value="{{ old('google_play_pos_link', $settings['google_play_pos_link']) }}" 
                               class="form-control" placeholder="https://play.google.com/store/apps/details?id=...">
                        <div class="hint">Kosongkan jika belum tersedia (akan menampilkan status 'Coming Soon').</div>
                        @error('google_play_pos_link') <div style="color: var(--danger); font-size: 0.8rem; margin-top: 6px;">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-group">
                        <label for="app_store_pos_link">App Store - Sagansa POS</label>
                        <input type="url" id="app_store_pos_link" name="app_store_pos_link" 
                               value="{{ old('app_store_pos_link', $settings['app_store_pos_link']) }}" 
                               class="form-control" placeholder="https://apps.apple.com/app/...">
                        <div class="hint">Kosongkan jika belum tersedia.</div>
                        @error('app_store_pos_link') <div style="color: var(--danger); font-size: 0.8rem; margin-top: 6px;">{{ $message }}</div> @enderror
                    </div>

                    <!-- Sagansa Attendance -->
                    <div class="form-group">
                        <label for="google_play_attendance_link">Google Play - Sagansa Attendance</label>
                        <input type="url" id="google_play_attendance_link" name="google_play_attendance_link" 
                               value="{{ old('google_play_attendance_link', $settings['google_play_attendance_link']) }}" 
                               class="form-control" placeholder="https://play.google.com/store/apps/details?id=...">
                        <div class="hint">Kosongkan jika belum tersedia (akan menampilkan status 'Coming Soon').</div>
                        @error('google_play_attendance_link') <div style="color: var(--danger); font-size: 0.8rem; margin-top: 6px;">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-group">
                        <label for="app_store_attendance_link">App Store - Sagansa Attendance</label>
                        <input type="url" id="app_store_attendance_link" name="app_store_attendance_link" 
                               value="{{ old('app_store_attendance_link', $settings['app_store_attendance_link']) }}" 
                               class="form-control" placeholder="https://apps.apple.com/app/...">
                        <div class="hint">Kosongkan jika belum tersedia.</div>
                        @error('app_store_attendance_link') <div style="color: var(--danger); font-size: 0.8rem; margin-top: 6px;">{{ $message }}</div> @enderror
                    </div>

                    <!-- Google Group untuk Beta Tester -->
                    <div class="form-group full">
                        <label for="google_group_link">Google Group Link (Closed Testing)</label>
                        <input type="url" id="google_group_link" name="google_group_link" 
                               value="{{ old('google_group_link', $settings['google_group_link']) }}" 
                               class="form-control" placeholder="https://groups.google.com/g/sagansa-beta-testers">
                        <div class="hint">Calon penguji (beta tester) akan diarahkan ke Google Group ini terlebih dahulu agar mereka terdaftar sebagai penguji sah Google Play secara otomatis.</div>
                        @error('google_group_link') <div style="color: var(--danger); font-size: 0.8rem; margin-top: 6px;">{{ $message }}</div> @enderror
                    </div>

                    <!-- Pricing Settings -->
                    <div class="form-group full" style="border-top: 1px solid var(--gray-200); padding-top: 20px; margin-top: 10px;">
                        <h3 style="font-size: 1.05rem; font-weight: 700; color: var(--gray-900);">💰 Pengaturan Harga Kasir (POS)</h3>
                    </div>

                    <div class="form-group">
                        <label for="price_normal">Harga Normal / Dasar (Rupiah)</label>
                        <input type="number" id="price_normal" name="price_normal" required
                               value="{{ old('price_normal', $settings['price_normal']) }}" 
                               class="form-control" placeholder="99000">
                        <div class="hint">Harga standar bulanan per store. Contoh: 99000.</div>
                        @error('price_normal') <div style="color: var(--danger); font-size: 0.8rem; margin-top: 6px;">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-group">
                        <label for="price_promo">Harga Rencana / Promo (Rupiah)</label>
                        <input type="number" id="price_promo" name="price_promo"
                               value="{{ old('price_promo', $settings['price_promo']) }}" 
                               class="form-control" placeholder="59000">
                        <div class="hint">Harga promo aktif. Jika di bawah harga normal, harga normal akan dicoret otomatis.</div>
                        @error('price_promo') <div style="color: var(--danger); font-size: 0.8rem; margin-top: 6px;">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-group">
                        <label for="price_percentage">Persentase Omzet (%)</label>
                        <input type="number" step="0.1" id="price_percentage" name="price_percentage" required
                               value="{{ old('price_percentage', $settings['price_percentage']) }}" 
                               class="form-control" placeholder="1">
                        <div class="hint">Persentase billing dari omzet store (e.g. 1 untuk 1%).</div>
                        @error('price_percentage') <div style="color: var(--danger); font-size: 0.8rem; margin-top: 6px;">{{ $message }}</div> @enderror
                    </div>

                    <div class="form-group full" style="border-top: 1px solid var(--gray-200); padding-top: 20px; margin-top: 10px;">
                        <h3 style="font-size: 1.05rem; font-weight: 700; color: var(--gray-900);">📋 Pengaturan Harga Absensi (Attendance)</h3>
                    </div>

                    <div class="form-group">
                        <label for="price_attendance_additional">Tarif per Karyawan Tambahan (Rupiah)</label>
                        <input type="number" id="price_attendance_additional" name="price_attendance_additional" required
                               value="{{ old('price_attendance_additional', $settings['price_attendance_additional']) }}" 
                               class="form-control" placeholder="2000">
                        <div class="hint">Tarif bulanan per karyawan aktif mulai dari karyawan ke-6. Contoh: 2000.</div>
                        @error('price_attendance_additional') <div style="color: var(--danger); font-size: 0.8rem; margin-top: 6px;">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
@endsection
