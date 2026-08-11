@props([
    'title',
    'category',
    'image',
    'featured' => false,
])

<article
    {{ $attributes->merge(['class' => 'group relative block overflow-hidden rounded-2xl bg-secondary ' . ($featured ? 'aspect-[4/3] sm:aspect-[16/9]' : 'aspect-[4/3]')]) }}
>
    <img
        src="{{ $image }}"
        alt="{{ $title }} — {{ $category }} project preview"
        width="1200"
        height="800"
        loading="lazy"
        class="absolute inset-0 h-full w-full object-cover transition duration-700 ease-out group-hover:scale-[1.06]"
    >
    <div class="absolute inset-0 bg-linear-to-t from-secondary via-secondary/10 to-transparent opacity-90 transition-opacity duration-300 group-hover:opacity-95" aria-hidden="true"></div>
    <div class="absolute inset-0 ring-1 ring-inset ring-white/10" aria-hidden="true"></div>

    <div class="relative flex h-full flex-col justify-end p-5 {{ $featured ? 'sm:p-8' : '' }}">
        <p class="text-xs font-semibold uppercase tracking-wide text-white/60">{{ $category }}</p>
        <div class="mt-1.5 flex items-center gap-1.5">
            <h3 class="font-semibold text-white {{ $featured ? 'text-xl sm:text-2xl' : 'text-lg' }}">{{ $title }}</h3>
            <x-svg-icon name="arrow-up-right" class="h-4 w-4 -translate-x-1 text-white opacity-0 transition-all duration-300 group-hover:translate-x-0 group-hover:opacity-100" />
        </div>
    </div>
</article>
