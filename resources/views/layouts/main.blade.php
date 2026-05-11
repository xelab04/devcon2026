<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <meta property="og:title" content="{{ $title }}">
        <meta property="og:url" content="/">
        <meta property="og:type" content="website">
        <meta property="og:locale" content="en">
        <meta name="description" content="Developers Conference 2026 — the largest gathering of software craftsman, web devs, sysadmins, designers, testers and the younger generation of aspiring professionals.">
        <meta
            property="og:description"
            content="Developers Conference 2026 — the largest gathering of software craftsman, web devs, sysadmins, designers, testers and the younger generation of aspiring professionals.">
        <meta name="keywords" content="Technology, Software Development, Linux, Open Source, Programming">
        <meta property="og:image" content="{{ asset('images/og-image-2026.jpg') }}">

        <title>{{ $title }}</title>

        <!-- Favicon -->
        <link
            rel="apple-touch-icon"
            sizes="57x57"
            href="{{ asset('images/favicon/apple-touch-icon-57x57.png') }}"
        />
        <link
            rel="apple-touch-icon"
            sizes="114x114"
            href="{{ asset('images/favicon/apple-touch-icon-114x114.png') }}"
        />
        <link
            rel="apple-touch-icon"
            sizes="72x72"
            href="{{ asset('images/favicon/apple-touch-icon-72x72.png') }}"
        />
        <link
            rel="apple-touch-icon"
            sizes="144x144"
            href="{{ asset('images/favicon/apple-touch-icon-144x144.png') }}"
        />
        <link
            rel="apple-touch-icon"
            sizes="60x60"
            href="{{ asset('images/favicon/apple-touch-icon-60x60.png') }}"
        />
        <link
            rel="apple-touch-icon"
            sizes="120x120"
            href="{{ asset('images/favicon/apple-touch-icon-120x120.png') }}"
        />
        <link
            rel="apple-touch-icon"
            sizes="76x76"
            href="{{ asset('images/favicon/apple-touch-icon-76x76.png') }}"
        />
        <link
            rel="apple-touch-icon"
            sizes="152x152"
            href="{{ asset('images/favicon/apple-touch-icon-152x152.png') }}"
        />
        <link
            rel="icon"
            type="image/png"
            href="{{ asset('images/favicon/favicon-196x196.png') }}"
            sizes="196x196"
        />
        <link
            rel="icon"
            type="image/png"
            href="{{ asset('images/favicon/favicon-96x96.png') }}"
            sizes="96x96"
        />
        <link
            rel="icon"
            type="image/png"
            href="{{ asset('images/favicon/favicon-32x32.png') }}"
            sizes="32x32"
        />
        <link
            rel="icon"
            type="image/png"
            href="{{ asset('images/favicon/favicon-16x16.png') }}"
            sizes="16x16"
        />
        <link
            rel="icon"
            type="image/png"
            href="{{ asset('images/favicon/favicon-128.png') }}"
            sizes="128x128"
        />
        <meta name="application-name" content="Developers Conference 2026" />
        <meta name="msapplication-TileColor" content="#FFFFFF" />
        <meta
            name="msapplication-TileImage"
            content="{{ asset('images/favicon/mstile-144x144.png') }}"
        />
        <meta
            name="msapplication-square70x70logo"
            content="{{ asset('images/favicon/mstile-70x70.png') }}"
        />
        <meta
            name="msapplication-square150x150logo"
            content="{{ asset('images/favicon/mstile-150x150.png') }}"
        />
        <meta
            name="msapplication-wide310x150logo"
            content="{{ asset('images/favicon/mstile-310x150.png') }}"
        />
        <meta
            name="msapplication-square310x310logo"
            content="{{ asset('images/favicon/mstile-310x310.png') }}"
        />

        <link rel="icon" type="image/png" href="favicon.ico" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@700&family=Passion+One:wght@400;700;900&family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-H1NBF1RG65"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'G-H1NBF1RG65');
        </script>

        @vite(['resources/js/app.js', 'resources/css/app.css'])
    </head>
    <body>
        @include('layouts.top-navigation')
        <main>
            @yield('content')
        </main>
        @include('layouts.footer')
    </body>
