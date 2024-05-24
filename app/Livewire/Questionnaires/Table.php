<?php

namespace App\Livewire\Questionnaires;

use App\Livewire\TableComponent;
use App\Models\Questionnaire;
use App\Models\Tag;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\View;
use Livewire\Attributes\Url;

class Table extends TableComponent
{
    #[Url(as: 'ordina')]
    public string $column = 'title';

    #[Url(as: 'direzione')]
    public string $direction = 'asc';

    #[Url(as: 'cerca')]
    public string $search = '';

    /** @var array<string> $tags @ */
    #[Url(as: 'tags')]
    public array $tagsFilter = [];

    public Collection $tags;

    public function mount(): void
    {
        $this->tags = Tag::orderBy('tag')->get();
    }

    public function render(
    ): Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|View|Application
    {
        while (true) {
            $questionnaires = Questionnaire::query()
                ->withCount('surveys')
                ->with('tags')
                ->when(count($this->tagsFilter), function (Builder $query) {
                    $query->where(function (Builder $query) {
                        foreach ($this->tagsFilter as $tag) {
                            $query->whereRelation('tags', 'tag', $tag);
                        }
                    });
                })
                ->when($this->search, function (Builder $query, string $search) {
                    $query->where(function (Builder $query) use ($search) {
                        collect(explode(' ', $search))->each(function (string $term) use ($query) {
                            $query->where('title', 'LIKE', "%$term%");
                        });
                    });
                })
                ->orderBy($this->column, $this->direction)
                ->paginate(10, pageName: self::$pageName);

            if ($questionnaires->count() > 0 || $this->getPage(self::$pageName) === 1) {
                break;
            }
            $this->resetPage(self::$pageName);
        }
        return view('livewire.questionnaires.table', compact('questionnaires'));
    }
}
