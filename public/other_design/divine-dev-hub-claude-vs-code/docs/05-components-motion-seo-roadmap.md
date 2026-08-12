# Part 5 — Components, Motion, SEO/Performance & Roadmap
**Divine Dev Hub — Website Redesign Master Strategy**

---

## 8. Reusable Component Library

Each component is built **once** and used everywhere it appears. The component's definition below is authoritative; a page may not restyle it.

### 8.1 Component Register

| # | Component | Variants | Used on |
|---|---|---|---|
| C01 | Section Header (overline + h2 + lead) | left / centred, light / dark | Every section, every page |
| C02 | Button | primary, secondary, ghost, link, gradient, on-dark ×2, icon; 5 sizes | Everywhere |
| C03 | Service Card | standard, featured (bento) | Home, Services hub, Service detail, Industry |
| C04 | Feature / Benefit Card | icon-top, icon-left, bento-large | Why Us, Service detail, Industry, Hire |
| C05 | Case Study Card | featured, standard, compact, list-row | Home, Case hub, Service, Industry, Portfolio |
| C06 | Portfolio Card | grid, wide | Portfolio, Case hub, Technology |
| C07 | Testimonial Card | standard, featured (large quote), video, compact | ~12 pages |
| C08 | Client Logo Strip | marquee, static grid, greyscale/colour | Home, Services, About, Industry |
| C09 | Stat Tile / Stats Band | brand band, light inline, dark inline, 3/4/6-up | Home, About, Service, Industry, Case study |
| C10 | Process Timeline | horizontal (desktop), vertical (mobile), compact 4-step, expanded | Home, Process, Service, Case study, Careers |
| C11 | Team Card | full (bio + social), compact (photo + name) | About, Team, Careers, Case study |
| C12 | FAQ Accordion | grouped, with sticky intro, searchable | ~15 pages |
| C13 | Tech Tile / Tech Tag | tile (logo + label), inline tag, chip row | Home, Tech pages, Service, Case study |
| C14 | Industry Tile | dark glass, light card, chip | Home, Industries, Service |
| C15 | Icon Tile | 48 / 56 / 64px, light / dark, brand / neutral | Inside most cards |
| C16 | Badge / Chip | overline, status-dot, metric, category, tech | Everywhere |
| C17 | Trust Chip Row | hero variant, form variant, CTA variant | Heroes, forms, CTA blocks |
| C18 | Review Rating Block | 3-platform stack, single inline, star row | Home, About, Contact, Testimonials, footer |
| C19 | Certification Badge Grid | row, 3-up grid | Home, About, Certifications, footer |
| C20 | Award Card | timeline item, grid card | Awards, About |
| C21 | CTA Section | gradient card (pre-footer), dark band, inline strip, sidebar card | Every page |
| C22 | Contact Form | full, short, request-profiles, quick-quote, gated-download | Contact, Service, Hire, Guides |
| C23 | Newsletter Form | footer inline, blog inline, sidebar card | Footer, Blog, Resources |
| C24 | Blog Card | featured, standard, compact list-row | Home, Blog, Blog detail sidebar |
| C25 | Pricing / Engagement Card | model card, rate row, comparison table | Home, Engagement, Hire, Service |
| C26 | Filter Bar | chip multi-select, tabs, search + tabs | Portfolio, Case studies, Blog, Careers, FAQ |
| C27 | Tabs | underline, pill, vertical | Technologies, Engagement, Service |
| C28 | Sticky Sub-nav | anchor pills with scroll-spy | Service, Industry, Case study, Process, Legal |
| C29 | Breadcrumb | light / dark | Every page except Home |
| C30 | Pagination / Load More | numbered, load-more button | Blog, Portfolio, Careers |
| C31 | Media Frame | browser chrome, phone frame, plain rounded, gallery + lightbox | Hero, Case study, Portfolio, Service |
| C32 | Callout / Note Box | info, warning, tip, quote | Blog, Legal, Process |
| C33 | Comparison Table | 2-col, 4-col, feature matrix | Hire, Engagement, Service |
| C34 | Timeline / Milestones | vertical with year markers | About, Case study, Careers |
| C35 | Job Card | grid, list-row | Careers |
| C36 | Empty State | search, filter, 404 | Search, filtered lists, 404 |
| C37 | Modal / Lightbox | `<dialog>`: image, video, form | Portfolio, Testimonials, Contact |
| C38 | Mobile Action Bar | 3-cell sticky | All pages < 768px |
| C39 | Toast / Inline Alert | success, error, info | Forms |
| C40 | Skeleton Loader | card, list, tile | Filtered grids |

