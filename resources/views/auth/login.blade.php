<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in — DevCon 2026</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@700&family=Passion+One:wght@400;700;900&family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    @vite(['resources/css/app.css'])
</head>
<body class="min-h-screen bg-midnight font-sans antialiased">
    <div class="min-h-screen flex items-center justify-center px-4 py-12">
        <div class="w-full max-w-md">
            <div class="flex justify-center mb-8">
                <img src="{{ asset('logo.png') }}" alt="MSCC Developers Conference 2026" class="h-20 w-auto drop-shadow-lg">
            </div>

            <div class="admin-card p-8">
                <h1 class="font-devcon text-2xl text-ink text-center">Backoffice sign in</h1>
                <p class="text-center text-ink-muted text-sm mt-1">Developers Conference 2026</p>

                @if ($errors->any())
                    <div class="alert alert-error mt-6">
                        <i class="fas fa-circle-exclamation mt-0.5"></i>
                        <div class="text-sm">{{ $errors->first() }}</div>
                    </div>
                @endif

                <form method="POST" action="{{ route('login.store') }}" class="mt-6 space-y-5">
                    @csrf
                    <div>
                        <label for="email" class="form-label">Email</label>
                        <input id="email" name="email" type="email" value="{{ old('email') }}" class="form-input" required autofocus autocomplete="username">
                    </div>
                    <div>
                        <label for="password" class="form-label">Password</label>
                        <input id="password" name="password" type="password" class="form-input" required autocomplete="current-password">
                    </div>
                    <label class="flex items-center gap-2 text-sm text-ink-muted">
                        <input type="checkbox" name="remember" class="accent-gold"> Remember me
                    </label>
                    <button type="submit" class="btn-primary w-full">Sign in</button>
                </form>
            </div>

            <p class="text-center text-paper/50 text-xs mt-6">MSCC · Developers Conference 2026</p>
        </div>
    </div>
</body>
</html>
