<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategoryController;
use App\Http\Middleware\authenticated;

Route::controller(BookController::class)->group(function () {
    Route::get('/home', 'index');
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
    Route::get('/account', 'index')->middleware(authenticated::class);
    Route::get('/accDetails', 'edit')->middleware(authenticated::class);
    Route::post('/update', 'update')->middleware(authenticated::class);
});


//Route::get('/bookstore',  'bookstore')->middleware(authenticated::class);

require __DIR__ . '/auth.php';
