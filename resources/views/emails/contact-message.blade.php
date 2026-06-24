<x-mail::message>
# New Contact Message

You received a new message through your portfolio contact form.

**From:** {{ $contactMessage->full_name }} ({{ $contactMessage->email }})
**Subject:** {{ $contactMessage->subject }}

---

{{ $contactMessage->message }}

---

<x-mail::button :url="url('/admin/messages/' . $contactMessage->id)">
View in Admin
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
