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
                <div data-reveal class="mb-10 rounded-xl border border-dashed border-accent/50 bg-accent/5 px-5 py-4 text-sm leading-relaxed text-text-secondary">
                    <strong class="text-text-primary">Placeholder data — design review only.</strong>
                    Every quote, name and company below is fictional sample content added to review this page's populated layout. See <code class="text-xs">docs/build-log.md</code>.
                </div>

                <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach ($testimonials as $i => $testimonial)
                        <x-testimonial-card
                            :quote="$testimonial['quote']"
                            :name="$testimonial['name']"
                            :role="$testimonial['role']"
                            :company="$testimonial['company']"
                            placeholder
                            data-reveal
                            :style="'--reveal-delay: ' . ($i * 60) . 'ms'"
                        />
                    @endforeach
                </div>
            @else
                <x-empty-state
                    data-reveal
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
