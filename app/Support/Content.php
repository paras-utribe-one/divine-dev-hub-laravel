<?php

namespace App\Support;

/**
 * Single source of truth for the company's static marketing content.
 *
 * Before this class existed, the services list was hand-duplicated three times
 * (header, footer, homepage) with three different orderings and field sets.
 * Every page — homepage, hub pages, and detail pages — should read from here
 * instead of declaring its own copy, so there is exactly one place to update
 * a service, industry, or project.
 *
 * This is plain-array content, not a database, because none of it changes
 * often enough yet to justify migrations/Eloquent models. If that changes,
 * these methods are the seam to swap for real queries without touching views.
 */
class Content
{
    /**
     * @return array<int, array{slug:string,title:string,icon:string,description:string,tags:string[],summary:string}>
     */
    public static function services(): array
    {
        return [
            [
                'slug' => 'web-development',
                'title' => 'Web Development',
                'icon' => 'code',
                'description' => 'Full-stack web development — offering customized solutions from design to deployment and security.',
                'tags' => ['React', 'Laravel', 'Tailwind CSS'],
                'summary' => 'We design and build custom web applications and marketing sites end to end — information architecture, interface design, backend development and deployment. Work ranges from content-driven business sites to data-heavy internal platforms, built to be maintained and extended rather than thrown away after launch.',
            ],
            [
                'slug' => 'software-services',
                'title' => 'Software Services',
                'icon' => 'layers',
                'description' => 'Comprehensive software services: development, integration and customization for diverse business needs.',
                'tags' => ['Laravel', 'Node.js', 'PHP'],
                'summary' => 'Custom software built around how your business actually operates, rather than forcing a process to fit an off-the-shelf tool. Covers new product builds, integration between existing systems, and ongoing customization as requirements change.',
            ],
            [
                'slug' => 'crm-solutions',
                'title' => 'CRM Solutions',
                'icon' => 'users',
                'description' => 'Custom CRM solutions that streamline operations, strengthen customer relationships and maximize efficiency.',
                'tags' => ['Laravel', 'Node.js', 'AWS'],
                'summary' => 'CRM systems built around your sales and support workflow, not the other way around — lead tracking, pipeline management, and reporting shaped to match how your team actually sells and supports customers.',
            ],
            [
                'slug' => 'app-development',
                'title' => 'App Development',
                'icon' => 'smartphone',
                'description' => 'Expert mobile app development — from concept to launch, ensuring seamless user experiences.',
                'tags' => ['Flutter', 'React Native'],
                'summary' => 'Cross-platform and native-feeling mobile apps for iOS and Android, from early concept and UX through App Store / Play Store launch and post-launch iteration.',
            ],
            [
                'slug' => 'e-commerce',
                'title' => 'E-Commerce',
                'icon' => 'cart',
                'description' => 'Tailored e-commerce solutions: design, development and optimization for online business growth.',
                'tags' => ['Magento', 'Laravel', 'AWS'],
                'summary' => 'Online storefronts designed and built for conversion — product catalog and checkout architecture, payment and shipping integration, and performance tuning for stores that need to handle real traffic.',
            ],
            [
                'slug' => 'odoo-services',
                'title' => 'Odoo Services',
                'icon' => 'database',
                'description' => "Odoo is a powerful, open-source ERP suite we implement and customize to streamline business operations.",
                'tags' => ['Odoo', 'PHP'],
                'summary' => 'Implementation and customization on the Odoo ERP suite — module configuration, custom module development, and integration with existing business systems for teams standardizing their operations on Odoo.',
            ],
            [
                'slug' => 'magento-services',
                'title' => 'Magento Services',
                'icon' => 'cloud',
                'description' => 'Magento is a robust, flexible open-source e-commerce platform we use to build and manage online stores.',
                'tags' => ['Magento', 'PHP', 'AWS'],
                'summary' => "Store builds, upgrades, and ongoing management on the Magento commerce platform — for merchants who need the extensibility of Magento's catalog and pricing engine at scale.",
            ],
        ];
    }

