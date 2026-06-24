<?php

namespace Tests\Unit;

use App\Models\ContactMessage;
use App\Models\Post;
use App\Models\Project;
use Tests\TestCase;

class ModelTest extends TestCase
{
    public function test_contact_message_full_name_combines_first_and_last(): void
    {
        $message = new ContactMessage(['first_name' => 'Ada', 'last_name' => 'Lovelace']);

        $this->assertSame('Ada Lovelace', $message->full_name);
    }

    public function test_project_tags_are_cast_to_array(): void
    {
        $project = new Project(['tags' => ['Laravel', 'Tailwind']]);

        $this->assertSame(['Laravel', 'Tailwind'], $project->tags);
    }

    public function test_post_is_published_reflects_published_at(): void
    {
        $published = new Post(['published_at' => now()->subDay()]);
        $future = new Post(['published_at' => now()->addDay()]);
        $draft = new Post(['published_at' => null]);

        $this->assertTrue($published->is_published);
        $this->assertFalse($future->is_published);
        $this->assertFalse($draft->is_published);
    }
}
