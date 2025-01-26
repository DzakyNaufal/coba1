<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AgamaController;
use App\Http\Controllers\CetakController;
use App\Http\Controllers\PenulisController;
use App\Http\Controllers\RegistrasiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::resource('penulis', PenulisController::class);
Route::resource('buku', BukuController::class);
Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
Route::resource('registrasi', RegistrasiController::class);
Route::resource('agama', AgamaController::class);


Route::post('/user/login', [AuthController::class, 'userLogin'])->name('user.login');

// Admin login route
Route::get('/admin/login', [AuthController::class, 'adminLoginPage'])->name('admin.login.page');
Route::post('/admin/login', [AuthController::class, 'adminLogin'])->name('admin.login');

// Other existing routes...
Route::get('/cetak/{id}', [CetakController::class, 'cetak'])->name('cetak');


