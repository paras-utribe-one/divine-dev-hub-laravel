@extends('layouts.app')

@section('title', $service['title'] . ' — Divine Dev Hub')
@section('description', $service['description'])

@section('content')

    <x-breadcrumb :items="[['label' => 'Services', 'href' => route('services.index')], ['label' => $service['title']]]" />

    <x-page-hero
        eyebrow="Service"
        :title="$service['title']"
        :description="$service['description']"
    />

    <section class="py-16 sm:py-20">
        <div class="page-container grid gap-14 lg:grid-cols-12 lg:gap-10">
            <div class="lg:col-span-8">
                <span class="flex h-14 w-14 items-center justify-center rounded-2xl bg-primary-50 text-primary">
                    <x-svg-icon :name="$service['icon']" class="h-7 w-7" />
                </span>

                <p class="mt-6 text-lg leading-relaxed text-text-secondary">{{ $service['summary'] }}</p>

                <div class="mt-8 flex flex-wrap gap-2">
                    @foreach ($service['tags'] as $tag)
                        <span class="rounded-full border border-border bg-surface px-3 py-1.5 text-sm font-medium text-text-secondary">{{ $tag }}</span>
                    @endforeach
                </div>

                <div class="mt-10 rounded-2xl border border-border bg-surface p-8">
                    <h2 class="text-lg font-semibold text-text-primary">How we approach this</h2>
                    <p class="mt-3 text-sm leading-relaxed text-text-secondary">
                        Every engagement follows the same seven-stage process — discovery, strategy, design, development, testing, launch and ongoing support — regardless of service. <a href="{{ route('about') }}#process" class="font-medium text-primary hover:underline">See our full process →</a>
                    </p>
                </div>
            </div>

            <div class="lg:col-span-4">
                <div class="rounded-2xl border border-border bg-white p-6">
                    <h2 class="text-sm font-semibold uppercase tracking-wide text-text-secondary">Other services</h2>
                    <ul class="mt-4 space-y-1">
                        @foreach ($otherServices as $other)
                            <li>
                                <a href="{{ route('services.show', $other['slug']) }}" class="group flex items-center justify-between gap-2 rounded-lg px-3 py-2.5 text-sm font-medium text-text-primary transition hover:bg-surface hover:text-primary">
                                    {{ $other['title'] }}
                                    <x-svg-icon name="arrow-right" class="h-3.5 w-3.5 text-primary opacity-0 transition group-hover:opacity-100" />
                                </a>
                            </li>
                        @endforeach
                    </ul>
                    <a href="{{ route('services.index') }}" class="mt-4 inline-flex items-center gap-1.5 px-3 text-sm font-semibold text-primary">
                        View all services
                        <x-svg-icon name="arrow-right" class="h-4 w-4" />
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-surface py-20 sm:py-28">
        <div class="page-container">
            <x-cta-banner
                :title="'Ready to discuss ' . $service['title'] . '?'"
                description="Tell us what you're building — we'll follow up at info@divinedevhub.in with next steps."
                ctaLabel="Discuss This Service"
                :ctaHref="route('contact.show')"
            />
        </div>
    </section>

@endsection
