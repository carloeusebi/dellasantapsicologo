<div {{ $attributes->class('mt-3 mb-5 text-2xl font-bold flex md:justify-end') }}>
  @isset($route)
    <a
        href="{{ route($route) }}"
        wire:navigate.hover
    >
      @endisset
      <h2
          class="hover:underline select-none cursor-pointer"
      >{{ $label }}</h2>
      @isset($route)
    </a>
  @endisset
</div>
