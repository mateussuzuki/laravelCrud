<?php

use App\Http\Controllers\CorController;
use Illuminate\Support\Facades\Route;

Route::get('/cores', [CorController::class, 'index'])->name('cores.index');
Route::get('/cores/create', [CorController::class, 'create'])->name('cores.create');
Route::post('/cores', [CorController::class, 'store'])->name('cores.store');
