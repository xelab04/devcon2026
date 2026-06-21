@php($isHome = request()->routeIs('index'))
<nav class="absolute top-0 left-0 right-0 z-20 flex items-center justify-between px-6 md:px-12 py-4" x-data="{ open: false }">
    @if ($isHome)
        <!-- Home page: DevCon badge — left on mobile, right on desktop -->
        <img src="{{ asset('logo.png') }}" alt="MSCC" class="w-12 lg:w-30 h-12 lg:h-30 object-contain drop-shadow-lg order-first md:order-last" />
    @else
        <!-- Inner pages: white MSCC monogram, top-left, linked to home -->
        <a href="{{ url('/') }}" title="MSCC — back to home" class="order-first">
            <img src="{{ asset('MSCC-logo-inverted.svg') }}" alt="MSCC home" class="h-10 lg:h-14 drop-shadow-lg" />
        </a>
    @endif

    <!-- Desktop nav links -->
    <div class="hidden md:flex items-center gap-8 text-white/90 text-md font-medium {{ $isHome ? 'lg:-mt-16' : '' }}">
        <a href="{{ route('speakers') }}" class="nav-link hover:text-yellow-400 transition-colors">Speakers</a>
        <a href="{{ route('agenda') }}" class="nav-link hover:text-yellow-400 transition-colors">Agenda</a>
        <a href="{{ route('register') }}" class="nav-link hover:text-yellow-400 transition-colors">Register</a>
        <a href="{{ route('photos') }}" class="nav-link hover:text-yellow-400 transition-colors">Photos</a>
        <a href="{{ route('team') }}" class="nav-link hover:text-yellow-400 transition-colors">The Team</a>
    </div>

    <!-- Mobile menu button -->
    <button class="md:hidden text-white order-last" @click="open = !open">
        <i class="fas fa-bars text-xl"></i>
    </button>

    @if ($isHome)
        <!-- Spacer balances the badge that sits on the right on desktop -->
        <div class="hidden md:block w-12 order-first"></div>
    @endif

    <!-- Mobile menu -->
    <div x-show="open" x-transition x-cloak class="md:hidden absolute top-full left-0 right-0 z-30 bg-gray-900/95 backdrop-blur-sm px-6 py-4 flex flex-col gap-3 text-white">
        <a href="{{ route('speakers') }}" class="py-2 hover:text-yellow-400">Speakers</a>
        <a href="{{ route('agenda') }}" class="py-2 hover:text-yellow-400">Agenda</a>
        <a href="{{ route('register') }}" class="py-2 hover:text-yellow-400">Register</a>
        <a href="{{ route('photos') }}" class="py-2 hover:text-yellow-400">Photos</a>
        <a href="{{ route('team') }}" class="py-2 hover:text-yellow-400">The Team</a>
    </div>
</nav>
