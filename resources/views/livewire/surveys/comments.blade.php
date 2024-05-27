<div class="space-y-5 [&_*]text-wrap">
  @forelse($this->comments as $answer)
    <x-list-item :item="$answer" no-hover :key="$answer->id" class="!items-start">
      <x-slot:value>
        <div class="text-wrap">
          {{ $answer->question->questionnaire->title }}
        </div>
        <div>
          <span>Domanda:</span>
          <span class="font-normal text-wrap">
            <span>{{ $answer->question->text }}</span>
          </span>
        </div>
        <div>
          <span>Risposta:</span>
          <span class="font-normal text-wrap italic">
            @if ($answer->choice)
              {{ $answer->choice->text}}
            @else
              {{ $answer->question->getCustomAnswerText($answer->value) ?: 'Risposta saltata' }}
            @endif
          </span>
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
      <x-slot:actions>
        <div class="flex items-start">
          <x-button
              class="btn-error btn-sm" icon="o-trash" onclick="deleteCommentModal{{ $answer->id }}.showModal()"
          />
          <x-modal id="deleteCommentModal{{ $answer->id }}" title="Elimina commento" class="backdrop-blur" separator>
            <p>Sei sicuro di voler eliminare questo commento?</p>
            <x-slot:actions>
              <x-button onclick="deleteCommentModal{{ $answer->id }}.close()">Annulla</x-button>
              <x-button
                  icon="o-trash" class="btn-error" spinner="deleteComment" wire:click="removeComment({{ $answer->id }})"
                  onclick="deleteCommentModal{{ $answer->id }}.close()"
              >
                Elimina
              </x-button>
            </x-slot:actions>
          </x-modal>
        </div>
      </x-slot:actions>
    </x-list-item>
  @empty
    <div class="flex justify-center my-10 text-lg italic text-base-content/50">
      Nessun commento
    </div>
  @endforelse
</div>
