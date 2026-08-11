@props([
    'question',
])

<div x-data="{ open: false }" class="rounded-xl border border-border bg-white">
    <h3>
        <button
            type="button"
            class="flex w-full items-center justify-between gap-4 px-5 py-4 text-left text-base font-medium text-text-primary focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary"
            @click="open = !open"
            :aria-expanded="open"
        >
            <span>{{ $question }}</span>
            <svg class="h-4 w-4 shrink-0 text-primary transition-transform duration-200" :class="open ? 'rotate-180' : ''" viewBox="0 0 12 12" fill="none" aria-hidden="true">
                <path d="M2.5 4.5L6 8L9.5 4.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </button>
    </h3>
    <div
        x-show="open"
        x-transition:enter="transition ease-out duration-150"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-100"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        style="display: none;"
    >
        <div class="px-5 pb-5 text-sm leading-relaxed text-text-secondary">
            {{ $slot }}
        </div>
    </div>
</div>
