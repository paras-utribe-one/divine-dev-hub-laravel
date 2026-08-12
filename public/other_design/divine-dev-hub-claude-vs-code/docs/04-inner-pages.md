# Part 4 — Inner Page Blueprints
**Divine Dev Hub — Website Redesign Master Strategy**

---

## 7. Remaining Pages Planning

### 7.0 Universal Page Framework

Every inner page follows this skeleton. Deviations are noted per page.

```
[HEADER — global]
[PAGE HERO — variant per page type]
[BREADCRUMB — inside or below hero]
[optional STICKY SUB-NAV — pages > 4 sections]
[MAIN CONTENT — 3 to 9 sections]
[TRUST BLOCK — testimonial / stats / logos, contextual to the page]
[RELATED CONTENT — siblings, 3 items]
[PRE-FOOTER CTA — global, copy varies by page]
[FOOTER — global]
```

**Page hero variants**

| Variant | Height | Used on | Composition |
|---|---|---|---|
| **A — Split** | 60vh | Service, Industry, Solution, Hire | Breadcrumb → overline → H1 → lead → CTA pair → inline trust chips \| right: illustration or product visual |
| **B — Centred** | 44vh | About, Process, Careers, Testimonials, Awards | Centred breadcrumb, H1, lead, single CTA |
| **C — Media-led** | 70vh | Case Study Detail, Portfolio Detail | Full-bleed image with dark scrim, overlaid metadata + H1 + metric badges |
| **D — Compact** | 30vh | Blog listing, FAQ, Glossary, Legal, 404 | Breadcrumb + H1 + one line, minimal |
| **E — Functional** | 40vh | Contact, Cost Calculator | H1 + lead, with the form/tool starting immediately below the fold line |

All hero variants use `ink-950` + `grad-dark-mesh` + blueprint grid, except D and legal pages which use `ink-50` with dark text (lighter pages feel faster and are appropriate for utility content).

**Universal rules**
- One `<h1>`; breadcrumbs with `BreadcrumbList` schema on every page.
- Every page states its conversion goal in this document; the page's CTAs all serve that goal.
- A trust element appears within one scroll of every major CTA.
- Related-content block before the pre-footer CTA on every page — no dead ends.
- Mobile: hero heights reduce by ~25%; all two-column layouts become single column; all CTAs go full width.

---

### 7.1 About Us — `/about-us/`

**Goal:** convert scepticism into confidence. Secondary: recruit.

| # | Section | Detail |
|---|---|---|
| 1 | Hero (B) | H1 "We're 50 engineers in Ahmedabad building software for the world." Lead: founding year, scale, reach |
| 2 | Story | 7/5 split — narrative from 2014 to today (4 short paragraphs) + a vertical milestone timeline (2014 founded · 2017 first enterprise client · 2019 100th project · 2021 Odoo partner · 2023 AI practice · 2026 50 engineers) |
| 3 | Stats band | Reuse the homepage brand band component (540+/510+/50/12/20+/97%) |
| 4 | Mission · Vision · Values | 3-up cards; values must be **operational**, not aspirational — e.g. "We tell you the bad news first", "We estimate in ranges, not fantasies", "We write documentation you'll actually read" |
| 5 | Leadership | 4-up cards: photo, name, title, 2-line bio, LinkedIn. Fixes audit defect B9 |
| 6 | The wider team | Photo grid of all 50 (or a culture photo strip) + "Meet the team →" |
| 7 | How we work | 3-up summary of the process with a link to `/process/` |
| 8 | Certifications & awards | Reuse the homepage badge component |
| 9 | Offices & reach | Ahmedabad office photo + address + map + a world map showing the 20+ countries served |
| 10 | Careers teaser | Dark band: "We're hiring — 6 open roles" + CTA to `/careers/` |
| 11 | Testimonials | 3-up, reuse component |
| 12 | Pre-footer CTA | Copy: "Want to meet the team before you commit? Book a call." |

**CTA strategy:** low-pressure throughout; the primary CTA appears in the hero and the pre-footer only. **SEO:** targets brand + "about + software development company Ahmedabad"; `Organization` + `Person` schema for leadership; the milestone timeline is strong E-E-A-T content. **User flow:** About → Team → Case Studies → Contact. **Conversion:** naming and photographing leadership measurably lifts enquiry rates for offshore vendors.

---

