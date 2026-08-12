@extends('layouts.app')

@section('title', 'Technologies — Divine Dev Hub')
@section('description', 'The frontend, backend, mobile, cloud and platform technologies we use to build software.')

@section('content')

    <x-breadcrumb :items="[['label' => 'Technologies']]" />

    <x-page-hero
        eyebrow="Technology Expertise"
        title="A modern, pragmatic technology stack"
        description="We pick the right tool for the job across the categories our projects most often call for."
    />

    <section class="py-16 sm:py-20">
        <div class="page-container grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($categories as $category)
                <div class="rounded-2xl border border-border bg-white p-7">
                    <span class="flex h-12 w-12 items-center justify-center rounded-xl bg-primary-50 text-primary">
                        <x-svg-icon :name="$category['icon']" class="h-6 w-6" />
                    </span>
                    <h2 class="mt-5 text-lg font-semibold text-text-primary">{{ $category['label'] }}</h2>
                    <p class="mt-2 text-sm leading-relaxed text-text-secondary">{{ $category['description'] }}</p>
                    <div class="mt-5 flex flex-wrap gap-2">
                        @foreach ($category['items'] as $item)
                            <span class="inline-flex items-center gap-1.5 rounded-lg border border-border bg-surface px-3 py-1.5 text-xs font-medium text-text-primary">
                                <span class="h-1.5 w-1.5 rounded-full bg-primary"></span>
                                {{ $item }}
                            </span>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    @if (count($details))
        <section class="bg-surface py-16 sm:py-20">
            <div class="page-container">
                <x-section-heading eyebrow="Deep Dives" title="Featured technologies" align="center" />
                <div class="mt-10 grid gap-5 sm:grid-cols-3">
                    @foreach ($details as $technology)
                        <a href="{{ route('technologies.show', $technology['slug']) }}" class="group flex items-center gap-4 rounded-2xl border border-border bg-white p-6 transition hover:border-primary/20 hover:shadow-lg hover:shadow-secondary/5">
                            <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-primary-50 text-primary">
                                <x-svg-icon :name="$technology['icon']" class="h-5 w-5" />
                            </span>
                            <span class="flex-1 text-sm font-semibold text-text-primary">{{ $technology['name'] }}</span>
                            <x-svg-icon name="arrow-right" class="h-4 w-4 text-primary opacity-0 transition group-hover:opacity-100" />
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

@endsection
