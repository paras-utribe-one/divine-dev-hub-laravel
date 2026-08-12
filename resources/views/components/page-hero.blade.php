@props([
    'eyebrow' => null,
    'title',
    'description' => null,
])

<section class="relative overflow-hidden bg-surface py-16 sm:py-20" aria-labelledby="page-hero-heading">
    <div class="pointer-events-none absolute inset-0 -z-10 bg-dot-grid text-primary/10" aria-hidden="true"></div>

    <div data-reveal class="page-container max-w-3xl">
        @if ($eyebrow)
            <p class="inline-flex items-center gap-2 text-sm font-semibold uppercase tracking-wide text-primary">
                <span class="h-1.5 w-1.5 rounded-full bg-primary"></span>
                {{ $eyebrow }}
            </p>
        @endif

        <h1 id="page-hero-heading" class="mt-4 text-4xl font-semibold tracking-tight text-text-primary sm:text-5xl">
            {{ $title }}
        </h1>

        @if ($description)
            <p class="mt-5 max-w-2xl text-lg leading-relaxed text-text-secondary">{{ $description }}</p>
        @endif

        {{ $slot ?? '' }}
    </div>
</section>
