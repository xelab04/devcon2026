@extends('layouts.main')

@section('content')
<!-- Hero Section -->
<section class="relative min-h-[520px] flex items-center justify-center overflow-hidden bg-cover bg-center bg-no-repeat" style="background-image: url('{{ asset('hero-bg.jpg') }}')">
    <!-- Dark overlay for text readability -->
    <div class="absolute inset-0 bg-black/30 pointer-events-none"></div>

    <!-- Hero Content -->
    <div class="relative z-10 flex flex-row items-center justify-center gap-4 md:gap-6 px-4 py-12">
        <img src="{{ asset('MSCC-logo-inverted.svg') }}" alt="MSCC" class="h-[5.625rem] md:h-36 lg:h-[13.5rem] drop-shadow-lg" />
        <h1 class="font-varsity text-white text-3xl md:text-5xl lg:text-7xl tracking-wider leading-none drop-shadow-lg">
            <span class="block">DEVELOPERS</span>
            <span class="block">CONFERENCE</span>
            <span class="block">2026</span>
        </h1>
    </div>
</section>

{{-- Countdown --}}
<section class="py-16 px-4 bg-white" x-data="countdown()">
    <div class="max-w-4xl mx-auto text-center">
        <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-10">
            Count every second until the event
        </h2>

        <!-- Countdown digits -->
        <div class="countdown-digit inline-flex items-center justify-center gap-2 sm:gap-4 md:gap-6 rounded-xl sm:rounded-2xl px-4 sm:px-6 md:px-10 py-4 sm:py-6 md:py-8 mb-8">
            <div class="flex flex-col items-center min-w-[50px] sm:min-w-[70px] md:min-w-[100px]">
                <span class="text-white text-[10px] sm:text-xs mb-1 font-medium">Days</span>
                <span class="text-gold text-xl sm:text-3xl md:text-5xl font-bold tabular-nums" x-text="days">0</span>
            </div>
            <span class="text-xl sm:text-3xl md:text-5xl font-bold text-gray-400 mt-3">:</span>
            <div class="flex flex-col items-center min-w-[50px] sm:min-w-[70px] md:min-w-[100px]">
                <span class="text-white text-[10px] sm:text-xs mb-1 font-medium">Hours</span>
                <span class="text-gold text-xl sm:text-3xl md:text-5xl font-bold tabular-nums" x-text="hours">0</span>
            </div>
            <span class="text-xl sm:text-3xl md:text-5xl font-bold text-gray-400 mt-3">:</span>
            <div class="flex flex-col items-center min-w-[50px] sm:min-w-[70px] md:min-w-[100px]">
                <span class="text-white text-[10px] sm:text-xs mb-1 font-medium">Minutes</span>
                <span class="text-gold text-xl sm:text-3xl md:text-5xl font-bold tabular-nums" x-text="minutes">0</span>
            </div>
            <span class="text-xl sm:text-3xl md:text-5xl font-bold text-gray-400 mt-3">:</span>
            <div class="flex flex-col items-center min-w-[50px] sm:min-w-[70px] md:min-w-[100px]">
                <span class="text-white text-[10px] sm:text-xs mb-1 font-medium">Seconds</span>
                <span class="text-gold text-xl sm:text-3xl md:text-5xl font-bold tabular-nums" x-text="seconds">0</span>
            </div>
        </div>

        <!-- Calendar links -->
        <div class="flex flex-col md:flex-row items-center justify-center gap-8 mt-8">
            <div class="text-center">
                <p class="text-sm text-gray-600 mb-3">Save the date in your calendar!</p>
                <div class="flex items-center justify-center gap-3">
                    <a href="https://calendar.google.com/calendar/render?action=TEMPLATE&dates=20260723%2F20260726&details=Join%20the%20Developers%20Conference%202026&location=Voila%20Hotel%20Bagatelle&text=Developers%20Conference%202026" target="_blank" rel="noopener" class="w-10 h-10 bg-gray-100 hover:bg-gray-200 rounded-lg flex items-center justify-center transition-colors" title="Google Calendar">
                        <i class="fab fa-google text-gray-600"></i>
                    </a>
                    <a href="#" class="w-10 h-10 bg-gray-100 hover:bg-gray-200 rounded-lg flex items-center justify-center transition-colors" title="Apple Calendar">
                        <i class="fab fa-apple text-gray-600"></i>
                    </a>
                    <a href="https://outlook.office.com/calendar/action/compose?allday=true&path=%2Fcalendar%2Faction%2Fcompose&rru=addevent&startdt=2026-07-23&enddt=2026-07-26&subject=Developers%20Conference%202026&location=Voila%20Hotel%20Bagatelle" target="_blank" rel="noopener" class="w-10 h-10 bg-gray-100 hover:bg-gray-200 rounded-lg flex items-center justify-center transition-colors" title="Outlook">
                        <i class="fab fa-microsoft text-gray-600"></i>
                    </a>
                    <a href="https://calendar.yahoo.com/?dur=allday&in_loc=Voila%20Hotel%20Bagatelle&et=20260726&st=20260723&title=Developers%20Conference%202026&v=60" target="_blank" rel="noopener" class="w-10 h-10 bg-gray-100 hover:bg-gray-200 rounded-lg flex items-center justify-center transition-colors" title="Yahoo Calendar">
                        <i class="fab fa-yahoo text-gray-600"></i>
                    </a>
                </div>
            </div>
            <div class="text-center">
                <p class="text-sm text-gray-600 mb-3">Did not find an option for your calendar?<br/>Download the file and import it manually.</p>
                <a href="/calendar/devcon.ics" download class="inline-block border-2 border-gray-900 text-gray-900 font-semibold text-sm px-6 py-2.5 rounded-lg hover:bg-gray-900 hover:text-white transition-colors">
                    Download Calendar File
                </a>
            </div>
        </div>
    </div>