### 8.2 Key Component Specifications

**C01 — Section Header**
```
[OVERLINE]        --fs-overline · brand-600 (light) / accent-400 (dark) · 12px margin-bottom
[H2 Heading]      --fs-h2 · ink-800 / white · text-wrap:balance · max 3 lines
[Lead sentence]   --fs-body-lg · ink-500 / on-dark-secondary · max-width 62ch · 16px margin-top
                  (centred variant: margin-inline auto)
Gap to content: --space-10 (40px) mobile, --space-12 (48px) desktop
```

**C07 — Testimonial Card**
Required fields: quote (max 45 words), author name, role, company, source platform. Optional: photo, company logo, star rating, project link.
*Rule:* never publish a testimonial without at least name + role + company, or an honest anonymisation label.

**C09 — Stats Band**
Number (`--fs-stat`, 800, tabular-nums) → label (`--fs-body-sm`) → optional sub-label (`--fs-caption`). Count-up animation once per session. The real number must exist in the HTML for no-JS and crawlers; JS only animates from 0 to the value already present.

**C12 — FAQ Accordion**
```html
<details class="faq__item" name="faq-group">   <!-- name= gives exclusive open behaviour natively -->
  <summary class="faq__q"><span>Question text</span><svg class="faq__chevron">…</svg></summary>
  <div class="faq__a"><div class="faq__a-inner">Answer…</div></div>
</details>
```
Animate with `grid-template-rows: 0fr → 1fr` on `.faq__a`. Native `<details>` gives keyboard access, find-in-page support, and no-JS operation for free.

**C21 — CTA Section variants**

| Variant | Where | Style |
|---|---|---|
| Pre-footer gradient card | Every page, above footer | `--grad-brand`, `radius-2xl`, overlapping, 2 CTAs + 3 trust chips |
| Dark band | Mid-page | `ink-950`, full-bleed, 1 CTA |
| Inline strip | After long content blocks | `brand-50`, `radius-lg`, 1 line + text CTA |
| Sidebar card | Blog/case-study sidebars | `ink-950`, `radius-lg`, sticky |

**C28 — Sticky Sub-nav**
Horizontal pill row, sticks at `top: 72px` (below the header), `ink-0` background with `backdrop-filter`, 1px bottom border. Active pill: `brand-50` fill + `brand-700` text, driven by `IntersectionObserver` with `rootMargin: "-80px 0px -70% 0px"`. Smooth scroll with `scroll-margin-top: 140px` on the targets. Mobile: horizontally scrollable with edge fades, active pill auto-scrolled into view.

**C38 — Mobile Action Bar**
Three equal cells: Call (`tel:`) · WhatsApp (`wa.me`) · Get a Quote (gradient). 56px + safe-area inset. Appears after 25% scroll with a 240 ms slide-up. Hidden when the drawer or a modal is open. **Track each cell as a separate conversion event.**

### 8.3 Component Documentation Requirement

Before any page is built, `/styleguide.html` must render every component in **every state** (default, hover, focus, active, disabled, loading, error, empty) at **three widths** (375, 768, 1440), on both light and dark backgrounds. This page is the QA reference and, in Phase 2, the WordPress block mapping document.

---

## 9. UI Enhancements & Motion

### 9.1 Motion Principles

1. **Motion communicates, it never decorates.** Every animation answers: where did this come from, what changed, what can I do?
2. **Fast in, slower out.** Entrances 200–300 ms; exits 150–200 ms; scroll reveals 500–600 ms.
3. **Transform and opacity only.** Never animate layout properties.
4. **One focal animation per viewport.** Competing motion reads as cheap.
5. **Never block content on animation.** Text must be readable if JS fails.
6. **`prefers-reduced-motion: reduce` is honoured globally**, not per component.

### 9.2 Motion Tokens

```css
--dur-instant: 100ms;   --dur-fast: 160ms;   --dur-base: 240ms;
--dur-slow:    360ms;   --dur-slower: 560ms; --dur-marquee: 40s;

--ease-out:    cubic-bezier(.22, 1, .36, 1);      /* default — expo-ish out */
--ease-in-out: cubic-bezier(.65, 0, .35, 1);      /* state changes */
--ease-spring: cubic-bezier(.34, 1.56, .64, 1);   /* playful pops — sparingly */
--ease-linear: linear;                             /* marquees, progress only */

--stagger: 60ms;  /* between siblings in a revealed group */
```

