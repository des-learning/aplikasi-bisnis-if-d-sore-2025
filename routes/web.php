<?php

use App\Http\Controllers\BarangController;
use Illuminate\Support\Facades\Route;

Route::controller(BarangController::class)
    ->name('barang.')
    ->prefix('/barang')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        // Tambahkan routing ke /{id} -> BarangController::show
    });