### 7.2 Services Hub — `/services/`

**Goal:** route to the correct service detail page.

| # | Section | Detail |
|---|---|---|
| 1 | Hero (A) | H1 "Software development services, end to end." Lead + 2 CTAs + trust chips |
| 2 | Category filter bar | Sticky pill filter: All · Build · Platforms · Design & QA · Operate. Client-side filtering, no page reload; updates the URL hash |
| 3 | Service grid | All 14 services as equal cards (not bento — this page is a directory, hierarchy would be misleading). Card: icon, title, 2-line description, 4 sub-service links, tech tags, "Explore →" |
| 4 | Not sure what you need? | Dark band with 3 routes: "I have a spec" → Fixed Scope · "I have an idea" → Discovery Workshop · "I need people" → Hire Developers |
| 5 | Process summary | 6-step compact timeline + link |
| 6 | Engagement models | Reuse homepage component |
| 7 | Industries strip | Horizontal chips linking to industry pages |
| 8 | Why choose us | Reuse bento component |
| 9 | Case studies | 3-up |
| 10 | FAQ | 6 service-selection questions |
| 11 | Pre-footer CTA | — |

**SEO:** targets "software development services"; the hub must link to all 14 spokes and receive links back from each. **Conversion:** the "Not sure what you need?" router is the key UX addition — it captures the 40% of visitors who cannot self-diagnose.

---

### 7.3 Service Detail — `/services/<slug>/` (template ×14)

The most commercially important template on the site. Built once, reused fourteen times.

| # | Section | Detail |
|---|---|---|
| 1 | Hero (A) | Breadcrumb · overline (category) · H1 "{Service} Services" · outcome-led lead · `[Book a Free Consultation]` `[See Our Work]` · chips: *"540+ delivered · 4.9 Clutch · NDA protected"* · right: relevant product visual |
| 2 | Sticky sub-nav | Anchor pills: Overview · What We Build · Process · Tech · Work · Engagement · FAQ. Sticks under the header at 64px, active item highlighted via `IntersectionObserver` |
| 3 | Overview | 7/5 — 3 paragraphs answering *what is this, who is it for, what do you get* + a "Best for" box listing 4 buyer types |
| 4 | What we build | 6-up grid of concrete deliverables (e.g. for Custom Software: ERP · CRM · Marketplace · Internal tools · Portals · Integrations). Each is a link if a sub-page exists |
| 5 | Capabilities / features | 2-col checklist, 8–12 items, grouped |
| 6 | Why us for this service | 4-up: the service-specific version of Why Choose Us |
| 7 | Process | Reuse the 6-step timeline, with **service-specific durations** |
| 8 | Technology stack | Filtered tech tiles relevant to this service only |
| 9 | Case studies | 2–3 cards **filtered to this service** — this is what makes the page credible |
| 10 | Testimonials | 1 featured, service-relevant |
| 11 | Engagement & pricing | Models + a "From $X" anchor + link to the calculator |
| 12 | Industries we serve with this | Chip row |
| 13 | Related services | 3 sibling cards ("Also consider…") |
| 14 | FAQ | 8 service-specific questions with `FAQPage` schema |
| 15 | Pre-footer CTA | Service-specific copy |

**Content depth target:** 1,400–2,000 words per service page (competitive with Space-O and Hidden Brains).
**SEO:** primary keyword in `<title>`, `<h1>`, first 100 words, and one `<h2>`; targets "{service} company", "{service} services", "hire {service} company India"; internal links to technologies, industries, case studies, and the hub. **Responsive:** sub-nav becomes a horizontally scrollable chip row; all grids collapse to 1-up. **Conversion:** CTA appears at hero, after section 6, after section 9, and in the pre-footer — four opportunities, escalating in specificity.

---

### 7.4 Hire Developers Hub — `/hire-developers/`

**Goal:** capture staff-augmentation intent — the highest-volume commercial category for Indian IT services and completely absent today.

