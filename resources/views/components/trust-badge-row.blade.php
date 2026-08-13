@props([
    // Real badges: [['name' => 'ISO 27001', 'image' => '/images/badges/iso-27001.svg', 'issuer' => 'ISO'], ...]
    // Placeholder badges (no `image`): [['name' => '...', 'issuer' => '...'], ...] — renders
    // as a generic icon + text tile instead of a logo, so nothing here can be
    // mistaken for a real certification mark.
    // Only ever pass real badges that are genuinely held — an invented or
    // expired certification badge is a bigger credibility risk than showing
    // none. See docs/build-log.md.
    'badges' => [],
    // Set true only for Phase-A sample data — stamps a visible "Placeholder"
    // tag on every badge so it can't be mistaken for a real certification.
    'placeholder' => false,
])

@if (count($badges))
    <div {{ $attributes->merge(['class' => 'flex flex-wrap items-center justify-center gap-4']) }}>
        @foreach ($badges as $badge)
            <div
                class="flex flex-col items-center gap-2 rounded-xl border bg-white px-5 py-3 {{ $placeholder ? 'border-dashed border-accent/50' : 'border-border' }}"
                title="{{ $badge['issuer'] ?? $badge['name'] }}"
            >
                @if (! empty($badge['image']))
                    <img src="{{ $badge['image'] }}" alt="{{ $badge['name'] }}" class="h-8 w-auto" loading="lazy">
                @else
                    <span class="flex items-center gap-2 text-sm font-medium text-text-primary">
                        <x-svg-icon name="shield" class="h-5 w-5 text-primary" />
                        {{ $badge['name'] }}
                    </span>
                @endif

                @if ($placeholder)
                    <x-placeholder-tag />
                @endif
            </div>
        @endforeach
    </div>
@endif
