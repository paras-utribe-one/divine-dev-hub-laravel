<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home');
})->name('home');

Route::get('/sitemap.xml', function () {
    $pages = [
        ['url' => route('home'), 'lastmod' => date('Y-m-d', filemtime(resource_path('views/pages/home.blade.php')))],
    ];

    $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
    $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

    foreach ($pages as $page) {
        $xml .= "    <url>\n";
        $xml .= '        <loc>' . htmlspecialchars($page['url'], ENT_XML1 | ENT_QUOTES, 'UTF-8') . "</loc>\n";
        $xml .= '        <lastmod>' . $page['lastmod'] . "</lastmod>\n";
        $xml .= "    </url>\n";
    }

    $xml .= '</urlset>';

    return response($xml, 200)->header('Content-Type', 'application/xml; charset=UTF-8');
})->name('sitemap');

Route::get('/robots.txt', function () {
    $lines = [
        'User-agent: *',
        'Allow: /',
        '',
        'Sitemap: ' . route('sitemap'),
    ];

    return response(implode("\n", $lines), 200)->header('Content-Type', 'text/plain; charset=UTF-8');
});
