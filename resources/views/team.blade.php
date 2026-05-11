@extends('layouts.main')

@section('content')
{{-- Dark header band — same pattern as the placeholder pages --}}
<section class="relative bg-midnight pt-32 pb-20 px-4">
    <div class="text-center">
        <span class="section-eyebrow">DevCon 2026</span>
        <h1 class="font-varsity text-paper text-5xl md:text-7xl mt-3 tracking-wider">THE TEAM</h1>
        <p class="mt-6 text-paper/70 text-lg max-w-2xl mx-auto">
            The volunteers behind MSCC who make DevCon 2026 happen.
        </p>
    </div>
</section>

{{-- Board of Organisers --}}
<section class="py-20 md:py-24 px-4 bg-paper">
    <div class="max-w-7xl mx-auto">
        <span class="section-eyebrow">Organisers</span>
        <h2 class="font-devcon text-3xl md:text-4xl mt-2">The Organisers</h2>
        <p class="mt-3 text-ink-muted max-w-2xl">
            The core organising committee that runs MSCC year-round and steers DevCon.
        </p>

        <div class="mt-12 grid gap-8 grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5">
            @foreach ($board as $member)
                <figure class="text-center">
                    <div class="aspect-square overflow-hidden rounded-2xl bg-paper-soft border border-rule transition-transform duration-200 ease-out hover:-translate-y-1">
                        <img src="{{ asset('images/team/' . $member['photo']) }}" alt="{{ $member['name'] }}" class="w-full h-full object-cover" loading="lazy" />
                    </div>
                    <figcaption class="mt-4">
                        <div class="font-devcon text-base md:text-lg">{{ $member['name'] }}</div>
                        @if (! empty($member['links']))
                            <div class="mt-2 flex justify-center gap-3 text-ink-muted text-sm">
                                @foreach ($member['links'] as $link)
                                    <a href="{{ $link['url'] }}" target="_blank" rel="noopener noreferrer" class="hover:text-gold transition-colors" aria-label="{{ $member['name'] }} on {{ $link['label'] }}" title="{{ $link['label'] }}">
                                        <i class="fa-brands fa-{{ $link['icon'] }}"></i>
                                    </a>
                                @endforeach
                            </div>
                        @endif
                    </figcaption>
                </figure>
            @endforeach
        </div>
    </div>
</section>

{{-- Squad --}}
<section class="py-20 md:py-24 px-4 bg-paper-soft border-t border-rule">
    <div class="max-w-7xl mx-auto">
        <span class="section-eyebrow">Squad</span>
        <h2 class="font-devcon text-3xl md:text-4xl mt-2">MSCC Squad</h2>
        <p class="mt-3 text-ink-muted max-w-2xl">
            The volunteer crew running logistics, sponsors, sessions, and everything in between.
        </p>

        <div class="mt-12 grid gap-8 grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5">
            @foreach ($squad as $member)
                <figure class="text-center">
                    <div class="aspect-square overflow-hidden rounded-2xl bg-paper border border-rule transition-transform duration-200 ease-out hover:-translate-y-1">
                        <img src="{{ asset('images/team/' . $member['photo']) }}" alt="{{ $member['name'] }}" class="w-full h-full object-cover" loading="lazy" />
                    </div>
                    <figcaption class="mt-4">
                        <div class="font-devcon text-base md:text-lg">{{ $member['name'] }}</div>
                        @if (! empty($member['links']))
                            <div class="mt-2 flex justify-center gap-3 text-ink-muted text-sm">
                                @foreach ($member['links'] as $link)
                                    <a href="{{ $link['url'] }}" target="_blank" rel="noopener noreferrer" class="hover:text-gold transition-colors" aria-label="{{ $member['name'] }} on {{ $link['label'] }}" title="{{ $link['label'] }}">
                                        <i class="fa-brands fa-{{ $link['icon'] }}"></i>
                                    </a>
                                @endforeach
                            </div>
                        @endif
                    </figcaption>
                </figure>
            @endforeach
        </div>
    </div>
</section>
@endsection
