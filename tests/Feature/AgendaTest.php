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

it('shows the static panelists block on the sovereignty panel session', function () {
    \Illuminate\Support\Facades\Storage::disk('local')->put('sessionize/sessions.json', json_encode([
        [
            'date' => '2026-07-24T00:00:00',
            'isDefault' => false,
            'rooms' => [
                [
                    'id' => 74750,
                    'name' => 'Educator 1',
                    'sessions' => [
                        [
                            'id' => '1167895',
                            'title' => 'Panel Discussion — Sovereign by Design',
                            'description' => 'Panel on data, cloud and AI sovereignty.',
                            'startsAt' => '2026-07-24T11:00:00',
                            'endsAt' => '2026-07-24T13:00:00',
                            'room' => 'Educator 1',
                            'roomId' => 74750,
                            'isPlenumSession' => true,
                            'isServiceSession' => false,
                            'speakers' => [],
                        ],
                    ],
                ],
            ],
        ],
    ]));

    $this->get(route('session', '1167895'))
        ->assertOk()
        ->assertSee('Panelists')
        ->assertSee('Anousha Sathan')
        ->assertSee('CEO, Currimjee Informatics')
        ->assertSee('Dylan Harbour')
        ->assertSee('Director of Technology, Ringier South Africa')
        ->assertSee('Naveesh Doolhur')
        ->assertSee('Head of Innovation, Mauritius Telecom')
        ->assertSee('Dante Sassenberg')
        ->assertSee('Head of Pentesting, Integrity360')
        ->assertSee('images/panelists/anousha-sathan.png');
});

it('does not show a panelists block on other sessions', function () {
    $this->get(route('session', '1001'))
        ->assertOk()
        ->assertDontSee('Panelists');
});
