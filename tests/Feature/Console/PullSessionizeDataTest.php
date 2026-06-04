<?php

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

beforeEach(function () {
    Storage::fake('local');
    config()->set('services.sessionize.endpoint_id', 'testevent');
});

afterEach(function () {
    File::delete([
        public_path('speakers/profile-pictures/aaaa-1111.jpg'),
        public_path('speakers/profile-pictures/bbbb-2222.png'),
    ]);
});

function fakeSessionizeResponses(): void
{
    Http::fake([
        'sessionize.com/api/v2/*/view/Speakers' => Http::response([
            [
                'id' => 'aaaa-1111',
                'fullName' => 'Ada Lovelace',
                'profilePicture' => 'https://sessionize.com/image/ada-400o400o1-abc.jpg',
                'sessions' => [['id' => 1, 'name' => 'Analytical Engines']],
            ],
            [
                'id' => 'bbbb-2222',
                'fullName' => 'Alan Turing',
                'profilePicture' => 'https://sessionize.com/image/alan-400o400o1-def.PNG',
                'sessions' => [],
            ],
            [
                'id' => 'cccc-3333',
                'fullName' => 'Grace Hopper',
                'profilePicture' => '',
                'sessions' => [],
            ],
        ]),
        'sessionize.com/api/v2/*/view/Sessions' => Http::response([
            ['groupName' => 'Day 1', 'sessions' => [['id' => 1, 'title' => 'Analytical Engines']]],
        ]),
        'sessionize.com/image/*' => Http::response('fake-image-bytes'),
    ]);
}

it('caches both endpoints privately, downloads pictures, and rewrites paths', function () {
    fakeSessionizeResponses();

    $this->artisan('sessionize:pull')->assertSuccessful();

    Storage::disk('local')->assertExists('sessionize/speakers-sessionize.json');
    Storage::disk('local')->assertExists('sessionize/sessions.json');
    Storage::disk('local')->assertExists('sessionize/speakers.json');

    $raw = json_decode(Storage::disk('local')->get('sessionize/speakers-sessionize.json'), true);
    expect($raw[0]['profilePicture'])->toBe('https://sessionize.com/image/ada-400o400o1-abc.jpg');

    $processed = json_decode(Storage::disk('local')->get('sessionize/speakers.json'), true);
    expect($processed[0]['profilePicture'])->toBe('/speakers/profile-pictures/aaaa-1111.jpg')
        ->and($processed[1]['profilePicture'])->toBe('/speakers/profile-pictures/bbbb-2222.png')
        ->and($processed[2]['profilePicture'])->toBe('');

    expect(File::exists(public_path('speakers/profile-pictures/aaaa-1111.jpg')))->toBeTrue()
        ->and(File::exists(public_path('speakers/profile-pictures/bbbb-2222.png')))->toBeTrue();
});

it('does not request a picture for a speaker without one', function () {
    fakeSessionizeResponses();

    $this->artisan('sessionize:pull')->assertSuccessful();

    Http::assertSent(fn ($request) => $request->url() === 'https://sessionize.com/image/ada-400o400o1-abc.jpg');
    Http::assertSent(fn ($request) => $request->url() === 'https://sessionize.com/image/alan-400o400o1-def.PNG');
    Http::assertNotSent(fn ($request) => str_contains($request->url(), 'cccc-3333'));
});

it('keeps the remote url when a picture download fails', function () {
    Http::fake([
        'sessionize.com/api/v2/*/view/Speakers' => Http::response([
            [
                'id' => 'aaaa-1111',
                'fullName' => 'Ada Lovelace',
                'profilePicture' => 'https://sessionize.com/image/ada-400o400o1-abc.jpg',
                'sessions' => [],
            ],
        ]),
        'sessionize.com/api/v2/*/view/Sessions' => Http::response([]),
        'sessionize.com/image/*' => Http::response('not found', 404),
    ]);

    $this->artisan('sessionize:pull')->assertSuccessful();

    $processed = json_decode(Storage::disk('local')->get('sessionize/speakers.json'), true);
    expect($processed[0]['profilePicture'])->toBe('https://sessionize.com/image/ada-400o400o1-abc.jpg');
    expect(File::exists(public_path('speakers/profile-pictures/aaaa-1111.jpg')))->toBeFalse();
});

it('fails when a Sessionize endpoint is unreachable', function () {
    Http::fake([
        'sessionize.com/api/v2/*/view/Speakers' => Http::response('server error', 500),
    ]);

    $this->artisan('sessionize:pull')->assertFailed();

    Storage::disk('local')->assertMissing('sessionize/speakers.json');
});
