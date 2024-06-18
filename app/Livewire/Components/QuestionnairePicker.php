<?php

namespace App\Livewire\Components;

use App\Models\Questionnaire;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\View;
use Livewire\Attributes\Computed;
use Livewire\Component;

/**
 * @property Collection<Questionnaire> $nonSelectedQuestionnaires
 * @property \Illuminate\Support\Collection<Questionnaire> $selectedQuestionnaires
 * @property Collection<Questionnaire> $questionnaires
 */
class QuestionnairePicker extends Component
{
    public Collection $nonSelectedQuestionnaires;

    public ?\Illuminate\Support\Collection $selectedQuestionnaires;

    public string $search = '';

    public function mount(): void
    {
        $this->selectedQuestionnaires = collect();
        $this->nonSelectedQuestionnaires = $this->questionnaires;
    }

    public function updateSelectedQuestionnaires(array $newOrder): void
    {
        $this->selectedQuestionnaires = collect(array_map(function (array $item) {
            return Questionnaire::select(['id', 'title'])->find($item['value']);
        }, $newOrder[1]['items']));

        $this->dispatch('questionnairesUpdated', $this->selectedQuestionnaires);
    }

    public function selectQ(int $id): void
    {
        if (!$this->selectedQuestionnaires->contains('id', $id)) {
            $this->selectedQuestionnaires->push($this->questionnaires->firstWhere('id', $id));
        }
        $this->nonSelectedQuestionnaires->reject(fn(Questionnaire $questionnaire) => $questionnaire->id === $id);
        $this->dispatch('questionnairesUpdated', $this->selectedQuestionnaires);
    }

    public function removeQ(int $id): void
    {
        $this->selectedQuestionnaires = $this->selectedQuestionnaires->reject(fn(Questionnaire $questionnaire
        ) => $questionnaire->id === $id);
        $this->dispatch('questionnairesUpdated', $this->selectedQuestionnaires);
    }

    public function removeAll(): void
    {
        $this->selectedQuestionnaires = collect();
        $this->dispatch('questionnairesUpdated', $this->selectedQuestionnaires);
    }

    /**
     * @return Collection<Questionnaire>
     */
    #[Computed]
    public function questionnaires(): Collection
    {
        return Questionnaire::select(['id', 'title'])
            ->with('tags:id,name,color')
            ->userScope()
            ->filterByTitle($this->search)
            ->when($this->search, function (Builder $query, string $search) {
                $query->orWhere(function (Builder $query) use ($search) {
                    collect(explode(' ', $search))->each(function (string $term) use ($query) {
                        $query->whereRelation('tags', 'name', 'like', "%$term%");
                    });
                });
            })
            ->orderBy('title')
            ->get();
    }

    public function render(
    ): Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|View|Application
    {
        $this->nonSelectedQuestionnaires = $this->questionnaires->diff($this->selectedQuestionnaires);

        return view('livewire.components.questionnaire-picker');
    }
}
