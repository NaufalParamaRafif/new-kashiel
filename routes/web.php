<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HistoryPenjualanController;
use App\Http\Controllers\PelangganController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/main_dashboard', function () {
    return view('tes');
});
Route::get('/kicir', function () {
    return view('kicir');
});

Route::resource('/dashboard_category', CategoryController::class)->names('dashboard_category');
Route::resource('/dashboard_produk', ProductController::class)->names('dashboard_produk');
Route::resource('/dashboard_history_penjualan', HistoryPenjualanController::class)->names('dashboard_history_penjualan');
Route::resource('/dashboard_pelanggan', PelangganController::class)->names('dashboard_pelanggan');


// Route::get('/dashboard_pelanggan', function () {
//     return view('dashboard_pelanggan.index');
// });
// Route::get('/dashboard_produk', function () {
//     return view('dashboard_produk.index');
// });
// Route::get('/dashboard_penjualan', function () {
//     return view('dashboard_penjualan.index');
// });