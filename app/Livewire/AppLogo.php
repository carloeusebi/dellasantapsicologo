<?php

namespace App\Livewire;

use Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class AppLogo extends Component
{
    #[On('logoUpdated')]
    public function render(): string
    {
        $logoUrl = Auth::user()->logoUrl();

        return <<<BLADE
            <img class="h-full block" src="$logoUrl" alt="logo"/>
BLADE;
    }
}
