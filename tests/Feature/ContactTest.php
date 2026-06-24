<?php

namespace Tests\Feature;

use App\Mail\ContactMessageReceived;
use App\Models\ContactMessage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class ContactTest extends TestCase
{
    use RefreshDatabase;

    public function test_contact_form_persists_and_sends_mail(): void
    {
        Mail::fake();

        $response = $this->post('/contact', [
            'first_name' => 'John',
            'last_name' => 'Smith',
            'email' => 'john@example.com',
            'subject' => 'Hello',
            'message' => 'I would like to work with you.',
        ]);

        $response->assertRedirect();
        $response->assertSessionHas('contact_success');

        $this->assertDatabaseHas('contact_messages', [
            'email' => 'john@example.com',
            'subject' => 'Hello',
        ]);

        Mail::assertSent(ContactMessageReceived::class);
    }

    public function test_contact_form_validates_required_fields(): void
    {
        $response = $this->from('/')->post('/contact', []);

        $response->assertSessionHasErrors(['first_name', 'last_name', 'email', 'subject', 'message']);
        $this->assertSame(0, ContactMessage::count());
    }
}
