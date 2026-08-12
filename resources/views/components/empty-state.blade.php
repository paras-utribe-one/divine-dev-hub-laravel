@props([
    'icon' => 'search',
    'title',
    'description' => null,
])

<div {{ $attributes->merge(['class' => 'mx-auto flex max-w-md flex-col items-center rounded-3xl border border-dashed border-border bg-surface px-8 py-16 text-center']) }}>
    <span class="flex h-14 w-14 items-center justify-center rounded-2xl bg-primary-50 text-primary">
        <x-svg-icon :name="$icon" class="h-7 w-7" />
    </span>
    <h2 class="mt-6 text-xl font-semibold text-text-primary">{{ $title }}</h2>
    @if ($description)
        <p class="mt-2 text-sm leading-relaxed text-text-secondary">{{ $description }}</p>
    @endif
    {{ $slot ?? '' }}
</div>
