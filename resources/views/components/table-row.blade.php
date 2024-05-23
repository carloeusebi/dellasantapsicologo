<tr
    {{ $attributes->merge(['class' => 'hover' .
        (isset($destination) ? ' cursor-pointer ' : '') .
        (isset($error) && $error ? ' table-error ' : '') .
        (isset($success) && $success ? ' table-success ' : '') .
        (isset($disabled) && $disabled ? ' opacity-50 ' : '')
]) }}
    @isset($destination)
      @click="Livewire.navigate('{{ $destination }}')"
    @endisset
>
  {{ $slot }}
</tr>
