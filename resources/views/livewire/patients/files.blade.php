@php use Spatie\MediaLibrary\MediaCollections\Models\Media; @endphp
@php
  /** @var Media $file */
    $headers = [
        ['key' => 'name', 'label' => 'Nome', 'class' => 'md:text-sm text-xs max-w-1/2 md:max-w-2/3'],
        ['key' => 'created_at', 'label' => 'Caricato il', 'class' => 'hidden xl:table-cell'],
    ]
@endphp
<div>
  <x-card shadow>
    <div class="flex flex-wrap items-center justify-between mb-4">
      <h3 class="text-2xl font-bold">Allegati</h3>
      <div class="flex">
        <x-file
            class="[&_input]:rounded-r-none [&_input]:!w-full" wire:model="file" hint="Solo PDF"
            accept="application/pdf"
        />
        <x-button
            class="mt-1 btn-primary !rounded-l-none" wire:click="save" spinner="save"
            icon="o-arrow-up-tray" responsive label="Carica"
        />
      </div>
    </div>
    <div class="[&>div]:!my-1">
      <x-hr/>
    </div>
    @if($patient->getMedia('files')->isEmpty())
      <div class="text-center text-base-content/60 my-5">Nessun allegato presente</div>
    @else
      <x-table :$headers :rows="$patient->getMedia('files')" wire:model="expanded" expandable>
        @scope('cell_created_at', $file)
        {!! get_formatted_date($file->created_at) !!}
        @endscope

        @scope('actions', $file)
        <div class="flex gap-2 ">
          <x-button
              class="btn-xs btn-info" responsive icon="o-arrow-down-tray" wire:click="download({{$file->id}})"
              spinner="download"
          />
          <x-button class="btn-xs btn-error" responsive icon="o-trash" onclick="deleteFile{{$file->id}}.showModal()"/>
        </div>

        <x-modal
            id="deleteFile{{$file->id}}" title="Elimina Allegato" wire:model="deleteModal"
            class="backdrop-blur"
        >
          <p>Sei sicuro di voler eliminare l'allegato?</p>
          <x-slot:actions>
            <x-button onclick="deleteFile{{$file->id}}.close()">Annulla</x-button>
            <x-button class="btn-error" wire:click="delete({{$file->id}})" icon="o-trash" spinner="delete">
              Elimina
            </x-button>
          </x-slot:actions>
        </x-modal>
        @endscope

        @scope('expansion', $file)
        <div class="w-full flex flex-wrap gap-x-16 gap-y-2 text-xs">
          <div>
            <div class="font-bold">Caricato:</div>
            <div>{{ $file->created_at->translatedFormat('d F Y H:i') }}</div>
          </div>
          <div>
            <div class="font-bold">Estensione:</div>
            <div>{{ $file->getTypeFromExtension() }}</div>
          </div>
          <div>
            <div class="font-bold">Dimensioni:</div>
            <div>{{ $file->human_readable_size }}</div>
          </div>
        </div>
        @endscope
      </x-table>
    @endif
  </x-card>
</div>
