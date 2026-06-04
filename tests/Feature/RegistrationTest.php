<?php

use App\Mail\RegistrationConfirmationMail;
use App\Models\Registration;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;

uses(RefreshDatabase::class);

function validRegistrationData(array $overrides = []): array
{
    return array_merge([
        'first_name' => 'Ada',
        'last_name' => 'Lovelace',
        'email' => 'ada@example.com',
        'phone' => '+230 5123 4567',
        'gender' => 'F',
        'affiliation_type' => 'professional',
        'organisation' => 'Analytical Engines Ltd',
        'job_title' => 'Engineer',
        'first_time' => '1',
        'attending_reason' => 'attend_sessions',
        'consent' => '1',
    ], $overrides);
}

it('shows the registration form', function () {
    $this->get(route('register'))
        ->assertOk()
        ->assertSee('Complete registration');
});

it('registers a new attendee and queues the confirmation email', function () {
    Mail::fake();

    $this->post(route('register.store'), validRegistrationData())
        ->assertRedirect(route('register'))
        ->assertSessionHas('success');

    $this->assertDatabaseHas('registrations', [
        'email' => 'ada@example.com',
        'checked_in' => false,
    ]);

    Mail::assertQueued(RegistrationConfirmationMail::class, fn ($mail) => $mail->hasTo('ada@example.com'));
});

it('rejects a duplicate email and does not create a second registration', function () {
    Mail::fake();
    Registration::factory()->create(['email' => 'ada@example.com']);

    $this->post(route('register.store'), validRegistrationData())
        ->assertRedirect(route('register'))
        ->assertSessionHas('warning');

    expect(Registration::query()->where('email', 'ada@example.com')->count())->toBe(1);
    Mail::assertNothingQueued();
});

it('requires the consent checkbox', function () {
    $this->post(route('register.store'), validRegistrationData(['consent' => null]))
        ->assertSessionHasErrors('consent');
});

it('validates that all fields are required', function () {
    $this->post(route('register.store'), [])
        ->assertSessionHasErrors([
            'first_name', 'last_name', 'email', 'phone', 'gender',
            'affiliation_type', 'organisation', 'job_title',
            'first_time', 'attending_reason', 'consent',
        ]);
});
