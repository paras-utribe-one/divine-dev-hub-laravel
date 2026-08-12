# Divine Dev Hub — Website Redesign Master Strategy
**Single source of truth for all design and HTML implementation**

| | |
|---|---|
| **Client** | Divine Dev Hub — https://divinedevhub.in/ |
| **Current stack** | WordPress · Webteck theme · Elementor · WooCommerce (unused) |
| **Project** | Complete redesign — Phase 1 static HTML, Phase 2 WordPress integration |
| **Version** | 1.0 |
| **Date** | 6 August 2026 |
| **Status** | Awaiting client approval |

---

## How to use this document

This strategy is split into five parts. **Read them in order once; then use them as reference.**

| Part | Covers | Read when |
|---|---|---|
| **[Part 1 — Analysis & Architecture](docs/01-analysis-and-architecture.md)** | Audit of the current site (measured), reference-site analysis, 2026 trends, strengths/weaknesses/opportunities, full sitemap, navigation architecture | Before anything. Establishes *why* the redesign is what it is |
| **[Part 2 — Design System](docs/02-design-system.md)** | Design concept, colour, typography, spacing, grid, radius, shadows, cards, buttons, forms, icons, illustration, imagery, consistency rules, build stack | **Open this every time you write CSS.** Binding contract |
| **[Part 3 — Header, Footer, Homepage](docs/03-header-footer-homepage.md)** | Full implementation-depth blueprints for Build Order 1, 2, 3 — including all 16 homepage sections | Sprints 1–2 |
| **[Part 4 — Inner Pages](docs/04-inner-pages.md)** | All 32 templates: layout, sections, hierarchy, CTA strategy, SEO, responsive, user flow | Sprints 3–7 |
| **[Part 5 — Components, Motion, SEO, Roadmap](docs/05-components-motion-seo-roadmap.md)** | 40-component register, motion system, technical/on-page SEO, Core Web Vitals tactics, WCAG 2.2 AA, full project roadmap | Continuously |

---

## The strategy in one page

### The problem
The current site is a competent theme install with a **credibility gap**, not a design gap. It has no client logos, no testimonials on the homepage, no case studies, no phone number, no certifications, no named awards, and no Industries / Technologies / Hire-Developers pages. It also carries a WooCommerce store it doesn't use, 42 JavaScript files, 23 stylesheets, and three font families across ~45 weights — a Core Web Vitals failure profile. Two `<h1>` tags sit on the homepage. The homepage claims "10+ years"; the About page says "12+ years".

Meanwhile the company has genuinely strong raw material: 540+ projects, 510+ clients, 50 in-house engineers, 12 years, 24 shippable products across six industries, and rare Odoo + Magento specialisation.

### The thesis
> Both reference sites (Space-O, Hidden Brains) win on **volume of proof**, not on design craft. Neither has a memorable visual identity. **That is the opening.** Match their proof density, then beat them decisively on design, clarity, speed and conversion architecture — so that Divine Dev Hub's own website becomes the strongest single piece of evidence for its engineering ability.

### The design direction — "Engineered Clarity"
A calm, precise, editorial canvas with engineered moments of depth. Three pillars: **Precision** (strict 8px grid, disciplined type), **Depth** (alternating light/dark section rhythm, layered violet-tinted shadows), **Evidence** (numbers, logos and testimonials treated as first-class layout objects). The signature is a hairline **blueprint grid** motif — engineering drafting, rendered in pure CSS at zero performance cost.

Brand violet `#6D4DF6` is retained from the existing identity and refined; electric cyan `#22D3EE` becomes the accent; neutrals are violet-tinted "Ink" greys.

### The numbers we're building to