</section>

<script>
    function countdown() {
        return {
            days: '0',
            hours: '0',
            minutes: '0',
            seconds: '0',
            targetDate: new Date('2026-07-23T09:00:00'),
            interval: null,
            init() {
                this.update();
                this.interval = setInterval(() => this.update(), 1000);
            },
            update() {
                const now = new Date();
                const diff = this.targetDate - now;
                if (diff <= 0) {
                    this.days = '0';
                    this.hours = '0';
                    this.minutes = '0';
                    this.seconds = '0';
                    if (this.interval) clearInterval(this.interval);
                    return;
                }
                const d = Math.floor(diff / (1000 * 60 * 60 * 24));
                const h = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const m = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
                const s = Math.floor((diff % (1000 * 60)) / 1000);
                this.days = String(d);
                this.hours = String(h);
                this.minutes = String(m);
                this.seconds = String(s);
            }
        };
    }
</script>

{{-- Sponsors --}}
<section class="py-16 px-4 bg-gray-50">
    <div class="max-w-5xl mx-auto space-y-14">

        <!-- Platinum - Team Brasil -->
        <div>
            <div class="flex items-center gap-3 mb-6">
                <span class="w-12 h-12 rounded-full inline-flex items-center justify-center text-[28px] shadow-md">&#127463;&#127479;</span>
                <h3 class="text-xl md:text-2xl font-extrabold text-gray-900">
                    <span class="text-yellow-500">Platinum</span> Sponsor &ndash; Team Brasil
                </h3>
            </div>
            <div class="flex flex-col items-start gap-8 md:gap-8">
                <img src="/images/sponsors/swan.png" alt="SWAN" class="h-[60px] md:h-[75px]" />
                <img src="/images/sponsors/google.png" alt="Google" class="h-[60px] md:h-[70px]" />
                <img src="/images/sponsors/telecom.png" alt="Mauritius Telecom" class="h-[60px] md:h-[70px]" />
            </div>
        </div>

        <div class="w-full h-px bg-gray-200"></div>

        <!-- Gold - Team Germany -->
        <div>
            <div class="flex items-center gap-3 mb-6">
                <span class="w-12 h-12 rounded-full inline-flex items-center justify-center text-[28px] shadow-md">&#127465;&#127466;</span>
                <h3 class="text-xl md:text-2xl font-extrabold text-gray-900">
                    <span class="text-yellow-600">Gold</span> Sponsor &ndash; Team Germany
                </h3>
            </div>
            <div class="flex flex-wrap items-center justify-start gap-8">
                <img src="/images/sponsors/bdo-consulting.png" alt="BDO Consulting" class="h-[60px] md:h-[70px]" />
            </div>
        </div>

        <div class="w-full h-px bg-gray-200"></div>

        <!-- Silver - Team Italy -->
        <div class="hidden">
            <div class="flex items-center gap-3 mb-6">
                <span class="w-12 h-12 rounded-full inline-flex items-center justify-center text-[28px] shadow-md">&#127470;&#127481;</span>
                <h3 class="text-xl md:text-2xl font-extrabold text-gray-900">
                    <span class="text-gray-400">Silver</span> Sponsor &ndash; Team Italy
                </h3>
            </div>
            <div class="flex flex-wrap items-center justify-start gap-8">
                <span class="text-gray-400 italic text-sm">Sponsor to be announced</span>
            </div>
        </div>

        <div class="hidden w-full h-px bg-gray-200"></div>

        <!-- Bronze - Team Argentina -->
        <div>
            <div class="flex items-center gap-3 mb-6">
                <span class="w-12 h-12 rounded-full inline-flex items-center justify-center text-[28px] shadow-md">&#127462;&#127479;</span>
                <h3 class="text-xl md:text-2xl font-extrabold text-gray-900">
                    <span class="text-amber-700">Bronze</span> Sponsor &ndash; Team Argentina
                </h3>
            </div>
            <div class="flex flex-wrap items-center justify-start gap-8">
                <img src="/images/sponsors/frci.png" alt="FRCI" class="h-[60px] md:h-[80px]" />
                <img src="/images/sponsors/ios.png" alt="IOS" class="h-[60px] md:h-[80px]" />
            </div>
        </div>

        <div class="w-full h-px bg-gray-200"></div>

        <!-- Speaker Sponsor -->
        <div>
            <div class="mb-6">
                <h3 class="text-xl md:text-2xl font-extrabold text-gray-900">
                    Speaker Sponsor
                </h3>
            </div>
            <div class="flex flex-wrap items-center justify-start gap-8">
                <img src="/images/sponsors/ringier.png" alt="Ringier" class="h-[50px] md:h-[60px]" />
            </div>
        </div>

        <div class="w-full h-px bg-gray-200"></div>

        <!-- Internet Sponsor -->
        <div>
            <div class="mb-6">
                <h3 class="text-xl md:text-2xl font-extrabold text-gray-900">
                    Internet Sponsor
                </h3>
            </div>
            <div class="flex flex-wrap items-center justify-start gap-8">
                <img src="/images/sponsors/telecom.png" alt="Mauritius Telecom" class="h-[50px] md:h-[60px]" />
            </div>
        </div>

        <div class="hidden w-full h-px bg-gray-200"></div>

        <!-- Giveaways Sponsor -->
        <div>
            <div class="mb-6">
                <h3 class="text-xl md:text-2xl font-extrabold text-gray-900">
                    Giveaways Sponsor
                </h3>
            </div>
            <div class="flex flex-wrap items-center justify-start gap-8">
                <img src="/images/sponsors/novity.png" alt="Novity" class="h-[50px] md:h-[60px]" />
            </div>
        </div>

        <div class="w-full h-px bg-gray-200"></div>

        <!-- Badge Sponsor -->
        <div>
            <div class="mb-6">
                <h3 class="text-xl md:text-2xl font-extrabold text-gray-900">
                    Badge Sponsor
                </h3>
            </div>
            <div class="flex flex-wrap items-center justify-start gap-8">
                <img src="/images/sponsors/klanik.jpg" alt="Klanik" class="h-[50px] md:h-[60px]" />
            </div>
        </div>

        <div class="w-full h-px bg-gray-200"></div>

        <!-- Lanyards & Web Hosting -->
        <div>
            <div class="mb-6">
                <h3 class="text-xl md:text-2xl font-extrabold text-gray-900">
                    Lanyards &amp; Web Hosting
                </h3>
            </div>
            <div class="flex flex-wrap items-center justify-start gap-8">
                <img src="/images/sponsors/cloud.mu.png" alt="cloud.mu" class="h-[50px] md:h-[105px]" />
            </div>
        </div>

        <div class="w-full h-px bg-gray-200"></div>

        <!-- Media Partner -->
        <div class="hidden">
            <div class="mb-6">
                <h3 class="text-xl md:text-2xl font-extrabold text-gray-900">
                    Media Partner
                </h3>
            </div>
            <div class="flex flex-wrap items-center justify-start gap-8">
                <img src="/images/sponsors/la-sentinelle.png" alt="La Sentinelle" class="h-[50px] md:h-[60px]" />
            </div>
        </div>

    </div>
