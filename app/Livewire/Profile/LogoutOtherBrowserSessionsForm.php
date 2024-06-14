<?php

namespace App\Livewire\Profile;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Laravel\Jetstream\Agent;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Mary\Traits\Toast;

/**
 * @property Collection $sessions
 */
class LogoutOtherBrowserSessionsForm extends Component
{
    use Toast;

    public bool $confirmingLogout = false;

    public string $password = '';

    public function confirmLogout(): void
    {
        $this->password = '';

        $this->clearValidation();

        $this->dispatch('confirming-logout-other-browser-sessions');

        $this->confirmingLogout = true;
    }

    #[Computed]
    public function sessions(): Collection
    {
        return collect(
            DB::connection(config('session.connection'))->table(config('session.table', 'sessions'))
                ->where('user_id', Auth::user()->getAuthIdentifier())
                ->orderBy('last_activity', 'desc')
                ->get()
        )->map(function ($session) {
            return (object) [
                'agent' => $this->createAgent($session),
                'ip_address' => $session->ip_address,
                'is_current_device' => $session->id === request()->session()->getId(),
                'last_active' => Carbon::createFromTimestamp($session->last_activity)->diffForHumans(),
            ];
        });
    }

    protected function createAgent($session)
    {
        return tap(new Agent(), fn($agent) => $agent->setUserAgent($session->user_agent));
    }

    public function logoutOtherBrowserSessions(StatefulGuard $guard): void
    {
        if (config('session.driver') !== 'database') {
            return;
        }

        $this->resetErrorBag();

        if (!Hash::check($this->password, Auth::user()->password)) {
            throw ValidationException::withMessages([
                'password' => [__('validation.current_password')],
            ]);
        }

        try {
            $guard->logoutOtherDevices($this->password);

            $this->deleteOtherSessionRecords();

            request()->session()->put([
                'password_hash_'.Auth::getDefaultDriver() => Auth::user()->getAuthPassword(),
            ]);

            $this->confirmingLogout = false;

            $this->success('Successo', 'Altre sessioni disconnesse con successo.');
        } catch (AuthenticationException $e) {
            $this->error('Disconnessione non riuscita!', $e->getMessage());
        }
    }

    protected function deleteOtherSessionRecords(): void
    {
        if (config('session.driver') !== 'database') {
            return;
        }

        DB::connection(config('session.connection'))->table(config('session.table', 'sessions'))
            ->where('user_id', Auth::user()->getAuthIdentifier())
            ->where('id', '!=', request()->session()->getId())
            ->delete();
    }
}
