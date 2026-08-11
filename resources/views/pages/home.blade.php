@extends('layouts.app')

@section('title', 'Divine Dev Hub — Software Development & Digital Engineering')
@section('description', 'Divine Dev Hub designs and builds cloud-native applications, AI-driven solutions and modern e-commerce platforms — end-to-end, from strategy to launch.')

@section('content')

    {{-- Hero --}}
    <section class="relative overflow-hidden bg-surface pb-20 pt-32 sm:pb-28 sm:pt-40" aria-labelledby="hero-heading">
        <div class="pointer-events-none absolute inset-0 -z-10" aria-hidden="true">
            <div class="absolute -top-24 right-0 h-96 w-96 rounded-full bg-primary/10 blur-3xl animate-float-slow"></div>
            <div class="absolute bottom-0 left-0 h-72 w-72 rounded-full bg-accent/10 blur-3xl"></div>
            <div class="absolute inset-0 [background-image:radial-gradient(circle,_rgba(46,49,146,0.14)_1px,_transparent_1px)] [background-size:28px_28px] opacity-40"></div>
        </div>

        <div class="page-container grid gap-16 lg:grid-cols-2 lg:items-center">
            <div class="max-w-3xl">
                <p class="animate-fade-up text-sm font-semibold uppercase tracking-wide text-primary">Software Engineering Partner</p>

                <h1 id="hero-heading" class="animate-fade-up mt-4 text-4xl font-semibold tracking-tight text-text-primary sm:text-5xl lg:text-6xl" style="animation-delay: 80ms;">
                    Engineering Software That Turns Ideas Into Digital Reality
                </h1>

                <p class="animate-fade-up mt-6 max-w-xl text-lg leading-relaxed text-text-secondary" style="animation-delay: 160ms;">
                    Divine Dev Hub designs and builds cloud-native applications, AI-driven solutions and modern e-commerce platforms for businesses ready to scale — end-to-end, from strategy to launch.
                </p>

                <div class="animate-fade-up mt-9 flex flex-wrap items-center gap-4" style="animation-delay: 240ms;">
                    <x-button href="#contact">Start a Project</x-button>
                    <x-button href="#portfolio" variant="secondary">View Our Work</x-button>
                </div>
            </div>

            <div class="animate-fade-up relative hidden aspect-square max-w-md justify-self-center lg:flex lg:items-center lg:justify-center" style="animation-delay: 200ms;" aria-hidden="true">
                <div class="absolute inset-8 rounded-3xl border border-primary/10 bg-white/60"></div>

                <div class="animate-float-slow absolute left-2 top-6 w-64 rounded-2xl border border-border bg-white p-5 shadow-xl">
                    <div class="flex items-center gap-1.5">
                        <span class="h-2.5 w-2.5 rounded-full bg-accent/70"></span>
                        <span class="h-2.5 w-2.5 rounded-full bg-primary/40"></span>
                        <span class="h-2.5 w-2.5 rounded-full bg-border"></span>
                    </div>
                    <div class="mt-4 space-y-2">
                        <div class="h-2 w-full rounded-full bg-surface"></div>
                        <div class="h-2 w-4/5 rounded-full bg-surface"></div>
                        <div class="h-2 w-2/3 rounded-full bg-primary/20"></div>
                    </div>
                </div>

                <div class="absolute bottom-4 right-0 w-52 rounded-2xl border border-border bg-secondary p-5 shadow-xl">
                    <div class="flex items-center gap-2">
                        <span class="relative flex h-2.5 w-2.5">
                            <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-accent opacity-75"></span>
                            <span class="relative inline-flex h-2.5 w-2.5 rounded-full bg-accent"></span>
                        </span>
                        <p class="text-xs font-semibold uppercase tracking-wide text-white/70">Deployed &amp; Live</p>
                    </div>
                    <div class="mt-4 flex items-end gap-1.5">
                        <span class="h-4 w-1.5 rounded-full bg-white/25"></span>
                        <span class="h-6 w-1.5 rounded-full bg-white/25"></span>
                        <span class="h-3 w-1.5 rounded-full bg-white/25"></span>
                        <span class="h-8 w-1.5 rounded-full bg-accent"></span>
                        <span class="h-5 w-1.5 rounded-full bg-white/25"></span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Trust / Achievements --}}
    <section class="bg-secondary py-14" aria-labelledby="stats-heading">
        <h2 id="stats-heading" class="sr-only">Divine Dev Hub in numbers</h2>
        <div class="page-container grid grid-cols-2 gap-8 sm:grid-cols-4">
            <x-stat-item value="12+" label="Years in Business" />
            <x-stat-item value="540+" label="Projects Delivered" />
            <x-stat-item value="510+" label="Happy Clients" />
            <x-stat-item value="50+" label="Skilled Experts" />
        </div>
    </section>

    {{-- Company Introduction --}}
    <section id="about" class="scroll-mt-24 py-20 sm:py-28" aria-labelledby="about-heading">
        <div class="page-container grid gap-12 lg:grid-cols-2 lg:items-center">
            <x-section-heading
                id="about-heading"
                eyebrow="About Divine Dev Hub"
                title="A trusted engineering partner since 2014"
                description="Established in 2014, Divine Dev Hub has evolved from a focused software team into a dependable IT solutions partner — delivering high-performance software development, e-commerce platforms, enterprise-grade security and CRM systems to businesses worldwide. We've helped emerging startups and established enterprises alike build scalable, future-ready technology."
            />

            <div class="grid grid-cols-2 gap-4">
                <div class="rounded-2xl border border-border bg-white p-6">
                    <p class="text-2xl font-semibold text-primary">2014</p>
                    <p class="mt-1 text-sm text-text-secondary">Founded</p>
                </div>
                <div class="rounded-2xl border border-border bg-white p-6">
                    <p class="text-2xl font-semibold text-primary">12+</p>
                    <p class="mt-1 text-sm text-text-secondary">Awards &amp; Recognitions</p>
                </div>
                <div class="col-span-2 rounded-2xl border border-border bg-white p-6">
                    <p class="text-sm leading-relaxed text-text-secondary">
                        Every engagement is scoped around measurable business outcomes — not just feature delivery — so the software we ship keeps earning its value long after launch.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- Services --}}
    <section id="services" class="scroll-mt-24 bg-surface py-20 sm:py-28" aria-labelledby="services-heading">
        <div class="page-container">
            <x-section-heading
                id="services-heading"
                eyebrow="What We Do"
                title="Services built around your roadmap"
                description="From first release to long-term platform growth, our teams cover the full software lifecycle."
                align="center"
            />

            <div class="mt-14 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                <x-service-card index="01" title="Web Development" description="Full-stack web development — customized solutions from design to deployment and security." />
                <x-service-card index="02" title="Software Services" description="Comprehensive software development, integration and customization for diverse business needs." />
                <x-service-card index="03" title="CRM Solutions" description="Custom CRM builds that streamline operations, strengthen customer relationships and boost efficiency." />
                <x-service-card index="04" title="App Development" description="Mobile app development from concept to launch, focused on seamless user experiences." />
                <x-service-card index="05" title="E-Commerce" description="Tailored e-commerce solutions — design, development and optimization for online business growth." />
                <x-service-card index="06" title="Odoo &amp; Magento" description="Implementation and customization on Odoo's open-source ERP suite and the Magento e-commerce platform." />
            </div>
        </div>
    </section>

    {{-- Technology Expertise --}}
    <section id="technologies" class="scroll-mt-24 py-20 sm:py-28" aria-labelledby="technologies-heading">
        <div class="page-container">
            <x-section-heading
                id="technologies-heading"
                eyebrow="Technology Expertise"
                title="A modern, pragmatic technology stack"
                description="We pick the right tool for the job across the categories our projects most often call for."
                align="center"
            />

            <div class="mt-14 grid gap-4 sm:grid-cols-2 lg:grid-cols-5">
                @foreach ([
                    ['label' => 'Frontend', 'items' => 'React, Alpine.js, Tailwind CSS'],
                    ['label' => 'Backend', 'items' => 'Laravel, Node.js, PHP'],
                    ['label' => 'Mobile', 'items' => 'Flutter, React Native'],
                    ['label' => 'Cloud & DevOps', 'items' => 'AWS, Docker, CI/CD'],
                    ['label' => 'Platforms', 'items' => 'Odoo, Magento'],
                ] as $category)
                    <div class="rounded-2xl border border-border bg-white p-6 text-center">
                        <p class="text-sm font-semibold text-text-primary">{{ $category['label'] }}</p>
                        <p class="mt-2 text-xs leading-relaxed text-text-secondary">{{ $category['items'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Industries --}}
    <section id="industries" class="scroll-mt-24 bg-surface py-20 sm:py-28" aria-labelledby="industries-heading">
        <div class="page-container">
            <x-section-heading
                id="industries-heading"
                eyebrow="Industries"
                title="Industries we've delivered for"
                description="A cross-section of the sectors represented in our project portfolio."
                align="center"
            />

            <div class="mt-14 grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ([
                    'Travel & Hospitality',
                    'Agriculture & E-Commerce',
                    'Healthcare & Telemedicine',
                    'FinTech & Trading',
                    'Education',
                    'Logistics & On-Demand',
                ] as $industry)
                    <div class="rounded-2xl border border-border bg-white px-6 py-5 text-sm font-medium text-text-primary">
                        {{ $industry }}
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Why Choose Us --}}
    <section class="py-20 sm:py-28" aria-labelledby="why-heading">
        <div class="page-container grid gap-12 lg:grid-cols-2 lg:items-start">
            <x-section-heading
                id="why-heading"
                eyebrow="Why Choose Divine Dev Hub"
                title="Engineering quality, without the overhead"
            />

            <div class="grid gap-6 sm:grid-cols-2">
                @foreach ([
                    ['title' => 'Engineering Quality', 'description' => 'Clean, maintainable code and sensible architecture from day one — built to be extended, not rewritten.'],
                    ['title' => 'Clear Communication', 'description' => 'Direct access to the people building your product, with regular, plain-language progress updates.'],
                    ['title' => 'Scalable Architecture', 'description' => 'Systems designed to handle growth in users, data and features without a costly rebuild.'],
                    ['title' => 'Business-Focused Delivery', 'description' => 'Every technical decision is weighed against the business outcome it needs to support.'],
                ] as $point)
                    <div>
                        <h3 class="text-base font-semibold text-text-primary">{{ $point['title'] }}</h3>
                        <p class="mt-2 text-sm leading-relaxed text-text-secondary">{{ $point['description'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Development Process --}}
    <section id="process" class="scroll-mt-24 bg-surface py-20 sm:py-28" aria-labelledby="process-heading">
        <div class="page-container">
            <x-section-heading
                id="process-heading"
                eyebrow="Our Process"
                title="A transparent path from idea to launch"
                align="center"
            />

            <div class="mt-14 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
                <x-process-step number="01" title="Discovery" description="Understanding your goals, users and constraints before writing a line of code." />
                <x-process-step number="02" title="Strategy" description="Defining scope, architecture and success metrics for the engagement." />
                <x-process-step number="03" title="Design" description="Translating requirements into clear, usable interfaces and flows." />
                <x-process-step number="04" title="Development" description="Building in focused iterations, with regular check-ins along the way." />
                <x-process-step number="05" title="Testing" description="Verifying functionality, performance and security before release." />
                <x-process-step number="06" title="Launch" description="Deploying to production with a clear rollout and rollback plan." />
                <x-process-step number="07" title="Support" description="Ongoing monitoring, fixes and enhancements after go-live." />
            </div>
        </div>
    </section>

    {{-- Featured Portfolio --}}
    <section id="portfolio" class="scroll-mt-24 py-20 sm:py-28" aria-labelledby="portfolio-heading">
        <div class="page-container">
            <x-section-heading
                id="portfolio-heading"
                eyebrow="Featured Work"
                title="A sample of what we've built"
                description="A cross-section of projects from our portfolio."
                align="center"
            />

            <div class="mt-14 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                <x-project-card title="Show Me Around" category="Travel Platform" />
                <x-project-card title="Agripari" category="Agricultural E-Commerce" />
                <x-project-card title="Live Medical Service" category="Telemedicine Platform" />
                <x-project-card title="Stock Market Service" category="AI-Powered Trading Software" />
                <x-project-card title="QuickClock" category="HRMS" />
                <x-project-card title="School Management" category="School Management System" />
            </div>
        </div>
    </section>

    {{-- FAQ --}}
    <section id="faq" class="scroll-mt-24 bg-surface py-20 sm:py-28" aria-labelledby="faq-heading">
        <div class="page-container max-w-3xl">
            <x-section-heading
                id="faq-heading"
                eyebrow="FAQ"
                title="Common questions"
                align="center"
            />

            <div class="mt-10 space-y-4">
                <x-faq-item question="What services does Divine Dev Hub offer?">
                    We provide web development, custom software, CRM solutions, mobile app development, e-commerce builds, and Odoo and Magento implementations.
                </x-faq-item>
                <x-faq-item question="Do you work with startups as well as established businesses?">
                    Yes — our portfolio includes projects for both emerging startups and larger, established organizations.
                </x-faq-item>
                <x-faq-item question="Can you support a project after launch?">
                    Yes, ongoing support and enhancement is part of our standard development process.
                </x-faq-item>
                <x-faq-item question="Where is Divine Dev Hub based?">
                    Our office is located at 304, Palladium Business Hub, Opposite 4D Square Mall, Chandkheda, Ahmedabad, Gujarat 382424.
                </x-faq-item>
            </div>
        </div>
    </section>

    {{-- Blog / Insights --}}
    <section id="blog" class="scroll-mt-24 py-20 sm:py-28" aria-labelledby="blog-heading">
        <div class="page-container">
            <x-section-heading
                id="blog-heading"
                eyebrow="Insights"
                title="From the blog"
                align="center"
            />

            <div class="mt-14 grid gap-6 sm:grid-cols-2">
                <a
                    href="https://divinedevhub.in/2025/06/16/ai-in-business-development-role/"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="group rounded-2xl border border-border bg-white p-6 transition hover:-translate-y-1 hover:border-primary/30 hover:shadow-lg"
                >
                    <p class="text-xs font-semibold uppercase tracking-wide text-text-secondary">Jun 16, 2025</p>
                    <h3 class="mt-2 text-lg font-semibold text-text-primary group-hover:text-primary">Best AI in Business Development Manager</h3>
                    <span class="mt-4 inline-block text-sm font-medium text-primary">Read article &rarr;</span>
                </a>
                <a
                    href="https://divinedevhub.in/2025/06/12/ai-in-it-business-development/"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="group rounded-2xl border border-border bg-white p-6 transition hover:-translate-y-1 hover:border-primary/30 hover:shadow-lg"
                >
                    <p class="text-xs font-semibold uppercase tracking-wide text-text-secondary">Jun 12, 2025</p>
                    <h3 class="mt-2 text-lg font-semibold text-text-primary group-hover:text-primary">AI in IT Business Development: 6</h3>
                    <span class="mt-4 inline-block text-sm font-medium text-primary">Read article &rarr;</span>
                </a>
            </div>
        </div>
    </section>

    {{-- Final CTA --}}
    <section id="contact" class="scroll-mt-24 bg-surface py-20 sm:py-28" aria-labelledby="cta-heading">
        <div class="page-container">
            <x-cta-banner
                title="Ready to start your next project?"
                description="Tell us what you're building — we'll follow up at info@divinedevhub.in with next steps."
                ctaLabel="Email Us"
                ctaHref="mailto:info@divinedevhub.in"
            />
        </div>
    </section>

@endsection
