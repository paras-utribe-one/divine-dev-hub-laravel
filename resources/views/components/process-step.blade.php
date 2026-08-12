@props([
    'number',
    'title',
    'description',
    'icon' => null,
    'last' => false,
])

<div class="group relative flex items-start gap-5 lg:flex-col lg:items-center lg:gap-4 lg:text-center">
    <span class="relative z-10 flex h-12 w-12 shrink-0 items-center justify-center rounded-full border-2 border-primary bg-white text-sm font-semibold text-primary transition-all duration-300 group-hover:-translate-y-0.5 group-hover:bg-primary group-hover:text-white group-hover:shadow-lg group-hover:shadow-primary/25">
        {{ $number }}
    </span>

    <div class="w-full rounded-2xl pb-8 pt-1 transition-all duration-300 lg:border lg:border-transparent lg:px-4 lg:pb-5 lg:pt-4 lg:group-hover:border-border lg:group-hover:bg-white lg:group-hover:shadow-lg lg:group-hover:shadow-secondary/5">
        @if ($icon)
            <x-svg-icon :name="$icon" class="mb-3 hidden h-5 w-5 text-primary/50 transition-colors duration-300 group-hover:text-primary lg:mx-auto lg:block" />
        @endif
        <h3 class="text-sm font-semibold text-text-primary">{{ $title }}</h3>
        <p class="mt-1.5 text-sm leading-relaxed text-text-secondary">{{ $description }}</p>
    </div>

    @unless ($last)
        <span class="absolute left-6 top-12 h-[calc(100%-1.5rem)] w-px bg-border lg:hidden" aria-hidden="true"></span>
    @endunless
</div>
