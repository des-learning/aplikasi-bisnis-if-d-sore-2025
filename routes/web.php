<?php

use App\Http\Controllers\HelloController;
use Illuminate\Support\Facades\Route;

Route::controller(HelloController::class)
    ->name('hello.')
    ->group(function () {
    Route::get('/hello/{nama}', 'helloNama')->name('nama');
    Route::get('/hello', 'hello')->name('index');
});

Route::get('/', function() {
    return view('welcome');
});
