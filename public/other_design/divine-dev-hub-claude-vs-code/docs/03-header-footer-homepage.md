# Part 3 — Header, Footer & Homepage Blueprint
**Divine Dev Hub — Website Redesign Master Strategy**

> These three are **Build Order 1, 2, 3**. Everything in this part is specified to implementation depth.

---

## 4. Header Design

### 4.1 Structure — Two Bars

```
┌──────────────────────────────────────────────────────────────────────────────┐
│ UTILITY BAR   36px · ink-950 · desktop ≥1024 only · hides on scroll          │
│ ✉ info@divinedevhub.in   ✆ +91 XXXXX XXXXX   📍 Ahmedabad, India             │
│                              ● We're hiring — 6 open roles →   in  f  X  ig  │
├──────────────────────────────────────────────────────────────────────────────┤
│ MAIN BAR   80px (72px scrolled) · white / glass                              │
│ [LOGO 168×40]   Services▾ Hire Developers▾ Industries▾ Our Work▾ Company▾    │
│                 Resources▾            ⌕   [Book a Free Consultation →]       │
└──────────────────────────────────────────────────────────────────────────────┘
```

**Why a utility bar:** it publishes the phone number and email at all times — the single highest-leverage fix identified in the audit (defect B6) — without stealing space from the main navigation, and it surfaces careers for the talent audience.

### 4.2 Specifications

| Property | Desktop (≥1024) | Tablet (768–1023) | Mobile (<768) |
|---|---|---|---|
| Utility bar | 36px, visible | hidden | hidden |
| Main bar height | 80px → 72px scrolled | 72px | 64px |
| Container | 1440px, 64px gutter | 40px gutter | 20px gutter |
| Logo | 168×40 | 150×36 | 132×32 |
| Nav font | 15px / 600 | — | 18px / 600 (drawer) |
| Nav item gap | 28px | — | — |
| CTA | `lg` primary | `md` primary | in drawer + sticky bar |
| Phone | utility bar | icon button | sticky bar |
| Search | icon → overlay | icon | inside drawer |

### 4.3 Scroll Behaviour

| State | Trigger | Appearance |
|---|---|---|
| **Top (default)** | `scrollY < 40` | Transparent over dark heroes (white logo + white nav) · solid white on light pages · no shadow · 80px |
| **Scrolled** | `scrollY ≥ 40` | `rgba(255,255,255,.82)` + `backdrop-filter: blur(20px) saturate(180%)` · 1px `ink-200` bottom border · `shadow-sm` · 72px · logo swaps to dark |
| **Scrolling down** | delta > 8px, past 400px | Header translates `-100%`, 260 ms — reclaims viewport on mobile |
| **Scrolling up** | any upward delta | Header returns instantly (180 ms) — always available |
| **Menu open** | mega/drawer open | Header forced to solid; page scroll locked; body gets scrollbar-gutter compensation to prevent shift |

**Scroll progress bar:** a 2px `--grad-brand` bar pinned to the bottom edge of the header, width = page scroll %. Present on Blog Detail and Case Study Detail only.

**Implementation notes:** use `IntersectionObserver` on a 1px sentinel element rather than a scroll listener (no scroll-jank, protects INP). `will-change: transform` applied only while the header is animating. Header must never animate `height` — use `padding-block` on an inner element or a transform-based logo scale.

### 4.4 Mega Menu Behaviour

- **Trigger:** hover with a **120 ms open delay** and a **220 ms close delay** (prevents flicker); click/Enter also opens (touch + keyboard parity).
- **Panel:** full-width, max 1440px, centred, drops from the header. `ink-0` background, `shadow-xl`, `radius-lg` on the bottom two corners only, 40px padding.
- **Animation:** `opacity 0→1` + `translateY(-8px)→0` over 220 ms `cubic-bezier(.22,1,.36,1)`. Closing 160 ms.
- **Backdrop:** page dims to `rgba(10,10,24,.35)` with a 200 ms fade.
- **Safe triangle:** a transparent bridge element between trigger and panel so diagonal mouse travel does not close the menu.
- **Column item:** 20px icon + label (15px/600 `ink-800`) + optional 13px descriptor (`ink-500`). Hover: `ink-50` fill, `radius-sm`, label→`brand-700`, icon→`brand-600`, 3px translate.
- **Promo rail:** right column, 300px, `ink-50` fill, `radius-lg` — featured case study or contextual CTA (contents defined in Part 1 §2.3.2).
- **Bottom bar of the panel:** a full-width `brand-50` strip with a single contextual line + link, e.g. *"Not sure which service fits? Book a free 30-minute technical consultation →"*.

**Keyboard & a11y**
- `<nav aria-label="Primary">`; each trigger is a `<button aria-expanded aria-controls>`.
- `Enter`/`Space` toggles; `Escape` closes and returns focus to the trigger; `Tab` moves through panel links; `ArrowDown` from the trigger enters the panel; `ArrowLeft`/`ArrowRight` move between top-level items.
- Focus is **not** trapped in a desktop mega menu (it is in the mobile drawer).
- Panels are in the DOM but `hidden`/`inert` when closed — never `display:none` toggled by JS alone (screen-reader announcement required via `aria-expanded`).

### 4.5 Search

- Icon button → **full-screen overlay** (not a dropdown): dark scrim, large centred input (24px text), instant results grouped by type (Services · Case Studies · Blog · Technologies).
- Popular searches shown before typing: *"Hire React developers" · "Healthcare software" · "Odoo implementation" · "Pricing"*.
- `Cmd/Ctrl + K` shortcut (a quiet signal to a technical audience that this is a serious product).
- `Escape` closes, focus returns to the trigger. `role="search"`, `aria-live="polite"` result count.
- **Phase 1:** static overlay UI with a hardcoded popular-searches list. **Phase 2:** wired to WordPress search or an index.

### 4.6 Mobile Navigation

```
┌───────────────────────────────┐   Drawer: 100vw × 100vh, slides from right,
│ [LOGO]                    [✕] │   320ms cubic-bezier(.22,1,.36,1)
├───────────────────────────────┤   Background: ink-0, safe-area insets respected
│ ⌕  Search                     │
│                               │
│ Services                   ▾  │   ← accordion, expands in place
│   Custom Software Dev         │
│   Web Development             │
│   Mobile App Development      │
│   … + "View all services →"   │
│ Hire Developers            ▾  │
│ Industries                 ▾  │
│ Our Work                   ▾  │
│ Company                    ▾  │
│ Resources                  ▾  │
├───────────────────────────────┤
│ ✆ +91 XXXXX XXXXX             │
│ ✉ info@divinedevhub.in        │
│ [ Book a Free Consultation → ]│
│ in  f  X  ig                  │
└───────────────────────────────┘
```

