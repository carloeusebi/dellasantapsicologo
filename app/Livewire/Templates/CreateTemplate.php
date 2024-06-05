<?php

namespace App\Livewire\Templates;

use App\Livewire\Forms\TemplateForm;
use App\Models\Tag;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\View;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;
use Mary\Traits\Toast;

/**
 * @property Collection<Tag> $tags
 */
class CreateTemplate extends Component
{
    use Toast;

    public static int $CHOOSE_TITLE = 1;
    public static int $CHOOSE_QUESTIONNAIRES = 2;

    public int $step = 1;

    public TemplateForm $form;

    public function next(): void
    {
        if ($this->step === self::$CHOOSE_QUESTIONNAIRES) {
            return;
        }

        if ($this->step === self::$CHOOSE_TITLE) {
            $this->form->validateOnly('name');
            $this->form->validateOnly('description');
            $this->form->validateOnly('visible');
            $this->form->validateOnly('selectedTags');
        }

        $this->step++;
    }

    public function prev(): void
    {
        if ($this->step === self::$CHOOSE_TITLE) {
            return;
        }

        $this->step--;
    }

    public function store(): void
    {
        $template = $this->form->store();

        $this->success('Successo', 'Template creato con successo!',
            redirectTo: route('surveys.templates.show', $template));
    }

    #[Computed]
    public function tags(): Collection
    {
        return Tag::select(['id', 'tag', 'color'])->orderBy('tag')->get();
    }

    #[On('questionnairesUpdated')]
    public function updateSelectedQuestionnaires(array $questionnaires): void
    {
        $this->form->selectedQuestionnaires = collect($questionnaires)->pluck('id')->toArray();
    }

    public function render(
    ): Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|View|Application
    {
        return view('livewire.templates.create-template');
    }
}
