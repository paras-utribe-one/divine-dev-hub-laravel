@extends('layouts.app')

@section('title', 'Careers — Divine Dev Hub')
@section('description', 'Open roles at Divine Dev Hub.')

@section('content')

    <x-breadcrumb :items="[['label' => 'Careers']]" />

    <x-page-hero
        eyebrow="Careers"
        title="Build with a team that ships"
        description="We're a 50+ person engineering team working across web, mobile, CRM, e-commerce and platform specializations."
    />

    <section class="py-16 sm:py-20">
        <div class="page-container">
            @if (count($jobs))
                <div class="space-y-4">
                    @foreach ($jobs as $job)
                        <x-job-card
                            :title="$job['title']"
                            :location="$job['location']"
                            :type="$job['type']"
                            :href="route('careers.show', $job['slug'])"
                        />
                    @endforeach
                </div>
            @else
                <x-empty-state
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

@endsection