**Rules**
- Accordion (expand in place), **never** a drill-down with a back button.
- Only one accordion open at a time; smooth `grid-template-rows: 0fr → 1fr` height animation (no `max-height` hacks).
- 56px minimum row height; 24px horizontal padding.
- Body scroll locked via `overflow:hidden` + `position:fixed` with scroll-position restore.
- Focus **trapped** inside the drawer; `Escape` closes; focus returns to the hamburger.
- Hamburger animates into an X (three lines → two crossed), 300 ms.
- Drawer content is a **duplicate DOM node**, not a CSS-reflow of the desktop nav — simpler, more reliable, negligible weight.

**Sticky mobile action bar (all pages, < 768px):**
```
┌──────────────┬──────────────┬────────────────────┐
│  ✆  Call     │  💬 WhatsApp │  ✦ Get a Quote     │
└──────────────┴──────────────┴────────────────────┘
```
56px tall, `ink-0` with `shadow-xl` upward, 1px top border, `env(safe-area-inset-bottom)` padding, z-index 60. Appears after 25% scroll, hides while the drawer is open. The "Get a Quote" cell uses the gradient fill. **This is the single largest mobile conversion lever on the site.**

### 4.7 Header Conversion Notes

- CTA copy: **"Book a Free Consultation"** (specific, low-commitment, names the value) — not "Contact Us".
- A small `● Available` pulsing dot beside the phone number in the utility bar (green = business hours IST, amber = outside) adds perceived responsiveness at near-zero cost.
- On the header CTA hover, reveal a 13px tooltip: *"30 minutes · No obligation · NDA protected"*.
- Header CTA is `brand-600` solid on every page **except** pages with a dark hero, where it becomes white-on-dark until the scrolled state kicks in.

---

## 5. Footer Design

### 5.1 Structure — Four Zones

```
╔══════════════════════════════════════════════════════════════════════════════╗
║  ZONE 0 — PRE-FOOTER CTA BAND   (overlapping card, -80px into the footer)    ║
║  ┌────────────────────────────────────────────────────────────────────────┐  ║
║  │  grad-brand · radius-2xl · shadow-xl · 64px padding                     │  ║
║  │  Ready to build something exceptional?                                  │  ║
║  │  Tell us about your project. We'll reply within 4 business hours.       │  ║
║  │  [ Book a Free Consultation → ]   [ Call +91 XXXXX XXXXX ]              │  ║
║  │  🔒 NDA protected · ⏱ 4-hour response · 💬 Free 30-min consult          │  ║
║  └────────────────────────────────────────────────────────────────────────┘  ║
╠══════════════════════════════════════════════════════════════════════════════╣
║  ZONE 1 — NEWSLETTER STRIP                                                   ║
║  Engineering insights, monthly. No fluff.        [ your@email.com ][ Join → ]║
║  2,400+ CTOs and founders subscribe · Unsubscribe anytime                    ║
╠══════════════════════════════════════════════════════════════════════════════╣
║  ZONE 2 — MAIN LINK GRID  (ink-950)                                          ║
║  ┌─────────────┬────────────┬────────────┬────────────┬────────────┐        ║
║  │ BRAND 3col  │ SERVICES   │ HIRE DEVS  │ INDUSTRIES │ COMPANY    │        ║
║  │ [logo]      │ Custom SW  │ React.js   │ Healthcare │ About Us   │        ║
║  │ 60-word     │ Web Dev    │ Node.js    │ Fintech    │ Our Team   │        ║
║  │ positioning │ Mobile Apps│ Laravel    │ E-Commerce │ Process    │        ║
║  │ statement   │ AI & ML    │ Python     │ Education  │ Careers ●6 │        ║
║  │             │ SaaS Dev   │ Flutter    │ Logistics  │ Case Study │        ║
║  │ ⭐4.9 Clutch│ E-Commerce │ Odoo       │ Real Estate│ Blog       │        ║
║  │ ⭐4.8 Google│ Odoo/ERP   │ Magento    │ Travel     │ Contact    │        ║
║  │ ⭐4.9 GoodF │ CRM        │ AI/ML Eng  │ Mfg        │ Testimonial│        ║
║  │             │ Cloud/DevOp│ Full-Stack │ Media      │ Awards     │        ║
║  │ 📍 Ahmedabad│ UI/UX      │ Designers  │ HR Tech    │ FAQs       │        ║
║  │ ✆ +91 ...   │ QA Testing │            │            │            │        ║
║  │ ✉ info@...  │ View all → │ View all → │ View all → │            │        ║
║  │ 💬 WhatsApp │            │            │            │            │        ║
║  └─────────────┴────────────┴────────────┴────────────┴────────────┘        ║
║  ── divider ──                                                               ║
║  TECHNOLOGIES:  React · Node.js · Laravel · Python · .NET · Flutter ·        ║
║  React Native · AWS · Azure · Docker · Kubernetes · PostgreSQL · MongoDB ·   ║
║  OpenAI · LangChain · Odoo · Magento · Shopify · WordPress    View all →     ║
║  ── divider ──                                                               ║
║  TRUST ROW:  [ISO 27001] [GDPR Ready] [HIPAA Aware] [AWS Partner]            ║
║              [Odoo Partner] [Adobe/Magento] [Clutch Top Dev] [DMCA]          ║
╠══════════════════════════════════════════════════════════════════════════════╣
║  ZONE 3 — LEGAL BAR                                                          ║
║  © 2014–2026 Divine Dev Hub. All rights reserved.                            ║
║  Privacy · Terms · Cookies · Accessibility · Sitemap      in f X ig ▶ dribbble║
╚══════════════════════════════════════════════════════════════════════════════╝
```

### 5.2 Zone Specifications

**Zone 0 — Pre-footer CTA band**
- Sits *on top of* the footer: the footer has `padding-top: 160px` and the card uses `margin-bottom: -80px` from the preceding section. Creates depth and guarantees the CTA is seen.
- Background `--grad-brand`, `radius-2xl`, `shadow-xl`, white text, blueprint-grid overlay at 6% opacity.
- Two CTAs: gradient-inverse primary (white bg / brand text) + ghost-on-brand secondary.
- Three micro-trust items below the buttons with icons — these do more conversion work than the headline.
- Mobile: stacks, 40px padding, buttons full width, micro-trust becomes a vertical list.

**Zone 1 — Newsletter**
- `ink-900` band, single row on desktop (headline left, form right), stacked on mobile.
- Single email field + button; label visually hidden but present; inline success state (no page reload).
- The subscriber count is a trust signal — **only use a real number**.
- GDPR: consent checkbox is **not** used (single opt-in with clear purpose text is compliant for B2B in most jurisdictions); a link to the Privacy Policy sits under the field. Confirm with the client's counsel before launch.

