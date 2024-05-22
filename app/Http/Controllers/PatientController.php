<?php

namespace App\Http\Controllers;

use App\Http\Requests\PatientRequest;
use App\Models\Patient;

class PatientController extends Controller
{

    public function index()
    {
        return view('patients.index');
    }

    public function store(PatientRequest $request)
    {
        return Patient::create($request->validated());
    }

    public function edit(Patient $patient)
    {
        return view('patients.edit', compact('patient'));
    }

    public function show(Patient $patient)
    {
    }

    public function update(PatientRequest $request, Patient $patient)
    {
    }

    public function destroy(Patient $patient)
    {
    }
}
