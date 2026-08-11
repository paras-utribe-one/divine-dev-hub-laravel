@extends('layouts.app')

@section('title', 'Divine Dev Hub — Software Development & Digital Engineering')
@section('description', 'Divine Dev Hub designs and builds cloud-native applications, AI-driven solutions and modern e-commerce platforms — end-to-end, from strategy to launch.')

@php
    $services = [
        ['title' => 'Web Development', 'icon' => 'code', 'description' => 'Full-stack web development — offering customized solutions from design to deployment and security.'],
        ['title' => 'Software Services', 'icon' => 'layers', 'description' => 'Comprehensive software services: development, integration and customization for diverse business needs.'],
        ['title' => 'CRM Solutions', 'icon' => 'users', 'description' => 'Custom CRM solutions that streamline operations, strengthen customer relationships and maximize efficiency.'],
        ['title' => 'App Development', 'icon' => 'smartphone', 'description' => 'Expert mobile app development — from concept to launch, ensuring seamless user experiences.'],
        ['title' => 'E-Commerce', 'icon' => 'cart', 'description' => 'Tailored e-commerce solutions: design, development and optimization for online business growth.'],
        ['title' => 'Odoo Services', 'icon' => 'database', 'description' => "Odoo is a powerful, open-source ERP suite we implement and customize to streamline business operations."],
        ['title' => 'Magento Services', 'icon' => 'cloud', 'description' => 'Magento is a robust, flexible open-source e-commerce platform we use to build and manage online stores.'],
    ];

    $techCategories = [
        ['label' => 'Frontend', 'icon' => 'monitor', 'items' => ['React', 'Alpine.js', 'Tailwind CSS']],
        ['label' => 'Backend', 'icon' => 'server', 'items' => ['Laravel', 'Node.js', 'PHP']],
        ['label' => 'Mobile', 'icon' => 'smartphone', 'items' => ['Flutter', 'React Native']],
        ['label' => 'Cloud & DevOps', 'icon' => 'cloud', 'items' => ['AWS', 'Docker', 'CI/CD']],
        ['label' => 'Platforms', 'icon' => 'cpu', 'items' => ['Odoo', 'Magento']],
    ];

    $industries = [
        ['label' => 'Travel & Hospitality', 'icon' => 'plane', 'description' => 'Booking, itinerary and guest-experience platforms.', 'featured' => true, 'related' => 'Show Me Around'],
        ['label' => 'Agriculture & E-Commerce', 'icon' => 'sprout', 'description' => 'Marketplaces connecting growers and buyers.'],
        ['label' => 'Healthcare & Telemedicine', 'icon' => 'heart-pulse', 'description' => 'Remote-care and clinical workflow platforms.'],
        ['label' => 'FinTech & Trading', 'icon' => 'line-chart', 'description' => 'AI-assisted trading and market tooling.'],
        ['label' => 'Education', 'icon' => 'graduation-cap', 'description' => 'School and institution management systems.'],
        ['label' => 'Logistics & On-Demand', 'icon' => 'truck', 'description' => 'Delivery, freelancing and on-demand marketplaces.'],
    ];

    $benefits = [
        ['title' => 'Engineering Quality', 'icon' => 'shield', 'description' => 'Clean, maintainable code and sensible architecture from day one — built to be extended, not rewritten.'],
        ['title' => 'Clear Communication', 'icon' => 'message', 'description' => 'Direct access to the people building your product, with regular, plain-language progress updates.'],
        ['title' => 'Scalable Architecture', 'icon' => 'trending-up', 'description' => 'Systems designed to handle growth in users, data and features without a costly rebuild.'],
        ['title' => 'Business-Focused Delivery', 'icon' => 'target', 'description' => 'Every technical decision is weighed against the business outcome it needs to support.'],
    ];

    $processSteps = [
        ['number' => '01', 'title' => 'Discovery', 'icon' => 'search', 'description' => 'Understanding your goals, users and constraints before writing a line of code.'],
        ['number' => '02', 'title' => 'Strategy', 'icon' => 'compass', 'description' => 'Defining scope, architecture and success metrics for the engagement.'],
        ['number' => '03', 'title' => 'Design', 'icon' => 'pen', 'description' => 'Translating requirements into clear, usable interfaces and flows.'],
        ['number' => '04', 'title' => 'Development', 'icon' => 'code', 'description' => 'Building in focused iterations, with regular check-ins along the way.'],
        ['number' => '05', 'title' => 'Testing', 'icon' => 'check-circle', 'description' => 'Verifying functionality, performance and security before release.'],
        ['number' => '06', 'title' => 'Launch', 'icon' => 'rocket', 'description' => 'Deploying to production with a clear rollout and rollback plan.'],
        ['number' => '07', 'title' => 'Support', 'icon' => 'life-buoy', 'description' => 'Ongoing monitoring, fixes and enhancements after go-live.'],
    ];

    $projects = [
        ['title' => 'Show Me Around', 'category' => 'Travel Platform', 'image' => 'show-me-around.webp', 'featured' => true],
        ['title' => 'Agripari', 'category' => 'Agricultural E-Commerce', 'image' => 'agripari.webp'],
        ['title' => 'Live Medical Service', 'category' => 'Telemedicine Platform', 'image' => 'live-medical-service.webp'],
        ['title' => 'Stock Market Service', 'category' => 'AI-Powered Trading Software', 'image' => 'stock-market-service.webp'],
        ['title' => 'QuickClock', 'category' => 'HRMS', 'image' => 'quickclock.webp'],
        ['title' => 'School Management', 'category' => 'School Management System', 'image' => 'school-management.webp'],
    ];
