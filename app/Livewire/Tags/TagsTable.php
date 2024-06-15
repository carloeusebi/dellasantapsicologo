<?php

namespace App\Livewire\Tags;

use App\Livewire\TableComponent;
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

    #[Url(as: 'ordina', except: ['column' => 'tag', 'direction' => 'asc']), Session]
    public array $sortBy = [
        'column' => 'tag',
        'direction' => 'asc',
    ];

    public function edit(int $id): void
    {
        $this->dispatch('edit-tag', $id);
    }

    public function delete(int $id): void
    {
        Tag::findOrFail($id)->delete();

        $this->success('Successo!', 'Tag eliminato con successo!');
    }

    public function render(
    ): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|Factory|View|Application
    {
        $tags = $this->goToFirstPageIfResultIsEmpty(function () {
            return Tag::query()
                ->when($this->search, fn(Builder $query, string $search) => $query->where('tag', 'like', "%$search%"))
                ->withCount('questionnaires')
                ->orderBy($this->sortBy['column'], $this->sortBy['direction'])
                ->paginate(10);
        });

        return view('livewire.tags.tags-table', compact('tags'));
    }
}
