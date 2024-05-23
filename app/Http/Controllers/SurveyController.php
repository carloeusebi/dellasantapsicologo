<?php

namespace App\Http\Controllers;

use App\Http\Requests\SurveyRequest;
use App\Models\Survey;

class SurveyController extends Controller
{
    public function index()
    {
        return view('surveys.index');
    }

    public function create()
    {
        return view('surveys.create');
    }

    public function store(SurveyRequest $request)
    {
    }

    public function show(Survey $survey)
    {
        $survey->load('patient');
        return view('surveys.show', compact('survey'));
    }

    public function update(SurveyRequest $request, Survey $survey)
    {
    }

    public function destroy(Survey $survey)
    {
    }
}
