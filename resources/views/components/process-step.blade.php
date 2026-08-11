@props([
    'number',
    'title',
    'description',
])

<div class="relative rounded-2xl border border-border bg-white p-6">
    <span class="text-sm font-semibold text-primary">{{ $number }}</span>
    <h3 class="mt-3 text-base font-semibold text-text-primary">{{ $title }}</h3>
    <p class="mt-2 text-sm leading-relaxed text-text-secondary">{{ $description }}</p>
</div>
