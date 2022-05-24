<?php

use App\Http\Controllers\Application\AppController;
use Illuminate\Support\Facades\Route;

require __DIR__.'/auth.php';

Route::group(['middleware' => 'auth'], function() {
    Route::get('/{any}',  [AppController::class, 'index'])->where('any', '.*');
});


