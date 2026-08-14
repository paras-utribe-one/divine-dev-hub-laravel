@props([
    'image',
    'category' => 'Insights',
    'date',
    'title',
    'excerpt' => null,
    'href',
    'featured' => false,
    // Set true only for Phase-A sample data — stamps a visible "Placeholder"
    // tag on the card. See docs/build-log.md.
    'placeholder' => false,
])

{{--
    No target="_blank" here on purpose: posts under /blog/<slug> are internal
    pages and should open in the same tab. Pass target="_blank" rel="noopener
    noreferrer" via attributes at the call site for genuinely external links
    (e.g. while posts still live on the old WordPress site).
--}}
<a
    href="{{ $href }}"
    {{ $attributes->merge(['class' => 'group flex h-full flex-col overflow-hidden rounded-2xl border border-border bg-white shadow-sm transition duration-300 ease-premium hover:-translate-y-1 hover:border-primary/25 hover:shadow-elevate-light']) }}
>
    <div class="relative aspect-16/10 overflow-hidden">
        <img
            src="{{ $image }}"
            alt="{{ $title }}"
            loading="lazy"
            decoding="async"
            width="800"
            height="500"
            class="absolute inset-0 h-full w-full object-cover transition duration-700 ease-out group-hover:scale-[1.03]"
        >
        <div class="absolute left-4 top-4 flex items-center gap-2">
            @if ($featured)
                <span class="rounded-full bg-accent px-3 py-1 text-xs font-semibold uppercase tracking-wide text-secondary">
                    Featured
                </span>
            @endif
            <span class="rounded-full bg-white/90 px-3 py-1 text-xs font-semibold uppercase tracking-wide text-primary backdrop-blur-sm">
                {{ $category }}
            </span>
        </div>

        @if ($placeholder)
            <x-placeholder-tag class="absolute right-4 top-4" />
        @endif
    </div>

    <div class="flex flex-1 flex-col justify-center p-6 sm:p-7">
        <p class="text-xs font-semibold uppercase tracking-wide text-text-secondary">{{ $date }}</p>
        <h3 class="mt-2 text-lg font-semibold text-text-primary group-hover:text-primary sm:text-xl">{{ $title }}</h3>

        @if ($excerpt)
            <p class="mt-3 text-sm leading-relaxed text-text-secondary">{{ $excerpt }}</p>
        @endif

        <span class="mt-5 inline-flex items-center gap-1.5 text-sm font-semibold text-primary">
            Read article
            <x-svg-icon name="arrow-right" class="h-4 w-4 transition-transform duration-200 group-hover:translate-x-1" />
        </span>
    </div>
</a>
