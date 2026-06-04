@extends('layouts.main')

@section('content')
{{-- Dark header band --}}
<section class="relative bg-midnight pt-32 pb-20 px-4">
    <div class="text-center">
        <span class="section-eyebrow">DevCon 2026</span>
        <h1 class="font-varsity text-paper text-5xl md:text-7xl mt-3 tracking-wider">AGENDA</h1>
        <p class="mt-6 text-paper/70 text-lg max-w-2xl mx-auto">
            The full schedule of talks across every track and day.
        </p>
    </div>
</section>

<section class="py-16 md:py-20 px-4 bg-paper">
    <div class="max-w-7xl mx-auto">
        @if (empty($schedule))
            <p class="text-center text-ink-muted">The schedule will be published soon.</p>
        @else
            <div x-data="{ day: '{{ $schedule[0]['date'] }}' }">
                {{-- Day selector --}}
                <div class="flex flex-wrap justify-center gap-3">
                    @foreach ($schedule as $day)
                        <button type="button" @click="day = '{{ $day['date'] }}'"
                            :class="day === '{{ $day['date'] }}' ? 'bg-midnight text-paper border-midnight' : 'bg-paper-soft text-ink-muted border-rule hover:text-ink'"
                            class="px-5 py-2.5 rounded-lg font-devcon text-sm border transition-colors">
                            {{ $day['label'] }}
                        </button>
                    @endforeach
                </div>

                {{-- Per-day grid (rooms across, time down). Scrolls horizontally on small screens. --}}
                @foreach ($schedule as $day)
                    <div x-show="day === '{{ $day['date'] }}'" x-cloak class="mt-10 overflow-x-auto">
                        <div class="min-w-[44rem] grid gap-3" style="grid-template-columns: 4.5rem repeat({{ count($day['rooms']) }}, minmax(0, 1fr));">
                            {{-- Header row: empty time corner + room names --}}
                            <div></div>
                            @foreach ($day['rooms'] as $room)
                                <div class="text-center font-devcon text-xs md:text-sm uppercase tracking-wide bg-midnight text-paper rounded-lg py-3 px-2 flex items-center justify-center">
                                    {{ $room }}
                                </div>
                            @endforeach

                            {{-- One row per time slot; plenum sessions span the combined Educator hall --}}
                            @foreach ($day['rows'] as $row)
                                <div class="text-right pr-2 pt-3 font-digital text-sm text-ink-subtle">{{ $row['slot'] }}</div>
                                @foreach ($row['cells'] as $cell)
                                    @php($session = $cell['session'])
                                    @php($isPlenum = $session && ($session['isPlenumSession'] ?? false))
                                    <div @style(['grid-column: span '.$cell['span'].' / span '.$cell['span'] => $cell['span'] > 1])>
                                        @if ($session)
                                            <a href="{{ route('session', $session['id']) }}"
                                                class="block h-full rounded-lg border p-3 transition-all duration-200 ease-out hover:-translate-y-0.5 {{ $isPlenum ? 'border-gold/50 bg-gold/5 hover:border-gold' : 'border-rule bg-paper hover:border-gold' }}">
                                                <div class="flex items-center justify-between gap-2">
                                                    <span class="text-xs text-gold font-medium">{{ substr($session['startsAt'], 11, 5) }} – {{ substr($session['endsAt'], 11, 5) }}</span>
                                                    @if ($cell['span'] > 1)
                                                        <span class="text-[0.65rem] uppercase tracking-wide text-ink-subtle">{{ $cell['roomLabel'] }}</span>
                                                    @endif
                                                </div>
                                                <h3 class="font-devcon text-sm mt-1 leading-snug text-ink">{{ $session['title'] }}</h3>
                                                @if (! empty($session['speakers']))
                                                    <div class="mt-2 flex flex-col gap-1.5">
                                                        @foreach ($session['speakers'] as $sp)
                                                            <span class="inline-flex items-center gap-1.5 text-xs text-ink-muted">
                                                                @if (! empty($photos[$sp['id']]))
                                                                    <img src="{{ $photos[$sp['id']] }}" alt="{{ $sp['name'] }}" class="w-6 h-6 rounded-full object-cover flex-shrink-0" loading="lazy" />
                                                                @endif
                                                                {{ $sp['name'] }}
                                                            </span>
                                                        @endforeach
                                                    </div>
                                                @endif
                                            </a>
                                        @endif
                                    </div>
                                @endforeach
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</section>
@endsection
