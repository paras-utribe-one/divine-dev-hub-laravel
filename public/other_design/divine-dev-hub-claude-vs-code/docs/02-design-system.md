# Part 2 — Design Direction & Design System
**Divine Dev Hub — Website Redesign Master Strategy**

> This part is the **binding contract** for every HTML page built in Phase 1. No page may introduce a colour, size, radius, shadow, or spacing value that is not defined here. If a page needs something new, it is added here first.

---

## 3. Design Direction

### 3.1 Design Concept — "Engineered Clarity"

**The idea in one line:** *A calm, precise, editorial canvas — with engineered moments of depth.*

Divine Dev Hub builds systems. The website should feel like a well-engineered system: generous white space, strict alignment, disciplined type, and a small number of deliberate, high-impact visual moments — never decoration for its own sake.

**Three pillars:**

| Pillar | Meaning | Visible expression |
|---|---|---|
| **Precision** | Everything on a grid. Nothing arbitrary. | 8px spacing system, optical alignment, consistent baseline rhythm, hairline borders |
| **Depth** | Premium comes from layering, not ornament. | Alternating light/dark section bands, soft layered shadows, subtle gradient meshes, glass on scroll |
| **Evidence** | Proof is the design's main content. | Numbers set large, logos given room, testimonials as first-class layout objects |

**Emotional target:** *Confident, not loud. Modern, not trendy. Technical, not cold.*

**Design signature (the thing people remember):**
A **hairline "blueprint" motif** — a faint 1px grid/corner-bracket system that appears at low opacity behind hero and stat sections, and as corner accents on featured cards. It reads as engineering drafting, ties directly to "we build things properly", and costs nothing in performance (pure CSS gradients).

### 3.2 Light/Dark Section Rhythm

The site is **not** a dark site and **not** a white site. It alternates in a deliberate rhythm to create pacing and make key sections feel like moments.

```
Hero            ▓▓▓ DARK (ink-950, blueprint grid, brand glow)
Client logos    ░░░ LIGHT (ink-50)
Introduction    ░░░ LIGHT (white)
Services        ░░░ LIGHT (ink-50)
Industries      ▓▓▓ DARK (ink-900)
Why Choose Us   ░░░ LIGHT (white)
Process         ░░░ LIGHT (ink-50)
Case Studies    ▓▓▓ DARK (ink-950)
Stats band      ▒▒▒ BRAND (violet gradient)
Testimonials    ░░░ LIGHT (white)
Technologies    ░░░ LIGHT (ink-50)
FAQ             ░░░ LIGHT (white)
Blog            ░░░ LIGHT (ink-50)
Final CTA       ▓▓▓ DARK (ink-950 + mesh)
Footer          ▓▓▓ DARK (ink-950, deeper)
```

**Rule:** never more than **3 consecutive light sections** and never more than **2 consecutive dark sections**.

---

### 3.3 Colour System

The existing brand violet (`#684DF4`) is retained and refined — this preserves brand recognition while raising quality. It is paired with an electric cyan for gradient/accent work and a violet-tinted neutral ("Ink") scale.

#### 3.3.1 Brand — Violet (primary)

| Token | Hex | Use |
|---|---|---|
| `--brand-50` | `#F2EFFE` | Tinted section backgrounds, badge fills |
| `--brand-100` | `#E4DDFD` | Hover fills on light, chip backgrounds |
| `--brand-200` | `#C8BBFB` | Borders on tinted cards, disabled brand |
| `--brand-300` | `#AB97F9` | Decorative, gradient stops |
| `--brand-400` | `#8D71F7` | **Links & icons on dark backgrounds** |
| `--brand-500` | `#6D4DF6` | Brand base — logo, gradient start, glows |
| `--brand-600` | `#5B3DF5` | **Primary button fill, active states** |
| `--brand-700` | `#4A2FD1` | Button hover, links on light backgrounds |
| `--brand-800` | `#3A24A3` | Button pressed |
| `--brand-900` | `#2B1B78` | Dark brand surfaces |
| `--brand-950` | `#1A1049` | Deep brand background wash |

#### 3.3.2 Accent — Cyan (secondary / energy)

| Token | Hex | Use |
|---|---|---|
| `--accent-300` | `#67E8F9` | Gradient end on dark, highlight underlines |
| `--accent-400` | `#22D3EE` | Data viz, active step markers, "new" badges |
| `--accent-500` | `#06B6D4` | Accent on light backgrounds (AA on white at 14px+ bold; verify per use) |
| `--accent-600` | `#0891B2` | Accent text on light, hover |

> **Accent budget:** cyan may appear at most **twice per viewport**. It is a spice, not a base.

#### 3.3.3 Neutral — Ink (violet-tinted greys)

