<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;

Route::prefix('test')->group(function () {
    Route::get('/', [TestController::class, 'index']);
    
    Route::post('/store', [TestController::class, 'store']);
});