| # | Section | Detail |
|---|---|---|
| 1 | Hero (A) | H1 "Hire vetted developers in 48 hours." Chips: *"50 in-house engineers · No subcontracting · Replace within 5 days, no questions"* |
| 2 | How it works | 4 steps: Share requirements → Get 3 matched CVs in 48h → Interview → Onboard in 5 days |
| 3 | Available roles | Grid of 12 roles, each with a rate band and an availability status dot |
| 4 | Why hire from us | 6-up: vetting process, English proficiency, timezone overlap, IP protection, replacement guarantee, no recruitment fee |
| 5 | Engagement models | Dedicated · Extended team · Staff augmentation · Project-based |
| 6 | Pricing bands | Transparent hourly/monthly ranges by role and seniority — a genuine differentiator |
| 7 | Sample profiles | 3 anonymised developer cards (skills, years, projects, availability) |
| 8 | Comparison table | Divine Dev Hub vs. freelancers vs. in-house hiring, across cost / time-to-hire / management / risk |
| 9 | Case studies | Team-augmentation stories |
| 10 | FAQ | 8 questions: vetting, contracts, notice period, replacement, timezone, tools, IP, invoicing |
| 11 | Pre-footer CTA | "Tell us the role. We'll send 3 profiles in 48 hours." |

**Conversion mechanic:** a lightweight "Request Profiles" form (role, seniority, count, duration, email) — a *much* lower-friction conversion than "contact us", and the highest-converting form on the site.

---

### 7.5 Hire Developer Detail — `/hire-developers/<tech>/` (template ×12)

Same skeleton as 7.4, narrowed: hero ("Hire React.js Developers") → skills matrix → what our React devs have built → sample profiles → rates → engagement models → hiring process → 2 relevant case studies → related roles → FAQ → CTA. 1,000–1,400 words. Targets "hire {tech} developers", "{tech} development company India".

---

### 7.6 Technologies Hub — `/technologies/`

| # | Section |
|---|---|
| 1 | Hero (A) — "The stack we build on" |
| 2 | Category tabs + full tile grid (reuse the homepage component at full size) |
| 3 | "How we choose a stack" — 4-point decision framework (a genuinely differentiating content block) |
| 4 | Architecture patterns we use — microservices, event-driven, serverless, monolith-first (with the blueprint isometric illustrations) |
| 5 | Case studies by stack |
| 6 | Hire by technology — chip row into `/hire-developers/` |
| 7 | FAQ · Pre-footer CTA |

### 7.7 Technology Detail — `/technologies/<slug>/` (template ×~28)

Hero (A) with the tech logo → What is {tech} and when to use it → Our {tech} capabilities → What we've built with it → Stack pairings ("we usually pair React with Node + PostgreSQL") → Case studies filtered by tech → Hire {tech} developers CTA block → Related technologies → FAQ → CTA. 900–1,300 words. Targets "{tech} development company", "{tech} development services".

---

### 7.8 Industries Hub — `/industries/`

Hero (A) → industry grid (10 tiles with project counts, reuse the homepage component) → "Why domain experience matters" (3-point argument: compliance, data models, integrations) → compliance strip (HIPAA, PCI-DSS, GDPR, SOC 2) → case studies grouped by vertical → CTA.

### 7.9 Industry Detail — `/industries/<slug>/` (template ×10)

| # | Section |
|---|---|
| 1 | Hero (A) — "Healthcare software development" + vertical-specific trust chips |
| 2 | Industry challenges — 4 pain points stated in the buyer's language |
| 3 | Our solutions for {industry} — 6 solution cards |
| 4 | Compliance & standards — HIPAA / HL7 / FHIR / GDPR (this section alone wins enterprise trust in regulated verticals) |
| 5 | Case studies in {industry} — 2–3, filtered |
| 6 | Technologies used in {industry} |
| 7 | Integrations we've done — named third-party systems (EHRs, payment gateways, ERPs) |
| 8 | Client testimonial from the vertical |
| 9 | Related industries · FAQ · CTA |

1,200–1,600 words. Targets "healthcare software development company", "{industry} app development".

---

### 7.10 Solutions Hub & Detail — `/solutions/`, `/solutions/<slug>/`

Positions Divine Dev Hub against *outcomes* rather than *services*. Detail template: Hero (A) → The problem → Our approach → What's included → Timeline & typical cost → Tech stack → Case study → FAQ → CTA. Six solutions: MVP Development · Legacy Modernisation · Marketplace Platforms · White-Label Software · Process Automation · Data & Analytics.

---

### 7.11 Portfolio — `/portfolio/`

**Fixes audit defects C13, D2, D3, E7.**

