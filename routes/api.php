<?php
use Illuminate\Support\Facades\Route;

Route::prefix('api/v1')->group(function () {
    require __DIR__ . '/test.php';
});