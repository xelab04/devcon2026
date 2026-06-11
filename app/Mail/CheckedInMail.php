<?php

namespace App\Mail;

use App\Mail\Concerns\UsesConfiguredReplyTo;
use App\Models\Registration;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CheckedInMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels, UsesConfiguredReplyTo;

    public function __construct(public Registration $registration) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: "You're checked in at DevCon 2026",
            replyTo: $this->configuredReplyTo(),
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.checked-in',
            with: [
                'registration' => $this->registration,
            ],
        );
    }
}
