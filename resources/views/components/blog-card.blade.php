@props([
    'image',
    'category' => 'Insights',
    'date',
    'title',
    'excerpt' => null,
    'href',
    'featured' => false,
])

<a
    href="{{ $href }}"
    target="_blank"
    rel="noopener noreferrer"
    {{ $attributes->merge(['class' => 'group flex overflow-hidden rounded-2xl border border-border bg-white transition duration-300 hover:-translate-y-1 hover:border-primary/25 hover:shadow-xl ' . ($featured ? 'flex-col lg:flex-row' : 'flex-col')]) }}
>
    <div class="relative overflow-hidden {{ $featured ? 'aspect-[16/10] lg:aspect-auto lg:w-1/2' : 'aspect-[16/10]' }}">
        <img
            src="{{ $image }}"
            alt="{{ $title }}"
            loading="lazy"
            width="800"
            height="500"
            class="absolute inset-0 h-full w-full object-cover transition duration-700 ease-out group-hover:scale-[1.06]"
        >
        <div class="absolute left-4 top-4 flex items-center gap-2">
            @if ($featured)
                <span class="rounded-full bg-accent px-3 py-1 text-xs font-semibold uppercase tracking-wide text-white">
                    Featured
                </span>
            @endif
            <span class="rounded-full bg-white/90 px-3 py-1 text-xs font-semibold uppercase tracking-wide text-primary backdrop-blur-sm">
                {{ $category }}
            </span>
        </div>
    </div>

    <div class="flex flex-1 flex-col justify-center p-6 {{ $featured ? 'lg:p-8' : '' }}">
        <p class="text-xs font-semibold uppercase tracking-wide text-text-secondary">{{ $date }}</p>
        <h3 class="mt-2 font-semibold text-text-primary group-hover:text-primary {{ $featured ? 'text-xl sm:text-2xl' : 'text-lg' }}">{{ $title }}</h3>

        @if ($excerpt)
            <p class="mt-3 text-sm leading-relaxed text-text-secondary">{{ $excerpt }}</p>
        @endif

        <span class="mt-5 inline-flex items-center gap-1.5 text-sm font-semibold text-primary">
            Read article
            <x-svg-icon name="arrow-right" class="h-4 w-4 transition-transform duration-200 group-hover:translate-x-1" />
        </span>
    </div>
</a>