| Token | Hex | Use |
|---|---|---|
| `--ink-0` | `#FFFFFF` | Base light surface, cards on tinted bg |
| `--ink-25` | `#FBFBFD` | Subtle alt surface |
| `--ink-50` | `#F6F6FA` | **Alternating light section background** |
| `--ink-100` | `#EDEDF4` | Dividers on light, input fills |
| `--ink-200` | `#DEDEE9` | **Default border on light** |
| `--ink-300` | `#C2C2D4` | Disabled text/borders |
| `--ink-400` | `#9494AE` | Placeholder, tertiary text |
| `--ink-500` | `#6C6C87` | **Secondary body text on light** |
| `--ink-600` | `#4E4E67` | Body text emphasis |
| `--ink-700` | `#38384D` | Sub-headings |
| `--ink-800` | `#232336` | **Primary heading colour on light** |
| `--ink-900` | `#141426` | **Dark section background** |
| `--ink-950` | `#0A0A18` | **Deepest dark — hero, footer, final CTA** |

**Dark-surface text:**
`--on-dark-primary: #FFFFFF` · `--on-dark-secondary: #B9B9CE` · `--on-dark-tertiary: #83839C` · `--on-dark-border: rgba(255,255,255,0.10)` · `--on-dark-surface: rgba(255,255,255,0.04)`

#### 3.3.4 Semantic

| Token | Hex | Use |
|---|---|---|
| `--success-500` | `#10B981` | Form success, "available", uptime |
| `--success-50` | `#ECFDF5` | Success alert bg |
| `--warning-500` | `#F59E0B` | Ratings stars, caution |
| `--warning-50` | `#FFFBEB` | Warning alert bg |
| `--error-500` | `#EF4444` | Form errors, required |
| `--error-50` | `#FEF2F2` | Error alert bg |
| `--info-500` | `#3B82F6` | Informational notes |

#### 3.3.5 Gradients (the only 5 allowed)

```css
--grad-brand:      linear-gradient(135deg, #6D4DF6 0%, #8D71F7 55%, #22D3EE 130%);
--grad-brand-soft: linear-gradient(135deg, #5B3DF5 0%, #4A2FD1 100%);
--grad-dark-mesh:  radial-gradient(60% 80% at 15% 0%,  rgba(109,77,246,.28) 0%, transparent 60%),
                   radial-gradient(50% 70% at 90% 20%, rgba(34,211,238,.16) 0%, transparent 60%),
                   linear-gradient(180deg, #0A0A18 0%, #141426 100%);
--grad-text:       linear-gradient(96deg, #FFFFFF 0%, #C8BBFB 50%, #67E8F9 100%);  /* headline word only */
--grad-border:     linear-gradient(135deg, rgba(109,77,246,.6), rgba(34,211,238,.25));
```

#### 3.3.6 Colour Usage Ratio (enforced)

**60 / 30 / 10:** 60% neutral surfaces · 30% ink text and structure · 10% brand + accent.
Any viewport where brand colour exceeds ~10% of pixel area is over-branded and must be corrected.

#### 3.3.7 Contrast Requirements (WCAG 2.2 AA — hard gate)

| Pair | Ratio | Status |
|---|---|---|
| `ink-800` on `ink-0` | 14.6:1 | ✅ AAA |
| `ink-500` on `ink-0` | 5.9:1 | ✅ AA |
| `ink-500` on `ink-50` | 5.6:1 | ✅ AA |
| `#FFFFFF` on `ink-950` | 19.4:1 | ✅ AAA |
| `on-dark-secondary` on `ink-950` | 9.7:1 | ✅ AAA |
| `#FFFFFF` on `brand-600` | 6.4:1 | ✅ AA (buttons) |
| `brand-700` on `ink-0` | 7.6:1 | ✅ AAA (links) |
| `brand-400` on `ink-950` | 6.1:1 | ✅ AA (links on dark) |

**Prohibited:** `accent-400` as body text on white (fails); `ink-400` as body text (fails); brand-500 text on brand-50 below 18px.
Never use colour alone to convey meaning. Focus rings must reach 3:1 against adjacent colours.

---

### 3.4 Typography

#### 3.4.1 Font Stack

| Role | Family | Weights | Source |
|---|---|---|---|
| **Display / Headings** | **Plus Jakarta Sans** | 600, 700, 800 | Google Fonts — **self-hosted, WOFF2, subset latin** |
| **Body / UI** | **Inter** | 400, 500, 600 | Google Fonts — self-hosted, WOFF2, `font-feature-settings: 'cv11','ss01'` |
| **Mono / Code / Data** | **JetBrains Mono** | 400, 500 | Self-hosted; used for code blocks, tech labels, stat suffixes |

**Alternative premium option (if the client wants more distinction):** headings in **Satoshi** (Fontshare, free for commercial use). Same weights, same scale. Decide before Header build; do not mix.

