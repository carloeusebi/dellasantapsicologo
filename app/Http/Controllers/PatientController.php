<?php

namespace App\Http\Controllers;

use App\Http\Requests\PatientRequest;
use App\Models\Patient;
use Illuminate\Support\Facades\Auth;
use Mary\Traits\Toast;

class PatientController extends Controller
{
    use Toast;

    public function index()
    {
        return view('patients.index');
    }

    public function store(PatientRequest $request)
    {
        Auth::user()->patients()->create($request->all());
        $this->success('Paziente creato con successo',
            redirectTo: route('patients.index')
        );
    }

    public function create()
    {
        return view('patients.create');
    }

    public function edit(Patient $patient)
    {
        return view('patients.edit', compact('patient'));
    }

    public function show(Patient $patient)
    {
        return view('patients.show', compact('patient'));
    }

    public function update(PatientRequest $request, Patient $patient)
    {
    }

    public function destroy(Patient $patient)
    {
    }
}
