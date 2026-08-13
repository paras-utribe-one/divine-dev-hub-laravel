@props([
    'title',
    'location',
    'type',
    'href',
    // Set true only for Phase-A sample data — stamps a visible "Placeholder"
    // tag on the card. See docs/build-log.md.
    'placeholder' => false,
])

<a
    href="{{ $href }}"
    {{ $attributes->merge(['class' => 'group flex items-center justify-between gap-4 rounded-2xl border border-border bg-white p-6 shadow-sm transition-all duration-300 ease-premium hover:-translate-y-1 hover:border-primary/20 hover:shadow-elevate-light']) }}
>
    <div>
        <div class="flex items-center gap-3">
            <h3 class="text-base font-semibold text-text-primary">{{ $title }}</h3>
            @if ($placeholder)
                <x-placeholder-tag />
            @endif
        </div>
        <p class="mt-1 flex items-center gap-3 text-sm text-text-secondary">
            <span class="inline-flex items-center gap-1.5"><x-svg-icon name="map-pin" class="h-3.5 w-3.5 text-primary" /> {{ $location }}</span>
            <span class="inline-flex items-center gap-1.5"><x-svg-icon name="compass" class="h-3.5 w-3.5 text-primary" /> {{ $type }}</span>
        </p>
    </div>
    <x-svg-icon name="arrow-right" class="h-5 w-5 shrink-0 text-primary transition-transform duration-200 group-hover:translate-x-1" />
</a>
