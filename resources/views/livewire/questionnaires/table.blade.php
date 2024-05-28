@php use App\Models\Questionnaire;use App\Models\Tag; @endphp
@php
  /** @var Questionnaire $questionnaire */

  $headers = [
    ['key' => 'title', 'label' => 'Titolo'],
    ['key' => 'tags', 'label' => 'Tags', 'sortable' => false],
    ['key' => 'surveys_count', 'label' => 'Utilizzi', 'class' => 'hidden md:table-cell'],
    ['key' => 'created_at', 'label' => 'Creato', 'class' => 'hidden md:table-cell'],
  ];
@endphp
<div class="[&_.reset-button]:h-[46px]">
  <x-custom.table :rows="$questionnaires">
    <x-slot:filters>
      <x-choices
          class="md:min-w-[420px] select-sm  w-full" icon="o-tag" :options="$this->tags"
          wire:model.live.debounce="tagsFilter"
          option-label="tag" option-value="tag" placeholder="Cerca per tag"
      >
        @scope('item', $tag)
        <x-list-item :item="$tag" class="h-10">
          <x-slot:value>
            <div
                class="badge badge-sm badge-outline my-1 h-fit font-bold"
                style="color: {{ $tag->color }}; background-color: {{$tag->color}}20; "
            >{{ $tag->tag }}</div>
          </x-slot:value>
        </x-list-item>
        @endscope
        @scope('selection', $tag)
        <div
            @click.stop
            class="badge badge-xs badge-outline my-1 h-fit font-bold"
            style="color: {{ $tag->color }}; background-color: {{$tag->color}}20; "
        >{{ $tag->tag }}</div>
        @endscope
      </x-choices>
      <div class="[&>*]:!w-full grow">
        <x-input
            class="w-full h-[46px]" wire:model.live.debounce="search"
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
          <div
              class="badge badge-xs md:badge-sm badge-outline my-1 h-fit font-bold"
              style="color: {{ $tag->color }}; background-color: {{$tag->color}}20; "
          >{{ $tag->tag }}</div>
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
