<?php

use App\Http\Controllers\Pages\BlogController;
use App\Http\Controllers\Pages\CareerController;
use App\Http\Controllers\Pages\ContactController;
use App\Http\Controllers\Pages\IndustryController;
use App\Http\Controllers\Pages\PageController;
use App\Http\Controllers\Pages\ServiceController;
use App\Http\Controllers\Pages\TechnologyController;
use App\Http\Controllers\Pages\WorkController;
use App\Support\Content;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home');
})->name('home');

Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/faqs', [PageController::class, 'faqs'])->name('faqs');
Route::get('/testimonials', [PageController::class, 'testimonials'])->name('testimonials');
Route::get('/privacy-policy', [PageController::class, 'privacyPolicy'])->name('privacy-policy');
Route::get('/terms-conditions', [PageController::class, 'termsConditions'])->name('terms-conditions');
Route::get('/thank-you', [PageController::class, 'thankYou'])->name('thank-you');
Route::get('/sitemap', [PageController::class, 'htmlSitemap'])->name('sitemap.html');

Route::get('/contact', [ContactController::class, 'show'])->name('contact.show');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/services/{slug}', [ServiceController::class, 'show'])->name('services.show');

Route::get('/technologies', [TechnologyController::class, 'index'])->name('technologies.index');
Route::get('/technologies/{slug}', [TechnologyController::class, 'show'])->name('technologies.show');

Route::get('/industries', [IndustryController::class, 'index'])->name('industries.index');
Route::get('/industries/{slug}', [IndustryController::class, 'show'])->name('industries.show');

Route::get('/work', [WorkController::class, 'index'])->name('work.index');
Route::get('/work/{slug}', [WorkController::class, 'show'])->name('work.show');

Route::get('/careers', [CareerController::class, 'index'])->name('careers.index');
Route::get('/careers/{slug}', [CareerController::class, 'show'])->name('careers.show');

Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

Route::get('/sitemap.xml', function () {
    $pages = collect([
        ['url' => route('home'), 'lastmod' => date('Y-m-d', filemtime(resource_path('views/pages/home.blade.php')))],
        ['url' => route('about'), 'priority' => '0.8'],
        ['url' => route('contact.show'), 'priority' => '0.8'],
        ['url' => route('faqs'), 'priority' => '0.5'],
        ['url' => route('services.index'), 'priority' => '0.8'],
        ['url' => route('technologies.index'), 'priority' => '0.6'],
        ['url' => route('industries.index'), 'priority' => '0.6'],
        ['url' => route('work.index'), 'priority' => '0.7'],
        ['url' => route('careers.index'), 'priority' => '0.4'],
        ['url' => route('blog.index'), 'priority' => '0.4'],
        ['url' => route('privacy-policy'), 'priority' => '0.2'],
        ['url' => route('terms-conditions'), 'priority' => '0.2'],
    ]);

    foreach (Content::services() as $service) {
        $pages->push(['url' => route('services.show', $service['slug']), 'priority' => '0.7']);
    }

    foreach (Content::technologyDetails() as $technology) {
        $pages->push(['url' => route('technologies.show', $technology['slug']), 'priority' => '0.5']);
    }

    foreach (Content::industries() as $industry) {
        $pages->push(['url' => route('industries.show', $industry['slug']), 'priority' => '0.5']);
    }

    foreach (Content::projects() as $project) {
        $pages->push(['url' => route('work.show', $project['slug']), 'priority' => '0.6']);
    }

    foreach (Content::jobs() as $job) {
        $pages->push(['url' => route('careers.show', $job['slug']), 'priority' => '0.4']);
    }

    foreach (Content::posts() as $post) {
        $pages->push(['url' => route('blog.show', $post['slug']), 'priority' => '0.4']);
    }

    $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
    $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

    foreach ($pages as $page) {
        $xml .= "    <url>\n";
        $xml .= '        <loc>' . htmlspecialchars($page['url'], ENT_XML1 | ENT_QUOTES, 'UTF-8') . "</loc>\n";
        if (! empty($page['lastmod'])) {
            $xml .= '        <lastmod>' . $page['lastmod'] . "</lastmod>\n";
        }
        if (! empty($page['priority'])) {
            $xml .= '        <priority>' . $page['priority'] . "</priority>\n";
        }
        $xml .= "    </url>\n";
    }

    $xml .= '</urlset>';

    return response($xml, 200)->header('Content-Type', 'application/xml; charset=UTF-8');
})->name('sitemap.xml');

Route::get('/robots.txt', function () {
    $lines = [
        'User-agent: *',
        'Allow: /',
        '',
        'Sitemap: ' . route('sitemap.xml'),
    ];

    return response(implode("\n", $lines), 200)->header('Content-Type', 'text/plain; charset=UTF-8');
});
