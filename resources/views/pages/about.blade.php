@extends('layouts.app')

@section('title', 'About Us — Divine Dev Hub')
@section('description', 'Divine Dev Hub has delivered 540+ projects for 510+ clients since 2014 — a software engineering partner based in Ahmedabad, India.')

@section('content')

    <x-breadcrumb :items="[['label' => 'About']]" />

    <x-page-hero
        eyebrow="About Divine Dev Hub"
        title="A software engineering partner, not a vendor"
        description="Founded in 2014 in Ahmedabad, India, we've grown from a small startup into a 50-person engineering team working with businesses worldwide."
    />

    {{-- Company story --}}
    <section class="py-20 sm:py-28" aria-labelledby="story-heading">
        <div class="page-container grid gap-14 lg:grid-cols-12 lg:gap-8">
            <div data-reveal class="lg:col-span-5 lg:flex lg:h-full lg:flex-col lg:justify-center">
                <div class="flex items-baseline gap-4">
                    <span class="text-7xl font-bold leading-none tracking-tight text-primary sm:text-8xl">2014</span>
                    <span class="max-w-32 text-xs font-medium uppercase leading-snug tracking-wide text-text-secondary">Founded in Ahmedabad, India</span>
                </div>

                <p id="story-heading" class="mt-8 border-l-2 border-primary/20 pl-5 text-xl font-semibold leading-snug tracking-tight text-text-primary sm:text-2xl">
                    &ldquo;Evolved from a visionary startup into a trusted leader in IT solutions.&rdquo;
                </p>
            </div>

            <div data-reveal style="--reveal-delay:120ms" class="lg:col-span-7">
                <p class="text-lg leading-relaxed text-text-secondary">
                    Established in 2014, Divine Dev Hub delivers high-performance software development, e-commerce platforms, enterprise-grade security and CRM systems to businesses worldwide. We've helped emerging startups and established enterprises alike build scalable, future-ready technology — with every engagement scoped around measurable business outcomes, not just feature delivery.
                </p>
                <p class="mt-5 text-lg leading-relaxed text-text-secondary">
                    We work as an in-house engineering team of 50+ people, covering web, mobile, CRM, e-commerce and platform specializations in Odoo and Magento — across healthcare, fintech, travel, agriculture, education and logistics.
                </p>

                <dl class="mt-10 grid grid-cols-2 gap-6 border-t border-border pt-8 sm:grid-cols-4">
                    <div>
                        <dt class="text-xs font-medium uppercase tracking-wide text-text-secondary">Years in business</dt>
                        <dd class="mt-2 text-2xl font-semibold text-text-primary">12+</dd>
                    </div>
                    <div>
                        <dt class="text-xs font-medium uppercase tracking-wide text-text-secondary">Projects delivered</dt>
                        <dd class="mt-2 text-2xl font-semibold text-text-primary">540+</dd>
                    </div>
                    <div>
                        <dt class="text-xs font-medium uppercase tracking-wide text-text-secondary">Clients served</dt>
                        <dd class="mt-2 text-2xl font-semibold text-text-primary">510+</dd>
                    </div>
                    <div>
                        <dt class="text-xs font-medium uppercase tracking-wide text-text-secondary">Team members</dt>
                        <dd class="mt-2 text-2xl font-semibold text-text-primary">50+</dd>
                    </div>
                </dl>
            </div>
        </div>
    </section>

    {{-- Why choose us --}}
    <section class="bg-surface py-20 sm:py-28" aria-labelledby="why-heading">
        <div class="page-container grid gap-12 lg:grid-cols-12 lg:gap-8">
            <div data-reveal class="lg:col-span-4">
                <p class="text-sm font-semibold uppercase tracking-wide text-primary">Why Choose Us</p>
                <h2 id="why-heading" class="mt-4 text-3xl font-semibold tracking-tight text-text-primary sm:text-4xl">
                    Engineering quality, without the overhead
                </h2>
            </div>

            <div class="lg:col-span-8">
                <div class="divide-y divide-border border-t border-border">
                    @foreach ($benefits as $i => $benefit)
                        <div data-reveal style="--reveal-delay: {{ $i * 80 }}ms" class="flex items-start gap-5 py-7">
                            <span class="hidden shrink-0 pt-2 text-xs font-semibold tabular-nums text-muted sm:block">0{{ $i + 1 }}</span>
                            <span class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-primary-50 text-primary">
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

    {{-- Process --}}
    <section id="process" class="scroll-mt-24 py-20 sm:py-28" aria-labelledby="process-heading">
        <div class="page-container">
            <x-section-heading
                id="process-heading"
                eyebrow="How We Work"
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
                                :icon="$step['icon']"
                                :last="$loop->last"
                            />
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- Team — real photography/bios still pending, see docs/build-log.md.
         The cards below are Phase-A placeholder sample data for design
         review only (initials, never a photo, never a real name). --}}
    <section class="bg-surface py-20 sm:py-28" aria-labelledby="team-heading">
        <div class="page-container">
            <div data-reveal class="mx-auto max-w-2xl text-center">
                <p class="text-sm font-semibold uppercase tracking-wide text-primary">Our Team</p>
                <h2 id="team-heading" class="mt-4 text-3xl font-semibold tracking-tight text-text-primary sm:text-4xl">
                    50+ engineers, designers and specialists
                </h2>
                <p class="mt-5 text-base leading-relaxed text-text-secondary">
                    Real team profiles and photography are on the way. In the meantime, every engagement gives you direct access to the people actually building your product — not an account manager relaying updates secondhand.
                </p>
            </div>

            @if (count($team))
                <div class="mx-auto mt-10 max-w-2xl rounded-xl border border-dashed border-accent/50 bg-accent/5 px-5 py-4 text-center text-sm leading-relaxed text-text-secondary">
                    <strong class="text-text-primary">Placeholder data — design review only.</strong>
                    These cards are fictional sample entries (initials, not photos) added to review this section's populated layout. See <code class="text-xs">docs/build-log.md</code>.
                </div>

                <div class="mt-10 grid gap-5 sm:grid-cols-2 lg:grid-cols-5">
                    @foreach ($team as $i => $member)
                        <x-team-card
                            :name="$member['name']"
                            :role="$member['role']"
                            :initials="$member['initials']"
                            placeholder
                            data-reveal
                            :style="'--reveal-delay: ' . ($i * 60) . 'ms'"
                        />
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    {{-- Certifications — none confirmed as genuinely held yet, see
         docs/build-log.md. Badges below are Phase-A placeholder sample data
         for design review only. --}}
    @if (count($trustBadges))
        <section class="py-20 sm:py-28" aria-labelledby="certifications-heading">
            <div class="page-container text-center">
                <p class="text-sm font-semibold uppercase tracking-wide text-primary">Recognized &amp; Certified</p>
                <h2 id="certifications-heading" class="sr-only">Certifications</h2>

                <div data-reveal class="mx-auto mt-6 max-w-2xl rounded-xl border border-dashed border-accent/50 bg-accent/5 px-5 py-4 text-sm leading-relaxed text-text-secondary">
                    <strong class="text-text-primary">Placeholder data — design review only.</strong>
                    No certifications have been confirmed as held yet — these are generic sample badges, not real logos or names.
                </div>

                <div class="mt-8">
                    <x-trust-badge-row :badges="$trustBadges" placeholder data-reveal />
                </div>
            </div>
        </section>
    @endif

    <section class="py-20 sm:py-28" aria-labelledby="about-cta-heading">
        <div data-reveal-scale class="page-container">
            <x-cta-banner
                title="Want to talk through your project?"
                description="Tell us what you're building — we'll follow up at info@divinedevhub.in with next steps."
                ctaLabel="Get in Touch"
                :ctaHref="route('contact.show')"
            />
        </div>
    </section>

@endsection
