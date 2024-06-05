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

<x-custom.table :rows="$templates">
  <x-slot:filters>
    <x-choices
        class="md:min-w-[420px] w-full" icon="o-tag" :options="$this->tags"
        wire:model.live.debounce="tagsFilter" label="Tags"
        option-label="tag" option-value="id" placeholder="Cerca per tag"
    >
      @scope('item', $tag)
      <x-list-item :item="$tag" class="h-10">
        <x-slot:value>
          <x-questionnaires.tag :tag="$tag" :key="$tag->id"/>
        </x-slot:value>
      </x-list-item>
      @endscope
      @scope('selection', $tag)
      <x-questionnaires.tag :tag="$tag" :key="$tag->id"/>
      @endscope
    </x-choices>
    <div class="[&>*]:!w-full grow">
      <x-input
          class="!grow w-full" placeholder="Cerca" wire:model.live.debounce="search"
          icon="o-magnifying-glass"
          x-on:keyup.esc="$wire.search = ''; $wire.$refresh();"
          clearable
      />
    </div>
  </x-slot:filters>

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
</x-custom.table>