**Loading rules (non-negotiable):**
- Self-host — **no Google Fonts CDN request** (removes a render-blocking third-party round trip and a GDPR exposure).
- `font-display: swap` + `<link rel="preload" as="font" type="font/woff2" crossorigin>` for the two fonts used above the fold only (Jakarta 800, Inter 400).
- Latin subset only. Variable fonts preferred where the file is smaller than the static set.
- Total font payload budget: **≤ 120 KB**.
- Define `size-adjust` / fallback metrics (`@font-face` fallback with `ascent-override`) so the swap causes **zero CLS**.

Replaces the current 3 families / ~45 variants.

#### 3.4.2 Type Scale (fluid, `clamp()`)

Ratio: 1.250 (major third) at desktop, compressing to 1.200 at mobile.

| Token | Mobile → Desktop | `clamp()` | Line height | Tracking | Weight |
|---|---|---|---|---|---|
| `--fs-display-1` | 40 → 76 px | `clamp(2.5rem, 1.4rem + 4.8vw, 4.75rem)` | 1.02 | -0.03em | 800 |
| `--fs-display-2` | 34 → 60 px | `clamp(2.125rem, 1.35rem + 3.4vw, 3.75rem)` | 1.06 | -0.028em | 800 |
| `--fs-h1` | 30 → 48 px | `clamp(1.875rem, 1.35rem + 2.3vw, 3rem)` | 1.12 | -0.024em | 700 |
| `--fs-h2` | 26 → 38 px | `clamp(1.625rem, 1.28rem + 1.5vw, 2.375rem)` | 1.18 | -0.02em | 700 |
| `--fs-h3` | 22 → 28 px | `clamp(1.375rem, 1.2rem + 0.75vw, 1.75rem)` | 1.28 | -0.015em | 700 |
| `--fs-h4` | 19 → 22 px | `clamp(1.1875rem, 1.12rem + 0.3vw, 1.375rem)` | 1.36 | -0.01em | 600 |
| `--fs-h5` | 17 → 18 px | `clamp(1.0625rem, 1.04rem + 0.1vw, 1.125rem)` | 1.44 | -0.005em | 600 |
| `--fs-body-lg` | 17 → 19 px | `clamp(1.0625rem, 1.02rem + 0.2vw, 1.1875rem)` | 1.65 | 0 | 400 |
| `--fs-body` | 16 → 16.5 px | `clamp(1rem, 0.99rem + 0.05vw, 1.03rem)` | 1.70 | 0 | 400 |
| `--fs-body-sm` | 14.5 → 15 px | `0.9375rem` | 1.62 | 0 | 400 |
| `--fs-caption` | 13 → 13.5 px | `0.84375rem` | 1.5 | 0 | 400 |
| `--fs-overline` | 12 → 12.5 px | `0.78125rem` | 1.3 | **+0.12em** | 600, UPPERCASE |
| `--fs-stat` | 44 → 68 px | `clamp(2.75rem, 1.9rem + 3.6vw, 4.25rem)` | 1.0 | -0.035em | 800 |

#### 3.4.3 Hierarchy Rules

1. **One `<h1>` per page.** Ever. (Fixes current defect E1.)
2. Standard section heading stack, top to bottom:
   ```
   OVERLINE   (fs-overline, brand-600 on light / accent-400 on dark)
   Section Heading   (fs-h2, ink-800 / white)
   Supporting sentence   (fs-body-lg, ink-500 / on-dark-secondary, max-width 62ch)
   ```
3. **Measure:** body copy `max-width: 68ch`; lead paragraphs `62ch`; never exceed 75ch.
4. **Heading colour discipline:** headings are `ink-800` or `#FFFFFF`. Brand-coloured headings are permitted only for a **single emphasised word or phrase** using `--grad-text` or `brand-600`, and at most once per section.
5. Never skip heading levels (h2 → h4 is a violation).
6. Body text is **never** below 15px. UI labels never below 13px.
7. `text-wrap: balance` on all headings; `text-wrap: pretty` on paragraphs.
8. Numerals in stats and tables use `font-variant-numeric: tabular-nums`.
9. No italics for emphasis in UI — use weight 600.
10. No all-caps runs longer than 4 words except the overline token.

---

### 3.5 Spacing System (8px grid)

Base unit **8px**, with 4px half-steps for tight optical work.

