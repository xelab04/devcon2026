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
        ]);
    }
}
