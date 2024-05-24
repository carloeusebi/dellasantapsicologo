<?php

namespace App\Livewire\Patients;

use App\Livewire\Forms\PatientForm;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;
use Livewire\Component;
use Mary\Traits\Toast;

class CreatePatient extends Component
{
    use Toast;

    public PatientForm $form;

    public function save()
    {
        $this->form->store();

        return $this->success('Paziente creato con successo!', redirectTo: route('patients.index'));
    }

    public function resetForm(): void
    {
        $this->form->reset();
        $this->form->clearValidation();
    }

    public function render(
    ): Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|View|Application
    {
        return view('livewire.patients.create-patient');
    }
}
