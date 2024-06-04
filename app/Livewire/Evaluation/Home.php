<?php

namespace App\Livewire\Evaluation;

use App\Models\Survey;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Home extends Component
{
    public Survey $survey;

    public function mount(Survey $survey): void
    {
        if ($survey->completed) {
            throw new NotFoundHttpException();
        }

        if ($survey->lastAnswer) {
            $this->redirectRoute(
                'evaluation.questionnaire',
                [
                    $survey->token,
                    $survey->questionnaireSurveys->where('completed', false)->first()->id,
                ]
            );
        }

        $this->survey = $survey;
    }


    #[Layout('components.layouts.evaluation')]
    public function render(
    ): Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|View|Application
    {
        return view('livewire.evaluation.home');
    }
}
