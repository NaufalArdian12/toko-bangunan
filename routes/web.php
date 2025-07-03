<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\SupirController;
use App\Http\Controllers\StokController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:owner'])->group(function () {
    Route::get('/laporan', [LaporanController::class, 'index']);
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/transaksi', [TransaksiController::class, 'index']);
    Route::get('/stok', [StokController::class, 'index'])->name('stok.index');
    Route::post('/stok', [StokController::class, 'store'])->name('stok.store');
    Route::get('/stok/{id}/edit', [StokController::class, 'edit'])->name('stok.edit');
    Route::put('/stok/{id}', [StokController::class, 'update'])->name('stok.update');
    Route::delete('/stok/{id}', [StokController::class, 'destroy'])->name('stok.destroy');
});

Route::middleware(['auth', 'role:supir'])->group(function () {
    Route::get('/lihat-stok', [SupirController::class, 'lihatStok'])->name('supir.stok');
});



require __DIR__ . '/auth.php';