**Zone 2 — Main link grid**
- `ink-950` background with the `--grad-dark-mesh` at low intensity.
- Desktop 12-col: brand block spans 3, then four link columns span 2 each (with a 1-col gutter), or 3+9 with the 9 split four ways.
- Column headings: `--fs-overline`, `on-dark-tertiary`.
- Links: 15px/400 `on-dark-secondary`; hover → white + 3px translate + a `brand-400` leading dash that fades in.
- Brand block includes: logo (white variant), a 40–60 word positioning statement, **three review-platform ratings with real scores**, address, `tel:` link, `mailto:` link, WhatsApp link.
- "Careers" carries a `●6` pill showing open roles — recruiting + a growth signal to buyers.
- **Technologies row** is a horizontal tag cloud — a deliberate internal-linking device that pushes equity to 20+ technology pages from every page on the site.
- **Trust row** contains only *earned* badges. If a badge does not exist yet, the slot stays empty until it does. Never place a placeholder certification.

**Zone 3 — Legal bar**
- 56px, 1px top border `rgba(255,255,255,.08)`, 13px `on-dark-tertiary`.
- Copyright as a range `2014–2026` (signals longevity; matches the founding year on the About page).
- Social icons 20px, `radius-full` 36px hit targets, hover → `brand-400`.

### 5.3 Responsive Behaviour

| Breakpoint | Layout |
|---|---|
| ≥1280 | 5 columns as drawn |
| 1024–1279 | Brand block full width on top; 4 link columns below |
| 768–1023 | Brand block full width; link columns 2×2 |
| <768 | Brand block; link columns become **accordions** (collapsed by default, `<details>` elements); technologies row becomes a horizontally scrollable chip strip; trust badges 2-up grid; legal bar stacks |

### 5.4 Footer Rationale

| Element | Why it's there |
|---|---|
| 40+ links | Distributes internal link equity to every hub and top spoke from every page — the cheapest SEO lever available |
| Review ratings | Third-party proof is more persuasive than self-reported claims |
| Technologies tag cloud | Creates the technology-axis internal linking layer without a nav slot |
| Trust badge row | Answers "are they safe to work with?" at the moment of highest consideration |
| Newsletter | Captures the 95% of visitors who will not convert today |
| Phone + WhatsApp + email | Three contact modes; WhatsApp is critical for Indian, Middle-Eastern and APAC buyers |
| Open-roles pill | Talent acquisition + a company-health signal |
| Pre-footer CTA | The last conversion opportunity; the highest-scroll-depth CTA on any page |

---

## 6. Homepage Blueprint

### 6.1 Homepage Strategy

**Primary goal:** book a consultation.
**Secondary goals:** capture an email (newsletter / cost calculator), start a portfolio or case-study exploration.
**Primary audiences, in order:** (1) founder/CTO at a funded startup, (2) IT/product lead at an SMB or mid-market enterprise, (3) agency seeking a white-label partner, (4) prospective employee.

**Narrative arc:**
> Who we are → who trusts us → what we do → who we do it for → why we're different → how we work → proof it works → what people say → the numbers → what we build with → your questions answered → we're active thinkers → let's talk.

**Section count: 16.** Space-O uses 22 (exhausting); Hidden Brains uses 6 (thin). Sixteen is the point where proof is complete and attention still holds.

**Scroll-depth conversion checkpoints:** the visitor encounters a conversion opportunity at **0%** (hero), **~25%** (services), **~50%** (case studies), **~75%** (stats/testimonials) and **100%** (final CTA) — plus the persistent header CTA and mobile action bar.

---

### 6.2 Section-by-Section Wireframe

---

#### SECTION 1 — HERO  ▓ dark (`ink-950` + `grad-dark-mesh` + blueprint grid)

```
┌────────────────────────────────────────────────────────────────────────────┐
│  ● Trusted by 510+ clients since 2014                    [overline badge]   │
│                                                                            │
│  Software that                          ┌────────────────────────────┐     │
│  moves your business                    │                            │     │
│  forward.                               │   Composite product visual │     │
│  ──────────────                         │   (browser frame + mobile  │     │
│  (last line uses grad-text)             │    frame, real UI, floating│     │
│                                         │    metric chips)           │     │
│  We design, build and scale custom      │                            │     │
│  software, AI products and enterprise   │   ┌──────────────┐         │     │
│  platforms — 540+ delivered from        │   │ +312% conv.  │  ←chip  │     │
│  Ahmedabad to 20+ countries.            │   └──────────────┘         │     │
│                                         │                            │     │
│  [ Book a Free Consultation → ] [ ▶ View Our Work ]                  │     │
│                                         └────────────────────────────┘     │
│  ⭐4.9 Clutch   ⭐4.8 Google   🔒 NDA protected   ⏱ Reply in 4 hrs         │
└────────────────────────────────────────────────────────────────────────────┘
```

| Aspect | Specification |
|---|---|
| **Purpose** | Answer *what do you do*, *for whom*, *why trust you*, *what do I do next* — in under 5 seconds |
| **Layout** | 12-col: text 6 cols, visual 6 cols (desktop). Min height `88vh`, max `900px`. Never `100vh` (mobile browser-chrome bug) |
| **Hierarchy** | Badge → H1 (`--fs-display-1`, max 3 lines, `text-wrap: balance`) → lead paragraph (`--fs-body-lg`, ≤ 62ch) → CTA pair → trust strip |
| **Headline options** | A) *"Software that moves your business forward."* B) *"We build the software your business runs on."* C) *"From idea to production-grade software."* — **Recommend A**; benefit-led, ownable, not a category cliché |
| **Copy rules** | H1 must contain the primary keyword naturally ("software development company" belongs in `<title>`, not forced into the H1). Lead paragraph carries the numbers |
| **CTA placement** | Primary `xl` gradient/solid; secondary ghost-on-dark. Left-aligned under the paragraph, 16px gap, stacked full-width < 640px |
| **Visual** | Composite of 2–3 **real** project screenshots in clean device frames, angled slightly, with 2 floating metric chips (`--grad-brand` badges). Static AVIF, `fetchpriority="high"`, `width`/`height` set — this is the LCP element |
| **Animation** | On load: badge, H1 lines, paragraph, CTAs, trust strip stagger in with `opacity 0→1` + `translateY(16px)→0`, 60 ms apart, 500 ms each. Visual fades + scales `0.96→1` at 200 ms. **Total ≤ 900 ms.** Floating chips get a slow 6 s `translateY(±6px)` loop. Blueprint grid parallaxes at 0.15× scroll (transform only) |
| **Mobile** | Stack: badge → H1 (40px) → paragraph → CTAs (full width, stacked) → visual → trust strip becomes a 2×2 grid. Visual can be simplified to a single device frame to protect LCP |
| **SEO** | Single `<h1>`. Hero image alt describes the actual product shown. Above-fold content is real HTML text, never an image of text. Preload the LCP image and the two above-fold fonts |
| **Conversion** | Two CTAs of different commitment levels; four trust proofs visible without scrolling; specific numbers (510+, 540+, 20+) rather than adjectives |
| **Anti-pattern** | No autoplay video, no carousel, no WebGL, no typewriter effect on the H1 (delays LCP and hurts a11y) |

