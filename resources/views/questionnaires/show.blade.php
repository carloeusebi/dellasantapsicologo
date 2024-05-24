<x-layouts.app title="{{ $questionnaire->title }}">
  <x-slot:breadcrumb>
    <li><a href="{{ route('questionnaires.index') }}" class="font-bold" wire:navigate.hover>Questionari</a></li>
    <li>{{ $questionnaire->title }}</li>
  </x-slot:breadcrumb>
</x-layouts.app>
