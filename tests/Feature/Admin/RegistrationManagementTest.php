<?php

use App\Mail\CheckedInMail;
use App\Models\Registration;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;

uses(RefreshDatabase::class);

it('shows full registration details to an admin', function () {
    $admin = User::factory()->admin()->create();
    Registration::factory()->create([
        'first_name' => 'Grace',
        'last_name' => 'Hopper',
        'phone' => '+230 5999 0000',
        'job_title' => 'Rear Admiral',
        'organisation' => 'US Navy',
    ]);

    $this->actingAs($admin)->get(route('admin.registrations.index'))
        ->assertOk()
        ->assertSee('Grace')
        ->assertSee('+230 5999 0000')
        ->assertSee('Export CSV');
});

it('limits squad to the allowed columns and hides export', function () {
    $squad = User::factory()->squad()->create();
    Registration::factory()->create([
        'first_name' => 'Grace',
        'last_name' => 'Hopper',
        'phone' => '+230 5999 0000',
        'job_title' => 'Rear Admiral',
        'organisation' => 'US Navy',
    ]);

    $response = $this->actingAs($squad)->get(route('admin.registrations.index'))->assertOk();

    $response->assertSee('Grace');        // first name — allowed
    $response->assertSee('US Navy');      // organisation — allowed
    $response->assertDontSee('+230 5999 0000'); // phone — not allowed
    $response->assertDontSee('Rear Admiral');   // job title — not allowed
    $response->assertDontSee('Export CSV');     // export — admin only
});

it('checks in an attendee and queues the checked-in email', function () {
    Mail::fake();
    $squad = User::factory()->squad()->create();
    $registration = Registration::factory()->notCheckedIn()->create();

    $this->actingAs($squad)->post(route('admin.registrations.check-in', $registration))
        ->assertRedirect();

    expect($registration->fresh()->checked_in)->toBeTrue()
        ->and($registration->fresh()->checked_in_at)->not->toBeNull();

    Mail::assertQueued(CheckedInMail::class);
});

it('undoes a check-in without sending an email', function () {
    Mail::fake();
    $admin = User::factory()->admin()->create();
    $registration = Registration::factory()->checkedIn()->create();

    $this->actingAs($admin)->post(route('admin.registrations.cancel-check-in', $registration))
        ->assertRedirect();

    expect($registration->fresh()->checked_in)->toBeFalse()
        ->and($registration->fresh()->checked_in_at)->toBeNull();

    Mail::assertNothingQueued();
});

it('lets an admin export registrations as CSV', function () {
    $admin = User::factory()->admin()->create();
    Registration::factory()->count(3)->create();

    $response = $this->actingAs($admin)->get(route('admin.registrations.export'));

    $response->assertOk();
    expect($response->headers->get('content-type'))->toContain('text/csv');
});

it('forbids squad from exporting CSV', function () {
    $squad = User::factory()->squad()->create();

    $this->actingAs($squad)->get(route('admin.registrations.export'))->assertForbidden();
});

it('forbids squad from viewing the dashboard', function () {
    $squad = User::factory()->squad()->create();

    $this->actingAs($squad)->get(route('admin.dashboard'))->assertForbidden();
});
