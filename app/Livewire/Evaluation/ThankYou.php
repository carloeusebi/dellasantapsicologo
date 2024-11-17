<?php

namespace App\Livewire\Evaluation;

use App\Models\Survey;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ThankYou extends Component
{
    protected static int $minutesFromCompletionBeforeThrowingNotFound = 5;

    public Survey $survey;

    public static function getMinutesFromCompletionBeforeThrowingNotFound(): int
    {
        return self::$minutesFromCompletionBeforeThrowingNotFound;
    }

    public function mount(Survey $survey): void
    {
        $this->survey = $survey;

        if (! $this->survey->completed) {
            $this->redirectRoute('evaluation.home', $this->survey);
        }

        if ($this->survey->updated_at->diffInMinutes() > self::$minutesFromCompletionBeforeThrowingNotFound) {
            throw new NotFoundHttpException;
        }
    }

    #[Layout('components.layouts.evaluation')]
    public function render(
    ): Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|View|Application {
        return view('livewire.evaluation.thank-you');
    }
}
