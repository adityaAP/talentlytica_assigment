<?php
use App\Http\Controllers\NilaiController;

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [NilaiController::class, 'index'])->name('nilai');
Route::post('datatables-nilai', [NilaiController::class, 'datatable'])->name('data.nilai');
Route::post('nilai-tambah', [NilaiController::class, 'store'])->name('nilai.tambah');
Route::post('nilai-hapus', [NilaiController::class, 'hapus'])->name('nilai.hapus');
Route::post('nilai-update-proses', [NilaiController::class, 'update_proses'])->name('nilai.update.proses');
Route::get('/laporan-nilai/{id}', [NilaiController::class, 'laporan_nilai'])->name('nilai.laporan');
Route::get('/nilai-update/{id}', [NilaiController::class, 'update'])->name('nilai.update');
