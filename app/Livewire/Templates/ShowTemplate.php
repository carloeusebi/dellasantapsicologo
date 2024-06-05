<?php

namespace App\Livewire\Templates;

use App\Models\Tag;
use App\Models\Template;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\View;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Mary\Traits\Toast;

/**
 * @property Collection<Tag> $tags
 */
class ShowTemplate extends Component
{
    use Toast;

    public Template $template;

    #[Validate('required|string', as: 'Nome')]
    public string $name = '';

    public string $description = '';

    public bool $visible = false;

    #[Validate('array', as: 'Tag')]
    public $selectedTags = [];

    public function mount(Template $template): void
    {
        $this->authorize('view', $template);

        $this->setProperties();

        $this->visible = $this->template->visible;
    }

    #[On('reset')]
    public function setProperties(): void
    {
        $this->name = $this->template->name;

        $this->description = $this->template->description;

        $this->selectedTags = $this->template->tags->pluck('id')->toArray();

    }

    public function updateVisibility(): void
    {
        $this->authorize('update', $this->template);

        $this->template->update(['visible' => !$this->template->visible]);

        $this->success('Successo!', 'Visibilità del template aggiornata con successo');
    }

    public function save(): void
    {
        $this->authorize('update', $this->template);

        $this->validate();

        $this->template->update([
            'name' => $this->name,
            'description' => $this->description,
        ]);

        $this->template->tags()->sync($this->selectedTags);

        $this->success('Successo!', 'Template aggiornato con successo');
    }

    #[Computed(cache: true)]
    public function tags(): Collection
    {
        return Tag::select(['id', 'tag', 'color'])->get();
    }

    /** @param  array<array{'value': string, 'order': int}>  $newOrder */
    public function updateQuestionnairesOrder(array $newOrder): void
    {
        $this->authorize('update', $this->template);

        foreach ($newOrder as $item) {
            $this->template->questionnaires()->updateExistingPivot($item['value'], ['order' => $item['order']]);
        }

        $this->success('Successo!', 'Ordine dei questionari aggiornato con successo');
    }

    public function delete(): void
    {
        $this->authorize('delete', $this->template);

        $this->template->delete();

        $this->success('Successo!', 'Template eliminato con successo!',
            redirectTo: route('surveys.templates.index'));
    }

    public function render(
    ): Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|View|Application
    {
        $this->template->load('tags:id,tag,color', 'user:id,name', 'questionnaires:id,title',
            'questionnaires.tags:id,tag,color');

        $this->visible = $this->template->visible;

        return view('livewire.templates.show-template');
    }
}
