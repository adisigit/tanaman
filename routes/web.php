<?php

use App\Http\Controllers\BuyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RiwayatController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/detail/{id}', [ProdukController::class, 'show'])->name('produk.show');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/detail/{id}', [KeranjangController::class, 'store'])->name('keranjang.store');
    Route::get('/keranjang', [KeranjangController::class, 'index'])->name('keranjang.index');
    Route::delete('/keranjang', [KeranjangController::class, 'destroy'])->name('keranjang.destroy');
    Route::post('/buy', [BuyController::class, 'index'])->name('buy.index');
    Route::get('/buy', [BuyController::class, 'index'])->name('buy1.index');
    Route::post('/riwayat', [BuyController::class, 'store'])->name('buy.store');
    Route::get('/riwayat', [RiwayatController::class, 'index'])->name('riwayat.index');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/tambah', [ProdukController::class,'create'])->name('produk.create');
    Route::post('/tambah', [ProdukController::class, 'store'])->name('produk.store');
    Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');
    Route::delete('/produk/{id}', [ProdukController::class, 'destroy'])->name('produk.destroy');
    Route::get('/edit/{id}', [ProdukController::class, 'edit'])->name('produk.edit');
    Route::put('/edit/{id}', [ProdukController::class, 'update'])->name('produk.update');
});

require __DIR__ . '/auth.php';