| Token | px | rem | Typical use |
|---|---|---|---|
| `--space-0` | 0 | 0 | reset |
| `--space-1` | 4 | 0.25 | icon↔label gap |
| `--space-2` | 8 | 0.5 | chip padding, tight stacks |
| `--space-3` | 12 | 0.75 | button icon gap, input inner |
| `--space-4` | 16 | 1 | default element gap |
| `--space-5` | 20 | 1.25 | card inner (mobile) |
| `--space-6` | 24 | 1.5 | **card padding, grid gutter** |
| `--space-8` | 32 | 2 | card padding (large), sub-group gap |
| `--space-10` | 40 | 2.5 | heading↔content |
| `--space-12` | 48 | 3 | intra-section block gap |
| `--space-16` | 64 | 4 | **section padding (mobile)** |
| `--space-20` | 80 | 5 | section padding (tablet) |
| `--space-24` | 96 | 6 | large block separation |
| `--space-30` | 120 | 7.5 | **section padding (desktop)** |
| `--space-40` | 160 | 10 | hero padding, hero→next breathing room |

**Rules**
- Every margin/padding value must come from this scale. No `padding: 37px`.
- Vertical rhythm inside a section: `heading block → 40px → content → 48px → CTA`.
- Related elements are always closer than unrelated ones (proximity law) — gaps within a card group ≤ half the gap between groups.

**Section vertical padding (canonical):**

```css
.section        { padding-block: clamp(4rem, 2rem + 7vw, 7.5rem); }   /* 64 → 120 */
.section--tight { padding-block: clamp(3rem, 1.75rem + 4vw, 5rem); }  /* 48 → 80  */
.section--hero  { padding-block: clamp(6rem, 3rem + 10vw, 10rem); }   /* 96 → 160 */
.section--flush { padding-block: 0; }                                  /* full-bleed media */
```

**White-space strategy**
- White space is a premium signal — budget **≥ 35% of every viewport** as empty.
- Never fill a gap because it "looks empty". Reduce content instead of reducing space.
- Hero has the most breathing room on the site; density increases gradually down the page and relaxes again at the final CTA.
- Dark sections carry ~10% more internal padding than light ones (dark surfaces read visually heavier).

---

### 3.6 Grid & Layout

#### 3.6.1 Breakpoints

| Name | Min width | Target |
|---|---|---|
| `xs` | 360 | Small phones (baseline design width: **375px**) |
| `sm` | 480 | Large phones |
| `md` | 768 | Tablet portrait |
| `lg` | 1024 | Tablet landscape / small laptop |
| `xl` | 1280 | **Primary desktop design width: 1440px** |
| `2xl` | 1536 | Large desktop |
| `3xl` | 1920 | Max — content stops growing |

**Design at 375px first, then 1440px.** Every component gets both defined before it is built.

#### 3.6.2 Containers

| Token | Max width | Use |
|---|---|---|
| `--container-xs` | 720px | Blog article body, legal pages |
| `--container-sm` | 900px | Centred narrative blocks, FAQ |
| `--container` | **1280px** | **Default page container** |
| `--container-lg` | 1440px | Wide showcase grids, mega menu |
| `--container-full` | 100% | Full-bleed backgrounds, logo marquee |

**Container gutters:** 20px (< 480) · 24px (480–767) · 40px (768–1023) · 64px (≥ 1024).

#### 3.6.3 Grid

- **12-column** CSS Grid, gutter `--space-6` (24px) mobile/tablet, `--space-8` (32px) desktop.
- Common column spans: 12 · 6+6 · 4+4+4 · 3+3+3+3 · 8+4 (content + sidebar) · 5+7 (media + text) · 7+5.
- **Bento blocks** use `grid-template-columns: repeat(12,1fr)` with explicit `grid-column`/`grid-row` spans; each bento tile must remain ≥ 280px wide before it collapses.
- Card grids: 3-up desktop → 2-up tablet → 1-up mobile (4-up only for logos, small tech tiles, and stat tiles).
- Asymmetry is allowed but must be intentional and repeatable (e.g. 7/5 split reused across all media+text sections).

#### 3.6.4 Z-Index Scale

```
0    base
10   raised cards / hover lift
20   sticky in-page sub-nav
30   sticky header
40   dropdowns / mega menu
50   mobile drawer
60   sticky mobile action bar
70   modal backdrop
80   modal
90   toast / notification
100  cookie banner
```

---

### 3.7 Border Radius

| Token | Value | Applied to |
|---|---|---|
| `--radius-xs` | 6px | Badges, chips, tags, small inputs |
| `--radius-sm` | 10px | **Buttons**, inputs, selects |
| `--radius-md` | 14px | Small cards, icon tiles, avatars(sq) |
| `--radius-lg` | 20px | **Standard content cards** |
| `--radius-xl` | 28px | Feature cards, bento tiles, media frames |
| `--radius-2xl` | 40px | Hero image frames, large CTA panels |
| `--radius-full` | 9999px | Pills, avatars, icon buttons, logo marquee items |

**Nesting rule:** inner radius = outer radius − padding. A 20px card with 24px padding has inner elements at ≤ 8px, never larger than the parent.
**Consistency rule:** one radius family per component type across the entire site. A "service card" is `--radius-lg` on every page it appears.

---

