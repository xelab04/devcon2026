<?php

beforeEach(function () {
    fakeSessionize();
});

it('lists all speakers', function () {
    $this->get(route('speakers'))
        ->assertOk()
        ->assertSee('Ada Lovelace')
        ->assertSee('Alan Turing')
        ->assertSee('First Programmer')
        ->assertSee(route('speaker', 'spk-ada'));
});

it('shows a single speaker with bio, links, and sessions', function () {
    $this->get(route('speaker', 'spk-ada'))
        ->assertOk()
        ->assertSee('Ada Lovelace')
        ->assertSee('First Programmer')
        ->assertSee('Pioneer of computing.')
        ->assertSee('linkedin.com/in/ada', false)
        ->assertSee('Analytical Engines')
        ->assertSee(route('session', 1001));
});

it('returns 404 for an unknown speaker', function () {
    $this->get(route('speaker', 'does-not-exist'))->assertNotFound();
});
