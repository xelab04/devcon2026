@extends('layouts.main')

@section('content')
{{-- Dark header band with the session title and meta --}}
<section class="relative bg-midnight pt-32 pb-20 px-4">
    <div class="max-w-3xl mx-auto text-center">
        <span class="section-eyebrow">Session</span>
        <h1 class="font-devcon text-paper text-3xl md:text-5xl mt-3 leading-tight">{{ $session['title'] }}</h1>
        <div class="mt-5 flex flex-wrap justify-center gap-x-6 gap-y-2 text-paper/70 text-sm">
            @if (! empty($session['startsAt']))
                <span><i class="fa-regular fa-calendar mr-1.5"></i>{{ \Illuminate\Support\Carbon::parse($session['startsAt'])->format('l j F') }}</span>
                <span><i class="fa-regular fa-clock mr-1.5"></i>{{ substr($session['startsAt'], 11, 5) }} – {{ substr($session['endsAt'], 11, 5) }}</span>
            @endif
            @if (! empty($roomLabel))
                <span><i class="fa-solid fa-location-dot mr-1.5"></i>{{ $roomLabel }}</span>
            @endif
            @if ($session['isPlenumSession'] ?? false)
                <span><i class="fa-solid fa-users mr-1.5"></i>Plenary session</span>
            @endif
        </div>
    </div>
</section>

<section class="py-16 md:py-20 px-4 bg-paper">
    <div class="max-w-3xl mx-auto">
        <a href="{{ route('agenda') }}" class="inline-flex items-center gap-2 text-sm text-ink-muted hover:text-gold transition-colors">
            <i class="fa-solid fa-arrow-left"></i> Back to agenda
        </a>

        @if (! empty($session['description']))
            <div class="mt-8 text-ink leading-relaxed">{!! nl2br(e($session['description'])) !!}</div>
        @endif

        @if (! empty($panelists))
            <h2 class="font-devcon text-2xl mt-12">Panelists</h2>
            <div class="mt-6 grid grid-cols-2 md:grid-cols-4 gap-x-4 gap-y-8">
                @foreach ($panelists as $panelist)
                    <figure class="text-center">
                        <img src="{{ asset('images/panelists/'.$panelist['photo']) }}" alt="{{ $panelist['name'] }}"
                             class="w-24 h-24 md:w-28 md:h-28 mx-auto rounded-full object-cover shadow-md" loading="lazy" />
                        <figcaption class="mt-3">
                            <div class="font-devcon text-ink leading-tight">{{ $panelist['name'] }}</div>
                            <div class="mt-1 text-xs md:text-sm text-ink-muted leading-snug">{{ $panelist['title'] }}</div>
                        </figcaption>
                    </figure>
                @endforeach
            </div>
        @endif

        @if (! empty($speakers))
            <h2 class="font-devcon text-2xl mt-12">{{ count($speakers) > 1 ? 'Speakers' : 'Speaker' }}</h2>
            <div class="mt-4 space-y-4">
                @foreach ($speakers as $sp)
                    <a href="{{ ! empty($sp['id']) ? route('speaker', $sp['id']) : '#' }}" class="flex items-center gap-4 admin-card p-4 hover:border-gold transition-colors">
                        <div class="w-14 h-14 rounded-full overflow-hidden bg-paper-soft border border-rule flex-shrink-0">
                            @if (! empty($sp['profilePicture']))
                                <img src="{{ $sp['profilePicture'] }}" alt="{{ $sp['fullName'] ?? ($sp['name'] ?? '') }}" class="w-full h-full object-cover" />
                            @else
                                <div class="w-full h-full flex items-center justify-center text-ink-subtle"><i class="fa-solid fa-user"></i></div>
                            @endif
                        </div>
                        <div>
                            <div class="font-devcon text-ink">{{ $sp['fullName'] ?? ($sp['name'] ?? 'Speaker') }}</div>
                            @if (! empty($sp['tagLine']))
                                <div class="text-sm text-ink-muted">{{ $sp['tagLine'] }}</div>
                            @endif
                        </div>
                    </a>
                @endforeach
            </div>
        @endif
    </div>
</section>
@endsection
