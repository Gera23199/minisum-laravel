<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OperacionController;

Route::get('/', function () {
    return redirect()->route('suma.index');
});

Route::get('/suma', [OperacionController::class, 'index'])->name('suma.index');
Route::post('/suma', [OperacionController::class, 'store'])->name('suma.store');