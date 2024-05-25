@php
  if (! isset($scrollTo)) {
      $scrollTo = 'body';
  }

  $scrollIntoViewJsSnippet = ($scrollTo !== false)
      ? <<<JS
         (\$el.closest('$scrollTo') || document.querySelector('$scrollTo')).scrollIntoView()
      JS
      : '';
@endphp

<div>
  @if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-between">
      <div class="flex justify-between flex-1 sm:hidden join">
        @if ($paginator->onFirstPage())
          <button class="join-item btn btn-sm flex items-center" disabled>
            <x-heroicon-o-chevron-left class="w-4 h-4"/>
            <span>Precedente</span>
          </button>
        @else
          <button
              class="join-item btn btn-sm flex items-center"
              wire:click="previousPage('{{ $paginator->getPageName() }}')"
              x-on:click="{{ $scrollIntoViewJsSnippet }}" wire:loading.attr="disabled"
          >
            <x-heroicon-o-chevron-left class="w-4 h-4"/>
            <span>Precedente</span>
          </button>
        @endif
        <button class="join-item btn grow btn-sm !border-x-8 border-base-300 no-animation">
          Pagina {{ $paginator->currentPage() }} di {{ $paginator->lastPage() }}
        </button>
        @if($paginator->hasMorePages())
          <button
              class="join-item btn btn-sm flex items-center"
              wire:click="nextPage('{{ $paginator->getPageName() }}')"
              x-on:click="{{ $scrollIntoViewJsSnippet }}" wire:loading.attr="disabled"
          >
            <span>Successiva</span>
            <x-heroicon-o-chevron-right class="w-4 h-4"/>
          </button>
        @else
          <button class="join-item btn btn-sm flex items-center" disabled>
            <span>Successiva</span>
            <x-heroicon-o-chevron-right class="w-4 h-4"/>
          </button>
        @endif
      </div>

      <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
        <div>
          <p class="text-sm text-gray-700 leading-5">
            <span>Mostrando da</span>
            <span class="font-medium">{{ $paginator->firstItem() }}</span>
            <span>a</span>
            <span class="font-medium">{{ $paginator->lastItem() }}</span>
            <span>di</span>
            <span class="font-medium">{{ $paginator->total() }}</span>
            <span>risultati</span>
          </p>
        </div>

        <div class="join">
          @if ($paginator->onFirstPage())
            <button disabled class="join-item btn btn-sm">
              <x-heroicon-o-chevron-left class="w-3 h-3"/>
            </button>
          @else
            <button
                class="join-item btn btn-sm" wire:click="previousPage('{{ $paginator->getPageName() }}')"
                x-on:click="{{ $scrollIntoViewJsSnippet }}"
            >
              <x-heroicon-o-chevron-left class="w-3 h-3"/>
            </button>
          @endif

          @foreach($elements as $element)
            @if (is_string($element))
              <button class="join-item btn btn-sm" disabled>{{ $element }}</button>
            @endif

            @if(is_array($element))
              @foreach($element as $page => $url)
                <span wire:key="paginator-{{ $paginator->getPageName() }}-page{{ $page }}">
                @if ($page == $paginator->currentPage())
                    <button class="join-item btn btn-sm btn-active">{{ $page }}</button>
                  @else
                    <button
                        class="join-item btn btn-sm"
                        wire:click="gotoPage({{ $page }}, '{{ $paginator->getPageName() }}')"
                    >
                    {{ $page }}
                  </button>
                  @endif
                </span>
              @endforeach
            @else
            @endif
          @endforeach

          <span>
              @if ($paginator->hasMorePages())
              <button
                  class="join-item btn btn-sm"
                  wire:click="nextPage('{{ $paginator->getPageName() }}')"
                  x-on:click="{{ $scrollIntoViewJsSnippet }}"
              >
                 <x-heroicon-o-chevron-right class="w-3 h-3"/>
              </button>
            @else
              <button
                  class="join-item btn btn-sm"
                  disabled
              >
                 <x-heroicon-o-chevron-right class="w-3 h-3"/>
              </button>
            @endif
            </span>

        </div>
      </div>
    </nav>
  @endif
</div>
