<div>
  <x-forms.questionnaire-form :$questionnaire :tags="$this->tags"/>

  @can('update', $questionnaire)
    <div class="flex justify-end">
      <x-button type="submit" form="questionnaire-form" spinner="save" label="Salva"/>
    </div>
  @endcan
</div>
