@php use App\Models\Tag; @endphp
<x-custom.table :rows="$questionnaires">
  <x-slot:filters>
    <x-choices
        class="select-xs md:w-[320px] w-full" icon="o-tag" :options="$tags" wire:model.live.debounce="tagsFilter"
        option-label="tag"
        option-value="tag"
    >
      @scope('item', $tag)
      <x-list-item :item="$tag" class="h-10">
        <x-slot:value>
          <div
              class="badge badge-sm badge-outline my-1 h-fit font-bold"
              style="color: {{ $tag->color }}; background-color: {{$tag->color}}20; "
          >{{ $tag->tag }}</div>
        </x-slot:value>
      </x-list-item>
      @endscope
      @scope('selection', $tag)
      <div
          class="badge badge-xs badge-outline my-1 h-fit font-bold"
          style="color: {{ $tag->color }}; background-color: {{$tag->color}}20; "
      >{{ $tag->tag }}</div>
      @endscope
    </x-choices>
    <div class="[&>*]:!w-full grow">
      <x-input
          class="!grow input-sm w-full" placeholder="Cerca" wire:model.live.debounce="search"
          icon="o-magnifying-glass"
          wire:keyup.esc="clearSearch"
          clearable
      />
    </div>
  </x-slot:filters>

  <x-slot:headers>
    <x-table-heading :$direction :$column sortable key="title">Titolo</x-table-heading>
    <x-table-heading>Tags</x-table-heading>
    <x-table-heading :$direction :$column sortable key="created_at" responsive>Creato</x-table-heading>
  </x-slot:headers>

  <x-slot:body>
    @forelse($questionnaires as $questionnaire)
      <x-table-row>
        <x-table-cell>{{ $questionnaire->title }}</x-table-cell>
        <x-table-cell>
          @foreach($questionnaire->tags as $tag)
            <div
                class="badge badge-xs badge-outline my-1 h-fit font-bold"
                style="color: {{ $tag->color }}; background-color: {{$tag->color}}20; "
            >{{ $tag->tag }}</div>
          @endforeach
        </x-table-cell>
        <x-table-cell responsive>{{$questionnaire->created_at->translatedFormat('d F Y')}}</x-table-cell>
      </x-table-row>
    @empty
      <tr>
        <td colspan="5">
          <div class="w-full text-center my-2 opacity-50">Nessun Questionario trovato</div>
        </td>
      </tr>
    @endforelse
  </x-slot:body>
</x-custom.table>