### 3.8 Elevation & Shadows

Shadows are **violet-tinted and layered** (two-part: contact shadow + ambient shadow). Never pure black.

```css
--shadow-xs:    0 1px 2px rgba(20,20,38,.06);
--shadow-sm:    0 1px 2px rgba(20,20,38,.05), 0 2px 6px -1px rgba(20,20,38,.07);
--shadow-md:    0 2px 4px rgba(20,20,38,.04), 0 8px 20px -6px rgba(20,20,38,.10);
--shadow-lg:    0 4px 8px rgba(20,20,38,.04), 0 18px 38px -10px rgba(20,20,38,.13);
--shadow-xl:    0 8px 16px rgba(20,20,38,.05), 0 36px 70px -20px rgba(20,20,38,.18);
--shadow-brand: 0 8px 20px -6px rgba(91,61,245,.34), 0 2px 6px rgba(91,61,245,.18);
--shadow-inset: inset 0 1px 0 rgba(255,255,255,.7);          /* light card top highlight */
--glow-dark:    0 0 0 1px rgba(255,255,255,.06), 0 20px 60px -20px rgba(109,77,246,.45);
```

**On dark surfaces, shadows do not read.** Use instead:
- 1px border `rgba(255,255,255,.10)`
- Surface fill `rgba(255,255,255,.04)`
- Optional `--glow-dark` on hover only

**Elevation ladder:** flat (0) → resting card (`sm`) → hover card (`lg`, plus `translateY(-4px)`) → dropdown/menu (`xl`) → modal (`xl` + backdrop blur).
**Rule:** no more than **two** elevation levels visible in a single section.

---

### 3.9 Component Styles

#### 3.9.1 Cards

| Variant | Background | Border | Radius | Padding | Shadow | Hover |
|---|---|---|---|---|---|---|
| **Standard (light)** | `ink-0` | `1px ink-200` | `lg` (20) | 32 (24 mobile) | `sm` | `lg` + `-4px` Y + border→`brand-200` |
| **Standard (dark)** | `rgba(255,255,255,.04)` | `1px rgba(255,255,255,.10)` | `lg` | 32 | none | fill→`.07` + border→`rgba(109,77,246,.5)` + `glow-dark` |
| **Feature / Bento** | `ink-0` or `grad-brand` | gradient border (`--grad-border` via mask) | `xl` (28) | 40 | `md` | `xl` + `-6px` Y |
| **Icon card** | `ink-50` | none | `lg` | 28 | none | bg→`ink-0` + `md` |
| **Case study** | media-led, overlay | none | `xl` | 0 (media) / 32 (text) | `md` | image `scale(1.04)` + overlay darken |
| **Testimonial** | `ink-0` | `1px ink-200` | `lg` | 32 | `sm` | subtle only |
| **Stat tile** | transparent / glass on brand band | `1px` on-dark-border | `md` | 24 | none | none (static) |
| **Logo tile** | `ink-0` | `1px ink-100` | `md` | 20 | none | grayscale→colour |
| **Blog card** | `ink-0` | `1px ink-200` | `lg` | 0 / 24 | `sm` | image zoom + title→`brand-700` |
| **Interactive/link card** | any | any | any | any | any | **entire card is the click target** (stretched-link pattern) |

**Universal card rules**
- Every clickable card uses the *stretched link* pattern: one real `<a>` inside, pseudo-element covering the card. Never wrap block content in `<a>` with nested interactive elements.
- All cards in a row are equal height (`align-items: stretch`, internal `flex-column` with `margin-top:auto` on the footer/CTA).
- Card hover transition: `250ms cubic-bezier(.22,1,.36,1)` on `transform`, `box-shadow`, `border-color` **only**.
- Icon tile inside a card: 48×48 (56 on feature cards), `radius-md`, `brand-50` fill with `brand-600` icon on light; `rgba(109,77,246,.14)` fill with `brand-400` icon on dark.
- Max 3 information levels per card: icon/media → title → description (+ optional meta row + link).

#### 3.9.2 Buttons

**Sizes**

| Size | Height | Padding X | Font | Icon | Radius |
|---|---|---|---|---|---|
| `sm` | 36px | 16 | 14 / 600 | 16 | `sm` |
| `md` (default) | 44px | 20 | 15 / 600 | 18 | `sm` |
| `lg` | 52px | 28 | 16 / 600 | 20 | `sm` |
| `xl` (hero) | 60px | 34 | 17 / 600 | 20 | `sm` |
| `icon` | = height | square | — | 20 | `full` |

> Minimum touch target **44×44** everywhere (WCAG 2.2 AA "Target Size (Minimum)"). `sm` buttons need an invisible expanded hit area on touch.

**Variants**

