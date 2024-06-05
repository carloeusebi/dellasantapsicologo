<?php

namespace App\Livewire\Surveys;

use App\Models\Template;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\View\View;
use Livewire\Attributes\Lazy;
use Livewire\Component;

#[Lazy]
class TemplatesTable extends Component
{
    public string $search = '';

    public array $expanded = [];

    public function chooseTemplate(int $id): void
    {
        $questionnaires = Template::with('questionnaires:id,title')->findOrFail($id)->questionnaires->toArray();

        $this->dispatch('template-chosen', $questionnaires);
    }

    public function render(
    ): Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|View|Application
    {
        $templates = Template::userScope()
            ->select(['id', 'user_id', 'name', 'description'])
            ->when($this->search, function (Builder $query, string $search) {
                collect(explode(' ', $search))->each(function (string $term) use ($query) {
                    $query->where('title', 'like', "%$term%")
                        ->orWhereRelation('tags', 'tag', 'like', "%$term%");
                });
            })
            ->with('user:id,name', 'tags:id,color,tag')
            ->withCount('questionnaires')
            ->paginate(10, pageName: 'pagina_templates');

        return view('livewire.surveys.templates-table', compact('templates'));
    }
}
