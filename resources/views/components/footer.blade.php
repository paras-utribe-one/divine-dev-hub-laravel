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

    $technologyLinks = ['Frontend', 'Backend', 'Mobile', 'Cloud & DevOps', 'AI & Automation'];

    $socialLinks = [
        ['label' => 'Facebook', 'href' => 'https://www.facebook.com/profile.php?id=61572012705524'],
        ['label' => 'X (Twitter)', 'href' => 'https://x.com/DivineDevHub'],
        ['label' => 'LinkedIn', 'href' => 'https://www.linkedin.com/company/divine-dev-hub/'],
        ['label' => 'Instagram', 'href' => 'https://www.instagram.com/divine_dev_hub/'],
    ];
@endphp

<footer class="bg-surface-dark text-white">
    <div class="page-container grid grid-cols-1 gap-10 py-16 sm:grid-cols-2 lg:grid-cols-5 lg:gap-8">
        <div class="sm:col-span-2 lg:col-span-2">
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
            <p class="mt-5 max-w-sm text-sm leading-relaxed text-white/70">
                Transforming ideas into digital reality — end-to-end software development, cloud-native applications and AI-driven solutions for businesses ready to scale.
            </p>
            <ul class="mt-6 flex items-center gap-3">
                @foreach ($socialLinks as $social)
                    <li>
                        <a
                            href="{{ $social['href'] }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="flex h-9 w-9 items-center justify-center rounded-full border border-white/15 text-white/70 transition hover:border-white/40 hover:text-white focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white"
                            aria-label="{{ $social['label'] }} (opens in a new tab)"
                        >
                            <span class="text-xs font-semibold">{{ mb_substr($social['label'], 0, 1) }}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>

        <nav aria-label="Company">
            <h2 class="text-sm font-semibold uppercase tracking-wide text-white/50">Company</h2>
            <ul class="mt-4 space-y-3 text-sm">
                <li><a href="#about" class="text-white/70 transition hover:text-white">About</a></li>
                <li><a href="https://divinedevhub.in/careers/" target="_blank" rel="noopener noreferrer" class="text-white/70 transition hover:text-white">Careers</a></li>
                <li><a href="#contact" class="text-white/70 transition hover:text-white">Contact</a></li>
            </ul>
        </nav>

        <nav aria-label="Services">
            <h2 class="text-sm font-semibold uppercase tracking-wide text-white/50">Services</h2>
            <ul class="mt-4 space-y-3 text-sm">
                @foreach ($serviceLinks as $service)
                    <li><a href="#services" class="text-white/70 transition hover:text-white">{{ $service }}</a></li>
                @endforeach
            </ul>
        </nav>

        <div>
            <h2 class="text-sm font-semibold uppercase tracking-wide text-white/50">Resources</h2>
            <ul class="mt-4 space-y-3 text-sm">
                <li><a href="#technologies" class="text-white/70 transition hover:text-white">Technologies</a></li>
                <li><a href="#blog" class="text-white/70 transition hover:text-white">Blog</a></li>
                <li><a href="#faq" class="text-white/70 transition hover:text-white">FAQs</a></li>
            </ul>

            <h2 class="mt-6 text-sm font-semibold uppercase tracking-wide text-white/50">Contact</h2>
            <ul class="mt-4 space-y-3 text-sm text-white/70">
                <li><a href="mailto:info@divinedevhub.in" class="transition hover:text-white">info@divinedevhub.in</a></li>
                <li class="leading-relaxed">304, Palladium Business Hub, Opposite 4D Square Mall, Chandkheda, Ahmedabad, Gujarat 382424</li>
            </ul>
        </div>
    </div>

    <div class="border-t border-white/10">
        <div class="page-container flex flex-col items-center justify-between gap-4 py-6 text-xs text-white/50 sm:flex-row">
            <p>&copy; {{ now()->year }} Divine Dev Hub. All rights reserved.</p>
            <a href="https://divinedevhub.in/terms-condition/" target="_blank" rel="noopener noreferrer" class="transition hover:text-white">Terms &amp; Conditions</a>
        </div>
    </div>
</footer>
