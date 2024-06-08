<div class="my-5">
  @foreach($questionnaire->variables as $variable)
    <div
        wire:key="variable{{ $variable->id }}"
        class="py-5 px-1 md:px-5 border-t border-base-content/10 @if($loop->last) border-b @endif"
    >
      <livewire:questionnaires.variable :$questionnaire :$variable :key="'variable'.$variable->id"/>
    </div>
  @endforeach
</div>
