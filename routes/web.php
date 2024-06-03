<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategoryController;
use App\Http\Middleware\authenticated;

Route::get('/home', [BookController::class, 'index']);
Route::get('/books/{book}', [BookController::class, 'show']);
Route::get('/download/{book}', [BookController::class, 'download']);
Route::get('/preview/{book}', [BookController::class, 'preview']);

Route::get('/authors', [AuthorController::class, 'index']);
Route::get('/authors/{author}', [AuthorController::class, 'show']);

Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/categories/{category}', [CategoryController::class, 'show']);

Route::controller(SessionController::class)->group(function () {
    Route::get('/signIn', 'create');
    Route::post('/signIn', 'store');
    Route::post('/logOut', 'destroy');
});

Route::get('/signUp', [RegisterController::class, 'create']);
Route::post('/signUp', [RegisterController::class, 'store']);

Route::get('/account', [ProfileController::class, 'index'])->middleware(authenticated::class);
Route::get('/accDetails', [ProfileController::class, 'edit'])->middleware(authenticated::class);
Route::post('/update', [ProfileController::class, 'update'])->middleware(authenticated::class);

Route::get('/bookstore', [BookController::class, 'bookstore'])->middleware(authenticated::class);

require __DIR__ . '/auth.php';
