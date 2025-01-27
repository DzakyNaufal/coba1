<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\AgamaController;
use App\Http\Controllers\CetakController;
use App\Http\Controllers\PenulisController;
use App\Http\Controllers\RegistrasiController;
use App\Http\Controllers\HomeController; // Import HomeController
use App\Http\Controllers\AdminController; // Import AdminController

//
// Welcome page
Route::get('/', [HomeController::class, 'index'])->name('welcome');

// User login route
Route::get('/user/login', [AuthController::class, 'userLogin'])->name('user.login');
Route::post('/userLogin', [AuthController::class, 'userLogin'])->name('user.login');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin login route
Route::get('/admin/login', [AuthController::class, 'adminLoginPage'])->name('admin.login.page');
Route::post('adminLogin', [AuthController::class, 'adminLogin'])->name('admin.login');

// Admin dashboard route
Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

// Other routes
Route::get('/cetak/{id}', [CetakController::class, 'cetak'])->name('cetak');
Route::resource('penulis', PenulisController::class);
Route::resource('buku', BukuController::class);
Route::resource('agama', AgamaController::class);

//Registrasi
Route::resource('registrasi', RegistrasiController::class);
Route::get('registrasi', [RegistrasiController::class, 'index'])->name('registrasi.index');
Route::post('registrasi', [RegistrasiController::class, 'store'])->name('registrasi.store');
Route::get('registrasi/cetak/{id}', [RegistrasiController::class, 'cetak'])->name('registrasi.cetak'); // Updated to GET
Route::get('registrasi/download/{id}', [RegistrasiController::class, 'downloadPDF'])->name('downloadPDF');
Route::delete('registrasi/{id}', action: [RegistrasiController::class, 'destroy'])->name('registrasi.destroy');

//PDF
Route::get('registrasi/download/{id}', [CetakController::class, 'downloadPDF'])->name('downloadPDF');
