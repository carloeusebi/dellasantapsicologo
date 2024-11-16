<?php

namespace App\Livewire\Profile;

use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\UpdatesUserPasswords;
use Livewire\Component;
use Mary\Traits\Toast;

class UpdatePasswordForm extends Component
{
    use Toast;

    public string $current_password = '';

    public string $password = '';

    public string $password_confirmation = '';

    public function updatePassword(UpdatesUserPasswords $updater): void
    {
        $this->resetErrorBag();

        $updater->update(Auth::user(), [
            'current_password' => $this->current_password,
            'password' => $this->password,
            'password_confirmation' => $this->password_confirmation,
        ]);

        if (request()->hasSession()) {
            request()->session()->put([
                'password_hash_'.auth()->getDefaultDriver() => auth()->user()->getAuthPassword(),
            ]);
        }

        $this->reset();

        $this->success('Success!', 'Password updated successfully!');

    }
}
