<div>
  <x-slot:title>{{ $survey->title }} di {{ $survey->patient->full_name }}</x-slot:title>
  <x-slot:breadcrumb>
    <li><a href="{{ route('surveys.index') }}" class="font-bold" wire:navigate.hover>Batterie</a></li>
    <li>{{ $survey->title }}</li>
  </x-slot:breadcrumb>
</div>
