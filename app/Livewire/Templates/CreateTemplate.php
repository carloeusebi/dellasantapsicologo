<?php

namespace App\Livewire\Templates;

use App\Models\Tag;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
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

    #[Validate(['required', 'string', 'max:255'], as: 'Nome')]
    public string $name = '';

    #[Validate(['nullable', 'string'], as: 'Descrizione')]
    public string $description = '';

    #[Validate('nullable|array', as: 'tags')]
    public array $selectedTags = [];

    #[Validate('required|array|exists:questionnaires,id', as: 'questionnaires')]
    public array $selectedQuestionnaires = [];

    #[Validate('required|boolean', as: 'Visibile')]
    public bool $visible = false;

    public function next(): void
    {
        if ($this->step === self::$CHOOSE_QUESTIONNAIRES) {
            return;
        }

        if ($this->step === self::$CHOOSE_TITLE) {
            $this->validate([
                'name' => 'required|string|max:255',
                'description' => 'nullable|string',
                'visible' => 'required|boolean',
                'selectedTags' => 'nullable|array',
                'selectedTags.*' => 'exists:tags,id',
            ], attributes: [
                'name' => 'Nome',
                'description' => 'Descrizione',
                'visible' => 'Visibile',
                'selectedTags' => 'Tags',
                'selectedTags.*' => 'Tag.*',
            ]);
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
        $this->validateOnly('selectedQuestionnaires', [
            'selectedQuestionnaires' => 'required|array|exists:questionnaires,id',
        ], attributes: [
            'selectedQuestionnaires' => 'Questionari',
        ]);

        $template = Auth::user()->templates()->create([
            'name' => $this->name,
            'description' => $this->description,
            'visible' => $this->visible,
        ]);

        $template->tags()->attach($this->selectedTags);
        $template->questionnaires()->attach($this->selectedQuestionnaires);

        $template->save();

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
        $this->selectedQuestionnaires = collect($questionnaires)->pluck('id')->toArray();
    }

    public function render(
    ): Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|View|Application
    {
        return view('livewire.templates.create-template');
    }
}
