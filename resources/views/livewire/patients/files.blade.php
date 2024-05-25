<div class="full-width-modal">
  <x-button
      class="btn-warning" label="Gestisci i files" icon="o-paper-clip" responsive x-on:click="$wire.modal = true"
  />

  <x-modal
      wire:model="modal" :title="'Files di '. $patient->full_name" class="backdrop-blur"
      separator
  >
    <div class="md:flex justify-start items-start max-w-full overflow-x-hidden">
      <x-file
          class="md:[&_input]:rounded-r-none [&_input]:!w-full" wire:model="file" hint="Solo PDF"
          accept="application/pdf"
      />
      <x-button class="mt-1 btn-primary md:!rounded-l-none" wire:click="save" spinner="save" icon="o-arrow-up-tray">
        CARICA
      </x-button>
      <x-divider/>
    </div>


    @if($patient->hasMedia('files'))
      <x-table
          class="max-w-full"
          :rows="$patient->getMedia('files')" expandable wire:model="expanded"
          :headers="[
            ['key' => 'name', 'label' => 'Nome', 'class' => 'md:text-sm text-xs max-w-1/2 md:max-w-2/3'],
            ['key' => 'created_at', 'label' => 'Caricato', 'class' => 'hidden md:table-cell']
        ]"
      >
        @scope('cell_created_at', $file)
        <span>{{ $file->created_at->diffForHumans() }}</span>
        <span class="text-xs">({{ $file->created_at->translatedFormat('d F Y H:i') }})</span>
        @endscope

        @scope('expansion', $file)
        <div class="flex justify-start gap-4">
          <div class="flex ms-2 flex-col md:flex-row gap-2 justify-end">
            <x-button
                class="btn btn-sm btn-info" icon="o-arrow-down-tray" wire:click="download({{ $file->id }})"
                spinner="download"
            >
              Scarica
            </x-button>
            <!--suppress JSUnresolvedReference -->
            <x-button
                class="btn btn-sm btn-error" icon="o-trash" onclick="fileDeleteModal{{ $file->id }}.showModal()"
                spinner="delete"
            >Elimina
            </x-button>
          </div>
          <div class="md:hidden">
            <div class="font-bold">Caricato:</div>
            <div>{{ $file->created_at->diffForHumans() }}</div>
            <div class="text-xs">({{ $file->created_at->translatedFormat('d F Y H:i') }})</div>
          </div>
        </div>

        <div class="[&_.modal-box]:!max-w-[32rem] text-md">
          <x-modal id="fileDeleteModal{{ $file->id }}" title="Elimina file" separator class="backdrop-blur">
            <p class="truncate">Sei sicuro di voler eliminare {{ $file->name }}?</p>
            <p class="italic">Questa azione non è reversibile.</p>
            <x-slot:actions>
              <x-button label="Annulla" onclick="fileDeleteModal{{ $file->id }}.close()"/>
              <x-button
                  label="Elimina" class="btn-error" spinner="delete" wire:click="delete({{$file->id}})"
                  spinner="delete" icon="o-trash"
              />
            </x-slot:actions>
          </x-modal>
          @endscope
        </div>
      </x-table>
    @else
      <div class="w-full text-center my-2 opacity-50">{{ $patient->full_name }} non ha nessun file.</div>
    @endif

    <x-slot:actions>
      <x-button label="Chiudi" x-on:click="$wire.modal = false"/>
    </x-slot:actions>
  </x-modal>
</div>
