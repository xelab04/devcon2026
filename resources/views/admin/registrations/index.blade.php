@extends('layouts.admin')

@section('title', 'Registrations')

@section('content')
@php($isAdmin = auth()->user()->isAdmin())

<div x-data="{ modalOpen: false, target: {}, openModal(t) { this.target = t; this.modalOpen = true } }">

    <div class="flex flex-wrap items-end justify-between gap-4 mb-6">
        <div>
            <h1 class="font-devcon text-3xl">Registrations</h1>
            <p class="text-ink-muted text-sm mt-1">{{ $registrations->total() }} total registrations</p>
        </div>
        <div class="flex items-center gap-3">
            <form method="GET" action="{{ route('admin.registrations.index') }}" class="flex items-center gap-2">
                <input type="text" name="q" value="{{ $search }}" placeholder="Search name, email, organisation…"
                       class="form-input h-11" style="min-width:260px;">
                <button type="submit" class="btn-secondary h-11" aria-label="Search">
                    <i class="fas fa-magnifying-glass"></i>
                </button>
            </form>
            @can('export-registrations')
                <a href="{{ route('admin.registrations.export') }}" class="btn-primary h-11">
                    <i class="fas fa-file-csv mr-2"></i> Export CSV
                </a>
            @endcan
        </div>
    </div>

    <div class="admin-card overflow-hidden">
        <div class="overflow-x-auto">
            <table class="table-admin">
                <thead>
                    <tr>
                        @if ($isAdmin)
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Organisation</th>
                            <th>Affiliation</th>
                            <th>Gender</th>
                            <th>Status</th>
                            <th class="text-right">Check-in</th>
                        @else
                            <th>First name</th>
                            <th>Last name</th>
                            <th>Email</th>
                            <th>Organisation</th>
                            <th>Status</th>
                            <th class="text-right">Check-in</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @forelse ($registrations as $registration)
                        <tr>
                            @if ($isAdmin)
                                <td class="font-medium">{{ $registration->fullName() }}</td>
                                <td>{{ $registration->email }}</td>
                                <td>{{ $registration->phone }}</td>
                                <td>{{ $registration->organisation }}</td>
                                <td>{{ $registration->affiliation_type->label() }}</td>
                                <td>{{ $registration->gender->label() }}</td>
                            @else
                                <td class="font-medium">{{ $registration->first_name }}</td>
                                <td class="font-medium">{{ $registration->last_name }}</td>
                                <td>{{ $registration->email }}</td>
                                <td>{{ $registration->organisation }}</td>
                            @endif

                            <td>
                                @if ($registration->checked_in)
                                    <span class="badge badge-success"><i class="fas fa-circle-check"></i> Checked in</span>
                                @else
                                    <span class="badge badge-muted">Pending</span>
                                @endif
                            </td>

                            <td class="text-right">
                                <button type="button"
                                        class="toggle {{ $registration->checked_in ? 'is-on' : '' }}"
                                        @click="openModal({
                                            name: @js($registration->fullName()),
                                            checkedIn: {{ $registration->checked_in ? 'true' : 'false' }},
                                            checkinUrl: '{{ route('admin.registrations.check-in', $registration) }}',
                                            cancelUrl: '{{ route('admin.registrations.cancel-check-in', $registration) }}'
                                        })"
                                        aria-label="Toggle check-in for {{ $registration->fullName() }}">
                                    <span class="toggle-dot"></span>
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="{{ $isAdmin ? 8 : 6 }}" class="text-center text-ink-muted py-10">
                                No registrations found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-6">
        {{ $registrations->links() }}
    </div>

    {{-- Confirmation modal --}}
    <div x-show="modalOpen" x-cloak
         class="fixed inset-0 z-50 flex items-center justify-center px-4"
         style="background: rgba(15,15,30,0.6);"
         @keydown.escape.window="modalOpen = false">
        <div class="admin-card max-w-md w-full p-6" @click.outside="modalOpen = false">
            <h3 class="font-devcon text-xl" x-text="target.checkedIn ? 'Undo check-in?' : 'Confirm check-in'"></h3>
            <p class="mt-2 text-ink-muted text-sm">
                <span x-show="!target.checkedIn">
                    Check in <strong x-text="target.name"></strong> at the Developers Conference 2026?
                    They'll receive a check-in confirmation email.
                </span>
                <span x-show="target.checkedIn">
                    Undo the check-in for <strong x-text="target.name"></strong>? No email will be sent.
                </span>
            </p>
            <form method="POST" :action="target.checkedIn ? target.cancelUrl : target.checkinUrl"
                  class="mt-6 flex justify-end gap-3">
                @csrf
                <button type="button" class="btn-secondary" @click="modalOpen = false">Cancel</button>
                <button type="submit" class="btn-primary" x-text="target.checkedIn ? 'Undo check-in' : 'Check in'"></button>
            </form>
        </div>
    </div>
</div>
@endsection
