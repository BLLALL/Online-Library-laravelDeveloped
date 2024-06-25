<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategoryController;
use App\Http\Middleware\authenticated;

Route::controller(BookController::class)->group(function () {
    Route::get('/home', 'index')->name('home');
    Route::get('/books/{book}', 'show');
    Route::get('/download/{book}', 'download');
    Route::get('/preview/{book}', 'preview');
});

Route::controller(AuthorController::class)->group(function () {
    Route::get('/authors', 'index');
    Route::get('/authors/{author}', 'show');
});

Route::controller(CategoryController::class)->group(function () {
    Route::get('/categories', 'index');
    Route::get('/categories/{category}', 'show');
});


Route::controller(SessionController::class)->group(function () {
    Route::get('/signIn', 'create');
    Route::post('/signIn', 'store');
    Route::post('/logOut', 'destroy');
});

Route::controller(RegisterController::class)->group(function () {
    Route::get('/signUp', 'create');
    Route::post('/signUp', 'store');
});

Route::controller(ProfileController::class)->group(function () {
    Route::get('/account', 'index')->middleware('auth');
    Route::get('/accDetails', 'edit')->middleware('auth');
    Route::post('/update', 'update')->middleware('auth');
    Route::get('/f_books', 'favorites')->middleware('auth');
});

Route::middleware('can:admin')->group(function () {
    Route::get('/admin', [AdminController::class,'index']);

    Route::get('/api/categories', [CategoryController::class, 'search']);
    Route::post('/categories', [CategoryController::class,'store']);
    Route::post('/categories/{category}', [CategoryController::class,'destroy']);

    Route::get('/api/authors', [AuthorController::class, 'search']);
    Route::post('/authors', [AuthorController::class,'store']);
    Route::post('/authors/{author}', [AuthorController::class,'destroy']);

    Route::get('/get-categories', [CategoryController::class, 'getCategories']);
    Route::get('/get-authors', [AuthorController::class, 'getAuthors']);
    Route::get('/api/books', [BookController::class, 'search']);
    Route::post('/books', [BookController::class,'store']);
    Route::post('/books/{book}', [BookController::class,'destroy']);


});
require __DIR__ . '/auth.php';
