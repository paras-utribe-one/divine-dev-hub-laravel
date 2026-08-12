@props([
    // [['name' => 'ISO 27001', 'image' => '/images/badges/iso-27001.svg', 'issuer' => 'ISO'], ...]
    // Only ever pass badges that are genuinely held — an invented or expired
    // certification badge is a bigger credibility risk than showing none.
    // See docs/build-log.md.
    'badges' => [],
])

@if (count($badges))
    <div {{ $attributes->merge(['class' => 'flex flex-wrap items-center justify-center gap-4']) }}>
        @foreach ($badges as $badge)
            <div class="flex h-16 items-center justify-center rounded-xl border border-border bg-white px-5 py-3" title="{{ $badge['issuer'] ?? $badge['name'] }}">
                <img src="{{ $badge['image'] }}" alt="{{ $badge['name'] }}" class="h-8 w-auto" loading="lazy">
            </div>
        @endforeach
    </div>
@endif
