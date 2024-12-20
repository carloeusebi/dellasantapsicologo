<?php

namespace App\Services;

use App\Mail\LinkToTestMail;
use App\Models\Survey;
use Exception;
use Illuminate\Support\Facades\Mail;

class SurveyService
{
    /**
     * @throws Exception if the email is not sent
     */
    public static function sendEmailWithLinkToTest(
        Survey $survey,
        ?string $email = null,
        ?string $subject = 'Questionario per la valutazione',
        ?string $body = null,
        bool $shouldQueue = false
    ): bool {
        $email = Mail::to($email ?? $survey->patient->email);

        $mailable = new LinkToTestMail(
            $subject,
            $body ?? config('mail.default_link_to_test_message'),
            $survey->url,
        );

        if ($shouldQueue) {
            $email->queue($mailable);
        } else {
            $email->send($mailable);
        }

        return true;
    }
}