@endphp

@section('content')

    {{-- Hero --}}
    <section class="relative overflow-hidden bg-surface pb-20 pt-32 sm:pb-28 sm:pt-40" aria-labelledby="hero-heading">
        <div class="pointer-events-none absolute inset-0 -z-10" aria-hidden="true">
            <div class="absolute -top-24 right-0 h-96 w-96 rounded-full bg-primary/10 blur-3xl animate-float-slow"></div>
            <div class="absolute bottom-0 left-0 h-72 w-72 rounded-full bg-accent/10 blur-3xl"></div>
            <div class="absolute inset-0 bg-dot-grid text-primary/10"></div>
        </div>

        <div class="page-container grid gap-16 lg:grid-cols-2 lg:items-center">
            <div class="max-w-3xl">
                <p data-reveal style="--reveal-delay:0ms" class="inline-flex items-center gap-2 text-sm font-semibold uppercase tracking-wide text-primary">
                    <span class="h-1.5 w-1.5 rounded-full bg-primary"></span>
                    Software Engineering Partner
                </p>

                <h1 id="hero-heading" data-reveal style="--reveal-delay:90ms" class="mt-5 text-4xl font-semibold tracking-tight text-text-primary sm:text-5xl lg:text-[3.5rem] lg:leading-[1.08]">
                    Engineering Software That Turns Ideas Into Digital Reality
                </h1>

                <p data-reveal style="--reveal-delay:180ms" class="mt-6 max-w-xl text-lg leading-relaxed text-text-secondary">
                    Divine Dev Hub designs and builds cloud-native applications, AI-driven solutions and modern e-commerce platforms for businesses ready to scale — end-to-end, from strategy to launch.
                </p>

                <div data-reveal style="--reveal-delay:270ms" class="mt-9 flex flex-wrap items-center gap-4">
                    <x-button href="#contact" class="group">
                        Start a Project
                        <x-svg-icon name="arrow-right" class="h-4 w-4 transition-transform duration-200 group-hover:translate-x-0.5" />
                    </x-button>
                    <x-button href="#portfolio" variant="secondary">View Our Work</x-button>
                </div>

                <p data-reveal style="--reveal-delay:340ms" class="mt-8 inline-flex items-center gap-2 text-xs font-medium text-text-secondary">
                    <span class="flex h-1.5 w-1.5 rounded-full bg-success"></span>
                    Trusted by 510+ clients since 2014
                </p>
            </div>

            <div data-reveal-scale style="--reveal-delay:220ms" class="relative hidden aspect-square max-w-md justify-self-center lg:block" aria-hidden="true">
                <div class="absolute inset-10 rounded-full border border-primary/10"></div>
                <div class="absolute inset-20 rounded-full border border-primary/10"></div>

                <div class="absolute left-1/2 top-1/2 w-72 -translate-x-1/2 -translate-y-1/2 overflow-hidden rounded-2xl border border-border bg-white shadow-2xl shadow-secondary/10">
                    <div class="flex items-center gap-1.5 border-b border-border bg-surface px-4 py-3">
                        <span class="h-2.5 w-2.5 rounded-full bg-accent/70"></span>
                        <span class="h-2.5 w-2.5 rounded-full bg-primary/40"></span>
                        <span class="h-2.5 w-2.5 rounded-full bg-border"></span>
                        <span class="ml-2 h-2 w-24 rounded-full bg-border/80"></span>
                    </div>
                    <div class="space-y-5 p-5">
                        <div class="flex items-end gap-2 h-20">
                            <span class="w-3 rounded-t bg-primary/20" style="height: 45%"></span>
                            <span class="w-3 rounded-t bg-primary/20" style="height: 70%"></span>
                            <span class="w-3 rounded-t bg-primary" style="height: 100%"></span>
                            <span class="w-3 rounded-t bg-primary/20" style="height: 55%"></span>
                            <span class="w-3 rounded-t bg-primary/30" style="height: 80%"></span>
                            <span class="w-3 rounded-t bg-primary/20" style="height: 35%"></span>
                        </div>
                        <div class="space-y-2">
                            <div class="h-2 w-full rounded-full bg-surface"></div>
                            <div class="h-2 w-4/5 rounded-full bg-surface"></div>
                            <div class="h-2 w-2/3 rounded-full bg-primary/15"></div>
                        </div>
                    </div>
                </div>

                <div class="animate-float-slow absolute -right-2 top-4 w-48 rounded-2xl border border-border bg-secondary p-4 shadow-xl">
                    <div class="flex items-center gap-2">
                        <span class="relative flex h-2.5 w-2.5">
                            <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-accent opacity-75"></span>
                            <span class="relative inline-flex h-2.5 w-2.5 rounded-full bg-accent"></span>
                        </span>
                        <p class="text-xs font-semibold uppercase tracking-wide text-white/70">Deployed &amp; Live</p>
                    </div>
                </div>

                <div class="animate-float-slow absolute -left-6 bottom-2 flex items-center gap-2 rounded-full border border-dashed border-primary/30 bg-white px-4 py-2 shadow-lg" style="animation-delay: 1.2s;">
                    <x-svg-icon name="cloud" class="h-4 w-4 text-primary" />
                    <span class="text-xs font-semibold text-text-primary">Cloud-Native Architecture</span>
                </div>
            </div>
        </div>
    </section>

    {{-- Trust / Achievements --}}
    <section class="relative overflow-hidden bg-secondary py-14" aria-labelledby="stats-heading">
        <div class="pointer-events-none absolute inset-x-0 top-0 h-px bg-linear-to-r from-transparent via-primary-light/60 to-transparent" aria-hidden="true"></div>
        <div class="pointer-events-none absolute inset-x-0 bottom-0 h-px bg-linear-to-r from-transparent via-accent/40 to-transparent" aria-hidden="true"></div>
        <h2 id="stats-heading" class="sr-only">Divine Dev Hub in numbers</h2>
        <div data-reveal class="page-container grid grid-cols-2 gap-y-8 sm:grid-cols-4 sm:divide-x sm:divide-white/10">
            <x-stat-item value="12+" label="Years in Business" icon="compass" />
            <x-stat-item value="540+" label="Projects Delivered" icon="rocket" />
            <x-stat-item value="510+" label="Happy Clients" icon="users" />
            <x-stat-item value="50+" label="Skilled Experts" icon="cpu" />
        </div>
    </section>

    {{-- Company Introduction --}}
    <section id="about" class="scroll-mt-24 py-24 sm:py-32" aria-labelledby="about-heading">
        <div class="page-container grid gap-14 lg:grid-cols-12 lg:gap-8">
            <div data-reveal class="lg:col-span-5">
                <p class="text-sm font-semibold uppercase tracking-wide text-primary">About Divine Dev Hub</p>
                <p id="about-heading" class="mt-5 text-2xl font-semibold leading-snug tracking-tight text-text-primary sm:text-3xl">
                    &ldquo;Evolved from a visionary startup into a trusted leader in IT solutions.&rdquo;
                </p>

                <div class="mt-10 flex items-center gap-6">
                    <div class="relative flex flex-col items-center">
                        <span class="flex h-3 w-3 rounded-full border-2 border-primary bg-white"></span>
                        <span class="mt-1 h-14 w-px bg-border"></span>
                        <span class="mt-1 flex h-3 w-3 rounded-full bg-primary"></span>
                    </div>
                    <div class="space-y-8 text-sm">
                        <div>
                            <p class="font-semibold text-text-primary">2014</p>
                            <p class="text-text-secondary">Founded in Ahmedabad, India</p>
                        </div>
                        <div>
                            <p class="font-semibold text-text-primary">Today</p>
                            <p class="text-text-secondary">12+ years, clients worldwide</p>
                        </div>
                    </div>
                </div>
            </div>

            <div data-reveal style="--reveal-delay:120ms" class="lg:col-span-7">
                <p class="text-lg leading-relaxed text-text-secondary">
                    Established in 2014, Divine Dev Hub delivers high-performance software development, e-commerce platforms, enterprise-grade security and CRM systems to businesses worldwide. We've helped emerging startups and established enterprises alike build scalable, future-ready technology — with every engagement scoped around measurable business outcomes, not just feature delivery.
                </p>

                <dl class="mt-10 grid grid-cols-3 gap-4 border-t border-border pt-8">
                    <div>
                        <dt class="flex items-center gap-2 text-xs font-medium uppercase tracking-wide text-text-secondary">
                            <x-svg-icon name="rocket" class="h-3.5 w-3.5 text-primary" /> Projects
                        </dt>
                        <dd class="mt-2 text-2xl font-semibold text-text-primary">540+</dd>
                    </div>
                    <div>
                        <dt class="flex items-center gap-2 text-xs font-medium uppercase tracking-wide text-text-secondary">
                            <x-svg-icon name="cpu" class="h-3.5 w-3.5 text-primary" /> Experts
                        </dt>
                        <dd class="mt-2 text-2xl font-semibold text-text-primary">50+</dd>
                    </div>
                    <div>
                        <dt class="flex items-center gap-2 text-xs font-medium uppercase tracking-wide text-text-secondary">
                            <x-svg-icon name="shield" class="h-3.5 w-3.5 text-primary" /> Awards
                        </dt>
                        <dd class="mt-2 text-2xl font-semibold text-text-primary">12+</dd>
                    </div>
                </dl>
            </div>
        </div>
    </section>

    {{-- Services --}}
    <section id="services" class="scroll-mt-24 bg-surface py-24 sm:py-32" aria-labelledby="services-heading">
        <div class="page-container">
            <x-section-heading
                id="services-heading"
                eyebrow="What We Do"
                title="Services built around your roadmap"
                description="From first release to long-term platform growth, our teams cover the full software lifecycle."
                align="center"
                data-reveal
            />

            <div x-data="{ active: 0 }" class="mt-14 grid gap-4 lg:grid-cols-[22rem_1fr] lg:gap-10">
                <div data-reveal style="--reveal-delay:80ms" class="flex flex-col overflow-hidden rounded-2xl border border-border bg-white lg:border-0 lg:bg-transparent">
                    @foreach ($services as $i => $service)
                        <button
                            type="button"
                            @click="active = {{ $i }}"
                            @mouseenter="active = {{ $i }}"
                            class="flex items-center gap-4 border-b border-border px-5 py-4 text-left transition last:border-b-0 lg:rounded-xl lg:border lg:px-5 lg:py-4"
                            :class="active === {{ $i }} ? 'lg:border-primary/20 lg:bg-white lg:shadow-lg lg:shadow-secondary/5' : 'lg:border-transparent'"
                        >
                            <span class="text-xs font-semibold tabular-nums" :class="active === {{ $i }} ? 'text-primary' : 'text-muted'">0{{ $i + 1 }}</span>
                            <span class="flex-1 text-sm font-semibold" :class="active === {{ $i }} ? 'text-primary' : 'text-text-primary'">{{ $service['title'] }}</span>
                            <x-svg-icon
                                name="arrow-right"
                                class="h-4 w-4 shrink-0 text-primary transition-all duration-200"
                                x-bind:class="active === {{ $i }} ? 'translate-x-0 opacity-100' : '-translate-x-1 opacity-0'"
                            />
                        </button>
                    @endforeach
                </div>

                <div data-reveal style="--reveal-delay:160ms" class="relative overflow-hidden rounded-3xl border border-border bg-white p-8 sm:p-10">
                    <div class="pointer-events-none absolute -right-10 -top-10 h-48 w-48 rounded-full bg-primary/5 blur-2xl" aria-hidden="true"></div>
                    @foreach ($services as $i => $service)
                        <div x-show="active === {{ $i }}" @if ($i > 0) style="display:none;" @endif
                            x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 translate-y-2"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            class="relative"
                        >
                            <span class="flex h-14 w-14 items-center justify-center rounded-2xl bg-primary-50 text-primary">
                                <x-svg-icon :name="$service['icon']" class="h-7 w-7" />
                            </span>
                            <h3 class="mt-6 text-2xl font-semibold text-text-primary">{{ $service['title'] }}</h3>
                            <p class="mt-3 max-w-lg text-base leading-relaxed text-text-secondary">{{ $service['description'] }}</p>
                            <a href="#contact" class="mt-7 inline-flex items-center gap-1.5 text-sm font-semibold text-primary">
                                Discuss this service
                                <x-svg-icon name="arrow-right" class="h-4 w-4" />
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- Technology Expertise --}}
    <section id="technologies" class="scroll-mt-24 py-24 sm:py-32" aria-labelledby="technologies-heading">
        <div class="page-container">
            <x-section-heading
                id="technologies-heading"
                eyebrow="Technology Expertise"
                title="A modern, pragmatic technology stack"
                description="We pick the right tool for the job across the categories our projects most often call for."
                align="center"
                data-reveal
            />

            <div data-reveal style="--reveal-delay:100ms" class="mt-14 overflow-hidden rounded-3xl border border-border">
                @foreach ($techCategories as $category)
                    <div class="grid gap-4 border-b border-border bg-white p-6 last:border-b-0 sm:grid-cols-[13rem_1fr] sm:items-center sm:p-8">
                        <div class="flex items-center gap-3">
                            <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-primary-50 text-primary">
                                <x-svg-icon :name="$category['icon']" class="h-5 w-5" />
                            </span>
                            <span class="font-semibold text-text-primary">{{ $category['label'] }}</span>
                        </div>
                        <div class="flex flex-wrap gap-2">
                            @foreach ($category['items'] as $item)
                                <span class="rounded-full border border-border px-3.5 py-1.5 text-sm text-text-secondary">{{ $item }}</span>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Industries --}}
    <section id="industries" class="scroll-mt-24 bg-surface py-24 sm:py-32" aria-labelledby="industries-heading">
        <div class="page-container">
            <x-section-heading
                id="industries-heading"
                eyebrow="Industries"
                title="Industries we've delivered for"
                description="A cross-section of the sectors represented in our project portfolio."
                align="center"
                data-reveal
            />

            <div class="mt-14 grid gap-4 sm:grid-cols-2 lg:grid-cols-3 lg:grid-rows-3">
                @foreach ($industries as $i => $industry)
                    <div
                        data-reveal
                        style="--reveal-delay: {{ $i * 70 }}ms"
                        class="group relative overflow-hidden rounded-2xl bg-secondary p-6 {{ $industry['featured'] ?? false ? 'sm:col-span-2 lg:col-span-2 lg:row-span-2' : '' }}"
                    >
                        <x-svg-icon
                            :name="$industry['icon']"
                            class="pointer-events-none absolute text-white/5 transition-transform duration-500 group-hover:scale-105 {{ $industry['featured'] ?? false ? '-right-10 -bottom-10 h-64 w-64' : '-right-4 -top-4 h-28 w-28' }}"
                        />
                        <div class="relative flex h-full flex-col justify-between {{ $industry['featured'] ?? false ? 'min-h-56' : 'min-h-36' }}">
                            <span class="flex h-11 w-11 items-center justify-center rounded-xl border border-white/15 bg-white/5 text-accent">
                                <x-svg-icon :name="$industry['icon']" class="h-5 w-5" />
                            </span>

                            @if (($industry['featured'] ?? false) && isset($industry['related']))
                                <a href="#portfolio" class="group/related inline-flex w-fit items-center gap-2 rounded-full border border-dashed border-white/20 bg-white/5 px-4 py-2 text-xs font-medium text-white/70 transition hover:border-accent/50 hover:text-white">
                                    <x-svg-icon name="arrow-up-right" class="h-3.5 w-3.5 text-accent transition-transform duration-200 group-hover/related:translate-x-0.5 group-hover/related:-translate-y-0.5" />
                                    Featured project: {{ $industry['related'] }}
                                </a>
                            @endif

                            <div>
                                <p class="font-semibold text-white {{ $industry['featured'] ?? false ? 'text-xl' : 'text-base' }}">{{ $industry['label'] }}</p>
                                <p class="mt-1.5 text-sm leading-relaxed text-white/55">{{ $industry['description'] }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Why Choose Us --}}
    <section class="py-24 sm:py-32" aria-labelledby="why-heading">
        <div class="page-container grid gap-14 lg:grid-cols-12 lg:gap-8">
            <div data-reveal class="lg:col-span-5 lg:flex lg:h-full lg:flex-col lg:justify-center">
                <p class="text-sm font-semibold uppercase tracking-wide text-primary">Why Choose Divine Dev Hub</p>
                <h2 id="why-heading" class="mt-4 text-3xl font-semibold tracking-tight text-text-primary sm:text-4xl">
                    Engineering quality, without the overhead
                </h2>
                <p class="mt-5 max-w-md text-base leading-relaxed text-text-secondary">
                    We keep teams small, communication direct and architecture honest — so the software we build keeps earning its value long after launch.
                </p>
                <a href="#process" class="mt-8 inline-flex items-center gap-1.5 text-sm font-semibold text-primary">
                    See how we work
                    <x-svg-icon name="arrow-right" class="h-4 w-4" />
                </a>
            </div>

            <div class="lg:col-span-7">
                <div class="divide-y divide-border border-t border-border">
                    @foreach ($benefits as $i => $benefit)
                        <div data-reveal style="--reveal-delay: {{ $i * 80 }}ms" class="group flex items-start gap-5 py-7 transition-transform duration-300 hover:translate-x-1.5">
                            <span class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-primary-50 text-primary transition-colors group-hover:bg-primary group-hover:text-white">
                                <x-svg-icon :name="$benefit['icon']" class="h-5 w-5" />
                            </span>
                            <div>
                                <h3 class="text-base font-semibold text-text-primary">{{ $benefit['title'] }}</h3>
                                <p class="mt-1.5 text-sm leading-relaxed text-text-secondary">{{ $benefit['description'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- Development Process --}}
    <section id="process" class="scroll-mt-24 bg-surface py-24 sm:py-32" aria-labelledby="process-heading">
        <div class="page-container">
            <x-section-heading
                id="process-heading"
                eyebrow="Our Process"
                title="A transparent path from idea to launch"
                align="center"
                data-reveal
            />

            <div class="relative mt-16">
                <div class="absolute inset-x-0 top-6 hidden h-px bg-border lg:block" aria-hidden="true"></div>
                <div class="grid gap-10 lg:grid-cols-7 lg:gap-4">
                    @foreach ($processSteps as $i => $step)
                        <div data-reveal style="--reveal-delay: {{ $i * 70 }}ms">
                            <x-process-step
                                :number="$step['number']"
                                :title="$step['title']"
                                :description="$step['description']"
                                :last="$loop->last"
                            />
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- Featured Portfolio --}}
    <section id="portfolio" class="scroll-mt-24 py-24 sm:py-32" aria-labelledby="portfolio-heading">
        <div class="page-container">
            <x-section-heading
                id="portfolio-heading"
                eyebrow="Featured Work"
                title="A sample of what we've built"
                description="A cross-section of projects from our portfolio."
                align="center"
                data-reveal
            />

            <div class="mt-14 grid gap-5 lg:grid-cols-3 lg:grid-rows-2">
                @foreach ($projects as $i => $project)
                    <div data-reveal style="--reveal-delay: {{ $i * 60 }}ms" class="{{ $project['featured'] ?? false ? 'lg:col-span-2 lg:row-span-2' : '' }}">
                        <x-project-card
                            :title="$project['title']"
                            :category="$project['category']"
                            :image="asset('images/projects/' . $project['image'])"
                            :featured="$project['featured'] ?? false"
                        />
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Blog / Insights --}}
    <section id="blog" class="scroll-mt-24 bg-surface py-24 sm:py-32" aria-labelledby="blog-heading">
        <div class="page-container">
            <x-section-heading
                id="blog-heading"
                eyebrow="Insights"
                title="From the blog"
                align="center"
                data-reveal
            />

            <div class="mt-14 space-y-6">
                <div data-reveal>
                    <x-blog-card
                        href="https://divinedevhub.in/2025/06/16/ai-in-business-development-role/"
                        image="https://picsum.photos/seed/divine-dev-hub-ai-business/1200/750"
                        category="AI & Business"
                        date="Jun 16, 2025"
                        title="Best AI in Business Development Manager"
                        excerpt="How AI-assisted tooling is reshaping the business development role for software teams."
                        featured
                    />
                </div>
                <div data-reveal style="--reveal-delay:100ms" class="mx-auto max-w-2xl">
                    <x-blog-card
                        href="https://divinedevhub.in/2025/06/12/ai-in-it-business-development/"
                        image="https://picsum.photos/seed/divine-dev-hub-it-outsourcing/1200/750"
                        category="AI & Business"
                        date="Jun 12, 2025"
                        title="AI in IT Business Development: 6"
                        excerpt="Practical ways IT teams are applying AI across the business development pipeline."
                    />
                </div>
            </div>
        </div>
    </section>

    {{-- FAQ --}}
    <section id="faq" class="scroll-mt-24 py-24 sm:py-32" aria-labelledby="faq-heading">
        <div class="page-container max-w-3xl">
            <x-section-heading
                id="faq-heading"
                eyebrow="FAQ"
                title="Common questions"
                align="center"
                data-reveal
            />

            <div class="mt-10 space-y-4">
                <div data-reveal>
                    <x-faq-item question="What services does Divine Dev Hub offer?">
                        We provide web development, custom software, CRM solutions, mobile app development, e-commerce builds, and Odoo and Magento implementations.
                    </x-faq-item>
                </div>
                <div data-reveal style="--reveal-delay:60ms">
                    <x-faq-item question="Do you work with startups as well as established businesses?">
                        Yes — our portfolio includes projects for both emerging startups and larger, established organizations.
                    </x-faq-item>
                </div>
                <div data-reveal style="--reveal-delay:120ms">
                    <x-faq-item question="Can you support a project after launch?">
                        Yes, ongoing support and enhancement is part of our standard development process.
                    </x-faq-item>
                </div>
                <div data-reveal style="--reveal-delay:180ms">
                    <x-faq-item question="Where is Divine Dev Hub based?">
                        Our office is located at 304, Palladium Business Hub, Opposite 4D Square Mall, Chandkheda, Ahmedabad, Gujarat 382424.
                    </x-faq-item>
                </div>
            </div>
        </div>
    </section>

    {{-- Final CTA --}}
    <section id="contact" class="scroll-mt-24 bg-surface py-24 sm:py-32" aria-labelledby="cta-heading">
        <div data-reveal-scale class="page-container">
            <x-cta-banner
                title="Ready to start your next project?"
                description="Tell us what you're building — we'll follow up at info@divinedevhub.in with next steps."
                ctaLabel="Email Us"
                ctaHref="mailto:info@divinedevhub.in"
            />
        </div>
    </section>

@endsection