| | Now | Target |
|---|---|---|
| Pages | ~15 | ~135 (32 templates) |
| Homepage sections | 6 | 16 |
| Homepage JS files | 42 | ≤ 4 modules, ≤ 25 KB gzipped |
| Homepage CSS files | 23 | 1 bundle, ≤ 45 KB gzipped |
| Fonts | 3 families / ~45 variants | 2 families / 6 weights, ≤ 120 KB |
| LCP | not passing | < 1.5 s (Phase 1) / < 2.0 s (WordPress) |
| INP | at risk | < 100 ms / < 150 ms |
| CLS | at risk | < 0.02 / < 0.05 |
| Lighthouse | — | 98 / 100 / 100 / 100 |
| Conversion paths | 1 (a form) | 8 (form, call, WhatsApp, calendar, calculator, guide, newsletter, profile request) |

---

## Build order (fixed)

```
GATE 1        GATE 2         GATE 3 → 7
┌────────┐   ┌──────────┐   ┌─────────────────────────────┐
│ HEADER │ → │ HOMEPAGE │ → │ Service · Case Study ·      │
│ FOOTER │   │ 16 sect. │   │ Contact · About · Industry ·│
│ STYLE  │   │          │   │ Portfolio · Hire · Tech ·   │
│ GUIDE  │   │          │   │ Blog · Careers · Legal …    │
└────────┘   └──────────┘   └─────────────────────────────┘
 Weeks 2–3     Weeks 4–6            Weeks 7–14
```

No HTML is written until this strategy is approved. No page after the homepage is started until Gate 2 is passed.

---

## Decisions the client needs to make now

| # | Decision | Recommendation |
|---|---|---|
| 1 | **Heading typeface** — Plus Jakarta Sans (Google, safest) vs. Satoshi (Fontshare, more distinctive) | Plus Jakarta Sans unless a stronger visual signature is wanted |
| 2 | **Publish price anchors** ("From $X") on Engagement Models? | **Yes.** Hiding price is why agency leads are unqualified |
| 3 | **Years in business** — the site currently says both 10+ and 12+ | 12 years (founded 2014). Fix everywhere |
| 4 | **Phone number + WhatsApp** to publish | Required before Sprint 1 ships |
| 5 | **Client logo permissions** — or fall back to certified-partner logos | Decide by Week 3 |
| 6 | **Which 6 projects become case studies** (needs metrics + permission) | Decide by Week 1; content by Week 3 |
| 7 | **Which certifications and awards are actually held** | Only real ones ship |

---

## Non-negotiables

1. **Nothing is claimed that cannot be substantiated.** No invented client logos, no unearned certification badges, no fabricated testimonials, no schema markup that contradicts visible content. Every number on the site must be defensible.
2. **Token-only styling.** No literal colour, size, radius, shadow or duration anywhere in the HTML/CSS.
3. **One `<h1>` per page.** Semantic landmarks on every page.
4. **WCAG 2.2 AA is a build gate**, not a post-launch task.
5. **`prefers-reduced-motion` honoured globally.**
6. **No lorem ipsum in any approved template.**
7. **Asset budgets are enforced**, per page, per template.
8. **Phase 2 uses a custom WordPress block theme** — not Elementor, not another purchased theme.

---

## Content dependencies (client-owned, on the critical path)

The design work is not blocked by design decisions — it is blocked by content. Start these in Week 1:

- [ ] 6 case studies: client name (or agreed anonymisation), challenge, solution, **one hard metric**, tech stack, real screenshots, written permission
- [ ] Client logos + permission, or the partner-logo fallback list
- [ ] Live Clutch / Google / GoodFirms profiles with real ratings and counts
- [ ] 5+ testimonials with name, role, company and permission
- [ ] The actual list of certifications and awards held
- [ ] Consistent team photography (single shoot, one standard)
- [ ] Phone number, WhatsApp number, business hours
- [ ] Privacy Policy, Terms, Cookie Policy (legal review) — **launch blockers**

---

*Prepared as the master reference for the Divine Dev Hub redesign. Every subsequent design and HTML deliverable is to be checked against this document.*