    public static function service(string $slug): ?array
    {
        return collect(self::services())->firstWhere('slug', $slug);
    }

    /**
     * @return array<int, array{slug:string,label:string,icon:string,description:string,items:string[]}>
     */
    public static function technologyCategories(): array
    {
        return [
            ['slug' => 'frontend', 'label' => 'Frontend', 'icon' => 'monitor', 'description' => 'Interactive, accessible interfaces built for performance.', 'items' => ['React', 'Alpine.js', 'Tailwind CSS']],
            ['slug' => 'backend', 'label' => 'Backend', 'icon' => 'server', 'description' => 'Reliable APIs and business logic that scale with you.', 'items' => ['Laravel', 'Node.js', 'PHP']],
            ['slug' => 'mobile', 'label' => 'Mobile', 'icon' => 'smartphone', 'description' => 'Native-feeling apps for iOS and Android.', 'items' => ['Flutter', 'React Native']],
            ['slug' => 'cloud-devops', 'label' => 'Cloud & DevOps', 'icon' => 'cloud', 'description' => 'Automated, observable infrastructure and deployment pipelines.', 'items' => ['AWS', 'Docker', 'CI/CD']],
            ['slug' => 'platforms', 'label' => 'Platforms', 'icon' => 'cpu', 'description' => 'Deep implementation experience on established platforms.', 'items' => ['Odoo', 'Magento']],
        ];
    }

    /**
     * The handful of stacks with their own detail page (highest-relevance first).
     * Grow this list incrementally rather than building all 15+ stacks up front.
     *
     * @return array<int, array{slug:string,name:string,category:string,icon:string,summary:string}>
     */
    public static function technologyDetails(): array
    {
        return [
            [
                'slug' => 'laravel',
                'name' => 'Laravel',
                'category' => 'Backend',
                'icon' => 'server',
                'summary' => 'Our primary backend framework for custom software, CRM builds, and this website itself. Used where a project needs a maintainable, well-tested application layer rather than a page-builder or a no-code shortcut.',
            ],
            [
                'slug' => 'react',
                'name' => 'React',
                'category' => 'Frontend',
                'icon' => 'monitor',
                'summary' => 'Our default choice for interface-heavy web applications — dashboards, admin panels, and products where the frontend carries real interaction logic rather than mostly-static content.',
            ],
            [
                'slug' => 'flutter',
                'name' => 'Flutter',
                'category' => 'Mobile',
                'icon' => 'smartphone',
                'summary' => 'Our default choice for cross-platform mobile apps that need to ship to iOS and Android from a single codebase without feeling like a compromise on either platform.',
            ],
        ];
    }

    public static function technologyDetail(string $slug): ?array
    {
        return collect(self::technologyDetails())->firstWhere('slug', $slug);
    }

    /**
     * @return array<int, array{slug:string,label:string,icon:string,description:string,featured?:bool,related?:string}>
     */
    public static function industries(): array
    {
        return [
            ['slug' => 'travel-hospitality', 'label' => 'Travel & Hospitality', 'icon' => 'plane', 'description' => 'Booking, itinerary and guest-experience platforms.', 'featured' => true, 'related' => 'Show Me Around'],
            ['slug' => 'agriculture-ecommerce', 'label' => 'Agriculture & E-Commerce', 'icon' => 'sprout', 'description' => 'Marketplaces connecting growers and buyers.'],
            ['slug' => 'healthcare-telemedicine', 'label' => 'Healthcare & Telemedicine', 'icon' => 'heart-pulse', 'description' => 'Remote-care and clinical workflow platforms.'],
            ['slug' => 'fintech-trading', 'label' => 'FinTech & Trading', 'icon' => 'line-chart', 'description' => 'AI-assisted trading and market tooling.'],
            ['slug' => 'education', 'label' => 'Education', 'icon' => 'graduation-cap', 'description' => 'School and institution management systems.'],
            ['slug' => 'logistics-on-demand', 'label' => 'Logistics & On-Demand', 'icon' => 'truck', 'description' => 'Delivery, freelancing and on-demand marketplaces.'],
        ];
    }

