<?php

namespace App\Support;

use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;

class Sessionize
{
    private const DISK = 'local';

    private const DIRECTORY = 'sessionize';

    /** @var array<int, array<string, mixed>>|null */
    private ?array $speakers = null;

    /** @var array<int, array<string, mixed>>|null */
    private ?array $sessions = null;

    /**
     * All speakers, ordered by full name.
     *
     * @return array<int, array<string, mixed>>
     */
    public function speakers(): array
    {
        if ($this->speakers === null) {
            $speakers = $this->read('speakers.json');
            usort($speakers, fn ($a, $b): int => strcasecmp($a['fullName'] ?? '', $b['fullName'] ?? ''));
            $this->speakers = $speakers;
        }

        return $this->speakers;
    }

    /**
     * @return array<string, mixed>|null
     */
    public function speaker(string $id): ?array
    {
        foreach ($this->speakers() as $speaker) {
            if ((string) ($speaker['id'] ?? '') === $id) {
                return $speaker;
            }
        }

        return null;
    }

    /**
     * A lookup of speaker id to profile picture, used to render headshots on sessions.
     *
     * @return array<string, string>
     */
    public function speakerPhotos(): array
    {
        return collect($this->speakers())
            ->pluck('profilePicture', 'id')
            ->filter()
            ->all();
    }

    /**
     * All sessions, flattened out of the Sessionize GridSmart payload
     * (an array of days, each holding rooms, each holding sessions).
     *
     * @return array<int, array<string, mixed>>
     */
    public function sessions(): array
    {
        if ($this->sessions === null) {
            $this->sessions = collect($this->read('sessions.json'))
                ->flatMap(fn (array $day): array => $day['rooms'] ?? [])
                ->flatMap(fn (array $room): array => $room['sessions'] ?? [])
                ->all();
        }

        return $this->sessions;
    }

    /**
     * @return array<string, mixed>|null
     */
    public function session(string $id): ?array
    {
        foreach ($this->sessions() as $session) {
            if ((string) ($session['id'] ?? '') === $id) {
                return $session;
            }
        }

        return null;
    }

    /**
     * Sessions organised into a per-day schedule. Each day has its room columns and
     * a list of time-slot rows; each row holds one cell per visual column. A plenum
     * session is emitted as a single cell spanning the combined Educator hall.
     *
     * @return array<int, array{date: string, label: string, rooms: array<int, string>, rows: array<int, array{slot: string, cells: array<int, array{session: array<string, mixed>|null, span: int, roomLabel: string}>}>}>
     */
    public function schedule(): array
    {
        return collect($this->sessions())
            ->filter(fn (array $session): bool => filled($session['startsAt'] ?? null) && filled($session['room'] ?? null))
            ->groupBy(fn (array $session): string => substr($session['startsAt'], 0, 10))
            ->sortKeys()
            ->map(function (Collection $sessions, string $date): array {
                $rooms = $sessions->sortBy('roomId')->pluck('room')->unique()->values()->all();
                $slots = $sessions->map(fn (array $session): string => substr($session['startsAt'], 11, 5))
                    ->unique()->sort()->values()->all();

                $sessionAt = fn (string $slot, string $room): ?array => $sessions->first(
                    fn (array $session): bool => substr($session['startsAt'], 11, 5) === $slot && $session['room'] === $room
                );

                $rows = [];
                foreach ($slots as $slot) {
                    $cells = [];
                    $index = 0;
                    while ($index < count($rooms)) {
                        $room = $rooms[$index];
                        $session = $sessionAt($slot, $room);

                        // A plenum session takes over the combined Educator hall: span it across
                        // the adjacent, otherwise-empty Educator rooms and skip their cells.
                        if ($session !== null && ($session['isPlenumSession'] ?? false) && $this->isPlenumHallRoom($room)) {
                            $covered = [$room];
                            while (($next = $rooms[$index + count($covered)] ?? null) !== null
                                && $this->isPlenumHallRoom($next)
                                && $sessionAt($slot, $next) === null) {
                                $covered[] = $next;
                            }
                            $cells[] = ['session' => $session, 'span' => count($covered), 'roomLabel' => implode(' & ', $covered)];
                            $index += count($covered);

                            continue;
                        }

                        $cells[] = ['session' => $session, 'span' => 1, 'roomLabel' => $room];
                        $index++;
                    }

                    $rows[] = ['slot' => $slot, 'cells' => $cells];
                }

                return [
                    'date' => $date,
                    'label' => Carbon::parse($date)->format('l j F'),
                    'rooms' => $rooms,
                    'rows' => $rows,
                ];
            })
            ->values()
            ->all();
    }

    /**
     * The display label for a session's room, merging the Educator rooms for plenum sessions.
     */
    public function roomLabelFor(array $session): string
    {
        if ($session['isPlenumSession'] ?? false) {
            return $this->combinedRoomLabel();
        }

        return $session['room'] ?? '';
    }

    /**
     * The combined plenary hall label, e.g. "Educator 1 & Educator 2".
     */
    public function combinedRoomLabel(): string
    {
        return collect($this->sessions())
            ->pluck('room')
            ->unique()
            ->filter(fn (?string $room): bool => $room !== null && $this->isPlenumHallRoom($room))
            ->sort()
            ->values()
            ->implode(' & ');
    }

    private function isPlenumHallRoom(string $room): bool
    {
        return str_starts_with($room, 'Educator');
    }

    /**
     * @return array<int, array<string, mixed>>
     */
    private function read(string $filename): array
    {
        $path = self::DIRECTORY.'/'.$filename;

        if (! Storage::disk(self::DISK)->exists($path)) {
            return [];
        }

        return json_decode(Storage::disk(self::DISK)->get($path), true) ?? [];
    }
}
