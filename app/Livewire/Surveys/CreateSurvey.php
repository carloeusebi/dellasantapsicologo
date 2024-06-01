<?php

namespace App\Livewire\Surveys;

use App\Models\Patient;
use App\Models\Questionnaire;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\View;
use LaravelIdea\Helper\App\Models\_IH_Questionnaire_C;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Url;
use Livewire\Component;

class CreateSurvey extends Component
{
    #[Url(as: 'patient_id')]
    public ?string $queryStringPatientId = null;

    public ?int $patientId = null;

    public int $step = 1;

    public function mount()
    {
        $this->patientId = $this->queryStringPatientId;
    }

    #[Computed]
    public function patients(): Patient|Collection
    {
        return Patient::userScope()
            ->when($this->queryStringPatientId,
                fn(Builder $query, string $id) => $query->where('id', $id),
            )
            ->orderBy('first_name')
            ->get();
    }

    #[Computed]
    public function questionnaires(): array|Collection|_IH_Questionnaire_C
    {
        return Questionnaire::all();
    }

    public function prev(): void
    {
        if ($this->step === 1) {
            return;
        }

        $this->step -= 1;
    }

    public function next(): void
    {
        if ($this->step === 1) {
            $this->validate(['patientId' => 'required|integer|exists:patients,id',],
                attributes: ['patientId' => 'Paziente']
            );

        }

        $this->step += 1;
    }

    public function render(
    ): Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|View|Application
    {
        return view('livewire.surveys.create');
    }
}
