@extends('layouts.main')

@php
    $linkIcons = [
        'Twitter' => 'fa-brands fa-x-twitter',
        'LinkedIn' => 'fa-brands fa-linkedin-in',
        'Facebook' => 'fa-brands fa-facebook-f',
        'Instagram' => 'fa-brands fa-instagram',
        'YouTube' => 'fa-brands fa-youtube',
        'Github' => 'fa-brands fa-github',
        'Blog' => 'fa-solid fa-rss',
        'Company_Website' => 'fa-solid fa-globe',
    ];
@endphp

@section('content')
{{-- Dark header band with the speaker headshot --}}
<section class="relative bg-midnight pt-32 pb-20 px-4">
    <div class="max-w-3xl mx-auto text-center">
        <span class="section-eyebrow">Speaker</span>
        <div class="mt-6 mx-auto w-40 h-40 md:w-48 md:h-48 rounded-full overflow-hidden border-4 border-elevated">
            @if (! empty($speaker['profilePicture']))
                <img src="{{ $speaker['profilePicture'] }}" alt="{{ $speaker['fullName'] }}" class="w-full h-full object-cover" />
            @else
                <div class="w-full h-full flex items-center justify-center bg-elevated">
                    <i class="fa-solid fa-user text-4xl text-paper/50"></i>
                </div>
            @endif
        </div>
        <h1 class="font-varsity text-paper text-4xl md:text-6xl mt-6 tracking-wider">{{ $speaker['fullName'] }}</h1>
        @if (! empty($speaker['tagLine']))
            <p class="mt-3 text-paper/70 text-lg">{{ $speaker['tagLine'] }}</p>
        @endif
        @if (! empty($speaker['links']))
            <div class="mt-5 flex justify-center gap-5 text-paper/80 text-xl">
                @foreach ($speaker['links'] as $link)
                    <a href="{{ $link['url'] }}" target="_blank" rel="noopener noreferrer" class="hover:text-gold transition-colors" title="{{ $link['title'] ?? 'Link' }}" aria-label="{{ $link['title'] ?? 'Link' }}">
                        <i class="{{ $linkIcons[$link['linkType'] ?? ''] ?? 'fa-solid fa-link' }}"></i>
                    </a>
                @endforeach
            </div>
        @endif
    </div>
</section>

<section class="py-16 md:py-20 px-4 bg-paper">
    <div class="max-w-3xl mx-auto">
        <a href="{{ route('speakers') }}" class="inline-flex items-center gap-2 text-sm text-ink-muted hover:text-gold transition-colors">
            <i class="fa-solid fa-arrow-left"></i> All speakers
        </a>

        @if (! empty($speaker['bio']))
            <div class="mt-8 text-ink leading-relaxed">{!! nl2br(e($speaker['bio'])) !!}</div>
        @endif

        @if (! empty($speaker['sessions']))
            <h2 class="font-devcon text-2xl mt-12">{{ count($speaker['sessions']) > 1 ? 'Sessions' : 'Session' }}</h2>
            <div class="mt-4 space-y-3">
                @foreach ($speaker['sessions'] as $session)
                    <a href="{{ route('session', $session['id']) }}" class="block admin-card p-4 hover:border-gold transition-colors">
                        <span class="font-medium text-ink">{{ $session['name'] }}</span>
                    </a>
                @endforeach
            </div>
        @endif
    </div>
</section>
@endsection
