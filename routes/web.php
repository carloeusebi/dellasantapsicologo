<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\SurveyController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');
Route::get('/chi-sono', HomeController::class)->name('chi-sono');
Route::get('/cosa-aspettarsi', HomeController::class)->name('cosa-aspettarsi');
Route::get('/di-cosa-mi-occupo', HomeController::class)->name('di-cosa-mi-occupo');
Route::get('/contatti', HomeController::class)->name('contatti');

Route::get('/home', function () {
    return redirect()->route('admin');
});

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'authenticate'])->name('authenticate');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return to_route('patients.index');
    })->name('admin');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::resource('pazienti', PatientController::class)
        ->parameter('pazienti', 'patient')
        ->names('patients');

    Route::resource('batterie', SurveyController::class)
        ->parameter('batterie', 'survey')
        ->names('surveys')
        ->except('edit');
});
