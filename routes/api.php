<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FavoriteController;


Route::post('favorite', [FavoriteController::class, 'store']);
Route::post('unfavorite', [FavoriteController::class, 'destroy']);
