<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\Project;
use App\Models\Service;
use App\Models\Testimonial;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PublicPagesTest extends TestCase
{
    use RefreshDatabase;

    public function test_home_page_renders_with_seeded_content(): void
    {
        Service::create(['title' => 'Web Development', 'description' => 'Building apps', 'icon' => 'code']);
        Project::create(['title' => 'My Project', 'slug' => 'my-project', 'description' => 'A great project', 'featured' => true]);
        Testimonial::create(['name' => 'Jane Doe', 'role' => 'CEO', 'content' => 'Excellent work', 'rating' => 5, 'avatar' => 'JD']);

        $response = $this->get('/');

        $response->assertOk();
        $response->assertSee('Web Development');
        $response->assertSee('My Project');
        $response->assertSee('Jane Doe');
        $response->assertSee('application/ld+json', false);
        $response->assertSee('og:title', false);
    }

    public function test_projects_index_lists_projects(): void
    {
        Project::create(['title' => 'Alpha App', 'slug' => 'alpha-app', 'description' => 'desc']);

        $this->get('/projects')->assertOk()->assertSee('Alpha App');
    }

    public function test_project_detail_resolves_by_slug(): void
    {
        Project::create(['title' => 'Beta App', 'slug' => 'beta-app', 'description' => 'desc', 'body' => 'Full body text here']);

        $this->get('/projects/beta-app')->assertOk()->assertSee('Full body text here');
    }

    public function test_unknown_project_returns_404(): void
    {
        $this->get('/projects/does-not-exist')->assertNotFound();
    }

    public function test_published_post_is_visible_and_draft_is_not(): void
    {
        Post::create(['title' => 'Live Post', 'slug' => 'live-post', 'excerpt' => 'x', 'body' => 'Body', 'published_at' => now()->subDay()]);
        Post::create(['title' => 'Draft Post', 'slug' => 'draft-post', 'excerpt' => 'x', 'body' => 'Body', 'published_at' => null]);

        $this->get('/blog')->assertOk()->assertSee('Live Post')->assertDontSee('Draft Post');
        $this->get('/blog/live-post')->assertOk();
        $this->get('/blog/draft-post')->assertNotFound();
    }

    public function test_funnel_page_renders(): void
    {
        $this->get('/funnel')
            ->assertOk()
            ->assertSee('REIGNITE')
            ->assertSee('Stop drifting apart.')
            ->assertSee('MOST POPULAR');
    }

    public function test_sitemap_and_robots_respond(): void
    {
        Project::create(['title' => 'Sitemap Project', 'slug' => 'sitemap-project', 'description' => 'd']);

        $sitemap = $this->get('/sitemap.xml');
        $sitemap->assertOk();
        $sitemap->assertHeader('Content-Type', 'application/xml');
        $sitemap->assertSee('sitemap-project', false);

        $robots = $this->get('/robots.txt');
        $robots->assertOk();
        $robots->assertSee('Sitemap:', false);
    }
}
