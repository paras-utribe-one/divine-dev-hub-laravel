@props([
    'title',
    'description' => null,
    'ctaLabel' => 'Get in Touch',
    'ctaHref' => '#contact',
    'secondaryLabel' => null,
    'secondaryHref' => null,
])

<div class="relative overflow-hidden rounded-3xl bg-secondary px-6 py-16 text-center shadow-2xl shadow-secondary/40 ring-1 ring-inset ring-white/10 sm:px-16 sm:py-20">
    <div class="pointer-events-none absolute inset-0" aria-hidden="true">
        <div class="absolute inset-0 bg-dot-grid text-white/[0.07]"></div>
        <div class="absolute -top-32 left-1/4 h-72 w-72 rounded-full bg-primary/40 blur-3xl"></div>
        <div class="absolute -bottom-24 right-1/4 h-64 w-64 rounded-full bg-accent/25 blur-3xl"></div>
        <svg class="absolute inset-0 h-full w-full opacity-[0.06]" viewBox="0 0 400 200" preserveAspectRatio="none">
            <path d="M0 160 L120 160 L150 100 L250 100 L280 40 L400 40" fill="none" stroke="white" stroke-width="1" />
            <path d="M0 60 L90 60 L120 120 L220 120 L250 170 L400 170" fill="none" stroke="white" stroke-width="1" />
        </svg>
    </div>

    <div class="relative mx-auto max-w-2xl">
        <span class="inline-flex items-center gap-1.5 rounded-full border border-white/15 bg-white/5 px-3.5 py-1.5 text-xs font-semibold uppercase tracking-wide text-white/70">
            <x-svg-icon name="zap" class="h-3.5 w-3.5 text-accent" />
            Let's build something
        </span>

        <h2 class="mt-6 text-3xl font-semibold tracking-tight text-white sm:text-4xl lg:text-5xl">{{ $title }}</h2>

        @if ($description)
            <p class="mt-4 text-base leading-relaxed text-white/65">{{ $description }}</p>
        @endif

        <div class="mt-9 flex flex-wrap items-center justify-center gap-4">
            <x-button :href="$ctaHref" variant="inverse" class="group">
                {{ $ctaLabel }}
                <x-svg-icon name="arrow-right" class="h-4 w-4 transition-transform duration-200 group-hover:translate-x-0.5" />
            </x-button>

            @if ($secondaryLabel && $secondaryHref)
                <x-button :href="$secondaryHref" variant="secondary" class="border-white/20 text-white hover:border-white/40 hover:text-white">
                    {{ $secondaryLabel }}
                </x-button>
            @endif
        </div>

        <p class="mt-6 text-xs text-white/40">Trusted by 510+ clients since 2014</p>
    </div>
</div>
