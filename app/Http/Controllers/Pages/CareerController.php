<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Support\Content;
use Illuminate\View\View;

class CareerController extends Controller
{
    public function index(): View
    {
        return view('pages.careers.index', [
            'jobs' => Content::jobs(),
        ]);
    }

    public function show(string $slug): View
    {
        $job = Content::job($slug) ?? abort(404);

        return view('pages.careers.show', [
            'job' => $job,
        ]);
    }
}
