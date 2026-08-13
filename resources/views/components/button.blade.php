@props([
    'href' => null,
    'variant' => 'primary',
    'type' => 'button',
])

@php
    $base = 'inline-flex items-center justify-center gap-2 rounded-lg px-5 py-3 text-sm font-semibold transition duration-200 ease-premium active:scale-[0.98] focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary';

    $variants = [
        'primary' => 'bg-primary text-white shadow-sm shadow-primary/10 hover:bg-primary-hover hover:shadow-lg hover:shadow-primary/30',
        'secondary' => 'bg-transparent text-text-primary border border-border hover:border-primary hover:text-primary',
        'inverse' => 'bg-white text-primary hover:bg-surface',
        'accent' => 'bg-accent text-white shadow-sm shadow-accent/10 hover:bg-accent-hover hover:shadow-lg hover:shadow-accent/30',
    ];

    $classes = $base . ' ' . ($variants[$variant] ?? $variants['primary']);
    $tag = $href ? 'a' : 'button';
@endphp

<{{ $tag }}
    {{ $attributes->merge(['class' => $classes]) }}
    @if ($href) href="{{ $href }}" @else type="{{ $type }}" @endif
>{{ $slot }}</{{ $tag }}>
