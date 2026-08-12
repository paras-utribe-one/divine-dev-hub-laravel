<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Support\Content;
use Illuminate\View\View;

class ServiceController extends Controller
{
    public function index(): View
    {
        return view('pages.services.index', [
            'services' => Content::services(),
        ]);
    }

    public function show(string $slug): View
    {
        $service = Content::service($slug) ?? abort(404);

        return view('pages.services.show', [
            'service' => $service,
            'otherServices' => collect(Content::services())->where('slug', '!=', $slug)->take(3)->values(),
        ]);
    }
}
