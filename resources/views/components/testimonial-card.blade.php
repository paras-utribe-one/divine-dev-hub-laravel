@props([
    'quote',
    'name',
    'role',
    'company',
])

{{--
    Never render this with an invented quote/name — every testimonial needs a
    real name, role and company (or an honest anonymisation label). See
    App\Support\Content::testimonials() and docs/build-log.md.
--}}
<figure {{ $attributes->merge(['class' => 'flex h-full flex-col rounded-2xl border border-border bg-white p-8']) }}>
    <x-svg-icon name="message" class="h-6 w-6 text-primary/30" />
    <blockquote class="mt-4 flex-1 text-base leading-relaxed text-text-primary">
        &ldquo;{{ $quote }}&rdquo;
    </blockquote>
    <figcaption class="mt-6 border-t border-border pt-5">
        <p class="text-sm font-semibold text-text-primary">{{ $name }}</p>
        <p class="text-sm text-text-secondary">{{ $role }}, {{ $company }}</p>
    </figcaption>
</figure>
