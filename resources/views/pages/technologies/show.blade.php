@extends('layouts.app')

@section('title', $technology['name'] . ' Development — Divine Dev Hub')
@section('description', $technology['summary'])

@section('content')

    <x-breadcrumb :items="[['label' => 'Technologies', 'href' => route('technologies.index')], ['label' => $technology['name']]]" />

    <x-page-hero
        :eyebrow="$technology['category']"
        :title="$technology['name'] . ' Development'"
    />

    <section class="py-16 sm:py-20">
        <div class="page-container grid gap-14 lg:grid-cols-12 lg:gap-10">
            <div data-reveal class="lg:col-span-8">
                <span class="flex h-14 w-14 items-center justify-center rounded-2xl bg-primary-50 text-primary">
                    <x-svg-icon :name="$technology['icon']" class="h-7 w-7" />
                </span>
                <p class="mt-6 text-lg leading-relaxed text-text-secondary">{{ $technology['summary'] }}</p>
            </div>

            <div data-reveal style="--reveal-delay:120ms" class="lg:col-span-4">
                <div class="rounded-2xl border border-border bg-white p-6">
                    <h2 class="text-sm font-semibold uppercase tracking-wide text-text-secondary">Other technologies</h2>
                    <ul class="mt-4 space-y-1">
                        @foreach ($otherTechnologies as $other)
                            <li>
                                <a href="{{ route('technologies.show', $other['slug']) }}" class="group flex items-center justify-between gap-2 rounded-lg px-3 py-2.5 text-sm font-medium text-text-primary transition hover:bg-surface hover:text-primary">
                                    {{ $other['name'] }}
                                    <x-svg-icon name="arrow-right" class="h-3.5 w-3.5 text-primary opacity-0 transition group-hover:opacity-100" />
                                </a>
                            </li>
                        @endforeach
                    </ul>
                    <a href="{{ route('technologies.index') }}" class="mt-4 inline-flex items-center gap-1.5 px-3 text-sm font-semibold text-primary">
                        View all technologies
                        <x-svg-icon name="arrow-right" class="h-4 w-4" />
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-surface py-20 sm:py-28">
        <div data-reveal-scale class="page-container">
            <x-cta-banner
                :title="'Building with ' . $technology['name'] . '?'"
                description="Tell us what you're building — we'll follow up at info@divinedevhub.in with next steps."
                ctaLabel="Talk to Us"
                :ctaHref="route('contact.show')"
            />
        </div>
    </section>

@endsection
