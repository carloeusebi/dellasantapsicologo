<?php

namespace App\Livewire\Templates\Components;

use App\Livewire\Components\TableComponent;
use App\Models\Tag;
use App\Models\Template;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\View;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\Session;
use Livewire\Attributes\Url;

/** @property Collection<Tag> $tags */
#[Lazy]
class TemplatesTable extends TableComponent
{
    #[Url(as: 'ordina', except: ['column' => 'name', 'direction' => 'asc']), Session]
    public array $sortBy = [
        'column' => 'name',
        'direction' => 'asc',
    ];

    #[Url(as: 'search', except: ''), Session]
    public string $search = '';

    #[Url(as: 'tags', except: []), Session]
    public array $tagsFilter = [];

    public array $expanded = [];

    /** @var Collection<Tag> $tags @ */
    #[Computed(cache: true)]
    public function tags(): Collection
    {
        return Tag::select(['id', 'name', 'color'])->orderBy('name')->get();
    }

    public function render(
    ): Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|View|Application
    {
        $templates = $this->goToFirstPageIfResultIsEmpty(function () {
            return Template::userScope()
                ->select([
                    'id', 'user_id', 'name', 'description', 'visible'
                ])
                ->with('user:id,name', 'tags:id,name,color')
                ->withCount('questionnaires')
                ->when(count($this->tagsFilter), function ($query) {
                    $query->where(function (Builder $query) {
                        foreach ($this->tagsFilter as $tag) {
                            $query->whereRelation('tags', 'name', $tag);
                        }
                    });
                })
                ->when($this->search, function (Builder $query, string $search) {
                    collect(explode(' ', $search))->each(function (string $term) use ($query) {
                        $query->where('name', 'like', "%$term%");
                    });
                })
                ->orderBy($this->sortBy['column'], $this->sortBy['direction'])
                ->paginate(10, pageName: self::$pageName);
        });

        return view('livewire.templates.components.templates-table', compact('templates'));
    }
}
