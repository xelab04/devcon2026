<?php

/*
|--------------------------------------------------------------------------
| Test Case
|--------------------------------------------------------------------------
|
| The closure you provide to your test functions is always bound to a specific PHPUnit test
| case class. By default, that class is "PHPUnit\Framework\TestCase". Of course, you may
| need to change it using the "pest()" function to bind a different classes or traits.
|
*/

pest()->extend(Tests\TestCase::class)
 // ->use(Illuminate\Foundation\Testing\RefreshDatabase::class)
    ->in('Feature');

/*
|--------------------------------------------------------------------------
| Expectations
|--------------------------------------------------------------------------
|
| When you're writing tests, you often need to check that values meet certain conditions. The
| "expect()" function gives you access to a set of "expectations" methods that you can use
| to assert different things. Of course, you may extend the Expectation API at any time.
|
*/

expect()->extend('toBeOne', function () {
    return $this->toBe(1);
});

/*
|--------------------------------------------------------------------------
| Functions
|--------------------------------------------------------------------------
|
| While Pest is very powerful out-of-the-box, you may have some testing code specific to your
| project that you don't want to repeat in every file. Here you can also expose helpers as
| global functions to help you to reduce the number of lines of code in your test files.
|
*/

function something()
{
    // ..
}

/**
 * Fake the private "local" disk and seed it with Sessionize fixtures so the
 * speakers and agenda pages can be exercised without the real downloaded data.
 */
function fakeSessionize(): void
{
    \Illuminate\Support\Facades\Storage::fake('local');

    \Illuminate\Support\Facades\Storage::disk('local')->put('sessionize/speakers.json', json_encode([
        [
            'id' => 'spk-ada',
            'fullName' => 'Ada Lovelace',
            'tagLine' => 'First Programmer',
            'bio' => "Pioneer of computing.\nWrote the first algorithm.",
            'profilePicture' => '/images/speakers/spk-ada.jpg',
            'links' => [
                ['title' => 'LinkedIn', 'url' => 'https://linkedin.com/in/ada', 'linkType' => 'LinkedIn'],
            ],
            'sessions' => [['id' => 1001, 'name' => 'Analytical Engines']],
        ],
        [
            'id' => 'spk-alan',
            'fullName' => 'Alan Turing',
            'tagLine' => 'Computer Scientist',
            'bio' => 'Father of theoretical computer science.',
            'profilePicture' => '/images/speakers/spk-alan.jpg',
            'links' => [],
            'sessions' => [['id' => 1002, 'name' => 'On Computable Numbers']],
        ],
    ]));

    \Illuminate\Support\Facades\Storage::disk('local')->put('sessionize/sessions.json', json_encode([
        [
            'date' => '2026-07-23T00:00:00',
            'isDefault' => true,
            'rooms' => [
                [
                    'id' => 1,
                    'name' => 'Educator 1',
                    'sessions' => [
                        [
                            'id' => 'plenum-1',
                            'title' => 'Opening Keynote',
                            'description' => 'Welcome to DevCon 2026.',
                            'startsAt' => '2026-07-23T09:00:00',
                            'endsAt' => '2026-07-23T10:00:00',
                            'room' => 'Educator 1',
                            'roomId' => 1,
                            'isPlenumSession' => true,
                            'isServiceSession' => true,
                            'speakers' => [],
                        ],
                        [
                            'id' => '1001',
                            'title' => 'Analytical Engines',
                            'description' => "A deep dive into mechanical computation.\nBring your gears.",
                            'startsAt' => '2026-07-23T11:00:00',
                            'endsAt' => '2026-07-23T12:00:00',
                            'room' => 'Educator 1',
                            'roomId' => 1,
                            'isPlenumSession' => false,
                            'isServiceSession' => false,
                            'speakers' => [['id' => 'spk-ada', 'name' => 'Ada Lovelace']],
                        ],
                    ],
                ],
                [
                    'id' => 2,
                    'name' => 'Educator 2',
                    'sessions' => [
                        [
                            'id' => '2001',
                            'title' => 'Rust in Practice',
                            'description' => 'Fearless concurrency.',
                            'startsAt' => '2026-07-23T11:00:00',
                            'endsAt' => '2026-07-23T12:00:00',
                            'room' => 'Educator 2',
                            'roomId' => 2,
                            'isPlenumSession' => false,
                            'isServiceSession' => false,
                            'speakers' => [],
                        ],
                    ],
                ],
            ],
            'timeSlots' => [],
        ],
        [
            'date' => '2026-07-24T00:00:00',
            'isDefault' => false,
            'rooms' => [
                [
                    'id' => 2,
                    'name' => 'Educator 2',
                    'sessions' => [
                        [
                            'id' => '1002',
                            'title' => 'On Computable Numbers',
                            'description' => 'Halting problems and beyond.',
                            'startsAt' => '2026-07-24T11:00:00',
                            'endsAt' => '2026-07-24T12:00:00',
                            'room' => 'Educator 2',
                            'roomId' => 2,
                            'isPlenumSession' => false,
                            'isServiceSession' => false,
                            'speakers' => [['id' => 'spk-alan', 'name' => 'Alan Turing']],
                        ],
                    ],
                ],
            ],
            'timeSlots' => [],
        ],
    ]));
}
