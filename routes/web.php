<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PublicController;

Route::get('/', [NewsController::class, 'index'])->name('welcome');

Route::get('news/create.news', [NewsController::class, 'create'])->name('create.news');
Route::post('store.news', [NewsController::class, 'store'])->name('store.news');
Route::get('/news/{id}', [NewsController::class, 'show'])->name('news.show');
Route::get('news/{id}/edit', [NewsController::class, 'edit'])->name('news.edit');


Route::get('dashboard', [PublicController::class, 'dashboard'])->name('dashboard');