```css
@media (prefers-reduced-motion: reduce) {
  *, *::before, *::after {
    animation-duration: .01ms !important;
    animation-iteration-count: 1 !important;
    transition-duration: .01ms !important;
    scroll-behavior: auto !important;
  }
  .reveal { opacity: 1 !important; transform: none !important; }
}
```

### 9.3 Motion Catalogue

#### Scroll reveals
| Pattern | Spec |
|---|---|
| **Standard reveal** | `opacity 0→1` + `translateY(24px)→0`, `--dur-slower`, `--ease-out`, triggered at 15% visibility, **once** |
| **Staggered group** | Children offset by `--stagger` (60 ms), max 8 items before the delay is capped |
| **Directional reveal** | Text columns from `translateX(-24px)`, media from `translateX(24px)` — used on 7/5 split sections |
| **Scale reveal** | Media frames `scale(.96)→1` + fade, `--dur-slower` |
| **Line draw** | Process connector and blueprint accents via `clip-path: inset()` or `stroke-dashoffset` |
| **Implementation** | `IntersectionObserver` with `rootMargin: "0px 0px -12% 0px"`, one shared observer for all `.reveal` elements, `unobserve()` after firing. Native CSS scroll-driven animations (`animation-timeline: view()`) used where supported, with the observer as fallback |

#### Hover & interaction
| Element | Effect |
|---|---|
| Primary button | `translateY(-2px)` + shadow deepens + background darkens · 160 ms |
| Card | `translateY(-4px)` + `shadow-sm→lg` + border→`brand-200` · 240 ms |
| Featured card | `translateY(-6px)` + cursor-following radial glow (CSS var updated on `pointermove`, rAF-throttled) |
| Card arrow | `translateX(4px)` · 200 ms |
| Nav link | Underline scales `scaleX(0)→1` from the left · 200 ms |
| Text link | Underline sweeps left→right; colour → `brand-700` |
| Logo tile | grayscale(1)→0, opacity .75→1, `scale(1.04)` |
| Tech tile | `translateY(-3px)` + `shadow-md` + logo `scale(1.08)` |
| Image in card | `scale(1)→1.05` over 600 ms with `overflow:hidden` on the frame |
| Industry tile (dark) | Fill lightens + border→brand + hidden CTA line slides up |
| Icon in icon-tile | `scale(1.1)` + fill deepens |
| Social icon | `translateY(-2px)` + colour → `brand-400` |
| Form field | Border colour + focus ring, 160 ms; label colour shifts to `brand-700` |

#### Micro-interactions
- **Button click:** brief `scale(.98)` on `:active` (60 ms) — a tactile confirmation.
- **Copy code button:** icon morphs to a checkmark, label → "Copied", reverts after 2 s.
- **Form success:** field border → green with a check icon that draws in via `stroke-dashoffset`.
- **Form error:** 3-cycle horizontal shake, 6px amplitude, 400 ms (skipped under reduced motion; the error text is always the primary signal).
- **Accordion chevron:** rotates 180°, 200 ms.
- **Tab switch:** the underline slides between tabs (transform on a shared indicator), 250 ms.
- **Filter change:** FLIP reposition of cards, 300 ms.
- **Header on scroll:** blur, shrink, shadow — all cross-fading over 240 ms.
- **Mobile menu:** hamburger→X morph, 300 ms; drawer slide, 320 ms; nav items stagger in at 40 ms.
- **Newsletter success:** the field collapses and a check + "You're in." expands in its place.
- **Availability dot:** 2 s pulse (`box-shadow` spread), infinite, `--ease-in-out`.

#### Counters & progress
- **Number counters:** rAF-driven, 1.6 s, ease-out, triggered at 50% visibility, once per page load. Suffixes (`+`, `%`, `k`) never animate. Value present in the DOM before JS runs.
- **Reading progress:** 2px gradient bar in the header on Blog/Case Study detail, driven by a scroll listener throttled with rAF (or `animation-timeline: scroll()` where supported).
- **Multi-step form progress:** segmented bar; completed segments fill with `--grad-brand` left-to-right.
- **Skill/tech proficiency bars** (Hire pages): fill from 0 on reveal, 800 ms.

#### Loading
- **Page transitions:** none for Phase 1 (View Transitions API is a Phase 2 nice-to-have). Avoid page-load spinners entirely — they add perceived latency.
- **Skeleton loaders:** on filtered/lazy grids only; `ink-100` base with a 1.4 s shimmer.
- **Button loading:** label → 3-dot pulse; width locked.
- **Lazy images:** low-quality blurred placeholder or a flat `ink-100` block; fades in over 300 ms once decoded.

