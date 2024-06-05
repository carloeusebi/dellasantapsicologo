<div>
  <x-slot:title>{{ $template->name }}</x-slot:title>
  <x-slot:breadcrumb>
    <li class="font-bold">
      <a href="{{ route('surveys.templates.index') }}">Templates</a>
    </li>
    <li>{{ $template->name }}</li>
  </x-slot:breadcrumb>

  <div class="grid grid-cols-1 lg:grid-cols-3 gap-y-8 lg:gap-x-8 items-start">
    <div class="col-span-2">

      @can('update', $template)
        <x-card separator shadow>
          <x-slot:figure>
            <div class="w-full md:flex flex-wrap justify-between items-center p-5">
              <h1 class="font-bold text-3xl">{{ $template->name }}</h1>
              <x-button
                  class="btn-sm w-full mt-2 md:btn-md md:w-fit md:mt-0" icon="o-trash" label="Elimina"
                  onclick="deleteModal.showModal()"
              />
            </div>
          </x-slot:figure>
          @include('templates.form')
          <x-slot:actions>
            <div class="flex flex-col md:flex-row md:justify-end gap-2 w-full">
              <x-button class="btn-sm w-full md:w-fit" wire:click="resetForm" spinner="resetForm">
                Reset
              </x-button>
              <x-button class="btn-primary btn-sm md:btn-wide" wire:click="save" spinner="save">Salva
              </x-button>
            </div>
          </x-slot:actions>
        </x-card>

        <x-modal id="deleteModal" title="Elimina Template" class="backdrop-blur">
          <p>Sei sicuro di voler eliminare il template <span class="italic">{{ $template->name }}</span>?</p>
          <x-slot:actions>
            <x-button onclick="deleteModal.close()">Annulla</x-button>
            <x-button class="btn-error" wire:click="delete" spinner="delete" icon="o-trash">Elimina</x-button>
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

    <x-card title="Questionari" shadow class="select-none">
      <div wire:sortable="updateQuestionnairesOrder" wire:sortable.options="{ animation: 250, delay: 0 }">
        <x-hr target="updateQuestionnairesOrder"/>
        @foreach($template->questionnaires as $questionnaire)
          <div wire:sortable.item="{{ $questionnaire->id }}" class="[&_*]:!text-wrap">
            <x-list-item :item="$questionnaire" value="title">
              <x-slot:subValue>
                @foreach($questionnaire->tags as $tag)
                  <x-questionnaires.tag :tag="$tag" :key="$tag->id"/>
                @endforeach
              </x-slot:subValue>
              <x-slot:actions>
                @can('update', $template)
                  <x-button class="btn btn-sm cursor-grab" type="button" wire:sortable.handle icon="o-bars-3"/>
                @else
                  <input type="hidden" wire:sortable.handle/>
                @endcan
              </x-slot:actions>
            </x-list-item>
          </div>
        @endforeach
      </div>
    </x-card>
  </div>
</div>
