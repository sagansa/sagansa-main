<?php

use Illuminate\Support\Facades\Route;

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
