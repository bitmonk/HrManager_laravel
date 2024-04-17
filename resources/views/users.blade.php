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
                    <td>{{ $user->phone1 ?? 'N/A' }}</td>
                    <td>{{ optional($user->position)->position ?? 'N/A' }}</td>
                    <td>{{ $user->salary ?? 'N/A' }}</td>
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
                        


                        {{-- {{($latestPunchIn)}} --}}
                    <td>
                        @if($latestPunchIn->punch_in_time && !$latestPunchIn->punch_out_time)
                            Active
                        @elseif($latestPunchIn->punch_in_time&& $latestPunchIn->punch_out_time)
                            Inactive
                        @else
                            Inactive
                        @endif

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