---

#### SECTION 2 — CLIENT LOGOS  ░ light (`ink-50`)  · `--section--tight`

```
      Trusted by teams building in 20+ countries
   [logo] [logo] [logo] [logo] [logo] [logo] [logo] →  (infinite marquee)
```

| Aspect | Specification |
|---|---|
| **Purpose** | Immediate borrowed credibility — the single most reliable early-scroll trust device |
| **Layout** | Centred 14px `ink-500` label; below it a full-bleed marquee (desktop) or a 3×2 static grid (mobile) |
| **UI** | Logos monochrome `ink-400`, opacity .75; on hover → full colour, opacity 1, `scale(1.04)`. Uniform optical height (28px cap height), not uniform bounding box |
| **Animation** | CSS-only infinite marquee, 40 s linear, duplicated track, **pauses on hover and on `prefers-reduced-motion`** |
| **Mobile** | Static 3-column × 2-row grid — a moving marquee on a small screen is illegible and burns battery |
| **Content note** | **Requires real client logos with written permission.** If permission is unavailable, substitute: platform logos the team is certified in (AWS, Odoo, Adobe Commerce, Microsoft) under the label "Certified & partnered with". **Never fabricate client logos.** |
| **SEO** | Logos are `<img>` with `alt="{Client name} logo"`; the section is inside a `<section aria-labelledby>` |

---

#### SECTION 3 — INTRODUCTION + REVIEW RATINGS  ░ light (`ink-0`)

```
┌─────────────────────────────┬──────────────────────────────────────────┐
│  WHO WE ARE                 │  ⭐⭐⭐⭐⭐ 4.9 / 5    Clutch   (32 reviews)│
│                             │  ⭐⭐⭐⭐⭐ 4.8 / 5    Google   (48 reviews)│
│  A 50-person engineering    │  ⭐⭐⭐⭐⭐ 4.9 / 5    GoodFirms(19 reviews)│
│  team that ships.           │  ─────────────────────────────────────── │
│                             │  "They delivered a complex HRMS platform │
│  Since 2014 we've delivered │   three weeks ahead of schedule."        │
│  540+ projects for 510+     │   — [Name], [Role], [Company]            │
│  clients across healthcare, │                                          │
│  fintech, retail, logistics │  [ Read all reviews → ]                  │
│  and SaaS. …                │                                          │
│                             │                                          │
│  ✓ In-house team, no        │                                          │
│    subcontracting           │                                          │
│  ✓ Fixed-scope or dedicated │                                          │
│    team engagement          │                                          │
│  ✓ Source code and IP are   │                                          │
│    100% yours               │                                          │
│                             │                                          │
│  [ About Divine Dev Hub → ] │                                          │
└─────────────────────────────┴──────────────────────────────────────────┘
```

| Aspect | Specification |
|---|---|
| **Purpose** | Establish the company as real, sized, and safe; convert the About page's buried assets into homepage currency |
| **Layout** | 7 / 5 split, left text, right proof panel (`ink-50` card, `radius-xl`, 40px padding) |
| **Hierarchy** | Overline → H2 → 3-sentence paragraph → 3 checkmark differentiators → text CTA |
| **UI** | Checkmarks in `success-500` circles; the proof panel's rating rows are separated by hairline dividers |
| **Animation** | Reveal on scroll, 80 ms stagger between the left column and the right panel |
| **Mobile** | Text block first, proof panel below; ratings become a 3-row stack |
| **SEO** | `AggregateRating` schema on the ratings block (only if genuinely licensed/permitted by the platform's terms — verify Clutch's badge policy). Semantic `<h2>` |
| **Conversion** | The three checkmarks pre-empt the three biggest outsourcing fears (subcontracting, unclear engagement, IP ownership) |
| **Content note** | If review counts are not yet real, this section launches with the testimonial + differentiators only, and ratings are added when earned |

---

#### SECTION 4 — SERVICES  ░ light (`ink-50`)

```
                        WHAT WE DO
              End-to-end software services
   From discovery to deployment and beyond — one accountable partner.

┌───────────────────────────┬─────────────┬─────────────┐
│  [icon]                   │  [icon]     │  [icon]     │
│  Custom Software          │  Mobile App │  AI & ML    │
│  Development              │  Development│  Development│
│                           │             │             │
│  Enterprise-grade         │  iOS,       │  AI agents, │
│  platforms built to your  │  Android &  │  LLM apps,  │
│  exact process.           │  Flutter.   │  automation.│
│                           │             │             │
│  React · Node · .NET      │  Swift·Kotlin│ OpenAI·LangC│
│  Explore →                │  Explore →  │  Explore →  │
│      (FEATURED — 6 cols)  │  (3 cols)   │  (3 cols)   │
├─────────────┬─────────────┼─────────────┴─────────────┤
│ Web App Dev │ E-Commerce  │  Odoo / ERP Development   │
│ (3 cols)    │ (3 cols)    │      (FEATURED — 6 cols)  │
├─────────────┼─────────────┼─────────────┬─────────────┤
│ CRM         │ Cloud/DevOps│  UI/UX      │ QA & Testing│
└─────────────┴─────────────┴─────────────┴─────────────┘

                 [ View All 14 Services → ]
```

| Aspect | Specification |
|---|---|
| **Purpose** | Show the full capability surface and route visitors into service pages; the primary internal-linking engine of the homepage |
| **Layout** | **Bento grid**, 12-col. Two featured tiles span 6 cols and are visually heavier; the rest span 3. This creates hierarchy (Custom Software and Odoo are the highest-value offerings) instead of a flat, forgettable 3×3 |
| **Hierarchy per card** | Icon tile (48px) → title (`--fs-h4`) → 1-line description → tech tag row → "Explore →" |
| **UI** | Featured tiles: `ink-0` bg, gradient border, `radius-xl`, 40px pad, larger icon (56px), small illustrative graphic in the corner. Standard tiles: `ink-0`, `1px ink-200`, `radius-lg`, 28px pad |
| **Animation** | Staggered reveal, 60 ms apart, in reading order. Hover: `-4px` Y, `shadow-lg`, border→`brand-200`, icon tile fill deepens, arrow slides +4px. Featured tiles additionally reveal a faint `--grad-brand` radial glow that follows the cursor (CSS custom property updated on `pointermove`, throttled with `requestAnimationFrame`) |
| **Mobile** | All tiles full width, single column, ordered by commercial value; featured tiles keep their larger padding. Optional: horizontal scroll-snap carousel for the 8 non-featured tiles to reduce scroll length |
| **SEO** | Each card title is inside an `<h3>`; the whole card is a link to the service page. 14 outbound internal links from the homepage to service pages — a strong topical signal |
| **Conversion** | Section-level CTA at the bottom prevents dead-ending; each card is a micro-conversion into a deeper funnel |

