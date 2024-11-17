<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class LinkToTestMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @param  string  $subject
     */
    public function __construct(
        public $subject,
        public string $body,
        public string $link
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->subject,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.link-to-test',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
