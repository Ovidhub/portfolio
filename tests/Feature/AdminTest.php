<?php

namespace Tests\Feature;

use App\Models\Project;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AdminTest extends TestCase
{
    use RefreshDatabase;

    private function admin(): User
    {
        return User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
        ]);
    }

    public function test_guests_are_redirected_to_login(): void
    {
        $this->get('/admin')->assertRedirect('/admin/login');
        $this->get('/admin/projects')->assertRedirect('/admin/login');
    }

    public function test_admin_can_log_in(): void
    {
        $this->admin();

        $response = $this->post('/admin/login', [
            'email' => 'admin@example.com',
            'password' => 'password',
        ]);

        $response->assertRedirect(route('admin.dashboard'));
        $this->assertAuthenticated();
    }

    public function test_login_fails_with_bad_credentials(): void
    {
        $this->admin();

        $this->from('/admin/login')->post('/admin/login', [
            'email' => 'admin@example.com',
            'password' => 'wrong',
        ])->assertRedirect('/admin/login')->assertSessionHasErrors('email');

        $this->assertGuest();
    }

    public function test_admin_can_create_a_project(): void
    {
        $response = $this->actingAs($this->admin())->post('/admin/projects', [
            'title' => 'Created Project',
            'description' => 'A new project',
            'icon' => 'code',
            'color' => 'from-purple-500 to-pink-500',
            'tags' => 'React, Laravel',
            'featured' => '1',
        ]);

        $response->assertRedirect(route('admin.projects.index'));
        $this->assertDatabaseHas('projects', ['title' => 'Created Project', 'slug' => 'created-project']);

        $project = Project::first();
        $this->assertEquals(['React', 'Laravel'], $project->tags);
    }

    public function test_admin_can_delete_a_project(): void
    {
        $project = Project::create(['title' => 'Temp', 'slug' => 'temp', 'description' => 'd']);

        $this->actingAs($this->admin())
            ->delete(route('admin.projects.destroy', $project))
            ->assertRedirect(route('admin.projects.index'));

        $this->assertDatabaseMissing('projects', ['id' => $project->id]);
    }
}
