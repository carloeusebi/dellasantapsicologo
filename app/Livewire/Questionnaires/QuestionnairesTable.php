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
use Livewire\Attributes\Computed;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\Session;
use Livewire\Attributes\Url;

#[Lazy]
class QuestionnairesTable extends TableComponent
{
    #[Url(as: 'ordina', except: ['column' => 'title', 'direction' => 'asc']), Session]
    public array $sortBy = ['column' => 'title', 'direction' => 'asc'];

    #[Url(as: 'cerca', except: ''), Session]
    public string $search = '';

    /** @var array<string> $tags @ */
    #[Url(as: 'tags', except: []), Session]
    public array $tagsFilter = [];

    #[Computed(cache: true)]
    public function tags(): Collection
    {
        return Tag::orderBy('tag')->get();
    }

    public function render(
    ): Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|View|Application
    {
        $questionnaires = $this->goToFirstPageIfResultIsEmpty(function () {
            return Questionnaire::select(['id', 'title', 'created_at'])
                ->withCount('surveys')
                ->with('tags')
                ->current()
                ->when(count($this->tagsFilter), function (Builder $query) {
                    $query->where(function (Builder $query) {
                        foreach ($this->tagsFilter as $tag) {
                            $query->whereRelation('tags', 'tag', $tag);
                        }
                    });
                })
                ->filterByTitle($this->search)
                ->orderBy($this->sortBy['column'], $this->sortBy['direction'])
                ->paginate(10, pageName: self::$pageName)
                ->withQueryString();
        });

        return view('livewire.questionnaires.table', compact('questionnaires'));
    }
}
