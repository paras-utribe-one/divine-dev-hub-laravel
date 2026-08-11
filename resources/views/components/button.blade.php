@props([
    'href' => null,
    'variant' => 'primary',
    'type' => 'button',
])

@php
    $base = 'inline-flex items-center justify-center gap-2 rounded-lg px-5 py-3 text-sm font-semibold transition duration-200 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary';

    $variants = [
        'primary' => 'bg-primary text-white hover:bg-primary-hover',
        'secondary' => 'bg-transparent text-text-primary border border-border hover:border-primary hover:text-primary',
        'inverse' => 'bg-white text-primary hover:bg-surface',
        'accent' => 'bg-accent text-white hover:bg-accent-hover',
    ];

    $classes = $base . ' ' . ($variants[$variant] ?? $variants['primary']);
    $tag = $href ? 'a' : 'button';
@endphp

<{{ $tag }}
    {{ $attributes->merge(['class' => $classes]) }}
    @if ($href) href="{{ $href }}" @else type="{{ $type }}" @endif
>{{ $slot }}</{{ $tag }}>
