@props([
    'question',
])

<div
    x-data="{ open: false }"
    class="group rounded-2xl border bg-white transition-colors duration-200"
    :class="open ? 'border-primary/30' : 'border-border'"
>
    <h3>
        <button
            type="button"
            class="flex w-full items-center justify-between gap-4 px-6 py-5 text-left focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary"
            @click="open = !open"
            :aria-expanded="open"
        >
            <span class="text-base font-medium transition-colors" :class="open ? 'text-primary' : 'text-text-primary'">{{ $question }}</span>
            <span
                class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full border transition-colors duration-200"
                :class="open ? 'border-primary bg-primary text-white' : 'border-border text-text-secondary'"
            >
                <x-svg-icon name="plus" class="h-3.5 w-3.5 transition-transform duration-300" x-bind:class="open ? 'rotate-45' : 'rotate-0'" />
            </span>
        </button>
    </h3>
    <div
        x-show="open"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-100"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        style="display: none;"
    >
        <div class="px-6 pb-5 text-sm leading-relaxed text-text-secondary">
            {{ $slot }}
        </div>
    </div>
</div>
