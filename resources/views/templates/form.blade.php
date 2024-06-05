<div class="space-y-5">
  <x-input label="Nome" placeholder="Dai un nome al Template" wire:model.live.debounce="form.name"/>
  <x-choices
      class="md:min-w-[420px] w-full" icon="o-tag" :options="$this->tags"
      wire:model.live.debounce="form.selectedTags" label="Tags"
      option-label="tag" option-value="id" placeholder="Cerca per tag"
      error-field="selectedTags.*" first-error-only
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
  <x-textarea label="Descrizione" placeholder="Descrizione" wire:model.live.debounce="form.description"/>
  <x-checkbox label="Visibile anche agli altri utenti" wire:model="form.visible"/>
</div>
