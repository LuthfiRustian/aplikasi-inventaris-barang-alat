<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Auth;


Auth::routes();

// Redirect default
Route::get('/', function () {
    return redirect()->route('homepage');
});

// Halaman homepage
Route::get('/homepage', function () {
    return view('layouts.homepage');
})->name('homepage');

// ====================
// Autentikasi
// ====================
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register.form');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

// ====================
// Resource Routes
// ====================
Route::resource('kategori', KategoriController::class);
Route::resource('barang', BarangController::class);
Route::resource('peminjaman', PeminjamanController::class);

Route::post('/barang', [BarangController::class, 'store'])->name('barang.store');



