@php
    // Services is the single source of truth in App\Support\Content — the
    // header, footer and homepage used to each keep their own copy of this
    // list, out of sync with each other. Don't reintroduce a local copy here.
    $services = \App\Support\Content::services();

    // 'active' is computed server-side from the current route rather than by
    // watching scroll position — see resources/js/app.js for why that changed.
    $navLinks = [
        ['label' => 'Home', 'href' => route('home'), 'icon' => null, 'active' => request()->routeIs('home')],
        ['label' => 'Technologies', 'href' => route('technologies.index'), 'icon' => 'cpu', 'active' => request()->routeIs('technologies.*')],
        ['label' => 'Industries', 'href' => route('industries.index'), 'icon' => 'target', 'active' => request()->routeIs('industries.*')],
        ['label' => 'Our Work', 'href' => route('work.index'), 'icon' => 'monitor', 'active' => request()->routeIs('work.*')],
        ['label' => 'About', 'href' => route('about'), 'icon' => 'users', 'active' => request()->routeIs('about')],
        ['label' => 'Contact', 'href' => route('contact.show'), 'icon' => 'mail', 'active' => request()->routeIs('contact.*')],
    ];

    $servicesActive = request()->routeIs('services.*');
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
    :class="scrolled ? 'bg-white/90 backdrop-blur-md shadow-[0_1px_0_0_rgba(20,21,43,0.06),0_12px_30px_-18px_rgba(20,21,43,0.25)]' : 'bg-white/60 backdrop-blur-md'"
    class="fixed inset-x-0 top-0 z-50 border-b border-white/40 transition-all duration-300"
