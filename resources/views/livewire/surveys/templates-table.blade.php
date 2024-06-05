@php
  /** @var App\Models\Tag $tag */
  /** @var App\Models\Template $template */
  $headers = [
    ['key' => 'name', 'label' => 'Nome'],
    ['key' => 'tags', 'label' => 'Tags', 'sortable' => false, 'class' => 'hidden lg:table-cell'],
    ['key' => 'user.name', 'label' => 'Autore', 'sortable' => false, 'class' => 'hidden lg:table-cell'],
    ['key' => 'questionnaires_count', 'label' => 'Questionari', 'class' => 'hidden md:table-cell'],
  ];
@endphp

<div>
  <x-table :$headers :rows="$templates" wire:model="expanded" expandable>
    @scope('cell_tags', $template)
    @foreach($template->tags as $tag)
      <x-questionnaires.tag :tag="$tag"/>
    @endforeach
    @endscope

    @scope('actions', $template)
    <x-button class="btn-sm" wire:click="chooseTemplate({{ $template->id }})">Seleziona</x-button>
    @endscope

    @scope('expansion', $template)
    <div class="text-xs flex flex-wrap gap-8">
      <div>
        <div class="font-bold">Descrizione:</div>
        <p class="h-5 my-1 flex items-center">{{ $template->description }}</p>
      </div>
      <div class="lg:hidden">
        <div class="font-bold">Tags:</div>
        @foreach($template->tags as $tag)
          <x-questionnaires.tag :tag="$tag"/>
        @endforeach
      </div>
      <div class="lg:hidden">
        <div class="font-bold">Autore:</div>
        <div class="h-5 my-1 flex items-center">{{ $template->user?->name }}</div>
      </div>
      <div class="md:hidden">
        <div class="font-bold">Questionari:</div>
        <div class="h-5 my-1 flex items-center">{{ $template->questionnaires_count }}</div>
      </div>
    </div>
    @endscope
  </x-table>
</div>
