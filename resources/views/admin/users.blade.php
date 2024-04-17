<div class="card shadow mb-4">
    <table class="table">

        <thead>
        <thead style="background-color: #4e73df; color: white;">
        <thead style="background-color: #4e73df; color: white;">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Position</th>
                <th>Salary</th>
                <th>Type</th>
                <th>Status</th>
                <th>Action</th> {{-- New column for actions --}}
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

                    {{-- <td>{{ $user->salary_type }}</td> --}}
                    
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


                    <td>
                        @if(!empty($latestPunchIn->punch_in_time) && empty($latestPunchIn->punch_out_time))
                            Active
                        @elseif(!empty($latestPunchIn->punch_in_time) && !empty($latestPunchIn->punch_out_time))
                            Inactive
                        @else
                            Inactive
                        @endif
                    </td>
                    

                    <td>
                        {{-- View button --}}
                        <a href="{{ route('users.show', $user->id) }}" class="btn btn-info btn-sm">View</a>
                        
                        {{-- Edit button --}}
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
