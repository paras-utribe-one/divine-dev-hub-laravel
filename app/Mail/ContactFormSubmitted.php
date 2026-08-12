<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactFormSubmitted extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public string $senderName,
        public string $senderEmail,
        public string $messageBody,
    ) {}

    public function build(): self
    {
        return $this
            ->subject("New enquiry from {$this->senderName} — Divine Dev Hub website")
            ->replyTo($this->senderEmail, $this->senderName)
            ->markdown('emails.contact-form');
    }
}