| Variant | Rest | Hover | Active | Focus-visible | Disabled |
|---|---|---|---|---|---|
| **Primary** | `brand-600` bg, white text, `shadow-brand` | `brand-700`, `translateY(-2px)`, stronger shadow | `brand-800`, `translateY(0)` | 3px `brand-300` ring + 2px offset | `ink-200` bg, `ink-400` text |
| **Secondary** | `ink-0` bg, `ink-800` text, `1px ink-200` | border→`ink-800`, bg→`ink-25` | bg→`ink-100` | as above | opacity .5 |
| **Ghost** | transparent, `ink-700` text | bg→`ink-100` | bg→`ink-200` | as above | opacity .5 |
| **Link/Text** | `brand-700` text, animated underline | underline sweeps L→R, arrow slides +4px | — | ring on text box | — |
| **Primary on dark** | white bg, `ink-900` text | `ink-100` bg, `-2px` Y | — | 3px `accent-400` ring | — |
| **Secondary on dark** | transparent, white text, `1px rgba(255,255,255,.25)` | bg `rgba(255,255,255,.10)`, border white | — | as above | — |
| **Gradient (special)** | `--grad-brand`, white text | brightness 1.08 + shadow | — | as above | — |

**Rules**
- **One primary button per viewport region.** Two primaries side by side is a violation.
- Standard hero pairing: `Primary` + `Secondary-on-dark`.
- Label rules: verb-first, 2–4 words, sentence case. Approved set: *Book a Free Consultation · Get a Free Quote · Talk to an Expert · Start Your Project · View Case Study · Explore Services · Hire Developers · Download the Guide*. Banned: "Submit", "Click Here", "Learn More" (unqualified), "Read More".
- Trailing arrow icon `→` on all forward-navigation buttons; it translates +4px on hover.
- Loading state: label swaps to a 3-dot pulse; width is locked to prevent layout shift.
- **Gradient variant is reserved for the single highest-value CTA on a page** (typically the final CTA section). Never in the header.

#### 3.9.3 Forms

**Field anatomy**

| Property | Value |
|---|---|
| Height | 52px (textarea min 140px) |
| Padding | 14px 16px |
| Radius | `--radius-sm` (10px) |
| Border | `1px ink-200` |
| Background | `ink-0` on light sections; `rgba(255,255,255,.05)` + `1px rgba(255,255,255,.14)` on dark |
| Font | 16px / 400 (**16px minimum — prevents iOS zoom-on-focus**) |
| Label | Above field, 14px / 600, `ink-700`, 8px gap — **always visible, never placeholder-only** |
| Placeholder | `ink-400`, used for format examples only ("e.g. +91 98765 43210") |
| Helper text | 13px, `ink-500`, below field, 6px gap |
| Required | Red asterisk + `aria-required="true"`; alternatively mark *optional* fields instead |
| Focus | Border→`brand-600`, 3px `rgba(109,77,246,.18)` ring, no outline removal without replacement |
| Error | Border→`error-500`, 13px `error-500` message below, icon, `aria-invalid` + `aria-describedby` |
| Success | Border→`success-500` + check icon |
| Disabled | `ink-100` bg, `ink-400` text, `not-allowed` |

**Form design rules**
1. **Progressive profiling.** First-touch forms ask **Name · Work Email · Message** only. Phone becomes **optional**. (Fixes current defect D7.)
2. Long forms use **multi-step** with a progress indicator (max 3 steps, 3–4 fields each).
3. Validate on **blur**, not on keystroke; re-validate on input after the first error.
4. Errors summarised at the top of the form with anchor links when submitted with multiple failures; focus moves to the first invalid field.
5. Submit button is full-width on mobile, auto-width on desktop.
6. **Privacy micro-copy under every submit button:** "We reply within 4 business hours. Your details stay private — protected by NDA. No spam, ever." + a 🔒 icon.
7. Honeypot + time-trap + Cloudflare Turnstile for spam. **No visible CAPTCHA** (measurable conversion loss + accessibility harm).
8. Success = navigate to `/thank-you/` (enables conversion tracking) **and** show an inline confirmation for AJAX submissions.
9. File upload (RFP/brief) on the main contact form: drag-drop zone, PDF/DOC/ZIP, 10 MB max, with clear state feedback.
10. Autocomplete attributes on every field (`name`, `email`, `tel`, `organization`).

#### 3.9.4 Iconography

