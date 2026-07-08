<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FeatureController extends Controller
{
    /**
     * Daftar semua fitur.
     */
    public function index()
    {
        $features = Feature::orderBy('sort_order')->orderBy('id')->get();

        return view('admin.features.index', compact('features'));
    }

    /**
     * Form tambah fitur.
     */
    public function create()
    {
        $colors = $this->colors();

        return view('admin.features.form', compact('colors'));
    }

    /**
     * Simpan fitur baru.
     */
    public function store(Request $request)
    {
        $data = $this->validateData($request);

        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store(
                config('admin.upload_paths.features', 'features'),
                'public'
            );
        }

        $data['slug'] = $data['slug'] ?? Str::slug($data['title']);

        Feature::create($data);

        return redirect()
            ->route('admin.features.index')
            ->with('success', 'Fitur berhasil ditambahkan.');
    }

    /**
     * Form edit fitur.
     */
    public function edit(Feature $feature)
    {
        $colors = $this->colors();

        return view('admin.features.form', compact('feature', 'colors'));
    }

    /**
     * Update fitur.
     */
    public function update(Request $request, Feature $feature)
    {
        $data = $this->validateData($request);

        if ($request->hasFile('image')) {
            // Hapus gambar lama
            if ($feature->image_path) {
                Storage::disk('public')->delete($feature->image_path);
            }
            $data['image_path'] = $request->file('image')->store(
                config('admin.upload_paths.features', 'features'),
                'public'
            );
        }

        if ($request->boolean('remove_image') && $feature->image_path) {
            Storage::disk('public')->delete($feature->image_path);
            $data['image_path'] = null;
        }

        $feature->update($data);

        return redirect()
            ->route('admin.features.index')
            ->with('success', 'Fitur berhasil diperbarui.');
    }

    /**
     * Hapus fitur.
     */
    public function destroy(Feature $feature)
    {
        if ($feature->image_path) {
            Storage::disk('public')->delete($feature->image_path);
        }
        $feature->delete();

        return redirect()
            ->route('admin.features.index')
            ->with('success', 'Fitur berhasil dihapus.');
    }

    /**
     * Validasi data input.
     */
    private function validateData(Request $request): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:150'],
            'slug' => ['nullable', 'string', 'max:150'],
            'short_description' => ['required', 'string', 'max:500'],
            'icon' => ['nullable', 'string', 'max:50'],
            'color' => ['required', 'string', 'max:30'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp,svg', 'max:' . config('admin.max_upload_kb', 2048)],
            'remove_image' => ['nullable', 'boolean'],
            'is_active' => ['nullable', 'boolean'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ], [
            'image.max' => 'Ukuran gambar maksimal ' . config('admin.max_upload_kb', 2048) . ' KB.',
        ]);
    }

    /**
     * Opsi warna ikon (sinkron dengan CSS .feature-icon.* di welcome.css).
     */
    private function colors(): array
    {
        return [
            'blue' => 'Biru', 'green' => 'Hijau', 'purple' => 'Ungu',
            'orange' => 'Oranye', 'cyan' => 'Cyan', 'pink' => 'Pink',
            'red' => 'Merah', 'indigo' => 'Indigo', 'teal' => 'Teal',
            'amber' => 'Amber', 'emerald' => 'Emerald', 'sky' => 'Sky',
        ];
    }
}
