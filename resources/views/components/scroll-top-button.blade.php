<div
    x-data="{ show: false }"
    x-on:scroll.window="show = window.scrollY >= 800"
    class="fixed bottom-8 right-8"
>
  <button
      x-show="show"
      x-transition
      x-on:click="window.scrollTo({ top: 0, behavior: 'smooth' })"
      class="btn btn-secondary btn-sm shadow-2xl z-50 btn-circle"
  >
    <x-icon name="o-arrow-up"/>
  </button>

</div>
