@php
    $serviceLinks = [
        'Web Development',
        'Software Services',
        'CRM Solutions',
        'App Development',
        'E-Commerce',
        'Odoo Services',
        'Magento Services',
    ];

    $socialLinks = [
        ['label' => 'Facebook', 'icon' => 'facebook', 'href' => 'https://www.facebook.com/profile.php?id=61572012705524'],
        ['label' => 'X (Twitter)', 'icon' => 'twitter', 'href' => 'https://x.com/DivineDevHub'],
        ['label' => 'LinkedIn', 'icon' => 'linkedin', 'href' => 'https://www.linkedin.com/company/divine-dev-hub/'],
        ['label' => 'Instagram', 'icon' => 'instagram', 'href' => 'https://www.instagram.com/divine_dev_hub/'],
    ];
@endphp

<footer class="relative overflow-hidden bg-secondary text-white">
    <div class="pointer-events-none absolute inset-0 bg-dot-grid text-white/5" aria-hidden="true"></div>

    <div class="page-container relative grid grid-cols-1 gap-12 py-20 sm:grid-cols-2 lg:grid-cols-12 lg:gap-8">
        <div class="sm:col-span-2 lg:col-span-4">
            <a href="/" class="inline-flex items-center rounded-md bg-white/95 px-3 py-2" aria-label="Divine Dev Hub — Home">
                <img
                    src="{{ asset('images/logo-divinedevhub.png') }}"
                    alt="Divine Dev Hub"
                    width="160"
                    height="63"
                    class="h-9 w-auto"
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
                            class="flex h-10 w-10 items-center justify-center rounded-full border border-white/15 text-white/60 transition duration-200 hover:-translate-y-0.5 hover:border-accent/60 hover:text-accent focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white"
                            aria-label="{{ $social['label'] }} (opens in a new tab)"
                        >
                            <x-svg-icon :name="$social['icon']" class="h-4 w-4" />
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>

        <nav class="lg:col-span-2" aria-label="Company">
            <h2 class="text-xs font-semibold uppercase tracking-wider text-white/40">Company</h2>
            <ul class="mt-5 space-y-3.5 text-sm">
                <li><a href="#about" class="text-white/65 transition hover:text-white">About</a></li>
                <li><a href="https://divinedevhub.in/careers/" target="_blank" rel="noopener noreferrer" class="text-white/65 transition hover:text-white">Careers</a></li>
                <li><a href="#contact" class="text-white/65 transition hover:text-white">Contact</a></li>
            </ul>
        </nav>

        <nav class="lg:col-span-3" aria-label="Services">
            <h2 class="text-xs font-semibold uppercase tracking-wider text-white/40">Services</h2>
            <ul class="mt-5 space-y-3.5 text-sm">
                @foreach ($serviceLinks as $service)
                    <li><a href="#services" class="text-white/65 transition hover:text-white">{{ $service }}</a></li>
                @endforeach
            </ul>
        </nav>

        <div class="lg:col-span-3">
            <h2 class="text-xs font-semibold uppercase tracking-wider text-white/40">Resources</h2>
            <ul class="mt-5 space-y-3.5 text-sm">
                <li><a href="#technologies" class="text-white/65 transition hover:text-white">Technologies</a></li>
                <li><a href="#blog" class="text-white/65 transition hover:text-white">Blog</a></li>
                <li><a href="#faq" class="text-white/65 transition hover:text-white">FAQs</a></li>
            </ul>
        </div>

        <div class="sm:col-span-2 lg:col-span-12 lg:border-t lg:border-white/10 lg:pt-8">
            <h2 class="text-xs font-semibold uppercase tracking-wider text-white/40">Contact</h2>
            <div class="mt-5 flex flex-col gap-3 text-sm text-white/65 sm:flex-row sm:flex-wrap sm:items-center sm:gap-x-8">
                <a href="mailto:info@divinedevhub.in" class="inline-flex items-center gap-2 transition hover:text-white">
                    <x-svg-icon name="mail" class="h-4 w-4 text-accent" />
                    info@divinedevhub.in
                </a>
                <span class="inline-flex items-center gap-2 leading-relaxed">
                    <x-svg-icon name="map-pin" class="h-4 w-4 shrink-0 text-accent" />
                    304, Palladium Business Hub, Opposite 4D Square Mall, Chandkheda, Ahmedabad, Gujarat 382424
                </span>
            </div>
        </div>
    </div>

    <div class="relative border-t border-white/10">
        <div class="page-container flex flex-col items-center justify-between gap-4 py-6 text-xs text-white/40 sm:flex-row">
            <p>&copy; {{ now()->year }} Divine Dev Hub. All rights reserved.</p>
            <a href="https://divinedevhub.in/terms-condition/" target="_blank" rel="noopener noreferrer" class="transition hover:text-white">Terms &amp; Conditions</a>
        </div>
    </div>
</footer>