---

#### SECTION 5 — INDUSTRIES  ▓ dark (`ink-900`)

```
              INDUSTRIES WE SERVE
     Domain knowledge you don't have to pay for twice
   We've shipped in these verticals before. That shortens discovery,
   de-risks compliance, and gets you to production faster.

┌──────────┬──────────┬──────────┬──────────┬──────────┐
│ Healthcare│ Fintech │ E-Comm   │ Education│ Logistics│
│ 40+ proj │ 25+ proj │ 90+ proj │ 30+ proj │ 20+ proj │
├──────────┼──────────┼──────────┼──────────┼──────────┤
│Real Estate│ Travel  │ Mfg      │ Media    │ HR Tech  │
└──────────┴──────────┴──────────┴──────────┴──────────┘
              [ Explore all industries → ]
```

| Aspect | Specification |
|---|---|
| **Purpose** | Let visitors self-identify (the single most effective B2B relevance mechanism) and open the industry SEO axis |
| **Layout** | 5-up grid on desktop, 3-up tablet, 2-up mobile. Equal square-ish tiles |
| **UI** | Dark glass tiles: `rgba(255,255,255,.04)`, `1px rgba(255,255,255,.10)`, `radius-lg`, 28px pad. 32px line icon in `brand-400`, industry name (`--fs-h5`, white), project count (`--fs-caption`, `on-dark-tertiary`) |
| **Animation** | Reveal with 40 ms stagger. Hover: fill → `.08`, border → `rgba(109,77,246,.5)`, `glow-dark`, icon `scale(1.1)`, and a hidden line ("View healthcare solutions →") slides up from the bottom of the tile |
| **Mobile** | 2 columns; project count moves under the name; hover state becomes the resting state (no hidden content on touch) |
| **SEO** | 10 internal links to industry pages. Each tile heading is an `<h3>` |
| **Conversion** | Project counts turn a generic list into evidence. A visitor from a hospital group sees "Healthcare — 40+ projects" and self-qualifies |
| **Content note** | Counts must be defensible. If exact counts aren't available, use honest bands ("Healthcare · 6 platforms shipped") |

---

#### SECTION 6 — WHY CHOOSE US  ░ light (`ink-0`)

```
                     WHY DIVINE DEV HUB
        Six reasons clients stay with us for years

┌────────────────────────────────┬───────────────────────────────┐
│  97%                           │  ⚡ 4-hour response time      │
│  Client retention rate         │  Real people, real answers,   │
│  Over half our 2026 revenue    │  within one business half-day.│
│  comes from clients who        ├───────────────────────────────┤
│  started with us before 2022.  │  🔒 Your IP, your code        │
│  (LARGE BENTO — 6 cols, 2 rows)│  Full source code and IP      │
│                                │  transfer on delivery. NDA    │
│                                │  signed before we talk specs. │
├────────────────────────────────┼───────────────────────────────┤
│  👥 50 in-house engineers      │  🌏 20+ countries served      │
│  No subcontracting. Ever.      │  Timezone overlap guaranteed. │
├────────────────────────────────┴───────────────────────────────┤
│  🔁 Agile, with proof — two-week sprints, demo every sprint,   │
│     and a shared board you can see any time. (WIDE — 12 cols)  │
└────────────────────────────────────────────────────────────────┘
```

| Aspect | Specification |
|---|---|
| **Purpose** | Differentiate on operating model, not on adjectives; handle objections before they're voiced |
| **Layout** | **Bento grid** with one hero tile (large stat), four medium tiles, one wide tile |
| **Hierarchy** | The hero tile leads with the number, not the label — numbers stop scroll |
| **UI** | Hero tile: `--grad-brand-soft` background, white text, blueprint overlay. Others: `ink-50` fill, `radius-lg`, `1px transparent` → `ink-200` on hover |
| **Animation** | The `97%` counts up from 0 when the section is 40% in view (once only, `IntersectionObserver`). Tiles reveal with a 50 ms stagger |
| **Mobile** | Single column; hero tile first, wide tile last; no height games |
| **SEO** | Each reason is a `<h3>` — this section is highly extractable by AI answer engines, which favours citation |
| **Conversion** | Each tile is an objection killer: retention→risk, response→responsiveness, IP→ownership fear, in-house→quality fear, timezone→logistics fear, agile→control fear |

---

#### SECTION 7 — DEVELOPMENT PROCESS  ░ light (`ink-50`)

```
                     HOW WE WORK
       A process built to remove surprises, not add meetings

  ①──────────②──────────③──────────④──────────⑤──────────⑥
  Discovery  Design &   Sprint      QA &       Launch     Scale &
  & Scoping  Architecture Development Security  & Handover Support
  ────────── ────────── ────────── ────────── ────────── ──────────
  3–5 days   1–2 weeks  2-wk cycles Continuous 1 week    Ongoing
  Workshop,  Wireframes,Working     Automated  Zero-     SLA-backed
  estimate,  UI, tech   software    + manual   downtime  monitoring
  roadmap    stack, ADR every 2 wks testing    deploy    & iteration
  ────────── ────────── ────────── ────────── ────────── ──────────
  Deliverable: Deliverable: Deliverable: Deliverable: …
  Scope doc  Clickable  Sprint demo Test report Live prod  Monthly
  + estimate prototype  + build     + sign-off  + docs     report

              [ See our full process → ]
```

| Aspect | Specification |
|---|---|
| **Purpose** | Reduce perceived risk. Buyers who understand the process convert at materially higher rates. The current site's four vague steps are replaced with a six-stage process that names **timelines and deliverables** — the two things clients actually want to know |
| **Layout** | Horizontal 6-step timeline on desktop with a connecting line; vertical timeline on mobile |
| **UI** | Numbered circular nodes (48px) on a 2px `ink-200` connector; the completed portion of the connector is `--grad-brand`. Each step is a column with title, duration chip, 2-line description, and a "Deliverable:" line in `--fs-caption` |
| **Animation** | As the section scrolls into view, the connector line draws left→right (`clip-path` or `background-size` — not `width`), and nodes activate in sequence with a `scale(1)→(1.15)→(1)` pop, 120 ms apart. Node icons switch from outline to filled as they activate. Scroll-driven CSS animation where supported, `IntersectionObserver` fallback |
| **Mobile** | Vertical timeline, connector on the left, cards on the right; the line draws top→bottom as you scroll |
| **SEO** | `HowTo`-adjacent content; each step is an `<h3>`. Strong AEO surface ("What is your software development process?") |
| **Conversion** | Naming deliverables per stage makes the engagement feel already-managed. The CTA routes to the full Process page, which is a strong mid-funnel asset |

