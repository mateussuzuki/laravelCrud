<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;

Route::get('/', [ProdutoController::class, 'index'])->name('produtos.index');
Route::get('/produtos/create', [ProdutoController::class, 'create'])->name('produtos.create');
Route::post('/produtos', [ProdutoController::class, 'store'])->name('produtos.store');
Route::get('/produtos/{post}', [ProdutoController::class, 'show'])->name('produtos.show');
Route::get('/produtos/{post}/edit', [ProdutoController::class, 'edit'])->name('produtos.edit');

Route::put('/produtos/{post}', [ProdutoController::class, 'update'])->name('produtos.update');

Route::delete('/produtos/{post}', [ProdutoController::class, 'destroy'])->name('produtos.destroy');