<form id="contact-form" wire:submit="sendEmail" x-data="{accepted: false}">
  <div class="d-flex-lg flex-gap20">
    <div class="col-50 p-20-lg d-flex flex-column justify-space-between mb-20">

      <input
          class="contact-info @error('name') invalid @enderror"
          type="text"
          placeholder="Nome"
          name="name"
          autocomplete="name"
          wire:model.blur="name"
          tabindex="1"
      >
      @error('name')
      <div class="error-message">{{ $message }}</div>
      @enderror

      <input
          class="contact-info @error('phone') invalid @enderror"
          type="tel"
          name="phone"
          placeholder="Numero di Telefono"
          autocomplete="tel"
          tabindex="1"
          x-mask="999 99999999"
          wire:model.blur="phone"
      >
      @error('phone')
      <div class="error-message">{{ $message }}</div>
      @enderror

      <input
          class="contact-info @error('email') invalid @enderror"
          type="email"
          placeholder="Email"
          name="email"
          tabindex="1"
          wire:model.blur="email"
      >
      @error('email')
      <div class="error-message">{{ $message }}</div>
      @enderror

    </div>

    @error('honey')
    {{ $message }}
    @enderror

    <div class="col-50 p-20-lg mb-20">
          <textarea
              class="contact-info @error('message') invalid @enderror"
              name="message"
              rows="15"
              placeholder="Come posso aiutarti?"
              tabindex="1"
              wire:model.blur="message"
          ></textarea>
      @error('message')
      <div class="error-message">{{ $message }}</div>
      @enderror
    </div>
  </div>
  <div class="d-flex-lg flex-gap20">
    <div class="col-50 p-20-lg">
      <div>
        <a
            href="https://www.iubenda.com/privacy-policy/29156312" class="iubenda-link mb-10"
            target="_blank"
        >
          Normativa sull'utilizzo dei dati personali
        </a>
        @error('accept')
        {{ $message }}
        @enderror
      </div>
      <input
          x-model="accepted"
          class="c-pointer"
          type="checkbox"
          name="norm-cb"
          id="norm-cb"
          tabindex="1"
          wire:model="accepted"
          required
      >
      <label for="norm-cb" class="c-pointer">
        Ho letto e accetto la normativa sui dati personali<sup>*</sup>
      </label>
    </div>
    <div class="col-50 p-20-lg">
      <input type="checkbox" id="miele-cb" name="miele-cb" wire:model="honey">
      <button
          class="btn mt-20" name="submit" id="formButton"
          :class="{unclickable: !accepted}"
          tabindex="1"
      >
        <i
            class="fa-solid fa-circle-notch fa-spin fa-xl"
            wire:loading
            wire:target="sendEmail"
        ></i>
        Invia il messaggio
      </button>
    </div>
  </div>

  @teleport('#email-alerts')
  <!--suppress JSUnresolvedReference -->
  <div
      x-data="{open: false, status: '', message: ''}"
      @message.window="
          open = true;
          message = $event.detail.message;
          status = $event.detail.status;
          console.error($event.detail?.details);
        "
  >
    <div
        x-show="open"
        class="response mt-20"
        :class="`${status}`"
    >
      <span x-html="message"></span>
      <i class="fa-solid fa-xmark fa-xl" @click="open = false"></i>
    </div>
  </div>
  @endteleport
</form>
