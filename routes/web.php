<?php

use App\Http\Controllers\DownloadSurveyController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\QuestionnaireController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\TemplatesController;
use App\Livewire\Evaluation;
use App\Livewire\Patients\CreatePatient;
use App\Livewire\Patients\ShowPatient;
use App\Livewire\Questionnaires\CreateQuestionnaire;
use App\Livewire\Questionnaires\ShowQuestionnaire;
use App\Livewire\Surveys\CreateSurvey;
use App\Livewire\Surveys\ShowSurvey;
use App\Livewire\Tags\TagsIndex;
use App\Livewire\Templates\CreateTemplate;
use App\Livewire\Templates\ShowTemplate;
use Illuminate\Support\Facades\Route;


Route::prefix('/test-per-la-valutazione')->name('evaluation.')->group(function () {
    Route::get('/{survey:token}', Evaluation\Home::class)->name('home');
    Route::get('/{survey:token}/paziente', Evaluation\Patient::class)->name('patient');
    Route::get('/{survey:token}/grazie', Evaluation\ThankYou::class)->name('thank-you');
    Route::get('/{survey:token}/{questionnaireSurvey}', Evaluation\Questionnaire::class)->name('questionnaire');
});

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/', function () {
        return to_route('patients.index');
    })->name('home');

    Route::get('/download/valutazione/{survey}', DownloadSurveyController::class)->name('download.survey');

    Route::prefix('/pazienti')->name('patients.')->group(function () {
        Route::get('/', [PatientController::class, 'index'])->name('index');
        Route::get('/crea', CreatePatient::class)->name('create');
        Route::get('/{patient}', ShowPatient::class)->name('show');
    });

    Route::prefix('/valutazioni')->name('surveys.')->group(function () {
        Route::prefix('/templates')->name('templates.')->group(function () {
            Route::get('/', [TemplatesController::class, 'index'])->name('index');
            Route::get('/crea', CreateTemplate::class)->name('create');
            Route::get('/{template}', ShowTemplate::class)->name('show');
        });


        Route::get('/', [SurveyController::class, 'index'])->name('index');
        Route::get('/crea', CreateSurvey::class)->name('create');
        Route::get('/{survey}', ShowSurvey::class)->name('show');
    });

    Route::prefix('/questionari')->name('questionnaires.')->group(function () {
        Route::get('/', [QuestionnaireController::class, 'index'])->name('index');
        Route::get('/crea', CreateQuestionnaire::class)->name('create');
        Route::get('/{questionnaire}', ShowQuestionnaire::class)->name('show');
    });

    Route::get('/tags', TagsIndex::class)->name('tags.index');

});
