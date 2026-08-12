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
}
