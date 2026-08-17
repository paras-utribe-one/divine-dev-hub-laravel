@extends('layouts.app')

@section('title', $industry['label'] . ' Software Development — Divine Dev Hub')
@section('description', $industry['description'])

@section('content')

    <x-breadcrumb :items="[['label' => 'Industries', 'href' => route('industries.index')], ['label' => $industry['label']]]" />

    <x-page-hero
        eyebrow="Industry"
        :title="$industry['label']"
        :description="$industry['description']"
    />

    <section class="py-16 sm:py-20">
        <div class="page-container grid gap-14 lg:grid-cols-12 lg:gap-10">
            <div data-reveal class="lg:col-span-8">
                <span class="flex h-14 w-14 items-center justify-center rounded-2xl bg-primary-50 text-primary">
                    <x-svg-icon :name="$industry['icon']" class="h-7 w-7" />
                </span>

                <p class="mt-6 text-lg leading-relaxed text-text-secondary">
                    We've delivered software in {{ strtolower($industry['label']) }} covering {{ strtolower($industry['description']) }} Every engagement starts the same way — discovery and strategy before any code — so domain-specific requirements are understood up front rather than discovered mid-build.
                </p>

                @if ($relatedProjects->isNotEmpty())
                    <div class="mt-10">
                        <h2 class="text-lg font-semibold text-text-primary">Related work</h2>
                        <div class="mt-5 grid gap-5 sm:grid-cols-2">
                            @foreach ($relatedProjects as $i => $project)
                                <x-project-card
                                    :title="$project['title']"
                                    :category="$project['category']"
                                    :image="asset('images/projects/' . $project['image'])"
                                    data-reveal
                                    :style="'--reveal-delay: ' . ($i * 60) . 'ms'"
                                />
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>

            <div data-reveal style="--reveal-delay:120ms" class="lg:col-span-4">
                <div class="rounded-2xl border border-border bg-white p-6">
                    <h2 class="text-sm font-semibold uppercase tracking-wide text-text-secondary">Other industries</h2>
                    <ul class="mt-4 space-y-1">
                        @foreach ($otherIndustries as $other)
                            <li>
                                <a href="{{ route('industries.show', $other['slug']) }}" class="group flex items-center justify-between gap-2 rounded-lg px-3 py-2.5 text-sm font-medium text-text-primary transition hover:bg-surface hover:text-primary">
                                    {{ $other['label'] }}
                                    <x-svg-icon name="arrow-right" class="h-3.5 w-3.5 text-primary opacity-0 transition group-hover:opacity-100" />
                                </a>
                            </li>
                        @endforeach
                    </ul>
                    <a href="{{ route('industries.index') }}" class="mt-4 inline-flex items-center gap-1.5 px-3 text-sm font-semibold text-primary">
                        View all industries
                        <x-svg-icon name="arrow-right" class="h-4 w-4" />
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-surface py-20 sm:py-28">
        <div data-reveal-scale class="page-container">
            <x-cta-banner
                :title="'Building for ' . strtolower($industry['label']) . '?'"
                description="Tell us what you're building — we'll follow up at info@divinedevhub.in with next steps."
                ctaLabel="Talk to Us"
                :ctaHref="route('contact.show')"
            />
        </div>
    </section>

@endsection
