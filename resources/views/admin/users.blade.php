<div class="card shadow mb-4">
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
                <th>Action</th> {{-- New column for actions --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->phone1 }}</td>
                    <td>{{ optional($user->position)->position ?? 'Unassigned' }}</td>
                    <td>{{ optional($user->salary)->salary ?? 'Unassigned' }}</td>
                    <td>{{ optional(json_decode($user->salary))->salary_type }}</td>
                    <td>{{ $user->status }}</td>
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
