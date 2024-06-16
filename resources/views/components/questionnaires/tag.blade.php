@props([
    'tag'
])

@php /** @var App\Models\Tag $tag */ @endphp
<div
    {{ $attributes->class(['badge badge-sm badge-outline h-fit font-bold']) }}
    style="color: {{ $tag->color }}; background-color: {{$tag->color}}20; "

>{{ $tag->name }}</div>
