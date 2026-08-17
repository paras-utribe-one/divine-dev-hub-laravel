<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Support\Content;
use Illuminate\View\View;

class IndustryController extends Controller
{
    public function index(): View
    {
        return view('pages.industries.index', [
            'industries' => Content::industries(),
        ]);
    }

    public function show(string $slug): View
    {
        $industry = Content::industry($slug) ?? abort(404);

        $relatedProjects = collect(Content::projects())
            ->where('industry', $slug)
            ->values();

        return view('pages.industries.show', [
            'industry' => $industry,
            'relatedProjects' => $relatedProjects,
            'otherIndustries' => collect(Content::industries())->where('slug', '!=', $slug)->take(3)->values(),
        ]);
    }
}
