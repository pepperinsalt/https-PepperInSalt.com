<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;

class ContactInquiry extends Mailable
{
    public function __construct(
        public readonly string $senderName,
        public readonly string $senderEmail,
        public readonly ?string $service,
        public readonly ?string $budget,
        public readonly string $message,
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('no-reply@pepperinsalt.com', 'Pepper in Salt'),
            replyTo: [new Address($this->senderEmail, $this->senderName)],
            subject: "pepperinsalt.com inquiry from {$this->senderName}",
        );
    }

    public function content(): Content
    {
        return new Content(view: 'emails.contact-inquiry');
    }
}
