@props([
    'value',
    'label',
    'icon' => null,
])

<div {{ $attributes->merge(['class' => 'flex items-center gap-4 px-2']) }}>
    @if ($icon)
        <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl border border-white/10 bg-white/5 text-accent">
            <x-svg-icon :name="$icon" class="h-5 w-5" />
        </span>
    @endif
    <div>
        <p class="text-3xl font-semibold tracking-tight text-white sm:text-4xl">{{ $value }}</p>
        <p class="mt-0.5 text-sm text-white/55">{{ $label }}</p>
    </div>
</div>
