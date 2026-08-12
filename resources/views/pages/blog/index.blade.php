@extends('layouts.app')

@section('title', 'Blog — Divine Dev Hub')
@section('description', 'Engineering notes and updates from the Divine Dev Hub team.')

@section('content')

    <x-breadcrumb :items="[['label' => 'Blog']]" />

    <x-page-hero
        eyebrow="Insights"
        title="From the blog"
        description="Notes from the team on what we're building and how."
    />

    <section class="py-16 sm:py-20">
        <div class="page-container">
            @if (count($posts))
                <div class="grid gap-6 lg:grid-cols-2">
                    @foreach ($posts as $post)
                        <x-blog-card
                            :href="route('blog.show', $post['slug'])"
                            :image="asset('images/blog/' . $post['image'])"
                            :category="$post['category']"
                            :date="$post['date']"
                            :title="$post['title']"
                            :excerpt="$post['excerpt']"
                        />
                    @endforeach
                </div>
            @else
                <x-empty-state
                    icon="layers"
                    title="The blog is just getting started"
                    description="We're working on our first posts. In the meantime, take a look at the work we've delivered."
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
