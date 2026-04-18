<?php

use Illuminate\Support\Facades\Route;

// --- Halaman Utama (Home) ---
Route::get('/', function () {
    return view('welcome');
});

// --- Rute Wajib  ---
Route::get('/profil', function () {
    return view('profil');
});

Route::get('/katalog', function () {
    return view('katalog');
});

Route::get('/bantuan', function () {
    return view('bantuan');
});

// --- Rute Navigasi ---
Route::get('/kontak', function () {
    return view('kontak');
});

Route::get('/detail-event', function () {
    return view('event-detail');
});

Route::get('/checkout', function () {
    return view('checkout');
});

Route::get('/ticket', function () {
    return view('ticket');
});

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EventController as AdminEventController;
use App\Http\Controllers\Admin\CategoryController;

// --- Rute Sisi Admin ---
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/events', [AdminEventController::class, 'indexAdmin'])->name('events.index');
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');

    // Rute untuk Laporan Transaksi ---
    Route::get('/transactions', function () {
        return view('admin.transactions');
    });
});
