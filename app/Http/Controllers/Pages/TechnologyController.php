<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Support\Content;
use Illuminate\View\View;

class TechnologyController extends Controller
{
    public function index(): View
    {
        return view('pages.technologies.index', [
            'categories' => Content::technologyCategories(),
            'details' => Content::technologyDetails(),
        ]);
    }

    public function show(string $slug): View
    {
        $technology = Content::technologyDetail($slug) ?? abort(404);

        return view('pages.technologies.show', [
            'technology' => $technology,
            'otherTechnologies' => collect(Content::technologyDetails())->where('slug', '!=', $slug)->values(),
        ]);
    }
}
