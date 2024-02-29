<div class="container mt-3">
    <h3>User's List</h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Username</th>
            </tr>
        </thead>
        <tbody>
            @foreach($uniqueUsernames->sortByDesc('created_at') as $index => $username)
                <tr>
                    <th scope="row">{{ $index + 1 }}</th>
                    <td>
                        <a href="{{ route('user.profile', ['username' => $username]) }}" style="font-size: 15px;">
                            {{ $username }}
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
