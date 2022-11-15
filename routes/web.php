<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaterkitController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\EkspedisiController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\DisposisiController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\PentingController;
use App\Http\Controllers\ArsipController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [StaterkitController::class, 'home'])->name('home');
Route::get('home', [StaterkitController::class, 'home'])->name('home');
// Route Components

// Route for Tabel Surat Masuk dan Keluar
Route::get('surat/index', [SuratController::class, 'index'])->name('Tabel Surat');
Route::get('surat/create/{surat}', [SuratController::class, 'create'])->name('Input Surat');
Route::post('surat/store', [SuratController::class, 'store'])->name('store');
Route::delete('surat/{id}', [SuratController::class, 'destroy'])->name('Hapus data');

// Route for Tabel Surat Penting
Route::get('penting/index', [SuratController::class, 'indexPenting'])->name('Tabel Surat Penting');


// Route for lembar disposisi
Route::get('disposisi/index', [DisposisiController::class, 'index'])->name('Data Lembar Disposisi');
Route::get('disposisi/create', [DisposisiController::class, 'create'])->name('form Lembar Disposisi');
Route::post('disposisi/store', [DisposisiController::class, 'store'])->name('Input Data Lembar Disposisi');
Route::get('disposisi/{id}/edit', [DisposisiController::class, 'edit'])->name('Edit Data Lembar Disposisi');
Route::put('disposisi/{id}', [DisposisiController::class, 'update'])->name('Update Lembar Disposisi');
Route::delete('disposisi/{id}', [DisposisiController::class, 'destroy'])->name('Hapus Lembar Disposisi');


// Route for Daftar Arsip
Route::get('arsip/index', [ArsipController::class, 'index'])->name('Daftar Arsip');


//Route for Rekap Ekspedisi
Route::get('ekspedisi/index', [EkspedisiController::class, 'index'])->name('Rekap ekspedisi');
Route::get('ekspedisi/create/{ekspedisi}', [EkspedisiController::class, 'create'])->name('Tambah Data Ekspedisi');
Route::post('ekspedisi/store', [EkspedisiController::class, 'store'])->name('Tambah Data ');
Route::get('ekspedisi/{id}/edit', [EkspedisiController::class, 'edit'])->name('Edit Data Ekspedisi');
Route::put('ekspedisi/{id}', [EkspedisiController::class, 'update'])->name('Update Data Ekspedisi');
Route::delete('ekspedisi/{id}', [EkspedisiController::class, 'destroy'])->name('Hapus Data Ekspedisi');



// locale Route
Route::get('lang/{locale}', [LanguageController::class, 'swap']);
