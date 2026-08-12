<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Support\Content;
use Illuminate\View\View;

class WorkController extends Controller
{
    public function index(): View
    {
        return view('pages.work.index', [
            'projects' => Content::projects(),
            'industries' => Content::industries(),
        ]);
    }

    public function show(string $slug): View
    {
        $project = Content::project($slug) ?? abort(404);

        $industry = $project['industry'] ? Content::industry($project['industry']) : null;

        return view('pages.work.show', [
            'project' => $project,
            'industry' => $industry,
            'otherProjects' => collect(Content::projects())->where('slug', '!=', $slug)->take(3)->values(),
        ]);
    }
}
