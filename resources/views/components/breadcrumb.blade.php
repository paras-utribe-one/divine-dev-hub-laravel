@props([
    // [['label' => 'Services', 'href' => '/services'], ['label' => 'Web Development']]
    // Last item has no href — it's the current page.
    'items' => [],
])

@php
    // BreadcrumbList schema generated from the exact same $items this
    // component already renders visibly — one source of truth, so the
    // structured data can never drift out of sync with what's on the page.
    $breadcrumbSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'BreadcrumbList',
        'itemListElement' => [
            [
                '@type' => 'ListItem',
                'position' => 1,
                'name' => 'Home',
                'item' => route('home'),
            ],
            ...collect($items)->values()->map(fn ($item, $i) => [
                '@type' => 'ListItem',
                'position' => $i + 2,
                'name' => $item['label'],
                'item' => $item['href'] ?? url()->current(),
            ])->all(),
        ],
    ];
@endphp
<script type="application/ld+json">{!! json_encode($breadcrumbSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}</script>

{{--
    mt-20 clears the fixed header (h-20 / 80px unscrolled — see header.blade.php)
    so the breadcrumb isn't rendered underneath it. Every non-home page starts
    with this component first, so the fix belongs here once rather than
    repeated as top padding on every page-hero.
--}}
<nav aria-label="Breadcrumb" class="mt-20 border-b border-border bg-surface">
    <ol class="page-container flex flex-wrap items-center gap-1.5 py-3 text-xs text-text-secondary">
        <li class="flex items-center gap-1.5">
            <a href="{{ route('home') }}" class="transition hover:text-primary">Home</a>
            <x-svg-icon name="arrow-right" class="h-3 w-3 rotate-0 text-muted" />
        </li>
        @foreach ($items as $i => $item)
            <li class="flex items-center gap-1.5">
                @if (! empty($item['href']) && ! $loop->last)
                    <a href="{{ $item['href'] }}" class="transition hover:text-primary">{{ $item['label'] }}</a>
                    <x-svg-icon name="arrow-right" class="h-3 w-3 text-muted" />
                @else
                    <span class="font-medium text-text-primary" aria-current="page">{{ $item['label'] }}</span>
                @endif
            </li>
        @endforeach
    </ol>
</nav>
