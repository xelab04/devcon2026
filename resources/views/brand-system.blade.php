@php
    $primary = [
        ['name' => 'Midnight', 'token' => 'midnight', 'hex' => '#0F0F1E', 'role' => 'Deepest backgrounds', 'class' => 'bg-midnight', 'on' => 'text-paper'],
        ['name' => 'Dark Navy', 'token' => 'darkbg', 'hex' => '#1A1A2E', 'role' => 'Default dark surface', 'class' => 'bg-darkbg', 'on' => 'text-paper'],
        ['name' => 'Elevated', 'token' => 'elevated', 'hex' => '#2A2A4E', 'role' => 'Elevated dark surface', 'class' => 'bg-elevated', 'on' => 'text-paper'],
        ['name' => 'Gold', 'token' => 'gold', 'hex' => '#D4A017', 'role' => 'Primary accent', 'class' => 'bg-gold', 'on' => 'text-midnight'],
        ['name' => 'Gold Soft', 'token' => 'gold-soft', 'hex' => '#E8B940', 'role' => 'Gold hover state', 'class' => 'bg-gold-soft', 'on' => 'text-midnight'],
    ];

    $accent = [
        ['name' => 'Violet', 'token' => 'violet', 'hex' => '#7C3AED', 'role' => 'Gradient start', 'class' => 'bg-violet', 'on' => 'text-paper'],
        ['name' => 'Cyan', 'token' => 'cyan', 'hex' => '#06B6D4', 'role' => 'Gradient end', 'class' => 'bg-cyan', 'on' => 'text-paper'],
    ];

    $neutrals = [
        ['name' => 'Ink', 'token' => 'ink', 'hex' => '#0F0F1E', 'role' => 'Body text on light', 'class' => 'bg-ink', 'on' => 'text-paper'],
        ['name' => 'Ink Muted', 'token' => 'ink-muted', 'hex' => '#4B4B5C', 'role' => 'Secondary text', 'class' => 'bg-ink-muted', 'on' => 'text-paper'],
        ['name' => 'Ink Subtle', 'token' => 'ink-subtle', 'hex' => '#8B8B9C', 'role' => 'Captions, placeholders', 'class' => 'bg-ink-subtle', 'on' => 'text-paper'],
        ['name' => 'Paper', 'token' => 'paper', 'hex' => '#FFFFFF', 'role' => 'Default light surface', 'class' => 'bg-paper', 'on' => 'text-ink'],
        ['name' => 'Paper Soft', 'token' => 'paper-soft', 'hex' => '#F7F7FA', 'role' => 'Alt section background', 'class' => 'bg-paper-soft', 'on' => 'text-ink'],
        ['name' => 'Rule', 'token' => 'rule', 'hex' => '#E5E5EC', 'role' => 'Hairlines, dividers', 'class' => 'bg-rule', 'on' => 'text-ink'],
    ];

    $tiers = [
        ['name' => 'Platinum', 'token' => 'tier-platinum', 'hex' => '#E5E4E2', 'class' => 'bg-tier-platinum', 'text' => 'text-tier-platinum', 'flag' => '&#127463;&#127479;', 'team' => 'Team Brasil', 'on' => 'text-ink'],
        ['name' => 'Gold', 'token' => 'tier-gold', 'hex' => '#D4A017', 'class' => 'bg-tier-gold', 'text' => 'text-tier-gold', 'flag' => '&#127465;&#127466;', 'team' => 'Team Germany', 'on' => 'text-midnight'],
        ['name' => 'Silver', 'token' => 'tier-silver', 'hex' => '#A8A8B5', 'class' => 'bg-tier-silver', 'text' => 'text-tier-silver', 'flag' => '&#127470;&#127481;', 'team' => 'Team Italy', 'on' => 'text-paper'],
        ['name' => 'Bronze', 'token' => 'tier-bronze', 'hex' => '#B08D57', 'class' => 'bg-tier-bronze', 'text' => 'text-tier-bronze', 'flag' => '&#127462;&#127479;', 'team' => 'Team Argentina', 'on' => 'text-paper'],
    ];

    $semantic = [
        ['name' => 'Success', 'token' => 'success', 'hex' => '#10B981', 'class' => 'bg-success', 'on' => 'text-paper'],
        ['name' => 'Warning', 'token' => 'warning', 'hex' => '#F59E0B', 'class' => 'bg-warning', 'on' => 'text-midnight'],
        ['name' => 'Error', 'token' => 'error', 'hex' => '#EF4444', 'class' => 'bg-error', 'on' => 'text-paper'],
        ['name' => 'Info', 'token' => 'info', 'hex' => '#3B82F6', 'class' => 'bg-info', 'on' => 'text-paper'],
    ];

    $typeScale = [
        ['role' => 'Display', 'mobile' => '48px', 'desktop' => '96px', 'font' => 'Passion 700', 'tracking' => 'tracking-wider', 'class' => 'font-display text-5xl md:text-8xl tracking-wider'],
        ['role' => 'H1', 'mobile' => '36px', 'desktop' => '56px', 'font' => 'Inter 800', 'tracking' => 'tracking-tight', 'class' => 'font-devcon text-4xl md:text-6xl'],
        ['role' => 'H2', 'mobile' => '28px', 'desktop' => '40px', 'font' => 'Inter 800', 'tracking' => 'tracking-tight', 'class' => 'font-devcon text-3xl md:text-4xl'],
        ['role' => 'H3', 'mobile' => '22px', 'desktop' => '28px', 'font' => 'Inter 700', 'tracking' => 'normal', 'class' => 'font-sans font-bold text-2xl md:text-3xl'],
        ['role' => 'H4', 'mobile' => '18px', 'desktop' => '22px', 'font' => 'Inter 600', 'tracking' => 'normal', 'class' => 'font-sans font-semibold text-lg md:text-xl'],
        ['role' => 'Body lg', 'mobile' => '18px', 'desktop' => '20px', 'font' => 'Inter 400', 'tracking' => 'normal', 'class' => 'font-sans text-lg md:text-xl'],
        ['role' => 'Body', 'mobile' => '16px', 'desktop' => '16px', 'font' => 'Inter 400', 'tracking' => 'normal', 'class' => 'font-sans text-base'],
        ['role' => 'Caption', 'mobile' => '12px', 'desktop' => '14px', 'font' => 'Inter 500', 'tracking' => 'tracking-wide', 'class' => 'font-sans font-medium text-xs md:text-sm tracking-wide uppercase'],
    ];
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Brand System — DevCon 2026</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@700&family=Passion+One:wght@400;700;900&family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css'])
</head>
<body class="bg-paper-soft text-ink font-sans antialiased">

    {{-- ─── Hero ─────────────────────────────────────────────────────────── --}}
    <header class="bg-midnight text-paper px-6 md:px-12 py-16 md:py-24">
        <div class="max-w-7xl mx-auto">
            <span class="section-eyebrow">DevCon 2026 · Brand System</span>
            <h1 class="font-display text-6xl md:text-8xl mt-3 tracking-wider leading-none">Brand System</h1>
            <p class="mt-6 max-w-2xl text-lg text-paper/70">
                Living reference for tokens, type, and components used across the DevCon 2026 site.
                Edit <code class="text-gold">resources/css/app.css</code> to evolve it.
            </p>
            <nav class="mt-10 flex flex-wrap gap-x-6 gap-y-2 text-sm text-paper/80">
                <a href="#foundations" class="nav-link">Foundations</a>
                <a href="#colors" class="nav-link">Colors</a>
                <a href="#typography" class="nav-link">Typography</a>
                <a href="#buttons" class="nav-link">Buttons</a>
                <a href="#components" class="nav-link">Components</a>
                <a href="#logo" class="nav-link">Logo</a>
                <a href="#motion" class="nav-link">Motion</a>
            </nav>
        </div>
    </header>

    {{-- ─── Foundations ──────────────────────────────────────────────────── --}}
    <section id="foundations" class="px-6 md:px-12 py-16 md:py-24">
        <div class="max-w-7xl mx-auto">
            <span class="section-eyebrow">Foundations</span>
            <h2 class="font-devcon text-3xl md:text-4xl mt-2">Three principles</h2>
            <div class="mt-10 grid gap-6 md:grid-cols-3">
                <div class="bg-paper rounded-xl border border-rule p-6">
                    <div class="font-display text-5xl text-gold leading-none">01</div>
                    <h3 class="font-devcon text-xl mt-3">Crafted, not corporate</h3>
                    <p class="mt-2 text-ink-muted">Built by a developer community. Sharp geometry, confident type, real photography over stock.</p>
                </div>
                <div class="bg-paper rounded-xl border border-rule p-6">
                    <div class="font-display text-5xl text-gold leading-none">02</div>
                    <h3 class="font-devcon text-xl mt-3">Premium, but warm</h3>
                    <p class="mt-2 text-ink-muted">Gold and Dark Navy carry the weight; Inter and warm photography keep it inviting.</p>
                </div>
                <div class="bg-paper rounded-xl border border-rule p-6">
                    <div class="font-display text-5xl text-gold leading-none">03</div>
                    <h3 class="font-devcon text-xl mt-3">Energy, used sparingly</h3>
                    <p class="mt-2 text-ink-muted">Violet → Cyan is the brand's signature. Reserved for moments that should pop.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- ─── Colors ───────────────────────────────────────────────────────── --}}
    <section id="colors" class="px-6 md:px-12 py-16 md:py-24 bg-paper border-y border-rule">
        <div class="max-w-7xl mx-auto">
            <span class="section-eyebrow">Colors</span>
            <h2 class="font-devcon text-3xl md:text-4xl mt-2">Palette</h2>

            <h3 class="font-devcon text-xl mt-12">Primary</h3>
            <p class="text-ink-muted mt-1">Anchor of the brand. Used everywhere.</p>
            <div class="mt-6 grid gap-4 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5">
                @foreach ($primary as $c)
                    <div class="bg-paper rounded-xl border border-rule overflow-hidden">
                        <div class="h-24 {{ $c['class'] }} {{ $c['on'] }} px-4 py-3 flex items-end font-devcon">{{ $c['name'] }}</div>
                        <div class="p-4">
                            <div class="text-sm font-medium">{{ $c['name'] }}</div>
                            <div class="mt-1 text-xs text-ink-muted font-mono">--color-{{ $c['token'] }}</div>
                            <div class="text-xs text-ink-muted font-mono">{{ $c['hex'] }}</div>
                            <div class="mt-2 text-xs text-ink-subtle">{{ $c['role'] }}</div>
                        </div>
                    </div>
                @endforeach
            </div>

            <h3 class="font-devcon text-xl mt-16">Signature accent</h3>
            <p class="text-ink-muted mt-1">Used sparingly — max one prominent instance per viewport.</p>
            <div class="mt-6 grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($accent as $c)
                    <div class="bg-paper rounded-xl border border-rule overflow-hidden">
                        <div class="h-24 {{ $c['class'] }} {{ $c['on'] }} px-4 py-3 flex items-end font-devcon">{{ $c['name'] }}</div>
                        <div class="p-4">
                            <div class="text-sm font-medium">{{ $c['name'] }}</div>
                            <div class="mt-1 text-xs text-ink-muted font-mono">--color-{{ $c['token'] }}</div>
                            <div class="text-xs text-ink-muted font-mono">{{ $c['hex'] }}</div>
                            <div class="mt-2 text-xs text-ink-subtle">{{ $c['role'] }}</div>
                        </div>
                    </div>
                @endforeach
                <div class="bg-paper rounded-xl border border-rule overflow-hidden">
                    <div class="h-24 bg-energy text-paper px-4 py-3 flex items-end font-devcon">Energy gradient</div>
                    <div class="p-4">
                        <div class="text-sm font-medium">Energy gradient</div>
                        <div class="mt-1 text-xs text-ink-muted font-mono">.bg-energy</div>
                        <div class="text-xs text-ink-muted font-mono">135° violet → cyan</div>
                        <div class="mt-2 text-xs text-ink-subtle">Hero CTA, footer band, callouts</div>
                    </div>
                </div>
            </div>

            <h3 class="font-devcon text-xl mt-16">Neutrals</h3>
            <p class="text-ink-muted mt-1">Surfaces and text on light backgrounds.</p>
            <div class="mt-6 grid gap-4 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6">
                @foreach ($neutrals as $c)
                    <div class="bg-paper rounded-xl border border-rule overflow-hidden">
                        <div class="h-24 {{ $c['class'] }} {{ $c['on'] }} px-4 py-3 flex items-end font-devcon text-sm">{{ $c['name'] }}</div>
                        <div class="p-4">
                            <div class="text-sm font-medium">{{ $c['name'] }}</div>
                            <div class="mt-1 text-xs text-ink-muted font-mono">--color-{{ $c['token'] }}</div>
                            <div class="text-xs text-ink-muted font-mono">{{ $c['hex'] }}</div>
                            <div class="mt-2 text-xs text-ink-subtle">{{ $c['role'] }}</div>
                        </div>
                    </div>
                @endforeach
            </div>

            <h3 class="font-devcon text-xl mt-16">Sponsor tiers</h3>
            <p class="text-ink-muted mt-1">Semantic tokens — replaces ad-hoc <code>text-yellow-500</code>, <code>text-amber-700</code>, etc.</p>
            <div class="mt-6 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
                @foreach ($tiers as $c)
                    <div class="bg-paper rounded-xl border border-rule overflow-hidden">
                        <div class="h-24 {{ $c['class'] }} {{ $c['on'] }} px-4 py-3 flex items-end font-devcon">{{ $c['name'] }}</div>
                        <div class="p-4">
                            <div class="text-sm font-medium">{{ $c['name'] }}</div>
                            <div class="mt-1 text-xs text-ink-muted font-mono">--color-{{ $c['token'] }}</div>
                            <div class="text-xs text-ink-muted font-mono">{{ $c['hex'] }}</div>
                        </div>
                    </div>
                @endforeach
            </div>

            <h3 class="font-devcon text-xl mt-16">Semantic</h3>
            <p class="text-ink-muted mt-1">Status colors for UI feedback.</p>
            <div class="mt-6 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
                @foreach ($semantic as $c)
                    <div class="bg-paper rounded-xl border border-rule overflow-hidden">
                        <div class="h-24 {{ $c['class'] }} {{ $c['on'] }} px-4 py-3 flex items-end font-devcon">{{ $c['name'] }}</div>
                        <div class="p-4">
                            <div class="text-sm font-medium">{{ $c['name'] }}</div>
                            <div class="mt-1 text-xs text-ink-muted font-mono">--color-{{ $c['token'] }}</div>
                            <div class="text-xs text-ink-muted font-mono">{{ $c['hex'] }}</div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ─── Typography ───────────────────────────────────────────────────── --}}
    <section id="typography" class="px-6 md:px-12 py-16 md:py-24">
        <div class="max-w-7xl mx-auto">
            <span class="section-eyebrow">Typography</span>
            <h2 class="font-devcon text-3xl md:text-4xl mt-2">Type system</h2>

            <div class="mt-12 space-y-12">
                <div class="border-b border-rule pb-10">
                    <div class="text-xs text-ink-muted font-mono uppercase tracking-wider">font-display · Passion One 700</div>
                    <div class="font-display text-7xl md:text-9xl tracking-wider mt-3 leading-none">DEVCON</div>
                    <p class="mt-4 text-ink-muted max-w-2xl">Hero headline, year, and big moments only — never for section H2/H3. Use with <code>tracking-wider</code>.</p>
                </div>
                <div class="border-b border-rule pb-10">
                    <div class="text-xs text-ink-muted font-mono uppercase tracking-wider">font-devcon · Inter 800, tracking-tight</div>
                    <div class="font-devcon text-5xl md:text-6xl mt-3 leading-tight">What to expect?</div>
                    <p class="mt-4 text-ink-muted max-w-2xl">Section headings (H2/H3) and card titles. The class bundles weight + tracking — no need to add <code>font-extrabold</code>.</p>
                </div>
                <div class="border-b border-rule pb-10">
                    <div class="text-xs text-ink-muted font-mono uppercase tracking-wider">font-sans · Inter 400/500/600</div>
                    <p class="text-xl md:text-2xl mt-3 max-w-3xl">DevCon brings together developers, designers, and craftspeople from across Mauritius and beyond — three days of workshops, talks, and networking in March 2026.</p>
                    <p class="mt-4 text-ink-muted max-w-2xl">Body, UI, paragraphs. Default font.</p>
                </div>
                <div>
                    <div class="text-xs text-ink-muted font-mono uppercase tracking-wider">font-digital · Orbitron 700</div>
                    <div class="font-digital text-5xl md:text-7xl text-gold mt-3 tabular-nums">88 : 12 : 04 : 31</div>
                    <p class="mt-4 text-ink-muted max-w-2xl">Countdown digits only. Never used elsewhere — its narrow role is what makes it feel special.</p>
                </div>
            </div>

            <h3 class="font-devcon text-xl mt-16">Type scale</h3>
            <div class="mt-6 overflow-hidden rounded-xl border border-rule bg-paper">
                <table class="w-full text-sm">
                    <thead class="bg-paper-soft text-left">
                        <tr>
                            <th class="px-4 py-3 font-medium">Role</th>
                            <th class="px-4 py-3 font-medium">Mobile</th>
                            <th class="px-4 py-3 font-medium">Desktop</th>
                            <th class="px-4 py-3 font-medium">Font</th>
                            <th class="px-4 py-3 font-medium">Sample</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($typeScale as $row)
                            <tr class="border-t border-rule">
                                <td class="px-4 py-4 font-medium">{{ $row['role'] }}</td>
                                <td class="px-4 py-4 text-ink-muted font-mono">{{ $row['mobile'] }}</td>
                                <td class="px-4 py-4 text-ink-muted font-mono">{{ $row['desktop'] }}</td>
                                <td class="px-4 py-4 text-ink-muted">{{ $row['font'] }}</td>
                                <td class="px-4 py-4"><span class="{{ $row['class'] }}">Aa</span></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    {{-- ─── Buttons ──────────────────────────────────────────────────────── --}}
    <section id="buttons" class="px-6 md:px-12 py-16 md:py-24 bg-paper border-y border-rule">
        <div class="max-w-7xl mx-auto">
            <span class="section-eyebrow">Buttons</span>
            <h2 class="font-devcon text-3xl md:text-4xl mt-2">Buttons</h2>
            <p class="mt-3 text-ink-muted max-w-2xl">Three variants. Hover the buttons to see transitions.</p>

            <div class="mt-10 grid gap-6 md:grid-cols-3">
                <div>
                    <div class="bg-paper-soft rounded-xl border border-rule p-8 grid place-items-center min-h-[140px]">
                        <a href="#buttons" class="btn-primary">Reserve your seat</a>
                    </div>
                    <div class="mt-3 text-xs text-ink-muted font-mono">.btn-primary</div>
                    <p class="mt-1 text-sm text-ink-muted">Default CTA. Solid gold on light, gold-soft on hover.</p>
                </div>
                <div>
                    <div class="bg-paper-soft rounded-xl border border-rule p-8 grid place-items-center min-h-[140px]">
                        <a href="#buttons" class="btn-secondary">Download Calendar</a>
                    </div>
                    <div class="mt-3 text-xs text-ink-muted font-mono">.btn-secondary</div>
                    <p class="mt-1 text-sm text-ink-muted">Outline. Inverts on hover. For low-emphasis actions.</p>
                </div>
                <div>
                    <div class="bg-paper-soft rounded-xl border border-rule p-8 grid place-items-center min-h-[140px]">
                        <a href="#buttons" class="btn-energy">Get tickets</a>
                    </div>
                    <div class="mt-3 text-xs text-ink-muted font-mono">.btn-energy</div>
                    <p class="mt-1 text-sm text-ink-muted">Signature gradient. <strong>Max one per page.</strong></p>
                </div>
            </div>
        </div>
    </section>

    {{-- ─── Components ───────────────────────────────────────────────────── --}}
    <section id="components" class="px-6 md:px-12 py-16 md:py-24">
        <div class="max-w-7xl mx-auto space-y-16">
            <div>
                <span class="section-eyebrow">Components</span>
                <h2 class="font-devcon text-3xl md:text-4xl mt-2">Component patterns</h2>
            </div>

            {{-- Section header --}}
            <div>
                <div class="text-xs text-ink-muted font-mono uppercase tracking-wider mb-3">Section header</div>
                <div class="bg-paper border border-rule rounded-xl p-8 md:p-12">
                    <span class="section-eyebrow">What's coming</span>
                    <h3 class="font-devcon text-3xl md:text-4xl mt-2">Three days, one community</h3>
                    <p class="mt-3 text-ink-muted max-w-prose">Eyebrow + H2 + lede. Centered for marketing sections, left-aligned for content sections.</p>
                </div>
            </div>

            {{-- Sponsor tier card --}}
            <div>
                <div class="text-xs text-ink-muted font-mono uppercase tracking-wider mb-3">Sponsor tier badge</div>
                <div class="bg-paper border border-rule rounded-xl p-8 space-y-8">
                    @foreach ($tiers as $t)
                        <div class="flex items-center gap-3">
                            <span class="w-12 h-12 rounded-full inline-flex items-center justify-center text-[28px] shadow-md bg-paper-soft">{!! $t['flag'] !!}</span>
                            <h3 class="text-xl md:text-2xl font-extrabold">
                                <span class="{{ $t['text'] }}">{{ $t['name'] }}</span>
                                <span class="text-ink"> Sponsor &ndash; {{ $t['team'] }}</span>
                            </h3>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- Countdown digit --}}
            <div>
                <div class="text-xs text-ink-muted font-mono uppercase tracking-wider mb-3">Countdown digit</div>
                <div class="bg-paper border border-rule rounded-xl p-8 grid place-items-center">
                    <div class="countdown-digit inline-flex items-center justify-center gap-4 md:gap-6 rounded-2xl px-6 md:px-10 py-6 md:py-8">
                        @foreach (['Days' => '88', 'Hours' => '12', 'Minutes' => '04', 'Seconds' => '31'] as $label => $value)
                            <div class="flex flex-col items-center min-w-[70px] md:min-w-[100px]">
                                <span class="text-paper text-xs mb-1 font-medium">{{ $label }}</span>
                                <span class="text-gold text-4xl md:text-6xl font-bold tabular-nums">{{ $value }}</span>
                            </div>
                            @if (! $loop->last)
                                <span class="text-3xl md:text-5xl font-bold text-ink-subtle mt-3">:</span>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- Feature tile --}}
            <div>
                <div class="text-xs text-ink-muted font-mono uppercase tracking-wider mb-3">Feature tile</div>
                <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach ([
                        ['icon' => 'palette.png', 'title' => 'Workshops', 'body' => 'Industry-led practical sessions for builders at every stage.'],
                        ['icon' => 'bullseye.png', 'title' => 'Panel Discussions', 'body' => 'Thought leaders unpacking trends, challenges, and the road ahead.'],
                        ['icon' => 'performing-arts.png', 'title' => 'Speaker Sessions', 'body' => 'Local and international voices on craft, tools, and ideas.'],
                    ] as $f)
                        <div class="bg-paper border border-rule rounded-xl p-6 transition-transform duration-200 ease-out hover:-translate-y-1">
                            <img src="{{ asset('images/emojis/' . $f['icon']) }}" class="h-12 w-12" alt="" />
                            <h4 class="mt-3 font-devcon text-xl">{{ $f['title'] }}</h4>
                            <p class="mt-2 text-ink-muted">{{ $f['body'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- Nav link --}}
            <div>
                <div class="text-xs text-ink-muted font-mono uppercase tracking-wider mb-3">Nav link · gold underline on hover</div>
                <div class="bg-midnight rounded-xl p-8 flex flex-wrap gap-x-8 gap-y-3 text-paper">
                    <a href="#components" class="nav-link">Speakers</a>
                    <a href="#components" class="nav-link">Agenda</a>
                    <a href="#components" class="nav-link">Register</a>
                    <a href="#components" class="nav-link">Photos</a>
                    <a href="#components" class="nav-link">The Team</a>
                </div>
            </div>
        </div>
    </section>

    {{-- ─── Logo ─────────────────────────────────────────────────────────── --}}
    <section id="logo" class="px-6 md:px-12 py-16 md:py-24 bg-paper border-y border-rule">
        <div class="max-w-7xl mx-auto">
            <span class="section-eyebrow">Logo</span>
            <h2 class="font-devcon text-3xl md:text-4xl mt-2">Logo usage</h2>
            <p class="mt-3 text-ink-muted max-w-2xl">Two variants, one rule: minimum height 32px, clear-space equal to the height of the M-mark.</p>
            <div class="mt-10 grid gap-6 sm:grid-cols-2">
                <div>
                    <div class="bg-midnight rounded-xl p-12 grid place-items-center min-h-[260px]">
                        <img src="{{ asset('MSCC-logo-inverted.svg') }}" alt="MSCC inverted" class="h-32" />
                    </div>
                    <div class="mt-3 text-xs text-ink-muted font-mono">MSCC-logo-inverted.svg</div>
                    <p class="text-sm text-ink-muted">On midnight, dark navy, elevated, or any photo with a midnight overlay.</p>
                </div>
                <div>
                    <div class="bg-paper rounded-xl border border-rule p-12 grid place-items-center min-h-[260px]">
                        <img src="{{ asset('images/mscc-logo-dark.svg') }}" alt="MSCC dark" class="h-32" />
                    </div>
                    <div class="mt-3 text-xs text-ink-muted font-mono">images/mscc-logo-dark.svg</div>
                    <p class="text-sm text-ink-muted">On paper, paper-soft, or any light surface.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- ─── Motion ───────────────────────────────────────────────────────── --}}
    <section id="motion" class="px-6 md:px-12 py-16 md:py-24">
        <div class="max-w-7xl mx-auto">
            <span class="section-eyebrow">Motion</span>
            <h2 class="font-devcon text-3xl md:text-4xl mt-2">Motion &amp; interaction</h2>
            <div class="mt-10 grid gap-6 md:grid-cols-3">
                <div class="bg-paper border border-rule rounded-xl p-6">
                    <div class="text-xs text-ink-muted font-mono uppercase tracking-wider">Default transition</div>
                    <code class="block mt-2 text-sm">transition-colors duration-200 ease-out</code>
                    <p class="mt-3 text-sm text-ink-muted">Applied to interactive elements (buttons, links).</p>
                </div>
                <div class="bg-paper border border-rule rounded-xl p-6">
                    <div class="text-xs text-ink-muted font-mono uppercase tracking-wider">Card hover lift</div>
                    <code class="block mt-2 text-sm">hover:-translate-y-1</code>
                    <p class="mt-3 text-sm text-ink-muted">4px lift on cards. No scale on logos.</p>
                </div>
                <div class="bg-paper border border-rule rounded-xl p-6">
                    <div class="text-xs text-ink-muted font-mono uppercase tracking-wider">Scroll reveal</div>
                    <code class="block mt-2 text-sm">.reveal &rarr; .is-visible</code>
                    <p class="mt-3 text-sm text-ink-muted">Fade-up 24px via Alpine + IntersectionObserver. Honors <code>prefers-reduced-motion</code>.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- ─── Footer band ──────────────────────────────────────────────────── --}}
    <footer class="bg-energy text-paper px-6 md:px-12 py-12">
        <div class="max-w-7xl mx-auto text-center">
            <div class="font-devcon text-xl">DevCon 2026 · Brand System</div>
            <div class="mt-2 text-paper/80 text-sm">Live preview of <code>resources/css/app.css</code></div>
        </div>
    </footer>

</body>
</html>
