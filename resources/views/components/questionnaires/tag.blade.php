@props([
    'tag'
])

<div
    {{ $attributes->class(['badge badge-sm badge-outline my-1 h-fit font-bold']) }}
    style="color: {{ $tag->color }}; background-color: {{$tag->color}}20; "

>{{ $tag->tag }}</div>
