@extends('layouts.app')

@section('title', 'FAQs — Divine Dev Hub')
@section('description', 'Straight answers to the questions we get asked most often about working with Divine Dev Hub.')

@section('content')

    <x-breadcrumb :items="[['label' => 'FAQs']]" />

    <x-page-hero
        eyebrow="FAQ"
        title="Common questions"
        description="Straight answers to what we're asked most often. Can't find what you're looking for? Get in touch."
    />

    <section class="py-20 sm:py-28">
        <div class="page-container max-w-3xl space-y-12">
            @foreach ($faqGroups as $group => $items)
                <div data-reveal style="--reveal-delay: {{ $loop->index * 100 }}ms">
                    <h2 class="text-xl font-semibold text-text-primary">{{ $group }}</h2>
                    <div class="mt-5 space-y-4">
                        @foreach ($items as $item)
                            <x-faq-item :question="$item['question']">
                                {{ $item['answer'] }}
                            </x-faq-item>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <section class="bg-surface py-20 sm:py-28">
        <div data-reveal-scale class="page-container">
            <x-cta-banner
                title="Still have a question?"
                description="Ask us directly — we'll follow up at info@divinedevhub.in with next steps."
                ctaLabel="Ask Us Directly"
                :ctaHref="route('contact.show')"
            />
        </div>
    </section>

@endsection
