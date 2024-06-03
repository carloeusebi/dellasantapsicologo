<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\QuestionnaireController;
use App\Http\Controllers\SurveyController;
use App\Livewire\Patients\CreatePatient;
use App\Livewire\Patients\ShowPatient;
use App\Livewire\Surveys\CreateSurvey;
use App\Livewire\Surveys\ShowSurvey;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');
Route::get('/chi-sono', HomeController::class)->name('chi-sono');
Route::get('/cosa-aspettarsi', HomeController::class)->name('cosa-aspettarsi');
Route::get('/di-cosa-mi-occupo', HomeController::class)->name('di-cosa-mi-occupo');
Route::get('/contatti', HomeController::class)->name('contatti');

Route::get('/home', function () {
    return redirect()->route('admin');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return to_route('patients.index');
    })->name('admin');

    Route::prefix('/pazienti')->name('patients.')->group(function () {
        Route::get('/', [PatientController::class, 'index'])->name('index');
        Route::get('/crea', CreatePatient::class)->name('create');
        Route::get('/{patient}', ShowPatient::class)->name('show');
    });

    Route::prefix('/valutazioni')->name('surveys.')->group(function () {
        Route::get('/', [SurveyController::class, 'index'])->name('index');
        Route::get('/crea', CreateSurvey::class)->name('create');
        Route::get('/{survey}', ShowSurvey::class)->name('show');
    });

    Route::resource('questionari', QuestionnaireController::class)
        ->parameter('questionari', 'questionnaire')
        ->names('questionnaires');
});
