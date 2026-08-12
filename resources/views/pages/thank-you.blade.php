@extends('layouts.app')

@section('title', 'Thank You — Divine Dev Hub')
@section('description', 'Thanks for reaching out to Divine Dev Hub — we\'ll be in touch soon.')

@section('content')

    <section class="flex min-h-[60vh] items-center justify-center py-24">
        <div class="page-container max-w-lg text-center">
            <span class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl bg-success/10 text-success">
                <x-svg-icon name="check-circle" class="h-8 w-8" />
            </span>
            <h1 class="mt-6 text-3xl font-semibold tracking-tight text-text-primary sm:text-4xl">Message sent</h1>
            <p class="mt-4 text-base leading-relaxed text-text-secondary">
                Thanks for reaching out — we've received your message and will follow up at the email address you provided.
            </p>
            <div class="mt-8 flex flex-wrap items-center justify-center gap-4">
                <x-button href="{{ route('home') }}">Back to Home</x-button>
                <x-button href="{{ route('work.index') }}" variant="secondary">View Our Work</x-button>
            </div>
        </div>
    </section>

@endsection
