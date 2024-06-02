@php /** @var App\Models\Answer $answer */ @endphp
    <!--suppress ALL -->
<div
    class="space-y-5 [&_*]text-wrap"
    x-init="() => {
      const targetComment = document.querySelector(`[data-comment='${$wire.comment_id}']`);
      if (!targetComment) return;
      targetComment.scrollIntoView({behavior: 'instant'});
      targetComment.classList.add('bg-primary/20');

      removeFromQueryString('comment_id');
    }"
>
  @forelse($this->comments as $answer)
    <x-list-item
        :item="$answer" no-hover :key="$answer->id" class="!items-start scroll-mt-20" data-comment="{{ $answer->id }}"
    >
      <x-slot:value>
        <div>
          <div class="flex justify-between items-center">
            <div class="text-wrap">
              {{ $answer->question->questionnaire->title }}
            </div>
            <x-button
                class="btn-error btn-sm" icon="o-trash" onclick="deleteCommentModal{{ $answer->id }}.showModal()"
            />
          </div>
          <div>
            <span>Domanda:</span>
            <span class="font-normal text-wrap">
            <span>{{ $answer->question->order }}. {{ $answer->question->text }}</span>
          </span>
          </div>
          <div>
            <span>Risposta:</span>
            <span class="font-normal text-wrap italic @if($answer?->skipped) opacity-50 @endif">
                {{ $answer->choice?->text ?: 'Risposta saltata' }}
            </span>
            <div>
              <a
                  class="underline cursor-pointer"
                  href="{{ route('surveys.show', [
                  $survey,
                  'tab' => 'risposte',
                  'questionnaireSurvey_id' => $answer->questionnaire_survey_id,
                  'question_id' => $answer->question_id
                ])}}"
                  wire:navigate.hover
              >Vai</a>
            </div>
          </div>
        </div>
        <div class="chat chat-end">
          <div class="chat-header">
            {{ $survey->patient->full_name }}
          </div>
          <div class="chat-bubble text-wrap">
            {{ $answer->comment }}
          </div>
          <div class="chat-footer opacity-50">
            <time class="text-xs opacity-50">
              {{ $answer->created_at->translatedFormat('d F Y H:i') }}
            </time>
          </div>
        </div>
      </x-slot:value>
    </x-list-item>
    <x-modal id="deleteCommentModal{{ $answer->id }}" title="Elimina commento" class="backdrop-blur" separator>
      <p>Sei sicuro di voler eliminare questo commento?</p>
      <x-slot:actions>
        <x-button onclick="deleteCommentModal{{ $answer->id }}.close()">Annulla</x-button>
        <x-button
            icon="o-trash" class="btn-error" spinner="removeComment" wire:click="removeComment({{ $answer->id }})"
            onclick="deleteCommentModal{{ $answer->id }}.close()"
        >
          Elimina
        </x-button>
      </x-slot:actions>
    </x-modal>
  @empty
    <div class="flex justify-center my-10 text-lg italic text-base-content/50">
      Nessun commento
    </div>
  @endforelse
</div>
