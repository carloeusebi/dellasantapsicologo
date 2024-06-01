<div
    x-data="{ show: false }"
    x-on:scroll.window="show = window.scrollY >= 800"
    class="fixed bottom-4 right-4"
>
  <button
      x-show="show"
      x-transition
      x-on:click="window.scrollTo({ top: 0, behavior: 'smooth' })"
      class="btn btn-secondary shadow-2xl z-50 btn-circle"
  >
    <x-icon name="o-arrow-up"/>
  </button>

</div>