| # | Section | Detail |
|---|---|---|
| 1 | Hero (D) | "540+ projects. Here are 60 we can show you." |
| 2 | Filter bar | Sticky. Three filter groups: Industry · Service · Technology. Multi-select chips, active-filter count, "Clear all", result count announced via `aria-live`. Filters reflected in the URL (`?industry=healthcare`) so filtered views are shareable and indexable-if-desired |
| 3 | Project grid | Masonry-ish 3-up. Card: 16:10 screenshot, project name, industry tag, 1-line description, tech tags. Whole card links to the detail page |
| 4 | Load more | Button-triggered (not infinite scroll — infinite scroll breaks the footer and hurts SEO) |
| 5 | Stats + CTA | — |

**Animation:** filter changes use the FLIP technique (`getBoundingClientRect` → transform) so cards animate to their new positions in 300 ms rather than snapping. Falls back to a plain fade with reduced motion.

### 7.12 Portfolio Detail — `/portfolio/<slug>/`

Hero (C, media-led) → project meta bar (client, industry, duration, team size, platforms) → overview → screenshot gallery (lightbox via `<dialog>`) → features built → tech stack → challenges & solutions → results (if measurable) → testimonial → next/previous project → related projects → CTA. Lighter than a case study; used for the ~50 projects that lack full metrics.

### 7.13 Case Studies Hub — `/case-studies/`

Hero (D) → featured case study (full-width, 7/5, with a headline metric) → filter bar (industry, service) → case study card grid (each card leads with the outcome metric) → results-summary band ("across our case studies: avg 3.1× throughput, 42% cost reduction") → CTA.

### 7.14 Case Study Detail — `/case-studies/<slug>/` — **the highest-value template on the site**

| # | Section | Detail |
|---|---|---|
| 1 | Hero (C) | Full-bleed product image, dark scrim. Industry tag · H1 (outcome-led, e.g. "Cutting claim processing time by 68% for a US medical billing provider") · client logo · 3 metric badges |
| 2 | At-a-glance bar | Sticky-adjacent 5-column strip: Client · Industry · Services · Timeline · Team size |
| 3 | Reading progress | 2px gradient bar in the header |
| 4 | The challenge | 8-col narrative + a pull-quote from the client |
| 5 | Our approach | Numbered phases with supporting visuals |
| 6 | The solution | Feature breakdown with real screenshots |
| 7 | Architecture | Blueprint isometric diagram — a strong technical-credibility moment |
| 8 | Technology stack | Tiles with a one-line "why we chose it" per item |
| 9 | The results | Large metric cards (before → after), plus a chart if defensible |
| 10 | Client testimonial | Full-width, with photo and attribution |
| 11 | What we'd do differently | **Optional but powerful** — a short honest reflection. Almost no agency does this; it is disproportionately credible |
| 12 | Team & timeline | Roles involved, sprint count |
| 13 | Related case studies | 3 cards |
| 14 | CTA | "Have a similar challenge? Let's talk." |

**SEO:** `Article` + `Organization` schema; targets long-tail ("medical billing software case study"); 1,500–2,500 words. **Conversion:** this is where evaluators decide. Every case study needs one hard number in the H1.

---

### 7.15 Process — `/process/`

