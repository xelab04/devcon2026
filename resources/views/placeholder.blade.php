@extends('layouts.main')

@section('content')
{{-- Dark header band — gives the absolute-positioned top-navigation a backdrop in place of the home page's hero image. --}}
<section class="relative bg-midnight pt-32 pb-20 px-4">
    <div class="text-center">
        <span class="section-eyebrow">DevCon 2026</span>
        <h1 class="font-varsity text-paper text-5xl md:text-7xl mt-3 tracking-wider">{{ $heading }}</h1>
    </div>
</section>

<section class="py-20 md:py-28 px-4">
    <div class="max-w-2xl mx-auto text-center">
        <h2 class="font-devcon text-2xl md:text-3xl">{{ $subheading }}</h2>
        <p class="mt-4 text-lg text-ink-muted">{{ $message }}</p>
    </div>
</section>
@endsection
