<?php

namespace App\Http\Controllers;

use App\Mail\ContactMessageReceived;
use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Throwable;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'first_name' => ['required', 'string', 'max:100'],
            'last_name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:255'],
            'subject' => ['required', 'string', 'max:200'],
            'message' => ['required', 'string', 'max:5000'],
        ]);

        // Persist first so a message is never lost even if email delivery fails.
        $message = ContactMessage::create($data);

        // Notify the site owner. Falls back to the "from" address when no dedicated
        // notification address is configured.
        $recipient = config('mail.contact_notification') ?: config('mail.from.address');

        if ($recipient) {
            try {
                Mail::to($recipient)->send(new ContactMessageReceived($message));
            } catch (Throwable $e) {
                // Don't surface mail/SMTP errors to the visitor — the message is
                // already saved and visible in the admin inbox.
                Log::error('Contact notification email failed to send.', [
                    'contact_message_id' => $message->id,
                    'error' => $e->getMessage(),
                ]);
            }
        }

        return redirect()
            ->to(url('/') . '#contact')
            ->with('contact_success', "Thanks for reaching out! I'll get back to you soon.");
    }
}
