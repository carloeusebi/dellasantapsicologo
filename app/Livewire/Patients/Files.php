<?php

namespace App\Livewire\Patients;

use App\Models\Patient;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;
use Mary\Traits\Toast;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Files extends Component
{
    use Toast;
    use WithFileUploads;

    public Patient $patient;

    public bool $modal = false;

    #[Validate('required|mimes:pdf', as: 'File')]
    public $file;

    public array $expanded = [];

    public function mount(Patient $patient): void
    {
        $this->patient = $patient;
    }

    public function save()
    {
        $this->validate();

        try {
            $this->patient->addMedia($this->file)->toMediaCollection('files');
        } catch (FileDoesNotExist $e) {
            $this->error($e->getMessage());
        } catch (FileIsTooBig) {
            $this->error('File troppo grande!');
        }

        $this->reset('file');

        return $this->success('File caricato con successo');
    }

    public function delete(string $id): void
    {
        $this->retrieveMedia($id)->delete();

        $this->dispatch('deleted');

        $this->success('File eliminato con successo');
    }

    protected function retrieveMedia(string $id): Media
    {
        return $this->patient->getMedia('files')->first(fn($file) => $file->id === (int) $id);
    }

    public function download(string $id): Media
    {
        return $this->retrieveMedia($id);
    }

    #[On('deleted')]
    public function render(
    ): Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|View|Application
    {
        return view('livewire.patients.files');
    }
}
