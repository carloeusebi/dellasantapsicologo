<?php

namespace App\Livewire\Questionnaires\Components;

use App\Livewire\Components\TableComponent;
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
        return Tag::orderBy('name')->get();
    }

    public function render(
    ): Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|View|Application
    {
        $questionnaires = $this->goToFirstPageIfResultIsEmpty(function () {
            return Questionnaire::select(['id', 'user_id', 'title', 'created_at'])
                ->withCount('surveys')
                ->userScope()
                ->with('tags:id,name,color', 'user:id,name')
                ->when(count($this->tagsFilter), function (Builder $query) {
                    $query->where(function (Builder $query) {
                        foreach ($this->tagsFilter as $tag) {
                            $query->whereRelation('tags', 'name', $tag);
                        }
                    });
                })
                ->filterByTitle($this->search)
                ->orderBy($this->sortBy['column'], $this->sortBy['direction'])
                ->paginate(10, pageName: self::$pageName)
                ->withQueryString();
        });

        return view('livewire.questionnaires.components.questionnaires-table', compact('questionnaires'));
    }
}
