@extends('layouts.admin')

@section('main-content')
<div class="container">
    <h2>User List</h2>

    <table class="table">
        <thead style="background-color: #4e73df; color: white;">

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
                    <td>{{ $user->position->position }}</td>
                    <td>{{ $user->salary }}</td>
                    <td> 
                        @if($user->salary_type == 1)
                            Monthly
                        @elseif($user->salary_type == 2)
                            Weekly
                        @elseif($user->salary_type == 3)
                            Project-Based
                        @else
                            Unassigned
                        @endif </td>
                        
                    <td>{{ $user->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

