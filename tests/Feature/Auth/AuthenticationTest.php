<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('shows the login page', function () {
    $this->get(route('login'))
        ->assertOk()
        ->assertSee('Backoffice sign in');
});

it('logs in an admin and redirects to the dashboard', function () {
    $admin = User::factory()->admin()->create();

    $this->post(route('login.store'), ['email' => $admin->email, 'password' => 'password'])
        ->assertRedirect(route('admin.dashboard'));

    $this->assertAuthenticatedAs($admin);
});

it('logs in a squad member and redirects to registrations', function () {
    $squad = User::factory()->squad()->create();

    $this->post(route('login.store'), ['email' => $squad->email, 'password' => 'password'])
        ->assertRedirect(route('admin.registrations.index'));
});

it('rejects invalid credentials', function () {
    $user = User::factory()->create();

    $this->post(route('login.store'), ['email' => $user->email, 'password' => 'wrong-password'])
        ->assertSessionHasErrors('email');

    $this->assertGuest();
});

it('logs the user out', function () {
    $user = User::factory()->create();

    $this->actingAs($user)->post(route('logout'))->assertRedirect(route('login'));

    $this->assertGuest();
});

it('requires authentication for the backoffice', function () {
    $this->get(route('admin.registrations.index'))->assertRedirect(route('login'));
});
