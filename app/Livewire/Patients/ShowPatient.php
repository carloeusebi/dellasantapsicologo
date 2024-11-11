<?php

namespace App\Livewire\Patients;

use App\Livewire\Forms\PatientForm;
use App\Models\Patient;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\View\View;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;
use Mary\Traits\Toast;

class ShowPatient extends Component
{
    use Toast;

    public PatientForm $form;

    public Patient $patient;

    public bool $deleteModal = false;

    public function mount(): void
    {
        $this->form->setPatient($this->patient);
    }

    public function changeState(): void
    {
        $this->authorize('update', $this->patient);

        try {
            if ($this->patient->isArchived()) {
                $this->patient->unArchive();
            } else {
                $this->patient->archive();
            }

            $this->success('Successo!',
                'Paziente '.($this->patient->isArchived() ? 'archiviato' : 'attivato').' con successo!');

        } catch (Exception $e) {
            $this->error('Errore!', $e->getMessage());
        }
    }

    public function resetForm(): void
    {
        $this->form->setPatient($this->patient);
    }

    public function save(): void
    {
        $this->authorize('update', $this->form->patient);

        $this->form->update();

        $this->dispatch('updated');

        $this->success('Successo!', 'Paziente modificato con successo!');
    }

    #[Computed]
    public function surveys(): \Illuminate\Contracts\Pagination\LengthAwarePaginator|array|LengthAwarePaginator
    {
        return $this->patient->surveys()->paginate(3, pageName: 'pagina_valutazioni');
    }

    #[On('updated')]
    public function render(
    ): Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|View|Application
    {
        $this->authorize('view', $this->patient);

        return view('livewire.patients.show-patient');
    }

    public function delete(): void
    {
        $this->authorize('delete', $this->patient);

        $this->patient->delete();

        $this->success('Successo!', 'Paziente Eliminato con successo!',
            redirectTo: route('patients.index')
        );
    }
}
