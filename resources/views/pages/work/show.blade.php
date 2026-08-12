@extends('layouts.app')

@section('title', $project['title'] . ' — Divine Dev Hub')
@section('description', $project['summary'])

@section('content')

    <x-breadcrumb :items="[['label' => 'Our Work', 'href' => route('work.index')], ['label' => $project['title']]]" />

    <section class="relative overflow-hidden bg-secondary py-16 sm:py-20" aria-labelledby="project-hero-heading">
        <div class="pointer-events-none absolute inset-0 -z-10 bg-dot-grid text-white/5" aria-hidden="true"></div>
        <div class="page-container max-w-3xl">
            <p class="text-sm font-semibold uppercase tracking-wide text-accent">{{ $project['category'] }}</p>
            <h1 id="project-hero-heading" class="mt-4 text-4xl font-semibold tracking-tight text-white sm:text-5xl">{{ $project['title'] }}</h1>

            @if ($project['metric'])
                <span class="mt-6 inline-flex items-center gap-2 rounded-full bg-accent/15 px-4 py-2 text-sm font-semibold text-accent">
                    {{ $project['metric'] }}
                </span>
            @endif
        </div>
    </section>

    <section class="py-16 sm:py-20">
        <div class="page-container grid gap-14 lg:grid-cols-12 lg:gap-10">
            <div class="lg:col-span-8">
                <img
                    src="{{ asset('images/projects/' . $project['image']) }}"
                    alt="{{ $project['title'] }} — {{ $project['category'] }} project preview"
                    width="1200" height="800" loading="eager"
                    class="w-full rounded-2xl border border-border object-cover"
                >

                <div class="mt-10">
                    <h2 class="text-lg font-semibold text-text-primary">About this project</h2>
                    <p class="mt-3 text-base leading-relaxed text-text-secondary">{{ $project['summary'] }}</p>

                    @unless ($project['metric'])
                        <p class="mt-4 rounded-xl border border-dashed border-border bg-surface px-5 py-4 text-sm text-text-secondary">
                            We're gathering permission and hard numbers for this project's outcomes — check back, or ask us directly for specifics.
                        </p>
                    @endunless
                </div>

                @if ($industry)
                    <div class="mt-8 flex items-center gap-3 rounded-xl border border-border bg-surface px-5 py-4">
                        <x-svg-icon :name="$industry['icon']" class="h-5 w-5 shrink-0 text-primary" />
                        <p class="text-sm text-text-secondary">
                            Part of our work in
                            <a href="{{ route('industries.show', $industry['slug']) }}" class="font-semibold text-primary hover:underline">{{ $industry['label'] }}</a>.
                        </p>
                    </div>
                @endif
            </div>

            <div class="lg:col-span-4">
                <div class="rounded-2xl border border-border bg-white p-6">
                    <h2 class="text-sm font-semibold uppercase tracking-wide text-text-secondary">More work</h2>
                    <ul class="mt-4 space-y-1">
                        @foreach ($otherProjects as $other)
                            <li>
                                <a href="{{ route('work.show', $other['slug']) }}" class="group flex items-center justify-between gap-2 rounded-lg px-3 py-2.5 text-sm font-medium text-text-primary transition hover:bg-surface hover:text-primary">
                                    {{ $other['title'] }}
                                    <x-svg-icon name="arrow-right" class="h-3.5 w-3.5 text-primary opacity-0 transition group-hover:opacity-100" />
                                </a>
                            </li>
                        @endforeach
                    </ul>
                    <a href="{{ route('work.index') }}" class="mt-4 inline-flex items-center gap-1.5 px-3 text-sm font-semibold text-primary">
                        View all work
                        <x-svg-icon name="arrow-right" class="h-4 w-4" />
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-surface py-20 sm:py-28">
        <div class="page-container">
            <x-cta-banner
                title="Want to see something similar built for you?"
                description="Tell us what you're building — we'll follow up at info@divinedevhub.in with next steps."
                ctaLabel="Start a Project"
                :ctaHref="route('contact.show')"
            />
        </div>
    </section>

@endsection
