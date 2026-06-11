<?php

use App\Mail\CheckedInMail;
use App\Mail\RegistrationConfirmationMail;
use App\Models\Registration;

it('omits Reply-To when MAIL_REPLY_TO_ADDRESS is not set', function () {
    config(['mail.reply_to.address' => null]);

    $registration = Registration::factory()->make();

    expect((new RegistrationConfirmationMail($registration))->envelope()->replyTo)->toBe([]);
    expect((new CheckedInMail($registration))->envelope()->replyTo)->toBe([]);
});

it('uses the configured Reply-To address and name on both Mailables', function () {
    config([
        'mail.reply_to.address' => 'hello@mscc.mu',
        'mail.reply_to.name' => 'MSCC DevCon',
    ]);

    $registration = Registration::factory()->make();

    $replyTo = (new RegistrationConfirmationMail($registration))->envelope()->replyTo;
    expect($replyTo)->toHaveCount(1)
        ->and($replyTo[0]->address)->toBe('hello@mscc.mu')
        ->and($replyTo[0]->name)->toBe('MSCC DevCon');

    $replyTo = (new CheckedInMail($registration))->envelope()->replyTo;
    expect($replyTo)->toHaveCount(1)
        ->and($replyTo[0]->address)->toBe('hello@mscc.mu')
        ->and($replyTo[0]->name)->toBe('MSCC DevCon');
});
