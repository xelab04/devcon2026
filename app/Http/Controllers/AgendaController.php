<?php

namespace App\Http\Controllers;

use App\Support\Sessionize;
use Illuminate\View\View;

class AgendaController extends Controller
{
    public function index(Sessionize $sessionize): View
    {
        return view('agenda.index', [
            'title' => 'Agenda — MSCC DevCon 2026',
            'schedule' => $sessionize->schedule(),
            'photos' => $sessionize->speakerPhotos(),
        ]);
    }

    public function show(Sessionize $sessionize, string $id): View
    {
        $session = $sessionize->session($id);

        abort_if($session === null, 404);

        $speakers = collect($session['speakers'] ?? [])
            ->map(fn (array $speaker): array => $sessionize->speaker($speaker['id']) ?? $speaker)
            ->all();

        return view('agenda.show', [
            'title' => $session['title'].' — MSCC DevCon 2026',
            'session' => $session,
            'speakers' => $speakers,
            'roomLabel' => $sessionize->roomLabelFor($session),
            'panelists' => $this->panelistsFor($id),
        ]);
    }

    /**
     * Static panel line-ups keyed by session id. Panelists are not Sessionize
     * speakers, so their names, titles and photos are maintained here.
     *
     * @return array<int, array{name: string, title: string, photo: string}>
     */
    protected function panelistsFor(string $id): array
    {
        return match ($id) {
            '1167895' => [
                ['name' => 'Anousha Mahadea', 'title' => 'CEO, Currimjee Informatics', 'photo' => 'anousha-mahadea.png'],
                ['name' => 'Dylan Harbour', 'title' => 'Director of Technology, Ringier South Africa', 'photo' => 'dylan-harbour.png'],
                ['name' => 'Naveesh Doolhur', 'title' => 'Head of AI & Data Analytics, Mauritius Telecom', 'photo' => 'naveesh-doolhur.png'],
                ['name' => 'Dante Sassenberg', 'title' => 'Head of Pentesting, Integrity360', 'photo' => 'dante-sassenberg.png'],
            ],
            default => [],
        };
    }
}
