<?php

namespace App\Livewire\Patients;

use App\Models\Patient;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;
use Mary\Traits\Toast;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

#[Lazy]
class PatientFiles extends Component
{
    use Toast;
    use WithFileUploads;

    public Patient $patient;

    #[Validate('required|mimes:pdf', as: 'File')]
    public $file;

    public array $expanded = [];

    public function save()
    {
        $this->authorize('update', $this->patient);

        $this->validate();

        try {
            $this->patient->addMedia($this->file)->toMediaCollection('files');
        } catch (FileDoesNotExist $e) {
            $this->error('Errore!', $e->getMessage());
        } catch (FileIsTooBig) {
            $this->error('Errore!', 'File troppo grande!');
        }

        $this->reset('file');

        return $this->success('Successo!', 'File caricato con successo');
    }

    public function delete(string $id): void
    {
        $this->authorize('view', $this->patient);

        $this->retrieveMedia($id)->delete();

        $this->dispatch('deleted');

        $this->success('Successo!', 'File eliminato con successo');
    }

    protected function retrieveMedia(string $id): Media
    {
        return $this->patient->getMedia('files')->first(fn($file) => $file->id === (int) $id);
    }

    public function download(string $id): Media
    {
        $this->authorize('view', $this->patient);

        return $this->retrieveMedia($id);
    }

    #[On('deleted')]
    public function render(
    ): Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|View|Application
    {
        return view('livewire.patients.files');
    }
}