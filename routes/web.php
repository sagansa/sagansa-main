<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BetaTesterController as AdminBetaTesterController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\BlogPostController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FeatureController;
use App\Http\Controllers\Admin\VlogController as AdminVlogController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BetaTesterController;
use App\Http\Controllers\VlogController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Routes (Marketing Site)
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/kebijakan-privasi', function () {
    return view('privacy-policy');
});

Route::get('/cara-perhitungan', function () {
    return view('billing');
});

Route::get('/produk/point-of-sale', function () {
    return view('products.point-of-sale');
});

Route::get('/produk/attendance', function () {
    return view('products.attendance');
});

Route::get('/produk/hardware', function () {
    return view('products.hardware');
});

Route::get('/qna', function () {
    return view('qna');
});

Route::get('/download', function () {
    return view('download');
});

// Beta Tester (pendaftaran email untuk Google Play Closed Testing)
Route::get('/beta', [BetaTesterController::class, 'create'])->name('beta.create');
Route::post('/beta', [BetaTesterController::class, 'store'])->middleware('throttle:5,60')->name('beta.store');

// Blog (artikel)
Route::prefix('blog')->group(function () {
    Route::get('/', [BlogController::class, 'index'])->name('blog.index');
    Route::get('/kategori/{slug}', [BlogController::class, 'byCategory'])->name('blog.category');
    Route::get('/{slug}', [BlogController::class, 'show'])->name('blog.show');
});

// Vlog (video YouTube)
Route::prefix('vlog')->group(function () {
    Route::get('/', [VlogController::class, 'index'])->name('vlog.index');
    Route::get('/{slug}', [VlogController::class, 'show'])->name('vlog.show');
});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->name('admin.')->group(function () {
    // Auth (di luar middleware admin)
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Area admin (terproteksi)
    Route::middleware('admin')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        // Fitur
        Route::resource('features', FeatureController::class)->except(['show']);

        // Blog Posts
        Route::resource('blog', BlogPostController::class)
            ->except(['show'])
            ->parameter('blog', 'post')
            ->names([
                'index' => 'blog.index',
                'create' => 'blog.create',
                'store' => 'blog.store',
                'edit' => 'blog.edit',
                'update' => 'blog.update',
                'destroy' => 'blog.destroy',
            ]);
        Route::post('/blog/{post}/toggle', [BlogPostController::class, 'togglePublish'])->name('blog.toggle');

        // Blog Categories
        Route::get('/blog-categories', [BlogCategoryController::class, 'index'])->name('blog.categories');
        Route::post('/blog-categories', [BlogCategoryController::class, 'store'])->name('blog.categories.store');
        Route::put('/blog-categories/{category}', [BlogCategoryController::class, 'update'])->name('blog.categories.update');
        Route::delete('/blog-categories/{category}', [BlogCategoryController::class, 'destroy'])->name('blog.categories.destroy');

        // Vlog
        Route::resource('vlog', AdminVlogController::class)
            ->except(['show'])
            ->parameter('vlog', 'vlog');
        Route::post('/vlog/{vlog}/toggle', [AdminVlogController::class, 'togglePublish'])->name('vlog.toggle');

        // Beta Tester
        Route::get('/beta-testers', [AdminBetaTesterController::class, 'index'])->name('beta.index');
        Route::get('/beta-testers/export', [AdminBetaTesterController::class, 'export'])->name('beta.export');
        Route::post('/beta-testers/{tester}/status', [AdminBetaTesterController::class, 'updateStatus'])->name('beta.status');
        Route::delete('/beta-testers/{tester}', [AdminBetaTesterController::class, 'destroy'])->name('beta.destroy');
    });
});
