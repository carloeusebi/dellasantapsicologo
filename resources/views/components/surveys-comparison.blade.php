<div class="flex flex-col md:flex-row md:justify-end items-end gap-4 [&>div]:!w-full">
    <x-select
        class="select-sm !w-full"
        wire:model="comparisonSurvey_id" :options="$comparisonSurveys"
        option-value="id" option-label="title" placeholder="Seleziona questionario per il confronto"
    >
        <x-slot:append>
            <x-button
                x-bind:disabled="!$wire.isComparing" icon="o-x-mark" wire:click="clearComparison"
                spinner="clearComparison" class="rounded-s-none btn-sm"
            />
        </x-slot:append>
    </x-select>
    <x-button
        class="btn-sm w-full md:w-fit" spinner="compare" label="Confronta"
        wire:click="compare" x-bind:disabled="!$wire.comparisonSurvey_id && !$wire.isComparing"
    />
</div>
