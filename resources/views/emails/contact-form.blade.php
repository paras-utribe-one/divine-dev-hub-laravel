<x-mail::message>
# New website enquiry

**Name:** {{ $senderName }}
**Email:** {{ $senderEmail }}

**Message:**

{{ $messageBody }}

<x-mail::button :url="'mailto:' . $senderEmail">
Reply to {{ $senderName }}
</x-mail::button>

Sent from the contact form at {{ url('/contact') }}.
</x-mail::message>
