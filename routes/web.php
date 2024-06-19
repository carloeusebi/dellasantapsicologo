<?php

use App\Http\Controllers\DownloadSurveyController;
use App\Http\Controllers\PushController;
use App\Livewire\Evaluation\EvaluationPatientForm;
use App\Livewire\Evaluation\Home;
use App\Livewire\Evaluation\QuestionnaireScroller;
use App\Livewire\Evaluation\ThankYou;
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

Route::view('/offline', 'laravelpwa::offline')->name('offline');

Route::prefix('/test-per-la-valutazione')->name('evaluation.')->group(function () {
    Route::get('/{survey:token}', Home::class)->name('home');
    Route::get('/{survey:token}/paziente', EvaluationPatientForm::class)->name('patient');
    Route::get('/{survey:token}/grazie', ThankYou::class)->name('thank-you');
    Route::get('/{survey:token}/{questionnaireSurvey}', QuestionnaireScroller::class)->name('questionnaire');
});

Route::view('/profilo', 'profile.show-profile')->middleware('auth:web')->name('profile');

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/', fn() => to_route('patients.index'))->name('home');

    Route::get('/download/valutazione/{survey}', DownloadSurveyController::class)->name('download.survey');

    Route::view('/pazienti', 'patients.index')->name('patients.index');
    Route::get('/pazienti/crea', CreatePatient::class)->name('patients.create');
    Route::get('/pazienti/{patient}', ShowPatient::class)->name('patients.show');

    Route::view('/valutazioni/templates/', 'templates.index')->name('surveys.templates.index');
    Route::get('/valutazioni/templates/crea', CreateTemplate::class)->name('surveys.templates.create');
    Route::get('/valutazioni/templates/{template}', ShowTemplate::class)->name('surveys.templates.show');

    Route::view('valutazioni/', 'surveys.index')->name('surveys.index');
    Route::get('valutazioni/crea', CreateSurvey::class)->name('surveys.create');
    Route::get('valutazioni/{survey}', ShowSurvey::class)->name('surveys.show');

    Route::view('questionari/', 'questionnaires.index')->name('questionnaires.index');
    Route::get('questionari/crea', CreateQuestionnaire::class)->name('questionnaires.create');
    Route::get('questionari/{questionnaire}', ShowQuestionnaire::class)->name('questionnaires.show');

    Route::get('/tags', TagsIndex::class)->name('tags.index');
});

Route::post('/push', PushController::class);
