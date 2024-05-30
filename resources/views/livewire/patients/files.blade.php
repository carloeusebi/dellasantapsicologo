@php use Spatie\MediaLibrary\MediaCollections\Models\Media; @endphp
@php
  /** @var Media $file */
    $headers = [
        ['key' => 'name', 'label' => 'Nome', 'class' => 'md:text-sm text-xs'],
        ['key' => 'created_at', 'label' => 'Caricato il', 'class' => 'hidden xl:table-cell'],
    ]
@endphp
<div>
  <x-card
      shadow x-data="{ progress: 0}"
      x-on:livewire-upload-start="progress = 0"
      x-on:livewire-upload-finish="progress = 0"
      x-on:livewire-upload-cancel="progress = 0"
      x-on:livewire-upload-progress="progress = $event.detail.progress"
  >
    <div class="flex flex-wrap items-center justify-between gap-2 mb-4">
      <h3 class="text-2xl font-bold">Allegati</h3>
      <div class="flex items-start select-none">
        <x-file
            class="[&_input]:rounded-r-none [&_input]:h-[32px] [&_input]:!w-full" wire:model.live="file"
            hint="Scatta una foto o carica un pdf"
            accept="image/*,application/pdf"
            placeholder="placeholder"
            hide-progress
        />
        <x-button
            x-bind:disabled="!$wire.file" spinner="file,save"
            class="btn-primary btn-sm !rounded-l-none" wire:click="save"
            icon="o-arrow-up-tray" responsive label="Carica"
        />
      </div>
    </div>
    <div class="[&>div]:!my-1">
      <x-progress class="progress-primary h-0.5" x-bind:value="progress" max="100"/>
    </div>
    <x-table :$headers :rows="$patient->getMedia('files')" wire:model="expanded" expandable>
      @scope('cell_name', $file)
      <div class="max-w-[30vw] md:max-w-[50vw] truncate">{{ $file->name }}</div>
      @endscope

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
          <span>
            <div class="font-bold">Nome completo:</div>
            <div>{{ $file->name }}</div>
          </span>
        <span>
            <div class="font-bold">Caricato:</div>
            <div>{{ $file->created_at->translatedFormat('d F Y H:i') }}</div>
          </span>
        <span>
            <div class="font-bold">Estensione:</div>
            <div>{{ $file->mime_type }}</div>
          </span>
        <span>
            <div class="font-bold">Dimensioni:</div>
            <div>{{ $file->human_readable_size }}</div>
          </span>
      </div>
      @endscope
    </x-table>
    @if ($patient->getMedia('files')->isEmpty())
      <div class="text-center text-base-content/50 my-5 italic">Nessun allegato presente</div>
    @endif
  </x-card>
</div>
