@extends('layouts.admin')

@section('title', 'New user')

@section('content')
<div class="max-w-xl">
    <h1 class="font-devcon text-3xl mb-6">New user</h1>
    <div class="admin-card p-6 md:p-8">
        <form method="POST" action="{{ route('admin.users.store') }}" class="space-y-5">
            @csrf
            @include('admin.users._fields')
            <div class="flex justify-end gap-3 pt-2">
                <a href="{{ route('admin.users.index') }}" class="btn-secondary">Cancel</a>
                <button type="submit" class="btn-primary">Create user</button>
            </div>
        </form>
    </div>
</div>
@endsection
