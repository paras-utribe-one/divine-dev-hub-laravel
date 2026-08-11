@props([
    'title',
    'description' => null,
    'ctaLabel' => 'Get in Touch',
    'ctaHref' => '#contact',
])

<div class="relative overflow-hidden rounded-3xl bg-secondary px-6 py-14 text-center sm:px-12 sm:py-16">
    <div class="pointer-events-none absolute inset-0 bg-[radial-gradient(circle_at_20%_20%,_rgba(46,49,146,0.5),_transparent_55%),radial-gradient(circle_at_80%_80%,_rgba(217,154,61,0.25),_transparent_55%)]" aria-hidden="true"></div>

    <div class="relative mx-auto max-w-2xl">
        <h2 class="text-2xl font-semibold text-white sm:text-3xl">{{ $title }}</h2>

        @if ($description)
            <p class="mt-4 text-base leading-relaxed text-white/70">{{ $description }}</p>
        @endif

        <div class="mt-8">
            <x-button :href="$ctaHref" variant="inverse">{{ $ctaLabel }}</x-button>
        </div>
    </div>
</div>
