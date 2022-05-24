<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'v1'], function() {
    Route::group(['prefix' => 'authors'], function() {
        Route::get('/', [\App\Http\Controllers\Library\AuthorController::class, 'index']);
    });
    Route::group(['prefix' => 'books'], function() {
        Route::get('/', [\App\Http\Controllers\Library\BookController::class, 'index']);
    });
});
