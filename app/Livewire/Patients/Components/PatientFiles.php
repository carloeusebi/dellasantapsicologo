<?php

namespace App\Livewire\Patients\Components;

use App\Models\Patient;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\WithFileUploads;
use Mary\Traits\Toast;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\File\Exception\FileNotFoundException;

#[Lazy]
class PatientFiles extends Component
{
    use Toast;
    use WithFileUploads;

    public Patient $patient;

    #[Validate('required|mimes:pdf,jpg,jpeg,png,bmp,webp', as: 'File')]
    public ?TemporaryUploadedFile $file = null;

    public string $fileName = '';

    public array $expanded = [];

    public function save()
    {
        $this->authorize('update', $this->patient);

        $this->validate();

        try {
            $this->patient->addMedia($this->file)
                ->toMediaCollection('files');
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
        $this->authorize('update', $this->patient);

        $this->retrieveMedia($id)->delete();

        $this->dispatch('deleted');

        $this->success('Successo!', 'File eliminato con successo');
    }

    protected function retrieveMedia(string $id): Media
    {
        return $this->patient->getMedia('files')->first(fn($file) => $file->id === (int) $id);
    }

    public function download(string $id): ?BinaryFileResponse
    {
        $this->authorize('view', $this->patient);

        $media = $this->retrieveMedia($id);

        try {
            return response()->download($media->getPath(), $media->file_name);
        } catch (FileNotFoundException) {
            $this->error('Errore!', 'File non trovato!');
            return null;
        }
    }

    #[On('deleted')]
    public function render(
    ): Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|View|Application
    {
        return view('livewire.patients.components.patient-files');
    }
}
