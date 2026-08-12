@extends('layouts.app')

@section('title', 'Services — Divine Dev Hub')
@section('description', 'End-to-end software services: web development, mobile apps, CRM, e-commerce, and Odoo and Magento implementations.')

@section('content')

    <x-breadcrumb :items="[['label' => 'Services']]" />

    <x-page-hero
        eyebrow="What We Do"
        title="Services built around your roadmap"
        description="From first release to long-term platform growth, our teams cover the full software lifecycle."
    />

    <section class="py-16 sm:py-20">
        <div class="page-container grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($services as $i => $service)
                <a
                    href="{{ route('services.show', $service['slug']) }}"
                    data-reveal
                    style="--reveal-delay: {{ $i * 60 }}ms"
                    class="group relative flex flex-col overflow-hidden rounded-2xl border border-border bg-white p-7 transition-all duration-300 hover:-translate-y-1 hover:border-primary/20 hover:shadow-xl hover:shadow-secondary/10"
                >
                    <span class="flex h-12 w-12 items-center justify-center rounded-xl bg-primary-50 text-primary transition group-hover:bg-primary group-hover:text-white">
                        <x-svg-icon :name="$service['icon']" class="h-6 w-6" />
                    </span>
                    <h2 class="mt-5 flex items-center gap-1.5 text-lg font-semibold text-text-primary">
                        {{ $service['title'] }}
                        <x-svg-icon name="arrow-up-right" class="h-4 w-4 -translate-x-1 text-primary opacity-0 transition-all duration-200 group-hover:translate-x-0 group-hover:opacity-100" />
                    </h2>
                    <p class="mt-2 text-sm leading-relaxed text-text-secondary">{{ $service['description'] }}</p>
                    <div class="mt-5 flex flex-wrap gap-2">
                        @foreach ($service['tags'] as $tag)
                            <span class="rounded-full border border-border bg-surface px-3 py-1 text-xs font-medium text-text-secondary">{{ $tag }}</span>
                        @endforeach
                    </div>
                </a>
            @endforeach
        </div>
    </section>

    <section class="bg-surface py-20 sm:py-28">
        <div data-reveal-scale class="page-container">
            <x-cta-banner
                title="Not sure which service fits?"
                description="Tell us what you're building — we'll follow up at info@divinedevhub.in with next steps."
                ctaLabel="Talk to Us"
                :ctaHref="route('contact.show')"
            />
        </div>
    </section>

@endsection
