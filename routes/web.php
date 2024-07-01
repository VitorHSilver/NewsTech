<?php

use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/users', [NewsController::class, 'index'])->name('users.index');
Route::get('/users/{id}', [NewsController::class, 'show'])->name('users.show');
Route::get('/users/create', [NewsController::class, 'create'])->name('users.create');
Route::post('/users', [NewsController::class, 'store'])->name('users.store');
Route::get('/users/{id}/edit', [NewsController::class, 'edit'])->name('users.edit');
Route::put('/users/{id}', [NewsController::class, 'update'])->name('users.update');
Route::delete('/users/{id}', [NewsController::class, 'destroy'])->name('users.destroy');

Route::get('/', [NewsController::class, 'index'])->name('home');
Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/{id}', [NewsController::class, 'show'])->name('news.show');
Route::get('/news/create', [NewsController::class, 'create'])->name('news.create');
Route::post('/news', [NewsController::class, 'store'])->name('news.store');
Route::get('/news/{id}/edit', [NewsController::class, 'edit'])->name('news.edit');
Route::put('/news/{id}', [NewsController::class, 'update'])->name('news.update');
Route::delete('/news/{id}', [NewsController::class, 'destroy'])->name('news.destroy');



require __DIR__ . '/auth.php';
