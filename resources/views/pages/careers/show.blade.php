@extends('layouts.app')

@section('title', $job['title'] . ' — Careers — Divine Dev Hub')
@section('description', $job['description'])

@section('content')

    <x-breadcrumb :items="[['label' => 'Careers', 'href' => route('careers.index')], ['label' => $job['title']]]" />

    <x-page-hero
        eyebrow="{{ $job['location'] }} · {{ $job['type'] }}"
        :title="$job['title']"
    />

    <section class="py-16 sm:py-20">
        <div class="page-container max-w-2xl">
            <p class="text-base leading-relaxed text-text-secondary">{{ $job['description'] }}</p>

            <div class="mt-10">
                <x-button href="mailto:{{ config('company.email') }}?subject=Application: {{ $job['title'] }}">
                    Apply for This Role
                </x-button>
            </div>
        </div>
    </section>

@endsection
