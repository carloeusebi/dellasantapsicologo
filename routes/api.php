<?php

use App\Http\Controllers\ArtisanController;
use Illuminate\Support\Facades\Route;

Route::prefix('artisan')->controller(ArtisanController::class)->group(function () {
    Route::post('optimize', 'optimize');
    Route::post('clear', 'clear');
    Route::post('migrate', 'migrate');
    Route::post('rollback', 'rollback');
});
