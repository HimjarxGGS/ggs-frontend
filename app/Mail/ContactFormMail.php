<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('ggsmail@faridfarhan.my.id', 'Green Generation Surabaya'),
            replyTo: [
                new Address($this->data['email'], $this->data['name']),
            ],
            subject: '📧 New Contact Form - Green Generation',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.contact_form',
            with: ['data' => $this->data],
        );
    }

    public function attachments(): array
    {
        return [];
    }
}