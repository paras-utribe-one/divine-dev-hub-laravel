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
            <p class="text-base leading-relaxed text-text-secondary">{{ $post['excerpt'] }}</p>
        </div>
    </section>

@endsection
