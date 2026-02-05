<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;

Route::resource('produk', ProdukController::class)->except(['index']);
Route::get('/', [ProdukController::class, 'index'])->name('produk.index');
