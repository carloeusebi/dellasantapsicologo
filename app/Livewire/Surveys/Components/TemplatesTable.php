<?php

namespace App\Livewire\Surveys\Components;

use App\Models\Tag;
use App\Models\Template;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\View;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Lazy;
use Livewire\Component;

/** @property Collection<Tag> $tags */
#[Lazy]
class TemplatesTable extends Component
{
    public array $sortBy = [
        'column' => 'name',
        'direction' => 'asc',
    ];

    public string $search = '';

    public array $tagsFilter = [];

    public array $expanded = [];

    #[Computed]
    public function tags(): Collection
    {
        return Tag::select(['id', 'name', 'color'])->orderBy('name')->get();
    }

    public function chooseTemplate(int $id): void
    {
        $template = Template::with('questionnaires:id,title')->findOrFail($id);

        $this->dispatch('template-chosen',
            $template->questionnaires->toArray(),
            $template->name,
        );
    }

    public function render(
    ): Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|View|Application {
        $templates = Template::userScope()
            ->select(['id', 'user_id', 'name', 'description'])
            ->with('user:id,name', 'tags:id,color,name')
            ->withCount('questionnaires')
            ->when($this->search, function (Builder $query, string $search) {
                collect(explode(' ', $search))->each(function (string $term) use ($query) {
                    $query->whereRelation('tags', 'name', 'like', "%$term%");
                });
            })
            ->when($this->tagsFilter, function (Builder $query, array $tags) {
                $query->where(function (Builder $query) use ($tags) {
                    foreach ($tags as $id) {
                        $query->whereRelation('tags', 'tags.id', $id);
                    }
                });
            })
            ->paginate(10, pageName: 'pagina_templates');

        return view('livewire.surveys.components.templates-table', compact('templates'));
    }
}
