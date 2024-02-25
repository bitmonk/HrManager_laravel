@extends('layouts.admin')

@section('main-content')
        <h2>Activity log of {{$user->name}}</h2>
        

        <table class="table">
            
            <tbody>
                <thead>
                    <th>Name</th>
                    <th>Punch In Time</th>
                    <th>To Do </th>
                    <th>Punch Out Time</th>
                    <th>Task Completed</th>
                </thead>
                @foreach($punchIns->sortByDesc('created_at') as $log)
                    <tr>
                            <td>{{ $log->user->name}}</td>
                            <td>{{$log->punch_in_time}}</td>
                            <td>{{$log->to_do}}</td>
                            <td>{{$log->punch_out_time}}</td>
                            <td>{{$log->task_completed}}</td>
                    </tr>
                @endforeach

                
            </tbody>
        </table>
@endsection
