@php
    $radius = 20;
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
    class="fixed bottom-6 right-5 z-40 sm:right-8"
>
    <div class="group relative">
        <span
            class="pointer-events-none absolute right-full top-1/2 mr-3 -translate-y-1/2 translate-x-1 whitespace-nowrap rounded-md bg-secondary px-2.5 py-1.5 text-xs font-medium text-white opacity-0 shadow-lg transition-all duration-200 group-hover:translate-x-0 group-hover:opacity-100"
            aria-hidden="true"
        >Top</span>

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
            class="relative flex h-13 w-13 items-center justify-center rounded-full border border-border bg-white text-primary shadow-lg shadow-secondary/10 transition duration-200 hover:border-primary/30 hover:shadow-xl active:scale-[0.96] focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary"
        >
            <svg class="absolute inset-0 h-full w-full -rotate-90" viewBox="0 0 48 48" aria-hidden="true">
                <circle cx="24" cy="24" r="{{ $radius }}" fill="none" stroke="currentColor" stroke-width="2" class="text-border"></circle>
                <circle
                    cx="24" cy="24" r="{{ $radius }}" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    class="text-primary transition-[stroke-dashoffset] duration-150 ease-out"
                    :style="`stroke-dasharray: {{ $circumference }}px; stroke-dashoffset: ${ {{ $circumference }} - ({{ $circumference }} * progress / 100) }px`"
                ></circle>
            </svg>
            <x-svg-icon name="arrow-up" class="relative h-5 w-5" />
        </button>
    </div>
</div>
