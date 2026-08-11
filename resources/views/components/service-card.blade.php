@props([
    'index' => '01',
    'title',
    'description',
])

<div class="group relative rounded-2xl border border-border bg-white p-6 transition duration-300 hover:-translate-y-1 hover:border-primary/30 hover:shadow-lg">
    <span class="text-sm font-semibold text-primary/40 transition group-hover:text-primary">{{ $index }}</span>
    <h3 class="mt-3 text-lg font-semibold text-text-primary">{{ $title }}</h3>
    <p class="mt-2 text-sm leading-relaxed text-text-secondary">{{ $description }}</p>
</div>