---

#### SECTION 8 — CASE STUDIES  ▓ dark (`ink-950` + mesh)

```
                    PROVEN RESULTS
          Real projects. Real numbers. Real clients.

┌──────────────────────────────────────────┬─────────────────────┐
│  [Large product screenshot]              │ [screenshot]        │
│  HEALTHCARE                              │ HR TECH             │
│  Wisdom Meds — medical billing platform  │ QuickClock — HRMS   │
│                                          │                     │
│  Cut claim-processing time by 68% and    │ 12,000 employees    │
│  eliminated 4 manual handoffs.           │ onboarded in 6 mo.  │
│                                          │                     │
│  [68% faster] [4 systems integrated]     │ [12k users]         │
│  React · Node.js · AWS · HL7             │ Laravel · Vue       │
│  Read the case study →                   │ Read →              │
│         (FEATURED — 7 cols)              │  (5 cols)           │
├──────────────────────┬───────────────────┴─────────────────────┤
│ MARKETPLACE          │ FINTECH                                 │
│ Aus Plates           │ Stock Market Service                    │
│ 3.2× listing growth  │ Sub-100ms real-time market data         │
│ Read →               │ Read →                                  │
└──────────────────────┴─────────────────────────────────────────┘

                 [ View all case studies → ]
```

| Aspect | Specification |
|---|---|
| **Purpose** | The heaviest-lifting proof section. 67% of B2B buyers name case studies the most influential content type in the research phase |
| **Layout** | Asymmetric grid: 1 featured (7 cols) + 1 tall (5 cols) + 2 wide (6 cols each) |
| **Hierarchy per card** | Industry tag → client/project name → **outcome sentence with a number** → metric badges → tech stack tags → CTA |
| **UI** | Media-led cards, `radius-xl`, image with a `linear-gradient(to top, ink-950 0%, transparent 60%)` scrim, text overlaid at the bottom on the featured card and below the image on the smaller ones. Metric badges use `--grad-brand` |
| **Animation** | Hover: image `scale(1.05)` over 600 ms, scrim deepens, CTA arrow slides, a 1px `brand-400` border fades in. Reveal on scroll with a 90 ms stagger |
| **Mobile** | Single column; featured card first; images 16:10; metric badges wrap |
| **SEO** | Links to `/case-studies/<slug>/`. Each card title is an `<h3>`. Descriptive, keyword-relevant alt text |
| **Conversion** | Outcome-first copy ("cut processing time 68%") rather than feature-first ("built with React"). This is the section that converts evaluators into enquiries |
| **Content note** | **This section is blocked on real case-study content.** Required per case study: client permission (or an anonymised label like "A US-based medical billing provider"), one hard metric, tech stack, a real screenshot. Six case studies must be written before the homepage can ship. This is the #1 content dependency in the project |

---

#### SECTION 9 — STATISTICS BAND  ▒ brand (`--grad-brand` + blueprint overlay)

```
     540+            510+            50            12          20+         97%
   Projects        Clients      Engineers       Years      Countries   Retention
   delivered        served       in-house    in business     served       rate
```

| Aspect | Specification |
|---|---|
| **Purpose** | A high-contrast credibility punctuation mark between proof and social proof; visually resets the eye |
| **Layout** | 6 across on desktop, 3×2 on tablet, 2×3 on mobile. `--section--tight` padding |
| **UI** | `--fs-stat` numbers in white/800 with `tabular-nums`; labels in `--fs-body-sm` at 85% opacity. Thin vertical dividers `rgba(255,255,255,.18)` between items (hidden on mobile) |
| **Animation** | Count-up from 0 over 1.6 s with an ease-out curve, triggered at 50% visibility, **once**. `aria-live="off"`; the final value is present in the DOM for screen readers and no-JS. The `+` and `%` suffixes never animate |
| **Mobile** | 2 columns, 3 rows, 32px gap |
| **SEO** | Plain text numbers in the HTML (not images, not JS-generated) so crawlers and AI answer engines can extract them |
| **Conversion** | Concentrated, scannable credibility for skim-readers who never read a paragraph |
| **Content note** | **Fixes audit defect A5:** "12 Years" here must match the About page and the founding year (2014). The "10+ Years" claim is retired site-wide |

---

#### SECTION 10 — TESTIMONIALS  ░ light (`ink-0`)

```
                    CLIENT VOICES
        What it's actually like to work with us

┌────────────────────────┬────────────────────────┬────────────────────────┐
│ ⭐⭐⭐⭐⭐               │ ⭐⭐⭐⭐⭐              │ ⭐⭐⭐⭐⭐               │
│ "They delivered a      │ "The only vendor we've │ "Three weeks ahead of  │
│  complex HRMS three    │  worked with that      │  schedule and under    │
│  weeks early, and the  │  flagged risks before  │  budget. That doesn't  │
│  handover docs were    │  we noticed them."     │  happen."              │
│  genuinely usable."    │                        │                        │
│                        │                        │                        │
│ [photo] Name           │ [photo] Name           │ [photo] Name           │
│         Role, Company  │         Role, Company  │         Role, Company  │
│         [company logo] │         [company logo] │         [company logo] │
│         via Clutch ✓   │         via Google ✓   │         via Clutch ✓   │
└────────────────────────┴────────────────────────┴────────────────────────┘
              ← →                ● ● ○              [ Read all reviews → ]
```

| Aspect | Specification |
|---|---|
| **Purpose** | Human, specific social proof. The current site's five testimonials are moved from the About page to the homepage and upgraded with attribution |
| **Layout** | 3-up card grid, or a scroll-snap carousel showing 3 with peek. Equal heights |
| **UI** | `ink-0` cards, `1px ink-200`, `radius-lg`, 32px pad. Large decorative quote glyph at 8% opacity top-left. 5-star row in `warning-500`. Author block: 48px round photo + name (600) + role/company (`ink-500`) + optional company logo + a **source verification chip** ("via Clutch ✓") |
| **Animation** | Reveal with stagger. Carousel: CSS scroll-snap, 400 ms smooth scroll, arrow + dot controls, autoplay **off** (autoplay steals reading control and hurts a11y) |
| **Mobile** | 1-up scroll-snap carousel with visible peek of the next card and dot indicators |
| **SEO** | `Review` schema nested in `Organization`, **only where reviews are genuine and attributable**. Never mark up unattributed testimonials |
| **Conversion** | The verification chip is what separates a believable testimonial from a fabricated one. Specific claims ("three weeks early", "handover docs usable") outperform generic praise ("great team") |
| **Content note** | Every testimonial needs a real name, role, company, and preferably a photo. Anonymous testimonials should be labelled honestly ("VP Engineering, US healthcare SaaS — name withheld under NDA"), which is *more* credible than a fake name |

