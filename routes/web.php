<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\UserController;

Auth::routes();

// ====================
// Redirect Default
// ====================
Route::get('/', function () {
    return redirect()->route('homepage');
});

// ====================
// Halaman Homepage
// ====================
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
// Route::resource otomatis membuat route index, create, store, show, edit, update, destroy
Route::resource('kategori', KategoriController::class);
Route::resource('barang', BarangController::class);
Route::resource('peminjaman', PeminjamanController::class);
Route::resource('users', UserController::class)->only(['index', 'create', 'store', 'destroy']);
use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Peminjaman;

Route::get('/dashboard', function () {
    $totalBarang = Barang::count();
    $totalKategori = Kategori::count();
    $peminjamanAktif = Peminjaman::where('status', 'Dipinjam')->count();
    $peminjamanSelesai = Peminjaman::where('status', 'Dikembalikan')->count();

    return view('dashboard', compact('totalBarang', 'totalKategori', 'peminjamanAktif', 'peminjamanSelesai'));
})->name('dashboard');