    public static function industry(string $slug): ?array
    {
        return collect(self::industries())->firstWhere('slug', $slug);
    }

    /**
     * Featured project work. `metric` is intentionally left null until a real,
     * client-confirmed number exists — see docs/build-log.md. Do not fill this
     * in with an invented figure.
     *
     * @return array<int, array{slug:string,title:string,category:string,image:string,industry:?string,featured?:bool,summary:string,metric:?string}>
     */
    public static function projects(): array
    {
        return [
            [
                'slug' => 'show-me-around',
                'title' => 'Show Me Around',
                'category' => 'Travel Platform',
                'image' => 'show-me-around.webp',
                'industry' => 'travel-hospitality',
                'featured' => true,
                'summary' => 'A booking and itinerary platform built for the travel and hospitality space, covering the guest-facing booking flow end to end.',
                'metric' => null,
            ],
            [
                'slug' => 'agripari',
                'title' => 'Agripari',
                'category' => 'Agricultural E-Commerce',
                'image' => 'agripari.webp',
                'industry' => 'agriculture-ecommerce',
                'summary' => 'A marketplace connecting agricultural growers and buyers, built as an e-commerce platform tailored to the agriculture sector.',
                'metric' => null,
            ],
            [
                'slug' => 'live-medical-service',
                'title' => 'Live Medical Service',
                'category' => 'Telemedicine Platform',
                'image' => 'live-medical-service.webp',
                'industry' => 'healthcare-telemedicine',
                'summary' => 'A telemedicine platform supporting remote-care workflows between patients and providers.',
                'metric' => null,
            ],
            [
                'slug' => 'stock-market-service',
                'title' => 'Stock Market Service',
                'category' => 'AI-Powered Trading Software',
                'image' => 'stock-market-service.webp',
                'industry' => 'fintech-trading',
                'summary' => 'AI-assisted trading and market-data tooling built for the fintech sector.',
                'metric' => null,
            ],
            [
                'slug' => 'quickclock',
                'title' => 'QuickClock',
                'category' => 'HRMS',
                'image' => 'quickclock.webp',
                // No industry match: HR/workforce software doesn't fit any of
                // the six listed industries — leave unmapped rather than force
                // it into the nearest-sounding category.
                'industry' => null,
                'summary' => 'An HR management system covering core workforce operations for its client organization.',
                'metric' => null,
            ],
            [
                'slug' => 'school-management',
                'title' => 'School Management',
                'category' => 'School Management System',
                'image' => 'school-management.webp',
                'industry' => 'education',
                'summary' => 'A school management system built for the education sector, covering institutional administration workflows.',
                'metric' => null,
            ],
        ];
    }

    public static function project(string $slug): ?array
    {
        return collect(self::projects())->firstWhere('slug', $slug);
    }

    /**
     * @return array<int, array{title:string,icon:string,description:string}>
     */
    public static function benefits(): array
    {
        return [
            ['title' => 'Engineering Quality', 'icon' => 'shield', 'description' => 'Clean, maintainable code and sensible architecture from day one — built to be extended, not rewritten.'],
            ['title' => 'Clear Communication', 'icon' => 'message', 'description' => 'Direct access to the people building your product, with regular, plain-language progress updates.'],
            ['title' => 'Scalable Architecture', 'icon' => 'trending-up', 'description' => 'Systems designed to handle growth in users, data and features without a costly rebuild.'],
            ['title' => 'Business-Focused Delivery', 'icon' => 'target', 'description' => 'Every technical decision is weighed against the business outcome it needs to support.'],
        ];
    }