#### Ambient / signature
- **Hero blueprint grid:** parallax at 0.15× scroll (transform only), disabled below 1024px and under reduced motion.
- **Hero gradient mesh:** a very slow 20 s hue/position drift at low amplitude — barely perceptible, adds life. CSS only.
- **Floating metric chips** in the hero: 6 s `translateY(±6px)` loop, offset phases.
- **Corner brackets** on featured cards: draw in on reveal, 400 ms.
- **Logo marquee:** 40 s linear, duplicated track, pauses on hover and under reduced motion.

### 9.4 Explicitly Prohibited

Parallax on text · scroll-jacking · horizontal scroll-hijacking · cursor trails and custom cursors · full-screen page transitions · animated backgrounds on text-heavy sections · autoplay video · text scramble/typewriter effects on the H1 · bounce/elastic easing on anything except the availability dot · any animation over 800 ms · animation on `width`/`height`/`top`/`left`/`margin` · more than 3 concurrently animating elements per viewport.

---

## 10. SEO, Performance & Accessibility

### 10.1 Technical SEO

| Item | Requirement |
|---|---|
| URL structure | Lowercase, hyphenated, trailing slash, ≤3 levels, keyword-bearing, permanent |
| Canonicals | Self-referencing on every page; correct on paginated archives and filtered views |
| `robots.txt` + XML sitemap | Sitemap index split by type (pages, services, case studies, blog, technologies); submitted to Search Console and Bing |
| Redirects | **Full 1:1 redirect map from every existing URL** before Phase 2 go-live. 301s, no chains, no loops |
| HTTPS | Enforced, HSTS, no mixed content |
| Pagination | `rel=prev/next` is deprecated for Google, but paginated pages must be self-canonical and crawlable |
| Filtered views | `?industry=…` views are `noindex, follow` unless a specific combination has search demand, in which case it gets a real static page |
| Hreflang | Not needed now; the URL structure must not preclude `/us/`, `/uk/` later |
| Structured data | See §10.4 |
| Crawl efficiency | No infinite scroll; no JS-only navigation; every page reachable by an `<a href>` |
| 404 handling | Real 404 status (not a 200 soft-404) |
| `llms.txt` | Publish a `/llms.txt` summarising services, industries, and key pages — cheap, and increasingly used by AI answer engines |

### 10.2 On-Page SEO

| Element | Rule |
|---|---|
| `<title>` | 50–60 chars, primary keyword first, brand last. `Custom Software Development Services \| Divine Dev Hub` |
| Meta description | 140–160 chars, includes the keyword, a differentiator, and an implicit CTA. Unique on every page |
| `<h1>` | **Exactly one**, contains the primary keyword naturally (fixes audit defect E1) |
| `<h2>`–`<h4>` | Logical hierarchy, no skipped levels, keyword variants and question-form headings |
| First 100 words | Contain the primary keyword and directly answer the page's core question |
| Content depth | Service 1,400–2,000w · Industry 1,200–1,600w · Technology 900–1,300w · Case study 1,500–2,500w · Blog 1,200–2,500w |
| Internal links | 5–12 contextual in-body links per page, descriptive anchor text, never "click here" |
| Images | Descriptive filenames, meaningful alt text (empty `alt=""` for decorative), AVIF/WebP, explicit dimensions |
| Open Graph / Twitter | On every page; 1200×630 OG image, per-template design |
| E-E-A-T | Author bios with credentials, named team, real case studies, certifications, physical address, phone |
| AEO/GEO | Question-form `<h2>`s · direct one-sentence answers before elaboration · "Key takeaways" boxes · comparison tables · defined terms · FAQ schema. AI answer engines extract these patterns preferentially |

### 10.3 Keyword Architecture (target map)

| Page type | Primary pattern | Example |
|---|---|---|
| Home | brand + category | "software development company Ahmedabad" |
| Service | `{service} services / company` | "custom software development services" |
| Service sub | `{service} + {platform}` | "magento development company" |
| Industry | `{industry} software development` | "healthcare software development company" |
| Technology | `{tech} development company/services` | "laravel development company" |
| Hire | `hire {tech} developers` | "hire react developers india" |
| Solution | `{outcome} development` | "mvp development company" |
| Case study | `{industry} {solution} case study` | "medical billing software case study" |
| Blog | informational long-tail | "how much does an mvp cost in 2026" |
| FAQ | question long-tail | "who owns the code when you outsource software" |

Every page belongs to exactly one cluster and links to its hub, 3–5 siblings, and 2–3 supporting blog posts.

### 10.4 Schema Markup

