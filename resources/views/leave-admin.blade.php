@extends('layouts.admin')

@section('main-content')
    <div class="container mt-4">
        <h2 class="mb-4">Apply for Leave </h2>
        

        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Reason for Leave</th>
                    <th>From:</th>
                    <th>Till:</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($leaveRequests as $leave)

                        <tr>
                            <td>{{ $leave->user->name }}</td>
                            <td>{{$leave->reason}}</td>
                            <td>{{$leave->from}}</td>
                            <td>{{$leave->till}}</td>
                            <td>{{$leave->status}}</td>
                        </tr>
                    
                @endforeach
            </tbody>
        </table>

        
    </div>
@endsection