<?php

use App\Mail\CheckedInMail;
use App\Mail\RegistrationConfirmationMail;
use App\Models\Registration;

it('omits Reply-To when MAIL_REPLY_TO_ADDRESS is not set', function () {
    config(['mail.reply_to.address' => null]);

    $registration = Registration::factory()->make();

    expect((new RegistrationConfirmationMail($registration))->replyTo)->toBe([]);
    expect((new CheckedInMail($registration))->replyTo)->toBe([]);
});

it('adds exactly one Reply-To when configured', function () {
    config([
        'mail.reply_to.address' => 'hello@mscc.mu',
        'mail.reply_to.name' => 'MSCC DevCon',
    ]);

    $registration = Registration::factory()->make();

    $replyTo = (new RegistrationConfirmationMail($registration))->replyTo;
    expect($replyTo)->toHaveCount(1)
        ->and($replyTo[0]['address'])->toBe('hello@mscc.mu')
        ->and($replyTo[0]['name'])->toBe('MSCC DevCon');

    $replyTo = (new CheckedInMail($registration))->replyTo;
    expect($replyTo)->toHaveCount(1)
        ->and($replyTo[0]['address'])->toBe('hello@mscc.mu')
        ->and($replyTo[0]['name'])->toBe('MSCC DevCon');
});

it('keeps Reply-To off the Envelope so the send lifecycle cannot duplicate it', function () {
    // Regression guard: Envelope::replyTo is reapplied to $this->replyTo every
    // time Laravel hydrates the envelope. Reintroducing replyTo here would
    // produce duplicate Reply-To headers — keep it empty.
    config([
        'mail.reply_to.address' => 'hello@mscc.mu',
        'mail.reply_to.name' => 'MSCC DevCon',
    ]);

    $registration = Registration::factory()->make();

    expect((new RegistrationConfirmationMail($registration))->envelope()->replyTo)->toBe([]);
    expect((new CheckedInMail($registration))->envelope()->replyTo)->toBe([]);
});