>
    <div class="page-container flex items-center justify-between transition-[height] duration-300" :class="scrolled ? 'h-16' : 'h-20'">
        <a href="/" class="group flex shrink-0 items-center" aria-label="Divine Dev Hub — Home">
            <img
                src="{{ asset('images/logo-divinedevhub.png') }}"
                alt="Divine Dev Hub"
                width="160"
                height="63"
                class="w-auto transition-all duration-300"
                :class="scrolled ? 'h-8 sm:h-9' : 'h-9 sm:h-11'"
                loading="eager"
                fetchpriority="high"
            >
        </a>

        <nav class="hidden items-center lg:flex" aria-label="Primary">
            <a
                href="/"
                class="nav-link group relative rounded-md px-3.5 py-2 text-sm font-medium transition hover:text-primary focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary {{ request()->routeIs('home') ? 'text-primary' : 'text-text-primary' }}"
                @if (request()->routeIs('home')) aria-current="page" @endif
            >
                Home
                <span class="pointer-events-none absolute inset-x-3.5 -bottom-0.5 h-px bg-primary transition-transform duration-300 ease-out group-hover:scale-x-100 {{ request()->routeIs('home') ? 'scale-x-100' : 'scale-x-0' }}" aria-hidden="true"></span>
            </a>

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
                    class="relative flex items-center gap-1.5 rounded-md px-3.5 py-2 text-sm font-medium transition hover:text-primary focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary {{ $servicesActive ? 'text-primary' : 'text-text-primary' }}"
                    aria-haspopup="true"
                    :aria-expanded="servicesOpen"
                    aria-controls="services-menu"
                    @click="toggleServices()"
                >
                    Services
                    <x-svg-icon name="chevron-down" class="h-3.5 w-3.5 transition-transform duration-200" x-bind:class="servicesOpen ? 'rotate-180' : ''" />
                    <span
                        class="pointer-events-none absolute inset-x-3.5 -bottom-0.5 h-px bg-primary transition-transform duration-300 ease-out"
                        :class="(servicesOpen || {{ $servicesActive ? 'true' : 'false' }}) ? 'scale-x-100' : 'scale-x-0'"
                        aria-hidden="true"
                    ></span>
                </button>

                <div
                    id="services-menu"
                    role="menu"
                    x-show="servicesOpen"
                    x-transition:enter="transition ease-out duration-200"
                    x-transition:enter-start="opacity-0 translate-y-2 scale-[0.98]"
                    x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                    x-transition:leave="transition ease-in duration-150"
                    x-transition:leave-start="opacity-100 translate-y-0 scale-100"
                    x-transition:leave-end="opacity-0 translate-y-2 scale-[0.98]"
                    class="absolute left-1/2 top-full mt-4 w-[38rem] max-w-[90vw] -translate-x-1/2 overflow-hidden rounded-2xl border border-border bg-white shadow-[0_24px_60px_-20px_rgba(16,17,43,0.25)]"
                    style="display: none;"
                >
                    <div class="h-0.5 w-full bg-linear-to-r from-primary via-primary-light to-accent"></div>
                    <div class="grid grid-cols-[13rem_1fr]">
                        <div class="flex flex-col justify-between bg-surface p-6">
                            <div>
                                <p class="text-xs font-semibold uppercase tracking-wide text-primary">Our Services</p>
                                <p class="mt-3 text-lg font-semibold leading-snug text-text-primary">Full-cycle software delivery</p>
                                <p class="mt-2 text-sm leading-relaxed text-text-secondary">From first release to long-term platform growth.</p>
                            </div>
                            <a href="{{ route('services.index') }}" @click="closeServices()" class="group mt-6 inline-flex items-center gap-1.5 rounded-md text-sm font-semibold text-primary focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary">
                                View all
                                <x-svg-icon name="arrow-right" class="h-4 w-4 transition-transform group-hover:translate-x-0.5" />
                            </a>
                        </div>

                        <div class="grid grid-cols-2 gap-0.5 p-2" role="none">
                            @foreach ($services as $service)
                                <a
                                    href="{{ route('services.show', $service['slug']) }}"
                                    role="menuitem"
                                    @click="closeServices()"
                                    class="group flex items-start gap-3 rounded-xl p-3 transition-all duration-200 hover:translate-x-0.5 hover:bg-surface focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary"
                                >
                                    <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-primary-50 text-primary transition group-hover:bg-primary group-hover:text-white">
                                        <x-svg-icon :name="$service['icon']" class="h-4 w-4" />
                                    </span>
                                    <span class="min-w-0">
                                        <span class="flex items-center gap-1 text-sm font-semibold text-text-primary">
                                            {{ $service['title'] }}
                                            <x-svg-icon name="arrow-up-right" class="h-3 w-3 -translate-x-1 text-primary opacity-0 transition-all duration-200 group-hover:translate-x-0 group-hover:opacity-100" />
                                        </span>
                                        <span class="mt-0.5 block text-xs leading-relaxed text-text-secondary">{{ $service['description'] }}</span>
                                    </span>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            @foreach ($navLinks as $link)
                @if ($link['label'] !== 'Home')
                    <a
                        href="{{ $link['href'] }}"
                        class="nav-link group relative rounded-md px-3.5 py-2 text-sm font-medium transition hover:text-primary focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary {{ $link['active'] ? 'text-primary' : 'text-text-primary' }}"
                        @if ($link['active']) aria-current="page" @endif
                    >
                        {{ $link['label'] }}
                        <span class="pointer-events-none absolute inset-x-3.5 -bottom-0.5 h-px bg-primary transition-transform duration-300 ease-out group-hover:scale-x-100 {{ $link['active'] ? 'scale-x-100' : 'scale-x-0' }}" aria-hidden="true"></span>
                    </a>
                @endif
            @endforeach
        </nav>

        <div class="flex items-center gap-3">
            @if (config('company.phone'))
                <a
                    href="tel:{{ preg_replace('/[^0-9+]/', '', config('company.phone')) }}"
                    class="hidden items-center gap-2 rounded-md px-2 py-2 text-sm font-medium text-text-primary transition hover:text-primary focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary xl:inline-flex"
                >
                    <span class="relative flex h-2 w-2">
                        <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-success opacity-75"></span>
                        <span class="relative inline-flex h-2 w-2 rounded-full bg-success"></span>
                    </span>
                    {{ config('company.phone') }}
                </a>
            @endif

            <x-button href="{{ route('contact.show') }}" class="group hidden lg:inline-flex">
                Get in Touch
                <x-svg-icon name="arrow-right" class="h-4 w-4 transition-transform duration-200 group-hover:translate-x-0.5" />
            </x-button>

            <button
                type="button"
                class="inline-flex h-10 w-10 items-center justify-center rounded-md text-text-primary focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary lg:hidden"
                aria-label="Toggle menu"
                aria-controls="mobile-menu"
                :aria-expanded="mobileOpen"
                @click="mobileOpen = !mobileOpen"
            >
                <x-svg-icon name="menu" x-show="!mobileOpen" class="h-6 w-6" />
                <x-svg-icon name="close" x-show="mobileOpen" style="display: none;" class="h-6 w-6" />
            </button>
        </div>
    </div>

    <div
        id="mobile-menu"
        x-show="mobileOpen"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 -translate-y-2"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-2"
        class="max-h-[calc(100dvh-5rem)] overflow-y-auto border-t border-border bg-white lg:hidden"
        style="display: none;"
    >
        <nav class="page-container flex flex-col gap-1 py-4" aria-label="Mobile">
            <a href="/" @click="mobileOpen = false" class="flex items-center gap-3 rounded-lg px-3 py-3 text-base font-medium text-text-primary hover:bg-surface focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary">
                <x-svg-icon name="home" class="h-5 w-5 text-primary" /> Home
            </a>
            <a href="{{ route('services.index') }}" @click="mobileOpen = false" class="flex items-center gap-3 rounded-lg px-3 py-3 text-base font-medium text-text-primary hover:bg-surface focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary">
                <x-svg-icon name="layers" class="h-5 w-5 text-primary" /> Services
            </a>
            @foreach ($navLinks as $link)
                @if (! in_array($link['label'], ['Home', 'Services']))
                    <a href="{{ $link['href'] }}" @click="mobileOpen = false" class="flex items-center gap-3 rounded-lg px-3 py-3 text-base font-medium text-text-primary hover:bg-surface focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary">
                        <x-svg-icon :name="$link['icon']" class="h-5 w-5 text-primary" /> {{ $link['label'] }}
                    </a>
                @endif
            @endforeach

            @if (config('company.phone'))
                <a href="tel:{{ preg_replace('/[^0-9+]/', '', config('company.phone')) }}" @click="mobileOpen = false" class="flex items-center gap-3 rounded-lg px-3 py-3 text-base font-medium text-text-primary hover:bg-surface focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary">
                    <x-svg-icon name="smartphone" class="h-5 w-5 text-primary" /> {{ config('company.phone') }}
                </a>
            @endif

            <x-button href="{{ route('contact.show') }}" class="mt-3 justify-center" @click="mobileOpen = false">Get in Touch</x-button>
        </nav>
    </div>
</header>
