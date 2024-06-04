<?php

namespace App\Livewire\Evaluation;

use App\Livewire\Forms\PatientForm;
use App\Models\Survey;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Patient extends Component
{
    public PatientForm $form;

    public Survey $survey;

    public function mount(Survey $survey): void
    {
        if ($survey->completed) {
            throw new NotFoundHttpException();
        }

        if ($survey->lastAnswer) {
            $this->redirect(route('evaluation.questionnaire', [
                $survey->token,
                $survey->questionnaireSurveys->where('completed', false)->first()->id,
            ]));
        }

        $this->form->setPatient($survey->patient);

        $this->survey = $survey;
    }

    public function resetForm(): void
    {
        $this->form->setPatient($this->survey->patient);
    }

    public function save(): void
    {
        $this->validate();

        $this->form->update();

        $this->redirectRoute(
            'evaluation.questionnaire',
            [
                $this->survey->token,
                $this->survey->questionnaireSurveys->first()->id
            ],
            navigate: true
        );
    }

    #[Layout('layouts.evaluation')]
    public function render(
    ): Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|View|Application
    {
        return view('livewire.evaluation.patient');
    }
}
