@php
  /** @var App\Models\Tag $tag */
  $headers = [
    ['key' => 'name', 'label' => 'Nome'],
    ['key' => 'tags', 'label' => 'Tags', 'sortable' => false],
  ];
@endphp

<x-custom.table :rows="$templates">
  <x-slot:filters>
    <x-choices
        class="md:min-w-[420px] w-full" icon="o-tag" :options="$this->tags"
        wire:model.live.debounce="tagsFilter" @click.stop
        option-label="tag" option-value="tag" placeholder="Cerca per tag"
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
          wire:keyup.esc="clearSearch"
          clearable
      />
    </div>
  </x-slot:filters>

  @if($templates->count())
    <x-table :rows="$templates" :$headers :$sortBy link="/templates/{id}">
    </x-table>
  @else
    <x-alert icon="o-exclamation-triangle" title="Nessun Template trovato"/>
  @endif
</x-custom.table>
