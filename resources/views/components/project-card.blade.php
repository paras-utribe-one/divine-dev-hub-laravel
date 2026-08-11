@props([
    'title',
    'category',
])

<div class="group relative flex aspect-4/3 flex-col justify-end overflow-hidden rounded-2xl border border-border bg-gradient-to-br from-primary/90 to-secondary p-6 transition duration-300 hover:-translate-y-1 hover:shadow-lg">
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,_rgba(255,255,255,0.12),_transparent_60%)]" aria-hidden="true"></div>
    <p class="relative text-xs font-semibold uppercase tracking-wide text-white/60">{{ $category }}</p>
    <h3 class="relative mt-1 text-xl font-semibold text-white">{{ $title }}</h3>
</div>