| Schema | Where |
|---|---|
| `Organization` + `LocalBusiness` (`ProfessionalService`) | Site-wide, in the footer or `<head>` — with `name`, `logo`, `url`, `address`, `telephone`, `email`, `sameAs[]`, `foundingDate: 2014`, `numberOfEmployees`, `award[]`, `hasCredential[]` |
| `WebSite` + `SearchAction` | Homepage — enables the sitelinks search box |
| `BreadcrumbList` | Every page except Home |
| `Service` | Every service detail page, with `provider`, `areaServed`, `serviceType` |
| `FAQPage` | FAQ page + every page with a genuine FAQ section |
| `Article` / `BlogPosting` | Blog detail — with `author` (Person), `datePublished`, `dateModified`, `image` |
| `Person` | Team and author pages |
| `JobPosting` | Job detail pages — enables Google Jobs |
| `Review` / `AggregateRating` | Only where reviews are genuine and attributable; never on unattributed testimonials |
| `ImageObject` / `VideoObject` | Case study and portfolio media |
| `HowTo` | Process page (if it genuinely fits a step-by-step format) |
| `ContactPage` / `AboutPage` | Respective pages |

**Rule:** all JSON-LD, all validated in Rich Results Test, all reflecting content actually visible on the page. Schema that contradicts visible content is a manual-action risk.

### 10.5 Core Web Vitals — Targets & Tactics

