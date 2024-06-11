@php use App\Models\Questionnaire;use App\Models\Tag; @endphp
@php
  /** @var Questionnaire $questionnaire */

  $headers = [
    ['key' => 'title', 'label' => 'Titolo'],
    ['key' => 'tags', 'label' => 'Tags', 'sortable' => false],
    ['key' => 'surveys_count', 'label' => 'Utilizzi'],
    ['key' => 'created_at', 'label' => 'Creato'],
    ['key' => 'user.name', 'label' => 'Creato da'],
  ];
@endphp
<div class="[&_.reset-button]:h-[46px]">
  <x-custom.table :rows="$questionnaires">
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
            class="w-full" wire:model.live.debounce="search"
            icon="o-magnifying-glass" placeholder="Cerca"
            wire:keyup.esc="clearSearch"
            clearable
        />
      </div>
    </x-slot:filters>

    @if($questionnaires->count())
      <x-table :rows="$questionnaires" :$headers :$sortBy link="/questionari/{id}">
        @scope('cell_tags', $questionnaire)
        @foreach($questionnaire->tags as $tag)
          <x-questionnaires.tag :tag="$tag" :key="$tag->id"/>
        @endforeach
        @endscope

        @scope('cell_created_at', $questionnaire)
        {!! get_formatted_date($questionnaire->created_at) !!}
        @endscope
      </x-table>
    @else
      <x-alert icon="o-exclamation-triangle" title="Nessun Questionario trovato"/>
    @endif
  </x-custom.table>
</div>
