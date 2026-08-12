@props([
    'name',
    'class' => 'h-5 w-5',
])

@php
    $icons = [
        'home' => '<path d="M3.5 10.5L12 3.5l8.5 7" /><path d="M5.5 9v10.5h13V9" /><path d="M9.5 19.5V14h5v5.5" />',
        'code' => '<path d="M9 18L3 12L9 6" /><path d="M15 6L21 12L15 18" />',
        'smartphone' => '<rect x="6" y="2.5" width="12" height="19" rx="2.5" /><path d="M11 18h2" />',
        'layers' => '<path d="M12 2.5 3 7.5 12 12.5 21 7.5 12 2.5Z" /><path d="M3 12.5l9 5 9-5" /><path d="M3 17.5l9 5 9-5" />',
        'users' => '<path d="M17 20v-1.5a3.5 3.5 0 0 0-3.5-3.5h-5A3.5 3.5 0 0 0 5 18.5V20" /><circle cx="9.5" cy="8" r="3.25" /><path d="M17.5 20v-1.5a3.5 3.5 0 0 0-2.3-3.29" /><path d="M14.5 4.6a3.25 3.25 0 0 1 0 6.3" />',
        'database' => '<ellipse cx="12" cy="5.5" rx="7.5" ry="3" /><path d="M4.5 5.5V18c0 1.66 3.36 3 7.5 3s7.5-1.34 7.5-3V5.5" /><path d="M4.5 12c0 1.66 3.36 3 7.5 3s7.5-1.34 7.5-3" />',
        'cart' => '<circle cx="10" cy="20.5" r="1.25" /><circle cx="18" cy="20.5" r="1.25" /><path d="M2.5 3h2l2.2 11.4a2 2 0 0 0 2 1.6h8.6a2 2 0 0 0 2-1.6L21 7.5H6" />',
        'cloud' => '<path d="M7 18.5a4.5 4.5 0 0 1-.5-8.98A5.5 5.5 0 0 1 17.4 8.02 4 4 0 0 1 17 16H7.3" />',
        'monitor' => '<rect x="2.5" y="4" width="19" height="13" rx="2" /><path d="M8.5 21h7" /><path d="M12 17v4" />',
        'server' => '<rect x="3" y="3.5" width="18" height="6.5" rx="1.5" /><rect x="3" y="14" width="18" height="6.5" rx="1.5" /><path d="M7 6.75h.01" /><path d="M7 17.25h.01" />',
        'cpu' => '<rect x="6" y="6" width="12" height="12" rx="2" /><path d="M6 2.5v3" /><path d="M12 2.5v3" /><path d="M18 2.5v3" /><path d="M6 18.5v3" /><path d="M12 18.5v3" /><path d="M18 18.5v3" /><path d="M2.5 6h3" /><path d="M2.5 12h3" /><path d="M2.5 18h3" /><path d="M18.5 6h3" /><path d="M18.5 12h3" /><path d="M18.5 18h3" />',
        'search' => '<circle cx="10.5" cy="10.5" r="6.5" /><path d="M20 20l-4.9-4.9" />',
        'git-branch' => '<circle cx="6" cy="6" r="2.25" /><circle cx="6" cy="18" r="2.25" /><circle cx="18" cy="9" r="2.25" /><path d="M6 8.25V15.75" /><path d="M18 11.25V13a3 3 0 0 1-3 3h-3.5" />',
        'compass' => '<circle cx="12" cy="12" r="9.5" /><path d="M15 9l-2 6-6 2 2-6 6-2Z" />',
        'pen' => '<path d="M14.5 4.5l5 5L8 21H3v-5L14.5 4.5Z" /><path d="M12.5 6.5l5 5" />',
        'check-circle' => '<circle cx="12" cy="12" r="9.5" /><path d="M8 12.5l2.6 2.6L16.5 9" />',
        'rocket' => '<path d="M13.5 3.5c3 0 6 3 6 6-2.5 1-4 2-6 5-2-1.5-3.5-3-5-5 3-3 5-6 5-6Z" /><path d="M8.5 14.5c-2 .5-3 2-3.5 5.5 3.5-.5 5-1.5 5.5-3.5" /><circle cx="14.5" cy="9.5" r="1.4" />',
        'life-buoy' => '<circle cx="12" cy="12" r="9.5" /><circle cx="12" cy="12" r="3.75" /><path d="M5.1 5.1l3.3 3.3" /><path d="M15.6 15.6l3.3 3.3" /><path d="M18.9 5.1l-3.3 3.3" /><path d="M8.4 15.6l-3.3 3.3" />',
        'arrow-right' => '<path d="M4 12h16" /><path d="M13 5l7 7-7 7" />',
        'arrow-up' => '<path d="M12 20V4" /><path d="M5 11l7-7 7 7" />',
        'arrow-up-right' => '<path d="M6 18L18 6" /><path d="M8 6h10v10" />',
        'chevron-down' => '<path d="M5 8l7 7 7-7" />',
        'plus' => '<path d="M12 5v14" /><path d="M5 12h14" />',
        'minus' => '<path d="M5 12h14" />',
        'mail' => '<rect x="2.5" y="4.5" width="19" height="15" rx="2.5" /><path d="M3 6l9 7 9-7" />',
        'map-pin' => '<path d="M12 21.5S19 15 19 10a7 7 0 0 0-14 0c0 5 7 11.5 7 11.5Z" /><circle cx="12" cy="10" r="2.5" />',
        'menu' => '<path d="M4 6h16" /><path d="M4 12h16" /><path d="M4 18h16" />',
        'close' => '<path d="M6 6l12 12" /><path d="M18 6L6 18" />',
        'shield' => '<path d="M12 2.75l7.5 3v6c0 5-3.4 8-7.5 9.5-4.1-1.5-7.5-4.5-7.5-9.5v-6l7.5-3Z" /><path d="M8.75 12l2.25 2.25 4.25-4.5" />',
        'zap' => '<path d="M12.5 2.5L4 14h6l-1.5 7.5L20 10h-6.5l-1-7.5Z" />',
        'message' => '<path d="M3.5 5.5h17v11h-9L7 20v-3.5H3.5v-11Z" />',
        'trending-up' => '<path d="M3.5 16.5l6-6 4 4 7-7.5" /><path d="M15 6.5h5.5V12" />',
        'target' => '<circle cx="12" cy="12" r="9.5" /><circle cx="12" cy="12" r="5.5" /><circle cx="12" cy="12" r="1.5" />',
        'plane' => '<path d="M12.5 2.5c1 0 1.5.9 1.5 2v5.7l6.5 4v2l-6.5-2v4.3l2 1.7v1.6l-3.5-1-3.5 1v-1.6l2-1.7v-4.3l-6.5 2v-2l6.5-4V4.5c0-1.1.5-2 1.5-2Z" />',
        'sprout' => '<path d="M12 21.5v-9" /><path d="M12 12.5C12 8 8 6.5 4.5 6.5 4.5 10.5 7 12.5 12 12.5Z" /><path d="M12 9.5C12 5.5 15.5 3.5 19.5 3.5c0 4.5-3 6.5-7.5 6.5Z" />',
        'heart-pulse' => '<path d="M12.5 20.5S3 15 3 8.5A4.5 4.5 0 0 1 12 6.9 4.5 4.5 0 0 1 21 8.5c0 6.5-8.5 12-8.5 12Z" /><path d="M6.5 11h2.3l1.3-2.5 2 5 1.3-2.5H16" />',
        'line-chart' => '<path d="M3.5 3.5v17h17" /><path d="M6.5 15l3.5-4.5 3 2.5 4.5-6" />',
        'graduation-cap' => '<path d="M2.5 9.5L12 5l9.5 4.5L12 14 2.5 9.5Z" /><path d="M6.5 11.5v4.5c0 1.4 2.5 2.5 5.5 2.5s5.5-1.1 5.5-2.5v-4.5" /><path d="M21 9.5v5" />',
        'truck' => '<rect x="2.5" y="7" width="12" height="9" rx="1" /><path d="M14.5 10h3.5l3 3v3h-6.5" /><circle cx="7" cy="18" r="1.75" /><circle cx="17" cy="18" r="1.75" />',
        'facebook' => '<path d="M14.5 8.5h2.5V5.2c-.44-.06-1.95-.2-3.2-.2-3.17 0-4.3 1.9-4.3 4.9v2.35H6.75v3.5H9.5V21h3.5v-5.25h2.7l.45-3.5h-3.15V10.3c0-1.02.28-1.8 1.5-1.8Z" />',
        'twitter' => '<path fill="currentColor" stroke="none" d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24h-6.657l-5.214-6.817-5.967 6.817H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231 5.45-6.231Zm-1.161 17.52h1.833L7.084 4.126H5.117L17.083 19.77Z" />',
        'linkedin' => '<rect x="3" y="3" width="18" height="18" rx="2.5" /><path d="M7.5 10v7" /><circle cx="7.5" cy="7" r="1" /><path d="M11.5 17v-4.2c0-1.5 1-2.3 2.2-2.3 1.2 0 2 .8 2 2.3V17" /><path d="M11.5 10v.2" />',
        'instagram' => '<rect x="3" y="3" width="18" height="18" rx="5" /><circle cx="12" cy="12" r="4" /><path d="M17.3 6.7h.01" />',
        'whatsapp' => '<path d="M20.5 11.5a8.5 8.5 0 0 1-12.7 7.4L3.5 20.5l1.7-4.1A8.5 8.5 0 1 1 20.5 11.5Z" /><path d="M8.5 8.5c.3-.6.7-.6 1-.6h.7c.2 0 .4.1.5.4l.8 1.9c.1.2.1.4-.1.6l-.7.8c-.1.2-.1.3 0 .5.5.9 1.2 1.6 2.1 2.1.2.1.4.1.5-.1l.8-.9c.2-.2.4-.2.6-.1l1.8.9c.2.1.3.3.3.5v.7c0 .3-.1.6-.4.8-.4.3-1 .5-1.6.4-1.2-.2-2.5-.9-3.6-1.9-1-.9-1.8-2-2.3-3.2-.4-1-.5-1.9-.4-2.8Z" />',
    ];

    $path = $icons[$name] ?? '';
@endphp

<svg
    {{ $attributes->merge(['class' => $class]) }}
    viewBox="0 0 24 24"
    fill="none"
    stroke="currentColor"
    stroke-width="1.6"
    stroke-linecap="round"
    stroke-linejoin="round"
    aria-hidden="true"
>{!! $path !!}</svg>
