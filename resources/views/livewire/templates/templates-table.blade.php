@php
  /** @var App\Models\Tag $tag */
  /** @var App\Models\Template $template */
  $headers = [
    ['key' => 'name', 'label' => 'Nome'],
    ['key' => 'tags', 'label' => 'Tags', 'sortable' => false],
    ['key' => 'user.name', 'label' => 'Autore', 'sortable' => false, 'class' => 'hidden lg:table-cell'],
    ['key' => 'questionnaires_count', 'label' => 'Questionari', 'class' => 'hidden md:table-cell'],
    ['key' => 'other_users_can_see', 'label' => 'Visibile', 'sortable' => false, 'class' => 'hidden lg:table-cell'],
  ];
@endphp

<x-custom.table :rows="$templates">
  <x-slot:filters>
    <x-choices
        class="md:min-w-[420px] w-full" icon="o-tag" :options="$this->tags"
        wire:model.live.debounce="tagsFilter" label="Tags"
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
    <x-table :rows="$templates" :$headers :$sortBy link="/valutazioni/templates/{id}">
      @scope('cell_tags', $questionnaire)
      @foreach($questionnaire->tags as $tag)
        <x-questionnaires.tag :tag="$tag" :key="$tag->id"/>
      @endforeach
      @endscope
    </x-table>
  @else
    <x-alert icon="o-exclamation-triangle" title="Nessun Template trovato"/>
  @endif
</x-custom.table>
