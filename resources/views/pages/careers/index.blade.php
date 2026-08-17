@extends('layouts.app')

@section('title', 'Careers — Divine Dev Hub')
@section('description', 'Open roles at Divine Dev Hub.')

@section('content')

    @php
        // Derived from the real $jobs data (not invented copy) so the "at a
        // glance" panel below never drifts from what the list actually shows.
        $jobLocations = collect($jobs)->pluck('location')->unique()->values();
        $jobTypes = collect($jobs)->pluck('type')->unique()->values();
    @endphp

    <x-breadcrumb :items="[['label' => 'Careers']]" />

    <x-page-hero
        eyebrow="Careers"
        title="Build with a team that ships"
        description="We're a 50+ person engineering team working across web, mobile, CRM, e-commerce and platform specializations."
    >
        <p class="mt-4 text-sm text-text-secondary">Open roles across engineering, design and QA — updated as they open.</p>
    </x-page-hero>

    <section class="py-16 sm:py-20">
        <div class="page-container">
            @if (count($jobs))
                <div data-reveal class="mb-6 rounded-xl border border-dashed border-accent/50 bg-accent/5 px-5 py-4 text-sm leading-relaxed text-text-secondary">
                    <strong class="text-text-primary">Placeholder data — design review only.</strong>
                    Every listing below is fictional sample content added to review this page's populated layout. See <code class="text-xs">docs/build-log.md</code>.
                </div>

                <div class="grid gap-10 lg:grid-cols-[1fr_20rem]">
                    <div class="space-y-4">
                        @foreach ($jobs as $i => $job)
                            <x-job-card
                                :title="$job['title']"
                                :location="$job['location']"
                                :type="$job['type']"
                                :href="route('careers.show', $job['slug'])"
                                placeholder
                                data-reveal
                                :style="'--reveal-delay: ' . ($i * 60) . 'ms'"
                            />
                        @endforeach
                    </div>

                    {{-- Desktop-only companion panel — the job-list column reads
                         thin against the full page-container width otherwise.
                         Every figure here is derived from $jobs above, not
                         invented copy. Hidden below lg rather than stacked, since
                         the sparse-page problem this solves is desktop-only. --}}
                    <aside data-reveal style="--reveal-delay:120ms" class="hidden lg:block">
                        <div class="rounded-2xl border border-border bg-surface p-6">
                            <p class="text-xs font-semibold uppercase tracking-wide text-muted">At a glance</p>
                            {{-- Plain div/p rows, matching the icon+label+value pattern
                                 stat-item.blade.php already establishes elsewhere —
                                 not <dl>/<dt>/<dd>, since each row also carries a
                                 non-dt/dd icon that a <dl>'s content model doesn't allow. --}}
                            <div class="mt-4 space-y-4">
                                <div class="flex items-center gap-3">
                                    <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-primary-50 text-primary">
                                        <x-svg-icon name="layers" class="h-4 w-4" />
                                    </span>
                                    <div>
                                        <p class="text-xs text-text-secondary">Open roles</p>
                                        <p class="text-sm font-semibold text-text-primary">{{ count($jobs) }}</p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-3">
                                    <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-primary-50 text-primary">
                                        <x-svg-icon name="map-pin" class="h-4 w-4" />
                                    </span>
                                    <div>
                                        <p class="text-xs text-text-secondary">Locations</p>
                                        <p class="text-sm font-semibold text-text-primary">{{ $jobLocations->implode(', ') }}</p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-3">
                                    <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-primary-50 text-primary">
                                        <x-svg-icon name="compass" class="h-4 w-4" />
                                    </span>
                                    <div>
                                        <p class="text-xs text-text-secondary">Employment types</p>
                                        <p class="text-sm font-semibold text-text-primary">{{ $jobTypes->implode(', ') }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-6 border-t border-border pt-5">
                                <p class="text-xs leading-relaxed text-text-secondary">
                                    Don't see the right fit?
                                    <a href="{{ route('contact.show') }}" class="font-semibold text-primary hover:underline">Get in touch</a>
                                    — we keep good introductions on file.
                                </p>
                            </div>
                        </div>
                    </aside>
                </div>
            @else
                <x-empty-state
                    data-reveal
                    icon="users"
                    title="No open roles right now"
                    description="We're not actively hiring at the moment, but we're always glad to hear from strong engineers and designers. Send an introduction and we'll keep it on file."
                >
                    <a href="mailto:{{ config('company.email') }}" class="mt-6 inline-flex items-center gap-1.5 text-sm font-semibold text-primary">
                        Email us your introduction
                        <x-svg-icon name="arrow-right" class="h-4 w-4" />
                    </a>
                </x-empty-state>
            @endif
        </div>
    </section>

    <section class="bg-surface py-20 sm:py-28">
        <div data-reveal-scale class="page-container">
            <x-cta-banner
                title="Have an opening in mind?"
                description="Don't see the exact role you're looking for? Tell us what you do at {{ config('company.email') }} and we'll keep you in mind."
                ctaLabel="Get in Touch"
                :ctaHref="route('contact.show')"
            />
        </div>
    </section>

@endsection