    /**
     * @return array<int, array{number:string,title:string,icon:string,description:string}>
     */
    public static function processSteps(): array
    {
        return [
            ['number' => '01', 'title' => 'Discovery', 'icon' => 'search', 'description' => 'Understanding your goals, users and constraints before writing a line of code.'],
            ['number' => '02', 'title' => 'Strategy', 'icon' => 'compass', 'description' => 'Defining scope, architecture and success metrics for the engagement.'],
            ['number' => '03', 'title' => 'Design', 'icon' => 'pen', 'description' => 'Translating requirements into clear, usable interfaces and flows.'],
            ['number' => '04', 'title' => 'Development', 'icon' => 'code', 'description' => 'Building in focused iterations, with regular check-ins along the way.'],
            ['number' => '05', 'title' => 'Testing', 'icon' => 'check-circle', 'description' => 'Verifying functionality, performance and security before release.'],
            ['number' => '06', 'title' => 'Launch', 'icon' => 'rocket', 'description' => 'Deploying to production with a clear rollout and rollback plan.'],
            ['number' => '07', 'title' => 'Support', 'icon' => 'life-buoy', 'description' => 'Ongoing monitoring, fixes and enhancements after go-live.'],
        ];
    }

    /**
     * Grouped for the full /faqs/ page; the homepage shows a flat subset of these.
     *
     * @return array<string, array<int, array{question:string,answer:string}>>
     */
    public static function faqGroups(): array
    {
        return [
            'Working with us' => [
                [
                    'question' => 'What services does Divine Dev Hub offer?',
                    'answer' => 'We provide web development, custom software, CRM solutions, mobile app development, e-commerce builds, and Odoo and Magento implementations.',
                ],
                [
                    'question' => 'Do you work with startups as well as established businesses?',
                    'answer' => "Yes — our portfolio includes projects for both emerging startups and larger, established organizations.",
                ],
                [
                    'question' => 'Where is Divine Dev Hub based?',
                    'answer' => 'Our office is located at 304, Palladium Business Hub, Opposite 4D Square Mall, Chandkheda, Ahmedabad, Gujarat 382424.',
                ],
            ],
            'Process' => [
                [
                    'question' => 'What does your development process look like?',
                    'answer' => 'Every engagement moves through the same seven stages: discovery, strategy, design, development, testing, launch and ongoing support. See our full process for what happens at each stage.',
                ],
                [
                    'question' => 'How do you communicate progress during a project?',
                    'answer' => 'You have direct access to the people building your product, with regular, plain-language progress updates rather than communication filtered through an account manager.',
                ],
            ],
            'After launch' => [
                [
                    'question' => 'Can you support a project after launch?',
                    'answer' => 'Yes, ongoing support and enhancement is part of our standard development process.',
                ],
            ],
        ];
    }

    /**
     * Flat list for the homepage's shorter FAQ section (first item of each group).
     *
     * @return array<int, array{question:string,answer:string}>
     */
    public static function faqHighlights(): array
    {
        $groups = self::faqGroups();

        return [
            $groups['Working with us'][0],
            $groups['Working with us'][1],
            $groups['After launch'][0],
            $groups['Working with us'][2],
        ];
    }

    /**
     * No open roles today — this stays an empty array until the client provides
     * real listings. The Careers page renders an honest empty state rather than
     * inventing job postings. See docs/build-log.md.
     *
     * @return array<int, array{slug:string,title:string,location:string,type:string,description:string}>
     */
    public static function jobs(): array
    {
        return [];
    }

    public static function job(string $slug): ?array
    {
        return collect(self::jobs())->firstWhere('slug', $slug);
    }

    /**
     * No published posts yet — the Blog page renders an honest empty state.
     * See docs/build-log.md.
     *
     * @return array<int, array{slug:string,title:string,excerpt:string,category:string,date:string}>
     */
    public static function posts(): array
    {
        return [];
    }

    /**
     * No real, attributed testimonials exist yet — see docs/build-log.md.
     * Never populate this with invented quotes.
     *
     * @return array<int, array{quote:string,name:string,role:string,company:string}>
     */
    public static function testimonials(): array
    {
        return [];
    }
}
