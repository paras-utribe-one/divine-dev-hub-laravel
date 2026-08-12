@props([
    'eyebrow' => null,
    'title',
    'description' => null,
    'align' => 'left',
])

<div {{ $attributes->merge(['class' => 'max-w-2xl ' . ($align === 'center' ? 'mx-auto text-center' : '')]) }}>
    @if ($eyebrow)
        <p class="text-sm font-semibold uppercase tracking-wide text-primary">{{ $eyebrow }}</p>
    @endif

    <h2 class="mt-3 text-3xl font-semibold tracking-tight text-text-primary sm:text-4xl">{{ $title }}</h2>

    @if ($description)
        <p class="mt-4 text-base leading-relaxed text-text-secondary sm:text-lg">{{ $description }}</p>
    @endif
</div>
