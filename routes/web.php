<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EventController as AdminEventController;
use App\Http\Controllers\Admin\PartnerController;

// --- Halaman Utama (Home) ---
Route::get('/', [HomeController::class, 'index'])->name('home');

// Rute Login & Logout
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

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

// --- Rute Sisi Admin ---
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth'], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('events', AdminEventController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('partners', PartnerController::class);

    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/transactions', function () {
        return view('admin.transactions');
    });
});
