<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Throwable;

class PullSessionizeData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sessionize:pull';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Pull speakers and sessions from the Sessionize API, cache them privately, and download speaker profile pictures locally';

    /**
     * The private (untracked) disk that stores the raw and processed JSON.
     */
    private const DISK = 'local';

    /**
     * The directory, relative to the disk root, that holds the cached JSON files.
     */
    private const STORAGE_DIRECTORY = 'sessionize';

    /**
     * The public (untracked) directory that holds the downloaded profile pictures.
     */
    private const PUBLIC_DIRECTORY = 'speakers/profile-pictures';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $endpointId = config('services.sessionize.endpoint_id');

        if (blank($endpointId)) {
            $this->error('No Sessionize endpoint id is configured (services.sessionize.endpoint_id).');

            return self::FAILURE;
        }

        $baseUrl = "https://sessionize.com/api/v2/{$endpointId}/view";

        $speakers = $this->fetch("{$baseUrl}/Speakers", 'speakers-sessionize.json');

        if (! is_array($speakers)) {
            return self::FAILURE;
        }

        // The GridSmart view returns the full schedule grid (talks plus keynotes,
        // breaks and other service sessions) grouped by day and room.
        if ($this->fetch("{$baseUrl}/GridSmart", 'sessions.json') === null) {
            return self::FAILURE;
        }

        $speakers = $this->downloadProfilePictures($speakers);

        Storage::disk(self::DISK)->put(
            self::STORAGE_DIRECTORY.'/speakers.json',
            json_encode($speakers, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE),
        );

        $this->info('Done. Cached '.count($speakers).' speakers and their sessions.');

        return self::SUCCESS;
    }

    /**
     * Fetch a Sessionize view, store the raw response privately, and return the decoded payload.
     */
    private function fetch(string $url, string $filename): ?array
    {
        $this->line("Fetching {$url}…");

        try {
            $response = Http::timeout(60)->retry(2, 500, throw: false)->get($url);
        } catch (Throwable $exception) {
            $this->error("Request to {$url} failed: {$exception->getMessage()}");

            return null;
        }

        if ($response->failed()) {
            $this->error("Request to {$url} failed (HTTP {$response->status()}).");

            return null;
        }

        Storage::disk(self::DISK)->put(self::STORAGE_DIRECTORY."/{$filename}", $response->body());

        return $response->json();
    }

    /**
     * Download each speaker's profile picture into the public directory and rewrite the
     * profilePicture field to point at the local copy.
     *
     * @param  array<int, array<string, mixed>>  $speakers
     * @return array<int, array<string, mixed>>
     */
    private function downloadProfilePictures(array $speakers): array
    {
        $directory = public_path(self::PUBLIC_DIRECTORY);
        File::ensureDirectoryExists($directory);

        $this->info('Downloading profile pictures…');
        $bar = $this->output->createProgressBar(count($speakers));
        $bar->start();

        foreach ($speakers as $index => $speaker) {
            $bar->advance();

            $url = $speaker['profilePicture'] ?? null;

            if (blank($url) || blank($speaker['id'] ?? null)) {
                continue;
            }

            $extension = strtolower(pathinfo(parse_url($url, PHP_URL_PATH) ?? '', PATHINFO_EXTENSION)) ?: 'jpg';
            $filename = "{$speaker['id']}.{$extension}";

            try {
                $response = Http::timeout(60)->get($url);
            } catch (Throwable $exception) {
                $response = null;
            }

            if ($response === null || $response->failed()) {
                $this->newLine();
                $this->warn("Could not download picture for {$speaker['fullName']} — keeping the remote URL.");

                continue;
            }

            File::put("{$directory}/{$filename}", $response->body());

            $speakers[$index]['profilePicture'] = '/'.self::PUBLIC_DIRECTORY."/{$filename}";
        }

        $bar->finish();
        $this->newLine();

        return $speakers;
    }
}
