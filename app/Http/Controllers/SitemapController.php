<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Project;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function index(): Response
    {
        $urls = [
            ['loc' => url('/'), 'priority' => '1.0', 'changefreq' => 'weekly'],
            ['loc' => route('projects.index'), 'priority' => '0.8', 'changefreq' => 'weekly'],
            ['loc' => route('blog.index'), 'priority' => '0.8', 'changefreq' => 'weekly'],
        ];

        foreach (Project::ordered()->get() as $project) {
            $urls[] = [
                'loc' => route('projects.show', $project),
                'lastmod' => $project->updated_at?->toAtomString(),
                'priority' => '0.6',
                'changefreq' => 'monthly',
            ];
        }

        foreach (Post::published()->latestFirst()->get() as $post) {
            $urls[] = [
                'loc' => route('blog.show', $post),
                'lastmod' => $post->updated_at?->toAtomString(),
                'priority' => '0.6',
                'changefreq' => 'monthly',
            ];
        }

        return response()
            ->view('sitemap', ['urls' => $urls])
            ->header('Content-Type', 'application/xml');
    }

    public function robots(): Response
    {
        $content = implode("\n", [
            'User-agent: *',
            'Allow: /',
            'Disallow: /admin',
            '',
            'Sitemap: ' . url('/sitemap.xml'),
            '',
        ]);

        return response($content, 200)->header('Content-Type', 'text/plain');
    }
}
