<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Support\Content;
use Illuminate\View\View;

class BlogController extends Controller
{
    public function index(): View
    {
        return view('pages.blog.index', [
            'posts' => Content::posts(),
        ]);
    }

    public function show(string $slug): View
    {
        $post = collect(Content::posts())->firstWhere('slug', $slug) ?? abort(404);

        return view('pages.blog.show', [
            'post' => $post,
        ]);
    }
}
