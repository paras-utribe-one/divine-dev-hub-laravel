@extends('layouts.app')

@section('title', 'Sitemap — Divine Dev Hub')
@section('description', 'Every page on the Divine Dev Hub website.')

@section('content')

    <x-breadcrumb :items="[['label' => 'Sitemap']]" />

    <x-page-hero eyebrow="Sitemap" title="Every page on this site" />

    <section class="py-16 sm:py-20">
        <div class="page-container grid gap-10 sm:grid-cols-2 lg:grid-cols-4">
            <div>
                <h2 class="text-xs font-semibold uppercase tracking-wide text-text-secondary">Company</h2>
                <ul class="mt-4 space-y-3 text-sm">
                    <li><a href="{{ route('home') }}" class="text-text-secondary hover:text-primary">Home</a></li>
                    <li><a href="{{ route('about') }}" class="text-text-secondary hover:text-primary">About</a></li>
                    <li><a href="{{ route('careers.index') }}" class="text-text-secondary hover:text-primary">Careers</a></li>
                    <li><a href="{{ route('testimonials') }}" class="text-text-secondary hover:text-primary">Testimonials</a></li>
                    <li><a href="{{ route('contact.show') }}" class="text-text-secondary hover:text-primary">Contact</a></li>
                    <li><a href="{{ route('faqs') }}" class="text-text-secondary hover:text-primary">FAQs</a></li>
                    <li><a href="{{ route('blog.index') }}" class="text-text-secondary hover:text-primary">Blog</a></li>
                </ul>
            </div>

            <div>
                <h2 class="text-xs font-semibold uppercase tracking-wide text-text-secondary">Services</h2>
                <ul class="mt-4 space-y-3 text-sm">
                    <li><a href="{{ route('services.index') }}" class="text-text-secondary hover:text-primary">All Services</a></li>
                    @foreach ($services as $service)
                        <li><a href="{{ route('services.show', $service['slug']) }}" class="text-text-secondary hover:text-primary">{{ $service['title'] }}</a></li>
                    @endforeach
                </ul>
            </div>

            <div>
                <h2 class="text-xs font-semibold uppercase tracking-wide text-text-secondary">Industries &amp; Technologies</h2>
                <ul class="mt-4 space-y-3 text-sm">
                    <li><a href="{{ route('industries.index') }}" class="text-text-secondary hover:text-primary">All Industries</a></li>
                    @foreach ($industries as $industry)
                        <li><a href="{{ route('industries.show', $industry['slug']) }}" class="text-text-secondary hover:text-primary">{{ $industry['label'] }}</a></li>
                    @endforeach
                    <li class="pt-2"><a href="{{ route('technologies.index') }}" class="text-text-secondary hover:text-primary">All Technologies</a></li>
                    @foreach ($technologies as $technology)
                        <li><a href="{{ route('technologies.show', $technology['slug']) }}" class="text-text-secondary hover:text-primary">{{ $technology['name'] }}</a></li>
                    @endforeach
                </ul>
            </div>

            <div>
                <h2 class="text-xs font-semibold uppercase tracking-wide text-text-secondary">Our Work</h2>
                <ul class="mt-4 space-y-3 text-sm">
                    <li><a href="{{ route('work.index') }}" class="text-text-secondary hover:text-primary">All Projects</a></li>
                    @foreach ($projects as $project)
                        <li><a href="{{ route('work.show', $project['slug']) }}" class="text-text-secondary hover:text-primary">{{ $project['title'] }}</a></li>
                    @endforeach
                </ul>

                <h2 class="mt-8 text-xs font-semibold uppercase tracking-wide text-text-secondary">Legal</h2>
                <ul class="mt-4 space-y-3 text-sm">
                    <li><a href="{{ route('privacy-policy') }}" class="text-text-secondary hover:text-primary">Privacy Policy</a></li>
                    <li><a href="{{ route('terms-conditions') }}" class="text-text-secondary hover:text-primary">Terms &amp; Conditions</a></li>
                </ul>
            </div>
        </div>
    </section>

@endsection
