<?php

namespace App\Livewire\Patients;

use App\Livewire\Forms\PatientForm;
use App\Models\Patient;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;
use Livewire\Component;
use Mary\Traits\Toast;

class EditPatient extends Component
{
    use Toast;

    public PatientForm $form;

    public function mount(Patient $patient): void
    {
        $this->form->setPatient($patient);
    }

    public function resetForm(): void
    {
        $this->form->setPatient($this->form->patient);
        $this->clearValidation();
    }

    public function save()
    {
        $this->authorize('update', $this->form->patient);

        $patient = $this->form->update();

        return $this->success('Paziente modificato con successo!',
            redirectTo: route('patients.show', $patient));
    }

    public function render(
    ): Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|View|Application
    {
        $this->authorize('view', $this->form->patient);

        return view('livewire.patients.edit', ['patient' => $this->form->patient]);
    }
}
