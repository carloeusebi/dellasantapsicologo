<?php

namespace App\Http\Controllers;

use App\Models\Questionnaire;
use Illuminate\Http\Request;

class QuestionnaireController extends Controller
{
    public function index()
    {
        return view('questionnaires.index');
    }

    public function create()
    {
        return view('questionnaires.create');
    }

    public function store(Request $request)
    {
    }

    public function show(Questionnaire $questionnaire)
    {
        return view('questionnaires.show', compact('questionnaire'));
    }

    public function edit(Questionnaire $questionnaire)
    {
    }

    public function update(Request $request, Questionnaire $questionnaire)
    {
    }

    public function destroy(Questionnaire $questionnaire)
    {
    }
}
