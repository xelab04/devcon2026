@extends('layouts.admin')

@section('title', 'Users')

@section('content')
<div class="flex items-center justify-between mb-6">
    <div>
        <h1 class="font-devcon text-3xl">Users</h1>
        <p class="text-ink-muted text-sm mt-1">{{ $users->total() }} users</p>
    </div>
    <a href="{{ route('admin.users.create') }}" class="btn-primary"><i class="fas fa-plus mr-2"></i> New user</a>
</div>

<div class="admin-card overflow-hidden">
    <div class="overflow-x-auto">
        <table class="table-admin">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th class="text-right">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr>
                        <td class="font-medium">{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if ($user->isAdmin())
                                <span class="badge badge-success">Admin</span>
                            @else
                                <span class="badge badge-muted">Squad</span>
                            @endif
                        </td>
                        <td class="text-right">
                            <div class="inline-flex items-center gap-2">
                                <a href="{{ route('admin.users.edit', $user) }}" class="btn-secondary" style="padding:0.35rem 0.85rem;">Edit</a>
                                <form method="POST" action="{{ route('admin.users.destroy', $user) }}"
                                      onsubmit="return confirm('Delete {{ $user->name }}? This cannot be undone.');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-secondary" style="padding:0.35rem 0.85rem; border-color:var(--color-error); color:var(--color-error);">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="text-center text-ink-muted py-10">No users yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="mt-6">
    {{ $users->links() }}
</div>
@endsection
