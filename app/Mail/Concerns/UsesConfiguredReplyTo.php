<?php

namespace App\Mail\Concerns;

trait UsesConfiguredReplyTo
{
    /**
     * Add the configured Reply-To address (if MAIL_REPLY_TO_ADDRESS is set)
     * to the Mailable's $replyTo array. Intended to be called once from a
     * Mailable's constructor, before the job is queued — setting it here
     * avoids the duplicate Reply-To header that Envelope::replyTo can cause
     * if Laravel re-hydrates the envelope across dispatch and queue
     * processing.
     */
    protected function applyConfiguredReplyTo(): void
    {
        $address = config('mail.reply_to.address');

        if (empty($address)) {
            return;
        }

        $this->replyTo($address, config('mail.reply_to.name'));
    }
}
