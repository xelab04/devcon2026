<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Backoffice') — DevCon 2026</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@700&family=Passion+One:wght@400;700;900&family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite(['resources/css/app.css'])
    @stack('head')
</head>
<body class="min-h-screen bg-paper-soft text-ink font-sans antialiased">
    <nav class="bg-midnight text-paper" x-data="{ open: false }">
        <div class="max-w-7xl mx-auto px-4 md:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center gap-8">
                    <a href="{{ route('admin.registrations.index') }}" class="flex items-center gap-3">
                        <img src="{{ asset('logo.png') }}" alt="DevCon 2026" class="h-9 w-auto">
                        <span class="font-devcon text-paper text-sm hidden sm:block">DevCon 2026</span>
                    </a>
                    <div class="hidden md:flex items-center gap-6 text-sm">
                        @can('view-dashboard')
                            <a href="{{ route('admin.dashboard') }}" class="admin-nav-link {{ request()->routeIs('admin.dashboard') ? 'is-active' : '' }}">Dashboard</a>
                        @endcan
                        <a href="{{ route('admin.registrations.index') }}" class="admin-nav-link {{ request()->routeIs('admin.registrations.*') ? 'is-active' : '' }}">Registrations</a>
                        @can('manage-users')
                            <a href="{{ route('admin.users.index') }}" class="admin-nav-link {{ request()->routeIs('admin.users.*') ? 'is-active' : '' }}">Users</a>
                        @endcan
                    </div>
                </div>

                <div class="hidden md:flex items-center">
                    <div class="relative" x-data="{ d: false }">
                        <button @click="d = !d" class="flex items-center gap-2 text-sm">
                            <span class="text-paper/90">{{ auth()->user()->name }}</span>
                            <span class="badge badge-muted">{{ auth()->user()->role->label() }}</span>
                            <i class="fas fa-chevron-down text-xs text-paper/60"></i>
                        </button>
                        <div x-show="d" @click.outside="d = false" x-transition x-cloak
                             class="absolute right-0 mt-2 w-48 bg-paper text-ink rounded-lg shadow-lg border border-rule py-1 z-50">
                            <a href="{{ route('admin.profile.edit') }}" class="block px-4 py-2 text-sm hover:bg-paper-soft">My profile</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full text-left px-4 py-2 text-sm hover:bg-paper-soft text-error">Sign out</button>
                            </form>
                        </div>
                    </div>
                </div>

                <button class="md:hidden text-paper" @click="open = !open" aria-label="Menu">
                    <i class="fas fa-bars text-xl"></i>
                </button>
            </div>

            <div x-show="open" x-transition x-cloak class="md:hidden pb-4 space-y-1 text-sm">
                @can('view-dashboard')
                    <a href="{{ route('admin.dashboard') }}" class="block py-2 admin-nav-link">Dashboard</a>
                @endcan
                <a href="{{ route('admin.registrations.index') }}" class="block py-2 admin-nav-link">Registrations</a>
                @can('manage-users')
                    <a href="{{ route('admin.users.index') }}" class="block py-2 admin-nav-link">Users</a>
                @endcan
                <a href="{{ route('admin.profile.edit') }}" class="block py-2 admin-nav-link">My profile</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="block py-2 text-error">Sign out</button>
                </form>
            </div>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto px-4 md:px-8 py-8">
        @if (session('success'))
            <div class="alert alert-success mb-6"><i class="fas fa-circle-check mt-0.5"></i><div class="text-sm">{{ session('success') }}</div></div>
        @endif
        @if (session('warning'))
            <div class="alert alert-warning mb-6"><i class="fas fa-triangle-exclamation mt-0.5"></i><div class="text-sm">{{ session('warning') }}</div></div>
        @endif
        @if (session('error'))
            <div class="alert alert-error mb-6"><i class="fas fa-circle-exclamation mt-0.5"></i><div class="text-sm">{{ session('error') }}</div></div>
        @endif

        @yield('content')
    </main>

    @stack('scripts')
</body>
</html>
