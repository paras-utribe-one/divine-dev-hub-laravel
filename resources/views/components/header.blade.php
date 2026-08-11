@php
    $services = [
        'Web Development',
        'Software Services',
        'CRM Solutions',
        'App Development',
        'E-Commerce',
        'Odoo Services',
        'Magento Services',
    ];

    $navLinks = [
        ['label' => 'Home', 'href' => '/'],
        ['label' => 'Technologies', 'href' => '#technologies'],
        ['label' => 'Industries', 'href' => '#industries'],
        ['label' => 'Portfolio', 'href' => '#portfolio'],
        ['label' => 'About', 'href' => '#about'],
        ['label' => 'Contact', 'href' => '#contact'],
    ];
@endphp

<header
    x-data="{
        scrolled: false,
        mobileOpen: false,
        servicesOpen: false,
        closeTimer: null,
        openServices() { clearTimeout(this.closeTimer); this.servicesOpen = true },
        scheduleClose() { this.closeTimer = setTimeout(() => { this.servicesOpen = false }, 220) },
        toggleServices() { this.servicesOpen = !this.servicesOpen },
        closeServices() { clearTimeout(this.closeTimer); this.servicesOpen = false },
        handleFocusOut(event) {
            if (!this.$refs.servicesGroup.contains(event.relatedTarget)) {
                this.closeServices()
            }
        },
    }"
    x-init="window.addEventListener('scroll', () => { scrolled = window.scrollY > 16 }, { passive: true })"
    @keydown.escape.window="mobileOpen = false; closeServices()"
    x-effect="document.documentElement.classList.toggle('overflow-hidden', mobileOpen)"
    :class="scrolled ? 'bg-white/95 backdrop-blur-sm shadow-sm border-b border-border' : 'bg-white/70 backdrop-blur-sm border-b border-transparent'"
    class="fixed inset-x-0 top-0 z-50 transition-colors duration-300"
>
    <div class="page-container flex h-18 items-center justify-between py-3">
        <a href="/" class="flex shrink-0 items-center" aria-label="Divine Dev Hub — Home">
            <img
                src="{{ asset('images/logo-divinedevhub.png') }}"
                alt="Divine Dev Hub"
                width="160"
                height="63"
                class="h-10 w-auto sm:h-12"
                loading="eager"
                fetchpriority="high"
            >
        </a>

        <nav class="hidden items-center gap-1 lg:flex" aria-label="Primary">
            <a
                href="/"
                class="rounded-md px-3 py-2 text-sm font-medium text-text-primary transition hover:text-primary focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary"
            >Home</a>

            <div
                class="relative"
                x-ref="servicesGroup"
                @pointerenter="if ($event.pointerType === 'mouse') openServices()"
                @pointerleave="if ($event.pointerType === 'mouse') scheduleClose()"
                @focusin="openServices()"
                @focusout="handleFocusOut($event)"
            >
                <button
                    type="button"
                    x-ref="servicesTrigger"
                    class="flex items-center gap-1 rounded-md px-3 py-2 text-sm font-medium text-text-primary transition hover:text-primary focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary"
                    aria-haspopup="true"
                    :aria-expanded="servicesOpen"
                    aria-controls="services-menu"
                    @click="toggleServices()"
                >
                    Services
                    <svg class="h-3.5 w-3.5 transition-transform duration-200" :class="servicesOpen ? 'rotate-180' : ''" viewBox="0 0 12 12" fill="none" aria-hidden="true">
                        <path d="M2.5 4.5L6 8L9.5 4.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>

                <div
                    id="services-menu"
                    role="menu"
                    x-show="servicesOpen"
                    x-transition:enter="transition ease-out duration-150"
                    x-transition:enter-start="opacity-0 translate-y-1"
                    x-transition:enter-end="opacity-100 translate-y-0"
                    x-transition:leave="transition ease-in duration-100"
                    x-transition:leave-start="opacity-100 translate-y-0"
                    x-transition:leave-end="opacity-0 translate-y-1"
                    class="absolute left-0 top-full w-72 rounded-xl border border-border bg-white p-2 shadow-lg"
                    style="display: none;"
                >
                    @foreach ($services as $service)
                        <a
                            href="#services"
                            role="menuitem"
                            @click="closeServices()"
                            class="block rounded-lg px-3 py-2 text-sm text-text-secondary transition hover:bg-surface hover:text-primary focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary"
                        >{{ $service }}</a>
                    @endforeach
                </div>
            </div>

            @foreach ($navLinks as $link)
                @if ($link['label'] !== 'Home')
                    <a
                        href="{{ $link['href'] }}"
                        class="rounded-md px-3 py-2 text-sm font-medium text-text-primary transition hover:text-primary focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary"
                    >{{ $link['label'] }}</a>
                @endif
            @endforeach
        </nav>

        <div class="flex items-center gap-2">
            <x-button href="#contact" class="hidden lg:inline-flex">Get in Touch</x-button>

            <button
                type="button"
                class="inline-flex h-10 w-10 items-center justify-center rounded-md text-text-primary lg:hidden"
                aria-label="Toggle menu"
                aria-controls="mobile-menu"
                :aria-expanded="mobileOpen"
                @click="mobileOpen = !mobileOpen"
            >
                <svg x-show="!mobileOpen" class="h-6 w-6" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                    <path d="M4 6h16M4 12h16M4 18h16" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" />
                </svg>
                <svg x-show="mobileOpen" style="display: none;" class="h-6 w-6" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                    <path d="M6 6l12 12M18 6L6 18" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" />
                </svg>
            </button>
        </div>
    </div>

    <div
        id="mobile-menu"
        x-show="mobileOpen"
        x-transition:enter="transition ease-out duration-150"
        x-transition:enter-start="opacity-0 -translate-y-2"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-100"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-2"
        class="border-t border-border bg-white lg:hidden"
        style="display: none;"
    >
        <nav class="page-container flex flex-col gap-1 py-4" aria-label="Mobile">
            <a href="/" @click="mobileOpen = false" class="rounded-md px-3 py-3 text-base font-medium text-text-primary hover:bg-surface">Home</a>
            <a href="#services" @click="mobileOpen = false" class="rounded-md px-3 py-3 text-base font-medium text-text-primary hover:bg-surface">Services</a>
            @foreach ($navLinks as $link)
                @if (! in_array($link['label'], ['Home', 'Services']))
                    <a href="{{ $link['href'] }}" @click="mobileOpen = false" class="rounded-md px-3 py-3 text-base font-medium text-text-primary hover:bg-surface">{{ $link['label'] }}</a>
                @endif
            @endforeach
            <x-button href="#contact" class="mt-2 justify-center" @click="mobileOpen = false">Get in Touch</x-button>
        </nav>
    </div>
</header>
