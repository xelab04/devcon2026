@extends('layouts.main')

@section('content')
{{-- Dark header band — same pattern as the team page --}}
<section class="relative bg-midnight pt-32 pb-20 px-4">
    <div class="text-center">
        <span class="section-eyebrow">DevCon 2026</span>
        <h1 class="font-varsity text-paper text-5xl md:text-7xl mt-3 tracking-wider">SPEAKERS</h1>
        <p class="mt-6 text-paper/70 text-lg max-w-2xl mx-auto">
            Meet the developers, engineers, and makers taking the stage at DevCon 2026.
        </p>
    </div>
</section>

<section class="py-20 md:py-24 px-4 bg-paper">
    <div class="max-w-7xl mx-auto">
        @if (empty($speakers))
            <p class="text-center text-ink-muted">Speakers will be announced soon — check back shortly.</p>
        @else
            <div class="grid gap-8 grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5">
                @foreach ($speakers as $speaker)
                    <a href="{{ route('speaker', $speaker['id']) }}" class="group text-center">
                        <div class="aspect-square overflow-hidden rounded-full bg-paper-soft border border-rule transition-transform duration-200 ease-out group-hover:-translate-y-1">
                            @if (! empty($speaker['profilePicture']))
                                <img src="{{ $speaker['profilePicture'] }}" alt="{{ $speaker['fullName'] }}" class="w-full h-full object-cover" loading="lazy" />
                            @else
                                <div class="w-full h-full flex items-center justify-center text-ink-subtle">
                                    <i class="fa-solid fa-user text-3xl"></i>
                                </div>
                            @endif
                        </div>
                        <figcaption class="mt-4">
                            <div class="font-devcon text-base md:text-lg group-hover:text-gold transition-colors">{{ $speaker['fullName'] }}</div>
                            @if (! empty($speaker['tagLine']))
                                <div class="mt-1 text-sm text-ink-muted">{{ $speaker['tagLine'] }}</div>
                            @endif
                        </figcaption>
                    </a>
                @endforeach
            </div>
        @endif
    </div>
</section>
@endsection
