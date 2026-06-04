@extends('layouts.admin')

@section('title', 'My profile')

@section('content')
<div class="max-w-xl">
    <h1 class="font-devcon text-3xl mb-1">My profile</h1>
    <p class="text-ink-muted text-sm mb-6">{{ auth()->user()->name }} · {{ auth()->user()->email }} · {{ auth()->user()->role->label() }}</p>

    <div class="admin-card p-6 md:p-8">
        <h2 class="font-devcon text-xl mb-4">Change password</h2>
        <form method="POST" action="{{ route('admin.profile.password') }}" class="space-y-5">
            @csrf
            @method('PUT')
            <div>
                <label class="form-label" for="current_password">Current password</label>
                <input id="current_password" name="current_password" type="password"
                       class="form-input @error('current_password') is-invalid @enderror" required autocomplete="current-password">
                @error('current_password') <p class="form-error">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="form-label" for="password">New password</label>
                <input id="password" name="password" type="password"
                       class="form-input @error('password') is-invalid @enderror" required autocomplete="new-password">
                @error('password') <p class="form-error">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="form-label" for="password_confirmation">Confirm new password</label>
                <input id="password_confirmation" name="password_confirmation" type="password"
                       class="form-input" required autocomplete="new-password">
            </div>
            <div class="flex justify-end pt-2">
                <button type="submit" class="btn-primary">Update password</button>
            </div>
        </form>
    </div>
</div>
@endsection
