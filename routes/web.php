<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\QuestionnaireController;
use App\Http\Controllers\SurveyController;
use App\Livewire\Patients\CreatePatient;
use App\Livewire\Patients\EditPatient;
use App\Livewire\Patients\ShowPatient;
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

    Route::prefix('/pazienti')->name('patients.')->group(function () {
        Route::get('/', [PatientController::class, 'index'])->name('index');
        Route::get('/crea', CreatePatient::class)->name('create');
        Route::get('/{patient}', ShowPatient::class)->name('show');
        Route::get('/{patient}/modifica', EditPatient::class)->name('edit');
    });

    Route::resource('batterie', SurveyController::class)
        ->parameter('batterie', 'survey')
        ->names('surveys')
        ->except('edit');

    Route::resource('questionari', QuestionnaireController::class)
        ->parameter('questionari', 'questionnaire')
        ->names('questionnaires');
});
