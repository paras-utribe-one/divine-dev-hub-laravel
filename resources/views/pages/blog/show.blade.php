@extends('layouts.app')

@section('title', $post['title'] . ' — Divine Dev Hub Blog')
@section('description', $post['excerpt'])

@section('content')

    <x-breadcrumb :items="[['label' => 'Blog', 'href' => route('blog.index')], ['label' => $post['title']]]" />

    <x-page-hero
        :eyebrow="$post['category'] . ' · ' . $post['date']"
        :title="$post['title']"
    />

    <section class="py-16 sm:py-20">
        <div class="page-container max-w-2xl">
            <div class="mb-8 flex items-center gap-3 rounded-xl border border-dashed border-accent/50 bg-accent/5 px-5 py-4 text-sm text-text-secondary">
                <x-placeholder-tag class="shrink-0" />
                <span>This is fictional sample content for design review only — not a real published post.</span>
            </div>

            <p class="text-base leading-relaxed text-text-secondary">{{ $post['excerpt'] }}</p>
        </div>
    </section>

@endsection
