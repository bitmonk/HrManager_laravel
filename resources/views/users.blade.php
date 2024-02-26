@extends('layouts.admin')

@section('main-content')
<div class="container">
    <h2>User List</h2>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Position</th>
                <th>Salary</th>
                <th>Type</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->phone1 }}</td>
                    {{-- <td>{{ $user-> }}</td> --}}
                    <td>{{ $user->salary }}</td>
                    <td>{{ $user->type }}</td>
                    <td>{{ $user->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