</section>

{{--  What to expect  --}}
<section class="mt-16 max-w-4xl mx-auto">
    <h2 class="text-4xl lg:text-5xl font-devcon text-center">What to expect?</h2>
    <p class="mt-2 lg:mt-4 text-center text-lg lg:text-xl px-4 lg:px-0">
        Learn about industry trends, best practices and new innovations through sessions and workshops
        when you are not having fun with all the entertainment and activities.
    </p>
</section>

{{--  Gallery  --}}
<section class="mt-8 max-w-7xl mx-auto px-4 lg:px-0">
    <div class="grid grid-col-1 gap-4 lg:grid-cols-1">
        <div><img src="/images/2025/mscc.jpg" class="rounded-lg shadow-lg" /></div>
    </div>
    <div class="mt-4 grid grid-col-1 gap-4 lg:grid-cols-2">
        <div><img src="/images/2025/1.jpg" class="rounded-lg shadow-lg" /></div>
        <div><img src="/images/2025/2.jpg" class="rounded-lg shadow-lg" /></div>
    </div>
    <div class="mt-4 grid grid-col-1 gap-4 lg:grid-cols-3">
        <div><img src="/images/2025/3.jpg" class="rounded-lg shadow-lg" /></div>
        <div><img src="/images/2025/4.jpg" class="rounded-lg shadow-lg" /></div>
        <div><img src="/images/2025/5.jpg" class="rounded-lg shadow-lg" /></div>
    </div>
    <div class="mt-4 grid grid-col-1 gap-4 lg:grid-cols-2">
        <div><img src="/images/2025/6.jpg" class="rounded-lg shadow-lg" /></div>
        <div><img src="/images/2025/7.jpg" class="rounded-lg shadow-lg" /></div>
    </div>
    <div class="mt-4 grid grid-col-1 gap-4 lg:grid-cols-3">
        <div><img src="/images/2025/8.jpg" class="rounded-lg shadow-lg" /></div>
        <div><img src="/images/2025/9.jpg" class="rounded-lg shadow-lg" /></div>
        <div><img src="/images/2025/10.jpg" class="rounded-lg shadow-lg" /></div>
    </div>
    <div class="mt-4 grid grid-col-1 gap-4 lg:grid-cols-4">
        <div><img src="/images/2025/11.jpg" class="rounded-lg shadow-lg" /></div>
        <div><img src="/images/2025/12.jpg" class="rounded-lg shadow-lg" /></div>
        <div><img src="/images/2025/13.jpg" class="rounded-lg shadow-lg" /></div>
        <div><img src="/images/2025/14.jpg" class="rounded-lg shadow-lg" /></div>
    </div>
    <div class="mt-4 grid grid-col-1 gap-4 lg:grid-cols-4">
        <div><img src="/images/2025/15.jpg" class="rounded-lg shadow-lg" /></div>
        <div><img src="/images/2025/16.jpg" class="rounded-lg shadow-lg" /></div>
        <div><img src="/images/2025/17.jpg" class="rounded-lg shadow-lg" /></div>
        <div><img src="/images/2025/18.jpg" class="rounded-lg shadow-lg" /></div>
    </div>
