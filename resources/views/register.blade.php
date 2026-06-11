@extends('layouts.main')

@section('content')
<section class="relative bg-midnight pt-32 pb-20 px-4">
    <div class="text-center">
        <span class="section-eyebrow">DevCon 2026 · Mauritius</span>
        <h1 class="font-varsity text-paper text-5xl md:text-7xl mt-3 tracking-wider">REGISTER</h1>
        <p class="mt-4 text-paper/70 max-w-xl mx-auto">
            Secure your spot at the largest developer gathering in Mauritius. Tell us a little about you and we'll email your confirmation.
        </p>
    </div>
</section>

<section class="py-16 md:py-24 px-4 bg-paper-soft">
    <div class="max-w-3xl mx-auto">

        @if (session('success'))
            <div class="alert alert-success mb-8">
                <i class="fas fa-circle-check mt-0.5 text-lg"></i>
                <div>
                    <p class="font-semibold">You're registered!</p>
                    <p class="text-sm mt-0.5">{{ session('success') }}</p>
                </div>
            </div>
        @endif

        @if (session('warning'))
            <div class="alert alert-warning mb-8">
                <i class="fas fa-triangle-exclamation mt-0.5 text-lg"></i>
                <div>
                    <p class="font-semibold">Already registered</p>
                    <p class="text-sm mt-0.5">{{ session('warning') }}</p>
                </div>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-error mb-8">
                <i class="fas fa-circle-exclamation mt-0.5 text-lg"></i>
                <div>
                    <p class="font-semibold">Please fix the highlighted fields</p>
                    <p class="text-sm mt-0.5">A few details need your attention before we can register you.</p>
                </div>
            </div>
        @endif

        <div class="admin-card p-6 md:p-10">
            <form method="POST" action="{{ route('register.store') }}" class="space-y-8" novalidate>
                @csrf

                <div class="grid gap-6 md:grid-cols-2">
                    <div>
                        <label for="first_name" class="form-label">First name</label>
                        <input id="first_name" name="first_name" type="text" value="{{ old('first_name') }}"
                               class="form-input @error('first_name') is-invalid @enderror" required>
                        @error('first_name') <p class="form-error">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label for="last_name" class="form-label">Last name</label>
                        <input id="last_name" name="last_name" type="text" value="{{ old('last_name') }}"
                               class="form-input @error('last_name') is-invalid @enderror" required>
                        @error('last_name') <p class="form-error">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div class="grid gap-6 md:grid-cols-2">
                    <div>
                        <label for="email" class="form-label">Email</label>
                        <input id="email" name="email" type="email" value="{{ old('email') }}"
                               class="form-input @error('email') is-invalid @enderror" required>
                        @error('email') <p class="form-error">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label for="phone" class="form-label">Phone</label>
                        <input id="phone" name="phone" type="tel" value="{{ old('phone') }}"
                               class="form-input @error('phone') is-invalid @enderror" placeholder="+230 5xxx xxxx" required>
                        @error('phone') <p class="form-error">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div class="grid gap-6 md:grid-cols-2">
                    <div>
                        <span class="form-label">Gender</span>
                        <div class="grid grid-cols-2 gap-3">
                            @foreach (\App\Enums\Gender::cases() as $g)
                                <label class="choice-card">
                                    <input type="radio" name="gender" value="{{ $g->value }}" @checked(old('gender') === $g->value) class="accent-gold">
                                    <span>{{ $g->label() }}</span>
                                </label>
                            @endforeach
                        </div>
                        @error('gender') <p class="form-error">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <span class="form-label">Affiliation</span>
                        <div class="grid grid-cols-2 gap-3">
                            @foreach (\App\Enums\AffiliationType::cases() as $a)
                                <label class="choice-card">
                                    <input type="radio" name="affiliation_type" value="{{ $a->value }}" @checked(old('affiliation_type') === $a->value) class="accent-gold">
                                    <span>{{ $a->label() }}</span>
                                </label>
                            @endforeach
                        </div>
                        @error('affiliation_type') <p class="form-error">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div class="grid gap-6 md:grid-cols-2">
                    <div>
                        <label for="organisation" class="form-label">Organisation</label>
                        <input id="organisation" name="organisation" type="text" value="{{ old('organisation') }}"
                               class="form-input @error('organisation') is-invalid @enderror" required>
                        @error('organisation') <p class="form-error">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label for="job_title" class="form-label">Job title</label>
                        <input id="job_title" name="job_title" type="text" value="{{ old('job_title') }}"
                               class="form-input @error('job_title') is-invalid @enderror" required>
                        @error('job_title') <p class="form-error">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div>
                    <span class="form-label">Are you attending the conference for the first time?</span>
                    <div class="grid grid-cols-2 gap-3 max-w-sm">
                        <label class="choice-card">
                            <input type="radio" name="first_time" value="1" @checked(old('first_time') === '1') class="accent-gold">
                            <span>Yes</span>
                        </label>
                        <label class="choice-card">
                            <input type="radio" name="first_time" value="0" @checked(old('first_time') === '0') class="accent-gold">
                            <span>No</span>
                        </label>
                    </div>
                    @error('first_time') <p class="form-error">{{ $message }}</p> @enderror
                </div>

                <div>
                    <span class="form-label">I am attending the conference to: <span class="text-ink-subtle font-normal">(select all that apply)</span></span>
                    <div class="grid gap-3 sm:grid-cols-3">
                        @foreach (\App\Enums\AttendingReason::cases() as $r)
                            <label class="choice-card">
                                <input type="checkbox" name="attending_reason[]" value="{{ $r->value }}" @checked(in_array($r->value, (array) old('attending_reason', []), true)) class="accent-gold">
                                <span>{{ $r->label() }}</span>
                            </label>
                        @endforeach
                    </div>
                    @error('attending_reason') <p class="form-error">{{ $message }}</p> @enderror
                    @error('attending_reason.*') <p class="form-error">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="flex gap-3 items-start cursor-pointer">
                        <input type="checkbox" name="consent" value="1" @checked(old('consent')) class="mt-1 accent-gold h-4 w-4">
                        <span class="text-sm text-ink-muted">
                            I agree that the information provided in this form can be used for statistical purposes and shared with the Developers Conference 2025 sponsors.
                        </span>
                    </label>
                    @error('consent') <p class="form-error">{{ $message }}</p> @enderror
                </div>

                <div class="pt-2">
                    <button type="submit" class="btn-primary w-full md:w-auto">
                        Complete registration
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
