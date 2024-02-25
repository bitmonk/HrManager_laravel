@extends('layouts.admin')

@section('main-content')
    <div class="container mt-4">
        <h2 class="mb-4">Apply for Leave </h2>
        <form action="{{ route('leave.apply') }}" method="post" enctype="multipart/form-data">
            @csrf
            
            <div class="form-group">
                <label for="reason">Reason for leave:</label>
                <textarea class="form-control" id="reason" name="reason" required >{{old ('reason')}}</textarea>
            </div>

            Apply for Leave:
            <div class="form-group">
                <label for="deadline">From:</label>
                <input type="date" class="form-control" id="from" name="from" required>
            </div>
            <div class="form-group">
                <label for="deadline">Till:</label>
                <input type="date" class="form-control" id="till" name="till" required>
            </div>

            <button type="submit" class="btn btn-primary btn-sm">Apply</button>
        </form>

        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Reason for Leave</th>
                    <th>From:</th>
                    <th>Till:</th>
                    <div>
                        @error('from')
                            <span style="color: red; font-weight: bold;"> {{ $message }} </span><br />
                        @enderror
                    </div>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($leaveRequests->sortByDesc('created_at') as $leave)
                    @if($leave->user_id === auth()->id())

                        <tr>
                            <td>{{$leave->user->name }}</td>
                            <td>{{$leave->reason}}</td>
                            <td>{{$leave->from}}</td>
                            <td>{{$leave->till}}</td>
                            <td>{{$leave->status}}</td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>

        
    </div>
@endsection