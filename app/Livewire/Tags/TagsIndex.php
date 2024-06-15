<?php

namespace App\Livewire\Tags;

use App\Livewire\Forms\TagForm;
use App\Models\Tag;
use Livewire\Attributes\On;
use Livewire\Component;
use Mary\Traits\Toast;

class TagsIndex extends Component
{
    use Toast;

    public TagForm $form;

    public bool $tagModal = false;

    public int $key = 1;

    public function create(): void
    {
        $this->form->reset();

        $this->tagModal = true;
    }

    #[On('edit-tag')]
    public function edit(int $id): void
    {
        $this->form->setTag(Tag::findOrFail($id));

        $this->tagModal = true;
    }

    public function save()
    {
        if ($this->form->tag) {
            $this->authorize('update', Tag::class);
            $this->form->update();
            $action = 'aggiornato';
        } else {
            $this->authorize('create', Tag::class);
            $this->form->store();
            $action = 'creato';
        }

        $this->tagModal = false;

        $this->reRenderTable();

        return $this->success('Successo!', "Tag $action con successo!");
    }

    public function reRenderTable(): void
    {
        $this->key++;
    }
}
