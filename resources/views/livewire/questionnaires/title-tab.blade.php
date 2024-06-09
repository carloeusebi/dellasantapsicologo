<div>
  <x-forms.questionnaire-form :$questionnaire :tags="$this->tags"/>


  @can('update', $questionnaire)
    <div class="flex justify-end">
      <x-button wire:click="save" spinner="save" label="Salva"/>
    </div>
  @endcan
</div>
