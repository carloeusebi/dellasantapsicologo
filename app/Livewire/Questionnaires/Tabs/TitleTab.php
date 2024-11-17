<?php

namespace App\Livewire\Questionnaires\Tabs;

use App\Livewire\Forms\QuestionnaireForm;
use App\Models\Questionnaire;
use App\Models\Tag;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Collection;
use Illuminate\View\View;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Lazy;
use Livewire\Component;

#[Lazy]
class TitleTab extends Component
{
    public Questionnaire $questionnaire;

    public QuestionnaireForm $form;

    public function mount(): void
    {
        $this->form->setQuestionnaire($this->questionnaire);
    }

    #[Computed(cache: true)]
    public function tags(): Collection
    {
        return Tag::select(['id', 'name', 'color'])->orderBy('name')->get();
    }

    public function save(): void
    {
        $this->authorize('update', $this->questionnaire);

        $this->form->update();

        $this->dispatch('updated', 'Questionario aggiornato con successo!');
    }

    public function render(
    ): Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|View|Application {
        return view('livewire.questionnaires.tabs.title-tab');
    }
}
