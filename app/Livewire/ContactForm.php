<?php

namespace App\Livewire;

use App\Mail\ContactFormMail;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;

class ContactForm extends Component
{
    #[Validate('required', as: 'Nome')]
    public string $name = '';

    #[Validate('required|email', as: 'Email')]
    public string $email = '';

    #[Validate('required', as: 'Numero di Telefono')]
    public string $phone = '';

    #[Validate('required', as: 'Messaggio')]
    public string $message = '';

    #[Validate('required', message: 'Per favore accettare la normativa sui dati personali')]
    public $accepted;

    #[Validate('prohibited')]
    public $honey;

    public function sendEmail(): void
    {
        $this->validate();
        $to = config('mail.admin.address');
        try {
            Mail::to($to)->send(new ContactFormMail(
                $this->name,
                $this->email,
                $this->phone,
                $this->message
            ));
            $this->reset();
            $this->dispatch('message', status: 'success', message: 'Email inviata con successo!.');
        } catch (Exception $e) {
            Log::error($e->getMessage());
            $this->dispatch(
                'message',
                status: 'error',
                message: 'Errore durante l\'invio della email. Si prega di riprovare più tardi.',
                details: $e->getMessage(),
            );
        }
    }

    public function render(
    ): Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|View|Application
    {
        return view('livewire.contact-form');
    }
}
