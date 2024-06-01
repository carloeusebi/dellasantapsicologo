<?php

namespace App\Livewire;

use App\Models\Questionnaire;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\View;
use Livewire\Component;

/**
 * @property Collection<Questionnaire> $nonSelectedQuestionnaires
 * @property \Illuminate\Support\Collection<Questionnaire> $selectedQuestionnaires
 */
class QuestionnairePicker extends Component
{
    public Collection $nonSelectedQuestionnaires;

    public ?\Illuminate\Support\Collection $selectedQuestionnaires;

    public string $search = '';

    public function mount(): void
    {
        $this->selectedQuestionnaires = collect();
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
            $this->selectedQuestionnaires->push(Questionnaire::select(['id', 'title'])->find($id));
        }
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

    public function render(
    ): Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|View|Application
    {
        $this->nonSelectedQuestionnaires = Questionnaire::select(['id', 'title'])
            ->with('tags:id,tag,color')
            ->current()
            ->filterByTitle($this->search)
            ->when($this->search, function (Builder $query, string $search) {
                $query->orWhereRelation('tags', 'tag', 'like', "%$search%");
            })
            ->whereNotIn('id', $this->selectedQuestionnaires?->pluck('id')->toArray() ?? [])
            ->orderBy('title')
            ->get();

        return view('livewire.questionnaire-picker');
    }
}
