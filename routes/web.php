<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\JenisPembayaranController;
use App\Http\Controllers\KonsumenController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\TransaksiController;
use App\Models\JenisPembayaran;
use App\Models\Konsumen;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['guest'])->group(function(){
    Route::get('/', [SesiController::class, 'index'])->name('login');
    Route::post('/', [SesiController::class, 'login']);
});
Route::get('/home',function () {
    return redirect('/admin');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/admin/admin', [AdminController::class, 'admin'])->middleware('userAkses:admin');
    Route::get('/admin/petugas', [AdminController::class, 'petugas'])->middleware('userAkses:petugas');
    Route::get('/admin/pimpinan', [AdminController::class, 'pimpinan'])->middleware('userAkses:pimpinan');
    Route::get('/logout', [SesiController::class, 'logout']);
    Route::get('/data/konsumen', [KonsumenController::class, 'index'])->name('data.konsumen');
    Route::get('/konsumen/create', [KonsumenController::class, 'create'])->name('konsumen.create');
    Route::get('/konsumen/{id}/edit', [KonsumenController::class, 'edit'])->name('konsumen.edit');
    Route::post('/konsumen/{id}/update', [KonsumenController::class, 'update'])->name('konsumen.update');
    Route::post('/konsumen/store', [KonsumenController::class, 'store'])->name('konsumen.store');
    Route::delete('/konsumen/{id}/destroy', [KonsumenController::class, 'destroy'])->name('konsumen.destroy');

    Route::get('/petugas/index', [PetugasController::class, 'index'])->name('petugas.index');
    Route::get('/petugas/create', [PetugasController::class, 'create'])->name('petugas.create');
    Route::post('/petugas/store', [PetugasController::class, 'store'])->name('petugas.store');
    Route::get('/petugas/{id}/edit', [PetugasController::class, 'edit'])->name('petugas.edit');

    Route::put('/petugas/{id}/update', [PetugasController::class, 'update'])->name('petugas.update');
    Route::delete('/petugas/{id}/destroy', [PetugasController::class, 'destroy'])->name('petugas.destroy');

    Route::get('/barang/index', [BarangController::class, 'index'])->name('barang.index');
    Route::get('/barang/create', [BarangController::class, 'create'])->name('barang.create');
    Route::get('/barang/{id}/edit', [BarangController::class, 'edit'])->name('barang.edit');
    Route::post('/barang/store', [BarangController::class, 'store'])->name('barang.store');
    Route::delete('/barang/{id}/destroy', [BarangController::class, 'destroy'])->name('barang.destroy');

    Route::get('/pembayaran/index', [JenisPembayaranController::class, 'index'])->name('pembayaran.index');
    Route::get('/pembayaran/create', [JenisPembayaranController::class, 'create'])->name('pembayaran.create');
    Route::post('/pembayaran/store', [JenisPembayaranController::class, 'store'])->name('pembayaran.store');
    Route::get('/pembayaran/edit/{id}', [JenisPembayaranController::class, 'edit'])->name('pembayaran.edit');
    Route::post('/pembayaran/update/{id}', [JenisPembayaranController::class, 'update'])->name('pembayaran.update');
    Route::delete('/pembayaran/hapus/{id}', [JenisPembayaranController::class, 'destroy'])->name('pembayaran.destroy');

    Route::get('/transaksi/index', [TransaksiController::class, 'index'])->name('transaksi.index');
    Route::get('/transaksi/create', [TransaksiController::class, 'create'])->name('transaksi.create');
    Route::post('/transaksi/store', [TransaksiController::class, 'store'])->name('transaksi.store');
   


});


