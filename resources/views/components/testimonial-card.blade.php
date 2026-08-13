@props([
    'quote',
    'name',
    'role',
    'company',
    // Set true only for Phase-A sample data — stamps a visible "Placeholder"
    // tag on the card. See docs/build-log.md.
    'placeholder' => false,
])

{{--
    Outside of Phase-A placeholder review data, never render this with an
    invented quote/name — every real testimonial needs a real name, role and
    company (or an honest anonymisation label). See
    App\Support\Content::testimonials() and docs/build-log.md.
--}}
<figure {{ $attributes->merge(['class' => 'flex h-full flex-col rounded-2xl border border-border bg-white p-8']) }}>
    <div class="flex items-start justify-between gap-3">
        <x-svg-icon name="message" class="h-6 w-6 text-primary/30" />
        @if ($placeholder)
            <x-placeholder-tag />
        @endif
    </div>
    <blockquote class="mt-4 flex-1 text-base leading-relaxed text-text-primary">
        &ldquo;{{ $quote }}&rdquo;
    </blockquote>
    <figcaption class="mt-6 border-t border-border pt-5">
        <p class="text-sm font-semibold text-text-primary">{{ $name }}</p>
        <p class="text-sm text-text-secondary">{{ $role }}, {{ $company }}</p>
    </figcaption>
</figure>
