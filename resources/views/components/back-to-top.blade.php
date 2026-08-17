@php
    $radius = 15;
    $circumference = round(2 * M_PI * $radius, 1);
@endphp

<div
    x-data="{
        visible: false,
        progress: 0,
        update() {
            const scrollTop = window.scrollY;
            const docHeight = document.documentElement.scrollHeight - window.innerHeight;
            this.progress = docHeight > 0 ? Math.min(100, (scrollTop / docHeight) * 100) : 0;
            this.visible = scrollTop > 600;
        },
        scrollToTop() {
            const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
            window.scrollTo({ top: 0, behavior: reduceMotion ? 'auto' : 'smooth' });
        },
    }"
    x-init="update(); window.addEventListener('scroll', () => update(), { passive: true })"
    class="fixed bottom-5 right-4 z-40 sm:bottom-8 sm:right-8"
>
    <button
        type="button"
        x-show="visible"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 translate-y-2 scale-90"
        x-transition:enter-end="opacity-100 translate-y-0 scale-100"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 translate-y-0 scale-100"
        x-transition:leave-end="opacity-0 translate-y-2 scale-90"
        style="display: none;"
        @click="scrollToTop()"
        aria-label="Back to top"
        class="group/btn relative flex h-12 items-center justify-center rounded-full border border-border/80 bg-white/90 pl-1.5 pr-1.5 text-primary shadow-[0_10px_30px_-10px_rgba(11,12,36,0.35)] ring-1 ring-inset ring-white/60 backdrop-blur transition-all duration-300 ease-premium hover:border-primary/25 hover:pr-4 hover:shadow-[0_16px_36px_-8px_rgba(46,49,146,0.35)] active:scale-[0.96] sm:h-13 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary"
    >
        <span class="relative flex h-9 w-9 shrink-0 items-center justify-center sm:h-10 sm:w-10">
            <svg class="absolute inset-0 h-full w-full -rotate-90" viewBox="0 0 36 36" aria-hidden="true">
                <circle cx="18" cy="18" r="{{ $radius }}" fill="none" stroke="currentColor" stroke-width="2" class="text-border"></circle>
                <circle
                    cx="18" cy="18" r="{{ $radius }}" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    class="text-primary transition-[stroke-dashoffset] duration-150 ease-out"
                    :style="`stroke-dasharray: {{ $circumference }}px; stroke-dashoffset: ${ {{ $circumference }} - ({{ $circumference }} * progress / 100) }px`"
                ></circle>
            </svg>
            <x-svg-icon name="arrow-up" class="relative h-4 w-4 transition-transform duration-300 group-hover/btn:-translate-y-0.5" />
        </span>

        <span class="max-w-0 overflow-hidden whitespace-nowrap text-sm font-semibold opacity-0 transition-all duration-300 ease-out group-hover/btn:ml-1 group-hover/btn:max-w-12 group-hover/btn:opacity-100">
            Top
        </span>
    </button>
</div>
