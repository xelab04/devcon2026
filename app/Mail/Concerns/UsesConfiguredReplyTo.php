<?php

namespace App\Mail\Concerns;

use Illuminate\Mail\Mailables\Address;

trait UsesConfiguredReplyTo
{
    /**
     * Returns the configured Reply-To address as a single-element array
     * (or an empty array when MAIL_REPLY_TO_ADDRESS is unset), shaped for
     * passing to Envelope::replyTo.
     *
     * @return array<int, Address>
     */
    protected function configuredReplyTo(): array
    {
        $address = config('mail.reply_to.address');

        if (empty($address)) {
            return [];
        }

        return [new Address($address, config('mail.reply_to.name'))];
    }
}
