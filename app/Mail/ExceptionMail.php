<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Throwable;

class ExceptionMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public function __construct(
        public Throwable $exception,
    ) {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Errore Critico',
        );
    }


    public function content(): Content
    {
        return new Content(
            view: 'emails.exception',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
