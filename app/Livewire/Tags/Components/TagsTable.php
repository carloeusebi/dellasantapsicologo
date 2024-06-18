<?php

namespace App\Livewire\Tags\Components;

use App\Livewire\Components\TableComponent;
use App\Models\Tag;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\View\View;
use Livewire\Attributes\Session;
use Livewire\Attributes\Url;
use Mary\Traits\Toast;

class TagsTable extends TableComponent
{
    use Toast;

    #[Url(as: 'Cerca'), Session]
    public string $search = '';

    #[Url(as: 'ordina', except: ['column' => 'name', 'direction' => 'asc']), Session]
    public array $sortBy = [
        'column' => 'name',
        'direction' => 'asc',
    ];

    public function edit(int $id): void
    {
        $this->dispatch('edit-tag', $id);
    }

    public function delete(int $id): void
    {
        $this->authorize('delete', Tag::class);

        Tag::findOrFail($id)->delete();

        $this->success('Successo!', 'Tag eliminato con successo!');
    }

    public function render(
    ): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|Factory|View|Application
    {
        $tags = $this->goToFirstPageIfResultIsEmpty(function () {
            return Tag::query()
                ->when($this->search, fn(Builder $query, string $search) => $query->where('name', 'like', "%$search%"))
                ->withCount('questionnaires')
                ->orderBy($this->sortBy['column'], $this->sortBy['direction'])
                ->paginate(10);
        });

        return view('livewire.tags.components.tags-table', compact('tags'));
    }
}
