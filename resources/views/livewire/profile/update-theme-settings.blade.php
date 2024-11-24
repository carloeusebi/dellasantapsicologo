<div>
    <x-card title="Tema" shadow>
        <x-form wire:submit="updateTheme">
            <div class="lg:w-2/3 space-y-2">
                <x-file
                    wire:model="logo"
                    label="Logo"
                    accept="image/*"
                    hint="Clicca per cambiare"
                    change-text="Clicca per caricare una nuova immagine"
                    crop-after-change
                    crop-cancel-text="Annulla"
                    crop-save-text="Conferma"
                    crop-title-text="Ritaglia il tuo logo"
                >
                    <div class="h-24">
                        <livewire:app-logo/>
                    </div>
                </x-file>
                @if(auth()->user()->hasLogo())
                    <x-button
                        class="btn-error btn-sm"
                        icon="o-trash"
                        x-on:click="$wire.deleteModal = true"
                        spinner="deleteLogo"
                        label="Elimina Logo"
                    />
                @endif
            </div>
            <x-slot:actions>
                <div
                    x-data="{ uploading: false }"
                    x-on:livwire-upload-start="uploading = true"
                    x-on:livewire-upload-finish="uploading = false"
                    x-on:livewire-upload-cancel="uploading = false"
                    x-on:livewire-upload-error="uploading = false"
                >
                    <x-button
                        class="w-full md:btn-wide"
                        type="submit"
                        spinner="updateTheme,logo"
                        label="Salva"
                        x-bind:spinner="uploading"
                        x-bind:disabled="uploading"
                    />
                </div>
            </x-slot:actions>
        </x-form>
    </x-card>

    <x-modal wire:model="deleteModal" class="backdrop-blur" title="Elimina Logo">
        <p>Sei sicuro di voler eliminare il logo?</p>
        <x-slot:actions>
            <x-button x-on:click="$wire.deleteModal = false">Annulla</x-button>
            <x-button
                class="btn-error"
                wire:click="deleteUserLogo"
                icon="o-trash"
                spinner="deleteUserLogo"
            >
                Elimina
            </x-button>
        </x-slot:actions>
    </x-modal>

    @push('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.js"></script>
    @endpush

    @push('styles')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.css"/>
    @endpush

</div>
