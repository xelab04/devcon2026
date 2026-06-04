<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('lets an admin create a user with a role', function () {
    $admin = User::factory()->admin()->create();

    $this->actingAs($admin)->post(route('admin.users.store'), [
        'name' => 'New Squad',
        'email' => 'new@mscc.mu',
        'role' => 'squad',
        'password' => 'password123',
        'password_confirmation' => 'password123',
    ])->assertRedirect(route('admin.users.index'));

    $this->assertDatabaseHas('users', ['email' => 'new@mscc.mu', 'role' => 'squad']);
});

it('forbids squad members from managing users', function () {
    $squad = User::factory()->squad()->create();

    $this->actingAs($squad)->get(route('admin.users.index'))->assertForbidden();
    $this->actingAs($squad)->get(route('admin.users.create'))->assertForbidden();
});

it('lets an admin change a user role', function () {
    $admin = User::factory()->admin()->create();
    $user = User::factory()->squad()->create();

    $this->actingAs($admin)->put(route('admin.users.update', $user), [
        'name' => $user->name,
        'email' => $user->email,
        'role' => 'admin',
    ])->assertRedirect(route('admin.users.index'));

    expect($user->fresh()->isAdmin())->toBeTrue();
});

it('prevents deleting your own account', function () {
    $admin = User::factory()->admin()->create();

    $this->actingAs($admin)->delete(route('admin.users.destroy', $admin))
        ->assertSessionHas('error');

    $this->assertDatabaseHas('users', ['id' => $admin->id]);
});

it('lets an admin delete another user', function () {
    $admin = User::factory()->admin()->create();
    $other = User::factory()->squad()->create();

    $this->actingAs($admin)->delete(route('admin.users.destroy', $other))
        ->assertSessionHas('success');

    $this->assertDatabaseMissing('users', ['id' => $other->id]);
});
