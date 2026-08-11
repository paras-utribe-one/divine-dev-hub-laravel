@props([
    'number',
    'title',
    'description',
    'last' => false,
])

<div class="relative flex items-start gap-5 lg:flex-col lg:items-center lg:gap-4 lg:text-center">
    <span class="relative z-10 flex h-12 w-12 shrink-0 items-center justify-center rounded-full border-2 border-primary bg-white text-sm font-semibold text-primary">
        {{ $number }}
    </span>

    <div class="pb-8 lg:px-1 lg:pb-0">
        <h3 class="text-sm font-semibold text-text-primary">{{ $title }}</h3>
        <p class="mt-1.5 text-sm leading-relaxed text-text-secondary">{{ $description }}</p>
    </div>

    @unless ($last)
        <span class="absolute left-6 top-12 h-[calc(100%-1.5rem)] w-px bg-border lg:hidden" aria-hidden="true"></span>
    @endunless
</div>
