<?php

namespace App\Livewire\Templates;

use App\Livewire\Forms\TemplateForm;
use App\Models\Tag;
use App\Models\Template;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\View;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;
use Mary\Traits\Toast;

/**
 * @property Collection<Tag> $tags
 */
class ShowTemplate extends Component
{
    use Toast;

    public TemplateForm $form;

    public Template $template;

    public function mount(Template $template): void
    {
        $this->authorize('view', $template);

        $this->form->setTemplate($template);
    }

    public function resetForm(): void
    {
        $this->form->setTemplate($this->template);
    }

    public function save(): void
    {
        $this->authorize('update', $this->template);

        $this->form->update();

        $this->dispatch('updated');

        $this->success('Successo!', 'Template aggiornato con successo');
    }

    #[Computed(cache: true)]
    public function tags(): Collection
    {
        return Tag::select(['id', 'name', 'color'])->orderBy('name')->get();
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

    #[On('updated')]
    public function render(
    ): Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|View|Application {
        $this->template->load('tags:id,name,color', 'user:id,name', 'questionnaires:id,title',
            'questionnaires.tags:id,name,color');

        return view('livewire.templates.show-template');
    }
}
