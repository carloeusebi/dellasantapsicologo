<div {{ $attributes->class(['space-y-5']) }}>
  <x-input
      wire:model.live.debounce="form.title" label="Titolo" placeholder="Nome del questionario" first-error-only
      :disabled="$questionnaire && auth()->user()->cannot('updateText', $questionnaire)"
  />
  <x-textarea
      wire:model.live.debounce="form.description" label="Descrizione" placeholder="Descrizione del questionario"
      first-error-only rows="5"
      :disabled="$questionnaire && auth()->user()->cannot('updateText', $questionnaire)"
  />

  <x-choices
      class="md:min-w-[420px] w-full" icon="o-tag" :options="$this->tags"
      wire:model.live="form.selectedTags" label="Tags"
      option-label="tag" option-value="id" placeholder="Cerca per tag"
      error-field="selectedTags.*" first-error-only
      :disabled="$questionnaire && auth()->user()->cannot('updateText', $questionnaire)"
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
  <x-checkbox
      label="Visibile anche agli altri utenti" wire:model="form.visible"
      :disabled="$questionnaire && auth()->user()->cannot('updateText', $questionnaire)"
  />
</div>
