<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    public function index()
    {
        $categories = BlogCategory::withCount('posts')->orderBy('sort_order')->orderBy('name')->get();

        return view('admin.blog.categories', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'description' => ['nullable', 'string', 'max:500'],
            'color' => ['required', 'string', 'max:30'],
            'is_active' => ['nullable', 'boolean'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        $data['is_active'] = $request->has('is_active');

        BlogCategory::create($data);

        return back()->with('success', 'Kategori ditambahkan.');
    }

    public function update(Request $request, BlogCategory $category)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'description' => ['nullable', 'string', 'max:500'],
            'color' => ['required', 'string', 'max:30'],
            'is_active' => ['nullable', 'boolean'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        $data['is_active'] = $request->has('is_active');

        $category->update($data);

        return back()->with('success', 'Kategori diperbarui.');
    }

    public function destroy(BlogCategory $category)
    {
        if ($category->posts()->exists()) {
            return back()->with('error', 'Tidak bisa hapus kategori yang masih punya artikel.');
        }

        $category->delete();

        return back()->with('success', 'Kategori dihapus.');
    }
}
