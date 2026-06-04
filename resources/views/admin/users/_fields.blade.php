@php($editing = isset($user))

<div>
    <label class="form-label" for="name">Name</label>
    <input id="name" name="name" type="text" value="{{ old('name', $editing ? $user->name : '') }}"
           class="form-input @error('name') is-invalid @enderror" required>
    @error('name') <p class="form-error">{{ $message }}</p> @enderror
</div>

<div>
    <label class="form-label" for="email">Email</label>
    <input id="email" name="email" type="email" value="{{ old('email', $editing ? $user->email : '') }}"
           class="form-input @error('email') is-invalid @enderror" required>
    @error('email') <p class="form-error">{{ $message }}</p> @enderror
</div>

<div>
    <label class="form-label" for="role">Role</label>
    @php($currentRole = old('role', $editing ? $user->role->value : ''))
    <select id="role" name="role" class="form-select @error('role') is-invalid @enderror" required>
        <option value="" disabled @selected($currentRole === '')>Select a role…</option>
        @foreach (\App\Enums\UserRole::cases() as $role)
            <option value="{{ $role->value }}" @selected($currentRole === $role->value)>{{ $role->label() }}</option>
        @endforeach
    </select>
    <p class="form-hint mt-1">Admins have full access including user management and CSV export. Squad can view registrations and check attendees in.</p>
    @error('role') <p class="form-error">{{ $message }}</p> @enderror
</div>

<div class="grid sm:grid-cols-2 gap-5">
    <div>
        <label class="form-label" for="password">{{ $editing ? 'New password' : 'Password' }}</label>
        <input id="password" name="password" type="password"
               class="form-input @error('password') is-invalid @enderror"
               autocomplete="new-password" {{ $editing ? '' : 'required' }}>
        @if ($editing) <p class="form-hint mt-1">Leave blank to keep the current password.</p> @endif
        @error('password') <p class="form-error">{{ $message }}</p> @enderror
    </div>
    <div>
        <label class="form-label" for="password_confirmation">Confirm password</label>
        <input id="password_confirmation" name="password_confirmation" type="password"
               class="form-input" autocomplete="new-password" {{ $editing ? '' : 'required' }}>
    </div>
</div>
