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
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class RegistrationConfirmationMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels, UsesConfiguredReplyTo;

    public function __construct(public Registration $registration)
    {
        $this->applyConfiguredReplyTo();
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Your DevCon 2026 registration is confirmed',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.registration-confirmation',
            with: [
                'registration' => $this->registration,
                'qr' => $this->buildQrCode(),
            ],
        );
    }

    /**
     * Build the check-in QR code. Prefers a PNG (best email-client support via a
     * CID attachment) and falls back to inline SVG if the imagick extension that
     * simple-qrcode needs for raster output is unavailable. Returns null if the
     * package is not installed or generation fails, so the email still sends
     * (the template then shows the check-in URL as a plain link).
     *
     * @return array{png: ?string, svg: ?string}|null
     */
    protected function buildQrCode(): ?array
    {
        if (! class_exists(QrCode::class)) {
            return null;
        }

        $url = $this->registration->checkInUrl();

        try {
            return [
                'png' => (string) QrCode::format('png')->size(220)->margin(1)->generate($url),
                'svg' => null,
            ];
        } catch (\Throwable $e) {
            \Log::warning('QR PNG generation failed; falling back to SVG', [
                'registration_id' => $this->registration->id,
                'exception' => $e::class.': '.$e->getMessage(),
            ]);

            try {
                return [
                    'png' => null,
                    'svg' => (string) QrCode::format('svg')->size(220)->margin(1)->generate($url),
                ];
            } catch (\Throwable $e) {
                \Log::error('QR generation failed (PNG and SVG)', [
                    'registration_id' => $this->registration->id,
                    'exception' => $e::class.': '.$e->getMessage(),
                ]);

                return null;
            }
        }
    }
}