**Targets (stricter than Google's thresholds, to leave headroom for WordPress in Phase 2):**

| Metric | Google "good" | Our Phase 1 target | Our Phase 2 (WP) target |
|---|---|---|---|
| LCP | < 2.5 s | **< 1.5 s** | < 2.0 s |
| INP | < 200 ms | **< 100 ms** | < 150 ms |
| CLS | < 0.1 | **< 0.02** | < 0.05 |
| TTFB | < 800 ms | < 200 ms (static) | < 400 ms |
| FCP | < 1.8 s | < 1.0 s | < 1.4 s |
| TBT (lab) | < 200 ms | < 100 ms | < 200 ms |
| Lighthouse Perf | — | **≥ 98** | ≥ 92 |
| Lighthouse A11y / BP / SEO | — | **100 / 100 / 100** | ≥ 95 each |

**LCP tactics**
- The LCP element is the hero H1 or the hero image — decided per template and made explicit.
- `<link rel="preload">` the hero image (AVIF) and the two above-fold font files.
- `fetchpriority="high"` on the LCP image; `loading="eager"` and **no** `lazy`.
- Critical CSS (~8–12 KB) inlined in `<head>`; the rest loaded with `media="print" onload="this.media='all'"` or `rel="preload" as="style"`.
- No render-blocking JS. All scripts `defer` or `type="module"`.
- No third-party scripts above the fold. Analytics loads on `requestIdleCallback`.
- Self-hosted fonts, `font-display: swap`, subset, preloaded, with metric-matched fallbacks.

**INP tactics** (the metric most likely to fail — and the one the current stack fails)
- Total JS ≤ 25 KB gzipped for the homepage.
- No jQuery. No framework. No Elementor runtime.
- All scroll and pointer handlers throttled with `requestAnimationFrame`; `passive: true` on scroll/touch listeners.
- `IntersectionObserver` instead of scroll listeners wherever possible.
- Event delegation instead of per-element listeners.
- Long tasks broken up with `scheduler.yield()` / `setTimeout(0)` where any operation exceeds 50 ms.
- `content-visibility: auto` + `contain-intrinsic-size` on below-fold sections — cuts style/layout cost dramatically.
- Animate only `transform`/`opacity`; keep the compositor doing the work.

**CLS tactics**
- `width`/`height` on **every** image, video, iframe, and embed.
- `aspect-ratio` on all media containers.
- Font fallback metrics (`size-adjust`, `ascent-override`) so the swap causes zero shift.
- Fixed-height reservations for the header, sticky bars, badges, and ad-like slots.
- No content injected above existing content after load (cookie banner is a bottom-anchored overlay, not an inserted block).
- `scrollbar-gutter: stable` to prevent horizontal shift when the menu locks scroll.

**Asset budgets (per page)**

| Asset | Budget (gzipped) |
|---|---|
| HTML | ≤ 60 KB |
| CSS | ≤ 45 KB |
| JS | ≤ 25 KB |
| Fonts | ≤ 120 KB |
| Above-fold images | ≤ 180 KB |
| **Total above-fold** | **≤ 400 KB** |
| Total page (all lazy assets) | ≤ 1.2 MB |
| HTTP requests above fold | ≤ 15 |

Compare with the current homepage: 42 JS files + 23 CSS files + WooCommerce + 45 font variants.

### 10.6 Image Strategy

- **Formats:** AVIF primary, WebP fallback, via `<picture>`. JPEG/PNG only as a last resort.
- **Responsive:** `srcset` with 400/800/1200/1600/2000 widths; accurate `sizes` per layout.
- **Compression:** AVIF q≈55–65, WebP q≈78. Photos ≤ 150 KB; screenshots ≤ 120 KB; logos as SVG.
- **Loading:** `loading="lazy"` + `decoding="async"` everywhere except the LCP image.
- **Dimensions:** always explicit.
- **SVG:** icons via one inline sprite; illustrations optimised with SVGO; brand logos as individual SVGs.
- **Video:** posters + click-to-play, `preload="none"`, self-hosted MP4/WebM or a facade-loaded YouTube embed (never a raw iframe on load).
- **Maps:** static image facade → real Google Maps iframe loaded only on click (saves ~800 KB).
- **CDN:** Cloudflare or Bunny in Phase 2, with image resizing at the edge.

### 10.7 Accessibility — WCAG 2.2 Level AA (hard gate)

| Area | Requirement |
|---|---|
| Semantics | `header`/`nav`/`main`/`section`/`article`/`aside`/`footer` landmarks on every page; one `<main>`; heading hierarchy unbroken |
| Skip link | "Skip to main content" as the first focusable element, visible on focus |
| Keyboard | Every interactive element reachable and operable; logical tab order; no keyboard traps (except intentional modal/drawer traps with Escape) |
| Focus visible | 3px ring, 2px offset, ≥3:1 contrast against adjacent colours; never removed |
| Focus not obscured (2.2 SC 2.4.11) | Sticky header/sub-nav must not cover the focused element — enforced with `scroll-margin-top` |
| Target size (2.2 SC 2.5.8) | ≥24×24 CSS px minimum; **44×44 is our standard** |
| Contrast | 4.5:1 body text, 3:1 large text and UI components (see Part 2 §3.3.7) |
| Colour independence | Never colour alone — icons, text, or patterns accompany every colour-coded state |
| Images | Meaningful alt text; `alt=""` for decorative; complex diagrams get a text description |
| Forms | Visible persistent labels, `for`/`id` association, `aria-describedby` for help and errors, `aria-invalid`, error summary with anchors, autocomplete attributes |
| ARIA | Used only where native HTML cannot express it. `aria-expanded`, `aria-controls`, `aria-current="page"`, `aria-live="polite"` on dynamic results |
| Motion | `prefers-reduced-motion` honoured globally; no content requires motion to be understood |
| Zoom & reflow | Usable at 400% zoom / 320 CSS px wide with no horizontal scroll; no `user-scalable=no` |
| Media | Captions and transcripts on any video testimonial |
| Language | `<html lang="en">`; `lang` on any foreign-language content |
| Consistent help (2.2 SC 3.2.6) | Contact mechanism in the same location on every page — satisfied by the header CTA + footer |
| Testing | axe DevTools + Lighthouse + manual keyboard pass + NVDA/VoiceOver spot check on the Header, Homepage, and Contact form |
| Accessibility statement | Published at `/accessibility/` |

### 10.8 Responsive & Mobile-First Implementation

- **Mobile-first CSS**: base styles are mobile; `min-width` media queries only.
- **Design widths:** 375 (primary mobile), 768, 1440 (primary desktop). Verified at 360, 414, 820, 1024, 1280, 1920.
- **Fluid everything:** `clamp()` for type and section padding; percentage/`fr` grids; `max-width` containers only at the outer level.
- **Container queries** for cards that appear in multiple column widths (service card in a 3-up vs. a sidebar) — with a media-query fallback.
- **Touch:** ≥44px targets, ≥8px between adjacent targets, no hover-only content, `:active` feedback on all tappable elements.
- **Mobile-specific patterns:** sticky action bar, accordion nav, scroll-snap carousels replacing multi-column grids, bottom-anchored form CTAs, `tel:`/`wa.me:`/`mailto:` links throughout.
- **iOS specifics:** 16px minimum input font (prevents zoom), `env(safe-area-inset-*)`, `-webkit-tap-highlight-color` styled not removed, `100dvh` instead of `100vh`.
- **Testing matrix:** iOS Safari (last 2), Chrome Android (last 2), Chrome/Edge/Firefox/Safari desktop (last 2), plus a real mid-range Android device on throttled 4G.

### 10.9 Analytics & Measurement (specify in Phase 1, wire in Phase 2)

- GA4 + Google Search Console + Bing Webmaster + Microsoft Clarity (heatmaps and session replay — free, and the fastest way to find UX failures post-launch).
- **Conversion events:** `consultation_booked`, `form_submit_contact`, `form_submit_hire`, `calculator_completed`, `guide_download`, `newsletter_signup`, `phone_click`, `whatsapp_click`, `email_click`, `case_study_view`, `scroll_75`.
- Server-side tagging or a consent-mode setup for GDPR compliance.
- Core Web Vitals monitored in the field via the `web-vitals` library reporting to GA4, not just lab Lighthouse scores.

---

## 11. Design & Implementation Roadmap

### 11.1 Phase 0 — Foundations & Content Dependencies (Week 1)

**Design/technical**
1. Finalise the design direction: confirm the violet+cyan palette and the Plus Jakarta Sans / Inter (or Satoshi) pairing. **Client sign-off required before anything else.**
2. Build `01-tokens.css` — every token from Part 2.
3. Build `/styleguide.html` — colours, type scale, spacing, radii, shadows, buttons (all states), forms (all states), cards, badges, icons.
4. Set up the project skeleton (folder structure, reset, layers, icon sprite, font subsetting).
5. Agree the asset and CWV budgets as CI-enforceable numbers.

**Content — started now because it is the critical path**

| Deliverable | Owner | Needed by |
|---|---|---|
| Confirm the years-in-business number (10+ vs 12+ vs 2014) | Client | Week 1 |
| Publish a phone number + WhatsApp number | Client | Week 1 |
| 6 case studies (client, challenge, solution, metric, stack, screenshots, permission) | Client + writer | **Week 3** |
| Client logo permissions (or the fallback partner-logo plan) | Client | Week 3 |
| Real review-platform profiles + counts (Clutch/Google/GoodFirms) | Client | Week 3 |
| List of actual certifications and awards held | Client | Week 3 |
| 5+ testimonials with name, role, company, permission | Client | Week 3 |
| Team photos, re-shot to one consistent standard | Client | Week 4 |
| Price anchors / rate bands decision | Client | Week 4 |
| Privacy Policy, Terms, Cookie Policy (legal review) | Client + counsel | Week 6 |

> **Risk flag:** the homepage cannot ship its Case Studies section without real case-study content. This is the single largest schedule risk in the project. Start it in Week 1.

### 11.2 Phase 1 — Static HTML Design (Weeks 2–14)

| Sprint | Weeks | Deliverables | Approval gate |
|---|---|---|---|
| **S1** | 2–3 | **Header** (desktop + mobile, all states, mega menus, search overlay, sticky/scroll behaviour) · **Footer** (all 4 zones, responsive) · Style guide complete | **Gate 1 — client approves header, footer, and design language** |
| **S2** | 4–6 | **Homepage** — all 16 sections, fully responsive, fully animated, CWV-verified | **Gate 2 — client approves the homepage** |
| **S3** | 7–8 | Service Detail template + Services Hub + Contact + Thank You | Gate 3 |
| **S4** | 9–10 | Case Study Detail + Case Studies Hub + About + Process | Gate 4 |
| **S5** | 11–12 | Industry Detail + Industries Hub + Portfolio Hub + Portfolio Detail + Hire Developers Hub + Hire Detail | Gate 5 |
| **S6** | 13 | Technologies Hub + Technology Detail + Solutions Hub + Solution Detail + Engagement Models + Blog Listing + Blog Detail | Gate 6 |
| **S7** | 14 | Careers + Job Detail + FAQ + Testimonials + Awards + Certifications + Legal template + 404 + Search + Sitemap + Cost Calculator | **Gate 7 — full Phase 1 sign-off** |

**Definition of done for every template**
- [ ] Renders correctly at 375 / 768 / 1440, verified at 360 and 1920
- [ ] All interactive states implemented (hover, focus-visible, active, disabled, loading, error, empty)
- [ ] Keyboard navigable end-to-end; screen-reader spot-checked
- [ ] Lighthouse ≥ 98 / 100 / 100 / 100
- [ ] Zero token violations (no hard-coded colours, sizes, radii, shadows)
- [ ] `prefers-reduced-motion` verified
- [ ] All images AVIF+WebP with dimensions and alt text
- [ ] Schema JSON-LD present and validated
- [ ] Cross-browser verified (Chrome, Safari, Firefox, Edge; iOS Safari; Chrome Android)
- [ ] Real content — **no lorem ipsum in any approved template**

### 11.3 Phase 1 Build Order Rationale

Header → Footer → Homepage is correct and is followed exactly. The reasoning, for the record:
1. The **header and footer appear on every page** — building them first locks the global shell and forces the token system to be real rather than theoretical.
2. The **homepage exercises the widest range of components** (16 sections use ~28 of the 40 components). Once it is approved, roughly 70% of the component library is already built and approved, and every subsequent template is assembly rather than invention.
3. Approving the design language on three artefacts rather than thirty keeps revision cost low.

After Gate 2, the remaining order is driven by **commercial value**: Service Detail (14 pages, highest search volume) → Case Study (highest conversion impact) → Contact (the conversion endpoint) → then breadth.

### 11.4 Phase 2 — WordPress Integration (Weeks 15–22)

| Step | Detail |
|---|---|
| **1. Theme decision** | **Recommendation: a custom block theme** (`theme.json` + block templates), not a page builder. `theme.json` maps 1:1 to the design tokens, giving the client editable content without the ability to break the design system. Elementor and the Webteck theme are removed entirely |
| **2. Plugin purge** | Remove WooCommerce, TI Wishlist, Woo Quick View, Elementor, webteck-core, and one of the two form plugins. Target: ≤ 12 active plugins |
| **3. Token mapping** | Every CSS custom property from Part 2 becomes a `theme.json` preset (colours, gradients, font sizes, spacing) so the block editor offers only on-system values |
| **4. Block library** | Each component from §8 becomes either a core block with a block style, or a custom block / block pattern. Target: ~24 registered patterns |
| **5. Custom post types** | `case_study`, `portfolio`, `service`, `industry`, `technology`, `job`, `testimonial`, `team_member` — with ACF/native field groups and taxonomies (industry, service, technology) powering all filtering |
| **6. Templates** | One block template per template in §7.34 |
| **7. Forms** | Fluent Forms or Gravity Forms (single plugin), styled to the design system, with Turnstile, CRM/email routing, and `/thank-you/` redirects |
| **8. SEO** | Rank Math or Yoast; schema implemented in the theme (not plugin-generated) for full control; sitemaps; redirect map imported |
| **9. Performance** | Object cache (Redis), page cache (Cloudflare/LiteSpeed), no jQuery dependency, deregister unused core assets, self-hosted fonts, CDN with edge image resizing, HTTP/3 |
| **10. Migration** | Content migration, then the **full 301 redirect map**, then a staging soak |
| **11. QA** | Full regression against every Phase 1 template; CWV field-data check on staging |
| **12. Launch** | Off-peak deploy, DNS/cache warm, Search Console re-submission, 48-hour monitoring window |

### 11.5 Phase 3 — Post-Launch (Weeks 23+)

- Week 1: monitor 404s, CWV field data, form submissions, Clarity replays.
- Weeks 2–4: fix what real users reveal; publish the first 4 blog posts; submit Clutch/GoodFirms review requests.
- Month 2–3: A/B test hero copy and CTA wording; build out remaining service/technology/industry pages; launch the cost calculator if deferred.
- Ongoing: 2 blog posts/month, 1 case study/month, quarterly CWV audit, quarterly accessibility audit.

### 11.6 Critical Dependencies & Risks

| Risk | Impact | Mitigation |
|---|---|---|
| Case-study content not ready | Blocks the homepage (Gate 2) | Start Week 1; design the section with a documented interim state (3 case studies instead of 4) |
| No client logo permissions | Weakens Section 2 | Fallback to certified-partner logos; agreed in Week 3 |
| Certifications don't exist | Section 13 is hollow | Show only what is real; start an ISO 27001 / SOC 2 readiness programme as a separate track |
| Client resists publishing price anchors | Weakens Section 12 and lead quality | Present the case with data; fall back to "From $X" ranges only |
| Scope creep across 32 templates | Timeline slip | Gates are binding; changes after a gate become a change request |
| WordPress rebuild underestimated | Phase 2 slip | Block theme (not builder) chosen specifically to keep Phase 2 mechanical |
| Existing SEO equity lost at migration | Traffic drop | Full redirect map + pre-migration crawl baseline + post-launch Search Console monitoring |
| Team photos inconsistent | Cheapens About/Team | Single re-shoot with a specified brief, Week 4 |

### 11.7 Immediate Next Steps

1. **Client approves this strategy document** (or returns comments).
2. **Decide the three open items:** (a) Satoshi vs. Plus Jakarta Sans for headings; (b) publish price anchors — yes/no; (c) confirmed years-in-business number.
3. **Client starts the content workstream** in §11.1 — especially the six case studies.
4. On approval, begin **Sprint 1: Header + Footer + Style Guide**.

---

*← Back to [Master Index](../DESIGN-STRATEGY.md)*
