@props([
    'value',
    'label',
])

<div class="text-center">
    <p class="text-3xl font-semibold text-white sm:text-4xl">{{ $value }}</p>
    <p class="mt-1 text-sm text-white/60">{{ $label }}</p>
</div>
