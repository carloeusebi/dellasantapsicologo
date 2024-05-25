<?php

namespace App\Livewire\Patients;

use App\Models\Patient;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;
use Livewire\Component;
use Mary\Traits\Toast;

class ShowPatient extends Component
{
    use Toast;

    public Patient $patient;

    public bool $deleteModal = false;

    public bool $archived;

    public function mount(): void
    {
        $this->archived = $this->patient->isArchived();
    }

    public function changeState(): void
    {
        if ($this->archived) {
            $this->patient->archive();
        } else {
            $this->patient->unArchive();
        }

        $this->success('Paziente '.($this->archived ? 'archiviato' : 'attivato').' con successo!');
    }

    public function delete(): void
    {
        $this->patient->delete();

        $this->success('Paziente Eliminato con successo!',
            redirectTo: route('patients.index')
        );
    }

    public function render(
    ): Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|View|Application
    {
        return view('livewire.patients.show');
    }
}
