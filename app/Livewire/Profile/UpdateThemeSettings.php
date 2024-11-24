<?php

namespace App\Livewire\Profile;

use Auth;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\WithFileUploads;
use Mary\Traits\Toast;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;

class UpdateThemeSettings extends Component
{
    use WithFileUploads;
    use Toast;

    protected $listeners = ['logoDeleted' => '$refresh'];

    #[Rule('required', 'image', 'max:1024')]
    public ?TemporaryUploadedFile $logo = null;

    public bool $deleteModal = false;

    public function updateTheme(): void
    {
        if ($this->logo) {
            $this->updatedUserLogo();
        }
    }

    public function deleteUserLogo(): void
    {
        Auth::user()->deleteLogo();

        $this->dispatch('logoUpdated');

        $this->deleteModal = false;

        $this->success('Successo!', 'Logo eliminato con successo');
    }

    protected function updatedUserLogo()
    {
        $this->validateOnly('logo');

        try {
            Auth::user()->updateLogo($this->logo);
        } catch (FileDoesNotExist $e) {
            $this->error('Errore!', $e->getMessage());
        } catch (FileIsTooBig) {
            $this->error('Errore!', 'File troppo grande!');
        }

        $this->dispatch('logoUpdated');

        $this->reset('logo');

        return $this->success('Successo!', 'File caricato con successo');
    }

    public function render(): View
    {
        return view('livewire.profile.update-theme-settings');
    }
}
