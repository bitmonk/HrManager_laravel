@extends('layouts.admin')

@section('main-content')
<div class="container mt-4">
        <h2>Users List</h2>

        <ul class="list-group">
            @forelse($users as $user)
                <li class="list-group-item">
                    <strong>{{ $user->name }}</strong>
                    <br>
                    Role: {{ $user->role }}
                    <br>
                    Position: {{ $user->position }}
                    <br>
                    Salary: ${{ $user->salary }}
                    <br>
                </li>
            @empty
                <li class="list-group-item">No users found.</li>
            @endforelse
        </ul>
    </div>
@endsection
