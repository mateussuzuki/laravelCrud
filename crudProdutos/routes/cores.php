<?php

use App\Http\Controllers\CorController;
use Illuminate\Support\Facades\Route;

Route::get('/cores', [CorController::class, 'index'])->name('cores.index');

Route::get('/cores/create', [CorController::class, 'create'])->name('cores.create');
Route::post('/cores', [CorController::class, 'store'])->name('cores.store');

Route::get('/cores/{post}/edit', [CorController::class, 'edit'])->name('cores.edit');
Route::put('/cores/{post}', [CorController::class, 'update'])->name('cores.update');

Route::delete('/cores/{post}', [CorController::class, 'destroy'])->name('cores.destroy');

