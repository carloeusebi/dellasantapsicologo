@php
  use Illuminate\Pagination\LengthAwarePaginator
   /** @var LengthAwarePaginator $rows */
@endphp

<div class="card shadow-2xl">
  <div class="card-body px-2">

    <div class="md:flex items-end gap-4 space-y-2 md:space-y-0">
      {{ $filters }}
      <x-button class="w-full md:w-fit btn-sm btn-primary" wire:click="$dispatch('resetFilters')">Resetta filtri
      </x-button>
    </div>

    <div class="flex flex-wrap gap-4 justify-between items-center">
      <div class="grow min-w-5 h-5">
        <x-loading class="text-primary w-5 h-5 sm:h-7 sm:w-7" wire:loading/>
      </div>
      <div class="flex flex-wrap">
        @isset($legend)
          {{ $legend }}
        @endisset
      </div>
    </div>
    <div class="overflow-x-hidden">
      <div class="my-2">
        {{ $rows->links() }}
      </div>
      <x-hr/>
      <table class="table @isset($striped) table-zebra @endisset">
        <thead>
        <tr>{{ $headers }}</tr>
        </thead>
        <tbody>{{ $body }}</tbody>
        @isset($footer)
          <tfoot>{{ $footer }}</tfoot>
        @endisset
      </table>
      @if($rows->hasPages())
        <x-hr/>
      @endif
      <div class="my-2">
        {{ $rows->links() }}
      </div>
    </div>
  </div>
</div>