</section>

<section class="mt-10 max-w-7xl mx-auto px-4 lg:px-0">
    <div class="grid grid-col-1 lg:grid-cols-3 gap-6">
        <div>
            <img src="/images/emojis/palette.png" class="h-10" />
            <h3 class="mt-2 font-devcon text-xl">Workshops</h3>
            <p class="text-lg">
                Led by industry experts, these workshops offer a unique opportunity to gain
                practical skills and insights, making them a valuable experience for both
                beginners and seasoned professionals.
            </p>
        </div>
        <div>
            <img src="/images/emojis/bullseye.png" class="h-10" />
            <h3 class="mt-2 font-devcon text-xl">Panel Discussions</h3>
            <p class="text-lg">
                The panel discussions bring together thought leaders and innovators to explore
                current trends, challenges, and the future of technology. These engaging sessions
                provide a platform for diverse perspectives and lively debates, sparking new ideas
                and inspiring our community.
            </p>
        </div>
        <div>
            <img src="/images/emojis/performing-arts.png" class="h-10" />
            <h3 class="mt-2 font-devcon text-xl">Speaker Sessions</h3>
            <p class="text-lg">
                DevCon sessions are packed with knowledge-sharing and inspiration, featuring local
                and international speakers. From cutting-edge innovations to practical applications,
                these talks cover a wide range of topics, ensuring there's something for everyone,
                whether you're a developer, designer, or entrepreneur.
            </p>
        </div>
        <div>
            <img src="/images/emojis/bowling.png" class="h-10" />
            <h3 class="mt-2 font-devcon text-xl">Friendly Atmosphere</h3>
            <p class="text-lg">
                DevCon is known for its warm and inclusive atmosphere. Whether you are a first-time
                attendee or a conference veteran, you'll feel right at home. Our community is supportive
                and eager to connect, making DevCon a place where lasting professional relationships are
                formed.
            </p>
        </div>
        <div>
            <img src="/images/emojis/medal.png" class="h-10" />
            <h3 class="mt-2 font-devcon text-xl">Activities</h3>
            <p class="text-lg">
                Beyond the sessions and discussions, DevCon offers a range of cool activities that
                add an extra layer of fun to the conference. From interactive games to creative
                challenges, these activities are designed to engage and entertain, making DevCon
                a memorable experience for all attendees.
            </p>
        </div>
        <div>
            <img src="/images/emojis/necktie.png" class="h-10" />
            <h3 class="mt-2 font-devcon text-xl">Networking</h3>
            <p class="text-lg">
                The networking hour is an 'invitation-only' event, offering a relaxed environment
                to connect with peers, mentors, and industry leaders. It's the perfect opportunity
                to exchange ideas, collaborate on projects, and expand your professional network in
                a casual, friendly setting.
            </p>
        </div>
    </div>
</section>

@endsection