---

#### SECTION 11 — TECHNOLOGIES  ░ light (`ink-50`)

```
                  OUR TECHNOLOGY STACK
        We pick the tool that fits — not the one we sell

 [ Frontend ] [ Backend ] [ Mobile ] [ AI/ML ] [ Cloud ] [ DevOps ] [ Data ]
 ─────────────────────────────────────────────────────────────────────────
 ┌─────┐ ┌─────┐ ┌─────┐ ┌─────┐ ┌─────┐ ┌─────┐ ┌─────┐ ┌─────┐
 │React│ │Next │ │ Vue │ │Angul│ │  TS │ │Tail │ │ ... │ │ ... │
 └─────┘ └─────┘ └─────┘ └─────┘ └─────┘ └─────┘ └─────┘ └─────┘

              [ Explore all technologies → ]
```

| Aspect | Specification |
|---|---|
| **Purpose** | Prove technical breadth to the most technical member of the buying committee; open the technology SEO axis |
| **Layout** | Tab bar (7 categories) + a responsive tile grid (8-up desktop, 4-up tablet, 3-up mobile) |
| **UI** | Tiles: `ink-0`, `1px ink-100`, `radius-md`, 96px square, centred 40px official logo + 13px label. Active tab has a 2px `brand-600` sliding underline |
| **Animation** | Tab switch: outgoing tiles fade + `translateY(8px)`, incoming fade in with a 20 ms stagger, 250 ms total. Tile hover: `-3px` Y + `shadow-md` + logo `scale(1.08)` |
| **Mobile** | Tab bar becomes a horizontally scrollable chip row with edge-fade; tiles 3-up |
| **A11y** | Real `role="tablist"`/`role="tab"`/`role="tabpanel"` with arrow-key navigation and `aria-selected`. All panels present in the DOM; inactive ones `hidden` |
| **SEO** | Each tile links to `/technologies/<slug>/`. Roughly 40–56 internal links — extremely strong for the technology axis. Logos are `<img alt="React logo">` |
| **Conversion** | The subheading ("we pick the tool that fits") pre-empts the "they'll push their favourite stack" objection |

---

#### SECTION 12 — ENGAGEMENT MODELS  ░ light (`ink-0`)

```
                   HOW TO WORK WITH US
        Three engagement models. No lock-in on any of them.

┌──────────────────────┬──────────────────────┬──────────────────────┐
│  DEDICATED TEAM      │  FIXED SCOPE         │  TIME & MATERIAL     │
│  Best for: long-term │  Best for: well-     │  Best for: evolving  │
│  product development │  defined projects    │  scope, fast starts  │
│  ─────────────────── │  ─────────────────── │  ─────────────────── │
│  ✓ Monthly billing   │  ✓ Fixed price       │  ✓ Pay for hours     │
│  ✓ You direct the    │  ✓ Fixed timeline    │  ✓ Scale up/down     │
│    team              │  ✓ Milestone-based   │    monthly           │
│  ✓ Min 3 months      │  ✓ Change requests   │  ✓ Weekly reporting  │
│  ✓ Scale any time      quoted upfront       │  ✓ No minimum        │
│                      │                      │                      │
│  From $X,XXX/mo      │  From $XX,XXX        │  From $XX/hour       │
│  [ Talk to us → ]    │  [ Get an estimate → ]│  [ Talk to us → ]   │
└──────────────────────┴──────────────────────┴──────────────────────┘

    Not sure which fits?  [ Use the project cost calculator → ]
```

| Aspect | Specification |
|---|---|
| **Purpose** | Remove commercial ambiguity — the second-most-common reason B2B software buyers abandon a vendor site. Neither reference site does this well on the homepage |
| **Layout** | 3 equal cards; the middle one may be marked "Most popular" with a `--grad-brand` top border and a badge |
| **UI** | Standard cards with a "Best for" line, a divider, 4 checkmark features, a price anchor, and a CTA |
| **Animation** | Reveal with stagger; hover lift; the recommended card sits at a permanently higher elevation |
| **Mobile** | Single column, recommended card first |
| **SEO** | `<h3>` per model. Strong AEO surface ("What are your engagement models?" / "How much does it cost?") |
| **Conversion** | Price anchors — even "From $X" — dramatically reduce bounce from budget-conscious visitors and improve lead quality. The calculator CTA captures those not ready to talk |
| **Client decision required** | Whether to publish price anchors at all. **Strong recommendation: yes.** Hiding price is the norm and it is why every agency's leads are unqualified |

---

#### SECTION 13 — CERTIFICATIONS & AWARDS  ░ light (`ink-50`) · `--section--tight`

```
              RECOGNISED & CERTIFIED
 [ISO 27001] [GDPR] [Clutch Top Dev 2026] [GoodFirms] [AWS Partner]
 [Odoo Partner] [Adobe Commerce] [Economic Times Award] [DUNS]
```

| Aspect | Specification |
|---|---|
| **Purpose** | Convert the current site's unsupported "12+ Awards" claim into visible evidence (audit defect B5) |
| **Layout** | Centred label + a single row (desktop) / 3-up grid (mobile) of badge tiles |
| **UI** | `ink-0` tiles, `1px ink-200`, `radius-md`, 24px pad, badge image at uniform 48px height, name below in `--fs-caption` |
| **Animation** | Simple reveal; hover raises and reveals a tooltip with the issuing body and year |
| **Mobile** | 3-up grid, badges 40px |
| **SEO** | `hasCredential` / `award` properties on the `Organization` schema |
| **Content note** | **Only real, current certifications.** If ISO 27001 is not held, do not show it — say "GDPR-compliant processes" or "SOC 2 readiness programme in progress" instead. A false certification badge is a legal and reputational risk far larger than the trust it buys |

---

#### SECTION 14 — FAQ  ░ light (`ink-0`)

