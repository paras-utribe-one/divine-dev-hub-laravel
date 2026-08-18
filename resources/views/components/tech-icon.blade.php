@props([
    'image',
    'size' => 'h-4 w-4',
])

{{--
    Renders a technology's real SVG logo from public/images/technologies/
    when one exists, or a plain dot (the original pill treatment) when it
    doesn't — several category items (Go, OpenAI, Anthropic, Google Gemini,
    LangChain, Odoo, Shopify) don't have artwork yet and are empty
    placeholder files on disk, not real SVGs. Never invents an icon for
    those; falls back gracefully instead.

    alt is intentionally empty: every call site already prints the
    technology's name as visible adjacent text, so the icon is decorative
    — a real alt here would just repeat what's already announced.
--}}
@php
    $path = public_path("images/technologies/{$image}.svg");
    $exists = is_file($path) && filesize($path) > 0;
@endphp

<span {{ $attributes->merge(['class' => "flex $size shrink-0 items-center justify-center"]) }}>
    @if ($exists)
        <img
            src="{{ asset("images/technologies/{$image}.svg") }}"
            alt=""
            loading="lazy"
            class="h-full w-full object-contain transition-transform duration-200 group-hover:scale-110"
        >
    @else
        <span class="h-1.5 w-1.5 rounded-full bg-primary" aria-hidden="true"></span>
    @endif
</span>
