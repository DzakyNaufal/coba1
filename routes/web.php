<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\AgamaController;
use App\Http\Controllers\CetakController;
use App\Http\Controllers\PenulisController;
use App\Http\Controllers\PeminjamController;
use App\Http\Controllers\RegistrasiController;
use App\Http\Controllers\HomeController; // Import HomeController
use App\Http\Controllers\AdminController; // Import AdminControlle

//
// Welcome page
Route::get('/', [HomeController::class, 'index'])->name('welcome');
// User login route
Route::post('/user/login', [AuthController::class, 'userLogin'])->name('user.login');
// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('user.logout');

// Admin login route
Route::get('/admin/login', [AuthController::class, 'adminLoginPage'])->name('admin.login.page');
Route::post('/admin/login', [AuthController::class, 'adminLogin'])->name('admin.login');
// Admin dashboard route
Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
// Logout route
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/cetak/{id}', [CetakController::class, 'cetak'])->name('cetak');
Route::resource('penulis', PenulisController::class);
Route::resource('buku', BukuController::class);
Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
Route::resource('registrasi', RegistrasiController::class);
Route::resource('agama', AgamaController::class);
Route::get('/peminjam', [PeminjamController::class, 'index'])->name('peminjam.index');
