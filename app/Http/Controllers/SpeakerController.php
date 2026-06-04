<?php

namespace App\Http\Controllers;

use App\Support\Sessionize;
use Illuminate\View\View;

class SpeakerController extends Controller
{
    public function index(Sessionize $sessionize): View
    {
        return view('speakers.index', [
            'title' => 'Speakers — MSCC DevCon 2026',
            'speakers' => $sessionize->speakers(),
        ]);
    }

    public function show(Sessionize $sessionize, string $id): View
    {
        $speaker = $sessionize->speaker($id);

        abort_if($speaker === null, 404);

        return view('speakers.show', [
            'title' => $speaker['fullName'].' — MSCC DevCon 2026',
            'speaker' => $speaker,
        ]);
    }
}
