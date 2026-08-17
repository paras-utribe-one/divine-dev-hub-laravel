<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <script>document.documentElement.classList.add('js');</script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Style Guide (Internal) — Divine Dev Hub</title>
    {{-- Internal dev reference — never meant to be indexed or crawled. This
         is the third layer of protection alongside the local-only guard in
         PageController::styleguide() and the sitemap.xml exclusion. --}}
    <meta name="robots" content="noindex, nofollow">
    <link rel="icon" href="{{ asset('favicon.ico') }}" sizes="any">

    @fonts

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <style>html { background-color: #ffffff; }</style>
    @endif
</head>
{{-- Deliberately not @extends('layouts.app'): this is an internal reference
     tool, not a marketing page, so it doesn't carry the site's fixed header
     or footer — see docs/build-log.md for why. It still loads the exact
     same compiled CSS/JS as every real page, so every component below
     renders with its real styles and real behaviour. --}}
<body class="bg-background font-sans text-text-primary antialiased">

    <div class="lg:flex">
        {{-- Sidebar nav — hidden below lg, matching the reference styleguide's
             own breakpoint choice; this is a dev tool, not something that
             needs a polished mobile nav. --}}
        <aside class="sticky top-0 hidden h-screen w-64 shrink-0 overflow-y-auto border-r border-border bg-surface p-6 lg:block">
            <p class="text-sm font-bold text-text-primary">Divine Dev Hub</p>
            <p class="text-xs text-text-secondary">Style Guide <span class="text-muted">(internal)</span></p>

            <nav class="mt-8 space-y-6 text-sm" aria-label="Style guide sections">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-wide text-muted">Foundations</p>
                    <ul class="mt-2 space-y-1">
                        <li><a href="#colour" class="block rounded-md px-2 py-1.5 text-text-secondary hover:bg-white hover:text-primary">Colour</a></li>
                        <li><a href="#typography" class="block rounded-md px-2 py-1.5 text-text-secondary hover:bg-white hover:text-primary">Typography</a></li>
                        <li><a href="#spacing" class="block rounded-md px-2 py-1.5 text-text-secondary hover:bg-white hover:text-primary">Spacing</a></li>
                        <li><a href="#radius" class="block rounded-md px-2 py-1.5 text-text-secondary hover:bg-white hover:text-primary">Radius</a></li>
                        <li><a href="#shadows" class="block rounded-md px-2 py-1.5 text-text-secondary hover:bg-white hover:text-primary">Shadows</a></li>
                        <li><a href="#icons" class="block rounded-md px-2 py-1.5 text-text-secondary hover:bg-white hover:text-primary">Icons</a></li>
                        <li><a href="#rhythm" class="block rounded-md px-2 py-1.5 text-text-secondary hover:bg-white hover:text-primary">Section rhythm</a></li>
                        <li><a href="#motion" class="block rounded-md px-2 py-1.5 text-text-secondary hover:bg-white hover:text-primary">Motion</a></li>
                    </ul>
                </div>
                <div>
                    <p class="text-xs font-semibold uppercase tracking-wide text-muted">Components</p>
                    <ul class="mt-2 space-y-1">
                        <li><a href="#buttons" class="block rounded-md px-2 py-1.5 text-text-secondary hover:bg-white hover:text-primary">Buttons</a></li>
                        <li><a href="#placeholder-tag" class="block rounded-md px-2 py-1.5 text-text-secondary hover:bg-white hover:text-primary">Placeholder Tag</a></li>
                        <li><a href="#section-heading" class="block rounded-md px-2 py-1.5 text-text-secondary hover:bg-white hover:text-primary">Section Heading</a></li>
                        <li><a href="#page-hero" class="block rounded-md px-2 py-1.5 text-text-secondary hover:bg-white hover:text-primary">Page Hero</a></li>
                        <li><a href="#breadcrumb" class="block rounded-md px-2 py-1.5 text-text-secondary hover:bg-white hover:text-primary">Breadcrumb</a></li>
                        <li><a href="#stat-item" class="block rounded-md px-2 py-1.5 text-text-secondary hover:bg-white hover:text-primary">Stat Item</a></li>
                        <li><a href="#process-step" class="block rounded-md px-2 py-1.5 text-text-secondary hover:bg-white hover:text-primary">Process Step</a></li>
                        <li><a href="#cards" class="block rounded-md px-2 py-1.5 text-text-secondary hover:bg-white hover:text-primary">Cards</a></li>
                        <li><a href="#cta-banner" class="block rounded-md px-2 py-1.5 text-text-secondary hover:bg-white hover:text-primary">CTA Banner</a></li>
                        <li><a href="#faq-item" class="block rounded-md px-2 py-1.5 text-text-secondary hover:bg-white hover:text-primary">FAQ Item</a></li>
                        <li><a href="#empty-state" class="block rounded-md px-2 py-1.5 text-text-secondary hover:bg-white hover:text-primary">Empty State</a></li>
                        <li><a href="#trust-badges" class="block rounded-md px-2 py-1.5 text-text-secondary hover:bg-white hover:text-primary">Trust Badge Row</a></li>
                        <li><a href="#utility" class="block rounded-md px-2 py-1.5 text-text-secondary hover:bg-white hover:text-primary">Utility widgets</a></li>
                    </ul>
                </div>
            </nav>

            <a href="{{ route('home') }}" class="mt-8 inline-flex items-center gap-1.5 text-xs font-semibold text-primary">
                <x-svg-icon name="arrow-right" class="h-3 w-3 rotate-180" />
                Back to the live site
            </a>
        </aside>

        <main class="min-w-0 flex-1">
            <div class="border-b border-border bg-white px-6 py-8 lg:px-16 lg:py-14">
                <h1 class="text-3xl font-semibold tracking-tight text-text-primary sm:text-4xl">Style Guide</h1>
                <p class="mt-3 max-w-2xl text-base leading-relaxed text-text-secondary">
                    Every token and component actually established by this build, rendered live from the real Blade components and the real <code class="rounded bg-surface px-1.5 py-0.5 text-sm">app.css</code> theme — not a hand-maintained recreation. If something changes in the codebase, this page changes with it wherever it renders a real component; only the Foundations swatches (colour hex values, icon names) are a manually-kept mirror of <code class="rounded bg-surface px-1.5 py-0.5 text-sm">resources/css/app.css</code> and <code class="rounded bg-surface px-1.5 py-0.5 text-sm">svg-icon.blade.php</code>, noted where relevant below.
                </p>
                <p class="mt-4 inline-flex items-center gap-2 rounded-lg border border-dashed border-accent/50 bg-accent/5 px-3 py-2 text-xs text-text-secondary">
                    <x-svg-icon name="shield" class="h-4 w-4 shrink-0 text-accent" />
                    Internal only — local-environment gated, <code>noindex,nofollow</code>, excluded from the sitemap, not linked from site navigation.
                </p>
            </div>

            <div class="space-y-20 px-6 py-14 lg:px-16">

                {{-- ============================================================ --}}
                {{-- FOUNDATIONS --}}
                {{-- ============================================================ --}}

                <section id="colour" class="scroll-mt-8">
                    <h2 class="text-2xl font-semibold text-text-primary">Colour</h2>
                    <p class="mt-2 max-w-2xl text-sm text-text-secondary">Every token defined in <code class="rounded bg-surface px-1.5 py-0.5">resources/css/app.css</code>'s <code class="rounded bg-surface px-1.5 py-0.5">@theme</code> block. Sampled originally from the logo's ink colour (<code class="rounded bg-surface px-1.5 py-0.5">#2e3192</code>).</p>

                    <div class="mt-8 space-y-8">
                        @foreach ($colorTokens as $group => $tokens)
                            <div>
                                <p class="text-xs font-semibold uppercase tracking-wide text-muted">{{ $group }}</p>
                                <div class="mt-3 grid grid-cols-2 gap-4 sm:grid-cols-3 lg:grid-cols-4">
                                    @foreach ($tokens as $token)
                                        <div class="overflow-hidden rounded-xl border border-border">
                                            <div class="h-16" style="background-color: {{ $token['hex'] }}"></div>
                                            <div class="bg-white p-3">
                                                <p class="text-xs font-semibold text-text-primary">{{ $token['name'] }}</p>
                                                <p class="mt-0.5 font-mono text-[11px] text-text-secondary">{{ $token['hex'] }}</p>
                                                <p class="mt-0.5 truncate font-mono text-[10px] text-muted" title="{{ $token['var'] }}">{{ $token['var'] }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </section>

                <section id="typography" class="scroll-mt-8">
                    <h2 class="text-2xl font-semibold text-text-primary">Typography</h2>
                    <p class="mt-2 max-w-2xl text-sm text-text-secondary">
                        One family site-wide: <strong>Instrument Sans</strong>, self-hosted via the Bunny Fonts Vite plugin. No fluid <code class="rounded bg-surface px-1.5 py-0.5">clamp()</code> type scale exists in this codebase — sizes step at Tailwind's standard breakpoints (e.g. <code class="rounded bg-surface px-1.5 py-0.5">text-4xl sm:text-5xl</code>), not a continuously fluid scale.
                    </p>

                    <div class="mt-8 divide-y divide-border border-t border-border">
                        <div class="flex flex-wrap items-baseline gap-4 py-4">
                            <span class="w-28 shrink-0 font-mono text-xs text-muted">text-8xl</span>
                            <span class="text-8xl font-bold tracking-tight text-text-primary">2014</span>
                        </div>
                        <div class="flex flex-wrap items-baseline gap-4 py-4">
                            <span class="w-28 shrink-0 font-mono text-xs text-muted">text-5xl</span>
                            <span class="text-5xl font-semibold tracking-tight text-text-primary">Section headline</span>
                        </div>
                        <div class="flex flex-wrap items-baseline gap-4 py-4">
                            <span class="w-28 shrink-0 font-mono text-xs text-muted">text-4xl</span>
                            <span class="text-4xl font-semibold tracking-tight text-text-primary">Page hero title</span>
                        </div>
                        <div class="flex flex-wrap items-baseline gap-4 py-4">
                            <span class="w-28 shrink-0 font-mono text-xs text-muted">text-3xl</span>
                            <span class="text-3xl font-semibold tracking-tight text-text-primary">Section heading</span>
                        </div>
                        <div class="flex flex-wrap items-baseline gap-4 py-4">
                            <span class="w-28 shrink-0 font-mono text-xs text-muted">text-2xl</span>
                            <span class="text-2xl font-semibold text-text-primary">Sub-heading</span>
                        </div>
                        <div class="flex flex-wrap items-baseline gap-4 py-4">
                            <span class="w-28 shrink-0 font-mono text-xs text-muted">text-lg</span>
                            <span class="text-lg leading-relaxed text-text-secondary">Lead paragraph — the sentence under a heading.</span>
                        </div>
                        <div class="flex flex-wrap items-baseline gap-4 py-4">
                            <span class="w-28 shrink-0 font-mono text-xs text-muted">text-base</span>
                            <span class="text-base leading-relaxed text-text-secondary">Body copy — the default reading size.</span>
                        </div>
                        <div class="flex flex-wrap items-baseline gap-4 py-4">
                            <span class="w-28 shrink-0 font-mono text-xs text-muted">text-sm</span>
                            <span class="text-sm text-text-secondary">Secondary text, card descriptions, nav links.</span>
                        </div>
                        <div class="flex flex-wrap items-baseline gap-4 py-4">
                            <span class="w-28 shrink-0 font-mono text-xs text-muted">text-xs</span>
                            <span class="text-xs uppercase tracking-wide text-muted">Overline / eyebrow labels</span>
                        </div>
                    </div>

                    <div class="mt-8 grid gap-4 sm:grid-cols-3">
                        <div class="rounded-xl border border-border p-4">
                            <p class="font-medium text-text-primary">font-medium (500)</p>
                            <p class="mt-1 text-xs text-text-secondary">Self-hosted. Used for nav links, labels.</p>
                        </div>
                        <div class="rounded-xl border border-border p-4">
                            <p class="font-semibold text-text-primary">font-semibold (600)</p>
                            <p class="mt-1 text-xs text-text-secondary">Self-hosted. The workhorse weight — most headings and buttons.</p>
                        </div>
                        <div class="rounded-xl border border-dashed border-accent/60 bg-accent/5 p-4">
                            <p class="font-bold text-text-primary">font-bold (700)</p>
                            <p class="mt-1 text-xs text-text-secondary"><strong>Not self-hosted</strong> — only 400/500/600 are loaded (see <code class="text-[11px]">vite.config.js</code>). Used in 3 places (large stat numerals); renders as the browser's synthesized bold, not a true designed 700 weight. Worth knowing before using it elsewhere.</p>
                        </div>
                    </div>
                </section>

                <section id="spacing" class="scroll-mt-8">
                    <h2 class="text-2xl font-semibold text-text-primary">Spacing</h2>
                    <p class="mt-2 max-w-2xl text-sm text-text-secondary">Tailwind's default scale (4px base unit), used as-is — no custom spacing tokens are defined. These are the steps actually seen across the component library, not the full Tailwind scale.</p>

                    <div class="mt-6 space-y-2.5">
                        <div class="flex items-center gap-4"><span class="w-20 shrink-0 font-mono text-xs text-muted">1 · 4px</span><div class="h-3 w-1 rounded bg-primary"></div></div>
                        <div class="flex items-center gap-4"><span class="w-20 shrink-0 font-mono text-xs text-muted">2 · 8px</span><div class="h-3 w-2 rounded bg-primary"></div></div>
                        <div class="flex items-center gap-4"><span class="w-20 shrink-0 font-mono text-xs text-muted">3 · 12px</span><div class="h-3 w-3 rounded bg-primary"></div></div>
                        <div class="flex items-center gap-4"><span class="w-20 shrink-0 font-mono text-xs text-muted">4 · 16px</span><div class="h-3 w-4 rounded bg-primary"></div></div>
                        <div class="flex items-center gap-4"><span class="w-20 shrink-0 font-mono text-xs text-muted">6 · 24px</span><div class="h-3 w-6 rounded bg-primary"></div></div>
                        <div class="flex items-center gap-4"><span class="w-20 shrink-0 font-mono text-xs text-muted">8 · 32px</span><div class="h-3 w-8 rounded bg-primary"></div></div>
                        <div class="flex items-center gap-4"><span class="w-20 shrink-0 font-mono text-xs text-muted">10 · 40px</span><div class="h-3 w-10 rounded bg-primary"></div></div>
                        <div class="flex items-center gap-4"><span class="w-20 shrink-0 font-mono text-xs text-muted">12 · 48px</span><div class="h-3 w-12 rounded bg-primary"></div></div>
                        <div class="flex items-center gap-4"><span class="w-20 shrink-0 font-mono text-xs text-muted">16 · 64px</span><div class="h-3 w-16 rounded bg-primary"></div></div>
                        <div class="flex items-center gap-4"><span class="w-20 shrink-0 font-mono text-xs text-muted">20 · 80px</span><div class="h-3 w-20 rounded bg-primary"></div></div>
                        <div class="flex items-center gap-4"><span class="w-20 shrink-0 font-mono text-xs text-muted">28 · 112px</span><div class="h-3 w-28 rounded bg-primary"></div></div>
                        <div class="flex items-center gap-4"><span class="w-20 shrink-0 font-mono text-xs text-muted">32 · 128px</span><div class="h-3 w-32 rounded bg-primary"></div></div>
                    </div>
                    <p class="mt-4 text-xs text-text-secondary">Common gutters: <code class="rounded bg-surface px-1.5 py-0.5">gap-5</code>/<code class="rounded bg-surface px-1.5 py-0.5">gap-6</code> for card grids · <code class="rounded bg-surface px-1.5 py-0.5">gap-14</code> for two-column page layouts · section vertical padding runs <code class="rounded bg-surface px-1.5 py-0.5">py-16 sm:py-20</code> (tight) up to <code class="rounded bg-surface px-1.5 py-0.5">py-24 sm:py-32</code> (homepage sections).</p>
                </section>

                <section id="radius" class="scroll-mt-8">
                    <h2 class="text-2xl font-semibold text-text-primary">Radius</h2>
                    <p class="mt-2 max-w-2xl text-sm text-text-secondary">One radius per component type, applied consistently everywhere that component appears — not a free choice per page.</p>

                    <div class="mt-6 grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
                        <div class="flex items-center gap-4 rounded-xl border border-border p-4">
                            <div class="h-14 w-14 shrink-0 rounded-full bg-primary"></div>
                            <div><p class="font-mono text-xs font-semibold text-text-primary">rounded-full</p><p class="text-xs text-text-secondary">Buttons (pill), pills, avatars, icon circles</p></div>
                        </div>
                        <div class="flex items-center gap-4 rounded-xl border border-border p-4">
                            <div class="h-14 w-14 shrink-0 rounded-2xl bg-primary"></div>
                            <div><p class="font-mono text-xs font-semibold text-text-primary">rounded-2xl</p><p class="text-xs text-text-secondary">Cards — the most common radius in the codebase</p></div>
                        </div>
                        <div class="flex items-center gap-4 rounded-xl border border-border p-4">
                            <div class="h-14 w-14 shrink-0 rounded-xl bg-primary"></div>
                            <div><p class="font-mono text-xs font-semibold text-text-primary">rounded-xl</p><p class="text-xs text-text-secondary">Icon tiles, secondary cards, form inputs</p></div>
                        </div>
                        <div class="flex items-center gap-4 rounded-xl border border-border p-4">
                            <div class="h-14 w-14 shrink-0 rounded-lg bg-primary"></div>
                            <div><p class="font-mono text-xs font-semibold text-text-primary">rounded-lg</p><p class="text-xs text-text-secondary">Buttons (default), inputs</p></div>
                        </div>
                        <div class="flex items-center gap-4 rounded-xl border border-border p-4">
                            <div class="h-14 w-14 shrink-0 rounded-md bg-primary"></div>
                            <div><p class="font-mono text-xs font-semibold text-text-primary">rounded-md</p><p class="text-xs text-text-secondary">Small nav/menu items</p></div>
                        </div>
                        <div class="flex items-center gap-4 rounded-xl border border-border p-4">
                            <div class="h-14 w-14 shrink-0 rounded-3xl bg-primary"></div>
                            <div><p class="font-mono text-xs font-semibold text-text-primary">rounded-3xl</p><p class="text-xs text-text-secondary">Large feature panels (CTA banner)</p></div>
                        </div>
                    </div>
                </section>

                <section id="shadows" class="scroll-mt-8">
                    <h2 class="text-2xl font-semibold text-text-primary">Shadows &amp; elevation</h2>
                    <p class="mt-2 max-w-2xl text-sm text-text-secondary">Resting elevation uses plain Tailwind shadow utilities (<code class="rounded bg-surface px-1.5 py-0.5">shadow-sm</code>, occasionally <code class="rounded bg-surface px-1.5 py-0.5">shadow-lg shadow-secondary/10</code> on dark cards). Hover/lift states use two shared, brand-tinted utilities defined once in <code class="rounded bg-surface px-1.5 py-0.5">app.css</code> — <code class="rounded bg-surface px-1.5 py-0.5">.shadow-elevate-light</code> for cards on light surfaces and <code class="rounded bg-surface px-1.5 py-0.5">.shadow-elevate-dark</code> for cards on/made of the dark secondary surface — rather than each component hand-picking its own tint.</p>

                    <div class="mt-6 grid grid-cols-2 gap-6 sm:grid-cols-4">
                        <div class="flex h-20 items-center justify-center rounded-xl bg-white shadow-sm"><span class="font-mono text-xs text-text-secondary">shadow-sm</span></div>
                        <div class="flex h-20 items-center justify-center rounded-xl bg-white shadow-md"><span class="font-mono text-xs text-text-secondary">shadow-md</span></div>
                        <div class="flex h-20 items-center justify-center rounded-xl bg-white shadow-lg"><span class="font-mono text-xs text-text-secondary">shadow-lg</span></div>
                        <div class="flex h-20 items-center justify-center rounded-xl bg-white shadow-xl"><span class="font-mono text-xs text-text-secondary">shadow-xl</span></div>
                    </div>
                    <div class="mt-4 grid gap-4 sm:grid-cols-2">
                        <div class="flex h-20 items-center justify-center rounded-xl bg-white shadow-elevate-light">
                            <span class="font-mono text-xs text-text-secondary">.shadow-elevate-light <span class="text-muted">— card hover, light surfaces</span></span>
                        </div>
                        <div class="flex h-20 items-center justify-center rounded-xl bg-secondary shadow-elevate-dark">
                            <span class="font-mono text-xs text-white/70">.shadow-elevate-dark <span class="text-white/40">— card hover, dark surfaces</span></span>
                        </div>
                    </div>
                </section>

                <section id="icons" class="scroll-mt-8">
                    <h2 class="text-2xl font-semibold text-text-primary">Icons</h2>
                    <p class="mt-2 max-w-2xl text-sm text-text-secondary">
                        {{ count($iconNames) }} hand-authored icons, all rendered through <code class="rounded bg-surface px-1.5 py-0.5">&lt;x-svg-icon&gt;</code> — one consistent 24×24 viewBox, 1.6px stroke. Every icon below is the real component, not a copy.
                    </p>

                    <div class="mt-6 grid grid-cols-3 gap-3 sm:grid-cols-5 lg:grid-cols-6">
                        @foreach ($iconNames as $iconName)
                            <div class="flex flex-col items-center gap-2 rounded-xl border border-border p-4">
                                <x-svg-icon :name="$iconName" class="h-5 w-5 text-primary" />
                                <span class="text-center font-mono text-[10px] text-text-secondary">{{ $iconName }}</span>
                            </div>
                        @endforeach
                    </div>
                </section>

                <section id="rhythm" class="scroll-mt-8">
                    <h2 class="text-2xl font-semibold text-text-primary">Section rhythm</h2>
                    <p class="mt-2 max-w-2xl text-sm text-text-secondary">Pages alternate white / surface / dark bands so new pages don't default to feeling flatter than the homepage (strategy doc, Part 2.4). Not a hard rule enforced in code — a convention to follow when adding sections.</p>

                    <div class="mt-6 overflow-hidden rounded-xl border border-border">
                        <div class="flex h-16 items-center justify-center bg-white text-xs font-semibold text-text-secondary">bg-white</div>
                        <div class="flex h-16 items-center justify-center bg-surface text-xs font-semibold text-text-secondary">bg-surface</div>
                        <div class="flex h-16 items-center justify-center bg-white text-xs font-semibold text-text-secondary">bg-white</div>
                        <div class="flex h-16 items-center justify-center bg-secondary text-xs font-semibold text-white">bg-secondary (dark — max 2 in a row)</div>
                        <div class="flex h-16 items-center justify-center bg-surface text-xs font-semibold text-text-secondary">bg-surface</div>
                    </div>
                </section>

                <section id="motion" class="scroll-mt-8">
                    <h2 class="text-2xl font-semibold text-text-primary">Motion</h2>
                    <p class="mt-2 max-w-2xl text-sm text-text-secondary">
                        A single shared <code class="rounded bg-surface px-1.5 py-0.5">IntersectionObserver</code> in <code class="rounded bg-surface px-1.5 py-0.5">resources/js/app.js</code> drives scroll reveals via three data attributes — <code class="rounded bg-surface px-1.5 py-0.5">data-reveal</code> (fade + rise), <code class="rounded bg-surface px-1.5 py-0.5">data-reveal-scale</code> (fade + scale, used for the final CTA), and <code class="rounded bg-surface px-1.5 py-0.5">data-reveal-line</code> (width sweep). Stagger is set per-element with a <code class="rounded bg-surface px-1.5 py-0.5">--reveal-delay</code> CSS variable.
                    </p>
                    <p class="mt-2 max-w-2xl text-sm text-text-secondary">
                        Progressive enhancement, not a dependency: elements are visible by default in the CSS. Only once <code class="rounded bg-surface px-1.5 py-0.5">app.js</code> confirms it booted (stamping <code class="rounded bg-surface px-1.5 py-0.5">.js</code> on <code class="rounded bg-surface px-1.5 py-0.5">&lt;html&gt;</code>) do they get hidden pre-reveal — so the page works fully with JS disabled. <code class="rounded bg-surface px-1.5 py-0.5">prefers-reduced-motion: reduce</code> is honoured globally, both for this system and for the CSS keyframe animations.
                    </p>
                    <p class="mt-2 max-w-2xl text-sm text-text-secondary">
                        Both the reveal transitions above and the hover/lift interactions below (cards, buttons) share one timing curve — <code class="rounded bg-surface px-1.5 py-0.5">--ease-premium: cubic-bezier(0.16, 1, 0.3, 1)</code> — defined once in <code class="rounded bg-surface px-1.5 py-0.5">app.css</code> and usable directly as the <code class="rounded bg-surface px-1.5 py-0.5">ease-premium</code> utility class.
                    </p>

                    <div data-reveal class="mt-6 flex h-24 items-center justify-center rounded-xl border border-dashed border-primary/40 bg-primary-50 text-sm font-medium text-primary">
                        This box has <code class="mx-1 rounded bg-white/60 px-1.5 py-0.5 font-mono text-xs">data-reveal</code> — scroll away and back to see it re-run.
                    </div>
                </section>

                {{-- ============================================================ --}}
                {{-- COMPONENTS --}}
                {{-- ============================================================ --}}

                <div class="border-t border-border pt-4">
                    <p class="text-xs font-semibold uppercase tracking-wide text-muted">Components</p>
                </div>

                <section id="buttons" class="scroll-mt-8">
                    <h2 class="text-2xl font-semibold text-text-primary">Buttons</h2>
                    <p class="mt-2 max-w-2xl text-sm text-text-secondary"><code class="rounded bg-surface px-1.5 py-0.5">&lt;x-button&gt;</code> — 4 variants via the <code class="rounded bg-surface px-1.5 py-0.5">variant</code> prop. Renders an <code class="rounded bg-surface px-1.5 py-0.5">&lt;a&gt;</code> when given <code class="rounded bg-surface px-1.5 py-0.5">href</code>, a real <code class="rounded bg-surface px-1.5 py-0.5">&lt;button&gt;</code> otherwise.</p>

                    <div class="mt-6 flex flex-wrap items-center gap-4 rounded-xl border border-border bg-white p-6">
                        <x-button variant="primary">Primary</x-button>
                        <x-button variant="secondary">Secondary</x-button>
                        <x-button variant="accent">Accent</x-button>
                    </div>
                    <div class="mt-4 flex flex-wrap items-center gap-4 rounded-xl bg-secondary p-6">
                        <x-button variant="inverse">Inverse (on dark)</x-button>
                    </div>
                </section>

                <section id="placeholder-tag" class="scroll-mt-8">
                    <h2 class="text-2xl font-semibold text-text-primary">Placeholder Tag</h2>
                    <p class="mt-2 max-w-2xl text-sm text-text-secondary"><code class="rounded bg-surface px-1.5 py-0.5">&lt;x-placeholder-tag&gt;</code> — added in the Phase-A placeholder-data pass. Stamped on any card currently showing fictional sample data instead of real content, so it can never be mistaken for real. See <code class="rounded bg-surface px-1.5 py-0.5">docs/build-log.md</code>.</p>
                    <div class="mt-6 rounded-xl border border-border bg-white p-6">
                        <x-placeholder-tag />
                    </div>
                </section>

                <section id="section-heading" class="scroll-mt-8">
                    <h2 class="text-2xl font-semibold text-text-primary">Section Heading</h2>
                    <p class="mt-2 max-w-2xl text-sm text-text-secondary"><code class="rounded bg-surface px-1.5 py-0.5">&lt;x-section-heading&gt;</code> — the standard overline / heading / supporting-line stack used at the top of most homepage sections. <code class="rounded bg-surface px-1.5 py-0.5">align="left"</code> (default) or <code class="rounded bg-surface px-1.5 py-0.5">align="center"</code>.</p>
                    <div class="mt-6 rounded-xl border border-border bg-white p-6">
                        <x-section-heading eyebrow="Example Overline" title="An example section heading" description="The supporting sentence goes here, describing the section in one line." />
                    </div>
                </section>

                <section id="page-hero" class="scroll-mt-8">
                    <h2 class="text-2xl font-semibold text-text-primary">Page Hero</h2>
                    <p class="mt-2 max-w-2xl text-sm text-text-secondary"><code class="rounded bg-surface px-1.5 py-0.5">&lt;x-page-hero&gt;</code> — the top-of-page band used on every hub/detail page (About, Services, Contact, etc). Full-bleed, so it's shown unboxed below, exactly as it renders on a real page.</p>
                    <div class="mt-6 overflow-hidden rounded-xl border border-border">
                        <x-page-hero eyebrow="Example Eyebrow" title="An example page hero title" description="The supporting description sentence for this page hero." />
                    </div>
                </section>

                <section id="breadcrumb" class="scroll-mt-8">
                    <h2 class="text-2xl font-semibold text-text-primary">Breadcrumb</h2>
                    <p class="mt-2 max-w-2xl text-sm text-text-secondary">
                        <code class="rounded bg-surface px-1.5 py-0.5">&lt;x-breadcrumb :items="..."&gt;</code> — also emits a <code class="rounded bg-surface px-1.5 py-0.5">BreadcrumbList</code> JSON-LD block generated from the same <code class="rounded bg-surface px-1.5 py-0.5">$items</code>, so it can't drift from what's visible. <strong>Note:</strong> it carries <code class="rounded bg-surface px-1.5 py-0.5">mt-20</code> to clear the site's fixed header on real pages — since this style guide has no fixed header, that shows here as extra top space rather than looking wrong.
                    </p>
                    <div class="mt-6 overflow-hidden rounded-xl border border-border">
                        <x-breadcrumb :items="[['label' => 'Services', 'href' => '#'], ['label' => 'Web Development']]" />
                    </div>
                </section>

                <section id="stat-item" class="scroll-mt-8">
                    <h2 class="text-2xl font-semibold text-text-primary">Stat Item</h2>
                    <p class="mt-2 max-w-2xl text-sm text-text-secondary"><code class="rounded bg-surface px-1.5 py-0.5">&lt;x-stat-item&gt;</code> — designed for dark backgrounds (the homepage stats band), shown here on one.</p>
                    <div class="mt-6 flex flex-wrap gap-8 rounded-xl bg-secondary p-6">
                        <x-stat-item value="540+" label="Projects delivered" icon="rocket" />
                        <x-stat-item value="12+" label="Years in business" icon="compass" />
                    </div>
                </section>

                <section id="process-step" class="scroll-mt-8">
                    <h2 class="text-2xl font-semibold text-text-primary">Process Step</h2>
                    <p class="mt-2 max-w-2xl text-sm text-text-secondary"><code class="rounded bg-surface px-1.5 py-0.5">&lt;x-process-step&gt;</code> — real data from <code class="rounded bg-surface px-1.5 py-0.5">Content::processSteps()</code>, first 4 of 7 shown here.</p>
                    <div class="mt-6 grid grid-cols-2 gap-6 rounded-xl border border-border bg-white p-6 sm:grid-cols-4">
                        @foreach (array_slice($processSteps, 0, 4) as $step)
                            <x-process-step :number="$step['number']" :title="$step['title']" :description="$step['description']" :icon="$step['icon']" />
                        @endforeach
                    </div>
                </section>

                <section id="cards" class="scroll-mt-8">
                    <h2 class="text-2xl font-semibold text-text-primary">Cards</h2>
                    <p class="mt-2 max-w-2xl text-sm text-text-secondary">Five card components, each fed real data from <code class="rounded bg-surface px-1.5 py-0.5">App\Support\Content</code>. The job, blog and team cards are marked <code class="rounded bg-surface px-1.5 py-0.5">placeholder</code> here because the underlying data genuinely is Phase-A sample content, same as it is on the live pages.</p>

                    <div class="mt-6 space-y-10">
                        <div>
                            <p class="mb-3 font-mono text-xs text-muted">&lt;x-project-card&gt;</p>
                            <div class="max-w-sm">
                                <x-project-card :title="$projects[0]['title']" :category="$projects[0]['category']" :image="asset('images/projects/' . $projects[0]['image'])" />
                            </div>
                        </div>

                        @if (count($testimonials))
                            <div>
                                <p class="mb-3 font-mono text-xs text-muted">&lt;x-testimonial-card&gt;</p>
                                <div class="max-w-sm">
                                    <x-testimonial-card :quote="$testimonials[0]['quote']" :name="$testimonials[0]['name']" :role="$testimonials[0]['role']" :company="$testimonials[0]['company']" placeholder />
                                </div>
                            </div>
                        @endif

                        @if (count($posts))
                            <div>
                                <p class="mb-3 font-mono text-xs text-muted">&lt;x-blog-card&gt;</p>
                                <div class="max-w-sm">
                                    <x-blog-card :href="'#'" :image="asset('images/blog/' . $posts[0]['image'])" :category="$posts[0]['category']" :date="$posts[0]['date']" :title="$posts[0]['title']" :excerpt="$posts[0]['excerpt']" placeholder />
                                </div>
                            </div>
                        @endif

                        @if (count($jobs))
                            <div>
                                <p class="mb-3 font-mono text-xs text-muted">&lt;x-job-card&gt;</p>
                                <div class="max-w-md">
                                    <x-job-card :title="$jobs[0]['title']" :location="$jobs[0]['location']" :type="$jobs[0]['type']" href="#" placeholder />
                                </div>
                            </div>
                        @endif

                        @if (count($team))
                            <div>
                                <p class="mb-3 font-mono text-xs text-muted">&lt;x-team-card&gt;</p>
                                <div class="max-w-48">
                                    <x-team-card :name="$team[0]['name']" :role="$team[0]['role']" :initials="$team[0]['initials']" placeholder />
                                </div>
                            </div>
                        @endif
                    </div>
                </section>

                <section id="cta-banner" class="scroll-mt-8">
                    <h2 class="text-2xl font-semibold text-text-primary">CTA Banner</h2>
                    <p class="mt-2 max-w-2xl text-sm text-text-secondary"><code class="rounded bg-surface px-1.5 py-0.5">&lt;x-cta-banner&gt;</code> — the dark gradient panel closing almost every page. Optional <code class="rounded bg-surface px-1.5 py-0.5">secondaryLabel</code>/<code class="rounded bg-surface px-1.5 py-0.5">secondaryHref</code> for a second CTA (used once a phone number is configured).</p>
                    <div class="mt-6">
                        <x-cta-banner title="An example call to action" description="The supporting sentence explaining what happens next." ctaLabel="Primary Action" ctaHref="#" secondaryLabel="Secondary Action" secondaryHref="#" />
                    </div>
                </section>

                <section id="faq-item" class="scroll-mt-8">
                    <h2 class="text-2xl font-semibold text-text-primary">FAQ Item</h2>
                    <p class="mt-2 max-w-2xl text-sm text-text-secondary"><code class="rounded bg-surface px-1.5 py-0.5">&lt;x-faq-item&gt;</code> — Alpine-driven accordion, fully interactive here (real Alpine bundle is loaded on this page too). Click it.</p>
                    <div class="mt-6 max-w-2xl space-y-4">
                        <x-faq-item question="Is this question and answer real?">No — this is example copy for the style guide, but the accordion interaction itself is the real component.</x-faq-item>
                    </div>
                </section>

                <section id="empty-state" class="scroll-mt-8">
                    <h2 class="text-2xl font-semibold text-text-primary">Empty State</h2>
                    <p class="mt-2 max-w-2xl text-sm text-text-secondary"><code class="rounded bg-surface px-1.5 py-0.5">&lt;x-empty-state&gt;</code> — used on Careers, Blog and Testimonials whenever their underlying <code class="rounded bg-surface px-1.5 py-0.5">Content::</code> collection is empty. Currently those three pages show Phase-A placeholder data instead, so this exact empty state isn't live anywhere at the moment — it still renders correctly here.</p>
                    <div class="mt-6 rounded-xl border border-border bg-surface p-6">
                        <x-empty-state icon="search" title="Example empty state" description="Shown whenever a Content:: collection has nothing in it yet.">
                            <a href="#" class="mt-4 inline-flex items-center gap-1.5 text-sm font-semibold text-primary">Example action link</a>
                        </x-empty-state>
                    </div>
                </section>

                <section id="trust-badges" class="scroll-mt-8">
                    <h2 class="text-2xl font-semibold text-text-primary">Trust Badge Row</h2>
                    <p class="mt-2 max-w-2xl text-sm text-text-secondary"><code class="rounded bg-surface px-1.5 py-0.5">&lt;x-trust-badge-row&gt;</code> — renders nothing when its <code class="rounded bg-surface px-1.5 py-0.5">badges</code> array is empty (the honest default until real certifications are confirmed). Shown here with the same Phase-A placeholder badges currently in the footer and About page.</p>
                    @if (count($trustBadges))
                        <div class="mt-6 rounded-xl border border-border bg-white p-6">
                            <x-trust-badge-row :badges="$trustBadges" placeholder />
                        </div>
                    @endif
                </section>

                <section id="utility" class="scroll-mt-8 pb-20">
                    <h2 class="text-2xl font-semibold text-text-primary">Utility widgets</h2>
                    <p class="mt-2 max-w-2xl text-sm text-text-secondary">
                        <code class="rounded bg-surface px-1.5 py-0.5">&lt;x-back-to-top&gt;</code> is included on this page for real — it's fixed-position and self-manages its own visibility (appears after ~600px of scroll), so scroll down to see it in the bottom-right corner. <code class="rounded bg-surface px-1.5 py-0.5">&lt;x-header&gt;</code> and <code class="rounded bg-surface px-1.5 py-0.5">&lt;x-footer&gt;</code> aren't demoed on this page — they're structural, fixed-position/full-width components already visible on every real page, and embedding the fixed-position header specifically would overlay this page's own sidebar rather than demonstrate anything. See them on the live site.
                    </p>
                </section>

            </div>
        </main>
    </div>

    <x-back-to-top />
</body>
</html>
