<td {{ $attributes->merge(['class' => isset($responsive) ? ' hidden md:table-cell ' : '']) }}>
  {{ $slot }}
</td>
