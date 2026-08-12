@extends('layouts.app')

@section('title', 'Our Work — Divine Dev Hub')
@section('description', 'A sample of what we\'ve built — projects across travel, agriculture, healthcare, fintech, HR and education.')

@section('content')

    <x-breadcrumb :items="[['label' => 'Our Work']]" />

    <x-page-hero
        eyebrow="Featured Work"
        title="A sample of what we've built"
        description="A cross-section of projects from our portfolio."
    />

    <section class="py-16 sm:py-20">
        <div class="page-container grid gap-5 lg:grid-cols-3 lg:grid-rows-2">
            @foreach ($projects as $project)
                <div class="{{ $project['featured'] ?? false ? 'lg:col-span-2 lg:row-span-2' : '' }}">
                    <a href="{{ route('work.show', $project['slug']) }}" class="block h-full">
                        <x-project-card
                            :title="$project['title']"
                            :category="$project['category']"
                            :image="asset('images/projects/' . $project['image'])"
                            :featured="$project['featured'] ?? false"
                        />
                    </a>
                </div>
            @endforeach
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
