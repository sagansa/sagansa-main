<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Vlog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class VlogController extends Controller
{
    public function index()
    {
        $vlogs = Vlog::latest()->paginate(15);

        return view('admin.vlog.index', compact('vlogs'));
    }

    public function create()
    {
        return view('admin.vlog.form');
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request);

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')->store(
                config('admin.upload_paths.vlog', 'vlog'),
                'public'
            );
        }

        $data['slug'] = $data['slug'] ?? Str::slug($data['title']);
        $data['is_published'] = $request->has('is_published');
        $data['is_featured'] = $request->has('is_featured');
        $data['published_at'] = $data['is_published'] ? ($data['published_at'] ?? now()) : null;

        Vlog::create($data);

        return redirect()->route('admin.vlog.index')->with('success', 'Video berhasil ditambahkan.');
    }

    public function edit(Vlog $vlog)
    {
        return view('admin.vlog.form', compact('vlog'));
    }

    public function update(Request $request, Vlog $vlog)
    {
        $data = $this->validateData($request);

        if ($request->hasFile('thumbnail')) {
            if ($vlog->thumbnail) {
                Storage::disk('public')->delete($vlog->thumbnail);
            }
            $data['thumbnail'] = $request->file('thumbnail')->store(
                config('admin.upload_paths.vlog', 'vlog'),
                'public'
            );
        }

        if ($request->boolean('remove_thumbnail') && $vlog->thumbnail) {
            Storage::disk('public')->delete($vlog->thumbnail);
            $data['thumbnail'] = null;
        }

        $data['is_published'] = $request->has('is_published');
        $data['is_featured'] = $request->has('is_featured');

        if ($data['is_published'] && !$vlog->is_published && empty($data['published_at'])) {
            $data['published_at'] = now();
        } elseif (!$data['is_published']) {
            $data['published_at'] = null;
        }

        $vlog->update($data);

        return redirect()->route('admin.vlog.index')->with('success', 'Video berhasil diperbarui.');
    }

    public function togglePublish(Vlog $vlog)
    {
        $vlog->is_published = !$vlog->is_published;
        if ($vlog->is_published && !$vlog->published_at) {
            $vlog->published_at = now();
        }
        $vlog->save();

        return back()->with('success', $vlog->is_published ? 'Video diterbitkan.' : 'Video di-unpublish.');
    }

    public function destroy(Vlog $vlog)
    {
        if ($vlog->thumbnail) {
            Storage::disk('public')->delete($vlog->thumbnail);
        }
        $vlog->delete();

        return redirect()->route('admin.vlog.index')->with('success', 'Video berhasil dihapus.');
    }

    private function validateData(Request $request): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:200'],
            'slug' => ['nullable', 'string', 'max:200'],
            'description' => ['nullable', 'string', 'max:2000'],
            'youtube_id' => ['nullable', 'string', 'max:20'],
            'youtube_url' => ['nullable', 'string', 'max:500'],
            'thumbnail' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:' . config('admin.max_upload_kb', 2048)],
            'remove_thumbnail' => ['nullable', 'boolean'],
            'category' => ['nullable', 'string', 'max:100'],
            'duration' => ['nullable', 'string', 'max:10'],
            'is_published' => ['nullable', 'boolean'],
            'is_featured' => ['nullable', 'boolean'],
            'published_at' => ['nullable', 'date'],
        ], [
            'youtube_id.max' => 'YouTube ID maksimal 20 karakter.',
        ]);
    }
}