- **Library:** [Lucide](https://lucide.dev) — 1.75px stroke, 24×24 grid, MIT licence, tree-shakeable, huge coverage.
- **Delivery:** inline SVG sprite (`<symbol>` + `<use>`) — one HTTP request, `currentColor` inheritance, fully styleable, zero icon-font FOIT.
- **Sizes:** 16 (inline text) · 20 (buttons, list bullets) · 24 (default UI) · 32 (card icons) · 48 (feature icons inside tiles).
- **Never mix icon families.** Brand/technology logos are the only exception and live in a separate sprite with original colours.
- Decorative icons: `aria-hidden="true"`. Meaningful icons: `role="img"` + `<title>`.
- Icon tiles: rounded square (`radius-md`) container with a tinted brand fill — this is the site's icon signature and must be identical everywhere.
- Duotone effect achieved with two `currentColor` paths at 100% / 35% opacity — no second icon set.

#### 3.9.5 Illustration & Graphic Style

**Recommended direction: "Blueprint Isometric"**
- Thin-line isometric/technical diagrams (systems, architecture, data flow) in brand violet + cyan on transparent.
- 1.5–2px stroke, minimal fills, 10–20% tint blocks for depth.
- Consistent 30° isometric angle, consistent light source.
- Purpose: illustrate **process, architecture, and integration** — the things stock photography cannot show.

**Where illustration is used:** Process section · Engagement models · Technology architecture · Empty states · 404 · Solution pages · Blog category headers.

**Where illustration is *not* used:** anywhere a real screenshot, real photo, or a real number would be more persuasive.

**Prohibited:** generic flat-vector "corporate Memphis" people, clip-art, mismatched sources, decorative blobs with no meaning, AI images with visible artefacts.

**Abstract graphic system (the design signature):**
- Blueprint grid overlay: `background-image: linear-gradient(...)` 1px lines at 48px intervals, 3–5% opacity, over dark sections.
- Corner brackets (⌐ ¬ ∟ ⌐) on featured cards at 1px, `brand-400` at 40%.
- Node/connection lines linking process steps.
- Soft radial glow behind hero and CTA (CSS only — no images).

#### 3.9.6 Photography & Image Style

| Type | Direction |
|---|---|
| **Team photos** | Real, consistent: same lens, same neutral background (`ink-50` or a dark charcoal), same crop (waist-up), same colour grade. Uniform treatment matters more than photographic quality |
| **Office / culture** | Candid, natural light, wide, slightly desaturated with a cool cast. Used on Careers, About, Life at |
| **Product / project shots** | Real UI in realistic device frames or clean floating browser chrome. **Real screenshots only — never lorem-ipsum mockups** |
| **Case study heroes** | Composite: device mockup + key metric overlaid + client logo |
| **Abstract / texture** | Dark gradient meshes, subtle noise (2–3% grain overlay), fine grid lines |
| **Stock photography** | **Avoid.** If unavoidable: no handshakes, no pointing at monitors, no fake diverse boardrooms. Prefer abstract technology macro shots |

**Universal image treatment**
- Colour grade: slightly cool, +4 contrast, −6 saturation, so imagery sits with the violet palette.
- Optional duotone (`ink-950` → `brand-500`) for decorative/background imagery at 60–80% opacity.
- Frames: `--radius-xl` (28px), optional 1px `ink-200` border on light, `rgba(255,255,255,.10)` on dark.
- **Technical requirements:** AVIF with WebP fallback · `srcset` + `sizes` on every image · explicit `width`/`height` (CLS) · `loading="lazy"` + `decoding="async"` everywhere **except** the LCP image · `fetchpriority="high"` on the LCP image only · descriptive alt text · content-relevant filenames (`healthcare-app-case-study-dashboard.avif`).

#### 3.9.7 Badges, Chips & Tags

| Variant | Style |
|---|---|
| **Overline badge** | `brand-50` bg, `brand-700` text, 12px/600 uppercase +0.12em, `radius-full`, 6px 14px |
| **Badge on dark** | `rgba(109,77,246,.16)` bg, `brand-300` text, 1px `rgba(109,77,246,.35)` |
| **Status dot badge** | 6px pulsing `success-500` dot + label ("Available now", "3 slots open") |
| **Tech tag** | `ink-50` bg, `ink-600` text, 13px/500, `radius-xs`, 4px 10px, optional 14px tech logo |
| **Category tag** | `ink-0` bg, `1px ink-200`, `ink-700` text, `radius-full` |
| **Metric badge** | `--grad-brand` bg, white text, used on case-study cards ("+312% conversions") |

#### 3.9.8 Other Primitives

- **Divider:** 1px `ink-200` on light; `rgba(255,255,255,.08)` on dark. Never darker; never double.
- **Tooltip:** `ink-900` bg, white 13px text, `radius-xs`, 8px 12px, 6px arrow, 150 ms fade, keyboard accessible.
- **Accordion:** see Part 5 §8.
- **Tabs:** underline-style, 2px `brand-600` active indicator that slides; `role="tablist"` and arrow-key navigation required.
- **Avatar:** `radius-full`, sizes 32/40/48/64/96, 2px white ring when overlapping in a stack.
- **Rating stars:** `warning-500` filled, `ink-200` empty, 16px, with a text equivalent for screen readers ("4.9 out of 5").
- **Progress bar:** 6px, `radius-full`, `ink-100` track, `--grad-brand` fill.
- **Skeleton loader:** `ink-100` base with a 1.4 s shimmer sweep; used for lazily loaded grids only.

---

### 3.10 Design Consistency Rules (the "constitution")

1. **Token-only.** No literal colour, size, radius, shadow, or duration in any HTML/CSS file. Everything references a CSS custom property.
2. **One component, one definition.** A service card looks identical on the homepage, the services hub, and an industry page. Variants are declared here or they do not exist.
3. **Every section follows the standard anatomy:**
   `[optional overline] → [h2 heading] → [supporting line, ≤62ch] → [content] → [section CTA]`
4. **8px grid, always.**
5. **One `<h1>`, no skipped levels, semantic landmarks** (`header`, `nav`, `main`, `section`, `article`, `aside`, `footer`) on every page.
6. **Max two typefaces + one mono.**
7. **Max two elevation levels visible per section.**
8. **One primary CTA per viewport region.**
9. **Alternating background rhythm** as defined in §3.2.
10. **Motion budget:** transitions only on `transform`, `opacity`, `filter`, `background-color`, `border-color`, `box-shadow`. Never animate `width`, `height`, `top`, `left`, or `margin`.
11. **`prefers-reduced-motion: reduce`** disables all transform/scroll animation and shortens transitions to 0.01 ms — implemented once, globally.
12. **Focus-visible on everything interactive**, using the shared ring token. Never `outline: none` without a replacement.
13. **Mobile-first CSS** — base styles are mobile; `min-width` media queries only.
14. **Every image has explicit dimensions.**
15. **Every page has:** breadcrumb (except Home), one clear conversion goal, a trust element within one scroll of every major CTA, and a related-content block before the footer.
16. **Naming:** BEM-ish, kebab-case, section prefix — `.svc-card`, `.svc-card__title`, `.svc-card--featured`. Utilities are prefixed `u-`.
17. **No `!important`** outside of print styles and reduced-motion overrides.
18. **No inline styles** in delivered HTML (Elementor's habit — deliberately broken).
19. **Copy tone:** direct, specific, numeric. Second person ("you", "your"). No superlatives without evidence. Every claim carries a number, a name, or a source.
20. **British/US spelling:** pick **US English** (primary market) and enforce it site-wide.

---

### 3.11 Component Library & Build Recommendation (Phase 1)

**Recommendation: hand-built, framework-free, WordPress-ready.**

| Layer | Choice | Reason |
|---|---|---|
| **CSS** | Vanilla CSS with custom properties + `@layer` (reset, tokens, base, layout, components, utilities) | Zero build step, zero framework payload, trivially portable into a WordPress theme. Tailwind would force a build pipeline into Phase 2 and fights WordPress block editing |
| **Layout** | CSS Grid + Flexbox, `clamp()`, container queries where supported | No grid framework needed |
| **JS** | Vanilla ES6 modules, ~8–12 KB total, no jQuery, no framework | INP protection; WordPress already ships jQuery — do not depend on it |
| **Animation** | CSS transitions + `IntersectionObserver` reveal + native CSS scroll-driven animations with a JS fallback | GSAP/AOS only if a specific effect genuinely requires it, and then loaded lazily |
| **Icons** | Lucide, compiled to an inline SVG sprite | One request |
| **Carousel** | Native CSS scroll-snap + minimal JS controls (or Embla, 5 KB, if needed) | Swiper is ~140 KB — rejected |
| **Accordion** | Native `<details>`/`<summary>` styled, progressively enhanced | Free accessibility |
| **Modal** | Native `<dialog>` | Free focus trapping |
| **Counters** | `IntersectionObserver` + `requestAnimationFrame` | ~1 KB |
| **Forms** | Native validation + a thin JS layer | Portable to CF7/Gravity Forms/Fluent Forms in Phase 2 |
| **Lazy media** | Native `loading="lazy"` + `content-visibility: auto` on below-fold sections | No library |

**File structure for Phase 1:**
```
/assets
  /css
    00-reset.css        01-tokens.css      02-base.css
    03-layout.css       04-components.css  05-sections.css
    06-utilities.css    main.css           (imports, or concatenated for prod)
  /js
    main.js  nav.js  reveal.js  counter.js  accordion.js  carousel.js  forms.js
  /icons  sprite.svg
  /img    (avif + webp, organised by page)
  /fonts  (woff2, subset)
/index.html  /about.html  /services.html  ...
/docs        (this strategy)
```

**Handoff artefact required before HTML begins:** a `/styleguide.html` page rendering every token and every component in every state — this becomes the visual QA reference and the Phase 2 WordPress block-mapping reference.

---

*Continue to → [Part 3 — Header, Footer & Homepage](03-header-footer-homepage.md)*
