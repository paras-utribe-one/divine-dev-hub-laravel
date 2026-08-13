@php
    // Single source of truth in App\Support\Content / config/company.php —
    // don't reintroduce a local copy of the services or social list here.
    $services = \App\Support\Content::services();
    $socialLinks = config('company.social');
    // Phase-A placeholder sample data for design review — see docs/build-log.md.
    $trustBadges = \App\Support\Content::trustBadges();
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

    {{--
        Newsletter signup — UI only, not wired to a real provider. Part
        10.1 of the strategy doc blocks this on a mailing-list provider
        decision (Mailchimp/Brevo/etc.); building a form that silently goes
        nowhere would be worse than no form, so the submit handler is an
        explicit no-op that tells the user that, rather than faking a
        "subscribed!" confirmation. See docs/build-log.md, Phase A.
    --}}
    <div class="relative border-b border-white/10 bg-white/[0.02]">
        <div class="page-container flex flex-col items-center justify-between gap-4 py-8 sm:flex-row">
            <div class="flex items-center gap-3">
                <div>
                    <p class="text-sm font-semibold text-white">Engineering notes, monthly</p>
                    <p class="mt-1 text-xs text-white/50">No fluff, unsubscribe anytime.</p>
                </div>
                <x-placeholder-tag />
            </div>

            <div x-data="{ submitted: false }" class="w-full sm:w-auto">
                <form
                    @submit.prevent="submitted = true"
                    class="flex w-full max-w-sm items-center gap-2 sm:w-auto"
                    x-show="! submitted"
                >
                    <label for="newsletter-email" class="sr-only">Email address</label>
                    <input
                        type="email"
                        id="newsletter-email"
                        placeholder="you@company.com"
                        required
                        class="w-full min-w-0 rounded-lg border border-white/15 bg-white/5 px-4 py-2.5 text-sm text-white placeholder:text-white/40 focus:border-accent focus:outline-none focus:ring-2 focus:ring-accent/20"
                    >
                    <button
                        type="submit"
                        class="shrink-0 rounded-lg bg-accent px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-accent-hover"
                    >
                        Join
                    </button>
                </form>
                <p x-show="submitted" style="display: none;" class="max-w-sm text-sm text-white/70">
                    This form isn't connected to a mailing list yet — it's placeholder UI for design review. No email was sent anywhere.
                </p>
            </div>
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
                    @php
                        $socialHoverClass = match ($social['icon']) {
                            'facebook' => 'hover:border-[#1877F2]/60 hover:bg-[#1877F2]/10 hover:text-[#1877F2] hover:shadow-[0_0_0_4px_rgba(24,119,242,0.08)]',
                            'twitter', 'x' => 'hover:border-white/40 hover:bg-white/10 hover:text-white hover:shadow-[0_0_0_4px_rgba(255,255,255,0.06)]',
                            'linkedin' => 'hover:border-[#0A66C2]/60 hover:bg-[#0A66C2]/10 hover:text-[#0A66C2] hover:shadow-[0_0_0_4px_rgba(10,102,194,0.08)]',
                            'instagram' => 'hover:border-[#E4405F]/60 hover:bg-[#E4405F]/10 hover:text-[#E4405F] hover:shadow-[0_0_0_4px_rgba(228,64,95,0.08)]',
                            default => 'hover:border-accent/60 hover:bg-accent/10 hover:text-accent hover:shadow-[0_0_0_4px_rgba(217,154,61,0.08)]',
                        };
                    @endphp

                    <li>
                        <a
                            href="{{ $social['href'] }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="group flex h-11 w-11 items-center justify-center rounded-full border border-white/15 bg-white/[0.03] text-white/60 transition-all duration-200 hover:-translate-y-1 {{ $socialHoverClass }} focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white"
                            aria-label="{{ $social['label'] }} (opens in a new tab)"
                        >
                            <x-svg-icon
                                :name="$social['icon']"
                                class="h-[18px] w-[18px] transition-transform duration-200 group-hover:scale-110"
                            />
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>

        <nav class="lg:col-span-2" aria-label="Company">
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
            <h2 class="flex items-center gap-2 text-xs font-semibold uppercase tracking-wider text-white/60">
                <span class="h-1 w-3 rounded-full bg-accent"></span>
                Contact
            </h2>
            <div class="mt-5 flex flex-col gap-3 text-sm text-white/65 sm:flex-row sm:flex-wrap sm:items-center sm:gap-x-8">
                <a href="mailto:{{ config('company.email') }}" class="group inline-flex items-center gap-2.5 transition hover:text-white">
                    <span class="flex h-8 w-8 items-center justify-center rounded-full bg-accent/10 text-accent transition group-hover:bg-accent group-hover:text-secondary">
                        <x-svg-icon name="mail" class="h-4 w-4" />
                    </span>
                    {{ config('company.email') }}
                </a>
                @if (config('company.phone'))
                    <a href="tel:{{ preg_replace('/[^0-9+]/', '', config('company.phone')) }}" class="group inline-flex items-center gap-2.5 transition hover:text-white">
                        <span class="flex h-8 w-8 items-center justify-center rounded-full bg-accent/10 text-accent transition group-hover:bg-accent group-hover:text-secondary">
                            <x-svg-icon name="smartphone" class="h-4 w-4" />
                        </span>
                        {{ config('company.phone') }}
                    </a>
                @endif
                @if (config('company.whatsapp'))
                    <a href="https://wa.me/{{ config('company.whatsapp') }}" target="_blank" rel="noopener noreferrer" class="group inline-flex items-center gap-2.5 transition hover:text-[#25D366]">
                        <span class="flex h-8 w-8 items-center justify-center rounded-full bg-accent/10 text-accent transition group-hover:bg-[#25D366] group-hover:text-white">
                            <x-svg-icon name="whatsapp" class="h-4 w-4" />
                        </span>
                        Chat on WhatsApp
                    </a>
                @endif
                @if (config('company.address') && (config('company.address_map_link')))
                    <a href="{{ config('company.address_map_link') }}" target="_blank" rel="noopener noreferrer" class="group inline-flex items-center gap-2.5 transition hover:text-white">
                        <span class="flex h-8 w-8 items-center justify-center rounded-full bg-accent/10 text-accent transition group-hover:bg-accent group-hover:text-secondary">
                            <x-svg-icon name="map-pin" class="h-4 w-4" />
                        </span>
                        {{ config('company.address') }}
                    </a>
                @else
                    <span class="inline-flex items-center gap-2 leading-relaxed">
                        <span class="flex h-8 w-8 items-center justify-center rounded-full bg-accent/10 text-accent">
                            <x-svg-icon name="map-pin" class="h-4 w-4" />
                        </span>
                        {{ config('company.address') }}
                    </span>
                @endif
            </div>
        </div>
    </div>

    {{-- Trust badges — no certifications confirmed as genuinely held yet;
         see docs/build-log.md. Placeholder sample badges for design review. --}}
    @if (count($trustBadges))
        <div class="relative border-t border-white/10 bg-white/[0.02]">
            <div class="page-container py-8 text-center">
                <p class="text-xs text-white/40">Placeholder data — design review only, not real certifications</p>
                <div class="mt-4">
                    <x-trust-badge-row :badges="$trustBadges" placeholder />
                </div>
            </div>
        </div>
    @endif

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
