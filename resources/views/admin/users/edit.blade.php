@extends('layouts.admin')

@section('title', 'Edit user')

@section('content')
<div class="max-w-xl">
    <h1 class="font-devcon text-3xl mb-6">Edit user</h1>
    <div class="admin-card p-6 md:p-8">
        <form method="POST" action="{{ route('admin.users.update', $user) }}" class="space-y-5">
            @csrf
            @method('PUT')
            @include('admin.users._fields')
            <div class="flex justify-end gap-3 pt-2">
                <a href="{{ route('admin.users.index') }}" class="btn-secondary">Cancel</a>
                <button type="submit" class="btn-primary">Save changes</button>
            </div>
        </form>
    </div>
</div>
@endsection
