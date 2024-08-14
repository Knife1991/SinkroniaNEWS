<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\CategoryController;

Route::get('/', [NewsController::class, 'index'])->name('welcome');

Route::get('news/create.news', [NewsController::class, 'create'])->name('create.news');
Route::post('store.news', [NewsController::class, 'store'])->name('store.news');
Route::get('/news/{id}', [NewsController::class, 'show'])->name('news.show');
Route::get('news/{id}/edit', [NewsController::class, 'edit'])->name('news.edit');
Route::put('news/{id}', [NewsController::class, 'update'])->name('news.update');
Route::delete('news/{id}/destroy', [NewsController::class, 'destroy'])->name('news.destroy');

Route::resource('categories', CategoryController::class);
Route::get('news/{id}/categories', [CategoryController::class, 'indexCategory'])->name('categories.index');


Route::get('dashboard', [PublicController::class, 'dashboard'])->name('dashboard');
Route::get('profilo', [PublicController::class, 'profilo'])->name('profilo');
Route::get('settings', [PublicController::class, 'settings'])->name('settings');