<?php

beforeEach(function () {
    fakeSessionize();
});

it('shows the agenda grouped by day and room', function () {
    $this->get(route('agenda'))
        ->assertOk()
        ->assertSee('23 July')
        ->assertSee('24 July')
        ->assertSee('Educator 1')
        ->assertSee('Educator 2')
        ->assertSee('Analytical Engines')
        ->assertSee('On Computable Numbers')
        ->assertSee('Ada Lovelace')
        ->assertSee(route('session', '1001'));
});

it('renders a plenum session spanning the combined Educator hall', function () {
    $this->get(route('agenda'))
        ->assertOk()
        ->assertSee('Opening Keynote')
        ->assertSee('Educator 1 &amp; Educator 2', false)
        ->assertSee('grid-column: span 2', false);
});

it('labels a plenum session as the combined room on its detail page', function () {
    $this->get(route('session', 'plenum-1'))
        ->assertOk()
        ->assertSee('Opening Keynote')
        ->assertSee('Educator 1 &amp; Educator 2', false)
        ->assertSee('Plenary session');
});

it('shows a single session with description and speakers', function () {
    $this->get(route('session', '1001'))
        ->assertOk()
        ->assertSee('Analytical Engines')
        ->assertSee('A deep dive into mechanical computation.')
        ->assertSee('Educator 1')
        ->assertSee('Ada Lovelace')
        ->assertSee(route('speaker', 'spk-ada'));
});

it('returns 404 for an unknown session', function () {
    $this->get(route('session', '999999'))->assertNotFound();
});
