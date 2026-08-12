@extends('layouts.app')

@section('title', 'Client Testimonials — Divine Dev Hub')
@section('description', 'What it\'s like to work with Divine Dev Hub, in our clients\' own words.')

@section('content')

    <x-breadcrumb :items="[['label' => 'Testimonials']]" />

    <x-page-hero
        eyebrow="Client Voices"
        title="What it's actually like to work with us"
    />

    <section class="py-20 sm:py-28">
        <div class="page-container">
            @if (count($testimonials))
                <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach ($testimonials as $testimonial)
                        <x-testimonial-card
                            :quote="$testimonial['quote']"
                            :name="$testimonial['name']"
                            :role="$testimonial['role']"
                            :company="$testimonial['company']"
                        />
                    @endforeach
                </div>
            @else
                <x-empty-state
                    icon="message"
                    title="Client testimonials are on the way"
                    description="We're collecting written, attributed feedback from recent clients. In the meantime, take a look at the work we've delivered."
                >
                    <a href="{{ route('work.index') }}" class="mt-6 inline-flex items-center gap-1.5 text-sm font-semibold text-primary">
                        View Our Work
                        <x-svg-icon name="arrow-right" class="h-4 w-4" />
                    </a>
                </x-empty-state>
            @endif
        </div>
    </section>

@endsection
