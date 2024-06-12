<?php

namespace App\Mail;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SurveyCompletedNotificationMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public function __construct(
        public string $patientName,
        public string $surveyName,
        public Carbon $completedAt,
        public int $surveyId,
    ) {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Valutazione completata',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.survey-completed-notification',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
