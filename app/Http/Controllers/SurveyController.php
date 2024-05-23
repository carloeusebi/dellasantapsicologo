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

    }

    public function store(SurveyRequest $request)
    {
    }

    public function show(Survey $survey)
    {
    }

    public function update(SurveyRequest $request, Survey $survey)
    {
    }

    public function destroy(Survey $survey)
    {
    }
}
