@extends('layouts.admin')

@section('main-content')
    <h2>Activity log of Users</h2>
                    
        @php
            $uniqueUsernames = $punchIns->unique('user_id')->pluck('user.name');
        @endphp
        <h3>User's List</h3><br>
        @foreach($uniqueUsernames->sortByDesc('created_at') as $username)
            <div>
                <li><a href="{{ route('user.profile', ['username' => $username]) }}" style="font-size: 20px;">{{ $username }}</a></li><br>
            </div>
        @endforeach
@endsection 