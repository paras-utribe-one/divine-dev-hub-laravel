<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Support\Content;
use Illuminate\View\View;

class PageController extends Controller
{
    public function about(): View
    {
        return view('pages.about', [
            'benefits' => Content::benefits(),
            'processSteps' => Content::processSteps(),
            'team' => Content::team(),
            'trustBadges' => Content::trustBadges(),
        ]);
    }

    public function faqs(): View
    {
        return view('pages.faqs', [
            'faqGroups' => Content::faqGroups(),
        ]);
    }

    public function testimonials(): View
    {
        return view('pages.testimonials', [
            'testimonials' => Content::testimonials(),
        ]);
    }

    public function privacyPolicy(): View
    {
        return view('pages.legal.privacy-policy');
    }

    public function termsConditions(): View
    {
        return view('pages.legal.terms-conditions');
    }

    public function thankYou(): View
    {
        return view('pages.thank-you');
    }

    public function htmlSitemap(): View
    {
        return view('pages.sitemap', [
            'services' => Content::services(),
            'technologies' => Content::technologyDetails(),
            'industries' => Content::industries(),
            'projects' => Content::projects(),
        ]);
    }

    /**
     * Internal dev reference only — not part of the public site. Gated to
     * the local environment so it can never be reached on a real
     * deployment, on top of being excluded from the sitemap, marked
     * noindex/nofollow, and unlinked from the header/footer nav. See
     * docs/build-log.md for the reasoning.
     */
    public function styleguide(): View
    {
        abort_unless(app()->environment('local'), 404);

        return view('pages.styleguide', [
            'services' => Content::services(),
            'projects' => Content::projects(),
            'testimonials' => Content::testimonials(),
            'posts' => Content::posts(),
            'jobs' => Content::jobs(),
            'team' => Content::team(),
            'trustBadges' => Content::trustBadges(),
            'processSteps' => Content::processSteps(),
            // Mirrors the icon map in components/svg-icon.blade.php — that
            // file is the real source of truth for what each icon actually
            // draws; this list only needs to stay in sync on name, not path
            // data, since <x-svg-icon> does the real rendering either way.
            'iconNames' => [
                'home', 'code', 'smartphone', 'layers', 'users', 'database', 'cart', 'cloud',
                'monitor', 'server', 'cpu', 'search', 'git-branch', 'compass', 'pen', 'check-circle',
                'rocket', 'life-buoy', 'arrow-right', 'arrow-up', 'arrow-up-right', 'chevron-down',
                'plus', 'minus', 'mail', 'map-pin', 'menu', 'close', 'shield', 'zap', 'message',
                'trending-up', 'target', 'plane', 'sprout', 'heart-pulse', 'line-chart',
                'graduation-cap', 'truck', 'facebook', 'twitter', 'linkedin', 'instagram', 'whatsapp',
            ],
            // Mirrors resources/css/app.css's @theme block — that file is
            // the real source of truth; this is a display-only mirror for
            // documentation, so it needs to be kept in sync by hand if the
            // theme changes.
            'colorTokens' => [
                'Brand' => [
                    ['name' => 'primary', 'var' => '--color-primary', 'hex' => '#2e3192'],
                    ['name' => 'primary-hover', 'var' => '--color-primary-hover', 'hex' => '#24276f'],
                    ['name' => 'primary-light', 'var' => '--color-primary-light', 'hex' => '#4d50b3'],
                    ['name' => 'primary-50', 'var' => '--color-primary-50', 'hex' => '#f0f1fa'],
                    ['name' => 'accent', 'var' => '--color-accent', 'hex' => '#d99a3d'],
                    ['name' => 'accent-hover', 'var' => '--color-accent-hover', 'hex' => '#c48628'],
                ],
                'Dark / secondary' => [
                    ['name' => 'secondary', 'var' => '--color-secondary', 'hex' => '#10112b'],
                    ['name' => 'secondary-light', 'var' => '--color-secondary-light', 'hex' => '#1b1d45'],
                    ['name' => 'surface-dark', 'var' => '--color-surface-dark', 'hex' => '#10112b'],
                ],
                'Surface' => [
                    ['name' => 'background', 'var' => '--color-background', 'hex' => '#ffffff'],
                    ['name' => 'surface', 'var' => '--color-surface', 'hex' => '#f7f7fb'],
                ],
                'Text' => [
                    ['name' => 'text-primary', 'var' => '--color-text-primary', 'hex' => '#14152b'],
                    ['name' => 'text-secondary', 'var' => '--color-text-secondary', 'hex' => '#52546e'],
                    ['name' => 'text-inverse', 'var' => '--color-text-inverse', 'hex' => '#ffffff'],
                    ['name' => 'text-muted-inverse', 'var' => '--color-text-muted-inverse', 'hex' => '#a4a6c4'],
                    ['name' => 'muted', 'var' => '--color-muted', 'hex' => '#8b8da6'],
                ],
                'Border' => [
                    ['name' => 'border', 'var' => '--color-border', 'hex' => '#e4e4ef'],
                    ['name' => 'border-dark', 'var' => '--color-border-dark', 'hex' => '#2a2c52'],
                ],
                'Semantic' => [
                    ['name' => 'success', 'var' => '--color-success', 'hex' => '#16a34a'],
                    ['name' => 'error', 'var' => '--color-error', 'hex' => '#dc2626'],
                ],
            ],
        ]);
    }
}
