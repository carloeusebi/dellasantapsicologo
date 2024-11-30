<?php

namespace App\Events;

use App\Models\Survey;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SurveyCompleted
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(
        public Survey $survey
    ) {}
}
