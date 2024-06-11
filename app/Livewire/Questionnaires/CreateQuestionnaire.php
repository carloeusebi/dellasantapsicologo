<?php

namespace App\Livewire\Questionnaires;

use App\Livewire\Forms\QuestionnaireForm;
use App\Models\Questionnaire;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\Computed;
use Livewire\Component;

/** @property Collection<Tag> $tag */
class CreateQuestionnaire extends Component
{
    public ?Questionnaire $questionnaire = null;

    public QuestionnaireForm $form;

    public int $step = 1;

    #[Computed(cache: true)]
    public function tags(): Collection
    {
        return Tag::select(['id', 'tag', 'color'])->orderBy('tag')->get();
    }

    public function save(): void
    {
        $questionnaire = $this->form->store();

        $this->redirectRoute('questionnaires.show', [$questionnaire, 'tab' => ShowQuestionnaire::$QUESTIONS],
            navigate: true);
    }
}
