@extends('layouts.app')

@section('title', 'Industries — Divine Dev Hub')
@section('description', 'Industries we\'ve delivered software for — travel, agriculture, healthcare, fintech, education and logistics.')

@section('content')

    <x-breadcrumb :items="[['label' => 'Industries']]" />

    <x-page-hero
        eyebrow="Industries"
        title="Industries we've delivered for"
        description="A cross-section of the sectors represented in our project portfolio."
    />

    <section class="bg-secondary py-16 sm:py-20">
        <div class="page-container grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($industries as $industry)
                <a
                    href="{{ route('industries.show', $industry['slug']) }}"
                    data-reveal
                    style="--reveal-delay: {{ $loop->index * 60 }}ms"
                    class="group relative overflow-hidden rounded-2xl bg-white/[0.03] p-6 ring-1 ring-inset ring-white/10 transition-all duration-300 hover:-translate-y-1 hover:bg-white/[0.06] hover:ring-accent/40"
                >
                    <x-svg-icon
                        :name="$industry['icon']"
                        class="pointer-events-none absolute -right-4 -top-4 h-28 w-28 text-white/5 transition-transform duration-500 group-hover:scale-110"
                    />
                    <div class="relative flex min-h-36 flex-col justify-between">
                        <span class="flex h-11 w-11 items-center justify-center rounded-xl border border-white/15 bg-white/5 text-accent transition-colors duration-300 group-hover:border-accent/40 group-hover:bg-accent/10">
                            <x-svg-icon :name="$industry['icon']" class="h-5 w-5" />
                        </span>
                        <div>
                            <p class="text-base font-semibold text-white">{{ $industry['label'] }}</p>
                            <p class="mt-1.5 text-sm leading-relaxed text-white/55">{{ $industry['description'] }}</p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </section>

    <section class="py-20 sm:py-28">
        <div data-reveal-scale class="page-container">
            <x-cta-banner
                title="Don't see your industry?"
                description="We're always working outside these six — tell us what you're building and we'll follow up at info@divinedevhub.in."
                ctaLabel="Talk to Us"
                :ctaHref="route('contact.show')"
            />
        </div>
    </section>

@endsection
