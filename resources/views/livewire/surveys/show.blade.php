<div>
  <x-slot:title>{{ $survey->title }} di {{ $survey->patient->full_name }}</x-slot:title>
  <x-slot:breadcrumb>
    <li><a href="{{ route('surveys.index') }}" class="font-bold" wire:navigate.hover>Valutazioni</a></li>
    <li>{{ $survey->title }}</li>
  </x-slot:breadcrumb>

  <x-header size="text-xl" separator class="!mb-0">
    <x-slot:title>
      <span>{{ $survey->title }} di </span>
      <a href="{{ route('patients.show', $survey->patient) }}" class="underline" wire:navigate.hover>
        {{ $survey->patient->full_name }}
      </a>
    </x-slot:title>
  </x-header>

  <div>
    <div class="tabs tabs-bordered mb-5 overflow-x-auto">
      <div
          class="tab space-x-2" :class="{ 'tab-active': $wire.tab === 'dettagli' }" wire:click="tab = 'dettagli'"
      >
        <x-icon name="o-document-magnifying-glass"/>
        <span class="hidden md:inline">Dettagli</span>
      </div>

      <div
          class="tab space-x-2" :class="{ 'tab-active': $wire.tab === 'risposte' }" wire:click="tab = 'risposte'"
      >
        <x-icon name="o-list-bullet"/>
        <span class="hidden md:inline">Risposte</span>
      </div>

      <div
          class="tab space-x-2" :class="{ 'tab-active': $wire.tab === 'risultati' }"
          wire:click="tab = 'risultati'"
      >
        <x-icon name="o-presentation-chart-line"/>
        <span class="hidden md:inline">Risultati</span>
      </div>

      @if($survey->comments_count > 0)
        <div
            class="tab space-x-2" :class="{ 'tab-active': $wire.tab === 'commenti' }"
            wire:click="tab = 'commenti'"
        >
          <x-icon name="o-chat-bubble-bottom-center-text"/>
          <span class="hidden md:inline">Commenti</span>
          <div class="badge badge-primary">{{ $survey->comments_count }}</div>
        </div>
      @endif


      @if($survey->skipped_questions_count > 0)
        <div
            class="tab space-x-2" :class="{ 'tab-active': $wire.tab === 'saltate' }" wire:click="tab = 'saltate'"
        >
          <x-icon name="o-question-mark-circle"/>
          <span class="hidden md:inline">Risposte saltate</span>
          <div class="badge badge-primary">{{ $survey->skipped_questions_count }}</div>
        </div>
      @endif
    </div>

    <div class="px-2">
      <div x-show="$wire.tab === 'dettagli'">
        <div>
          Dettagli
        </div>
      </div>

      <div x-show="$wire.tab === 'risposte'">
        <livewire:surveys.answers :$survey lazy/>
      </div>

      <div x-show="$wire.tab === 'risultati'">
        <livewire:surveys.results :$survey lazy :key="rand(0,9999)"/>
      </div>

      <div x-show="$wire.tab === 'commenti'">
        <livewire:surveys.comments :$survey lazy/>
      </div>

      <div x-show="$wire.tab === 'saltate'">
        <x-surveys.skipped-questions :$survey lazy/>
      </div>

    </div>
  </div>
</div>


@push('scripts')
  @vite('resources/js/quick-answer-handler.js')
@endpush