Hero (B) → philosophy (3 principles) → the 6 stages **expanded** (each stage gets its own block: what happens, who's involved, what you receive, how long, what you need to do) → tools & transparency (Jira/Linear, Slack, shared dashboards, demo cadence) → quality standards (code review, test coverage targets, CI/CD, security scanning) → communication model (daily standups, weekly reports, sprint demos, named PM) → what happens when things go wrong (risk register, change requests, escalation path — **rare and highly trust-building**) → engagement models → FAQ → CTA.

### 7.16 Engagement Models & Pricing — `/engagement-models/`

Hero (B) → model comparison table (dedicated vs fixed vs T&M vs staff aug, across 8 dimensions) → detail block per model → "which model fits you?" decision tree (interactive, 3 questions) → pricing bands by role and seniority → what's included / not included → cost calculator CTA → payment terms & contracts → FAQ → CTA.

### 7.17 Project Cost Calculator — `/project-cost-calculator/`

A multi-step tool: project type → features (multi-select) → platforms → timeline urgency → design needs → **estimated range + timeline + team composition**, gated on email at the result step. Progress bar, back navigation, all state in the URL. Estimated cost shown as a range with an explicit disclaimer. **This is the strongest mid-funnel lead magnet on the site** and neither the current site nor Hidden Brains has one.

---

### 7.18 Blog — `/blog/`

Hero (D) → featured post (6/6 split, large image) → category chip filter → post grid 3-up with "Load more" → newsletter inline block after row 2 → sidebar (desktop ≥1280): categories, popular posts, newsletter, CTA card → pagination.

**SEO:** category and author archives; `Blog` schema; canonical discipline on paginated archives; `/blog/` linked from primary nav via Resources (fixes defect E4).

### 7.19 Blog Detail — `/blog/<slug>/`

Hero (D) with category, title, author, date, read time → optional featured image → 8/4 layout: article body + sticky sidebar (table of contents with active-section highlighting, share buttons, author card, related posts, newsletter, CTA card) → article body (72ch measure, 19px/1.75, styled h2/h3, code blocks with JetBrains Mono + copy button, callout boxes, pull quotes, tables) → key takeaways box at the top (AEO surface) → author bio → related posts → comments (optional) → CTA.

**Reading progress bar** in the header. **SEO:** `Article` + `Person` (author) + `BreadcrumbList` schema; one `<h1>`; descriptive alt text; internal links to services and case studies within the body.

---

### 7.20 Careers — `/careers/`

**Fixes audit defect C2.**

Hero (B) with a culture photo → why work here (6 benefits: growth budget, hybrid, health cover, no-blame culture, real projects, mentorship) → life at Divine Dev Hub (photo grid + link) → our values → open roles (filterable by department/location/type; role cards with title, department, experience, location, type) → hiring process (4 steps with durations) → employee testimonials → "No role fits? Send an open application" → CTA.

**Job Detail — `/careers/<slug>/`:** hero with title/department/location/type/experience → about the role → responsibilities → requirements → nice to have → what we offer → hiring process → application form (name, email, phone, LinkedIn, CV upload, cover note) → other open roles. `JobPosting` schema — **this makes roles eligible for Google Jobs**, a large free traffic source.

### 7.21 Life at Divine Dev Hub — `/careers/life-at-divine/`

Photo-led: culture manifesto → a day in the life → team traditions → learning & growth → office tour (photo grid + optional 360°) → employee stories → CSR/community → open roles CTA.

---

### 7.22 Contact — `/contact-us/`

**Fixes audit defects B6, D1, D7.**

| # | Section | Detail |
|---|---|---|
| 1 | Hero (E) | H1 "Let's talk about your project." Lead: "Tell us what you're building. A senior engineer replies within 4 business hours." |
| 2 | Contact methods | 4 cards **above** the form: 📞 Call (`tel:` + hours in IST/EST/GMT) · 💬 WhatsApp · ✉️ Email · 📅 **Book a slot** (calendar embed). Giving four channels instead of one is the single biggest fix on this page |
| 3 | Form + sidebar | 7/5. Form: Name · Work Email · Company (optional) · Phone (**optional**) · Service interest (select) · Budget range (select, optional) · Timeline (select, optional) · Message · File upload (RFP/brief). Sidebar: office address, map, hours, response promise, NDA note, 1 testimonial, 3 review ratings |
| 4 | Why contact us | 4 reassurances: free consultation, NDA before specs, no obligation, senior engineer not salesperson |
| 5 | Office | Photo + embedded map (**lazy-loaded on interaction**, never on page load — a Google Maps iframe costs ~800 KB and wrecks LCP) |
| 6 | FAQ | 5 contact-specific questions |

**Conversion:** budget and timeline selects are *optional* but present — they qualify leads without blocking submission. Form success routes to `/thank-you/`.

### 7.23 Thank You — `/thank-you/`

Confirmation message + what happens next (3 steps with timings) + "while you wait": 3 case studies, a guide download, and the calendar booking link. Conversion tracking fires here.

---

### 7.24 Testimonials & Reviews — `/testimonials/`

Hero (B) → ratings summary bar (3 platforms with real scores and counts) → filter by industry/service → testimonial grid (masonry, mixed text + video) → video testimonials (click-to-play posters) → case studies CTA → CTA.

### 7.25 Awards & Recognition — `/awards/`

Hero (B) → awards timeline by year → award cards (badge, name, issuing body, year, description) → press mentions → certifications → CTA. **Only real awards** — this page exists specifically to substantiate the "12+ Awards" claim.

### 7.26 Certifications & Compliance — `/certifications/`

Hero (B) → certifications held → compliance frameworks we build to (GDPR, HIPAA, PCI-DSS, SOC 2, ISO 27001) → our security practices (code, infrastructure, access control, data handling, incident response) → NDA and IP policy → data-residency options → download the security overview (PDF, gated) → CTA.
**This page closes enterprise deals.** It is also the correct home for claims that would be risky to imply elsewhere.

---

### 7.27 FAQ — `/faqs/`

Hero (D) → search field (filters questions live) → category tabs (General · Services · Pricing · Process · Technical · Security · Support · Careers) → accordion groups (40–60 questions total) → "Didn't find your answer?" → CTA.
**SEO:** the strongest single AEO/PAA asset on the site. `FAQPage` schema. Each answer opens with a direct one-sentence answer.

### 7.28 Glossary — `/resources/glossary/`

A–Z index with anchor jump links; term cards with definition, related terms, and links to relevant services. Long-tail organic traffic at very low content cost.

### 7.29 Guides & Whitepapers — `/resources/guides/`

Grid of downloadable assets; each has a detail page with a cover image, what's inside, who it's for, and a gated download form (name + work email only). Feeds the newsletter list.

---

### 7.30 Legal Pages — Privacy · Terms · Cookies · Accessibility · SLA

**Shared template.** Hero (D, light background) → 8/4 layout: content + sticky table of contents → "Last updated" date prominent → clear `<h2>`/`<h3>` structure → 68ch measure → styled tables and lists → contact block for data requests (DPO email) → related legal links.

**Rules:** plain-language summaries in callout boxes at the top of each major section. `robots: index, follow` (legal pages are trust signals; do not noindex them). Cookie Policy pairs with a compliant consent banner. **Privacy Policy is a launch blocker** — required for GDPR, for Google Ads, and for Meta Ads eligibility (audit defect C11).

### 7.31 HTML Sitemap — `/sitemap/`

Full link directory grouped by section. Aids crawling and gives users an escape hatch.

### 7.32 404 — Not Found

Blueprint illustration → "That page doesn't exist (yet)" → search field → 6 popular destinations → recent blog posts → CTA. Never a bare "404".

### 7.33 Search Results

Query echo + result count → filter by content type → grouped results with type badges and highlighted matches → empty state with suggestions → CTA.

---

### 7.34 Template Inventory (Phase 1 build list)

| # | Template | Reusable for | Priority |
|---|---|---|---|
| 1 | Header (global) | all | **P0** |
| 2 | Footer (global) | all | **P0** |
| 3 | Homepage | 1 | **P0** |
| 4 | Service Detail | 14 pages | P1 |
| 5 | Services Hub | 1 | P1 |
| 6 | Case Study Detail | ~12 pages | P1 |
| 7 | Contact | 1 | P1 |
| 8 | About | 1 | P1 |
| 9 | Case Studies Hub | 1 | P2 |
| 10 | Industry Detail | 10 pages | P2 |
| 11 | Industries Hub | 1 | P2 |
| 12 | Portfolio Hub | 1 | P2 |
| 13 | Portfolio Detail | ~50 pages | P2 |
| 14 | Hire Developers Hub | 1 | P2 |
| 15 | Hire Developer Detail | 12 pages | P2 |
| 16 | Technologies Hub | 1 | P3 |
| 17 | Technology Detail | ~28 pages | P3 |
| 18 | Solutions Hub | 1 | P3 |
| 19 | Solution Detail | 6 pages | P3 |
| 20 | Process | 1 | P3 |
| 21 | Engagement Models | 1 | P3 |
| 22 | Blog Listing | 1 | P3 |
| 23 | Blog Detail | ∞ | P3 |
| 24 | Careers | 1 | P4 |
| 25 | Job Detail | ∞ | P4 |
| 26 | FAQ | 1 | P4 |
| 27 | Testimonials | 1 | P4 |
| 28 | Awards / Certifications | 2 | P4 |
| 29 | Legal (shared) | 5 pages | P4 |
| 30 | Cost Calculator | 1 | P5 |
| 31 | Utility (404, Thank You, Search, Sitemap) | 4 | P5 |
| 32 | Style Guide | 1 | **P0** |

**32 templates → ~135 live URLs.**

---

*Continue to → [Part 5 — Components, Motion, SEO & Roadmap](05-components-motion-seo-roadmap.md)*
