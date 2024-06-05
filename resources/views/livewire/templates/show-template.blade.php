<div>
  <x-slot:title>{{ $template->name }}</x-slot:title>
  <x-slot:breadcrumb>
    <li class="font-bold">
      <a href="{{ route('surveys.templates.index') }}">Templates</a>
    </li>
    <li>{{ $template->name }}</li>
  </x-slot:breadcrumb>

  <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">
    <div class="col-span-2 space-y-4">

      @can('update', $template)
        <x-card separator shadow>
          <x-slot:figure>
            <div class="w-full flex flex-wrap justify-between items-center p-5">
              <h1 class="font-bold text-3xl">{{ $template->name }}</h1>
              <x-button icon="o-trash" responsive label="Elimina" onclick="deleteModal.showModal()"/>
            </div>
          </x-slot:figure>
          <div class="space-y-5">
            <div class="w-full">
              <x-input label="Nome" wire:model.live="name" class="w-full"/>
            </div>
            <div>
              <label class="pt-0 label label-text font-semibold">Tags</label>
              <x-choices
                  class="md:min-w-[420px] w-full" icon="o-tag" :options="$this->tags"
                  wire:model.live.debounce="selectedTags" @click.stop
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
            </div>
            <div class="flex flex-wrap gap-2 justify-between items-center">
              <div><span class="font-bold">Autore: </span>{{ $template->user->name }}</div>
              <x-toggle
                  class="select-none" wire:model.live.debounce="visible" label="Visibile Anche agli altri utenti"
                  wire:click="updateVisibility"
              />
            </div>
            <x-textarea wire:model="description" label="Descrizione"></x-textarea>
          </div>
          <x-slot:actions>
            <div class="flex flex-col md:flex-row md:justify-end gap-2 w-full">
              <x-button class="btn-sm w-full md:w-fit" wire:click="setProperties" spinner="setProperties">
                Reset
              </x-button>
              <x-button class="btn-primary btn-sm md:btn-wide" wire:click="save" spinner="save">Salva
              </x-button>
            </div>
          </x-slot:actions>
        </x-card>

        <x-modal id="deleteModal" title="Elimina Template" class="backdrop-blur">
          <p>Sei sicuro di voler eliminare il template {{ $template->name }}?</p>
          <x-slot:actions>
            <x-button onclick="deleteModal.close()">Annulla</x-button>
            <x-button class="btn-error" wire:click="delete" spinner="delete">Elimina</x-button>
          </x-slot:actions>
        </x-modal>

      @else

        <x-card :title="$template->name" shadow>
          <div class="space-y-5">
            @foreach($template->tags as $tag)
              <x-questionnaires.tag :tag="$tag" :key="$tag->id"/>
            @endforeach
            <div><span class="font-bold">Autore: </span>{{ $template->user->name }}</div>
            <div><strong>Descrizione: </strong>
              <p class="text-sm text-justify">{{ $template->description }}</p>
            </div>
          </div>
        </x-card>

      @endcan
    </div>

    <x-card title="Questionari" shadow class="select-none" wire:ignore>
      @foreach($template->questionnaires as $questionnaire)
        <x-list-item :item="$questionnaire" value="title">
          <x-slot:subValue>
            @foreach($questionnaire->tags as $tag)
              <x-questionnaires.tag :tag="$tag" :key="$tag->id"/>
            @endforeach
          </x-slot:subValue>
        </x-list-item>
      @endforeach
    </x-card>

  </div>

</div>
