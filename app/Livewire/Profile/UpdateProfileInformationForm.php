<?php

namespace App\Livewire\Profile;

use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Mary\Traits\Toast;

class UpdateProfileInformationForm extends Component
{
    use Toast;

    public string $name = '';

    public string $email = '';

    public function mount(): void
    {
        $this->name = Auth::user()->name;

        $this->email = Auth::user()->email;
    }

    public function updateProfileInformation(UpdateUserProfileInformation $updater): void
    {
        $this->resetErrorBag();

        $updater->update(Auth::user(), [
            'name' => $this->name,
            'email' => $this->email,
        ]);

        $this->success('Successo!', 'Profilo aggiornato con successo!');
    }
}
