<th
    {{ $attributes->merge([
          'class' => 'select-none ' .
            (isset($responsive) ? ' hidden md:table-cell ' : '')
      ])->only('class') }}
>
  @isset($sortable)
    <button
        {{ $attributes->except('class') }} class="w-full text-start flex items-center" wire:click="sort('{{  $key }}')"
    >
      <span>{{ $slot }}</span>
      @if($column === $key && $direction === 'asc')
        <x-heroicon-c-chevron-up class="h-5 w-5"/>
      @elseif ($column === $key && $direction === 'desc')
        <x-heroicon-c-chevron-down class="h-5 w-5"/>
      @endif
    </button>
  @else
    <span>{{ $slot }}</span>
  @endisset
</th>
