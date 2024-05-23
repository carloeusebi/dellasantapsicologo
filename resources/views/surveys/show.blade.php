<x-layouts.app title="{{ $survey->title }}">
  <x-slot:breadcrumb>
    <li><a href="{{ route('surveys.index') }}" class="font-bold" wire:navigate.hover>Batterie</a></li>
    <li>{{ $survey->title }}</li>
  </x-slot:breadcrumb>
</x-layouts.app>
