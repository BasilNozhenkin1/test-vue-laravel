<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'v1'], function() {
    Route::group(['prefix' => 'authors'], function() {
        Route::get('/', [\App\Http\Controllers\Library\AuthorController::class, 'index']);
        Route::post('/store', [\App\Http\Controllers\Library\AuthorController::class, 'store']);
        Route::patch('/{author}/update', [\App\Http\Controllers\Library\AuthorController::class, 'update']);
        Route::delete('/{author}/delete', [\App\Http\Controllers\Library\AuthorController::class, 'destroy']);
    });
    Route::group(['prefix' => 'books'], function() {
        Route::get('/', [\App\Http\Controllers\Library\BookController::class, 'index']);
        Route::post('/store', [\App\Http\Controllers\Library\BookController::class, 'store']);
        Route::patch('/{book}/update', [\App\Http\Controllers\Library\BookController::class, 'update']);
        Route::delete('/{book}/delete', [\App\Http\Controllers\Library\BookController::class, 'destroy']);
    });
});
