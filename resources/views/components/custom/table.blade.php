@php
  use Illuminate\Pagination\LengthAwarePaginator
   /** @var LengthAwarePaginator $rows */
@endphp

<div>

  <div class="md:flex items-end gap-2 space-y-2 md:space-y-0">
    {{ $filters }}
    @unless(isset($withoutReset))
      <x-button class="w-full md:w-fit btn-primary h-[56px]" wire:click="$dispatch('resetFilters')">
        Resetta filtri
      </x-button>
    @endunless
  </div>

  <div class="flex flex-wrap gap-4 justify-between items-center">
    <div class="grow min-w-5 min-h-12 flex items-center">
      <x-loading class="text-primary w-5 h-5 sm:h-7 sm:w-7" wire:loading/>
    </div>
    <div class="flex flex-wrap gap-1 my-3">
      @isset($legend)
        {{ $legend }}
      @endisset
    </div>
  </div>
  <div class="[&_div]:!mb-1">
    {{ $rows->links() }}
    <x-hr/>
  </div>
  {{ $slot }}
  @if ($rows->hasMorePages())
    <div class="[&_div]:!my-1">
      <x-hr/>
    </div>
  @endif
  <div class="my-2">
    {{ $rows->links() }}
  </div>
</div>