```
┌──────────────────────────┬────────────────────────────────────────┐
│  FREQUENTLY ASKED        │  ▸ How much does custom software cost? │
│                          │  ▾ How long does a typical project take?│
│  Straight answers to the │    Most projects run 8–20 weeks. An MVP│
│  questions we get every  │    typically ships in 10–12 weeks…     │
│  week.                   │  ▸ Who owns the code and IP?           │
│                          │  ▸ Do you sign NDAs?                   │
│  Still have a question?  │  ▸ How do you handle scope changes?    │
│  [ Ask us directly → ]   │  ▸ What if I already have a codebase?  │
│                          │  ▸ How do you protect our data?        │
│                          │  ▸ What happens after launch?          │
└──────────────────────────┴────────────────────────────────────────┘
```

| Aspect | Specification |
|---|---|
| **Purpose** | Handle objections without a sales call; capture "People Also Ask" results; provide the highest-value AI-answer-engine surface on the site |
| **Layout** | 4/8 split — sticky intro on the left, accordion on the right |
| **UI** | Built on native `<details>/<summary>`. Row: 20px vertical padding, 1px `ink-200` bottom border, question at `--fs-h5`, chevron rotating 180°. Open row gets a `brand-50` tint and a 2px `brand-600` left bar |
| **Animation** | `grid-template-rows: 0fr → 1fr` expand over 280 ms; chevron rotate 200 ms. First item open by default |
| **Mobile** | Stacked; intro above the accordion |
| **SEO** | **`FAQPage` schema is mandatory here.** Questions phrased exactly as users search them. Answers begin with a direct one-sentence answer, then elaborate — this is what AI answer engines extract |
| **Conversion** | The 8 questions are chosen to kill the 8 real objections: price, timeline, IP, confidentiality, scope creep, legacy code, security, support |

---

#### SECTION 15 — INSIGHTS / BLOG  ░ light (`ink-50`)

```
                    INSIGHTS
     Engineering notes from the team, not marketing filler

┌────────────────────┬────────────────────┬────────────────────┐
│ [16:9 image]       │ [16:9 image]       │ [16:9 image]       │
│ AI · 8 min read    │ ARCHITECTURE · 6min│ ODOO · 5 min read  │
│ Title of the post  │ Title of the post  │ Title of the post  │
│ that runs two      │ that runs two      │ that runs two      │
│ lines maximum      │ lines maximum      │ lines maximum      │
│ [author] · Jun 2026│ [author] · Jun 2026│ [author] · Jun 2026│
└────────────────────┴────────────────────┴────────────────────┘
                  [ Read all articles → ]
```

| Aspect | Specification |
|---|---|
| **Purpose** | Demonstrate expertise (E-E-A-T), give the orphaned blog internal link equity (audit defect E4), and provide a low-commitment path for non-ready visitors |
| **Layout** | 3-up card grid; the newest post may be featured at 6 cols with 2 stacked at 3 cols each |
| **UI** | 16:9 AVIF thumbnail (`radius-lg` top), category chip + read time, `<h3>` title (2-line clamp), author avatar + name + date |
| **Animation** | Image `scale(1.05)` on hover with `overflow:hidden`; title→`brand-700`; card lift |
| **Mobile** | Single column, or a 1.15-card scroll-snap carousel |
| **SEO** | Links to `/blog/<slug>/`. Author names link to author pages — a direct E-E-A-T signal. `Article` schema on the detail pages |
| **Conversion** | Deliberately low-pressure. The conversion here is a newsletter signup or a return visit |

---

#### SECTION 16 — FINAL CTA  ▓ dark (`ink-950` + `grad-dark-mesh`)

This is **Zone 0 of the footer** (see §5.2) — the overlapping gradient card. It is documented as a footer zone so that it renders identically on every page, but on the homepage it is the sixteenth and final section.

**Homepage-specific copy:**
> **Let's talk about what you're building.**
> A free 30-minute call with a senior engineer — not a salesperson. You'll leave with a scoped approach and a realistic budget range, whether or not you work with us.
> `[ Book a Free Consultation → ]` `[ Call +91 XXXXX XXXXX ]`
> 🔒 NDA before specs · ⏱ Reply within 4 business hours · 💬 No obligation

**Why this works:** it names *who* the visitor will talk to (senior engineer, not salesperson), names the *deliverable* of the call (scoped approach + budget range), and explicitly removes the obligation. That combination outperforms "Contact us today!" by a wide margin.

---

### 6.3 Homepage Section Summary Table

| # | Section | Background | Primary job | Has CTA |
|---|---|---|---|---|
| 1 | Hero | Dark | Position + convert | ✅ ×2 |
| 2 | Client logos | Light | Borrowed credibility | — |
| 3 | Introduction + ratings | Light | Establish substance | ✅ text |
| 4 | Services | Light | Route to services | ✅ ×15 |
| 5 | Industries | Dark | Self-identification | ✅ ×11 |
| 6 | Why Choose Us | Light | Differentiate + de-risk | — |
| 7 | Process | Light | Reduce risk | ✅ text |
| 8 | Case studies | Dark | Prove outcomes | ✅ ×5 |
| 9 | Statistics | Brand | Scannable credibility | — |
| 10 | Testimonials | Light | Human proof | ✅ text |
| 11 | Technologies | Light | Technical credibility | ✅ ×41 |
| 12 | Engagement models | Light | Remove commercial ambiguity | ✅ ×4 |
| 13 | Certifications | Light | Institutional trust | — |
| 14 | FAQ | Light | Kill objections + AEO | ✅ text |
| 15 | Blog | Light | E-E-A-T + nurture | ✅ ×4 |
| 16 | Final CTA | Dark | Convert | ✅ ×2 |

**Estimated homepage length:** ~9,500 px desktop / ~15,000 px mobile — comparable to the references but with materially higher information density per pixel.

**Performance budget for the homepage:** HTML ≤ 60 KB · CSS ≤ 45 KB (gzip) · JS ≤ 25 KB (gzip) · fonts ≤ 120 KB · above-fold images ≤ 180 KB · **total above-fold ≤ 400 KB** · LCP ≤ 1.8 s on 4G · INP ≤ 120 ms · CLS ≤ 0.02.

### 6.4 Sections Deliberately Excluded

| Excluded | Reason |
|---|---|
| Pricing table with real prices | Belongs on `/engagement-models/`; on the homepage it invites price-shopping before value is established. Price *anchors* in §12 are the correct compromise |
| Team member grid | Belongs on About/Team. On the homepage it dilutes the commercial narrative |
| Video testimonial reel | Excellent asset, but heavy. Add in Phase 2 as a click-to-play on `/testimonials/` |
| Full portfolio grid (24 tiles) | Replaced by 4 curated case studies. The full grid lives at `/portfolio/` with filtering |
| Newsletter section (standalone) | Already in the footer; a second instance is redundant |
| Live chat widget | Recommended, but as a third-party embed loaded on interaction (not render-blocking). Specify in Phase 2 |

---

*Continue to → [Part 4 — Inner Pages](04-inner-pages.md)*
