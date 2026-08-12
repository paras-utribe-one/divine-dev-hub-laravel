@php
    // Single source of truth in App\Support\Content / config/company.php —
    // don't reintroduce a local copy of the services or social list here.
    $services = \App\Support\Content::services();
    $socialLinks = config('company.social');
@endphp

<footer class="relative overflow-hidden bg-secondary text-white">
    <div class="pointer-events-none absolute inset-x-0 top-0 h-px bg-linear-to-r from-transparent via-primary-light/60 to-transparent" aria-hidden="true"></div>
    <div class="pointer-events-none absolute inset-0 bg-dot-grid text-white/5" aria-hidden="true"></div>

    {{-- Micro CTA band --}}
    <div class="relative border-b border-white/10">
        <div class="page-container flex flex-col items-center justify-between gap-5 py-10 sm:flex-row">
            <div>
                <p class="text-lg font-semibold text-white">Have a project in mind?</p>
                <p class="mt-1 text-sm text-white/55">Let's talk about what you're building — no pressure, just a conversation.</p>
            </div>
            <x-button href="{{ route('contact.show') }}" class="group shrink-0">
                Start the conversation
                <x-svg-icon name="arrow-right" class="h-4 w-4 transition-transform duration-200 group-hover:translate-x-0.5" />
            </x-button>
        </div>
    </div>

    <div class="page-container relative grid grid-cols-1 gap-12 py-20 sm:grid-cols-2 lg:grid-cols-12 lg:gap-8">
        <div class="sm:col-span-2 lg:col-span-4">
            <a href="/" class="inline-flex items-center rounded-xl border border-white/10 bg-white p-3 shadow-lg shadow-black/20" aria-label="Divine Dev Hub — Home">
                <img
                    src="{{ asset('images/logo-divinedevhub.png') }}"
                    alt="Divine Dev Hub"
                    width="160"
                    height="63"
                    class="h-10 w-auto"
                    loading="lazy"
                >
            </a>
            <p class="mt-6 max-w-sm text-sm leading-relaxed text-white/60">
                Transforming ideas into digital reality — end-to-end software development, cloud-native applications and AI-driven solutions for businesses ready to scale.
            </p>
            <ul class="mt-7 flex items-center gap-3">
                @foreach ($socialLinks as $social)
                    <li>
                        <a
                            href="{{ $social['href'] }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            data-class-old="flex h-10 w-10 items-center justify-center rounded-full border border-white/15 text-white/60 transition duration-200 hover:-translate-y-0.5 hover:border-accent/60 hover:text-accent focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white"
                            class="flex h-11 w-11 items-center justify-center rounded-full border border-white/15 bg-white/[0.03] text-white/60 transition-all duration-200 hover:-translate-y-1 hover:border-accent/60 hover:bg-accent/10 hover:text-accent hover:shadow-[0_0_0_4px_rgba(217,154,61,0.08)] focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white"
                            aria-label="{{ $social['label'] }} (opens in a new tab)"
                        >
                            <x-svg-icon :name="$social['icon']" class="h-4 w-4" />
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>

        <nav class="lg:col-span-2" aria-label="Company">
            <!-- <h2 class="text-xs font-semibold uppercase tracking-wider text-white/40">Company</h2> -->
            <h2 class="flex items-center gap-2 text-xs font-semibold uppercase tracking-wider text-white/60">
                <span class="h-1 w-3 rounded-full bg-accent"></span>
                Company
            </h2>
            <ul class="mt-5 space-y-3.5 text-sm">
                <li><a href="{{ route('about') }}" class="inline-block text-white/65 transition-all duration-200 hover:translate-x-0.5 hover:text-white">About</a></li>
                <li><a href="{{ route('careers.index') }}" class="inline-block text-white/65 transition-all duration-200 hover:translate-x-0.5 hover:text-white">Careers</a></li>
                <li><a href="{{ route('testimonials') }}" class="inline-block text-white/65 transition-all duration-200 hover:translate-x-0.5 hover:text-white">Testimonials</a></li>
                <li><a href="{{ route('contact.show') }}" class="inline-block text-white/65 transition-all duration-200 hover:translate-x-0.5 hover:text-white">Contact</a></li>
            </ul>
        </nav>

        <nav class="lg:col-span-3" aria-label="Services">
            <!-- <h2 class="text-xs font-semibold uppercase tracking-wider text-white/40">Services</h2> -->
            <h2 class="flex items-center gap-2 text-xs font-semibold uppercase tracking-wider text-white/60">
                <span class="h-1 w-3 rounded-full bg-accent"></span>
                Services
            </h2>
            <ul class="mt-5 space-y-3.5 text-sm">
                @foreach ($services as $service)
                    <li><a href="{{ route('services.show', $service['slug']) }}" class="inline-block text-white/65 transition-all duration-200 hover:translate-x-0.5 hover:text-white">{{ $service['title'] }}</a></li>
                @endforeach
            </ul>
        </nav>

        <nav class="lg:col-span-3" aria-label="Resources">
            <!-- <h2 class="text-xs font-semibold uppercase tracking-wider text-white/40">Resources</h2> -->
            <h2 class="flex items-center gap-2 text-xs font-semibold uppercase tracking-wider text-white/60">
                <span class="h-1 w-3 rounded-full bg-accent"></span>
                Resources
            </h2>
            <ul class="mt-5 space-y-3.5 text-sm">
                <li><a href="{{ route('work.index') }}" class="inline-block text-white/65 transition-all duration-200 hover:translate-x-0.5 hover:text-white">Our Work</a></li>
                <li><a href="{{ route('industries.index') }}" class="inline-block text-white/65 transition-all duration-200 hover:translate-x-0.5 hover:text-white">Industries</a></li>
                <li><a href="{{ route('technologies.index') }}" class="inline-block text-white/65 transition-all duration-200 hover:translate-x-0.5 hover:text-white">Technologies</a></li>
                <li><a href="{{ route('blog.index') }}" class="inline-block text-white/65 transition-all duration-200 hover:translate-x-0.5 hover:text-white">Blog</a></li>
                <li><a href="{{ route('faqs') }}" class="inline-block text-white/65 transition-all duration-200 hover:translate-x-0.5 hover:text-white">FAQs</a></li>
            </ul>
        </nav>

        <div class="sm:col-span-2 lg:col-span-12 lg:border-t lg:border-white/10 lg:pt-8">
            <!-- <h2 class="text-xs font-semibold uppercase tracking-wider text-white/40">Contact</h2> -->
            <h2 class="flex items-center gap-2 text-xs font-semibold uppercase tracking-wider text-white/60">
                <span class="h-1 w-3 rounded-full bg-accent"></span>
                Contact
            </h2>
            <div class="mt-5 flex flex-col gap-3 text-sm text-white/65 sm:flex-row sm:flex-wrap sm:items-center sm:gap-x-8">
                <!-- <a href="mailto:{{ config('company.email') }}" class="inline-flex items-center gap-2 transition hover:text-white">
                    <x-svg-icon name="mail" class="h-4 w-4 text-accent" />
                    {{ config('company.email') }}
                </a> -->
                <a href="mailto:{{ config('company.email') }}" class="group inline-flex items-center gap-2.5 transition hover:text-white">
                    <span class="flex h-8 w-8 items-center justify-center rounded-full bg-accent/10 text-accent transition group-hover:bg-accent group-hover:text-secondary">
                        <x-svg-icon name="mail" class="h-4 w-4" />
                    </span>
                    {{ config('company.email') }}
                </a>
                @if (config('company.phone'))
                    <!-- <a href="tel:{{ preg_replace('/[^0-9+]/', '', config('company.phone')) }}" class="inline-flex items-center gap-2 transition hover:text-white">
                        <x-svg-icon name="smartphone" class="h-4 w-4 text-accent" />
                        {{ config('company.phone') }}
                    </a> -->
                    <a href="tel:{{ preg_replace('/[^0-9+]/', '', config('company.phone')) }}" class="group inline-flex items-center gap-2.5 transition hover:text-white">
                        <span class="flex h-8 w-8 items-center justify-center rounded-full bg-accent/10 text-accent transition group-hover:bg-accent group-hover:text-secondary">
                            <x-svg-icon name="smartphone" class="h-4 w-4" />
                        </span>
                        {{ config('company.phone') }}
                    </a>
                @endif
                @if (config('company.whatsapp'))
                    <!-- <a href="https://wa.me/{{ config('company.whatsapp') }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2 transition hover:text-white">
                        <x-svg-icon name="message" class="h-4 w-4 text-accent" />
                        Chat on WhatsApp
                    </a> -->
                    <a href="https://wa.me/{{ config('company.whatsapp') }}" target="_blank" rel="noopener noreferrer" class="group inline-flex items-center gap-2.5 transition hover:text-white">
                        <span class="flex h-8 w-8 items-center justify-center rounded-full bg-accent/10 text-accent transition group-hover:bg-accent group-hover:text-secondary">
                            <x-svg-icon name="message" class="h-4 w-4" />
                        </span>
                        Chat on WhatsApp
                    </a>
                @endif
                @if (config('company.address') && (config('company.address_map_link')))
                    <!-- <a href="{{ config('company.address_map_link') }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2 transition hover:text-white">
                        <x-svg-icon name="map-pin" class="h-4 w-4 text-accent" />
                        {{ config('company.address') }}
                    </a> -->
                    <a href="{{ config('company.address_map_link') }}" target="_blank" rel="noopener noreferrer" class="group inline-flex items-center gap-2.5 transition hover:text-white">
                        <span class="flex h-8 w-8 items-center justify-center rounded-full bg-accent/10 text-accent transition group-hover:bg-accent group-hover:text-secondary">
                            <x-svg-icon name="map-pin" class="h-4 w-4" />
                        </span>
                        {{ config('company.address') }}
                    </a>
                @else
                    <!-- <span class="inline-flex items-center gap-2 leading-relaxed">
                        <x-svg-icon name="map-pin" class="h-4 w-4 shrink-0 text-accent" />
                        {{ config('company.address') }}
                    </span> -->
                    <span class="group inline-flex items-center gap-2 leading-relaxed">
                        <span class="flex h-8 w-8 items-center justify-center rounded-full bg-accent/10 text-accent transition group-hover:bg-accent group-hover:text-secondary">
                            <x-svg-icon name="map-pin" class="h-4 w-4" />
                        </span>
                        {{ config('company.address') }}
                    </span>
                @endif
            </div>
        </div>
    </div>

    <div class="relative border-t border-white/10">
        <div class="page-container flex flex-col items-center justify-between gap-4 py-6 text-xs text-white/40 sm:flex-row">
            <p>&copy; {{ date('Y') }} Divine Dev Hub. All rights reserved.</p>
            <div class="flex items-center gap-6">
                <a href="{{ route('privacy-policy') }}" class="transition-colors duration-200 hover:text-white">Privacy Policy</a>
                <a href="{{ route('terms-conditions') }}" class="transition-colors duration-200 hover:text-white">Terms &amp; Conditions</a>
                @if (\Illuminate\Support\Facades\Route::has('sitemap.html'))
                    <a href="{{ route('sitemap.html') }}" class="transition-colors duration-200 hover:text-white">Sitemap</a>
                @endif
            </div>
        </div>
    </div>
</footer>
