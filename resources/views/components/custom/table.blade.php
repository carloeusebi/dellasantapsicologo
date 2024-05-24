<div class="card shadow-2xl">
  <div class="card-body px-2">

    <div class="md:flex gap-2 space-y-2 md:space-y-0">
      {{ $filters }}
    </div>

    @isset($legend)
      <div class="flex justify-end">{{ $legend }}</div>
    @endisset
    <div class="overflow-x-auto">
      <div class="my-2">
        {{ $rows->links() }}
      </div>
      <div class="divider !my-2"></div>
      <div class="h-5 ">
        <span class="loading loading-spinner loading-sm opacity-50" wire:loading></span>
      </div>
      <table class="table @isset($striped) table-zebra @endisset">
        <thead>
        <tr>{{ $headers }}</tr>
        </thead>
        <tbody>{{ $body }}</tbody>
        <tfoot>@isset($footer)
          {{ $footer }}
        @endisset</tfoot>
      </table>
      <div class="my-2">
        {{ $rows->links() }}
      </div>
    </div>
  </div>
</div>
