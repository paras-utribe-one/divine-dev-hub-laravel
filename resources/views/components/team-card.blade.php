@props([
    'name',
    'role',
    'initials',
    // Set true only for Phase-A sample data — stamps a visible "Placeholder"
    // tag on the card so a generic initials tile is never mistaken for a
    // real employee. See docs/build-log.md.
    'placeholder' => false,
])

{{--
    Static/non-interactive (no href) — resting shadow only, no hover
    transform. A lift on hover would imply clickability this card doesn't
    have, so it gets the plain restrained shadow-sm rather than the
    hover-tier shadow-elevate-light used by clickable cards.
--}}
<div {{ $attributes->merge(['class' => 'flex flex-col items-center rounded-2xl border border-border bg-white p-6 text-center shadow-sm']) }}>
    {{-- Deliberately initials-on-a-tile, never a photo — see docs/build-log.md
         on why Phase-A team entries must not read as real people. --}}
    <span class="flex h-16 w-16 items-center justify-center rounded-full bg-primary-50 text-lg font-semibold text-primary">
        {{ $initials }}
    </span>
    <h3 class="mt-4 text-sm font-semibold text-text-primary">{{ $name }}</h3>
    <p class="mt-1 text-xs text-text-secondary">{{ $role }}</p>

    @if ($placeholder)
        <x-placeholder-tag class="mt-3" />
    @endif
</div>
