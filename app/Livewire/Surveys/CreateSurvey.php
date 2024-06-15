<?php

namespace App\Livewire\Surveys;

use App\Livewire\Forms\TemplateForm;
use App\Models\Patient;
use App\Models\Questionnaire;
use App\Models\Tag;
use App\Services\SurveyService;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;
use Mary\Traits\Toast;

/**
 * @property array<Questionnaire> $selectedQuestionnaires
 * @property Collection<Patient> $patients
 */
class CreateSurvey extends Component
{
    use Toast;

    public static int $CHOOSE_PATIENT = 1;
    public static int $CHOOSE_QUESTIONNAIRES = 2;
    public static int $CONFIRM = 3;

    #[Url(as: 'patient_id', except: null)]
    public ?string $queryStringPatientId = null;

    public ?Patient $patient;

    public $patientId;

    public array $selectedQuestionnaires;

    public int $step = 1;

    public string $title = '';

    public bool $sendEmail = false;

    public bool $usingTemplate = false;

    public bool $createTemplate = false;

    public TemplateForm $form;

    public function mount(): void
    {
        try {
            $this->validate(['queryStringPatientId' => 'nullable|exists:patients,id',]);
            $this->patientId = $this->queryStringPatientId;
        } catch (ValidationException) {
            $this->queryStringPatientId = null;
        }
    }

    #[Computed(cache: true)]
    public function patients(): Patient|Collection
    {
        return Patient::userScope()
            ->orderBy('first_name')
            ->get();
    }

    #[On('questionnairesUpdated')]
    public function updateSelectedQuestionnaires(array $questionnaires): void
    {
        $this->selectedQuestionnaires = $questionnaires;
    }

    #[On('template-chosen')]
    public function useTemplate(array $questionnaires, string $title): void
    {
        $this->selectedQuestionnaires = $questionnaires;

        $this->title = $title;

        $this->usingTemplate = true;

        $this->next();
    }

    public function next(): void
    {
        if ($this->step === self::$CHOOSE_PATIENT) {
            $this->validate(['patientId' => 'required|integer|exists:patients,id',],
                attributes: ['patientId' => 'Paziente']
            );
            $this->patient = Patient::findOrFail($this->patientId);
        } elseif ($this->step === self::$CHOOSE_QUESTIONNAIRES) {
            $this->validate([
                'selectedQuestionnaires' => 'required|array|min:1',
                'selectedQuestionnaires.*.id' => 'required|integer|exists:questionnaires,id',
            ],
                ['selectedQuestionnaires.*' => 'Seleziona almeno un questionario',]
            );
        } elseif ($this->step === self::$CONFIRM) {
            return;
        }

        $this->step += 1;
    }

    public function prev(): void
    {
        if ($this->step === self::$CHOOSE_PATIENT) {
            return;
        }

        $this->reset('title', 'usingTemplate');

        $this->step -= 1;
    }

    public function store(SurveyService $service): null
    {
        $this->validate([
            'patientId' => 'required|integer|exists:patients,id',
            'selectedQuestionnaires' => 'required|array|min:1',
            'selectedQuestionnaires.*.id' => 'required|integer|exists:questionnaires,id',
            'title' => 'required|string|max:255',
        ], attributes: [
            'patientId' => 'Paziente',
            'selectedQuestionnaires.*' => 'Questionari',
            'title' => 'Titolo',
        ]);

        if ($this->createTemplate) {
            $this->form->selectedQuestionnaires = collect($this->selectedQuestionnaires)->pluck('id')->toArray();
            $this->form->store();
        }

        $survey = Patient::findOrFail($this->patientId)
            ->surveys()
            ->create(['title' => $this->title]);

        $survey->questionnaires()
            ->attach(collect($this->selectedQuestionnaires)->pluck('id')->toArray());

        $survey->save();

        $this->reset(['patientId', 'selectedQuestionnaires', 'title', 'step']);

        try {
            if ($this->sendEmail) {
                $service->sendEmailWithLinkToTest($survey, shouldQueue: true);
            }
            $this->success('Successo!', 'Test di valutazione creato con successo!');
        } catch (Exception $e) {
            Log::error($e->getMessage());
            $this->warning('Test di valutazione creato con successo!', 'Errore nell\'invio della email!',
                timeout: 7_000);
        }

        return $this->redirect(route('surveys.show', $survey), true);
    }

    #[Computed(cache: true)]
    public function tags(): Collection
    {
        return Tag::select(['id', 'name', 'color'])
            ->orderBy('name')
            ->get();
    }

    public function render(
    ): Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|View|Application
    {
        return view('livewire.surveys.create-survey');
    }
}
