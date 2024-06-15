@php
  /** @var App\Models\Tag $tag */

$headers = [
    ['key' => 'tag', 'label' => 'Tag'],
    ['key' => 'color', 'label' => 'Colore', 'sortable' => false],
    ['key' => 'questionnaires_count', 'label' => 'Questionari', 'class' => 'w-10'],
]
@endphp

<x-custom.table :rows="$tags">
  <x-slot:filters>
    <div class="[&>*]:!w-full grow">
      <x-input
          class="!grow w-full" placeholder="Cerca" wire:model.live.debounce="search"
          icon="o-magnifying-glass"
          wire:keyup.esc="clearSearch"
          clearable
      />
    </div>
  </x-slot:filters>

  @if($tags->count())
    <x-table :rows="$tags" :$headers :$sortBy>
      @scope('cell_color', $tag)
      <div class="p-1" style="background-color: {{ $tag->color }}">
        <span class="text-white">{{ $tag->color }}</span>
      </div>
      @endscope

      @scope('actions', $tag)
      <div>
        <div class="w-fit space-x-2">
          <x-button wire:click="edit({{ $tag->id }})" icon="o-pencil" class="btn-sm"/>
          <x-button onclick="deleteModalTag{{ $tag->id }}.showModal()" icon="o-trash" class="btn-sm"/>
        </div>

        <x-modal id="deleteModalTag{{ $tag->id }}" title="Elimina Tag" class="backdrop-blur">
          <p class="text-start"> Sei sicuro di voler eliminare il tag selezionato? </p>
          <x-slot:actions>
            <x-button onclick="deleteModalTag{{ $tag->id }}.close()">Annulla</x-button>
            <x-button wire:click="delete({{ $tag->id }})" spinner="delete" class="btn-error" icon="o-trash">
              Elimina
            </x-button>
          </x-slot:actions>
        </x-modal>
      </div>
      @endscope
    </x-table>
  @else
    <x-alert icon="o-exclamation-triangle" title="Nessun Tag trovato"/>
  @endif
</x-custom.table>

